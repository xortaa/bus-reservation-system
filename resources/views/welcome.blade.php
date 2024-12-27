<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Bus Reservation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .hero {
            background-image: url('https://floridabusph.com/wp-content/uploads/2023/08/florida-bus.jpg');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Bus Reservation System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1 class="display-4 fw-bold">Welcome to Bus Reservation System</h1>
            <p class="lead">Easy, fast, and convenient way to book your bus tickets</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </header>

    <main class="container my-5">
        <section class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon text-primary">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="card-title">Search Routes</h3>
                        <p class="card-text">Easily search and find the best routes for your journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon text-primary">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <h3 class="card-title">Book Tickets</h3>
                        <p class="card-text">Reserve your seats with just a few clicks.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="feature-icon text-primary">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="card-title">Real-time Updates</h3>
                        <p class="card-text">Get instant updates on your reservation status.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-center my-5">
            <h2 class="mb-4">Why Choose Us?</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <h4>24/7 Support</h4>
                    <p>Our customer service team is always ready to help you.</p>
                </div>
                <div class="col-md-3">
                    <h4>Secure Payments</h4>
                    <p>Your transactions are safe and secure with us.</p>
                </div>
                <div class="col-md-3">
                    <h4>Wide Network</h4>
                    <p>We cover a vast network of bus routes across the country.</p>
                </div>
                <div class="col-md-3">
                    <h4>Easy Cancellation</h4>
                    <p>Hassle-free cancellation and refund process.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-light py-4">
        <div class="container text-center">
            <p>&copy; 2023 Bus Reservation System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>

