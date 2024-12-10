<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Link to your CSS file (example) -->
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">

    <!-- Bootstrap CSS (can be used for layout) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- You can also use inline CSS -->
    <style>
            @keyframes slideInFromTop {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    body {
        animation: slideInFromTop 1s ease-out;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding-top: 20px;
        background-color: #f7f7f7;
        color: #333;
        background-image: url('/image/bg.png');
        background-size: cover;
    }
        .form-container {
            max-width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 20px auto;
            display: block;
        }
        .btn {
            padding: 10px 20px;
            margin-top: 10px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .form-group label {
            font-weight: bold;
        }
        /* Flexbox container to align buttons side by side */
.button-container {
    display: flex;
    justify-content: space-between; /* Space between the buttons */
    align-items: center;
    gap: 10px; /* Optional: Adjust gap between buttons */
}

/* Ensure both buttons have the same width and padding */
.btn {
    padding: 10px 20px; /* Ensure consistent padding for both buttons */
    font-size: 16px; /* Adjust font size if necessary */
    width: 100%; /* Make both buttons take equal width inside the container */
}

/* To make buttons have the same width, add a wrapper to control the width of the container */
.button-container .btn {
    flex: 1; /* Allow both buttons to take equal space */
    text-align: center; /* Center the text inside the buttons */
}

/* Styling for the Save Changes button */
.btn-success {
    background-color: #28a745;
    color: white;
    border: none;
}

/* Styling for the Back button */
.btn-back {
    background-color: #007bff;
    color: white;
    border: none;
    text-decoration: none; /* Remove underline for link */
}

/* Add hover effects for buttons */
.btn:hover {
    opacity: 0.9;
}

    </style>
</head>
<body>

    <!-- Container with column layout -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 form-container">
             <img src="{{ asset('storage/' . auth()->user()->AdminProfile) }}" alt="Admin Profile" class="profile-img mb-3">

                <!-- Form -->
                <form method="POST" action="{{ route('admin.update-profile') }}">
                    @csrf
                     
                     <div class="row">
        <!-- First Column -->
        <div class="col-md-6">
                    <div class="form-group">
                        <label for="AdminUsername">Username</label>
                        <input type="text" name="AdminUsername" class="form-control" value="{{ old('AdminUsername', $admin->AdminUsername) }}" required>
                        @error('AdminUsername') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- First Name -->
                    <div class="form-group">
                        <label for="AdminFname">First Name</label>
                        <input type="text" name="AdminFname" class="form-control" value="{{ old('AdminFname', $admin->AdminFname) }}" required>
                        @error('AdminFname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Middle Name -->
                    <div class="form-group">
                        <label for="AdminMname">Middle Name</label>
                        <input type="text" name="AdminMname" class="form-control" value="{{ old('AdminMname', $admin->AdminMname) }}">
                    </div>

                    <!-- Last Name -->
                    <div class="form-group">
                        <label for="AdminLname">Last Name</label>
                        <input type="text" name="AdminLname" class="form-control" value="{{ old('AdminLname', $admin->AdminLname) }}" required>
                        @error('AdminLname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
  </div>
              <div class="col-md-6">       <!-- Gender -->
                    <div class="form-group">
                        <label for="AdminGender">Gender</label>
                        <input type="text" name="AdminGender" class="form-control" value="{{ old('AdminGender', $admin->AdminGender) }}" required>
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="AdminBdate">Birthdate</label>
                        <input type="date" name="AdminBdate" class="form-control" value="{{ old('AdminBdate', $admin->AdminBdate) }}" required>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="AdminPhone">Phone</label>
                        <input type="text" name="AdminPhone" class="form-control" value="{{ old('AdminPhone', $admin->AdminPhone) }}">
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="AdminAddress">Address</label>
                        <input type="text" name="AdminAddress" class="form-control" value="{{ old('AdminAddress', $admin->AdminAddress) }}">
                    </div>
  </div>
                    <!-- Profile Picture -->
               

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
              <a href="{{ route('admin.dashboard') }}" class="btn btn-back mb-3">Back</a>
  
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
