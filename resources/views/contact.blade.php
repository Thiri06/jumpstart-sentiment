<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - JumpStart</title>
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
        
        /* Contact Hero Section */
        .contact-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1534536281715-e28d76689b4d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        
        /* Contact Form */
        .contact-form {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .contact-info-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }
        
        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .contact-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(255, 107, 107, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
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
            <a class="navbar-brand" href="{{ route('welcome') }}">JumpStart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('contact.show') }}">Contact Us</a>
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

    <!-- Contact Hero Section -->
    <section class="contact-hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Get In Touch</h1>
            <p class="lead mb-0">We'd love to hear from you! Send us a message and we'll respond as soon as possible.</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="contact-form p-5">
                        <h2 class="fw-bold mb-4">Send Us a Message</h2>
                        
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                                  placeholder="Your Message" 
                                                  id="description" 
                                                  name="description" 
                                                  style="height: 200px" 
                                                  required>{{ old('description') }}</textarea>
                                        <label for="description">Your Message</label>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm contact-info-card p-4">
                                <div class="card-body text-center">
                                    <div class="contact-icon">
                                        <i class="bi bi-geo-alt text-primary fs-3"></i>
                                    </div>
                                    <h4 class="fw-bold mb-2">Our Location</h4>
                                    <p class="text-muted mb-0">123 Fashion Street, New York, NY 10001</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm contact-info-card p-4">
                                <div class="card-body text-center">
                                    <div class="contact-icon">
                                        <i class="bi bi-telephone text-primary fs-3"></i>
                                    </div>
                                    <h4 class="fw-bold mb-2">Phone</h4>
                                    <p class="text-muted mb-0">(123) 456-7890</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm contact-info-card p-4">
                                <div class="card-body text-center">
                                    <div class="contact-icon">
                                        <i class="bi bi-envelope text-primary fs-3"></i>
                                    </div>
                                    <h4 class="fw-bold mb-2">Email</h4>
                                    <p class="text-muted mb-0">info@jumpstart.com</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="card border-0 shadow-sm contact-info-card p-4">
                                <div class="card-body text-center">
                                    <div class="contact-icon">
                                        <i class="bi bi-clock text-primary fs-3"></i>
                                    </div>
                                    <h4 class="fw-bold mb-2">Business Hours</h4>
                                    <p class="text-muted mb-0">Monday - Friday: 9AM - 6PM</p>
                                    <p class="text-muted mb-0">Saturday: 10AM - 4PM</p>
                                    <p class="text-muted mb-0">Sunday: Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ratio ratio-21x9 rounded overflow-hidden shadow-sm">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.11976397304605!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1659123456789!5m2!1sen!2s" 
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Frequently Asked Questions</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What are your shipping options?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer standard shipping (5-7 business days), express shipping (2-3 business days), and next-day delivery options. Free standard shipping is available on all orders over $50. International shipping is available to select countries.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 2 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What is your return policy?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer a 30-day return policy. Items must be unworn, unwashed, and with the original tags attached. Return shipping is free for exchanges, or if the return is due to our error. A return shipping label fee will be deducted from your refund for all other returns.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 3 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How can I track my order?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Once your order ships, you will receive a shipping confirmation email with a tracking number. You can use this tracking number on our website or the carrier's website to track your package's progress.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 4 -->
                        <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Do you offer international shipping?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we ship to select countries internationally. International shipping rates and delivery times vary by location. Please note that customers are responsible for any customs fees or import taxes that may apply.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ Item 5 -->
                        <div class="accordion-item border-0 shadow-sm rounded">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How do I care for my JumpStart clothing?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Each item comes with specific care instructions on the label. Generally, we recommend washing in cold water, hanging to dry, and avoiding bleach to maintain the quality and longevity of your garments.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

