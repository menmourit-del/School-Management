<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 bg-white overflow-hidden">
                
                <!-- Card Header (ប្តូរទៅជាពណ៌លឿង bg-warning) -->
                <div class="card-header bg-warning text-dark text-center py-3">
                    <h4 class="fw-bold mb-0">
                        <i class="bi bi-pencil-square me-2"></i> EDIT PRODUCT INFORMATION
                    </h4>
                </div>

                <div class="card-body p-4">
                    
                    <!-- Form Update -->
                    <form action="{{ route('product.update', $product->productid) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="productname" class="form-label fw-semibold text-secondary">Product Name</label>
                            <input type="text" class="form-control @error('productname') is-invalid @enderror" id="productname" name="productname" value="{{ old('productname', $product->productname) }}" required>
                            @error('productname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-semibold text-secondary">Price</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-semibold text-secondary">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold text-secondary">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div class="mb-4">
                            <label for="catid" class="form-label fw-semibold text-secondary">Category</label>
                            <select class="form-select @error('catid') is-invalid @enderror" id="catid" name="catid" required>
                                <option value="" disabled>---Select Category Name---</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->categoryid }}" {{ (old('catid', $product->catid) == $category->categoryid) ? 'selected' : '' }}>
                                        {{ $category->categoryname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('catid')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <!-- Update Button (ប្តូរទៅជាពណ៌លឿង btn-warning text-dark) -->
                            <button type="submit" class="btn btn-warning text-dark fw-semibold flex-grow-1 py-2">
                                <i class="bi bi-check-circle-fill me-1"></i> Update Product
                            </button>
                            <!-- Cancel Button -->
                            <a href="{{ route('product.index') }}" class="btn btn-secondary fw-semibold flex-grow-1 py-2">
                                <i class="bi bi-x-circle-fill me-1"></i> Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>