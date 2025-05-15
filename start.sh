#!/bin/bash

# Ensure Laravel required folders exist
mkdir -p bootstrap/cache
mkdir -p storage/framework/views
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/logs

chmod -R 775 bootstrap/cache
chmod -R 775 storage

# Laravel setup
cp .env.example .env || true
touch database/database.sqlite
composer install
php artisan key:generate
php artisan migrate --seed

# Serve Laravel
php artisan serve --host=0.0.0.0 --port=8000