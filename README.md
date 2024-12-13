# PHP Fullstack Registration Website

This is a simple PHP project for registering, loggin in, and viewing users. Please follow the instructions below to set up the project.

## Prerequisites

- [PHP](https://www.php.net/) (version 7.4 above)
- [Composer](https://getcomposer.org/) (dependency manager for PHP)
- [XAMPP](https:/https://www.apachefriends.org/download.html/) (PHP development environment)
- MySQL (used by XAMPP)

## Installation

1. **Clone the Repository:**
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

5. 