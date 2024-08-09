
## Authors

- [@awal2645](https://github.com/awal2645)


## Installation

# Time Tracking System API

This is a Laravel-based Time Tracking System API designed to manage employees and their work time records. The system allows you to create employees, register work times, and retrieve summaries of work hours.

## Requirements

Before you begin, ensure you have the following installed:

- **PHP 8.2 or higher**: Laravel requires PHP 8.2 or higher.
- **Composer**: Composer is a dependency manager for PHP. You can install it by following the instructions on the [Composer website](https://getcomposer.org/download/).
- **MySQL or any other supported database**: Laravel supports various databases, including MySQL, PostgreSQL, SQLite, and SQL Server. Ensure you have one of these installed and running.
- **Postman**: Postman is a tool for testing APIs.

## Installation

Follow these steps to set up the application on your local machine:

1. **Clone the Repository:**

   First, clone the repository to your local machine:

   ```bash
   git clone https://github.com/awal2645/time-tracking.git
   cd time-tracking

2. **Install Dependencies:**

   After navigating into the project directory, install the required 
   PHP dependencies using Composer:

   ```bash 
    composer install

3. **Create and Configure the .env File:**

    Laravel uses an environment file (.env) to store configuration values. 
    You need to create this file by copying the example file provided:

   ```bash 
    cp .env.example .env

    DB_CONNECTION=mysql/sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

4. **Generate the Application Key:**

    Laravel requires an application key, which is used for encryption. Generate 
    it using the following command:

   ```bash 
    php artisan key:generate

5. **Run the Migrations:**

    Run the database migrations to create the required tables:

   ```bash 
    php artisan migrate
   
 6. **Running the Application:**

    To start the Laravel development server, use the following command:
    
    ```bash 
    php artisan serve

