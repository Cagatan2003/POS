<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        color: #333;
        background-image: url('/image/bg.png');
        background-size: 1370px 750px;
        background-repeat: no-repeat;
    }

    .registration-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .form-container {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
    }

    h2 {
        text-align: center;
        color: #7A1212;
        font-weight: bold;
        margin-bottom: 20px;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        grid-template-rows: auto;
        margin: 0 auto;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input, select, textarea {
        padding: 10px;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin-bottom: 15px;
    }

    button {
        grid-column: span 2;
        padding: 10px;
        background-color: #7A1212;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #c11212;
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

    .form-container .form-title {
        font-size: 24px;
        text-align: center;
        font-weight: bold;
        color: #333;
    }
</style>
<body>
    <div class="registration-container">
        <div class="form-container">
            <h2>Admin Register</h2>
            <form method="POST" action="{{ route('admin.register') }}" enctype="multipart/form-data">
                @csrf

                <div class="file-input-wrapper">
                    <label for="AdminProfile">Profile Image</label>
                    <input type="file" id="AdminProfile" name="AdminProfile" accept="image/*">
                    <img id="previewImage" src="#" alt="Image Preview">
                    @error('AdminProfile')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminFname">First Name</label>
                    <input type="text" id="AdminFname" name="AdminFname" value="{{ old('AdminFname') }}" required>
                    @error('AdminFname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminMname">Middle Name</label>
                    <input type="text" id="AdminMname" name="AdminMname" value="{{ old('AdminMname') }}">
                    @error('AdminMname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminLname">Last Name</label>
                    <input type="text" id="AdminLname" name="AdminLname" value="{{ old('AdminLname') }}" required>
                    @error('AdminLname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminGender">Gender</label>
                    <select id="AdminGender" name="AdminGender">
                        <option value="Male" {{ old('AdminGender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('AdminGender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Other" {{ old('AdminGender') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('AdminGender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminBdate">Birthdate</label>
                    <input type="date" id="AdminBdate" name="AdminBdate" value="{{ old('AdminBdate') }}" required>
                    @error('AdminBdate')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminPhone">Phone</label>
                    <input type="text" id="AdminPhone" name="AdminPhone" value="{{ old('AdminPhone') }}">
                    @error('AdminPhone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminAddress">Address</label>
                    <input type="text" id="AdminAddress" name="AdminAddress" value="{{ old('AdminAddress') }}" >
                    @error('AdminAddress')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminUsername">Username</label>
                    <input type="text" id="AdminUsername" name="AdminUsername" value="{{ old('AdminUsername') }}" required>
                    @error('AdminUsername')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminEmail">Email</label>
                    <input type="email" id="AdminEmail" name="AdminEmail" value="{{ old('AdminEmail') }}" required>
                    @error('AdminEmail')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminPassword">Password</label>
                    <input type="password" id="AdminPassword" name="AdminPassword" required>
                    @error('AdminPassword')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="AdminPassword_confirmation">Confirm Password</label>
                    <input type="password" id="AdminPassword_confirmation" name="AdminPassword_confirmation" required>
                </div>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>

    <script>
        // Preview Profile Image before submission
        document.getElementById('AdminProfile').addEventListener('change', function () {
            const reader = new FileReader();
            reader.onload = function () {
                const preview = document.getElementById('previewImage');
                preview.style.display = 'block';
                preview.src = reader.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>
</html>
