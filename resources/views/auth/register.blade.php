<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - JumpStart Fashion</title>
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
        
        .register-container {
            max-width: 550px;
            margin: 0 auto;
        }
        
        .register-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .register-header {
            background-color: #ff6b6b;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .register-body {
            padding: 2rem;
        }
        
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 0.25rem rgba(255, 107, 107, 0.25);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .register-footer {
            text-align: center;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-top: 1px solid #eee;
        }
        
        .password-strength {
            height: 5px;
            border-radius: 5px;
            margin-top: 8px;
            transition: all 0.3s ease;
        }
        
        .password-strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        
        .divider span {
            padding: 0 1rem;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        footer {
            background-color: #222;
            color: white;
            padding: 1rem 0;
            margin-top: 3rem;
        }
        
        .social-signup-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #495057;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .social-signup-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .facebook:hover {
            background-color: #3b5998;
            color: white;
            border-color: #3b5998;
        }
        
        .google:hover {
            background-color: #db4437;
            color: white;
            border-color: #db4437;
        }
        
        .apple:hover {
            background-color: #000;
            color: white;
            border-color: #000;
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
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Register Section -->
    <section class="py-5">
        <div class="container">
            <div class="register-container">
                <div class="card register-card">
                    <div class="register-header">
                        <h2 class="mb-1 fw-bold">Create Account</h2>
                        <p class="mb-0">Join JumpStart and discover the latest fashion trends</p>
                    </div>
                    
                    <div class="register-body">
                        <!-- Social Signup -->
                        <div class="text-center mb-3">
                            <a href="#" class="social-signup-btn facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="social-signup-btn google">
                                <i class="bi bi-google"></i>
                            </a>
                            <a href="#" class="social-signup-btn apple">
                                <i class="bi bi-apple"></i>
                            </a>
                        </div>
                        
                        <div class="divider">
                            <span>or sign up with email</span>
                        </div>
                        
                        <!-- Register Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                
                                <!-- Password Strength Indicator -->
                                <div class="password-strength bg-light" id="passwordStrength"></div>
                                <div class="password-strength-text text-muted" id="passwordStrengthText">Password strength</div>
                                
                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            
                            <!-- Terms and Conditions -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none text-primary">Terms of Service</a> and <a href="#" class="text-decoration-none text-primary">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                                <i class="bi bi-person-plus me-2"></i>Create Account
                            </button>
                        </form>
                    </div>
                    
                    <div class="register-footer">
                        <p class="mb-0">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">
                                Sign In
                            </a>
                        </p>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="/" class="text-decoration-none text-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Back to Home
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 JumpStart. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="payment-methods">
                        <i class="bi bi-credit-card-2-front fs-5 mx-1" title="Credit Card"></i>
                        <i class="bi bi-paypal fs-5 mx-1" title="PayPal"></i>
                        <i class="bi bi-wallet2 fs-5 mx-1" title="Digital Wallet"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
        
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('passwordStrengthText');
            
            // Calculate password strength
            let strength = 0;
            
            // Length check
            if (password.length >= 8) {
                strength += 1;
            }
            
            // Lowercase check
            if (/[a-z]/.test(password)) {
                strength += 1;
            }
            
            // Uppercase check
            if (/[A-Z]/.test(password)) {
                strength += 1;
            }
            
            // Number check
            if (/[0-9]/.test(password)) {
                strength += 1;
            }
            
            // Special character check
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 1;
            }
            
            // Update strength bar
            switch(strength) {
                case 0:
                    strengthBar.style.width = '0%';
                    strengthBar.className = 'password-strength bg-light';
                    strengthText.textContent = 'Password strength';
                    strengthText.className = 'password-strength-text text-muted';
                    break;
                case 1:
                    strengthBar.style.width = '20%';
                    strengthBar.className = 'password-strength bg-danger';
                    strengthText.textContent = 'Very weak';
                    strengthText.className = 'password-strength-text text-danger';
                    break;
                case 2:
                    strengthBar.style.width = '40%';
                    strengthBar.className = 'password-strength bg-warning';
                    strengthText.textContent = 'Weak';
                    strengthText.className = 'password-strength-text text-warning';
                    break;
                case 3:
                    strengthBar.style.width = '60%';
                    strengthBar.className = 'password-strength bg-info';
                    strengthText.textContent = 'Medium';
                    strengthText.className = 'password-strength-text text-info';
                    break;
                case 4:
                    strengthBar.style.width = '80%';
                    strengthBar.className = 'password-strength bg-primary';
                    strengthText.textContent = 'Strong';
                    strengthText.className = 'password-strength-text text-primary';
                    break;
                case 5:
                    strengthBar.style.width = '100%';
                    strengthBar.className = 'password-strength bg-success';
                    strengthText.textContent = 'Very strong';
                    strengthText.className = 'password-strength-text text-success';
                    break;
            }
        });
        
        // Check password confirmation match
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (password === confirmPassword) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    </script>
</body>
</html>
