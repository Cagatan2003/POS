<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Add SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
        body {
            margin: 0;
           
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
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


          #imagePreview {
        width: 300px;  /* Fixed width */
        height: 150px; /* Fixed height */
        background-color: #e9ecef; /* Light background color */
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 4px;
        overflow: hidden; /* Ensures image doesn't overflow the container */
        border: 1px solid #ccc; /* Optional: border for better visibility */
    }

    #imagePreview img {
        width: 100%;  /* Make image fill container */
        height: 100%; /* Ensure the image fits within the container */
        object-fit: cover; /* Prevent distortion */
    }

    #imagePreview i {
        font-size: 30px;
        color: #6c757d;
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

        /* Custom Styles for the Form */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .three-column {
            display: flex;
            gap: 20px;
        }

        .three-column .form-group {
            flex: 1;
        }

        /* Table Styling */
        table th, table td {
            vertical-align: middle;
            text-align: center;
        }

        table td img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Add color to table */
        .table th {
            background-color: #28a745; /* Green header */
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f1f1f1; /* Light grey rows */
        }

        .table tbody tr:nth-child(odd) {
            background-color: #ffffff; /* White rows */
        }

        .table tbody tr:hover {
            background-color: #f1f1f1; /* Hover effect on rows */
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
            <li class="nav-item ">
                <a href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/admin/cashier"><i class="fas fa-cash-register"></i> Cashier</a>
            </li>
            <li class="nav-item active">
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
        
            <a class="navbar-brand" href="#">Products Panel</a>
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

    <!-- Main Content -->
    <div class="content" id="content">
        <div class="container">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="three-column">
        <!-- 1st Column: Product Image -->
        <div class="form-group">
            <label for="productImage">Product Image</label>
            <div class="image-placeholder" id="imagePreview">
                <i class="fas fa-box-open"></i> <!-- Placeholder icon -->
            </div>
            <input type="file" name="productImage" id="productImage" class="form-control mt-2" accept="image/*" onchange="previewImage(event)">
            @error('productImage')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- 2nd Column: Product Name, Description, Category -->
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" name="productName" id="productName" class="form-control" placeholder="Type or select a product name" list="productNamesList" required>
            <datalist id="productNamesList">
                @foreach($categories as $category)
                    @foreach($category->products as $product)
                        <option value="{{ $product->productName }}" data-price="{{ $product->productPrice }}" data-stock="{{ $product->productStock }}" data-description="{{ $product->productDescription }}" data-category-id="{{ $product->categoryId }}" data-category-name="{{ $category->categoryName }}">
                    @endforeach
                @endforeach
            </datalist>
            @error('productName')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <label for="productDescription" style="margin-top:10px;">Product Description (Optional)</label>
            <textarea name="productDescription" id="productDescription" class="form-control"></textarea>
            @error('productDescription')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <label for="categoryId" style="margin-top:10px;">Product Category</label>
            <select name="categoryId" id="categoryId" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
            </select>
            @error('categoryId')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- 3rd Column: Product Price, Stock, Availability -->
        <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="number" name="productPrice" id="productPrice" class="form-control" min="0" step="0.01" required>
            @error('productPrice')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <label for="productStock" style="margin-top:10px;">Product Stock (Optional)</label>
            <input type="number" name="productStock" id="productStock" class="form-control" min="0">
            @error('productStock')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <label for="productAvailability" style="margin-top:10px;">Product Availability</label>
            <select name="productAvailability" id="productAvailability" class="form-control" required>
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select>
            @error('productAvailability')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-success mt-3">Save Product</button>
</form>

            <!-- Add a Table Below the Form -->
<div class="table-responsive mt-4" style=" height: 212px; /* Adjusted height */
    overflow-y: auto;">
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock In</th>
            <th>Sold</th>
            <th>Remaining</th>
            <th>Category</th>
            <th>Availability</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td><img src="{{ asset('storage/' . $product->ProductImage) }}" alt="Product Image" width="50" height="50"></td>
            <td>{{ $product->productName }}</td>
            <td>₱{{ number_format($product->productPrice, 2) }}</td>
            <td>{{ $product->productStock ?? 'N/A' }}</td>
            <td>{{ $product->productSold ?? '0' }}</td>
            <td>{{ $product->productRemaining ?? 'N/A' }}</td>
            <td>{{ $product->category->categoryName }}</td>
            <td>{{ $product->productAvailability }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->productId) }}" class="text-primary">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.products.destroy', $product->productId) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9">No products available</td>
        </tr>
        @endforelse
    </tbody>
</table>


    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Sidebar Visibility
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hidden');
            document.getElementById('content').classList.toggle('collapsed');
        });

        // Image Preview Functionality
       function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="'+ reader.result +'" class="img-fluid" />'; // Display image preview
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    </script>
   @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
@endif
<script>
    $(document).ready(function() {
        // AJAX for storing product name and updating the dropdown list
        $('form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.products.store') }}", // Ensure you have the correct route
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Add the new product name to the datalist dynamically
                    var newOption = new Option(response.productName, response.productName);
                    $('#productNamesList').append(newOption);

                    // Optionally, reset the input fields after successful submission
                    $('form')[0].reset();

                    alert('Product saved and added to the list!');
                },
                error: function(response) {
                    console.log(response);
                    alert('There was an error saving the product.');
                }
            });
        });
    });
</script>
<script>
    document.getElementById('productName').addEventListener('input', function() {
        var selectedProductName = this.value;
        
        // Get the datalist options
        var options = document.querySelectorAll('#productNamesList option');
        
        // Loop through options and match the product name
        options.forEach(function(option) {
            if (option.value === selectedProductName) {
                // Populate the fields based on selected option's data attributes
                document.getElementById('productPrice').value = option.getAttribute('data-price');
                document.getElementById('productStock').value = option.getAttribute('data-stock');
                document.getElementById('productDescription').value = option.getAttribute('data-description');
                document.getElementById('categoryId').value = option.getAttribute('data-category-id');
            }
        });
    });
</script>

</body>
</html>
