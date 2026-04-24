# IcedCoffee Project Overview

IcedCoffee is a web application built using the Laravel 13 framework. It follows standard Laravel conventions and is designed to be easily extensible.

## Tech Stack
- **Framework:** [Laravel 13](https://laravel.com)
- **Language:** PHP 8.3+
- **Frontend:** [Tailwind CSS 4.0](https://tailwindcss.com) via [Vite](https://vitejs.dev)
- **Database:** MySQL (configured by default)
- **Testing:** PHPUnit

## Project Structure
- `app/`: Core application logic (Models, Controllers, Providers).
- `config/`: Application configuration files.
- `database/`: Database migrations, factories, and seeders.
- `public/`: Entry point and compiled assets.
- `resources/`: Frontend assets (CSS, JS, Blade views).
- `routes/`: Application route definitions.
- `tests/`: Automated tests (Feature and Unit).

## Getting Started

### Prerequisites
- PHP 8.3 or higher
- Composer
- Node.js and npm
- MySQL (or another supported database)

### Installation and Setup
You can use the built-in setup script to initialize the project:
```bash
composer run setup
```
This command will:
1. Install PHP dependencies.
2. Create a `.env` file if it doesn't exist.
3. Generate an application key.
4. Run database migrations.
5. Install npm dependencies.
6. Build frontend assets.

### Running the Application
To start the development server, including the queue worker and Vite dev server, run:
```bash
composer run dev
```
By default, the application will be accessible at `http://localhost:8000`.

### Database Configuration
The project is configured to use a MySQL database named `icedcoffee`. If you encounter a `1049 Unknown database` error, ensure the database exists in your local MySQL instance:
```sql
CREATE DATABASE icedcoffee;
```
Alternatively, update your `.env` file to use a different database connection (e.g., `sqlite`).

## Development Conventions

### Coding Standards
- The project uses [Laravel Pint](https://laravel.com/docs/pint) for code styling. You can run it manually:
  ```bash
  ./vendor/bin/pint
  ```

### Testing
- Automated tests are located in the `tests` directory.
- Run tests using:
  ```bash
  composer run test
  ```
  or
  ```bash
  php artisan test
  ```

### Key Commands
- `php artisan make:...`: Use Artisan to generate new components (controllers, models, migrations, etc.).
- `npm run dev`: Start the Vite development server.
- `npm run build`: Build assets for production.
