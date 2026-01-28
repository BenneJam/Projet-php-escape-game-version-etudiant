# 🎮 Moteur d'Escape Game Numérique

> Un prototype de moteur de jeu d'escape game développé en **PHP orienté objet**.

---

## 📋 Table des matières

- [À propos](#-à-propos)
- [Fonctionnalités](#-fonctionnalités)
- [Architecture](#-architecture)
- [Installation](#-installation)
- [Utilisation](#-utilisation)
- [Classes principales](#-classes-principales)
- [Évolutions](#-évolutions)
- [Tests](#-tests)
- [Auteur](#-auteur)

---

## 🎯 À propos

Ce projet est un **prototype pédagogique d'un moteur d'escape game** en PHP. Il permet de :

- 🎲 Créer des salles avec plusieurs énigmes
- 🧩 Gérer une banque d'énigmes prédéfinies
- ⏱️ Tracker le temps de jeu avec un chronomètre
- 📊 Suivre la progression d'une équipe
- 🎯 Valider les réponses aux énigmes

Le projet applique les **principes de la programmation orientée objet** : encapsulation, abstraction, et collaboration entre classes.

---

## ✨ Fonctionnalités

### ✅ Fonctionnalités principales

- **Gestion des énigmes** : Création, résolution, vérification des réponses
- **Sessions de jeu** : Suivi de la progression d'une équipe dans une salle
- **Système de score** : Calcul des points selon les énigmes résolues
- **Chronomètre intégré** : Mesure du temps de jeu au format `mm:ss`
- **Système d'indices** : Accès à des indices pour débloquer les énigmes
- **Banque d'énigmes** : Sélection aléatoire d'énigmes pour chaque partie

### ⚙️ Architecture sans base de données

Le prototype fonctionne **100% en mémoire** :

- ❌ Pas de base de données
- ❌ Pas d'héritage
- ✅ Collaboration pure entre objets

---

## 🏗️ Architecture

### Structure du projet

```
├── src/                          # Classes PHP du moteur
│   ├── Enigme.php               # Représente une énigme
│   ├── Salle.php                # Contient les énigmes d'une salle
│   ├── BanqueEnigmes.php        # Stocke et sélectionne les énigmes
│   ├── SessionJeu.php           # Gère la progression du joueur
│   ├── Score.php                # Calcul et gestion des scores
│   └── Timer.php                # Chronomètre du jeu
├── tests/                        # Tests unitaires PHPUnit
├── documentation/               # Documentation du projet
├── escape.php                   # Script principal
└── composer.json                # Dépendances du projet
```

### Diagramme des classes

```
┌─────────────────────────────────────────────┐
│              BanqueEnigmes                   │
│  (Stocke une collection d'Enigmes)          │
└───────────────────┬─────────────────────────┘
                    │ sélectionne aléatoirement
                    ↓
┌─────────────────────────────────────────────┐
│                  Salle                       │
│  (Regroupe les Enigmes d'une salle)         │
└────────────┬────────────────────────────────┘
             │ contient
             ↓
    ┌────────────────────┐
    │     Enigme         │
    │ (Texte + Réponse)  │
    └────────────────────┘

┌─────────────────────────────────────────────┐
│            SessionJeu                        │
│ (Gère la progression du joueur dans la      │
│  Salle avec Timer et Score)                 │
└─────────────────────────────────────────────┘
```

---

## 📦 Installation

### Prérequis

- PHP 7.4 ou supérieur
- Composer

### Étapes d'installation

1. **Cloner le repository**

   ```bash
   git clone https://github.com/ton-utilisateur/projet-escape-game.git
   cd projet-escape-game
   ```

2. **Installer les dépendances**

   ```bash
   composer install
   ```

3. **Vérifier l'installation**
   ```bash
   php escape.php
   ```

---

## 🚀 Utilisation

### Lancer une partie

```bash
php escape.php
```

### Déroulement du jeu

1. 🎮 Le joueur est accueilli dans une salle
   2 🧩 Les énigmes sont présentées une par une
2. ⌨️ Le joueur rentre sa réponse
3. ✅ Le système vérifie la réponse
4. ⏱️ Le temps s'écoule jusqu'à la résolution de toutes les énigmes
5. 📊 Un récapitulatif avec le score et le temps s'affiche

### Exemple d'exécution

```
╔══════════════════════════════════════════╗
║   BIENVENUE - ESCAPE GAME NUMÉRIQUE      ║
╚══════════════════════════════════════════╝

Salle: La Chambre Mystérieuse

Énigme 1 sur 3: Quel est le contraire de blanc?
Votre réponse: noir
✓ Bonne réponse! (+10 points)

Énigme 2 sur 3: Combien de murs a un igloo?
Votre réponse: 0
✗ Mauvaise réponse. Indice: C'est une structure arrondie
...

═══════════════════════════════════════════
📊 PARTIE TERMINÉE
═══════════════════════════════════════════
Score: 30/30 points
Temps: 5:42
═══════════════════════════════════════════
```

---

## 📚 Classes principales

### 🎲 Enigme

Représente une énigme du jeu.

**Attributs** :

- `texte` : L'énoncé de l'énigme
- `reponseAttendue` : La réponse correcte
- `indice` : Un indice pour aider le joueur
- `estResolue` : Statut de résolution

**Méthodes** :

- `verifierReponse(string): bool` - Valide une réponse
- `getIndice(): string` - Fournit un indice

---

### 🏰 Salle

Contient toutes les énigmes d'une salle.

**Attributs** :

- `nom` : Nom de la salle
- `enigmes` : Liste des énigmes

**Méthodes** :

- `ajouterEnigme(Enigme): void` - Ajoute une énigme
- `obtenirEnigmes(): array` - Retourne toutes les énigmes
- `obtenirProgression(): int` - Pourcentage de completion

---

### 🗂️ BanqueEnigmes

Stocke une collection d'énigmes et propose des sélections aléatoires.

**Méthodes** :

- `ajouterEnigme(Enigme): void` - Ajoute une énigme à la banque
- `selectionnerAleatoire(int): array` - Sélectionne N énigmes aléatoires

---

### 🎮 SessionJeu

Gère la progression d'une équipe dans une salle.

**Attributs** :

- `salle` : La salle en cours
- `score` : Points accumulés
- `timer` : Chronomètre de la session

**Méthodes** :

- `verifierReponse(int, string): bool` - Valide une réponse à une énigme
- `obtenirProgression(): int` - État d'avancement
- `estTerminee(): bool` - Toutes les énigmes sont-elles résolues?

---

### ⏱️ Timer

Chronomètre pour mesurer le temps de jeu.

**Méthodes** :

- `demarrer(): void` - Lance le chronomètre
- `arreter(): void` - Arrête le chronomètre
- `obtenirDuree(): int` - Retourne la durée en secondes
- `afficherDuree(): string` - Format `mm:ss`

---

### 🏆 Score

Gère le système de points.

**Méthodes** :

- `ajouterPoints(int): void` - Ajoute des points
- `obtenirScore(): int` - Retourne le score total
- `reinitialiser(): void` - Réinitialise le score

---

## 📈 Évolutions

Le projet inclut **4 évolutions successives** qui enrichissent progressivement les fonctionnalités :

### 📌 Évolution 1 : Chronomètre

Intégration d'une classe `Timer` pour mesurer le temps de jeu.

### 📌 Évolution 2 : Système de Score

Ajout d'une classe `Score` pour tracker les points du joueur.

### 📌 Évolution 3 : Améliorations UI

Amélioration de l'interface avec le CLI library [League/Climate](https://climate.thephpleague.com/).

### 📌 Évolution 4 : Fonctionnalités avancées

Ajout de mécaniques supplémentaires (indices, mode difficile, etc.).

Consultez la documentation complète dans le dossier [`documentation/`](documentation/).

---

## 🧪 Tests

Le projet inclut une **suite de tests unitaires** avec PHPUnit.

### Exécuter les tests

```bash
composer test
```

ou directement :

```bash
vendor/bin/phpunit tests/
```

### Tests disponibles

- ✅ `EnigmeTest.php` - Tests de vérification des réponses
- ✅ `SalleTest.php` - Tests de gestion des énigmes
- ✅ `BanqueEnigmesTest.php` - Tests de sélection aléatoire
- ✅ `SessionJeuTest.php` - Tests de progression du jeu
- ✅ `TimerTest.php` - Tests du chronomètre

---

## 🛠️ Dépendances

### Production

- **league/climate** `^3.10` - Bibliothèque pour une meilleure UX en CLI

### Développement

- **phpunit** - Framework de test unitaire

---

## 📖 Documentation

- [Énoncé complet du projet](documentation/enonce.md)
- [Évolution 1 - Chronomètre](documentation/evolution1/evolution-1.md)
- [Évolution 2 - Système de Score](documentation/evolution2/evolution-2.md)
- [Évolution 3 - Améliorations UI](documentation/evolution3/evolution-3.md)
- [Évolution 4 - Fonctionnalités avancées](documentation/evolution4/evolution-4.md)

---

## 🎓 Objectifs pédagogiques

Ce projet a été conçu pour enseigner :

- ✅ **L'encapsulation** - Attributs privés et accesseurs
- ✅ **L'abstraction** - Masquer la complexité derrière des interfaces simples
- ✅ **La collaboration** - Interaction entre plusieurs objets
- ✅ **La modélisation** - Concevoir une architecture logicielle
- ✅ **Les tests unitaires** - Valider le code
- ✅ **Les bonnes pratiques** - Code lisible et maintenable

---

## 👤 Auteur

**BenneJam** - Benji Markiewicz  
📧 benji.marki70@gmail.com

---

**Amusez-vous bien avec le moteur d'Escape Game! 🎉**
