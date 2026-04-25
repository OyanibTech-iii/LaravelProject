# IcedCoffee - Laravel 13 Coffee Shop Management System

IcedCoffee is a modern web application built with Laravel 13, featuring a sleek SPA-like experience using AJAX page loading, server-side DataTables, and a custom DBMS Lab for relational algebra demonstrations.

## Features

- **Dynamic Analytics Dashboard:** Real-time charts for sales trends and category distribution.
- **AJAX DataTables:** High-performance, server-side processed tables for Customers and Products.
- **DBMS Lab:** Interactive demonstration of relational algebra operations (Selection, Projection, Union, etc.) with sidebar navigation.
- **SPA Experience:** Fast page transitions using a custom AJAX loader and Alpine.js.
- **Modern UI:** Built with Tailwind CSS and a custom "Coffee & Brick" aesthetic.

---

## Getting Started

### Prerequisites

Ensure you have the following installed:
- PHP 8.3 or higher
- Composer
- Node.js & NPM
- MySQL or SQLite

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/OyanibTech-iii/LaravelProject.git
   cd icedcoffee
   ```

2. **Run the automated setup:**
   The project includes a comprehensive setup script that handles dependency installation, environment configuration, and database migrations.
   ```bash
   composer run setup
   ```
   *This command will:*
   - Install PHP dependencies via Composer.
   - Create a `.env` file from `.env.example`.
   - Generate the application key.
   - Run database migrations.
   - Install NPM dependencies.
   - Build frontend assets via Vite.

3. **Database Seeding:**
   To populate the system with sample products, customers, and categories:
   ```bash
   php artisan db:seed
   ```
   *If you want to run specific seeders:*
   ```bash
   php artisan db:seed --class=ProductImageSeeder
   ```

### Running the Application

To start the development environment (includes the web server, Vite dev server, and queue worker):

```bash
composer run dev
```

The application will be accessible at: [http://localhost:8000](http://localhost:8000)

---

## Development Commands

- **Run Tests:** `php artisan test`
- **Lint Code:** `./vendor/bin/pint`
- **Build Assets for Production:** `npm run build`
- **Refresh Database:** `php artisan migrate:fresh --seed`

## Project Structure

- `app/Http/Controllers/`: Contains the logic for Customers, Products, and the DBMS Lab.
- `resources/views/`: Blade templates styled with Tailwind CSS.
- `resources/js/app.js`: Alpine.js and DataTables initialization.
- `database/seeders/`: Database population logic.

## License

The IcedCoffee project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
