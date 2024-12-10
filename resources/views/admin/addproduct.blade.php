<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- First Column - Product Image -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ProductImage">Product Image</label>
                                    <input type="file" class="form-control @error('ProductImage') is-invalid @enderror" id="ProductImage" name="ProductImage" accept="image/*" required>
                                    @error('ProductImage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Second Column - Product Details -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control @error('productName') is-invalid @enderror" id="productName" name="productName" value="{{ old('productName') }}" required>
                                    @error('productName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productDescription">Product Description (Optional)</label>
                                    <textarea class="form-control @error('productDescription') is-invalid @enderror" id="productDescription" name="productDescription">{{ old('productDescription') }}</textarea>
                                    @error('productDescription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productPrice">Product Price</label>
                                    <input type="number" class="form-control @error('productPrice') is-invalid @enderror" id="productPrice" name="productPrice" value="{{ old('productPrice') }}" min="0" required>
                                    @error('productPrice')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="categoryId">Category</label>
                                    <select class="form-control @error('categoryId') is-invalid @enderror" id="categoryId" name="categoryId" required>
                                        <option value="">Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('categoryId') == $category->id ? 'selected' : '' }}>{{ $category->categoryName }}</option>
                                        @endforeach
                                    </select>
                                    @error('categoryId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productStock">Product Stock</label>
                                    <input type="number" class="form-control @error('productStock') is-invalid @enderror" id="productStock" name="productStock" value="{{ old('productStock') }}" min="0" required>
                                    @error('productStock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="productAvailability">Product Availability</label>
                                    <select class="form-control @error('productAvailability') is-invalid @enderror" id="productAvailability" name="productAvailability" required>
                                        <option value="Available" {{ old('productAvailability') == 'Available' ? 'selected' : '' }}>Available</option>
                                        <option value="Not Available" {{ old('productAvailability') == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                    @error('productAvailability')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>