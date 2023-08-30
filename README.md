## Installation

Clone the repository

```bash
git clone https://github.com/imalisusan/medbook-dev-backend
```

## Getting Started 🚀

```php
# Install required packages
composer install

# Generate app key
php artisan key:generate
```
## Setup the .env file

Declare database configuration values in the .env file
 
## Database Setup


```php
# Run database migrations
php artisan migrate

# Generate dummy application data for patients, genders and services
php artisan db:seed
```

## Run the Application
```php

# Start the application
php artisan serve
```

## API Endpoints
The API exposes the following endpoints:
- GET `/api/patients` - View the seeded patients
- POST `/api/patient` - Create a new patient
