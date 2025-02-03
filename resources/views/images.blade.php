<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Uploaded Requirements</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .img-preview {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid #ddd;
        }

        .modal-body {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        #modalImage {
            max-width: 100%;
            max-height: 80vh;
            transform-origin: center center;
            transition: transform 0.2s ease-in-out;
        }

        .btn-approve {
            background-color: #28a745;
            color: white;
        }

        .btn-reject {
            background-color: #dc3545;
            color: white;
        }
        .rejected-row {
            background-color: #f8d7da !important; /* Light red background */
            text-decoration: line-through; /* Strike-through text */
            color: #721c24 !important; /* Dark red text */
        }


    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center mb-4 text-primary">Uploaded Documents</h2>

        @if(isset($images) && $images->isNotEmpty())
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th> <!-- Removed "Actions" column -->
                    </tr>
                </thead>

                <tbody>
                    @foreach($images as $image)
                    <tr id="row-{{ $image->id }}" class="{{ $image->status == 'Rejected' ? 'rejected-row' : '' }}">
                        <td>
                            <img src="{{ Storage::url($image->file_path) }}" class="img-preview" onclick="openModal('{{ Storage::url($image->file_path) }}')">
                        </td>
                        <td>{{ $image->description }}</td>
                        <td>
                            <select class="form-select status-dropdown" data-image-id="{{ $image->id }}">
                                <option value="Pending" {{ $image->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ $image->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ $image->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-danger">No uploaded images for reference number: <strong>{{ $reference_number }}</strong></p>
        @endif
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Preview Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let zoomLevel = 1;
        const maxZoom = 3;
        const minZoom = 1;

        function openModal(imageSrc) {
            const modalImage = document.getElementById("modalImage");
            modalImage.src = imageSrc;
            zoomLevel = 1;
            modalImage.style.transform = `scale(${zoomLevel})`;
            new bootstrap.Modal(document.getElementById("imageModal")).show();
        }

        document.getElementById("modalImage").addEventListener("wheel", function(event) {
            event.preventDefault();
            const zoomFactor = event.deltaY > 0 ? 0.9 : 1.1;
            zoomLevel *= zoomFactor;

            // Set zoom limits
            if (zoomLevel < minZoom) zoomLevel = minZoom;
            if (zoomLevel > maxZoom) zoomLevel = maxZoom;

            this.style.transform = `scale(${zoomLevel})`;
        });

        document.querySelectorAll(".status-dropdown").forEach(dropdown => {
            dropdown.addEventListener("change", function () {
                let imageId = this.getAttribute("data-image-id");
                let newStatus = this.value;

                fetch(`/update-image-status/${imageId}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let row = document.getElementById(`row-${imageId}`);

                        // Apply or remove rejected row styling
                        if (newStatus === "Rejected") {
                            row.classList.add("rejected-row");
                        } else {
                            row.classList.remove("rejected-row");
                        }

                        showPopupMessage("Status updated successfully", "success");
                    } else {
                        showPopupMessage(data.message, "error");
                    }
                })
                .catch(error => {
                    console.error("Error updating status:", error);
                    showPopupMessage("Server error: " + error.message, "error");
                });
            });
        });


        // Function to show alert messages
        function showPopupMessage(message, type = 'success') {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show text-center`;
            alertDiv.style.position = 'fixed';
            alertDiv.style.top = '10px';
            alertDiv.style.left = '50%';
            alertDiv.style.transform = 'translateX(-50%)';
            alertDiv.style.zIndex = '1000';
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.body.prepend(alertDiv);
            setTimeout(() => {
                alertDiv.remove();
            }, 5000);
        }

    </script>

</body>
</html>
