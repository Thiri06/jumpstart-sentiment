<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - JumpStart Fashion</title>
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

        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 10;
            padding: 8px 15px;
            font-weight: 500;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 600;
            color: #ff6b6b;
            margin-bottom: 1rem;
        }

        .product-category {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .product-rating {
            color: #ffc107;
            margin-bottom: 1rem;
        }

        .product-rating .bi-star-fill {
            font-size: 1.2rem;
        }

        .product-description {
            color: #6c757d;
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .product-colors {
            display: flex;
            gap: 10px;
            margin-bottom: 2rem;
        }

        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .color-option.active {
            border-color: #333;
            transform: scale(1.1);
        }

        .size-option {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 10px;
            font-weight: 500;
        }

        .size-option.active {
            background-color: #ff6b6b;
            color: white;
            border-color: #ff6b6b;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #dee2e6;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .quantity-btn:hover {
            background-color: #f8f9fa;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: none;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .product-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 2rem;
        }

        .product-info-section {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .product-info-title {
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .product-feature {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .product-feature i {
            color: #ff6b6b;
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .review-card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-5px);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .reviewer-name {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }

        .review-date {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .review-rating {
            color: #ffc107;
        }

        .review-content {
            color: #6c757d;
            line-height: 1.7;
        }

        .breadcrumb-item a {
            color: #ff6b6b;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }

        .related-products-title {
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
        }

        .related-product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .related-product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .related-product-card img {
            height: 200px;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .related-product-card:hover img {
            transform: scale(1.05);
        }

        .related-product-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            height: 2.5rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .related-product-price {
            font-weight: 600;
            color: #ff6b6b;
        }

        .review-form {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            width: 30px;
            height: 30px;
            margin-right: 5px;
            position: relative;
            color: #ddd;
        }

        .star-rating label:before {
            content: '\f586';
            font-family: bootstrap-icons !important;
            font-size: 1.5rem;
            position: absolute;
            top: 0;
            left: 0;
        }

        .star-rating input:checked~label,
        .star-rating input:checked~label~label {
            color: #ffc107;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
        }

        .sentiment-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .sentiment-positive {
            background-color: #d4edda;
            color: #155724;
        }

        .sentiment-negative {
            background-color: #f8d7da;
            color: #721c24;
        }

        .sentiment-neutral {
            background-color: #e2e3e5;
            color: #383d41;
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
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('products.index') }}">Products</a>
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
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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

    <!-- Breadcrumb -->
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <!-- Product Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="product-image-container">
                        @if(rand(1, 3) == 1)
                        <span class="badge bg-danger product-badge">NEW</span>
                        @endif
                        <img src="{{ $product->image }}" class="product-image" alt="{{ $product->name }}">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6">
                    <div class="product-category">{{ $product->tags[0] ?? 'Fashion' }}</div>
                    <h1 class="product-title">{{ $product->name }}</h1>

                    <div class="product-rating">
                        @for($i = 0; $i < 5; $i++)
                            @if($i < 4)
                            <i class="bi bi-star-fill"></i>
                            @else
                            <i class="bi bi-star-half"></i>
                            @endif
                            @endfor
                            <span class="ms-2 text-muted">(4.5/5 - 24 reviews)</span>
                    </div>

                    <div class="product-price">${{ number_format($product->price, 2) }}</div>

                    <div class="product-description mb-4">
                        {{ $product->description }}
                    </div>

                    <!-- Color Options -->
                    <div class="mb-4">
                        <h5 class="mb-3">Color</h5>
                        <div class="product-colors">
                            @foreach($product->available_colors as $index => $color)
                            <!-- <div class="color-option {{ $index == 0 ? 'active' : '' }}" style="background-color: {{ $color }}" data-color="{{ $color }}" title="{{ $color }}"></div> -->
                            @endforeach
                        </div>
                    </div>

                    <!-- Size Options -->
                    <div class="mb-4">
                        <h5 class="mb-3">Size</h5>
                        <div class="d-flex">
                            <div class="size-option active">S</div>
                            <div class="size-option">M</div>
                            <div class="size-option">L</div>
                            <div class="size-option">XL</div>
                        </div>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="mb-4">
                        <h5 class="mb-3">Quantity</h5>
                        <div class="quantity-selector">
                            <button class="quantity-btn" id="decrease-quantity">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="text" class="quantity-input" id="quantity" value="1" readonly>
                            <button class="quantity-btn" id="increase-quantity">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Product Actions -->
                    <div class="product-actions">
                        <button class="btn btn-primary btn-lg px-4">
                            <i class="bi bi-cart-plus me-2"></i> Add to Cart
                        </button>
                        <button class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-heart"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-share"></i>
                        </button>
                    </div>

                    <!-- Product Features -->
                    <div class="mt-4">
                        <div class="product-feature">
                            <i class="bi bi-truck"></i>
                            <span>Free shipping on orders over $50</span>
                        </div>
                        <div class="product-feature">
                            <i class="bi bi-arrow-return-left"></i>
                            <span>30-day return policy</span>
                        </div>
                        <div class="product-feature">
                            <i class="bi bi-shield-check"></i>
                            <span>Secure checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Details Tabs -->
    <section class="py-5 bg-light">
        <div class="container">
            <ul class="nav nav-tabs" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab" aria-controls="specifications" aria-selected="false">Specifications</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (24)</button>
                </li>
            </ul>
            <div class="tab-content p-4 bg-white rounded-bottom shadow-sm" id="productTabsContent">
                <!-- Description Tab -->
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <h4 class="mb-4">Product Description</h4>
                    <p>{{ $product->description }}</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui.</p>
                    <p>Donec pretium posuere tellus. Proin quam nisl, tincidunt et, mattis eget, convallis nec, purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla posuere. Donec vitae dolor. Nullam tristique diam non turpis.</p>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <h5 class="mb-3">Key Features</h5>
                            <ul>
                                <li>High-quality fabric</li>
                                <li>Comfortable fit</li>
                                <li>Versatile design</li>
                                <li>Durable construction</li>
                                <li>Easy to care for</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Care Instructions</h5>
                            <ul>
                                <li>Machine wash cold</li>
                                <li>Tumble dry low</li>
                                <li>Do not bleach</li>
                                <li>Iron on low heat if needed</li>
                                <li>Do not dry clean</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Specifications Tab -->
                <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                    <h4 class="mb-4">Product Specifications</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 30%">Material</th>
                                    <td>Cotton, Polyester</td>
                                </tr>
                                <tr>
                                    <th>Available Sizes</th>
                                    <td>S, M, L, XL</td>
                                </tr>
                                <tr>
                                    <th>Available Colors</th>
                                    <td>
                                        @foreach($product->available_colors as $color)
                                        <span class="badge bg-secondary me-1">{{ $color }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>0.5 kg</td>
                                </tr>
                                <tr>
                                    <th>Dimensions</th>
                                    <td>30 × 40 cm</td>
                                </tr>
                                <tr>
                                    <th>Country of Origin</th>
                                    <td>United States</td>
                                </tr>
                                <tr>
                                    <th>SKU</th>
                                    <td>PRD-{{ $product->id }}-JMP</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Customer Reviews</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#writeReviewModal">
                            <i class="bi bi-pencil me-2"></i> Write a Review
                        </button>
                    </div>

                    <!-- Review Summary -->
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <div class="text-center p-4">
                                <h2 class="display-4 fw-bold">4.5</h2>
                                <div class="product-rating mb-2">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <p class="text-muted">Based on 24 reviews</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3" style="width: 50px;">5 stars</div>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="ms-3" style="width: 50px;">75%</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3" style="width: 50px;">4 stars</div>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="ms-3" style="width: 50px;">15%</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3" style="width: 50px;">3 stars</div>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="ms-3" style="width: 50px;">5%</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-3" style="width: 50px;">2 stars</div>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 3%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="ms-3" style="width: 50px;">3%</div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px;">1 star</div>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="ms-3" style="width: 50px;">2%</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Filter -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <select class="form-select form-select-sm" style="width: auto;">
                                <option selected>All Reviews</option>
                                <option>Positive Reviews</option>
                                <option>Negative Reviews</option>
                                <option>With Photos</option>
                                <option>Most Recent</option>
                            </select>
                        </div>
                        <div>
                            <span class="text-muted">Showing 1-5 of 24 reviews</span>
                        </div>
                    </div>

                    <!-- Reviews List -->
                    <div class="reviews-list">
                        <!-- Review 1 -->
                        <div class="review-card">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Reviewer" class="reviewer-avatar">
                                    <div>
                                        <h5 class="reviewer-name">Sarah Johnson</h5>
                                        <div class="review-date">Posted on May 15, 2023</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="review-rating me-3">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="sentiment-badge sentiment-positive">Positive</span>
                                </div>
                            </div>
                            <div class="review-content">
                                <p>I absolutely love this product! The quality is exceptional and it fits perfectly. The material is soft and comfortable, and the color is exactly as shown in the pictures. I've received many compliments when wearing it. Highly recommend!</p>
                            </div>
                            <div class="mt-3">
                                <div class="row g-2">
                                    <div class="col-3 col-md-2">
                                        <img src="https://via.placeholder.com/150" alt="Review image" class="img-fluid rounded">
                                    </div>
                                    <div class="col-3 col-md-2">
                                        <img src="https://via.placeholder.com/150" alt="Review image" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="review-card">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Reviewer" class="reviewer-avatar">
                                    <div>
                                        <h5 class="reviewer-name">Michael Brown</h5>
                                        <div class="review-date">Posted on May 10, 2023</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="review-rating me-3">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="sentiment-badge sentiment-positive">Positive</span>
                                </div>
                            </div>
                            <div class="review-content">
                                <p>Great product overall. The quality is good and it looks just like the pictures. I would have given 5 stars, but it runs a bit small so I had to exchange for a larger size. Customer service was very helpful with the exchange process.</p>
                            </div>
                        </div>

                        <!-- Review 3 -->
                        <div class="review-card">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Reviewer" class="reviewer-avatar">
                                    <div>
                                        <h5 class="reviewer-name">Emily Wilson</h5>
                                        <div class="review-date">Posted on May 5, 2023</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="review-rating me-3">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="sentiment-badge sentiment-neutral">Neutral</span>
                                </div>
                            </div>
                            <div class="review-content">
                                <p>The product is okay. The material isn't as soft as I expected, and the color is slightly different from what's shown online. It's not bad, but I'm not completely satisfied with my purchase. Shipping was fast though.</p>
                            </div>
                        </div>

                        <!-- Review 4 -->
                        <div class="review-card">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Reviewer" class="reviewer-avatar">
                                    <div>
                                        <h5 class="reviewer-name">David Thompson</h5>
                                        <div class="review-date">Posted on April 28, 2023</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="review-rating me-3">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <span class="sentiment-badge sentiment-negative">Negative</span>
                                </div>
                            </div>
                            <div class="review-content">
                                <p>I'm very disappointed with this purchase. The quality is poor and it started falling apart after just one wash. The sizing is also way off - I ordered my usual size and it's much too small. Would not recommend.</p>
                            </div>
                            <div class="mt-3">
                                <div class="row g-2">
                                    <div class="col-3 col-md-2">
                                        <img src="https://via.placeholder.com/150" alt="Review image" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review 5 -->
                        <div class="review-card">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <img src="https://randomuser.me/api/portraits/women/54.jpg" alt="Reviewer" class="reviewer-avatar">
                                    <div>
                                        <h5 class="reviewer-name">Jessica Martinez</h5>
                                        <div class="review-date">Posted on April 20, 2023</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="review-rating me-3">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <span class="sentiment-badge sentiment-positive">Positive</span>
                                </div>
                            </div>
                            <div class="review-content">
                                <p>This is my second purchase of this product in a different color. I love everything about it - the fit, the material, the style. It's versatile and can be dressed up or down. The shipping was also super fast. Will definitely buy more!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Reviews pagination" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Write Review Modal -->
    <div class="modal fade" id="writeReviewModal" tabindex="-1" aria-labelledby="writeReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="writeReviewModalLabel">Write a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reviews.store', $product->id) }}"" method=" POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="review_type" value="review">

                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="4 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="3 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="2 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="1 star"></label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="review_title" class="form-label">Review Title</label>
                            <input type="text" class="form-control" id="review_title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="review_description" class="form-label">Your Review</label>
                            <textarea class="form-control" id="review_description" name="description" rows="5" required></textarea>
                            <div class="form-text">Tell others what you think about this product. Be honest and helpful.</div>
                        </div>

                        <div class="mb-3">
                            <label for="review_images" class="form-label">Add Photos (optional)</label>
                            <input class="form-control" type="file" id="review_images" name="images[]" multiple accept="image/*">
                            <div class="form-text">You can upload up to 5 images to support your review.</div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms_check" required>
                            <label class="form-check-label" for="terms_check">I confirm this review is based on my own experience and is my genuine opinion.</label>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <section class="py-5">
        <div class="container">
            <h2 class="related-products-title mb-4">You May Also Like</h2>

            <div class="row g-4">
                @for($i = 0; $i < 4; $i++)
                    <div class="col-6 col-md-3">
                    <div class="card related-product-card h-100">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Related Product">
                        </div>
                        <div class="card-body">
                            <div class="product-category mb-2">{{ $product->tags[0] ?? 'Fashion' }}</div>
                            <h5 class="related-product-title">Stylish {{ ['Dress', 'Shirt', 'Jeans', 'Jacket'][$i] }}</h5>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="related-product-price">${{ rand(20, 100) }}.99</div>
                                <div class="product-rating">
                                    @for($j = 0; $j < 5; $j++)
                                        @if($j < rand(3, 5))
                                        <i class="bi bi-star-fill"></i>
                                        @else
                                        <i class="bi bi-star"></i>
                                        @endif
                                        @endfor
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-sm btn-primary">View Details</a>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        </div>
    </section>

    <!-- Recently Viewed -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="related-products-title mb-4">Recently Viewed</h2>

            <div class="row g-4">
                @for($i = 0; $i < 4; $i++)
                    <div class="col-6 col-md-3">
                    <div class="card related-product-card h-100">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Recently Viewed Product">
                        </div>
                        <div class="card-body">
                            <div class="product-category mb-2">{{ ['Women\'s Fashion', 'Men\'s Fashion', 'Accessories', 'Footwear'][$i] }}</div>
                            <h5 class="related-product-title">{{ ['Summer Collection', 'Casual Outfit', 'Designer Bag', 'Running Shoes'][$i] }}</h5>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="related-product-price">${{ rand(20, 100) }}.99</div>
                                <div class="product-rating">
                                    @for($j = 0; $j < 5; $j++)
                                        @if($j < rand(3, 5))
                                        <i class="bi bi-star-fill"></i>
                                        @else
                                        <i class="bi bi-star"></i>
                                        @endif
                                        @endfor
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-sm btn-primary">View Details</a>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-cart-plus"></i>
                            </button>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5" style="background-color: #2d3436;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-2 text-white">Subscribe to Our Newsletter</h3>
                    <p class="mb-0 text-white-50">Get the latest updates on new products and upcoming sales</p>
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
    <footer class="pt-5 pb-4 text-white" style="background-color: #222;">
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
        document.addEventListener('DOMContentLoaded', function() {
            // Color selection
            const colorOptions = document.querySelectorAll('.color-option');
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    colorOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Size selection
            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Quantity selector
            const quantityInput = document.getElementById('quantity');
            const decreaseBtn = document.getElementById('decrease-quantity');
            const increaseBtn = document.getElementById('increase-quantity');

            decreaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                }
            });

            increaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                quantityInput.value = value + 1;
            });

            // Star rating in review form
            const starLabels = document.querySelectorAll('.star-rating label');
            starLabels.forEach(label => {
                label.addEventListener('click', function() {
                    const ratingValue = this.previousElementSibling.value;
                    console.log('Selected rating:', ratingValue);
                });
            });
        });
    </script>
</body>

</html>