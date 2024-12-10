<html lang="en">
<head>
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            background-image: url('/image/bg.png');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        .registration-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent overlay */
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }

        h2 {
            color: #FF7043; /* Orange color */
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 32px;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .form-container .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .form-container .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .form-container .form-control:focus {
            border-color: #FF7043; /* Orange focus border */
            box-shadow: 0 0 5px rgba(255, 112, 67, 0.5); /* Light orange shadow */
        }

        .form-container button {
            background-color: #43A047; /* Green button */
            color: white;
            padding: 12px;
            font-size: 18px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #388E3C; /* Darker green on hover */
        }

        .alert {
            border-radius: 8px;
            margin-top: 15px;
        }

        .alert ul {
            padding-left: 20px;
        }

        .file-input-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        #previewImage {
            margin-top: 10px;
            max-width: 100px;
            display: none;
            border-radius: 50%;
        }

        .d-flex {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="registration-container">
        <div class="form-container">
            <h2>Admin Login</h2>

            <!-- Alerts -->
            @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
            @endif

            @if(session('error'))
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            </script>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="AdminUsername" class="form-label">Username</label>
                    <input type="text" name="AdminUsername" id="AdminUsername" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="AdminPassword" class="form-label">Password</label>
                    <input type="password" name="AdminPassword" id="AdminPassword" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
              <div class="text-center mt-3">
           <a href="{{ route('cashier.login') }}" class="admin-btn">Back to Cashier</a>
            </div>
        </div>
               
    </div>
</body>
