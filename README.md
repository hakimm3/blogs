# Project Setup Instructions

## Prerequisites

- PHP
- Composer
- Laravel

## Installation

1. Clone the repository:
    ```sh
    git clone <repository-url>
    cd <repository-directory>
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

4. Generate an application key:
    ```sh
    php artisan key:generate
    ```

5. Run migrations and seed the database:
    ```sh
    php artisan migrate:fresh --seed
    ```

6. Serve the application:
    ```sh
    php artisan serve
    ```

## Usage

- Access the application in your web browser at `http://localhost:8000`.

## Additional Commands

- To run the development server:
    ```sh
    php artisan serve
    ```

- To refresh the database and seed it:
    ```sh
    php artisan migrate:fresh --seed
    ```

## License

This project is licensed under the MIT License.