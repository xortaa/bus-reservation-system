# Bus Reservation System

This project is a bus reservation system built with Laravel, offering functionalities for managing buses, routes, schedules, and reservations.

## Prerequisites

- PHP >= 8.1
- Composer
- MySQL or any other database supported by Laravel
- Node.js and npm (for frontend assets)

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/bus-reservation-system.git
   cd bus-reservation-system
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install and compile frontend dependencies:
   ```
   npm install
   npm run dev
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Configure your database connection in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. Run database migrations:
   ```
   php artisan migrate
   ```

8. Run the database seeder:
   ```
   php artisan db:seed
   ```
   This will create initial users with different roles (admin, employee, customer).

9. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```

## Running the Application

1. Start the Laravel development server:
   ```
   php artisan serve
   ```

2. Access the application in your web browser at `http://localhost:8000`

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