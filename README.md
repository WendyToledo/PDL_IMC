# Projet de développement logiciel - Calcul de l'IMC

## Organisation du projet
Ce projet fait partie d'un **TP** dont le but est de développer un projet logiciel de manière collaborative en équipe. Nous avons choisi de travailler sur un **service web de calcul de l'IMC** avec des fonctionnalités d'inscription, de connexion, et de gestion des données de poids et de taille des utilisateurs. À terme, d'autres fonctionnalités telles que l'envoi d'emails de notification pourront être ajoutées.

L'objectif est de construire ce service de manière **agile**, en utilisant le framework **Scrum** pour simuler le développement d'un produit avec un client/product owner (enseignant).

### Membres de l'équipe
Nous sommes un groupe de 5 personnes :

- **Abouyassine Hafsa** : Responsable de la création de la base de données.
- **Membre 2** : 
- **Membre 3** : 
- **Membre 4** : 
- **Membre 5** : 

## Description du projet
Le projet consiste à développer un **web service de calcul de l'IMC** (Indice de Masse Corporelle). Le service permet aux utilisateurs de s'inscrire, se connecter, et sauvegarder leurs dernières mesures (poids, taille) pour calculer leur IMC.

### Fonctionnalités à implémenter :
1. **Inscription et Connexion des utilisateurs** avec stockage sécurisé des mots de passe.
2. **Calcul de l'IMC** basé sur les mesures de poids et de taille de l'utilisateur.
3. **Gestion des sessions utilisateurs** (connexion/déconnexion).
4. **Stockage des mesures récentes** de poids et taille pour chaque utilisateur.
5. Fonctionnalités futures (en discussion) :
   - Notifications par email (ex. résultats d'IMC, rappels de sport).

### Technologie
Le projet sera développé en utilisant :
- **Backend** : Php pour la gestion des routes API.
- **Base de données** : PostgreSQL pour stocker les informations des utilisateurs et leurs mesures.
- **Frontend** : HTML/CSS/JavaScript pour l'interface utilisateur.
- **Sécurité** : Hashage des mots de passe et gestion sécurisée des sessions.

## Processus de développement
Nous suivons la méthode **Scrum** pour organiser notre travail :

1. **Sprints** : Chaque séance de TP représente un sprint de développement.
2. **Rôle du client/product owner** : L'enseignant joue le rôle du client/PO. Il nous donne les besoins et retours à chaque sprint, et peut ajuster les demandes selon les besoins.
3. **Réunions de sprint** : À la fin de chaque séance, nous présentons une **démo** des fonctionnalités développées et discutons des éléments à prioriser pour le prochain sprint.

## Tâches en cours

### Sprint actuel
Nous sommes actuellement en train de travailler sur la mise en place de la base de données et l'implémentation des API de base pour la gestion des utilisateurs. 

- **Création de la base de données** : 
  - Tables créées :
    - `users` : pour stocker les informations des utilisateurs (email, mot de passe, date de création).
    - `measurements` : pour enregistrer les mesures de poids et taille de chaque utilisateur, ainsi que l'IMC calculé.
    - `sessions` : pour gérer les connexions et déconnexions des utilisateurs avec des jetons de session.

### Prochaine étape
- **API backend** : Implémentation des endpoints pour l'inscription, la connexion, et la gestion des mesures de poids/taille.
- **Tests unitaires** : Vérification de la sécurité et de l'intégrité des données.

## Structure de la base de données

Voici un aperçu des tables de la base de données actuellement en cours de création :

### Table `users`
| Champ          | Type         | Description                       |
|----------------|--------------|-----------------------------------|
| id             | SERIAL (PK)  | Identifiant unique                |
| email          | VARCHAR(255) | Email de l'utilisateur (unique)   |
| password_hash  | VARCHAR(255) | Mot de passe haché                |
| created_at     | TIMESTAMP    | Date de création du compte        |
| last_login     | TIMESTAMP    | Dernière date de connexion        |

### Table `measurements`
| Champ          | Type         | Description                       |
|----------------|--------------|-----------------------------------|
| id             | SERIAL (PK)  | Identifiant unique de la mesure   |
| user_id        | INT (FK)     | Référence vers l'utilisateur      |
| weight         | DECIMAL(5,2) | Poids de l'utilisateur (en kg)    |
| height         | DECIMAL(4,2) | Taille de l'utilisateur (en m)    |
| calculated_imc | DECIMAL(4,2) | IMC calculé                       |
| taken_at       | TIMESTAMP    | Date et heure de la mesure        |

### Table `sessions`
| Champ          | Type         | Description                       |
|----------------|--------------|-----------------------------------|
| id             | SERIAL (PK)  | Identifiant unique de la session  |
| user_id        | INT (FK)     | Référence vers l'utilisateur      |
| session_token  | VARCHAR(255) | Jeton de session unique           |
| created_at     | TIMESTAMP    | Date de création de la session    |
| expires_at     | TIMESTAMP    | Date d'expiration de la session   |

## Comment contribuer
1. Clonez le projet : `git clone https://github.com/monrepo/projet-imc.git`
2. Créez une branche pour vos modifications : `git checkout -b feature-nomdelatâche`
3. Faites vos modifications et validez-les : `git commit -m "Ajout de fonctionnalité"`
4. Poussez vos changements : `git push origin feature-nomdelatâche`
5. Créez une Pull Request et assignez-la à un relecteur.

## Licence
