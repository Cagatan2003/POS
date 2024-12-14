<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Registration</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: url('/image/1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 900px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }

        form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="date"], input[type="file"], input[type="password"], select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
           
            width: 100%;
        }

        .gender-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .gender-group input {
            width: auto;
        }

        .section-title {
            grid-column: span 3;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        button {
            padding: 10px;
            background-color: #FFA500; /* Orange */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            grid-column: span 3;
        }

        button:hover {
            background-color: #FF8C00; /* Darker orange */
        }

        .register-link {
            grid-column: span 3;
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #28a745; /* Green */
            text-decoration: none;
        }

        .back-btn {
            margin-top: 15px;
            background-color: #28a745; /* Green */
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }

        .back-btn:hover {
            background-color: #218838; /* Darker green */
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cashier Registration</h1>

        <form action="{{ route('cashier.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Personal Details Section -->
            <div class="section-title">Personal Information</div>

            <!-- Profile Picture -->
            <div style="margin-right:10px;">
                <label for="CashierProfile">Profile Picture:</label>
                <input type="file" id="CashierProfile" name="CashierProfile">
                @error('CashierProfile') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- First Name -->
            <div style="margin-right:10px;">
                <label for="CashierFname">First Name:</label>
                <input type="text" id="CashierFname" name="CashierFname" value="{{ old('CashierFname') }}" required>
                @error('CashierFname') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Middle Name -->
            <div>
                <label for="CashierMname">Middle Name:</label>
                <input type="text" id="CashierMname" name="CashierMname" value="{{ old('CashierMname') }}">
                @error('CashierMname') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Last Name -->
            <div style="margin-right:10px;">
                <label for="CashierLname">Last Name:</label>
                <input type="text" id="CashierLname" name="CashierLname" value="{{ old('CashierLname') }}" required>
                @error('CashierLname') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Birth Date -->
            <div style="margin-right:10px;">
                <label for="CashierBdate">Birth Date:</label>
                <input type="date" id="CashierBdate" name="CashierBdate" value="{{ old('CashierBdate') }}" required>
                @error('CashierBdate') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Phone -->
            <div >
                <label for="CashierPhone">Phone:</label>
                <input type="text" id="CashierPhone" name="CashierPhone" value="{{ old('CashierPhone') }}" required>
                @error('CashierPhone') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Address -->
            <div style="margin-right:10px;">
                <label for="CashierAddress">Address:</label>
                <input type="text" id="CashierAddress" name="CashierAddress" value="{{ old('CashierAddress') }}">
                @error('CashierAddress') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Gender -->
            <div>
                <label>Gender:</label>
                <div class="gender-group">
                    <label for="male"><input type="radio" id="male" name="CashierGender" value="Male" {{ old('CashierGender') == 'Male' ? 'checked' : '' }}> Male</label>
                    <label for="female"><input type="radio" id="female" name="CashierGender" value="Female" {{ old('CashierGender') == 'Female' ? 'checked' : '' }}> Female</label>
                </div>
                @error('CashierGender') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Login Details Section -->
            <div class="section-title">Login Information</div>

            <!-- Username -->
            <div style="margin-right:10px;">
                <label for="CashierUsername">Username:</label>
                <input type="text" id="CashierUsername" name="CashierUsername" value="{{ old('CashierUsername') }}" required>
                @error('CashierUsername') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Email -->
            <div style="margin-right:10px;">
                <label for="CashierEmail">Email:</label>
                <input type="email" id="CashierEmail" name="CashierEmail" value="{{ old('CashierEmail') }}" required>
                @error('CashierEmail') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="CashierPass">Password:</label>
                <input type="password" id="CashierPass" name="CashierPass" required>
                @error('CashierPass') <div class="error">{{ $message }}</div> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="CashierPass_confirmation">Confirm Password:</label>
                <input type="password" id="CashierPass_confirmation" name="CashierPass_confirmation" required>
                @error('CashierPass_confirmation') <div class="error">{{ $message }}</div> @enderror
            </div>

            <button type="submit">Register</button>
        </form>

        <div class="register-link">
            <p>Already have an account? <a href="{{ route('cashier.login') }}">Login here</a></p>
        </div>
    </div>

</body>
</html>
