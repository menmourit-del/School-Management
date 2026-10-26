<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Delete Product
    </title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        /* Modal */
        .modal-content {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
        }

        /* Header */
        .delete-header {
            background: linear-gradient(135deg, #dc3545, #b02a37);
            padding: 20px 24px;
            border: none;
        }

        .delete-header .modal-title {
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* Warning Icon */
        .warning-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #fff1f2;
            color: #dc3545;

            font-size: 45px;

            box-shadow: 0 10px 25px rgba(220, 53, 69, 0.15);

            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.35);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(220, 53, 69, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
            }
        }

        /* Product Card */
        .product-card {
            background: #fff8e1;
            border: 1px solid #ffe69c;
            border-radius: 15px;
            padding: 18px;
        }

        .product-label {
            font-size: 13px;
            font-weight: 600;
            color: #856404;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .product-name {
            font-size: 20px;
            font-weight: 700;
            color: #212529;
        }

        /* Footer */
        .modal-footer {
            border-top: 1px solid #eee;
            padding: 20px 24px 24px;
        }

        /* Buttons */
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-danger {
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.25);
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
        }

        /* Text */
        .delete-title {
            font-weight: 700;
            color: #212529;
        }

        .delete-description {
            color: #6c757d;
            font-size: 15px;
        }

        .warning-text {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- ========================================= -->
    <!-- DELETE PRODUCT MODAL -->
    <!-- ========================================= -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- HEADER -->
                <div class="modal-header delete-header text-white">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="bi bi-trash3-fill me-2">
                        </i>
                        Delete Product
                    </h5>
                    <a href="{{ route('product.list') }}" class="btn-close btn-close-white" aria-label="Close">
                    </a>
                </div>
                <!-- BODY -->
                <div class="modal-body text-center p-4">
                    <!-- WARNING ICON -->
                    <div class="warning-icon">
                        <i class="bi bi-trash3-fill">
                        </i>
                    </div>
                    <!-- TITLE -->
                    <h3 class="delete-title mb-2">
                        Are you sure?
                    </h3>
                    <!-- DESCRIPTION -->
                    <p class="delete-description mb-4">
                        You are about to permanently delete this product.
                        Please confirm that you want to continue.
                    </p>
                    <!-- PRODUCT CARD -->
                    <div class="product-card text-start mb-4">
                        <div class="d-flex align-items-center">
                            <!-- PRODUCT ICON -->
                            <div class="rounded-circle bg-warning-subtle
                                       text-warning-emphasis
                                       d-flex align-items-center
                                       justify-content-center me-3"
                                style="width:50px;height:50px;">
                                <i class="bi bi-box-seam fs-4">
                                </i>
                            </div>
                            <!-- PRODUCT INFO -->
                            <div>
                                <div class="product-label">
                                    Product Name
                                </div>
                                <div class="product-name">
                                    {{ $product->productname }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- WARNING -->
                    <div class="text-danger warning-text">
                        <i class="bi bi-exclamation-triangle-fill me-1">
                        </i>
                        This action cannot be undone.
                    </div>
                </div>
                <!-- FOOTER -->
                <div class="modal-footer justify-content-center gap-2">
                    <!-- CANCEL -->
                    <a href="{{ route('product.list') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1">
                        </i>
                        Cancel
                    </a>
                    <!-- DELETE FORM -->
                    <form action="{{ route('product.destroy', $product->productid) }}" method="POST"
                        class="d-inline">

                        @csrf

                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash3-fill me-1">
                            </i>
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Automatically Open Modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const modalElement =
                document.getElementById('deleteModal');

            const deleteModal =
                new bootstrap.Modal(modalElement);

            deleteModal.show();

        });
    </script>
</body>

</html>

