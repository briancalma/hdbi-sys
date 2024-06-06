## Hills District Building Inspections System

This is a Laravel application for managing building inspections in the Hills District.

### Requirements

Before you can install and run this application, make sure you have the following requirements met:

-   PHP version 8 or higher
-   Composer installed
-   Node.js and npm installed
-   MySQL (optional) installed and running

### Installation

1. Clone the repository: `git clone https://github.com/your-username/hdbi-sys.git`
2. Install dependencies: `composer install`
3. Copy the `.env.example` file to `.env` and configure your environment variables.
4. Generate an application key: `php artisan key:generate`
5. Run database migrations: `php artisan migrate:fresh --seed`
6. Start the development server: `php artisan serve`
7. Run the npm server: `npm run dev`

### Optional MySQL Setup

If you want to use MySQL as your database, follow these additional steps:

1. Make sure you have MySQL installed and running on your system.
2. Create a new database called `hdbi` in MySQL.
3. Update the `.env` file with your MySQL database credentials and the name of the `hdbi` database.
4. Uncomment the following lines in the `.env` file to use MySQL and set the appropriate values for your MySQL configuration:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=hdbi
    DB_USERNAME=mysql_username
    DB_PASSWORD=mysql_password
    ```
5. Save the `.env` file.
6. Run the database migrations again: `php artisan migrate:fresh --seed`
