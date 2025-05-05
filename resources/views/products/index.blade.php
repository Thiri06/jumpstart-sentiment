<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - JumpStart Fashion</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
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
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .product-card img {
            height: 250px;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .product-card:hover img {
            transform: scale(1.05);
        }
        
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
        
        .product-price {
            font-size: 1.25rem;
            font-weight: 600;
            color: #ff6b6b;
        }
        
        .product-category {
            font-size: 0.85rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .page-header {
            background-color: #343a40;
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
        }
        
        .filter-bar {
            background-color: white;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .filter-dropdown {
            min-width: 200px;
        }
        
        /* Improved Pagination Styling */
        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }

        .pagination .page-item .page-link {
            color: #333;
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
            margin: 0 0.25rem;
            border-radius: 50% !important;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: #ff6b6b;
            border-color: #ff6b6b;
            color: #fff;
            box-shadow: 0 2px 5px rgba(255, 107, 107, 0.3);
        }

        .pagination .page-item .page-link:hover {
            background-color: #f8f9fa;
            color: #ff6b6b;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
            opacity: 0.6;
        }

        /* For previous and next buttons */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            border-radius: 30px !important;
            width: auto;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        
        .product-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            height: 2.5rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .product-description {
            color: #6c757d;
            font-size: 0.9rem;
            height: 3rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .product-rating {
            color: #ffc107;
        }
        
        .product-rating .bi-star-fill {
            font-size: 0.8rem;
        }
        
        .product-card .card-footer {
            background-color: white;
            border-top: 1px solid rgba(0,0,0,0.05);
        }
        
        .product-colors {
            display: flex;
            gap: 5px;
        }
        
        .color-dot {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">JumpStart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact Us</a>
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold">Our Products</h1>
                    <p class="lead">Discover our curated collection of fashion essentials</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-5">
        <div class="container">
            <!-- Filter Bar -->
            <div class="filter-bar d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex align-items-center mb-2 mb-md-0">
                    <span class="me-3">Filter by:</span>
                    <div class="dropdown me-3">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu filter-dropdown" aria-labelledby="categoryDropdown">
                            <li><a class="dropdown-item" href="#">All Categories</a></li>
                            <li><a class="dropdown-item" href="#">Women's Fashion</a></li>
                            <li><a class="dropdown-item" href="#">Men's Fashion</a></li>
                            <li><a class="dropdown-item" href="#">Accessories</a></li>
                            <li><a class="dropdown-item" href="#">Footwear</a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="priceDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Price
                        </button>
                        <ul class="dropdown-menu filter-dropdown" aria-labelledby="priceDropdown">
                            <li><a class="dropdown-item" href="#">All Prices</a></li>
                            <li><a class="dropdown-item" href="#">Under $25</a></li>
                            <li><a class="dropdown-item" href="#">$25 - $50</a></li>
                            <li><a class="dropdown-item" href="#">$50 - $100</a></li>
                            <li><a class="dropdown-item" href="#">Over $100</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <span class="me-3">Sort by:</span>
                    <select class="form-select" style="width: auto;">
                        <option selected>Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                        <option>Best Selling</option>
                    </select>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100">
                        @if(rand(1, 3) == 1)
                        <span class="badge bg-danger product-badge">NEW</span>
                        @endif
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body">
                            <div class="product-category mb-2">{{ $product->tags[0] ?? 'Fashion' }}</div>
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="product-description">{{ Str::limit($product->description, 60) }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                <div class="product-rating">
                                    @for($i = 0; $i < 5; $i++)
                                        @if($i < rand(3, 5))
                                            <i class="bi bi-star-fill"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="product-colors mt-2">
                                @foreach($product->available_colors as $color)
                                    <div class="color-dot" style="background-color: {{ $color }}" title="{{ $color }}"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                            <button class="btn btn-outline-secondary">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination with Information -->
            <div class="d-flex flex-column align-items-center mt-5">
                <div class="text-muted mb-3">
                    Showing {{ $products->firstItem() ?? 0 }} to {{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                </div>
                {{ $products->onEachSide(1)->links('pagination::custom') }}
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-dark text-white">
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

    <!-- Footer -->
    <footer class="pt-5 pb-4 bg-dark text-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4">JumpStart</h5>
                    <p class="mb-4">Your destination for trendy fashion and accessories. We bring you the latest styles at affordable prices.</p>
                    <div class="d-flex">
                        <a href="#" class="social-icon me-2 bg-white bg-opacity-10 rounded-circle p-2"><i class="bi bi-facebook text-white"></i></a>
                        <a href="#" class="social-icon me-2 bg-white bg-opacity-10 rounded-circle p-2"><i class="bi bi-instagram text-white"></i></a>
                        <a href="#" class="social-icon me-2 bg-white bg-opacity-10 rounded-circle p-2"><i class="bi bi-twitter text-white"></i></a>
                        <a href="#" class="social-icon bg-white bg-opacity-10 rounded-circle p-2"><i class="bi bi-pinterest text-white"></i></a>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Add hover effect for product cards
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card');
            
            productCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.querySelector('.card-img-top').style.transform = 'scale(1.05)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.querySelector('.card-img-top').style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>

