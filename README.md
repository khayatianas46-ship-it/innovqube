# InnovQube Booking

Application web de gestion de réservations immobilières développée avec Laravel, Livewire et Filament.

## Technologies

- Laravel 12
- PHP 8.2+
- MySQL
- Laravel Breeze
- Livewire 3
- Filament 3
- Tailwind CSS
- PHPUnit
- Vite

## Fonctionnalités

- Catalogue des propriétés
- Recherche de propriétés
- Filtre de disponibilité par dates
- Pagination
- Création de réservations
- Calcul automatique du prix total
- Vérification des chevauchements
- Consultation de ses réservations
- Annulation de ses propres réservations
- Administration avec Filament
- CRUD des propriétés
- CRUD des réservations
- Filtres dans l'administration
- Validation côté serveur
- Authorization avec Policies
- Tests automatisés

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/khayatianas46-ship-it/innovqube.git
cd innovqube
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances frontend

```bash
npm install
```

### 4. Configurer l'environnement

Copier le fichier `.env.example` vers `.env` :

```powershell
Copy-Item .env.example .env
```

Configurer ensuite les informations MySQL dans `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=innovqube_booking
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Générer la clé Laravel

```bash
php artisan key:generate
```

### 6. Créer la base de données

Créer une base de données MySQL nommée :

```text
innovqube_booking
```

### 7. Lancer les migrations et le seeder

```bash
php artisan migrate --seed
```

Le seeder crée automatiquement 10 propriétés de démonstration.

> Le compte administrateur doit être créé séparément si aucun administrateur n'existe encore dans la base.

### 8. Compiler les assets frontend

Pour une version prête à utiliser :

```bash
npm run build
```

### 9. Démarrer l'application

```bash
php artisan serve
```

L'application est disponible à :

```text
http://127.0.0.1:8000
```

L'administration Filament est disponible à :

```text
http://127.0.0.1:8000/admin
```

L'accès à l'administration est réservé aux utilisateurs possédant le rôle administrateur.

## Développement frontend

Pendant le développement, `npm run dev` peut être utilisé :

```bash
npm run dev
```

Dans ce cas, laisser le terminal Vite ouvert et lancer Laravel dans un autre terminal :

```bash
php artisan serve
```

## Tests

Les tests utilisent une base de données MySQL séparée afin de ne pas modifier la base de développement.

Créer une base de données MySQL dédiée aux tests :

```text
innovqube_booking_test
```

La configuration PHPUnit utilise automatiquement cette base.

Pour lancer les tests :

```bash
php artisan test
```

Résultat actuel :

```text
28 tests passed
65 assertions
```

Les tests couvrent notamment :

- Le calcul du prix d'une réservation
- La détection des chevauchements
- L'autorisation d'annuler uniquement ses propres réservations

## Données de démonstration

Le seeder crée 10 propriétés de démonstration avec :

- Un nom
- Une description
- Un prix par nuit
- Une capacité

## Sécurité

- Le fichier `.env` n'est pas versionné.
- Les identifiants sensibles ne sont pas inclus dans le dépôt.
- L'accès à Filament est réservé aux administrateurs.
- Les réservations sont protégées par des Policies.
- Les tests utilisent une base de données séparée.

## Auteur

**Anas Khayati**
