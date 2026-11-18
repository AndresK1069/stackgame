# CAHIER DES CHARGES

## 1. Introduction
Nous sommes une équipe de 4 étudiants travaillant sur un projet informatique s'étalant sur les semestres 3 et 4. L’objectif de ce projet est de mettre en place une plateforme web proposant différents types de jeux, défis ou énigmes, développée en **PHP** et **SQL**.

Le site comportera :
* Une **page d’accueil** avec un text explicatif,
* Un **tableau de bord** regroupant les différents modules,
* Un **système de journalisation (logs)** pour enregistrer toutes les actions réalisées.

---

## 2. Énoncé et Rôles Utilisateurs
La plateforme est conçue pour accueillir **quatre types d'utilisateurs** disposant de droits distincts :

### 2.1. Visiteur
* Accès non authentifié.
* Consultation de la page d'accueil.
* Accès aux modules.

### 2.2. Joueur
* Accès authentifié.
* Possibilité de suspendre un défi commencé et de le reprendre ultérieurement.

### 2.3. Administrateur Web
* **Identifiants imposés :** `adminweb` / `adminweb`

### 2.4. Administrateur Système
* **Identifiants imposés :** `adminsys` / `adminsys`
* Pas d'accès aux fonctionnalités métier (gestion de parc).
* Accès exclusif aux **journaux d’activités (logs)** pour surveiller l'activité et la sécurité de la plateforme.

---

## 3. Pré-requis Techniques
L'application sera installée sur un serveur **Raspberry Pi 4 (RPi4)** ou **Raspberry Pi 5 (RPi5)** accessible via le réseau local.

* **Système :** Un compte utilisateur système obligatoire :
  * **Login :** `sae26`
  * **Mot de passe :** `!sae26!`
* **Services :** Installation d'un serveur Web (**Apache**) et d'un SGBD (**SQL**).
* **Sécurité :** Mise en place d'applications pour sécuriser les accès SSH.
* **Versionning :** Le code et la documentation doivent être hébergés sur un dépôt **Git** GitHub partagé.

---

## 4. Priorités et Livrables

### 4.1. Conception et Maquettage
* Réécriture du cahier des charges et dossiers de conception.
* Mise en ligne d'une version statique HTML (navigation et formulaires fictifs).
* Justification du choix du logo.

### 4.2. Développement
* Mise en place de l'authentification, de l’inscription et de la gestion des rôles.
* Déploiement des différents modules (jeux, défis, énigmes).
* Gestion des fichiers logs pour l'administrateur système.

### 4.3. Maintenance et Documentation
* Documentation complète du code et du projet disponible sur le dépôt Git.
* Mises à jour régulières du code.
* Communication professionnelle (mails) avec les intervenants.