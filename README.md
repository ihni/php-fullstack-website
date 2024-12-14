# PHP Fullstack Registration Website

This is a simple PHP project for registering, loggin in, and viewing users. Please follow the instructions below to set up the project.

## Prerequisites

- [PHP](https://www.php.net/) (version 7.4 above)
- [Composer](https://getcomposer.org/) (dependency manager for PHP)
- [XAMPP](https:/https://www.apachefriends.org/download.html/) (PHP development environment)
- MySQL (used by XAMPP)

## Installation

1. **Clone the Repository:**
    Make sure to clone the repository in the htdocs located in the XAMPP folder
   ```bash
   git clone https://github.com/ihni/php-fullstack-website.git
   ```

2. **Navigate to the Project Directory:**
    ```bash
    cd php-fullstack-website
    ```

3. **Install Dependencies Using Composer:**
    Run the following command to install the project's dependencies:
    ```bash
    composer install
    ```
    This will create the vendor/ directory and download all required libraries listed in composer.json.

4. **Set Up the .env File:**
    Copy the .env.example file to .env and update the values for your local environment settings (e.g., database):
    ```bash
    cp config/.env.example .env
    ```
    Update the .env file with for your environment.

5. **Run Migrations:**
    To set up the database, run the following command:
    ```bash
    composer migrate
    ```
    This will run the bin/migrate.php script, creating necessary tables like users.

6. **Seed Database(Optional):**
    To populate the database with sample data, run the seeding script using Composer:
    ```bash
    composer seed
    ```
    This will run the bin/seeder.php script, creating some sample users with hashed passwords.

7. **Start XAMPP:**
    Make sure the XAMPP server is running:
    - Run the MySQL and Apache Services

8. **Access the Application:**
    Once everything is set up and your database is seeded, you can access your application via the browser by navigating to:
    ```arduino
    http://localhost/php-fullstack-website/public/
    ```