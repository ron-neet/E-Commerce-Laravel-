# E-Commerce Application

A fully functional **E-commerce web application** built using **Laravel 12**. This platform allows users to browse products, add them to the cart, place orders, and for admins to manage products and orders. Built with **Laravel Breeze** for authentication and a clean frontend layout.

---

## Features

### User Features
- User registration, login, and logout.
- Browse products by category.
- Product details page with images and description.
- Add products to cart and manage cart items.
- Place orders and view order history.
- Search products by name or category.

### Admin Features
- Admin login and dashboard.
- CRUD operations on products (Create, Read, Update, Delete).
- Manage orders and view user orders.
- Upload product images.
- View analytics (optional, if implemented).

### Others
- Responsive design with Bootstrap or Tailwind CSS.
- File upload for product images.
- Authentication via Laravel Breeze.

---

## Installation

bash
Copy code
composer install
Install frontend dependencies:

bash
Copy code
npm install
npm run dev
Copy .env file and generate app key:

bash
Copy code
cp .env.example .env
php artisan key:generate
Configure your database in .env:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=
Run migrations and seeders:

bash
Copy code
php artisan migrate --seed
Serve the application:

bash
Copy code
php artisan serve
Visit http://127.0.0.1:8000 in your browser.

Folder Structure
app/Models – Eloquent models for Users, Products, Cart, and Orders.

app/Http/Controllers – Controllers for user and admin operations.

resources/views – Blade templates for user and admin interfaces.

routes/web.php – Routes for the application.

database/migrations – Database schema for users, products, cart, and orders.

database/seeders – Seeders for initial users and products.

Technologies Used
PHP 8.4

Laravel 12

Laravel Breeze (authentication)

MySQL

Bootstrap 5 / Tailwind CSS

JavaScript (for interactivity)

