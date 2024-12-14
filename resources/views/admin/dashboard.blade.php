<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>

  @keyframes slideInFromLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    body {
         
    background-position: center;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
      
        background-color: #f7f7f7;
        color: #333;
  
        background-size: cover;
    }
        /* Modal Width Adjustment */
.modal-dialog {
    max-width: 600px; /* Fixed width for the modal */
    width: 100%; /* Ensures the modal doesn't overflow on smaller screens */
    margin: 30px auto; /* Centers the modal */
}

/* Modal Background and Border */
.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Modal Header Styling */
.modal-header {
    background-color: #4CAF50;
    padding: 20px;
    border-bottom: 2px solid #ddd;
    color: white;
    border-radius: 10px 10px 0 0;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.modal-header img {
    width: 120px; /* Fixed width */
    height: 120px; /* Fixed height */
    object-fit: cover; /* Ensures the image scales properly within the container */
    border: 5px solid #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    border-radius: 50%; /* Keeps the image round */
    transition: transform 0.3s ease;
}

.modal-header img:hover {
    transform: scale(1.1); /* Slight zoom on hover */
}

.modal-title {
    font-weight: bold;
    font-size: 1.8rem;
    color: #fff;
    margin-bottom: 5px;
}

.modal-body {
    padding: 20px;
    font-size: 1rem;
    background-color: #f9f9f9;
    border-radius: 0 0 10px 10px;
}

.modal-body h6 {
    font-weight: 500;
    color: #333;
}

.modal-body p {
    font-size: 0.9rem;
    color: #666;
}

.modal-body .row.mb-4 {
    margin-bottom: 1.5rem;
}

.modal-body .row .col {
    padding: 12px;
    background-color: #ffffff;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.modal-footer {
    background-color: #f5f5f5;
    padding: 10px;
    border-top: 2px solid #ddd;
    text-align: center;
    border-radius: 0 0 10px 10px;
}

.modal-footer button {
    background-color: #4CAF50;
    border-color: #4CAF50;
    font-weight: bold;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.modal-footer button:hover {
    background-color: #45a049;
    border-color: #45a049;
}

/* Modal responsive design */
@media (max-width: 768px) {
    .modal-dialog {
        max-width: 90%; /* Modal takes 90% of the width on smaller screens */
    }
    .modal-header img {
        width: 100px;
        height: 100px;
    }
    .modal-body {
        font-size: 0.9rem;
    }
    .modal-footer button {
        width: 100%;
    }
}


        /* Modal Background and Border */
.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Modal Header Styling */
/* Modal Header Styling */
.modal-header {
    background-color: #4CAF50;
    padding: 20px;
    border-bottom: 2px solid #ddd;
    color: white;
    border-radius: 10px 10px 0 0;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.modal-header img {
    width: 120px; /* Fixed width */
    height: 120px; /* Fixed height */
    object-fit: cover; /* Ensures the image scales properly within the container */
    border: 5px solid #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    border-radius: 50%; /* Keeps the image round */
    transition: transform 0.3s ease;
}

.modal-header img:hover {
    transform: scale(1.1); /* Slight zoom on hover */
}


.modal-title {
    font-weight: bold;
    font-size: 1.8rem;
    color: #fff;
    margin-bottom: 5px;
}

.modal-body {
    padding: 20px;
    font-size: 1rem;
    background-color: #f9f9f9;
    border-radius: 0 0 10px 10px;
}


.modal-body h6 {
    font-weight: 500;
    color: #333;
}

.modal-body p {
    font-size: 0.9rem;
    color: #666;
}

.modal-body .row.mb-4 {
    margin-bottom: 1.5rem;
}

.modal-body .row .col {
    padding: 12px;
    background-color: #ffffff;
    border-radius: 10px;
    margin-top: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.modal-footer {
    background-color: #f5f5f5;
    padding: 10px;
    border-top: 2px solid #ddd;
    text-align: center;
    border-radius: 0 0 10px 10px;
}

.modal-footer button {
    background-color: #4CAF50;
    border-color: #4CAF50;
    font-weight: bold;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.modal-footer button:hover {
    background-color: #45a049;
    border-color: #45a049;
}

/* Modal responsive design */
@media (max-width: 768px) {
    .modal-header img {
        width: 100px;
        height: 100px;
    }
    .modal-body {
        font-size: 0.9rem;
    }
    .modal-footer button {
        width: 100%;
    }
}
      .modal-header {
    background: linear-gradient(180deg, #28a745, #FFA500); /* Green to Orange Gradient */
    color: white;  /* White text */
}
        /* Sidebar Styling */
        .sidebar {
            width: 200px;
            background: linear-gradient(180deg, #28a745, #FFA500); /* Green to orange */
            color: white;
            position: fixed;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar .logo img {
            width: 80%;
            max-width: 100px;
        }

        .sidebar .nav {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .sidebar .nav-item {
            margin: 10px 0;
        }

        .sidebar .nav-item a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            font-size: 16px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-item a i {
            margin-right: 10px;
            font-size: 18px;
        }

        .sidebar .nav-item a:hover {
            background-color: #FFA500; /* Orange hover */
        }

        .sidebar .nav-item.active a {
            background-color: #28a745; /* Green for active item */
        }

        /* Navigation Bar */
          .navbar {
          background-image: url('/image/orange.png'); /* Set the image as background */
    background-size: cover; /* Ensures the image covers the entire navbar */
    background-position: center; /* Centers the background image */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1050;
        }

        .navbar-brand {
            color: white !important;
        }

        .navbar .nav-link {
            color: white !important;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #28a745 !important; /* Hover effect */
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Content Area */
        .content {
            margin-left: 200px;
            padding: 20px;
            animation: slideInFromLeft 1s ease-out;
            transition: margin-left 0.3s ease;
        }

        .content.collapsed {
            margin-left: 0;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo text-center mt-3">
            <img src="/image/logo.png" alt="Logo">
        </div>
        <h3 class="text-center mt-3">TABING'S PATER</h3>
        <ul class="nav flex-column">
            <li class="nav-item active">
                <a href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/admin/cashier"><i class="fas fa-cash-register"></i> Cashier</a>
            </li>
            <li class="nav-item">
                <a href="/admin/products"><i class="fas fa-box"></i> Products</a>
            </li>
              <li class="nav-item ">
    <a href="/admin/expenses"><i class="fas fa-coins"></i> Expenses</a>
</li>
        </ul>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
           
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="ms-auto d-flex align-items-center">
                <!-- Profile Dropdown -->
                <div class="dropdown">
                    <img src="{{ asset('storage/' . auth()->user()->AdminProfile) }}" 
                         alt="Profile Image" 
                         class="profile-img dropdown-toggle" 
                         id="profileDropdown" 
                         data-bs-toggle="dropdown" 
                         aria-expanded="false">
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">View Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

   @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Profile Updated',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'Try Again'
            });
        </script>
    @endif

    <div class="content" id="content">
        <h4>Welcome to the Admin Dashboard</h4>
        <div class="container mt-4">
        <div class="row">
            <!-- Daily Sales Column -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Today's Sales</h5>
                        <p class="card-text text-center" style="font-size: 1.5rem;">₱1,500.00</p>
                    </div>
                </div>
            </div>

            <!-- Weekly Expenses Column -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Weekly Expenses</h5>
                        <p class="card-text text-center" style="font-size: 1.5rem;">₱{{ number_format($totalExpensesLast7Days, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Weekly Profit Column -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Weekly Profit</h5>
                        <p class="card-text text-center" style="font-size: 1.5rem;">₱2,000.00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <h5 class="card-title text-center">Number of Products</h5>
            <p class="card-text text-center" style="font-size: 1.5rem;">
                {{ $productCount }}
            </p>
        </div>
    </div>
</div>
        </div>
    </div>
       <div class="container mt-4">
        <div class="row">
            <!-- First Column (Graph) -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sales vs. Expenses (Last 7 Days)</h5>
                        <canvas id="salesExpensesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Second Column (Product and Profit Info) -->
            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-center">Overview</h5>
                        <ul class="list-unstyled">
                            <li><strong>Number of Products:</strong> 120</li>
                            <li><strong>Profit:</strong> ₱1,000.00</li> <!-- Profit calculation: Sales - Expenses -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script>
    // Data for the last 7 days
    var salesData = [1500, 1800, 1200, 1600, 1900, 1700, 2100];  // Daily sales for 7 days
    var expensesData = [1200, 1500, 1000, 1300, 1400, 1200, 1100]; // Daily expenses for 7 days

    var ctx = document.getElementById('salesExpensesChart').getContext('2d');
    var salesExpensesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'], // 7 days labels
            datasets: [{
                label: 'Daily Sales (₱)',
                data: salesData, // Sales data for 7 days
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Daily Expenses (₱)',
                data: expensesData, // Expenses data for 7 days
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
    </div>

    <!-- Modal for Profile -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="d-flex justify-content-center align-items-center flex-column">
                    <img src="{{ asset('storage/' . auth()->user()->AdminProfile) }}" alt="Admin Profile" class="rounded-circle profile-img mb-3">
                    <h5 class="modal-title" id="profileModalLabel">{{ auth()->user()->AdminFname }} {{ auth()->user()->AdminLname }}</h5>
                    <p class="text-muted">Admin Profile</p>
                </div>
            </div>
            <div class="modal-body">
                <!-- User Info Section -->
                <div class="row mb-4">
                    <div class="col">
                        <h6><strong>Username:</strong> {{ auth()->user()->AdminUsername }}</h6>
                    </div>
                    <div class="col">
                        <h6><strong>Gender:</strong> {{ auth()->user()->AdminGender }}</h6>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="row mb-4">
                    <div class="col">
                        <h6><strong>Email:</strong> {{ auth()->user()->AdminEmail }}</h6>
                    </div>
                    <div class="col">
                        <h6><strong>Phone:</strong> {{ auth()->user()->AdminPhone ?? 'Phone not available' }}</h6>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="row">
                    <div class="col">
                        <h6><strong>Location:</strong> {{ auth()->user()->AdminAddress ?? 'Location not available' }}</h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Update Profile Button -->
              <form action="{{ route('admin.change-profile') }}" method="GET">
    @csrf
    <button type="submit" class="btn btn-secondary">Update Profile</button>
</form>

<!-- Change Password Form -->
<form action="{{ route('admin.change-password') }}" method="GET">
    @csrf
    <button type="submit" class="btn btn-warning">Change Password</button>
</form>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            content.classList.toggle('collapsed');
        });
    </script>
</body>
</html> 