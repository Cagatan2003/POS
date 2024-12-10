<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Add SweetAlert2 Library -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            opacity: 1;
            transition: opacity 0.10s ease;
        }
        /* Style the input fields to have a black background and white text */
.form-control {
    background-color: white;      /* Black background */
    color: black;                 /* White text */
    border: 1px solid black;      /* Black border */
}

/* Style for the input fields when they are focused */
.form-control:focus {
    background-color: white;      /* Keep the background black */
    color: black;                 /* White text */
    border: 1px solid #28a745;    /* Optional: Change border to green when focused */
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

        /* Navigation Bar */
        .navbar {
            background-image: url('/image/orange.png');
            background-size: cover;
            background-position: center;
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

        .table th, .table td {
            text-align: center;
        }
        
        .table th {
            background-color: #28a745;
            color: white;
        }

        /* Modal Styling */
      .modal-header {
    background: linear-gradient(180deg, #28a745, #FFA500); /* Green to Orange Gradient */
    color: white;  /* White text */
}

        .modal-footer button {
            border-radius: 5px;
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
            <li class="nav-item ">
                <a href="/admin/cashier"><i class="fas fa-cash-register"></i> Cashier</a>
            </li>
            <li class="nav-item">
                <a href="/admin/products"><i class="fas fa-box"></i> Products</a>
            </li>
           <li class="nav-item active">
    <a href="/admin/expenses"><i class="fas fa-coins"></i> Expenses</a>
</li>

        </ul>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="btn btn-light me-3" id="toggleSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">Expenses Panel</a>
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
        @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

        <button class="btn btn-primary" data-toggle="modal" data-target="#expenseModal">Manage Expenses</button>

        <h3 class="mt-4">Expense Summary</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Expense Name</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th>Details</th>
                    <th>Action</th> <!-- Column for details -->
                </tr>
            </thead>
            <tbody id="totalExpensesTableBody">
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $expense->name }}</td>
                        <td>{{ number_format($expense->total_amount, 2) }}</td>
                        <td>{{ $expense->created_at->setTimezone('Asia/Manila')->format('Y-m-d h:i:s A') }}</td>
                        <td>
                            <!-- Button to open modal -->
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailsModal{{ $expense->id }}">View Details</button>


                        </td>
                        <td>                   <form action="{{ route('admin.expenses.destroy', $expense->expense_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this expense?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></button>
</form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($expenses as $expense)
        <div class="modal fade" id="detailsModal{{ $expense->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailsModalLabel">Expense Details: {{ $expense->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Details:</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expense->details->names as $index => $name)
                                    <tr>
                                        <td>{{ $name }}</td>
                                        <td>{{ number_format($expense->details->amounts[$index], 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($expense->details->dates[$index])->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="expenseModalLabel">Manage Expenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.expenses.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Expense Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <!-- Expense Rows (in a single column layout) -->
                    <div id="expenseRows" class="mt-3">
                        <div class="form-row">
                            <!-- Purchase Name Column -->
                            <div class="col-12 mb-3">
                                <label for="name[]">Purchase Name</label>
                                <input type="text" name="names[]" class="form-control" required>
                            </div>

                            <!-- Amount Column -->
                            <div class="col-12 mb-3">
                                <label for="amount[]">Amount</label>
                                <input type="number" name="amounts[]" class="form-control" required min="0" step="0.01">
                            </div>

                            <!-- Date Column -->
                            <div class="col-12 mb-3">
                                <label for="date[]">Date</label>
                                <input type="date" name="dates[]" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- Add New Row Button -->
                    <button type="button" class="btn btn-secondary mt-2" id="addExpenseRow">Add Row</button>

                    <!-- Total Amount -->
                    <div class="form-group mt-3">
                        <label for="totalAmount">Total Amount</label>
                        <input type="text" id="totalAmount" class="form-control" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Expenses</button>
                </div>
            </form>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
    let totalAmount = 0;

    // Function to check for duplicate dates
    

    // Add a new expense row
// Add a new expense row
$('#addExpenseRow').on('click', function() {
    // Get the current date in YYYY-MM-DD format
    const currentDate = new Date().toISOString().split('T')[0];

    // Create a new row with the current date set for the date input
    let newRow = `<div class="form-row">
        <div class="col">
            <label for="name[]">Expense Name</label>
            <input type="text" name="names[]" class="form-control" required>
        </div>
        <div class="col">
            <label for="amount[]">Amount</label>
            <input type="number" name="amounts[]" class="form-control" required>
        </div>
        <div class="col">
            <label for="date[]">Date</label>
            <input type="date" name="dates[]" class="form-control" required value="${currentDate}">
        </div>
    </div>`;

    // Append the new row to the expense rows container
    $('#expenseRows').append(newRow);
});

    // Update total amount when amounts are entered
    $('body').on('input', '[name="amounts[]"]', function() {
        totalAmount = 0;
        $('input[name="amounts[]"]').each(function() {
            totalAmount += parseFloat($(this).val()) || 0;
        });
        $('#totalAmount').val(totalAmount.toFixed(2));
    });

    // Prevent form submission if duplicate dates are found
    $('form').on('submit', function(e) {
        if (checkDuplicateDates()) {
            e.preventDefault(); // Prevent form submission
            Swal.fire({
                icon: 'error',
                title: 'Duplicate Date Error',
                text: 'You have entered a duplicate date. Please correct it.',
            });
        }
    });
});

        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            content.classList.toggle('collapsed');
        });
    </script>
    <script>
    // When the document is ready
 document.addEventListener('DOMContentLoaded', function () {
    // Get the current date in YYYY-MM-DD format
    const currentDate = new Date();
    const formattedDate = currentDate.toISOString().split('T')[0];  // Get YYYY-MM-DD

    // Get the current day of the week
    const dayOfWeek = currentDate.toLocaleString('en-us', { weekday: 'long' });

    // Set the current date as the default value for all date inputs
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(function(input) {
        input.value = formattedDate;
        // Add the day of the week beside the date (in a label or placeholder)
        const dateWrapper = input.closest('.form-row');  // Adjust as per your structure
        const dayLabel = document.createElement('span');
        dayLabel.textContent = ` (${dayOfWeek})`;  // e.g., "Monday"
        dayLabel.style.fontSize = '0.85em';
        dayLabel.style.color = '#555';

        // Append the day label next to the date field
        dateWrapper.appendChild(dayLabel);
    });
    });
    public function destroy($expenseId)
{
    // Find the expense using the correct primary key
    $expense = Expense::findOrFail($expenseId);

    // Delete the expense
    $expense->delete();

    // Redirect back with success message
    return redirect()->route('admin.expenses.index')->with('success', 'Expense deleted successfully.');
}

</script>
<script>
    // When the document is ready
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current date in YYYY-MM-DD format
        const currentDate = new Date().toISOString().split('T')[0];

        // Set the current date as the default value for all date inputs
        const dateInputs = document.querySelectorAll('input[type="date"]');
        dateInputs.forEach(function(input) {
            input.value = currentDate;
        });
    });
</script>

</body>
</html>
