# Sportius - Plateforme de gestion sportive

## Filtrage de contenu avec Kaggle

Le système intègre un filtre de contenu intelligent basé sur des données de Kaggle pour détecter les mots inappropriés dans les réclamations des utilisateurs.

### Fonctionnalités du filtrage de contenu

- **Détection automatique** : Les réclamations soumises sont automatiquement analysées pour détecter les mots inappropriés
- **Liste personnalisable** : La liste des mots inappropriés peut être facilement mise à jour dans le fichier CSV
- **Deux modes de fonctionnement** :
  - Mode blocage : Empêche la soumission et affiche les mots problématiques à l'utilisateur
  - Mode filtrage : Remplace automatiquement les mots inappropriés par des astérisques (nécessite décommenter le code)
- **Intégration avec Kaggle** : Possibilité d'utiliser des datasets Kaggle pour améliorer la liste de mots filtrés

### Configuration du filtre

1. La liste des mots à filtrer se trouve dans `data/bad_words.csv`
2. Vous pouvez ajouter de nouveaux mots en ajoutant une ligne par mot dans ce fichier
3. Pour activer le mode de filtrage automatique au lieu du blocage, décommentez les sections marquées dans le contrôleur ReclamationController.php

### Utilisation de l'API Kaggle

Pour utiliser directement les datasets Kaggle, vous devez :

1. Créer un compte sur Kaggle et générer une clé API
2. Décommenter et configurer la section d'API Kaggle dans `ContentFilterService.php`
3. Spécifier le dataset Kaggle à utiliser

## Installation

[Instructions d'installation existantes...] 