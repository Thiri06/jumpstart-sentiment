<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews - JumpStart Fashion</title>
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
        
        .review-stats-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            border: none;
            overflow: hidden;
        }
        
        .review-stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .review-stats-card .card-body {
            padding: 1.25rem;
        }
        
        .review-stats-card .icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .review-detail-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }
        
        .review-detail-card .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
            padding: 1rem 1.25rem;
        }
        
        .review-detail-card .card-body {
            padding: 1.25rem;
        }
        
        .star-rating .bi-star-fill {
            color: #ffc107;
        }
        
        .star-rating .bi-star {
            color: #e2e3e5;
        }
        
        .modal-content {
            border: none;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            border-bottom: 1px solid #f1f1f1;
            padding: 1.25rem;
        }
        
        .modal-footer {
            border-top: 1px solid #f1f1f1;
            padding: 1.25rem;
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
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
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
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.reviews') }}">
                                <i class="bi bi-chat-square-text"></i> Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.inquiries') }}">
                                <i class="bi bi-chat-dots"></i> Inquiries
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
                        <h1 class="h2">Product Reviews</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Print</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-primary">
                                <i class="bi bi-filter"></i> Filter
                            </button>
                        </div>
                    </div>

                    <!-- Review Stats -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card review-stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="icon-wrapper sentiment-positive">
                                            <i class="bi bi-emoji-smile"></i>
                                        </div>
                                        <div class="text-end">
                                            <h6 class="text-muted mb-0">Positive</h6>
                                            <h3 class="mb-0">{{ ($sentimentStats['positive']['count'] ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $sentimentStats['positive']['percentage'] ?? 0 }}%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">Total Reviews</small>
                                        <small class="text-success">{{ $sentimentStats['positive']['percentage'] ?? 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card review-stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="icon-wrapper sentiment-negative">
                                            <i class="bi bi-emoji-frown"></i>
                                        </div>
                                        <div class="text-end">
                                            <h6 class="text-muted mb-0">Negative</h6>
                                            <h3 class="mb-0">{{ ($sentimentStats['negative']['count'] ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $sentimentStats['negative']['percentage'] ?? 0 }}%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">Total Reviews</small>
                                        <small class="text-danger">{{ $sentimentStats['negative']['percentage'] ?? 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card review-stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="icon-wrapper sentiment-neutral">
                                            <i class="bi bi-emoji-neutral"></i>
                                        </div>
                                        <div class="text-end">
                                            <h6 class="text-muted mb-0">Neutral</h6>
                                            <h3 class="mb-0">{{ ($sentimentStats['neutral']['count'] ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $sentimentStats['neutral']['percentage'] ?? 0 }}%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">Total Reviews</small>
                                        <small class="text-secondary">{{ $sentimentStats['neutral']['percentage'] ?? 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card review-stats-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="icon-wrapper sentiment-pending">
                                            <i class="bi bi-hourglass-split"></i>
                                        </div>
                                        <div class="text-end">
                                            <h6 class="text-muted mb-0">Pending</h6>
                                            <h3 class="mb-0">{{ ($sentimentStats['pending']['count'] ?? 0) }}</h3>
                                        </div>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $sentimentStats['pending']['percentage'] ?? 0 }}%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">Total Reviews</small>
                                        <small class="text-warning">{{ $sentimentStats['pending']['percentage'] ?? 0 }}%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Users' Reviews Table -->
                    <div class="table-container">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">All Product Reviews</h5>
                            <div>
                                <button class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-filter"></i> Filter
                                </button>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Export
                                </button>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="reviewsTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>Sentiment</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reviews as $review)
                                    <tr>
                                        <td>{{ $review->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($review->user->name) }}&background=random&color=fff" class="avatar me-2" alt="{{ $review->user->name }}">
                                                <div>
                                                    <p class="mb-0 fw-medium">{{ $review->user->name }}</p>
                                                    <small class="text-muted">{{ $review->user->email }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($review->product->image)
                                                    <img src="{{ $review->product->image }}" class="me-2 rounded" alt="{{ $review->product->name }}" width="40" height="40" style="object-fit: cover;">
                                                @else
                                                    <img src="https://via.placeholder.com/40" class="me-2 rounded" alt="Product">
                                                @endif
                                                <div>
                                                    <p class="mb-0 fw-medium">{{ $review->product->name }}</p>
                                                    <small class="text-muted">{{ $review->product->category }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="star-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= ($review->rating ?? 0))
                                                        <i class="bi bi-star-fill"></i>
                                                    @else
                                                        <i class="bi bi-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-truncate" style="max-width: 150px;" title="{{ $review->description }}">{{ $review->description }}</p>
                                        </td>
                                        <td>
                                            @if($review->sentiment_status)
                                                @php
                                                    $sentimentClass = '';
                                                    if(in_array($review->sentiment_status, ['Positive', 'Very Positive'])) {
                                                        $sentimentClass = 'bg-success';
                                                    } elseif(in_array($review->sentiment_status, ['Negative', 'Very Negative'])) {
                                                        $sentimentClass = 'bg-danger';
                                                    } elseif($review->sentiment_status == 'Neutral') {
                                                        $sentimentClass = 'bg-secondary';
                                                    } else {
                                                        $sentimentClass = 'bg-warning';
                                                    }
                                                @endphp
                                                <span class="badge {{ $sentimentClass }} badge-sentiment">{{ $review->sentiment_status }}</span>
                                            @else
                                                <span class="badge bg-warning badge-sentiment">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $review->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary view-review" data-bs-toggle="modal" data-bs-target="#reviewDetailModal" data-id="{{ $review->id }}">View</button>
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-review" data-bs-toggle="modal" data-bs-target="#deleteReviewModal" data-id="{{ $review->id }}">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-chat-square-text text-muted" style="font-size: 2rem;"></i>
                                                <h5 class="mt-3">No reviews found</h5>
                                                <p class="text-muted">There are no product reviews in the system yet.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <div class="d-flex justify-content-center mt-4">
                                {{ $reviews->onEachSide(1)->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Review Detail Modal -->
    <div class="modal fade" id="reviewDetailModal" tabindex="-1" aria-labelledby="reviewDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewDetailModalLabel">Review Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="review-detail-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Review Information</h6>
                                <span id="reviewDetailDate" class="text-muted"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <img id="reviewDetailUserAvatar" src="" class="avatar me-3" alt="User">
                                        <div>
                                            <h6 id="reviewDetailUserName" class="mb-0"></h6>
                                            <p id="reviewDetailUserEmail" class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <img id="reviewDetailProductImage" src="" class="me-3 rounded" alt="Product" width="50" height="50" style="object-fit: cover;">
                                        <div>
                                            <h6 id="reviewDetailProductName" class="mb-0"></h6>
                                            <p id="reviewDetailProductCategory" class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h6 class="mb-2">Rating</h6>
                                    <div id="reviewDetailRating" class="star-rating"></div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="mb-2">Sentiment Analysis</h6>
                                    <span id="reviewDetailSentiment" class="badge badge-sentiment"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-2">Review Content</h6>
                                    <p id="reviewDetailContent" class="p-3 bg-light rounded"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update Sentiment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteReviewModal" tabindex="-1" aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteReviewModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this review? This action cannot be undone.</p>
                    <form id="deleteReviewForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="deleteReviewId" name="review_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Review</button>
                </div>
            </div>
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
    
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            console.log('Document ready');
            // Initialize DataTables
            $('#reviewsTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search reviews..."
                }
            });
            var reviewDetailModal = new bootstrap.Modal(document.getElementById('reviewDetailModal'));
            var deleteReviewModal = new bootstrap.Modal(document.getElementById('deleteReviewModal'));

            // Tooltip initialization
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
            
            // View Review Modal
            $(document).on('click', '.view-review', function() {
                const reviewId = $(this).data('id');
                console.log('View clicked for review ID:', reviewId);
                
                // In a real application, you would fetch the review details via AJAX
                // For demonstration, we'll use the data already in the table
                const row = $(this).closest('tr');
                
                // Get data from the row
                const userName = row.find('td:eq(1) .fw-medium').text();

                const userEmail = row.find('td:eq(1) small').text();
                const userAvatar = row.find('td:eq(1) img').attr('src');
                
                const productName = row.find('td:eq(2) .fw-medium').text();
                const productCategory = row.find('td:eq(2) small').text();
                let productImage = row.find('td:eq(2) img').attr('src');
                console.log('Product image URL:', productImage);

                const rating = row.find('td:eq(3) .bi-star-fill').length;
                const reviewContent = row.find('td:eq(4) p').text();
                
                const sentiment = row.find('td:eq(5) .badge').text();
                const sentimentClass = row.find('td:eq(5) .badge').attr('class').split(' ').find(cls => cls.startsWith('bg-'));
                
                const date = row.find('td:eq(6)').text();
                
                // Populate the modal with the data
                $('#reviewDetailUserName').text(userName);
                $('#reviewDetailUserEmail').text(userEmail);
                $('#reviewDetailUserAvatar').attr('src', userAvatar);
                
                $('#reviewDetailProductName').text(productName);
                $('#reviewDetailProductCategory').text(productCategory);
                // Handle product image with error fallback
                if (productImage) {
                    $('#reviewDetailProductImage').attr('src', productImage)
                        .on('error', function() {
                            $(this).attr('src', 'https://via.placeholder.com/50');
                            console.log('Product image failed to load, using placeholder');
                        });
                } else {
                    $('#reviewDetailProductImage').attr('src', 'https://via.placeholder.com/50');
                }
                
                // Set rating stars
                let ratingHtml = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        ratingHtml += '<i class="bi bi-star-fill"></i> ';
                    } else {
                        ratingHtml += '<i class="bi bi-star"></i> ';
                    }
                }
                $('#reviewDetailRating').html(ratingHtml);
                
                $('#reviewDetailContent').text(reviewContent);
                $('#reviewDetailSentiment').text(sentiment).removeClass().addClass(`badge ${sentimentClass} badge-sentiment`);
                $('#reviewDetailDate').text(date);
            });
            
            // Delete Review
            $(document).on('click', '.delete-review', function() {
                const reviewId = $(this).data('id');
                $('#deleteReviewId').val(reviewId);
                
                // Set up the form action URL
                const deleteUrl = `/admin/reviews/${reviewId}`;
                $('#deleteReviewForm').attr('action', deleteUrl);
            });
            
            // Confirm Delete Button
            $('#confirmDeleteBtn').on('click', function() {
                $('#deleteReviewForm').submit();
            });
        });
    </script>
</body>
</html>

