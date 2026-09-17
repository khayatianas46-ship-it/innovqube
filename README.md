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

```bash
composer install
npm install
php artisan key:generate
php artisan migrate --seed
php artisan serve