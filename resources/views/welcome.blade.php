<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JumpStart - Fashion Retailer</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }
        
        .btn-primary {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
        }
        
        .btn-primary:hover {
            background-color: #ff5252;
            border-color: #ff5252;
        }
        
        .btn-outline-primary {
            color: #ff6b6b;
            border-color: #ff6b6b;
        }
        
        .btn-outline-primary:hover {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
        }
        
        /* Navbar Styles */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        /* Hero Section */
        .hero-section {
            height: 85vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
        }
        
        /* Category Cards */
        .category-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .category-card img {
            height: 280px;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .category-card:hover img {
            transform: scale(1.05);
        }
        
        /* Product Cards */
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .product-card img {
            height: 220px;
            object-fit: cover;
        }
        
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
        
        /* Features Section */
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(255, 107, 107, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        /* Newsletter Section */
        .newsletter-section {
            background-color: #2d3436;
        }
        
        /* Footer */
        footer {
            background-color: #222;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: #ff6b6b;
            transform: translateY(-5px);
        }
    </style>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">JumpStart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="#" class="me-3 text-dark"><i class="bi bi-search fs-5"></i></a>
                    <a href="#" class="me-3 text-dark"><i class="bi bi-heart fs-5"></i></a>
                    <a href="#" class="me-3 text-dark position-relative">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                        </span>
                    </a>
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    @auth
                        <div class="dropdown">
                            <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if(Auth::user()->is_admin)
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-4">Elevate Your Style</h1>
                    <p class="lead mb-4">Discover the latest trends and timeless classics in our curated collection of fashion essentials.</p>
                    <div class="d-flex gap-3">
                        <a href="#categories" class="btn btn-primary btn-lg px-4 fw-semibold">Shop Now</a>
                        <a href="#new-arrivals" class="btn btn-outline-light btn-lg px-4">New Arrivals</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5" id="categories">
        <div class="container">
            <h2 class="text-center mb-2 fw-bold">Shop By Category</h2>
            <p class="text-center text-muted mb-5">Find your perfect style in our diverse collections</p>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm category-card h-100">
                        <img src="https://images.unsplash.com/photo-1591369822096-ffd140ec948f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" class="card-img-top" alt="Women's Fashion">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title fw-bold">Women's Collection</h4>
                            <p class="card-text text-muted">Elegant designs for the modern woman</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-4 mt-2">Explore</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm category-card h-100">
                        <img src="https://images.unsplash.com/photo-1617137968427-85924c800a22?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80" class="card-img-top" alt="Men's Fashion">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title fw-bold">Men's Collection</h4>
                            <p class="card-text text-muted">Sophisticated styles for the modern man</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-4 mt-2">Explore</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm category-card h-100">
                        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1964&q=80" class="card-img-top" alt="Accessories">
                        <div class="card-body text-center p-4">
                            <h4 class="card-title fw-bold">Accessories</h4>
                            <p class="card-text text-muted">Complete your look with our stunning pieces</p>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-4 mt-2">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Arrivals Section -->
    <section class="py-5 bg-light" id="new-arrivals">
        <div class="container">
            <h2 class="text-center mb-2 fw-bold">New Arrivals</h2>
            <p class="text-center text-muted mb-5">The latest additions to our collection</p>
            
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm product-card h-100">
                        <div class="position-relative">
                            <span class="badge bg-danger product-badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2005&q=80" class="card-img-top" alt="Summer Dress">
                            <div class="position-absolute top-50 start-50 translate-middle d-flex gap-2 product-actions" style="opacity: 0; transition: all 0.3s ease;">
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-heart"></i></a>
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="text-muted mb-0 small">Women's Fashion</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-half text-warning small"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-1">Floral Summer Dress</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">$49.99</span>
                                <button class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-cart-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm product-card h-100">
                        <div class="position-relative">
                            <span class="badge bg-danger product-badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1020&q=80" class="card-img-top" alt="Fashion Blouse">
                            <div class="position-absolute top-50 start-50 translate-middle d-flex gap-2 product-actions" style="opacity: 0; transition: all 0.3s ease;">
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-heart"></i></a>
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="text-muted mb-0 small">Women's Fashion</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star text-warning small"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-1">Elegant Blouse</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">$34.99</span>
                                <button class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-cart-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm product-card h-100">
                        <div class="position-relative">
                            <span class="badge bg-danger product-badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1550246140-5119ae4790b8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="card-img-top" alt="Men's Outfit">
                            <div class="position-absolute top-50 start-50 translate-middle d-flex gap-2 product-actions" style="opacity: 0; transition: all 0.3s ease;">
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-heart"></i></a>
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="text-muted mb-0 small">Men's Fashion</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-half text-warning small"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-1">Casual Denim Jacket</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">$79.99</span>
                                <button class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-cart-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="col-6 col-md-3">
                    <div class="card border-0 shadow-sm product-card h-100">
                        <div class="position-relative">
                            <span class="badge bg-danger product-badge">NEW</span>
                            <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1036&q=80" class="card-img-top" alt="Accessories">
                            <div class="position-absolute top-50 start-50 translate-middle d-flex gap-2 product-actions" style="opacity: 0; transition: all 0.3s ease;">
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-heart"></i></a>
                                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="text-muted mb-0 small">Accessories</p>
                                <div>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star-fill text-warning small"></i>
                                    <i class="bi bi-star text-warning small"></i>
                                </div>
                            </div>
                            <h5 class="card-title fw-bold mb-1">Leather Handbag</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">$89.99</span>
                                <button class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-cart-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2">View All Products</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="bi bi-truck text-primary fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Free Shipping</h4>
                        <p class="text-muted">Free shipping on all orders over $50</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check text-primary fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Secure Payment</h4>
                        <p class="text-muted">100% secure payment methods</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="text-center">
                        <div class="feature-icon">
                            <i class="bi bi-arrow-return-left text-primary fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Easy Returns</h4>
                        <p class="text-muted">30 day money back guarantee</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trending Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-2 fw-bold">Trending Now</h2>
            <p class="text-center text-muted mb-5">What's popular this season</p>
            
            <div class="row">
                <div class="col mb-4 mb-md-0">
                    <div class="position-relative rounded overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" class="img-fluid" alt="Summer Collection">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0,0,0,0.3);">
                            <div class="text-center text-white p-4">
                                <h3 class="fw-bold mb-3">Summer Collection</h3>
                                <a href="#" class="btn btn-outline-light rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="position-relative rounded overflow-hidden mb-4">
                        <img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1176&q=80" class="img-fluid" alt="Accessories">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0,0,0,0.3);">
                            <div class="text-center text-white p-4">
                                <h3 class="fw-bold mb-3">Accessories</h3>
                                <a href="#" class="btn btn-outline-light rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="position-relative rounded overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" class="img-fluid" alt="Men's Collection">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0,0,0,0.3);">
                            <div class="text-center text-white p-4">
                                <h3 class="fw-bold mb-3">Men's Collection</h3>
                                <a href="#" class="btn btn-outline-light rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 newsletter-section text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-2">Subscribe to Our Newsletter</h3>
                    <p class="mb-0">Get the latest updates on new products and upcoming sales</p>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Your email address">
                        <button class="btn btn-primary px-4" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User-specific content -->
    @auth
        <div class="py-4">
            <div class="container">
                @if(Auth::user()->is_admin)
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <div>
                            You are logged in as an admin. <a href="{{ route('admin.dashboard') }}" class="alert-link">Go to Dashboard</a>
                        </div>
                    </div>
                @else
                                        <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>
                            Welcome back, {{ Auth::user()->name }}! Explore our latest collections.
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endauth

    <!-- Footer -->
    <footer class="pt-5 pb-4 text-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4">JumpStart</h5>
                    <p class="mb-4">Your destination for trendy fashion and accessories. We bring you the latest styles at affordable prices.</p>
                    <div class="d-flex">
                        <a href="#" class="social-icon me-2"><i class="bi bi-facebook text-white"></i></a>
                        <a href="#" class="social-icon me-2"><i class="bi bi-instagram text-white"></i></a>
                        <a href="#" class="social-icon me-2"><i class="bi bi-twitter text-white"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-pinterest text-white"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5 class="fw-bold mb-4">Shop</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Women's Fashion</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Men's Fashion</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Accessories</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">New Arrivals</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Sale</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5 class="fw-bold mb-4">Help</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">FAQs</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Shipping</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Returns</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Track Order</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4">Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Fashion Street, New York, NY 10001</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i> (123) 456-7890</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i> info@jumpstart.com</li>
                        <li><i class="bi bi-clock me-2"></i> Mon-Fri: 9AM - 6PM</li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 bg-light opacity-25">
            
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">&copy; 2023 JumpStart. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="payment-methods">
                        <i class="bi bi-credit-card-2-front fs-4 mx-1" title="Credit Card"></i>
                        <i class="bi bi-paypal fs-4 mx-1" title="PayPal"></i>
                        <i class="bi bi-wallet2 fs-4 mx-1" title="Digital Wallet"></i>
                        <i class="bi bi-bank fs-4 mx-1" title="Bank Transfer"></i>
                        <i class="bi bi-cash-coin fs-4 mx-1" title="Cash on Delivery"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Additional Scripts for Product Hover Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach(card => {
                const actions = card.querySelector('.product-actions');
                
                card.addEventListener('mouseenter', function() {
                    if (actions) {
                        actions.style.opacity = '1';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    if (actions) {
                        actions.style.opacity = '0';
                    }
                });
            });
        });
    </script>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


