<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm p-4 bg-white rounded-3">
        
        <!-- Title -->
        <h2 class="text-center fw-bold mb-4" style="color: #212529;">LIST PRODUCT</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add New Product Button with Icon -->
        <div class="mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-primary fw-semibold px-3">
                <i class="bi bi-plus-circle-fill me-1"></i> Add New Product
            </a>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table id="productTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->productname }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description ?? 'N/A' }}</td>
                        <td>{{ $product->category->categoryname ?? 'N/A' }}</td>
                        <td class="text-center">
                            <!-- View Button -->
                            <a href="{{ route('product.show', $product->productid) }}" class="btn btn-info btn-sm text-white px-2 py-1 me-1">
                                <i class="bi bi-eye-fill"></i> View
                            </a>
                            
                            <!-- Edit Button -->
                            <a href="{{ route('product.edit', $product->productid) }}" class="btn btn-warning btn-sm text-dark px-2 py-1 me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            
                            <!-- Delete Button (Trigger Modal) -->
                            <button type="button" class="btn btn-danger btn-sm px-2 py-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->productid }}">
                                <i class="bi bi-trash-fill"></i> Delete
                            </button>

                            <!-- Modal សម្រាប់បង្ហាញព័ត៌មាន Data និង Icons ពេលលោតមកលើ -->
                            <div class="modal fade" id="deleteModal{{ $product->productid }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->productid }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
                                        <div class="modal-header bg-danger text-white py-3">
                                            <h5 class="modal-title fw-bold" id="deleteModalLabel{{ $product->productid }}">
                                                <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirm Delete
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center p-4">
                                            <p class="fs-5 mb-1 text-dark">តើអ្នកពិតជាចង់លុបទិន្នន័យនេះមែនទេ?</p>
                                            <p class="fw-bold text-danger fs-4 mb-3">"{{ $product->productname }}"</p>

                                            <!-- ផ្នែកបង្ហាញ Data លម្អិតព្រមទាំង Icons -->
                                            <div class="card bg-light border-0 p-3 mb-2 text-start rounded-3 shadow-sm">
                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold text-secondary">
                                                        <i class="bi bi-hash me-1 text-dark"></i> ID:
                                                    </div>
                                                    <div class="col-7 text-dark fw-bold">{{ $product->productid }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold text-secondary">
                                                        <i class="bi bi-box-seam me-1 text-primary"></i> Product Name:
                                                    </div>
                                                    <div class="col-7 text-dark fw-bold">{{ $product->productname }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold text-secondary">
                                                        <i class="bi bi-currency-dollar me-1 text-success"></i> Price:
                                                    </div>
                                                    <div class="col-7 text-success fw-bold">${{ number_format($product->price, 2) }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold text-secondary">
                                                        <i class="bi bi-stack me-1 text-warning"></i> Quantity:
                                                    </div>
                                                    <div class="col-7 text-dark fw-bold">{{ $product->quantity }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold text-secondary">
                                                        <i class="bi bi-card-text me-1 text-info"></i> Description:
                                                    </div>
                                                    <div class="col-7 text-muted small">{{ $product->description ?? 'N/A' }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5 fw-semibold text-secondary">
                                                        <i class="bi bi-tag-fill me-1 text-danger"></i> Category:
                                                    </div>
                                                    <div class="col-7">
                                                        <span class="badge bg-primary px-2 py-1">{{ $product->category->categoryname ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content-center border-0 pb-4">
                                            <button type="button" class="btn btn-secondary px-4 fw-semibold" data-bs-dismiss="modal">
                                                <i class="bi bi-x-circle me-1"></i> Cancel
                                            </button>
                                            
                                            <!-- Form បញ្ជូនសំណើលុប -->
                                            <form action="{{ route('product.destroy', $product->productid) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4 fw-semibold">
                                                    <i class="bi bi-trash-fill me-1"></i> Yes, Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No products found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#productTable').DataTable();
    });
</script>

</body>
</html>