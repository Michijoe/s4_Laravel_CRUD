# Plateforme de partage étudiants - Laravel CRUD

<!-- TABLE OF CONTENTS -->
<details>
  <summary>🏁 Sommaire</summary>
  <ol>
    <li><a href="#-intro">Intro</a></li>
    <li><a href="#-features">Features</a></li>
    <li><a href="#-command-lines">Command lines</a></li>
    <li><a href="#-built-with">Built with</a></li>
  </ol>
</details>

## ⚡ Intro

Création d'une application web avec Laravel et SQL qui propose aux étudiants d'un collège un espace virtuel pour partager de l'information et des documents.

Un étudiant inscrit sur la plateforme doit se connecter à son compte pour accéder au contenu.
Chaque étudiant connecté peut ajouter un nouvel étudiant qui recevra un courriel d'activation de compte.
Une fois connecté, un étudiant peut accéder à la liste de tous les étudiants et de leurs informations, à tous les articles et à tous les fichiers partagés.
Un étudiant peut modifier ou supprimer ses propres informations, ainsi que les articles qu'il a rédigés et les fichiers qu'il a partagés.

La plateforme est multilingue, anglais (par défaut) et français.
Tout le contenu du site peut être affiché en anglais ou en français. 
Les étudiants sont invités à créer du contenu dans les deux langues, l'anglais est obligatoire et le français est optionnel.

**Testez l'application avec un utilisateur par défaut**
- courriel : tbins@example.com
- mdp : Maisonneuve!1234

Lien vers l'application : [NewLodge College Network](https://network.johannapenet.com/)

## 🎯 Features

#### Login
- Se connecter à son compte
- Réinitialiser son mot de passe
- Création d'un nouveau mot de passe à partir du lien d'activation
- Se déconnecter

#### Choix de langue
- Choisir l'affichage en anglais ou en français

#### Liste des étudiants
- Afficher tous les étudiants
- Naviguer dans la liste grâce à une pagination
- Créer un nouvel étudiant
- Afficher le détail d'un étudiant
- Modifier et supprimer les informations de l'étudiant connecté

#### Liste des articles
- Afficher tous les articles
- Naviguer dans la liste grâce à une pagination
- Créer un nouvel article
- Afficher le détail d'un article
- Modifier et supprimer un article (quand l'auteur est l'utilisateur connecté)

#### Liste des fichiers
- Afficher tous les fichiers
- Naviguer dans la liste grâce à une pagination
- Déposer un nouveau fichier
- Télécharger un fichier
- Modifier et supprimer un fichier (quand l'auteur est l'utilisateur connecté)

## 🚀 Command lines

*Création du projet*
`composer create-project --prefer-dist laravel/laravel Maisonneuve2296540`

*Création des modèles*
  `php artisan make:model Etudiant -m`
  `php artisan make:model Ville -m`
  `php artisan make:model ForumPost -m`
  `php artisan make:model DocFile -m`

*Création des tables*
`php artisan migrate`

*Génération de données de tests (15 villes, 100 étudiants, 20 articles)*
`php artisan make:factory VilleFactory`
`php artisan make:factory EtudiantFactory`
`php artisan make:factory ForumPostFactory`
`php artisan tinker`
`\App\Models\Ville::factory()->times(15)->create()`
`\App\Models\Etudiant::factory()->times(100)->create()`
`\App\Models\ForumPost::factory()->times(20)->create()`

*Création des controllers*
`php artisan make:controller EtudiantController -m Etudiant`
`php artisan make:controller CustomAuthController -m User`
`php artisan make:controller ForumPostController -m ForumPost`
`php artisan make:controller DocFileController -m DocFile`
`php artisan make:controller LocalizationController`

*Création du dossier lang et du middleware multilangue*
`php artisan lang:publish`
`php artisan make:middleware Localization`

## 🤖 Built With
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white) ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)