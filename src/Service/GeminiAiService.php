<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Reclamation;

class GeminiAiService
{
    private string $apiKey;
    private string $projectId;
    private string $modelId;
    private HttpClientInterface $httpClient;

    public function __construct(
        ParameterBagInterface $parameterBag,
        HttpClientInterface $httpClient
    ) {
        $this->apiKey = $parameterBag->get('gemini_api_key');
        $this->projectId = $parameterBag->get('google_cloud_project_id');
        $this->modelId = $parameterBag->get('gemini_model_id');
        $this->httpClient = $httpClient;
    }

    public function generateResponse(Reclamation $reclamation): string
    {
        $prompt = $this->createPrompt($reclamation);
        
        try {
            $response = $this->httpClient->request('POST', 'https://generativelanguage.googleapis.com/v1beta/models/' . $this->modelId . ':generateContent', [
                'query' => [
                    'key' => $this->apiKey
                ],
                'json' => [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ],
                    'safetySettings' => [
                        [
                            'category' => 'HARM_CATEGORY_HARASSMENT',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                        ],
                        [
                            'category' => 'HARM_CATEGORY_HATE_SPEECH',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE'
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'topK' => 40,
                        'topP' => 0.95,
                        'maxOutputTokens' => 1024
                    ]
                ],
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return $data['candidates'][0]['content']['parts'][0]['text'];
            } else {
                return "Je suis désolé, je n'ai pas pu générer une réponse pertinente. Veuillez vérifier le message de réclamation et réessayer.";
            }
        } catch (\Exception $e) {
            return "Une erreur s'est produite lors de la génération de la réponse: " . $e->getMessage();
        }
    }

    private function createPrompt(Reclamation $reclamation): string
    {
        $message = $reclamation->getMessage();
        $status = $reclamation->getStatus();
        
        return <<<EOT
Tu es un assistant du service client chez Sportify, une plateforme de gestion d'événements sportifs. 
Ta tâche est de répondre à la réclamation suivante de manière professionnelle, courtoise et utile.

Réclamation: "$message"

Statut actuel: $status

Génère une réponse en français qui:
1. Comprend et répond directement au problème soulevé
2. Est empathique et professionnelle
3. Propose des solutions concrètes si possible
4. Remercie l'utilisateur pour sa patience et son retour
5. S'excuse pour tout désagrément causé
6. Termine par une formule de politesse appropriée

Ta réponse doit être complète mais concise (maximum 300 mots).
EOT;
    }
} 