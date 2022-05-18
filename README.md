
# Plateforme de téléchargement d'animes


Projet PHP à réaliser pendant l'Année Spéciale en IUT.

Il s'agit d'une plateforme de téléchargement d'animes.
## Authors

- [@JonathanMAROTTA](https://github.com/JonathanMAROTTA)
- [@Sanngithub (Bernard NGUYEN)](https://github.com/Sanngithub)
## Features

- Création de compte(s) utilisateur(s)
- Authentification requise pour accéder au site
- Interface "Mon Profil" permettant de mettre à jour les données de son profil ou le supprimer
- Listing des animes disponibles sur le site (présentation via jaquettes)
- Fonctionnalités de gestion des animes (ajout, modification, suppression)
- La modification d'un anime n'est possible que lorsqu'un utilisateur en est le créateur
- Fonctionnalité de recherche des animes par Genre, par Titre
- Accès au détails d'un anime pour téléchargement d'un .torrent
- Page "About Us" pour nous contacter
## Optimizations

- Si un utilisateur supprime son compte, la gestion de ses animes est transférée au compte administrateur (idUser=1)
- Ajout d'une favicon pour améliorer l'identification de notre plateforme

## Charte graphique

- Choix d'une image d'accueil reflétant la thématique de la plateforme
- Choix de la police Aclonica rappelant l'univers du Japon et de l'univers Manga/animes
- Listing des animes via jaquettes pour améliorer l'expérience utilisateur
- Reprise de la police Aclonica dans le logo de la plateforme disponible dans le favicon d'onglet
## Installation

- Cloner le projet Git
- Lancer un serveur PHP (e.g. : Apache) avec gestion de base de données (e.g. : MySQL)
- Créer une nouvelle base de donnée (nom : "superanimes")
- Importer le fichier superanimes.sql
- URL de la page d'accueil : /vue/index.php
## Comptes utilisateurs

Ci-dessous les comptes utilisateurs disponibles après import de la base de données :

- admin ---------------------   Passw0rd!
- jon   ------------------------   sup3rp@ssword
- sann  -----------------------   MyPa$$word1
- DummyOne  ---------------   azerty_1
- DummyTwo  ---------------   azerty_1
- DummyThree    -------------   azerty_1
- DummyFour --------------   azerty_1
- DummyFive ---------------   azerty_1
- DummySix  ----------------   azerty_1
- DummySeven    -------------   azerty_1
- DummyEight    --------------   azerty_1
- DummyNine --------------   azerty_1
- DummyTen  ---------------   azerty_1

## To-Do

- Faire fonctionner updateAnime.php
- Gestion de vote & note pour les animes
- Ajouter Captcha dans register_verification pour limiter l'action des robots
- Auto-complétion sur Search-Title via AJAX
## Demo

![alt text](https://github.com/Sanngithub/ProjetPHP/blob/main/pictures/demo0.png?raw=true)

![alt text](https://github.com/Sanngithub/ProjetPHP/blob/main/pictures/demo10.png?raw=true)

![alt text](https://github.com/Sanngithub/ProjetPHP/blob/main/pictures/demo20.png?raw=true)

![alt text](https://github.com/Sanngithub/ProjetPHP/blob/main/pictures/demo30.png?raw=true)

![alt text](https://github.com/Sanngithub/ProjetPHP/blob/main/pictures/demo40.png?raw=true)
