# Software Engineer Interview Assignment — Sheba Platform Ltd.


### Core Features - Using Laravel 12
 - Service Listing API ((https://github.com/zobay/sheba/pull/1)): A paginated API that returns a list of available services with name, category, price, and description.
 - Service Booking API (https://github.com/zobay/sheba/pull/2) : Customers can book a service with their name, phone number, and service ID.
 - Booking Status API (https://github.com/zobay/sheba/pull/3) : Customers can check the status of their booking using a unique booking ID.

## Requirements

Before you begin, make sure you have the following installed:

- PHP >= 8.2
- Composer
- MySQL or any supported database
- Git (optional but recommended)

## Installation

Follow these steps to set up the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-laravel-project.git
cd your-laravel-project
```

### Install PHP Dependencies
```php
composer install
```

### Copy and Configure Environment File
```php
cp .env.example .env
```

### Generate Application Key
```php
php artisan key:generate
```

### Run Migrations
```php
php artisan migrate
```

### Start the Development Server
```php
php artisan serve
```


### Api Documentation
https://documenter.getpostman.com/view/4301061/2sB2j989TT

### How to run tests
```php
php artisan test
```
