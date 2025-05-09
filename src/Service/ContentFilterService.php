<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;

class ContentFilterService
{
    private $params;
    private $logger;
    private $kaggleService;
    private $badWordsList = [];
    private $loaded = false;

    private array $inappropriateWords = [
        'insulte', 'vulgaire', 'offensant', 'grossier', 'injure',
        'badword1', 'badword2', 'badword3', 'merde', 'putain',
        'con', 'idiots', 'connard', 'abruti', 'imbécile'
    ];

    public function __construct(
        ParameterBagInterface $params,
        KaggleDatasetService $kaggleService,
        LoggerInterface $logger = null
    ) {
        $this->params = $params;
        $this->kaggleService = $kaggleService;
        $this->logger = $logger;
    }

    /**
     * Charge la liste des mots inappropriés depuis le fichier CSV
     */
    private function loadBadWords(): void
    {
        if ($this->loaded) {
            return;
        }

        // Chemin vers le fichier CSV contenant les mots inappropriés
        $filePath = __DIR__ . '/../../data/bad_words.csv';
        
        // Vérifier si le fichier existe
        if (!file_exists($filePath)) {
            // Créer le répertoire data s'il n'existe pas
            if (!is_dir(__DIR__ . '/../../data')) {
                mkdir(__DIR__ . '/../../data', 0755, true);
            }
            
            // Télécharger le fichier depuis Kaggle en utilisant le service dédié
            $this->kaggleService->downloadBadWordsList($filePath);
        }
        
        // Charger les mots depuis le fichier
        if (file_exists($filePath)) {
            $handle = fopen($filePath, 'r');
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $word = trim($line);
                    if (!empty($word)) {
                        $this->badWordsList[] = strtolower($word);
                    }
                }
                fclose($handle);
            }
        } else {
            // Liste de base en cas d'échec du téléchargement
            $this->badWordsList = [
                'insulte', 'vulgaire', 'offensant', 'grossier', 'injure',
                // Ajoutez d'autres mots par défaut si nécessaire
            ];
        }
        
        $this->loaded = true;
    }

    /**
     * Vérifie si le texte contient des mots inappropriés
     * 
     * @param string $text Le texte à vérifier
     * @return array Liste des mots inappropriés trouvés
     */
    public function containsInappropriateContent(?string $text): array
    {
        if (empty($text)) {
            return [];
        }

        $badWordsFound = [];
        $normalizedText = $this->normalizeText($text);

        foreach ($this->inappropriateWords as $word) {
            // Ignorer les mots trop courts pour réduire les faux positifs
            if (strlen($word) < 3) {
                continue;
            }

            $normalizedWord = $this->normalizeText($word);
            $wordFound = false;

            // Vérification simple (présence du mot)
            if (stripos($normalizedText, $normalizedWord) !== false) {
                $wordFound = true;
            }
            // Vérification avec limites de mots (mot entier)
            else if (preg_match('/\b' . preg_quote($word, '/') . '\b/i', $text)) {
                $wordFound = true;
            }
            // Vérification des variations délibérées
            else if ($this->hasDeliberateVariation($text, $word)) {
                $wordFound = true;
            }
            // Vérification des séparations par caractères (p.u.t.a.i.n)
            else {
                $patternLetters = implode('\s*', str_split($word));
                if (preg_match('/' . $patternLetters . '/i', $text)) {
                    $wordFound = true;
                }
            }

            if ($wordFound && !in_array($word, $badWordsFound)) {
                $badWordsFound[] = $word;
            }
        }

        return $badWordsFound;
    }
    
    /**
     * Normalise le texte pour détecter les contournements
     */
    private function normalizeText(string $text): string
    {
        // Conversion en minuscules
        $text = mb_strtolower($text, 'UTF-8');

        // Remplacer les caractères spéciaux couramment utilisés pour contourner les filtres
        $replacements = [
            '@' => 'a', '4' => 'a', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ä' => 'a',
            '8' => 'b',
            '(' => 'c', 'ç' => 'c',
            '3' => 'e', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
            '1' => 'i', '!' => 'i', 'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
            '0' => 'o', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'ö' => 'o',
            '5' => 's', '$' => 's',
            '+' => 't',
            'y' => 'y'
        ];

        foreach ($replacements as $search => $replace) {
            $text = str_replace($search, $replace, $text);
        }

        // Supprimer les répétitions de caractères (puuuutain => putain)
        $text = preg_replace('/(.)\1{2,}/', '$1', $text);

        // Supprimer les espaces et caractères spéciaux
        $text = preg_replace('/[\s\.,\-_\*\+\?\^\$\{\}\(\)\|\[\]\\\\\/\'\"\;\:\!\@\#\%\&\=]+/', '', $text);

        return $text;
    }
    
    /**
     * Détecte si un mot inapproprié est présent avec des variations intentionnelles
     */
    private function hasDeliberateVariation(string $text, string $word): bool
    {
        // Vérifier les variations simples (1-2 caractères d'écart)
        if (strlen($word) > 4) {
            // Pour les mots plus longs, utiliser la distance de Levenshtein
            $textLower = mb_strtolower($text, 'UTF-8');
            $wordLower = mb_strtolower($word, 'UTF-8');
            
            // Diviser le texte en mots pour vérifier chaque mot individuellement
            $words = preg_split('/\s+/', $textLower);
            
            foreach ($words as $textWord) {
                // Ignorer les mots trop courts
                if (strlen($textWord) < 3) {
                    continue;
                }
                
                // Vérifier si le mot est proche du mot inapproprié
                $distance = levenshtein($textWord, $wordLower);
                $maxDistance = min(2, floor(strlen($wordLower) / 4));
                
                if ($distance <= $maxDistance) {
                    return true;
                }
                
                // Vérifier si le mot inclut le mot inapproprié avec quelques caractères en plus
                if (stripos($textWord, $wordLower) !== false) {
                    return true;
                }
                
                // Vérifier les sous-séquences communes
                $commonSubsequence = $this->longestCommonSubsequence($textWord, $wordLower);
                if (strlen($commonSubsequence) >= strlen($wordLower) * 0.8) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    private function longestCommonSubsequence(string $str1, string $str2): string
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);
        
        // Initialiser la matrice
        $dp = array_fill(0, $len1 + 1, array_fill(0, $len2 + 1, 0));
        
        // Remplir la matrice
        for ($i = 1; $i <= $len1; $i++) {
            for ($j = 1; $j <= $len2; $j++) {
                if ($str1[$i - 1] == $str2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                } else {
                    $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
                }
            }
        }
        
        // Reconstruire la sous-séquence
        $result = '';
        $i = $len1;
        $j = $len2;
        
        while ($i > 0 && $j > 0) {
            if ($str1[$i - 1] == $str2[$j - 1]) {
                $result = $str1[$i - 1] . $result;
                $i--;
                $j--;
            } elseif ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
                $i--;
            } else {
                $j--;
            }
        }
        
        return $result;
    }
    
    /**
     * Vérifie si le texte contient des mots inappropriés et retourne vrai si c'est le cas
     */
    public function hasBadWords(string $text): bool
    {
        return !empty($this->containsInappropriateContent($text));
    }
    
    /**
     * Filtre les mots inappropriés du texte et les remplace par des astérisques
     * 
     * @param string $text Le texte à filtrer
     * @param string $replacement Le caractère de remplacement (par défaut '*')
     * @return string Le texte filtré
     */
    public function filterText(?string $text): string
    {
        if (empty($text)) {
            return '';
        }

        $filteredText = $text;
        
        // Première passe: remplacement direct des mots inappropriés
        foreach ($this->inappropriateWords as $word) {
            // Remplacer avec limites de mots (mot entier)
            $filteredText = preg_replace('/\b' . preg_quote($word, '/') . '\b/i', str_repeat('*', strlen($word)), $filteredText);
            
            // Remplacer sans limites (variantes incluses dans d'autres mots)
            $filteredText = preg_replace('/' . preg_quote($word, '/') . '/i', str_repeat('*', strlen($word)), $filteredText);
            
            // Remplacer les variations séparées par des caractères
            $patternLetters = implode('[\\s\\.,\\-_\\*\\+\\?\\!\\@\\#]*', str_split($word));
            $filteredText = preg_replace('/' . $patternLetters . '/i', str_repeat('*', strlen($word)), $filteredText);
        }
        
        // Vérification secondaire: si du contenu inapproprié est encore présent, filtrer à nouveau
        if ($this->containsInappropriateContent($filteredText)) {
            return $this->filterText($filteredText); // Appel récursif pour traiter tous les cas
        }
        
        return $filteredText;
    }
    
    /**
     * Récupère la liste des mots inappropriés
     * 
     * @return array La liste des mots à filtrer
     */
    public function getBadWordsList(): array
    {
        $this->loadBadWords();
        return $this->badWordsList;
    }
    
    /**
     * Ajoute un nouveau mot à la liste des mots inappropriés
     * 
     * @param string $word Le mot à ajouter
     * @return bool True si le mot a été ajouté, false si le mot existe déjà
     */
    public function addBadWord(string $word): bool
    {
        $this->loadBadWords();
        $word = strtolower(trim($word));
        
        if (empty($word) || in_array($word, $this->badWordsList)) {
            return false;
        }
        
        $this->badWordsList[] = $word;
        
        // Mettre à jour le fichier
        $filePath = __DIR__ . '/../../data/bad_words.csv';
        file_put_contents($filePath, implode(PHP_EOL, $this->badWordsList));
        
        return true;
    }
    
    /**
     * Fournit une explication des raisons pour lesquelles un texte a été filtré,
     * utile pour les messages d'erreur explicatifs
     * 
     * @param string $text Le texte à analyser
     * @return array Informations sur les mots filtrés et leur contexte
     */
    public function explainFiltering(string $text): array
    {
        $badWords = $this->containsInappropriateContent($text);
        $results = [];
        
        foreach ($badWords as $word) {
            // Trouver toutes les occurrences du mot
            preg_match_all('/\b[a-zA-Z0-9_\.\-\s]{0,10}' . preg_quote($word, '/') . '[a-zA-Z0-9_\.\-\s]{0,10}\b/i', $text, $matches);
            
            if (!empty($matches[0])) {
                $results[$word] = [
                    'occurrences' => count($matches[0]),
                    'context' => array_slice($matches[0], 0, 3) // Limiter à 3 exemples
                ];
            }
        }
        
        return [
            'bad_words_count' => count($badWords),
            'bad_words' => $badWords,
            'details' => $results
        ];
    }

    /**
     * Récupère la liste des mots inappropriés sous forme JSON pour l'API
     * 
     * @return array
     */
    public function getBadWordsForApi(): array
    {
        $this->loadBadWords();
        
        // Trier les mots par longueur décroissante pour un filtrage plus efficace
        $words = $this->badWordsList;
        usort($words, function($a, $b) {
            return strlen($b) - strlen($a);
        });
        
        // Ajouter des métadonnées utiles
        return [
            'count' => count($words),
            'update_time' => (new \DateTime())->format('c'),
            'words' => $words,
            'version' => '1.0'
        ];
    }
    
    /**
     * Protège un texte avant de l'envoyer au client
     * en masquant partiellement les mots inappropriés
     * 
     * @param string $text Le texte à protéger
     * @return string Le texte avec les mots inappropriés partiellement masqués
     */
    public function safeText(string $text): string
    {
        $badWords = $this->containsInappropriateContent($text);
        
        foreach ($badWords as $badWord) {
            $length = strlen($badWord);
            
            // Pour les mots très courts, simplement les masquer complètement
            if ($length <= 4) {
                $replacement = str_repeat('*', $length);
            } else {
                // Pour les mots plus longs, montrer seulement la première lettre
                $replacement = substr($badWord, 0, 1) . str_repeat('*', $length - 1);
            }
            
            $text = str_ireplace($badWord, $replacement, $text);
        }
        
        return $text;
    }
} 