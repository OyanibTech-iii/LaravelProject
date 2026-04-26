# IcedCoffee System Documentation

Welcome to the documentation for **IcedCoffee**, an artisan specialty coffee management system built with Laravel 13.

---

## Table of Contents
1. [User Manual](#user-manual)
   - [Public Landing Page](#public-landing-page)
   - [Authentication](#authentication)
   - [Analytics Dashboard](#analytics-dashboard)
   - [Management Modules](#management-modules)
   - [DBMS Lab Tools](#dbms-lab-tools)
2. [Technical Documentation](#technical-documentation)
   - [Tech Stack](#tech-stack)
   - [Architecture](#architecture)
   - [Setup & Installation](#setup--installation)
   - [Project Structure](#project-structure)
   - [Key Features Implementation](#key-features-implementation)

---

## User Manual

### Public Landing Page
The landing page is the public face of IcedCoffee.
- **Navigation:** Use the sticky navbar to jump to sections: Features, About, Menu, Gallery, Stories (Testimonials), and Contact.
- **Menu:** View our current coffee offerings and prices.
- **Team:** Meet the experts behind our brews in the "About" section.
- **Stats:** View our growth and community satisfaction metrics in the "Our Growth" section.
- **Contact:** Use the integrated form or find our location via the Google Map.

### Authentication
- **Registration:** Create a new account to access the management dashboard.
- **Login:** Secure access for authorized personnel.
- **Logout:** Includes a confirmation modal to prevent accidental session termination.

### Analytics Dashboard
The dashboard provides a high-level overview of business performance:
- **Quick Stats:** Real-time totals for Revenue, Orders, Customers, and Products.
- **Sales Trends:** A 7-day revenue visualization.
- **Category Analysis:** Breakdown of sales by product category.
- **Growth Metrics:** Monthly growth bar charts and customer retention line graphs.

### Management Modules
Authorized users can manage core business data:
- **Products:** Create, edit, and delete coffee products with image support.
- **Categories:** Organize products into logical groups.
- **Customers:** Maintain a database of your coffee community.
- **Suppliers:** Manage bean and inventory sources.
- **Orders:** Track sales and order history.

### DBMS Lab Tools
A specialized module for database experimentation:
- Test various relational algebra operations such as Selection, Projection, Cartesian Product, Union, and Difference.

---

## Technical Documentation

### Tech Stack
- **Framework:** Laravel 13
- **Language:** PHP 8.3+
- **Frontend:** Tailwind CSS 4.0 via Vite
- **Interactivity:** Alpine.js (Modals, Mobile Menus, Dynamic Loading)
- **Data Visualization:** Chart.js
- **Database:** MySQL
- **Code Quality:** Laravel Pint

### Architecture

#### Frontend Architecture
The public landing page is highly modularized for maintainability. All sections are stored as partials:
`resources/views/partials/landing/`
- `head.blade.php`: Styles and animations.
- `navbar.blade.php`: Mobile-responsive navigation.
- `stats.blade.php`: Canvas containers for charts.
- ... and others.

#### Dashboard Logic
The dashboard uses a **Custom AJAX Page Loader** implemented in `layouts/app.blade.php`. This provides a "Single Page Application" feel by:
1. Intercepting clicks on sidebar links.
2. Fetching content via `fetch()`.
3. Updating the `<main>` area and re-executing scripts without a full page reload.

### Setup & Installation

1. **Clone the repository**
2. **Install Dependencies:**
   ```bash
   composer install
   npm install
   ```
3. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. **Database Configuration:**
   - Create a database named `icedcoffee`.
   - Update `.env` with your credentials.
   - Run migrations: `php artisan migrate --seed`
5. **Assets:**
   ```bash
   npm run dev
   ```

### Project Structure
- `app/Http/Controllers/`: Contains controllers for all modules (Product, Order, etc.).
- `app/Models/`: Eloquent models with defined relationships.
- `resources/views/partials/`: Modular view components.
- `resources/views/layouts/`: Base templates (`app.blade.php` for dashboard, `guest.blade.php` for auth).
- `routes/web.php`: Defines the dashboard data fetching logic and resource routes.

### Key Features Implementation

#### Scroll Spy & Reveal Animations
Uses the `IntersectionObserver` API in `scripts.blade.php` to:
- Highlight the active navbar link based on scroll position.
- Trigger entrance animations (`.reveal`) when elements enter the viewport.
- Lazy-initialize `Chart.js` animations only when the stats section is visible.

#### Testimonials Marquee
Implemented using pure CSS `@keyframes` for smooth, infinite horizontal scrolling of review cards.

#### Chart Initialization
Charts are initialized inside an IIFE (Immediately Invoked Function Expression) in `dashboard.blade.php` to ensure they re-render correctly during AJAX page transitions.
