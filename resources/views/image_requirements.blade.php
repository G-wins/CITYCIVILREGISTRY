<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffe6f2;
            color: #ff6600;
        }

        .custom-form {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border: 2px solid #ff66cc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-form input[type="file"],
        .custom-form input[type="text"] {
            border: 2px solid #ff66cc;
            border-radius: 5px;
            padding: 10px;
        }

        .custom-form .btn {
            background-color: #ff66cc;
            border: none;
            color: white;
            transition: background-color 0.3s;
        }

        .custom-form .btn:hover {
            background-color: #ff3399;
        }

        .add-file-btn {
            margin-top: 10px;
            background-color: #ffcc99;
            border: none;
            color: #ff6600;
        }

        .add-file-btn:hover {
            background-color: #ff9966;
        }

        .file-input-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            margin-bottom: 15px;
        }

        .file-input-group input[type="text"] {
            flex: 2;
        }

        .file-input-group input[type="file"] {
            flex: 3;
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .preview-item {
            text-align: center;
        }

        .preview-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #ff66cc;
            border-radius: 10px;
            margin-bottom: 5px;
        }

        @media (max-width: 576px) {
            .file-input-group {
                flex-direction: column;
                gap: 5px;
            }

            .file-input-group input[type="text"],
            .file-input-group input[type="file"] {
                flex: 1;
            }
        }
        span.removeFileInput {
            font-size: 45px;
            font-family: cursive;
            cursor: pointer;
        }
    </style>
    <title>Requirements</title>
</head>
<body>
    @if (!empty($refNumber))
        <h4 id="refNumberH4" class="text-center mt-4">
            Reference Number: {{ $refNumber }}
        </h4>
    @else
        <h4 id="refNumberH4" class="text-center mt-4 text-danger">
            No valid Reference Number provided.
        </h4>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- File Upload Form -->
    @if (!empty($refNumber))
        <div class="custom-form">
            <form method="POST" action="{{ route('image.requirements.store') }}" enctype="multipart/form-data" id="fileUploadForm">
                @csrf
                <input type="hidden" name="refNumber" value="{{ $refNumber ?? '' }}">
                <input type="hidden" id="uploadUrl" value="{{ route('image.requirements.store') }}">
                <div id="file-upload-container">
                    <div class="file-input-group" id="inputField">
                        <input type="text" name="descriptions[]" class="form-control" placeholder="File description" required>
                        <input type="file" name="files[]" class="form-control" accept="image/*" required>
                        <span class="removeFileInput" onclick="removeFileInput()">&times;</span>
                    </div>
                </div>
                <p class="text-danger text-center mt-2"><strong>Note:</strong> Only images up to **10MB** are allowed.</p>
                <button type="button" id="addFileButton" class="btn add-file-btn w-100">Add Another File</button>
                <div id="preview" class="preview-container mt-3"></div>
                <button type="submit" class="btn btn-block w-100 mt-3">Submit</button>
            </form>
        </div>
    @endif


    <script>
        let fileCounter = 0; // Unique counter for file inputs and previews

        document.getElementById('fileUploadForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            const maxSize = 10 * 1024 * 1024;
            let fileSizeValid = true;

            this.querySelectorAll('input[type="file"]').forEach(fileInput => {
                if (fileInput.files.length > 0 && fileInput.files[0].size > maxSize) {
                    fileSizeValid = false;
                }
            });

            if (!fileSizeValid) {
                showPopupMessage('File size exceeds 10MB. Please upload a smaller file.', 'error');
                return;
            }

            let uploadUrl = document.getElementById('uploadUrl').value;

            fetch(uploadUrl, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json().catch(() => response.text())) // Handle unexpected non-JSON responses
            .then(data => {
                console.log("Server Response:", data); // Debugging output

                if (data.success) {
                    let fileUploadForm = document.getElementById('fileUploadForm');
                    let previewContainer = document.getElementById('preview');

                    if (fileUploadForm) {
                        fileUploadForm.remove();
                    }

                    if (previewContainer) {
                        previewContainer.innerHTML = '';
                    }

                    showPopupMessage(data.message, 'success');
                } else {
                    showPopupMessage(data.message, 'error');
                }
            })
            .catch(error => {
                console.error("Upload error:", error);
                showPopupMessage('Server error: ' + error.message, 'error');
            });
        });



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

        document.getElementById('addFileButton').addEventListener('click', function () {
            fileCounter++; // Increment counter for unique IDs

            const fileUploadContainer = document.getElementById('file-upload-container');
            const newFileInput = document.createElement('div');
            newFileInput.classList.add('file-input-group');

            // Assign unique ID to the file input
            const fileInputId = `file-input-${fileCounter}`;
            const previewId = `preview-${fileCounter}`;

            newFileInput.innerHTML = `
                <input type="text" name="descriptions[]" class="form-control" placeholder="File description" required>
                <input type="file" name="files[]" class="form-control file-input" id="${fileInputId}" data-preview-id="${previewId}" accept="image/*" required>
                <span class="removeFileInput" style="cursor:pointer; font-weight:bold; margin-left:10px;">&times;</span>
            `;


            // Add event listener to remove button
            newFileInput.querySelector('.removeFileInput').addEventListener('click', function () {
                removeFileWithPreview(newFileInput, previewId);
            });

            fileUploadContainer.appendChild(newFileInput);
        });

        // Attach event listener to existing remove buttons on page load
        document.querySelectorAll('.removeFileInput').forEach(removeBtn => {
            removeBtn.addEventListener('click', function () {
                const fileInputGroup = removeBtn.parentElement;
                const fileInput = fileInputGroup.querySelector('input[type="file"]');
                removeFileWithPreview(fileInputGroup, fileInput.dataset.previewId);
            });
        });

        function removeFileWithPreview(fileInputGroup, previewId) {
            const fileUploadContainer = document.getElementById('file-upload-container');

            if (fileUploadContainer.querySelectorAll('.file-input-group').length > 1) {
                // Remove the corresponding preview image
                const previewImage = document.getElementById(previewId);
                if (previewImage) previewImage.remove();

                // Remove the file input group
                fileInputGroup.remove();
            }
        }

        // Handle empty refNumber
        document.getElementById('fileUploadForm').addEventListener('submit', function (event) {
            const refNumberInput = document.querySelector('input[name="refNumber"]');
            if (!refNumberInput.value.trim()) {
                event.preventDefault();
                showPopupMessage('Reference Number is required before submitting.', 'error');
            }
        });

        // Auto-dismiss success/error alerts
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);

        const fileUploadContainer = document.getElementById('file-upload-container');
        const previewContainer = document.getElementById('preview');

        // Function to preview files
        function handleFilePreview(input, description) {
            const files = input.files;

            Array.from(files).forEach((file) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const previewItem = document.createElement('div');
                        previewItem.classList.add('preview-item');
                        previewItem.id = input.dataset.previewId; // Ensure unique preview ID is used

                        const img = document.createElement('img');
                        img.src = e.target.result;

                        const label = document.createElement('p');
                        label.textContent = description.value;

                        previewItem.appendChild(img);
                        previewItem.appendChild(label);
                        previewContainer.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Add event listener to each file input for preview
        document.getElementById('fileUploadForm').addEventListener('change', function (event) {
            if (event.target.type === 'file') {
                const fileInput = event.target;
                const descriptionInput = fileInput.closest('.file-input-group').querySelector('input[type="text"]');

                // Remove previous preview for this input before adding a new one
                const existingPreview = document.getElementById(fileInput.dataset.previewId);
                if (existingPreview) {
                    existingPreview.remove();
                }

                handleFilePreview(fileInput, descriptionInput);
            }
        });
    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
