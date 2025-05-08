<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Inquiries - JumpStart Fashion</title>
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
        
        .status-responded {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .status-urgent {
            background-color: #f8d7da;
            color: #721c24;
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
        
        .inquiry-stats-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            border: none;
            overflow: hidden;
            height: 100%;
        }
        
        .inquiry-stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .inquiry-stats-card .card-body {
            padding: 1.25rem;
        }
        
        .inquiry-stats-card .icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .inquiry-detail-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }
        
        .inquiry-detail-card .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
            padding: 1rem 1.25rem;
        }
        
        .inquiry-detail-card .card-body {
            padding: 1.25rem;
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
        
        .inquiry-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }
        
        .inquiry-card:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
        }
        
        .inquiry-card .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
            padding: 1rem 1.25rem;
        }
        
        .inquiry-card .card-body {
            padding: 1.25rem;
        }
        
        .inquiry-card .card-footer {
            background-color: #fff;
            border-top: 1px solid #f1f1f1;
            padding: 1rem 1.25rem;
        }
        
        .priority-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 0.35rem 0.65rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .priority-high {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .priority-medium {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .priority-low {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-badge {
            padding: 0.35rem 0.65rem;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-responded {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .tab-content {
            padding-top: 1.5rem;
        }
        
        .nav-pills .nav-link {
            color: #495057;
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            margin-right: 0.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .nav-pills .nav-link.active {
            background-color: #ff6b6b;
            color: #fff;
        }
        
        .nav-pills .nav-link:hover:not(.active) {
            background-color: #f8f9fa;
        }
        
        .chart-container {
            position: relative;
            height: 250px;
            width: 100%;
        }
        
        .inquiry-timeline {
            position: relative;
            padding-left: 2rem;
        }
        
        .inquiry-timeline::before {
            content: '';
            position: absolute;
            left: 0.85rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #e9ecef;
        }
        
        .timeline-item {
            position: relative;
            padding-bottom: 1.5rem;
        }
        
        .timeline-item:last-child {
            padding-bottom: 0;
        }
        
        .timeline-dot {
            position: absolute;
            left: -2rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            background-color: #ff6b6b;
            top: 0.25rem;
        }
        
        .timeline-content {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
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
                            <a class="nav-link" href="{{ route('admin.reviews') }}">
                                <i class="bi bi-chat-square-text"></i> Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.inquiries') }}">
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
                        <h1 class="h2">Customer Inquiries</h1>
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

                    <!-- Inquiry Stats -->
                    {{-- <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card inquiry-stats-card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Inquiry Overview</h5>
                                    <div class="row">
                                        <div class="col-md-4 text-center mb-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="status-responded p-3 rounded-circle mb-2">
                                                    <i class="bi bi-check-circle"></i>
                                                </div>
                                                <h3 class="mb-0">{{ $responseStats['responded']['count'] ?? 0 }}</h3>
                                                <p class="mb-0 text-muted">Responded</p>
                                                <div class="progress mt-2 w-75">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $responseStats['responded']['percentage'] ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center mb-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="status-pending p-3 rounded-circle mb-2">
                                                    <i class="bi bi-hourglass-split"></i>
                                                </div>
                                                <h3 class="mb-0">{{ $responseStats['pending']['count'] ?? 0 }}</h3>
                                                <p class="mb-0 text-muted">Pending</p>
                                                <div class="progress mt-2 w-75">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $responseStats['pending']['percentage'] ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center mb-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="status-urgent p-3 rounded-circle mb-2">
                                                    <i class="bi bi-exclamation-triangle"></i>
                                                </div>
                                                <h3 class="mb-0">{{ $responseStats['urgent']['count'] ?? 0 }}</h3>
                                                <p class="mb-0 text-muted">Urgent</p>
                                                <div class="progress mt-2 w-75">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $responseStats['urgent']['percentage'] ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card inquiry-stats-card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Sentiment Analysis</h5>
                                    <div class="chart-container">
                                        <canvas id="sentimentChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Inquiry Filters -->
                    {{-- <div class="card mb-4">
                        <div class="card-body">
                            <ul class="nav nav-pills" id="inquiryTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="all-inquiries-tab" data-bs-toggle="pill" data-bs-target="#all-inquiries" type="button" role="tab" aria-controls="all-inquiries" aria-selected="true">
                                        All Inquiries
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pending-inquiries-tab" data-bs-toggle="pill" data-bs-target="#pending-inquiries" type="button" role="tab" aria-controls="pending-inquiries" aria-selected="false">
                                        Pending
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="responded-inquiries-tab" data-bs-toggle="pill" data-bs-target="#responded-inquiries" type="button" role="tab" aria-controls="responded-inquiries" aria-selected="false">
                                        Responded
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="urgent-inquiries-tab" data-bs-toggle="pill" data-bs-target="#urgent-inquiries" type="button" role="tab" aria-controls="urgent-inquiries" aria-selected="false">
                                        Urgent
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                    <!-- Inquiries Table -->
                    <div class="tab-content" id="inquiryTabsContent">
                        <div class="tab-pane fade show active" id="all-inquiries" role="tabpanel" aria-labelledby="all-inquiries-tab">
                            <div class="table-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">All Customer Inquiries</h5>
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
                                    <table id="inquiriesTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Sentiment</th>
                                                {{-- <th>Status</th> --}}
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($inquiries as $inquiry)
                                            <tr>
                                                <td>#{{ $inquiry->id }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($inquiry->user->name) }}&background=random&color=fff" class="avatar me-2" alt="{{ $inquiry->user->name }}">
                                                        <div>
                                                            <p class="mb-0 fw-medium">{{ $inquiry->user->name }}</p>
                                                            <small class="text-muted">{{ $inquiry->user->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 fw-medium">{{ $inquiry->subject ?? 'General Inquiry' }}</p>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-truncate" style="max-width: 150px;" title="{{ $inquiry->description }}">{{ $inquiry->description }}</p>
                                                </td>
                                                <td>
                                                    @if($inquiry->sentiment_status)
                                                        @php
                                                            $sentimentClass = '';
                                                            if(in_array($inquiry->sentiment_status, ['Positive', 'Very Positive'])) {
                                                                $sentimentClass = 'bg-success';
                                                            } elseif(in_array($inquiry->sentiment_status, ['Negative', 'Very Negative'])) {
                                                                $sentimentClass = 'bg-danger';
                                                            } elseif($inquiry->sentiment_status == 'Neutral') {
                                                                $sentimentClass = 'bg-secondary';
                                                            } else {
                                                                $sentimentClass = 'bg-warning';
                                                            }
                                                        @endphp
                                                        <span class="badge {{ $sentimentClass }} badge-sentiment">{{ $inquiry->sentiment_status }}</span>
                                                    @else
                                                        <span class="badge bg-warning badge-sentiment">Pending</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @php
                                                        $statusClass = '';
                                                        $statusText = 'Pending';
                                                        
                                                        if(isset($inquiry->status)) {
                                                            if($inquiry->status == 'responded') {
                                                                $statusClass = 'bg-primary';
                                                                $statusText = 'Responded';
                                                            } elseif($inquiry->status == 'pending') {
                                                                $statusClass = 'bg-warning';
                                                                $statusText = 'Pending';
                                                            }
                                                        }
                                                        
                                                        if(isset($inquiry->priority) && $inquiry->priority == 'high') {
                                                            $statusClass = 'bg-danger';
                                                            $statusText = 'Urgent';
                                                        }
                                                    @endphp
                                                    <span class="badge {{ $statusClass }} status-badge">{{ $statusText }}</span>
                                                </td> --}}
                                                <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-primary view-inquiry" data-bs-toggle="modal" data-bs-target="#inquiryDetailModal" data-id="{{ $inquiry->id }}">View</button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger delete-inquiry" data-bs-toggle="modal" data-bs-target="#deleteInquiryModal" data-id="{{ $inquiry->id }}">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">
                                                    <div class="d-flex flex-column align-items-center">
                                                        <i class="bi bi-chat-dots text-muted" style="font-size: 2rem;"></i>
                                                        <h5 class="mt-3">No inquiries found</h5>
                                                        <p class="text-muted">There are no customer inquiries in the system yet.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Pagination -->
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $inquiries->onEachSide(1)->links('vendor.pagination.custom') }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Other tabs would have similar content but with filtered data -->
                        <div class="tab-pane fade" id="pending-inquiries" role="tabpanel" aria-labelledby="pending-inquiries-tab">
                            <div class="table-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Pending Inquiries</h5>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download"></i> Export
                                        </button>
                                    </div>
                                </div>
                                
                                <p class="text-muted">This tab would display only pending inquiries.</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="responded-inquiries" role="tabpanel" aria-labelledby="responded-inquiries-tab">
                            <div class="table-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Responded Inquiries</h5>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download"></i> Export
                                        </button>
                                    </div>
                                </div>
                                
                                <p class="text-muted">This tab would display only responded inquiries.</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="urgent-inquiries" role="tabpanel" aria-labelledby="urgent-inquiries-tab">
                            <div class="table-container">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Urgent Inquiries</h5>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-download"></i> Export
                                        </button>
                                    </div>
                                </div>
                                
                                <p class="text-muted">This tab would display only urgent inquiries.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Inquiry Detail Modal -->
    <div class="modal fade" id="inquiryDetailModal" tabindex="-1" aria-labelledby="inquiryDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inquiryDetailModalLabel">Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="inquiry-detail-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0" id="inquiryDetailSubject">General Inquiry</h6>
                                <span id="inquiryDetailDate" class="text-muted"></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <img id="inquiryDetailUserAvatar" src="" class="avatar me-3" alt="User">
                                        <div>
                                            <h6 id="inquiryDetailUserName" class="mb-0"></h6>
                                            <p id="inquiryDetailUserEmail" class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <span id="inquiryDetailStatus" class="badge status-badge me-2"></span>
                                    <span id="inquiryDetailSentiment" class="badge badge-sentiment"></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-2">Inquiry Content</h6>
                                    <p id="inquiryDetailContent" class="p-3 bg-light rounded"></p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="mb-3">Response Timeline</h6>
                                    <div class="inquiry-timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-dot"></div>
                                            <div class="timeline-content">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>Inquiry Received</strong>
                                                    <small class="text-muted" id="inquiryReceivedDate"></small>
                                                </div>
                                                <p class="mb-0">Customer submitted the inquiry.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="timeline-item" id="responseTimelineItem" style="display: none;">
                                            <div class="timeline-dot"></div>
                                            <div class="timeline-content">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <strong>Response Sent</strong>
                                                    <small class="text-muted" id="responseDate"></small>
                                                </div>
                                                <p class="mb-0" id="responseContent">Response content will appear here.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card inquiry-detail-card" id="responseCard">
                        <div class="card-header">
                            <h6 class="mb-0">Send Response</h6>
                        </div>
                        <div class="card-body">
                            <form id="responseForm">
                                <div class="mb-3">
                                    <label for="responseMessage" class="form-label">Response Message</label>
                                    <textarea class="form-control" id="responseMessage" rows="4" placeholder="Type your response here..."></textarea>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="markAsResolved">
                                    <label class="form-check-label" for="markAsResolved">
                                        Mark inquiry as resolved
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendResponseBtn">Send Response</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteInquiryModal" tabindex="-1" aria-labelledby="deleteInquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteInquiryModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this inquiry? This action cannot be undone.</p>
                    <form id="deleteInquiryForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="deleteInquiryId" name="inquiry_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Inquiry</button>
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
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            $('#inquiriesTable').DataTable({
                responsive: true,
                paging: false,
                info: false,
                searching: true
            });
            
            // Initialize sentiment chart
            var ctx = document.getElementById('sentimentChart').getContext('2d');
            var sentimentChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Positive', 'Negative', 'Neutral', 'Pending'],
                    datasets: [{
                        data: [
                            {{ $sentimentStats['positive']['count'] ?? 0 }}, 
                            {{ $sentimentStats['negative']['count'] ?? 0 }}, 
                            {{ $sentimentStats['neutral']['count'] ?? 0 }}, 
                            {{ $sentimentStats['pending']['count'] ?? 0 }}
                        ],
                        backgroundColor: [
                            '#28a745',
                            '#dc3545',
                            '#6c757d',
                            '#ffc107'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                boxWidth: 12
                            }
                        }
                    }
                }
            });
            
            // Use event delegation for view button clicks
            $(document).on('click', '.view-inquiry', function(e) {
                e.preventDefault();
                console.log('View inquiry clicked');
                
                try {
                    const inquiryId = $(this).data('id');
                    console.log('Inquiry ID:', inquiryId);
                    
                    // Get data from the row
                    const row = $(this).closest('tr');
                    
                    const userName = row.find('td:eq(1) .fw-medium').text();
                    const userEmail = row.find('td:eq(1) small').text();
                    const userAvatar = row.find('td:eq(1) img').attr('src');
                    
                    const subject = row.find('td:eq(2) .fw-medium').text();
                    const inquiryContent = row.find('td:eq(3) p').attr('title') || row.find('td:eq(3) p').text();
                    
                    const sentiment = row.find('td:eq(4) .badge').text();
                    const sentimentClass = row.find('td:eq(4) .badge').attr('class').split(' ').find(cls => cls.startsWith('bg-'));
                    
                    const status = row.find('td:eq(5) .badge').text();
                    const statusClass = row.find('td:eq(5) .badge').attr('class').split(' ').find(cls => cls.startsWith('bg-'));
                    
                    const date = row.find('td:eq(6)').text();
                    
                    console.log('Populating modal with data');
                    
                    // Populate the modal with the data
                    $('#inquiryDetailSubject').text(subject);
                    $('#inquiryDetailUserName').text(userName);
                    $('#inquiryDetailUserEmail').text(userEmail);
                    $('#inquiryDetailUserAvatar').attr('src', userAvatar);
                    
                    $('#inquiryDetailContent').text(inquiryContent);
                    $('#inquiryDetailSentiment').text(sentiment).removeClass().addClass(`badge ${sentimentClass} badge-sentiment`);
                    $('#inquiryDetailStatus').text(status).removeClass().addClass(`badge ${statusClass} status-badge`);
                    $('#inquiryDetailDate').text(date);
                    $('#inquiryReceivedDate').text(date);
                    
                    // Check if the inquiry has been responded to
                    if (status === 'Responded') {
                        $('#responseTimelineItem').show();
                        $('#responseDate').text('May 15, 2023'); // This would be replaced with actual response date
                        $('#responseContent').text('Thank you for your inquiry. We have processed your request.'); // This would be replaced with actual response
                        $('#responseCard').hide(); // Hide the response form
                    } else {
                        $('#responseTimelineItem').hide();
                        $('#responseCard').show(); // Show the response form
                    }
                    
                    // Show the modal
                    var inquiryDetailModal = new bootstrap.Modal(document.getElementById('inquiryDetailModal'));
                    inquiryDetailModal.show();
                    console.log('Modal should be visible now');
                } catch (e) {
                    console.error('Error in view inquiry handler:', e);
                }
            });
            
            // Use event delegation for delete button clicks
            $(document).on('click', '.delete-inquiry', function(e) {
                e.preventDefault();
                console.log('Delete inquiry clicked');
                
                try {
                    const inquiryId = $(this).data('id');
                    console.log('Inquiry ID to delete:', inquiryId);
                    
                    $('#deleteInquiryId').val(inquiryId);
                    
                    // Set up the form action URL
                    const deleteUrl = `/admin/inquiries/${inquiryId}`;
                    $('#deleteInquiryForm').attr('action', deleteUrl);
                    
                    // Show the modal
                    var deleteInquiryModal = new bootstrap.Modal(document.getElementById('deleteInquiryModal'));
                    deleteInquiryModal.show();
                    console.log('Delete modal should be visible now');
                } catch (e) {
                    console.error('Error in delete inquiry handler:', e);
                }
            });
            
            // Confirm Delete Button
            $(document).on('click', '#confirmDeleteBtn', function() {
                console.log('Confirm delete clicked');
                $('#deleteInquiryForm').submit();
            });
            
            // Send Response Button
            $(document).on('click', '#sendResponseBtn', function() {
                console.log('Send response clicked');
                
                const responseMessage = $('#responseMessage').val();
                const markAsResolved = $('#markAsResolved').is(':checked');
                
                if (!responseMessage) {
                    alert('Please enter a response message.');
                    return;
                }
                
                // Here you would send an AJAX request to save the response
                // For demonstration, we'll just show a success message and close the modal
                alert('Response sent successfully!');
                
                // Close the modal
                var inquiryDetailModal = bootstrap.Modal.getInstance(document.getElementById('inquiryDetailModal'));
                inquiryDetailModal.hide();
                
                // In a real application, you would reload the page or update the UI
                // to reflect the new status of the inquiry
            });
            
            // Handle tab changes to redraw charts if needed
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                if (sentimentChart) {
                    sentimentChart.resize();
                }
            });
        });
    </script>
</body>
</html>

