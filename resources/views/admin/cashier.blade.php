<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Add SweetAlert2 Library -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
         
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
              opacity: 1;
    transition: opacity 0.10s ease; 
        }
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



        /* Sidebar Styling */
        .sidebar {
            width: 200px;
            background: linear-gradient(180deg, #28a745, #FFA500);
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
            background-color: #FFA500;
        }

        .sidebar .nav-item.active a {
            background-color: #28a745;
        }

        body.fade-out {
    opacity: 0; /* Fade out effect when leaving the page */
}

body.fade-in {
    opacity: 1; /* Fade in effect when entering the page */
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
            color: #28a745 !important;
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
            transition: margin-left 0.3s ease;
             animation: slideInFromLeft 1s ease-out;
        }
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
        .content.collapsed {
            margin-left: 0;
        }

        /* Table Styling */
        .table-striped > tbody > tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }
              .modal-header {
    background: linear-gradient(180deg, #28a745, #FFA500); /* Green to Orange Gradient */
    color: white;  /* White text */
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
            <li class="nav-item">
                <a href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item active">
                <a href="/admin/cashier"><i class="fas fa-cash-register"></i> Cashier</a>
            </li>
            <li class="nav-item">
                <a href="/admin/products"><i class="fas fa-box"></i> Products</a>
            </li>
              <li class="nav-item ">
    <a href="/admin/expenses"><i class="fas fa-coins"></i> Expenses</a>
</li>
     <li class="nav-item">
    <a href="/admin/Sales"><i class="fas fa-chart-line"></i> Sales</a>
</li>

        </ul>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
         
            <a class="navbar-brand" href="#">Cashier Panel</a>
            <div class="ms-auto d-flex align-items-center">
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

    <!-- Main Content -->
    <div class="content" id="content">
        <div class="container mt-4">
            <div class="card mb-4">
                <div class="card-body d-flex">
                    <div class="text-center me-4">
                        <img id="profilePicture" src="https://via.placeholder.com/150" alt="Cashier Profile Picture" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div>
                        <h5 id="cashierName" class="card-title">Select a Cashier</h5>
                        <p id="cashierEmail"><strong>Email:</strong> </p>
                        <p id="cashierStatus"><strong>Status:</strong> </p>
                        <p id="cashierContact"><strong>Contact:</strong> </p>
                        <p id="cashierAddress"><strong>Address:</strong> </p>
                    </div>
                </div>
            </div>

            <h3>Cashier List</h3>
            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session("success") }}',
                        showConfirmButton: true
                    });
                </script>
            @endif

            <table class="table table-hover table-striped mt-2" style=" height: 210px; /* Adjusted height */
    overflow-y: auto;">
                <thead class="table" style="  background-color: #28a745;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                      <th >Change Status</th>
  <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashiers as $cashier)
                        <tr onclick="updateCashierDetails({{ json_encode($cashier) }})" style="cursor: pointer;">
                            <td style="background-color:white;">{{ $loop->iteration }}</td>
                            <td style="background-color:white;">{{ $cashier->CashierFname }} {{ $cashier->CashierLname }}</td>
                            <td style="background-color:white;">{{ $cashier->CashierEmail }}</td>
                            <td style="background-color:white;">
                                <span class="badge bg-{{ $cashier->CashierStatus == 'active' ? 'success' : 'warning' }}">
                                    {{ ucfirst($cashier->CashierStatus) }}
                                </span>
                            </td>
                            <td style="background-color:white;">
                                <form action="{{ route('admin.cashier.activate', $cashier->cashier_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="{{ $cashier->CashierStatus == 'active' ? 'inactive' : 'active' }}">
                                    <button class="btn btn-{{ $cashier->CashierStatus == 'active' ? 'danger' : 'success' }} btn-sm" type="submit">
                                        {{ $cashier->CashierStatus == 'active' ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                                </td><td style="background-color:white;">
                  <form action="{{ route('admin.cashier.destroy', $cashier->cashier_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this cashier?');" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 10px;">
        <i class="fa fa-trash"></i> 
    </button>
</form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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

        function updateCashierDetails(cashier) {
            document.getElementById('profilePicture').src = `/storage/${cashier.CashierProfile}`;
            document.getElementById('cashierName').innerText = `${cashier.CashierFname} ${cashier.CashierLname}`;
            document.getElementById('cashierEmail').innerText = `Email: ${cashier.CashierEmail}`;
            document.getElementById('cashierStatus').innerText = `Status: ${cashier.CashierStatus}`;
            document.getElementById('cashierContact').innerText = `Contact: ${cashier.CashierContact}`;
            document.getElementById('cashierAddress').innerText = `Address: ${cashier.CashierAddress}`;
        }
    </script>

<!-- Add SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
