<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
                
                <!-- Title -->
                <h2 class="text-center fw-bold mb-4" style="color: #212529;">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i> PRODUCT DETAILS
                </h2>
                <hr class="mb-4">

                <!-- Details List with Icons -->
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-secondary"><i class="bi bi-hash me-2 text-dark"></i> ID:</span>
                        <span class="fw-bold text-dark">{{ $product->productid }}</span>
                    </li>
                    <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-secondary"><i class="bi bi-box-seam me-2 text-primary"></i> Product Name:</span>
                        <span class="fw-bold text-dark">{{ $product->productname }}</span>
                    </li>
                    <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-secondary"><i class="bi bi-currency-dollar me-2 text-success"></i> Price:</span>
                        <span class="fw-bold text-success">${{ number_format($product->price, 2) }}</span>
                    </li>
                    <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-secondary"><i class="bi bi-stack me-2 text-warning"></i> Quantity:</span>
                        <span class="fw-bold text-dark">{{ $product->quantity }}</span>
                    </li>
                    <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-secondary"><i class="bi bi-card-text me-2 text-info"></i> Description:</span>
                        <span class="text-dark">{{ $product->description ?? 'N/A' }}</span>
                    </li>
                    <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-secondary"><i class="bi bi-tag-fill me-2 text-danger"></i> Category:</span>
                        <!-- ប្តូរ Category badge ទៅជាពណ៌ខៀវ (bg-primary) -->
                        <span class="badge bg-primary px-3 py-2">{{ $product->category->categoryname ?? 'N/A' }}</span>
                    </li>
                </ul>

                <!-- Back Button (ប្តូរពី btn-secondary ទៅ btn-primary ដើម្បីឱ្យចេញពណ៌ខៀវ) -->
                <div class="d-grid">
                    <a href="{{ route('product.index') }}" class="btn btn-primary py-2 fw-semibold">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back to List
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>