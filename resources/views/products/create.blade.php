<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Category -->
        <div class="form-group">
            <label for="categoryId">Category</label>
            <select name="categoryId" id="categoryId" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
            </select>
        </div>

        <!-- Product Name -->
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" name="productName" id="productName" class="form-control" required>
        </div>

        <!-- Product Description -->
        <div class="form-group">
            <label for="productDescription">Product Description</label>
            <textarea name="productDescription" id="productDescription" class="form-control" required></textarea>
        </div>

        <!-- Product Price -->
        <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="number" name="productPrice" id="productPrice" class="form-control" step="0.01" required>
        </div>

        <!-- Product Stock -->
        <div class="form-group">
            <label for="productStock">Product Stock</label>
            <input type="number" name="productStock" id="productStock" class="form-control" min="0">
        </div>

        <!-- Product Availability -->
        <div class="form-group">
            <label for="productAvailability">Product Availability</label>
            <select name="productAvailability" id="productAvailability" class="form-control">
                <option value="Available">Available</option>
                <option value="Not Available">Not Available</option>
            </select>
        </div>

        <!-- Product Image -->
        <div class="form-group">
            <label for="ProductImage">Product Image</label>
            <input type="file" name="ProductImage" id="ProductImage" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
</body>
</html>