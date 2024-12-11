# Room-Booking
Booking project

## Description

A platform for easy room reservations, allowing users to browse, check availability, and book rooms seamlessly. Includes an admin dashboard for managing bookings and room inventory efficiently.

## Prerequisites

Before you begin, ensure you have met the following requirements:

-   [Node.js](https://nodejs.org/) installed v16.13.1 stable
-   [Composer](https://getcomposer.org/) installed v2.7.4
-   [PHP](https://www.php.net/) installed v^8.2
-   [Laravel](https://laravel.com/) v10
-   [NPM](https://www.npmjs.com/)  installed

## Setup Instructions

To set up this project locally, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/sajedul559/Room-Booking.git
    ```

2. Navigate into the project directory:

    ```bash
    cd Room-Booking
    ```

3. Install PHP dependencies using Composer:

    ```bash
    composer install
    ```

4. Install JavaScript dependencies using NPM :

    ```bash
    npm install
    ```

  

5. Copy the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate an application key:

    ```bash
    php artisan key:generate
    ```

7. Configure your database settings in the `.env` file.

8. Run database migrations:

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

9. Setup passport:

    ```bash
    php artisan passport:keys
    ```

    ```bash
    php artisan passport:client --personal --name="nobin"
    ```

10. Compile front-end assets:

    ```bash
    npm run dev
    ```

11. Start the development server:

    ```bash
    php artisan serve
    ```

12. Visit `http://localhost:8000` in your browser to see the application.

## Usage

Provide instructions on how to use your application here. Include any necessary steps, commands, or configurations.

## License

This project is licensed under the [MIT License](LICENSE).
