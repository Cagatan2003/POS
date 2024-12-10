<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image:  url('/image/orange.png'); /* Replace with your own image URL */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin-top: 40px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0.9; /* Optional: Slight transparency for the form */
        }

        .btn-back {
            background-color: #f8c046; /* Orange color for Back button */
            color: white;
            border: none;
        }

        .btn-update {
            background-color: #28a745; /* Green color for Update button */
            color: white;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
        }

        .form-group img {
            max-width: 100px;
            margin-top: 10px;
        }

        .btn-back:hover {
            background-color: #e0a500; /* Darker orange on hover */
        }

        .btn-update:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #f8c046; /* Orange title */
        }

        .alert-danger {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="form-title">Edit Product: {{ $product->productName }}</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->productId) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <!-- Product Name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" name="productName" id="productName" class="form-control" value="{{ old('productName', $product->productName) }}" required>
                    </div>
                </div>

                <!-- Price -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" name="productPrice" id="productPrice" class="form-control" value="{{ old('productPrice', $product->productPrice) }}" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Product Description -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="productDescription">Product Description</label>
                        <textarea name="productDescription" id="productDescription" class="form-control">{{ old('productDescription', $product->productDescription) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Category -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="categoryId">Category</label>
                        <select name="categoryId" id="categoryId" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->categoryId ? 'selected' : '' }}>
                                    {{ $category->categoryName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Availability -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productAvailability">Availability</label>
                        <select name="productAvailability" id="productAvailability" class="form-control" required>
                            <option value="Available" {{ $product->productAvailability == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Not Available" {{ $product->productAvailability == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Stock -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productStock">Stock</label>
                        <input type="number" name="productStock" id="productStock" class="form-control" value="{{ old('productStock', $product->productStock) }}">
                    </div>
                </div>

                <!-- Product Image -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productImage">Product Image</label>
                        <input type="file" name="productImage" id="productImage" class="form-control">
                        @if ($product->ProductImage)
                            <img src="{{ asset('storage/' . $product->ProductImage) }}" alt="Product Image">
                        @endif
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-update">Update Product</button>
                <a href="{{ route('admin.products') }}" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
