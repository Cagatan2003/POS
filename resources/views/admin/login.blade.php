<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: url('/image/1.jpg');
            background-size: 1370px 750px;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center; /* Center-align content inside the container */
        }

        .logo-img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding: 0;
            max-width: 150px;
            height: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            text-align: center; /* Center-align labels */
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            text-align: center; /* Center-align text in the input fields */
        }

        button {
            padding: 10px;
            background-color: #FFA500; /* Orange */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        button:hover {
            background-color: #FF8C00; /* Darker orange */
        }

        .password-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            position: relative;
        }

        .eye-icon {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 35px;
            font-size: 20px;
            color: #28a745; /* Green */
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #28a745; /* Green */
            text-decoration: none;
        }

        .admin-btn {
            display: block;
            margin-top: 15px;
            background-color: #28a745; /* Green */
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }

        .admin-btn:hover {
            background-color: #218838; /* Darker green */
        }
    </style>
    <!-- Font Awesome for Eye Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <img src="/image/logo.png" alt="Logo" class="logo-img">
        <h1>Admin Login</h1>

        <div class="error">
            @if ($errors->has('AdminUsername'))
                <p>{{ $errors->first('AdminUsername') }}</p>
            @endif
            @if ($errors->has('AdminPassword'))
                <p>{{ $errors->first('AdminPassword') }}</p>
            @endif
        </div>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-3 password-container">
                <label for="AdminUsername" class="form-label">Username</label>
                <input type="text" name="AdminUsername" id="AdminUsername" class="form-control" required>
            </div>
            <div class="mb-3 password-container">
                <label for="AdminPassword" class="form-label">Password</label>
                <input type="password" name="AdminPassword" id="AdminPassword" class="form-control" required>
                <i class="fas fa-eye eye-icon" id="seePassword" onclick="togglePassword()"></i>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('cashier.login') }}" class="admin-btn">Back to Cashier</a>
        </div>

    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById('AdminPassword');
            var eyeIcon = document.getElementById('seePassword');
            var passwordFieldType = passwordField.type;

            if (passwordFieldType === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                confirmButtonText: 'Try Again'
            });
        @endif
    </script>

</body>
</html>
