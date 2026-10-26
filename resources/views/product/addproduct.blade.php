<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 shadow-lg p-5 bg-white rounded-3">

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                
                <h1 class="text-center mb-4 text-success h2 fw-bold">
                    CREATE PRODUCT INFORMATION
                </h1>

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="productname" class="form-label fw-semibold">Product Name:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-clipboard-check"></i></span>
                        <input
                            type="text"
                            class="form-control"
                            name="productname"
                            id="productname"
                            placeholder="Enter your product name"
                            value="{{ old('productname') }}"
                            required>
                    </div>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Price:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                        <input
                            type="number"
                            step="0.01"
                            class="form-control"
                            name="price"
                            id="price"
                            placeholder="Enter your price"
                            value="{{ old('price') }}"
                            required>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label fw-semibold">Quantity:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-box"></i></span>
                        <input
                            type="number"
                            class="form-control"
                            name="quantity"
                            id="quantity"
                            placeholder="Enter your quantity"
                            value="{{ old('quantity') }}"
                            required>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description:</label>
                    <textarea
                        class="form-control"
                        name="description"
                        id="description"
                        placeholder="Enter your description"
                        rows="3">{{ old('description') }}</textarea>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label for="catid" class="form-label fw-semibold">Category Name:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-gift"></i></span>
                        <select name="catid" id="catid" class="form-select" required>
                            <option value="">---Select Category Name---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->categoryid }}" {{ old('catid') == $category->categoryid ? 'selected' : '' }}>
                                    {{ $category->categoryname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Action Buttons: Submit & Clear -->
                <div class="d-flex gap-2 mb-3">
                    <button type="submit" class="btn btn-success w-50 py-2 fw-semibold">
                        <i class="bi bi-check-circle me-1"></i> Submit
                    </button>
                    
                    <button type="reset" class="btn btn-danger w-50 py-2 fw-semibold">
                        <i class="bi bi-x-circle me-1"></i> Clear
                    </button>
                </div>

                <!-- View Product List Button (GO) -->
                <div>
                    <a href="{{ route('product.index') }}" class="btn btn-info w-100 py-2 text-white fw-semibold text-decoration-none d-flex align-items-center justify-content-center">
                        <i class="bi bi-list-ul me-1"></i> View Product List
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>