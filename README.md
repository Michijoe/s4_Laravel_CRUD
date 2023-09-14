# Annuaire étudiants - Laravel CRUD

<!-- TABLE OF CONTENTS -->
<details>
  <summary>🏁 Sommaire</summary>
  <ol>
    <li><a href="#-intro">Intro</a></li>
    <li><a href="#-command-lines">Command lines</a></li>
    <li><a href="#-features">Features</a></li>
    <li><a href="#-built-with">Built with</a></li>
  </ol>
</details>

## ⚡ Intro

Le mandat est de créer un site Internet pour recueillir de l'information auprès des étudiants du Collège Maisonneuve, et possiblement à l'avenir, de construire un réseau social pour eux.
La première étape consiste à rassembler les informations, remplir la base de données avec des données aléatoires et créer les interfaces fonctionnelles pour visualiser, saisir, mettre à jour et supprimer les étudiants,

Lien vers le projet sur webdev : [webdev](https://e2296540.webdev.cmaisonneuve.qc.ca/annuaire/)

## 🚀 Command lines

- Création du projet
`composer create-project --prefer-dist laravel/laravel Maisonneuve2296540`
- Création des modèles
`php artisan make:model Etudiant -m`
`php artisan make:model Ville -m`
- Création des tables
`php artisan migrate`
- Saisie de 15 nouvelles villes
`php artisan make:factory VilleFactory`
`php artisan tinker`
`\App\Models\Ville::factory()->times(15)->create()`
- Saisie de 100 nouveaux étudiants
`php artisan make:factory EtudiantFactory`
`php artisan tinker`
`\App\Models\Etudiant::factory()->times(100)->create()`
- Création d'un controller
`php artisan make:controller EtudiantController -m Etudiant`

## 🎯 Features

1. Afficher tous les étudiants
2. Naviguer dans la liste grâce à une pagination
3. Ajouter un nouvel étudiant à la liste
4. Afficher le détail d'un étudiant
5. Modifier les informations d'un étudiant
6. Supprimer un étudiant

## 🤖 Built With
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white) ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

## 🌐 Screenshots

![Home page](./screenshot.png)