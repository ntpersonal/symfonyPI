<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;

/**
 * Service pour interagir avec l'API Kaggle et télécharger des datasets
 */
class KaggleDatasetService
{
    private $params;
    private $logger;
    
    public function __construct(
        ParameterBagInterface $params,
        LoggerInterface $logger = null
    ) {
        $this->params = $params;
        $this->logger = $logger;
    }
    
    /**
     * Télécharge un dataset depuis Kaggle
     * 
     * @param string $username Le nom d'utilisateur du propriétaire du dataset
     * @param string $datasetName Le nom du dataset
     * @param string $targetPath Le chemin où sauvegarder le fichier
     * @param string $apiKey Clé API Kaggle (ou null pour utiliser les variables d'environnement)
     * @param string $apiToken Token API Kaggle (ou null pour utiliser les variables d'environnement)
     * 
     * @return bool True si le téléchargement a réussi, false sinon
     */
    public function downloadDataset(
        string $username,
        string $datasetName,
        string $targetPath,
        string $apiKey = null,
        string $apiToken = null
    ): bool {
        try {
            // Vérifie si les credentials sont fournis ou utilise les variables d'environnement
            $key = $apiKey ?? $_ENV['KAGGLE_API_KEY'] ?? null;
            $token = $apiToken ?? $_ENV['KAGGLE_API_TOKEN'] ?? null;
            
            if (!$key || !$token) {
                if ($this->logger) {
                    $this->logger->error('Clés API Kaggle manquantes. Veuillez définir KAGGLE_API_KEY et KAGGLE_API_TOKEN.');
                }
                return false;
            }
            
            // Exemple d'appel à l'API Kaggle
            $client = HttpClient::create();
            $response = $client->request('GET', "https://www.kaggle.com/api/v1/datasets/download/{$username}/{$datasetName}", [
                'headers' => [
                    'Authorization' => "Basic " . base64_encode("{$key}:{$token}"),
                    'Content-Type' => 'application/json',
                ],
            ]);
            
            if ($response->getStatusCode() !== 200) {
                if ($this->logger) {
                    $this->logger->error('Erreur lors du téléchargement depuis Kaggle: ' . $response->getStatusCode());
                }
                return false;
            }
            
            // Sauvegarde le contenu téléchargé
            file_put_contents($targetPath, $response->getContent());
            
            if ($this->logger) {
                $this->logger->info("Dataset {$username}/{$datasetName} téléchargé avec succès");
            }
            
            return true;
        } catch (\Exception $e) {
            if ($this->logger) {
                $this->logger->error('Erreur lors du téléchargement du dataset: ' . $e->getMessage());
            }
            return false;
        }
    }
    
    /**
     * Télécharge spécifiquement un fichier CSV de liste de mots inappropriés depuis Kaggle
     * 
     * @param string $targetPath Chemin de sortie pour le fichier CSV
     * @return bool True si le téléchargement a réussi, false sinon
     */
    public function downloadBadWordsList(string $targetPath): bool
    {
        // Pour cet exemple, nous utilisons un dataset fictif
        // Remplacez par un véritable dataset de mots inappropriés sur Kaggle
        $username = 'nicapotato';
        $datasetName = 'bad-bad-words';
        
        // Tente de télécharger depuis Kaggle
        $success = $this->downloadDataset($username, $datasetName, $targetPath);
        
        // Si le téléchargement échoue, on crée une liste locale
        if (!$success) {
            if ($this->logger) {
                $this->logger->info('Création d\'une liste locale de mots inappropriés');
            }
            
            // Liste plus complète de mots à filtrer
            $predefinedList = [
                'insulte', 'vulgaire', 'offensant', 'grossier', 'injure',
                'badword1', 'badword2', 'badword3', 'merde', 'putain',
                'con', 'idiots', 'connard', 'abruti', 'imbécile',
                // Ajoutez d'autres mots selon vos besoins
            ];
            
            // Écrire la liste dans le fichier
            file_put_contents($targetPath, implode(PHP_EOL, $predefinedList));
            
            return file_exists($targetPath);
        }
        
        return $success;
    }
} 