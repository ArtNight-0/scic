<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Laravel Docker Development Environment Setup Guide

This guide will walk you through setting up a Laravel development environment using Docker, complete with Nginx, MySQL, and automated database backups.

## Table of Contents
- [Prerequisites](#prerequisites)
- [Project Setup](#project-setup)
- [Docker Configuration](#docker-configuration)
- [Running the Application](#running-the-application)
- [Database Management](#database-management)
- [Troubleshooting](#troubleshooting)

## Prerequisites

Make sure you have the following installed on your system:
- Docker
- Docker Compose
- Git (optional)

## Project Setup

1. Create your project directory:
```bash
mkdir my-laravel-docker
cd my-laravel-docker
```

2. Create the necessary subdirectories:
```bash
mkdir -p nginx/conf.d scripts backups
```

3. Create all required files with the following structure:
```
my-laravel-docker/
├── docker-compose.yml
├── Dockerfile
├── Dockerfile.backup
├── nginx/
│   └── conf.d/
│       └── default.conf
└── scripts/
    ├── backup.sh
    └── entrypoint.sh
```



## Running the Application

1. Create `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
*DB_USERNAME cannot be root

2. Start the containers:
```bash
docker-compose up -d --build
```

3. Install Laravel dependencies:
```bash
docker-compose exec app composer install
```

4. Set up Laravel:
```bash
# Generate application key
docker-compose exec app php artisan key:generate

# Create storage link
docker-compose exec app php artisan storage:link

# Clear config cache
docker-compose exec app php artisan config:clear

# Run migrations
docker-compose exec app php artisan migrate

# Optional: Seed the database
docker-compose exec app php artisan db:seed
```

## Database Management

### Running Migrations
```bash
# Basic migration
docker-compose exec app php artisan migrate

# Fresh migration (drops all tables)
docker-compose exec app php artisan migrate:fresh

# Migration with seeding
docker-compose exec app php artisan migrate:fresh --seed
```

### Database Backups
Backups are automatically created daily at midnight and stored in the `backups` directory.

To manually trigger a backup:
```bash
docker-compose exec backup /scripts/backup.sh
```

To view backup files:
```bash
ls -l backups/
```

## Troubleshooting

### Permission Issues
If you encounter permission issues:
```bash
docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
```

### Database Connection Issues
Check database connection:
```bash
docker-compose exec app php artisan tinker
>>> DB::connection()->getPdo();
```

### Container Issues
Check container status:
```bash
# View all containers
docker-compose ps

# View container logs
docker-compose logs

# View specific service logs
docker-compose logs app
docker-compose logs db
```

### Rebuilding
If you need to rebuild everything:
```bash
docker-compose down
docker-compose up -d --build
```

## Additional Commands

### Container Access
```bash
# Access PHP container
docker-compose exec app bash

# Access MySQL container
docker-compose exec db bash

# Access MySQL CLI
docker-compose exec db mysql -u root -p
```

### Laravel Commands
```bash
# Clear various caches
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear
docker-compose exec app php artisan view:clear

# Create a new controller
docker-compose exec app php artisan make:controller YourController

# Create a new model
docker-compose exec app php artisan make:model YourModel
```

## Contributing
Feel free to fork this setup and customize it for your needs. If you find any issues or have improvements, please submit a pull request.
