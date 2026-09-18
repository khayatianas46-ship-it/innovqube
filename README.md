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
- Consultation de mes réservations
- Annulation de ses propres réservations
- Administration avec Filament
- CRUD des propriétés
- CRUD des réservations
- Validation côté serveur
- Authorization avec Policies

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

Puis configurer les informations MySQL dans `.env` :

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

### 8. Compiler les assets frontend

Pour une version prête à utiliser :

```bash
npm run build
```

### 9. Démarrer l'application

```bash
php artisan serve
```

L'application est disponible sur :

```text
http://127.0.0.1:8000
```

L'administration Filament est disponible sur :

```text
http://127.0.0.1:8000/admin
```

### Développement frontend

Pendant le développement, `npm run dev` peut être utilisé à la place de `npm run build` :

```bash
npm run dev
```

Dans ce cas, laisser le terminal Vite ouvert et lancer Laravel dans un autre terminal :

```bash
php artisan serve
```

## Tests

Pour lancer les tests :

```bash
php artisan test
```

Résultat actuel :

```text
28 tests passed
65 assertions
```

## Données de démonstration

Le seeder crée 10 propriétés de démonstration.

## Auteur

Anas Khayati
