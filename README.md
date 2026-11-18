# SAÉ 3 & 4 (2026) — Plateforme Web de Jeux & Défis

> **Responsable / Contact :** Fabrice Hoguin ([fabrice.hoguin@uvsq.fr](mailto:fabrice.hoguin@uvsq.fr))  
> **Espace Numérique :** e-campus (IN3SA01)  
> **Projet sur 2 semestres :** Semestre 3 & Semestre 4  

---

## Presentation du Projet

Ce projet vise à concevoir, déployer et sécuriser une **plateforme web dynamique** hébergée sur une carte Raspberry Pi (RPi4 ou RPi5). La plateforme proposera différents **modules de jeux, défis et énigmes**, tout en intégrant une gestion stricte des droits d'accès et un journal complet des activités (logs).

---

##  Organisation & Modalités

- **Taille des équipes :** Groupes de 4 étudiants (exceptionnellement 5).
- **Évaluation & Répartition des notes :**
  - **Ressources (cours/TP) :** 60 %
  - **SAÉ (Projet) :** 40 %
  - *Remarque :* En raison de l'utilisation des IA, les évaluations pourront prendre la forme d'interrogations écrites sur papier ou d'oraux individuels.
- **Respect des délais :** Tout retard dans les rendus sera lourdement sanctionné (note inférieure à la moyenne).

---

## Ressources Impliquées (Semestre 3)

| Code | Intitulé de la ressource |
| :--- | :--- |
| **R301** | Développement web |
| **R302** | Développement efficace |
| **R303** | Analyse |
| **R304** | Qualité de développement |
| **R305 / R306** | Programmation système & Architecture réseau |
| **R307** | SQL dans un langage de programmation |
| **R308** | Probabilités |
| **R309** | Cryptographie et sécurité |
| **R310 / R311** | Management des SI et droit des contrats numériques |
| **R312** | Anglais |
| **R313** | Communication professionnelle |

---

## Architecture Technique & Environnement

### Stack Technique
- **Langages & Serveur Web :** PHP, HTML/CSS, JavaScript, Serveur Apache (ou équivalent).
- **Base de données :** MySQL / SGBD Relationnel.
- **Matériel :** Raspberry Pi 4 ou 5 (accès SSH depuis les salles machines).

### Identifiants & Configurations Imposés

> **ATTENTION :** Les identifiants et paramètres obligatoires ci-dessous **ne doivent en aucun cas être modifiés**.

#### 1. Utilisateur Système (Raspberry Pi)
- **Utilisateur :** `sae26`
- **Mot de passe :** `!sae26!`
*(Possibilité de créer d'autres utilisateurs système sur le RPi si nécessaire).*

#### 2. Administrateur Web
- **Login :** `adminweb`
- **Mot de passe :** `adminweb`

#### 3. Administrateur Système (Interface Web)
- **Login :** `adminsys`
- **Mot de passe :** `adminsys`

---

## Rôles & Profils Utilisateurs

1. **Visiteur :** Accès public à la plateforme.
2. **Joueur Inscrit :**
   - Inscription sur la plateforme (sans confirmation requise).
   - Modification du mot de passe depuis le profil.
   - Demande de désinscription auprès de l'administrateur web.
   - Possibilité de suspendre un défi en cours et de le reprendre ultérieurement.
3. **Administrateur Web (`adminweb`) :** Unicité en base de données. Gère les utilisateurs et la plateforme.
4. **Administrateur Système (`adminsys`) :** N'intervient pas dans les activités de jeu. Accède exclusivement aux **journaux d'activité (logs)** de l'application via l'interface web.

---

## Livrables & Travaux à Réaliser

- [ ] **Cahier des charges :** Réécriture complète après étude détaillée du sujet et ajustements.
- [ ] **Plateforme statique HTML :**
  - Accessible via l'alias : `http://<IP_RPI>/html`
  - Inclut la navigation fictive (Accueil $\rightarrow$ Authentification).
  - Formulaire de module fictif avec affichage de résultats fictifs.
- [ ] **Dossier de communication :** Rédaction de la justification du choix du logo de la plateforme.
- [ ] **Présentation orale en anglais :** Exposé sur le projet.
- [ ] **Dossiers de conception UML :**
  - Fin novembre au plus tard.
  - Diagramme structurel UML.
  - Diagramme dynamique UML.
- [ ] **Dépôt Git (GitHub / GitLab) :**
  - Partagé avec tous les enseignants concernés.
  - Doit contenir : Code source à jour, documentation complète et dossier de présentation.

---

## Règles de Sécurité & Bonnes Pratiques

- **Interdiction de piratage :** Il est strictement interdit de tenter de pirater le matériel ou l'application d'un autre groupe. Les RPi sont surveillés sur le réseau de l'IUT. Toute tentative entraînera de lourdes sanctions.
- **Entraide autorisée :** Il est vivement encouragé de s'entraider entre groupes en testant mutuellement vos systèmes et applications web.
- **Communication client :** La communication par e-mail avec les différents interlocuteurs/clients est fortement recommandée.
