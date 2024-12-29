# Bus Reservation System

This project is a bus reservation system built with Laravel, offering functionalities for managing buses, routes, schedules, and reservations.

## Prerequisites

- PHP >= 8.1
- Composer
- MySQL or any other database supported by Laravel
- Node.js and npm (for frontend assets)

## Installation

1. Install XAMPP from the official website: https://www.apachefriends.org/index.html

2. Start Apache and MySQL services from the XAMPP Control Panel.

3. Open phpMyAdmin (usually at http://localhost/phpmyadmin) and create a new database named `bus_reservation_system`.

4. Clone the repository into your XAMPP's `htdocs` directory:

5. Clone the repository:
   ```
   git clone https://github.com/yourusername/bus-reservation-system.git
   cd bus-reservation-system
   ```

6. Install PHP dependencies:
   ```
   composer install
   ```

7. Install and compile frontend dependencies:
   ```
   npm install
   npm run dev
   ```

9. Generate an application key:
   ```
   php artisan key:generate
   ```

9. Configure your database connection in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

10. Run database migrations:
   ```
   php artisan migrate
   ```

11. Run the database seeder:
   ```
   php artisan db:seed
   ```
   This will create initial users with different roles (admin, employee, customer).

12. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```

## Running the Application

1. Start the Laravel development server:
   ```
   php artisan serve
   ```

2. Access the application in your web browser at `http://127.0.0.1:8000`

## Default Users

After running the seeder, you'll have the following default users:

1. Admin User:
   - Email: admin@example.com
   - Password: password

2. Employee User:
   - Email: employee@example.com
   - Password: password

3. Customer User:
   - Email: customer@example.com
   - Password: password

## Features

- User authentication and authorization with different roles (admin, employee, customer)
- CRUD operations for buses, routes, schedules, and reservations
- Role-based access control for different functionalities
- Responsive design using Tailwind CSS