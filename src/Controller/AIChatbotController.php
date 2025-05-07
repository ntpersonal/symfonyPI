<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AIChatbotController extends AbstractController
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @Route("/reclamation/ai-chat", name="reclamation_ai_chat", methods={"POST"})
     */
    public function processMessage(Request $request): JsonResponse
    {
        // Décoder le contenu JSON de la requête
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['message']) || empty($data['message'])) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Le message est requis'
            ], 400);
        }

        $userMessage = $data['message'];
        
        try {
            // Version simulée - Dans un environnement de production, envoyez le message à un service AI réel
            // Exemple d'intégration à un service comme OpenAI
            
            /*
            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->getParameter('openai_api_key'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Vous êtes un assistant de réclamation d\'assurance utile et amical.'],
                        ['role' => 'user', 'content' => $userMessage]
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 500,
                ]
            ]);
            
            $responseData = $response->toArray();
            $aiResponse = $responseData['choices'][0]['message']['content'];
            */
            
            // Simuler une réponse pour les tests
            $aiResponse = $this->generateSimulatedResponse($userMessage);
            
            return new JsonResponse([
                'success' => true,
                'response' => $aiResponse
            ]);
            
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Une erreur est survenue lors du traitement de votre demande: ' . $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Génère une réponse simulée pour les tests
     */
    private function generateSimulatedResponse(string $message): string
    {
        $lowercaseMessage = mb_strtolower($message, 'UTF-8');
        
        // Vérifier si l'utilisateur demande un modèle de réclamation
        if (preg_match('/(rédiger|écrire|générer|créer|faire|modèle).+(réclamation|message|plainte|requête|demande)/i', $lowercaseMessage)) {
            // Essayer de détecter le type de réclamation demandée
            $typeReclamation = $this->detectReclamationType($lowercaseMessage);
            return $this->generateReclamationTemplate($typeReclamation);
        }
        
        // Réponses pour les salutations
        if (preg_match('/(bonjour|salut|hello|coucou|hey|hi)/i', $lowercaseMessage)) {
            $greetings = [
                'Bonjour ! Comment puis-je vous aider avec votre réclamation aujourd\'hui ?',
                'Salut ! Je suis là pour vous aider. Que puis-je faire pour vous ?',
                'Bonjour ! Ravi de vous aider aujourd\'hui. Quelle est votre question ?',
                'Hello ! Bienvenue sur l\'assistant Sportify. Comment puis-je vous assister ?'
            ];
            return $greetings[array_rand($greetings)];
        }
        
        // Réponses pour les demandes d'aide générale
        if (preg_match('/(aide|help|besoin|aider)/i', $lowercaseMessage)) {
            return 'Je suis là pour vous aider ! Voici ce que je peux faire pour vous :<br><br>
                   1. Vous aider à formuler votre réclamation<br>
                   2. Vous informer sur le processus de traitement<br>
                   3. Vous conseiller sur les documents à fournir<br>
                   4. Répondre à vos questions sur les délais<br><br>
                   Dites-moi simplement ce dont vous avez besoin !';
        }
        
        // Réponses sur le processus de réclamation
        if (preg_match('/(réclamation|reclamation|envoyer|soumettre|comment|formuler|écrire)/i', $lowercaseMessage)) {
            $responses = [
                'Pour soumettre une réclamation efficace, soyez précis sur : la date de l\'incident, les personnes impliquées, et les détails du problème. N\'hésitez pas à joindre des documents ou photos si nécessaire. Quel type de réclamation souhaitez-vous envoyer ?',
                'Voici comment formuler une bonne réclamation :<br>1. Commencez par vous présenter<br>2. Exposez clairement le problème<br>3. Mentionnez dates et références<br>4. Expliquez vos attentes<br>5. Restez courtois<br><br>Avez-vous besoin d\'aide sur un point en particulier ?',
                'Pour rédiger une réclamation professionnelle, structurez votre message en 3 parties :<br>- Introduction : présentez-vous et le contexte<br>- Développement : détaillez le problème avec précision<br>- Conclusion : exprimez clairement votre demande<br><br>Est-ce que je peux vous aider avec une partie spécifique ?'
            ];
            return $responses[array_rand($responses)];
        }
        
        // Réponses sur les délais
        if (preg_match('/(délai|temps|attendre|durée|quand|combien)/i', $lowercaseMessage)) {
            return 'Les délais de traitement des réclamations varient selon leur complexité :<br><br>
                   - Réclamations simples : 5 à 10 jours ouvrables<br>
                   - Réclamations standard : 10 à 15 jours ouvrables<br>
                   - Cas complexes : jusqu\'à 30 jours<br><br>
                   Vous recevrez une confirmation par email dès réception de votre demande et serez informé de son avancement.';
        }
        
        // Réponses sur les documents
        if (preg_match('/(document|pièce|justificatif|preuve|photo|fichier|joindre)/i', $lowercaseMessage)) {
            return 'Pour appuyer votre réclamation, vous pouvez joindre les documents suivants :<br><br>
                   - Photos du problème rencontré<br>
                   - Factures ou reçus pertinents<br>
                   - Correspondance antérieure avec nos services<br>
                   - Témoignages (si applicable)<br><br>
                   Ces éléments nous aideront à traiter votre demande plus efficacement. Avez-vous des documents à partager ?';
        }
        
        // Réponses sur les types de réclamations
        if (preg_match('/(type|catégorie|sorte)/i', $lowercaseMessage)) {
            return 'Nous traitons plusieurs types de réclamations :<br><br>
                   - Qualité de service<br>
                   - Produits défectueux<br>
                   - Problèmes de livraison<br>
                   - Facturation<br>
                   - Service client<br><br>
                   Quel type de réclamation souhaitez-vous soumettre ?';
        }
        
        // Réponse pour les remerciements
        if (preg_match('/(merci|thanks|thx|remercie)/i', $lowercaseMessage)) {
            $thanks = [
                'Je vous en prie ! N\'hésitez pas si vous avez d\'autres questions.',
                'Avec plaisir ! Je suis là pour vous aider quand vous en avez besoin.',
                'De rien ! Avez-vous besoin d\'autre chose ?',
                'C\'est un plaisir de vous aider. N\'hésitez pas à revenir si vous avez d\'autres questions.'
            ];
            return $thanks[array_rand($thanks)];
        }
        
        // Réponse par défaut plus variée
        $defaultResponses = [
            'Je comprends votre demande concernant "' . $message . '". Pourriez-vous me donner plus de détails pour que je puisse mieux vous aider ?',
            'Merci pour votre message. Pour vous aider avec "' . $message . '", j\'aurais besoin de quelques informations supplémentaires.',
            'Je vois que vous me parlez de "' . $message . '". Pouvez-vous préciser votre question pour que je puisse vous donner une réponse plus adaptée ?',
            'Votre message à propos de "' . $message . '" a bien été reçu. Avez-vous des détails spécifiques à partager pour que je puisse mieux vous conseiller ?'
        ];
        
        return $defaultResponses[array_rand($defaultResponses)];
    }
    
    /**
     * Détecte le type de réclamation à partir du message
     */
    private function detectReclamationType(string $message): string
    {
        $types = [
            'produit' => ['produit', 'article', 'achat', 'commander', 'livraison', 'colis', 'qualité', 'défectueux', 'cassé', 'endommagé', 'reçu'],
            'service' => ['service', 'prestation', 'rendez-vous', 'annulation', 'retard', 'attente', 'qualité', 'conseil', 'assistance'],
            'facturation' => ['facture', 'paiement', 'prix', 'tarif', 'montant', 'remboursement', 'frais', 'trop cher', 'surfacturation', 'prélèvement'],
            'personnel' => ['employé', 'personnel', 'comportement', 'impoli', 'malpoli', 'attitude', 'service client', 'conseiller']
        ];
        
        // Compter les occurrences de mots-clés pour chaque type
        $scores = ['produit' => 0, 'service' => 0, 'facturation' => 0, 'personnel' => 0];
        
        foreach ($types as $type => $keywords) {
            foreach ($keywords as $keyword) {
                if (stripos($message, $keyword) !== false) {
                    $scores[$type]++;
                }
            }
        }
        
        // Déterminer le type avec le score le plus élevé
        $maxScore = 0;
        $detectedType = 'général'; // Type par défaut
        
        foreach ($scores as $type => $score) {
            if ($score > $maxScore) {
                $maxScore = $score;
                $detectedType = $type;
            }
        }
        
        return $detectedType;
    }
    
    /**
     * Génère un modèle de réclamation basé sur le type détecté
     */
    private function generateReclamationTemplate(string $type): string
    {
        $date = date('d/m/Y');
        
        $templates = [
            'produit' => "Voici un modèle de réclamation concernant un produit :<br><br>
                <div style='background:#f9f9f9; padding:15px; border-radius:8px; border-left:4px solid #4CAF50;'>
                <strong>Objet : Réclamation concernant [nom du produit]</strong><br><br>
                Madame, Monsieur,<br><br>
                Je me permets de vous contacter suite à l'achat d'un [nom du produit], référence [numéro de référence], commandé/acheté le [date d'achat] [dans votre magasin/sur votre site] pour un montant de [montant] euros.<br><br>
                Malheureusement, j'ai constaté les problèmes suivants avec ce produit :<br>
                - [Description précise du problème rencontré]<br>
                - [Conséquences du problème]<br><br>
                Conformément à la législation en vigueur concernant les garanties légales, je vous demande de bien vouloir [demande précise : remboursement/échange/réparation].<br><br>
                Vous trouverez en pièces jointes [mentionner les pièces jointes : facture, photos, etc.].<br><br>
                Je reste à votre disposition pour toute information complémentaire et dans l'attente de votre réponse, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.<br><br>
                [Votre nom]<br>
                [Vos coordonnées]<br>
                [Numéro client si applicable]
                </div><br>
                Souhaitez-vous que je vous aide à personnaliser ce modèle ?",
                
            'service' => "Voici un modèle de réclamation concernant un service :<br><br>
                <div style='background:#f9f9f9; padding:15px; border-radius:8px; border-left:4px solid #4CAF50;'>
                <strong>Objet : Réclamation concernant le service [nom du service]</strong><br><br>
                Madame, Monsieur,<br><br>
                Je suis client de votre entreprise depuis [durée] et j'ai souscrit au service [nom du service] le [date] sous la référence [référence client/contrat].<br><br>
                Je me permets de vous contacter car je rencontre les problèmes suivants :<br>
                - [Description précise du problème rencontré]<br>
                - [Date et heure si pertinent]<br>
                - [Impact du problème sur votre utilisation du service]<br><br>
                J'ai déjà tenté de résoudre ce problème en [mentionnez vos démarches préalables], mais sans résultat satisfaisant.<br><br>
                Par conséquent, je vous demande de bien vouloir [demande précise : résoudre le problème/offrir un dédommagement/etc.].<br><br>
                Je reste disponible pour échanger à ce sujet par téléphone au [numéro] ou par email à [adresse email].<br><br>
                Dans l'attente de votre réponse que j'espère rapide, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.<br><br>
                [Votre nom]<br>
                [Vos coordonnées]<br>
                [Numéro client]
                </div><br>
                Souhaitez-vous modifier certains éléments de ce modèle ?",
                
            'facturation' => "Voici un modèle de réclamation concernant une facturation :<br><br>
                <div style='background:#f9f9f9; padding:15px; border-radius:8px; border-left:4px solid #4CAF50;'>
                <strong>Objet : Contestation de facture [référence facture]</strong><br><br>
                Madame, Monsieur,<br><br>
                Je fais suite à la facture n° [référence] datée du [date de la facture] d'un montant de [montant] euros.<br><br>
                Après vérification, je constate les anomalies suivantes :<br>
                - [Description précise de l'erreur de facturation]<br>
                - [Écart entre le prix convenu et le prix facturé, si applicable]<br>
                - [Autres problèmes liés à la facturation]<br><br>
                En conséquence, je vous demande de bien vouloir [demande précise : corriger la facture/rembourser le trop-perçu/annuler les frais indus].<br><br>
                Vous trouverez en pièces jointes les documents justificatifs suivants :<br>
                - [Liste des pièces jointes : contrat, facture, relevé bancaire, etc.]<br><br>
                Je vous remercie de traiter cette demande dans les meilleurs délais et reste à votre disposition pour tout complément d'information.<br><br>
                Dans l'attente de votre réponse, je vous prie d'agréer, Madame, Monsieur, mes salutations distinguées.<br><br>
                [Votre nom]<br>
                [Vos coordonnées]<br>
                [Référence client]
                </div><br>
                Puis-je vous aider à adapter ce modèle à votre situation spécifique ?",
                
            'personnel' => "Voici un modèle de réclamation concernant un comportement du personnel :<br><br>
                <div style='background:#f9f9f9; padding:15px; border-radius:8px; border-left:4px solid #4CAF50;'>
                <strong>Objet : Réclamation concernant un incident avec un membre du personnel</strong><br><br>
                Madame, Monsieur,<br><br>
                Je me permets de vous contacter suite à un incident survenu le [date] à [heure] à [lieu : en magasin/au téléphone/etc.].<br><br>
                En effet, lors de mon échange avec [fonction de l'employé si connue], j'ai été confronté à la situation suivante :<br>
                - [Description factuelle et objective de l'incident]<br>
                - [Impact de cette situation sur votre expérience]<br><br>
                En tant que client fidèle de votre enseigne depuis [durée si pertinent], je suis particulièrement déçu par cette expérience qui ne correspond pas aux standards de qualité auxquels votre entreprise m'a habitué.<br><br>
                Par conséquent, je souhaiterais [votre attente : recevoir des excuses, obtenir un geste commercial, etc.].<br><br>
                Je reste à votre disposition pour vous fournir des informations complémentaires si nécessaire.<br><br>
                Dans l'attente de votre retour, je vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.<br><br>
                [Votre nom]<br>
                [Vos coordonnées]<br>
                [Numéro client si applicable]
                </div><br>
                Voulez-vous que je vous aide à personnaliser ce modèle pour votre situation ?",
                
            'général' => "Voici un modèle général de réclamation que vous pouvez adapter :<br><br>
                <div style='background:#f9f9f9; padding:15px; border-radius:8px; border-left:4px solid #4CAF50;'>
                <strong>Objet : Réclamation concernant [sujet de votre réclamation]</strong><br><br>
                Madame, Monsieur,<br><br>
                Je suis client chez vous depuis [durée/date] sous la référence [numéro client/commande/dossier].<br><br>
                Je me permets de vous adresser cette réclamation concernant [objet précis de la réclamation] pour les raisons suivantes :<br>
                - [Fait n°1]<br>
                - [Fait n°2]<br>
                - [Conséquences pour vous]<br><br>
                Suite à cette situation, j'ai déjà entrepris les démarches suivantes : [démarches préalables si applicable].<br><br>
                Par conséquent, je vous demande de bien vouloir [solution attendue claire et précise].<br><br>
                Conformément à la réglementation en vigueur, je vous remercie de me faire parvenir une réponse sous [délai raisonnable, ex: 15 jours].<br><br>
                Je reste à votre disposition pour tout renseignement complémentaire et vous prie d'agréer, Madame, Monsieur, l'expression de mes salutations distinguées.<br><br>
                [Votre nom]<br>
                [Vos coordonnées complètes]<br>
                [Date du jour: $date]
                </div><br>
                Souhaitez-vous que je vous aide à adapter ce modèle à votre situation particulière ?"
        ];
        
        // Si le type n'existe pas dans les templates, utiliser le modèle général
        if (!isset($templates[$type])) {
            $type = 'général';
        }
        
        return $templates[$type];
    }
} 