<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar, Slider, and Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ACADEMY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            @auth
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-decoration-none">Logout</button>
                                </form>
                            </li>
                            @else
                            <li><a class="dropdown-item" href="{{ route('showLogin') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('showRegister') }}">Register</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/fist.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="images/second.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <!-- <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x600" class="d-block w-100" alt="Slide 3">
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-5">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card" data-bs-toggle="modal" data-bs-target="#productModal">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Wireless Headphones</h6>
                        <p class="text-warning mb-1">★★★★★</p>
                        <p class="card-text">$25.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel">Wireless Headphones</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="https://via.placeholder.com/300" class="img-fluid mb-3" alt="Product">
                            <p>Product Description: Premium quality wireless headphones with noise cancellation and long battery life.</p>
                            <p class="text-warning mb-1">★★★★★</p>
                            <p class="card-text">$25.00</p>
                            <button class="btn btn-primary add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Smartphone Case</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">$15.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Bluetooth Speaker</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">$45.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="card">
                    <img src="https://via.placeholder.com/300" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h6 class="card-title">Portable Charger</h6>
                        <p class="text-warning mb-1">
                            ★★★★★
                        </p>
                        <p class="card-text">$30.00</p>
                        <button class="btn btn-primary add-to-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light pt-4">
        <div class="container">
            <div class="row">
                <!-- Contact Section -->
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>Email: support@academy.com</p>
                    <p>Phone: +1 234 567 890</p>
                    <p>Address: 123 Academy Street, City, Country</p>
                </div>

                <!-- Quick Links Section -->
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Shop</a></li>
                        <li><a href="#" class="text-light text-decoration-none">About</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                    </ul>
                </div>

                <!-- Social Media Section -->
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i> Facebook</a><br>
                    <a href="#" class="text-light me-2"><i class="bi bi-twitter"></i> Twitter</a><br>
                    <a href="#" class="text-light"><i class="bi bi-instagram"></i> Instagram</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4 pb-3">
            <p class="mb-0">&copy; 2024 Academy. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>