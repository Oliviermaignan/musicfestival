# Formulaire de Réservation pour un Festival

Ce projet est un formulaire de réservation pour un festival avec fonctionnalité d'inscription en base de données. Il permet aux utilisateurs de saisir leurs informations et de réserver leur place pour le festival.

## Configuration

### Fichier de Configuration (config.php)

Le fichier de configuration `config.php` est utilisé pour spécifier les paramètres du projet. Voici un exemple de contenu :

```
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_webapp__9');
define('DB_USER', 'my_webapp__9');
define('DB_PWD', 'yourPSW');

define('HOME_URL', '/olivier/musicfestival/public/');

define('DB_INITIALIZED', TRUE);
```

- `DB_HOST`: L'adresse de l'hôte de la base de données.
- `DB_NAME`: Le nom de la base de données.
- `DB_USER`: Le nom d'utilisateur pour se connecter à la base de données.
- `DB_PWD`: Le mot de passe pour se connecter à la base de données.
- `HOME_URL`: L'url de la page d'accueil.


### Installation

1. Cloner ce dépôt : `git clone https://github.com/Oliviermaignan/musicfestival`
2. Créer une base de données MySQL et importer le schéma .sql.
3. Remplir les informations de configuration dans le fichier `config.php`.
4. Lancer le serveur PHP (local via wamp)

## Fonctionnalités

- **Formulaire de Réservation**: Les utilisateurs peuvent remplir un formulaire pour réserver leur place au festival.
- **Inscription en Base de Données**: Les informations des utilisateurs sont enregistrées dans une base de données MySQL.
- **Validation des Données**: Les données saisies par les utilisateurs sont validées côté serveur pour assurer leur cohérence.

## Fonctionnalités A VENIR

- **Sécurité**: Les mots de passe sont stockés de manière sécurisée en utilisant le hachage bcrypt.
- **Gestion des Erreurs**: Gestion des erreurs pour une expérience utilisateur fluide.
- **Gestion des Reservations**: Gestion des reservations pour tous les utilisateurs.
- **Compte administrateur**: L'administrateur peut modifier les informations des reservations.

## Technologies Utilisées

- php
- MySQL
- HTML/CSS
- JavaScript
