<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - JumpStart Fashion</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
        
        .admin-sidebar {
            background-color: #343a40;
            min-height: calc(100vh - 56px);
            color: #fff;
        }
        
        .admin-sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 0.75rem 1.25rem;
            border-radius: 0;
            transition: all 0.3s;
        }
        
        .admin-sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .admin-sidebar .nav-link.active {
            color: #fff;
            background-color: #ff6b6b;
        }
        
        .admin-sidebar .nav-link i {
            margin-right: 10px;
        }
        
        .admin-content {
            padding: 2rem;
        }
        
        .dashboard-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }
        
        .dashboard-card .card-body {
            padding: 1.5rem;
        }
        
        .dashboard-card .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1rem;
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
        
        .sentiment-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 500;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 1rem 1.5rem;
        }
        
        .nav-tabs .nav-link.active {
            color: #ff6b6b;
            border-bottom: 3px solid #ff6b6b;
            background-color: transparent;
        }
        
        .nav-tabs .nav-link:hover:not(.active) {
            border-bottom: 3px solid #dee2e6;
        }
        
        .table-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .badge-sentiment {
            padding: 0.5rem 0.75rem;
            border-radius: 30px;
            font-weight: 500;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">JumpStart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">View Site</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="dropdown">
                        <a class="text-white dropdown-toggle text-decoration-none" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=ff6b6b&color=fff" class="avatar me-2" alt="{{ Auth::user()->name }}">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
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
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block admin-sidebar collapse">
                <div class="pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-box-seam"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-chat-square-text"></i> Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-graph-up"></i> Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="admin-content">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
                        <h1 class="h2">Admin Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Print</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary">
                                <i class="bi bi-plus"></i> New Report
                            </button>
                        </div>
                    </div>

                    <!-- Dashboard Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <div class="icon-box bg-primary bg-opacity-10 text-primary">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                    <h5 class="card-title">Total Products</h5>
                                    <h2 class="mb-0">124</h2>
                                    <p class="text-success mb-0 mt-2">
                                        <i class="bi bi-arrow-up"></i> 12% increase
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <div class="icon-box bg-success bg-opacity-10 text-success">
                                        <i class="bi bi-chat-square-text"></i>
                                    </div>
                                    <h5 class="card-title">Total Reviews</h5>
                                    <h2 class="mb-0">842</h2>
                                    <p class="text-success mb-0 mt-2">
                                        <i class="bi bi-arrow-up"></i> 8% increase
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <div class="icon-box bg-warning bg-opacity-10 text-warning">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <h5 class="card-title">Total Users</h5>
                                    <h2 class="mb-0">1,254</h2>
                                    <p class="text-success mb-0 mt-2">
                                        <i class="bi bi-arrow-up"></i> 5% increase
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <div class="icon-box bg-info bg-opacity-10 text-info">
                                        <i class="bi bi-question-circle"></i>
                                    </div>
                                    <h5 class="card-title">Inquiries</h5>
                                    <h2 class="mb-0">56</h2>
                                    <p class="text-danger mb-0 mt-2">
                                        <i class="bi bi-arrow-down"></i> 3% decrease
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sentiment Analysis Overview -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card dashboard-card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Sentiment Analysis Overview</h5>
                                    <div class="row">
                                        <div class="col-md-3 text-center">
                                            <div class="sentiment-positive p-3 rounded-3 mb-2">
                                                <h3 class="mb-0">65%</h3>
                                                <p class="mb-0">Positive</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <div class="sentiment-negative p-3 rounded-3 mb-2">
                                                <h3 class="mb-0">15%</h3>
                                                <p class="mb-0">Negative</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <div class="sentiment-neutral p-3 rounded-3 mb-2">
                                                <h3 class="mb-0">20%</h3>
                                                <p class="mb-0">Neutral</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <div class="sentiment-pending p-3 rounded-3 mb-2">
                                                <h3 class="mb-0">42</h3>
                                                <p class="mb-0">Pending Analysis</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs for Reviews and Inquiries -->
                    <ul class="nav nav-tabs" id="reviewTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="product-reviews-tab" data-bs-toggle="tab" data-bs-target="#product-reviews" type="button" role="tab" aria-controls="product-reviews" aria-selected="true">
                                <i class="bi bi-star me-2"></i>Product Reviews
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="user-inquiries-tab" data-bs-toggle="tab" data-bs-target="#user-inquiries" type="button" role="tab" aria-controls="user-inquiries" aria-selected="false">
                                <i class="bi bi-chat-dots me-2"></i>User Inquiries
                            </button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="reviewTabsContent">
                        <!-- Product Reviews Tab -->
                        <div class="tab-pane fade show active" id="product-reviews" role="tabpanel" aria-labelledby="product-reviews-tab">
                            <div class="table-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Product Reviews</h5>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary me-2">
                                            <i class="bi bi-filter"></i> Filter
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download"></i> Export
                                        </button>
                                    </div>
                                </div>
                                
                                <table id="productReviewsTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Review</th>
                                            <th>Sentiment</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data - would be replaced with actual data from database -->
                                        <tr>
                                            <td>#REV001</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=0D8ABC&color=fff" class="avatar me-2" alt="John Doe">
                                                    <div>
                                                        <p class="mb-0 fw-medium">John Doe</p>
                                                        <small class="text-muted">john@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://via.placeholder.com/40" class="me-2 rounded" alt="Product">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Summer Dress</p>
                                                        <small class="text-muted">Women's Fashion</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">The dress is absolutely beautiful and fits perfectly. The material is high quality and comfortable to wear.</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-success badge-sentiment">Positive</span>
                                            </td>
                                            <td>May 12, 2023</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#REV002</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Sarah+Smith&background=E91E63&color=fff" class="avatar me-2" alt="Sarah Smith">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Sarah Smith</p>
                                                        <small class="text-muted">sarah@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://via.placeholder.com/40" class="me-2 rounded" alt="Product">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Leather Jacket</p>
                                                        <small class="text-muted">Men's Fashion</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">The jacket arrived damaged and the zipper doesn't work properly. Very disappointed with the quality.</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger badge-sentiment">Negative</span>
                                            </td>
                                            <td>May 10, 2023</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#REV003</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Michael+Johnson&background=4CAF50&color=fff" class="avatar me-2" alt="Michael Johnson">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Michael Johnson</p>
                                                        <small class="text-muted">michael@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://via.placeholder.com/40" class="me-2 rounded" alt="Product">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Running Shoes</p>
                                                        <small class="text-muted">Footwear</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">The shoes are comfortable but they run a bit small. I would recommend ordering a size up.</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary badge-sentiment">Neutral</span>
                                            </td>
                                            <td>May 8, 2023</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#REV004</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=FF9800&color=fff" class="avatar me-2" alt="Emily Davis">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Emily Davis</p>
                                                        <small class="text-muted">emily@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://via.placeholder.com/40" class="me-2 rounded" alt="Product">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Silk Scarf</p>
                                                        <small class="text-muted">Accessories</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">Just received my order today. Haven't tried it yet but it looks good.</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning badge-sentiment">Pending</span>
                                            </td>
                                            <td>May 5, 2023</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#REV005</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Robert+Wilson&background=673AB7&color=fff" class="avatar me-2" alt="Robert Wilson">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Robert Wilson</p>
                                                        <small class="text-muted">robert@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://via.placeholder.com/40" class="me-2 rounded" alt="Product">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Casual Shirt</p>
                                                        <small class="text-muted">Men's Fashion</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">Excellent quality and fast shipping. Will definitely buy from this store again!</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-success badge-sentiment">Positive</span>
                                            </td>
                                            <td>May 3, 2023</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- User Inquiries Tab -->
                        <div class="tab-pane fade" id="user-inquiries" role="tabpanel" aria-labelledby="user-inquiries-tab">
                            <div class="table-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">User Inquiries</h5>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary me-2">
                                            <i class="bi bi-filter"></i> Filter
                                        </button>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download"></i> Export
                                        </button>
                                    </div>
                                </div>
                                
                                <table id="userInquiriesTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Sentiment</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data - would be replaced with actual data from database -->
                                        <tr>
                                            <td>#INQ001</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Lisa+Brown&background=3F51B5&color=fff" class="avatar me-2" alt="Lisa Brown">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Lisa Brown</p>
                                                        <small class="text-muted">lisa@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Order Status</td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">I placed an order 3 days ago and haven't received any shipping confirmation. Could you please check the status?</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary badge-sentiment">Neutral</span>
                                            </td>
                                            <td>May 15, 2023</td>
                                            <td>
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Reply</button>
                                                </div>
                                            </td>
                                            </tr>
                                        <tr>
                                            <td>#INQ002</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=David+Miller&background=009688&color=fff" class="avatar me-2" alt="David Miller">
                                                    <div>
                                                        <p class="mb-0 fw-medium">David Miller</p>
                                                        <small class="text-muted">david@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Return Policy</td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">I'm very disappointed with your return policy. I tried to return an item and was denied. This is unacceptable!</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-danger badge-sentiment">Negative</span>
                                            </td>
                                            <td>May 14, 2023</td>
                                            <td>
                                                <span class="badge bg-success">Resolved</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Reply</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INQ003</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Jennifer+Lee&background=F44336&color=fff" class="avatar me-2" alt="Jennifer Lee">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Jennifer Lee</p>
                                                        <small class="text-muted">jennifer@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Product Availability</td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">I love your summer collection! When will the blue dress in size M be back in stock? I can't wait to purchase it.</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-success badge-sentiment">Positive</span>
                                            </td>
                                            <td>May 12, 2023</td>
                                            <td>
                                                <span class="badge bg-primary">In Progress</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Reply</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INQ004</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Thomas+Clark&background=795548&color=fff" class="avatar me-2" alt="Thomas Clark">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Thomas Clark</p>
                                                        <small class="text-muted">thomas@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Shipping Question</td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">Do you offer international shipping? If so, what are the rates for shipping to Canada?</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary badge-sentiment">Neutral</span>
                                            </td>
                                            <td>May 10, 2023</td>
                                            <td>
                                                <span class="badge bg-warning">Pending</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Reply</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#INQ005</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=Amanda+White&background=FF5722&color=fff" class="avatar me-2" alt="Amanda White">
                                                    <div>
                                                        <p class="mb-0 fw-medium">Amanda White</p>
                                                        <small class="text-muted">amanda@example.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Payment Issue</td>
                                            <td>
                                                <p class="mb-0 text-truncate" style="max-width: 200px;">I'm having trouble completing my payment. The system keeps declining my credit card even though it works on other sites.</p>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning badge-sentiment">Pending</span>
                                            </td>
                                            <td>May 9, 2023</td>
                                            <td>
                                                <span class="badge bg-danger">Urgent</span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button" class="btn btn-sm btn-outline-primary">Reply</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2023 JumpStart Admin Panel. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Version 1.0.0</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            $('#productReviewsTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search reviews..."
                }
            });
            
            $('#userInquiriesTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search inquiries..."
                }
            });
            
            // Tooltip initialization
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // Handle tab change to redraw tables
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
            });
        });
    </script>
</body>
</html>

