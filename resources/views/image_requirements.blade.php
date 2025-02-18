<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            background-color: #ffe6f2; /* Light Pink Background */
            color: #ff6600; /* Orange Text */
            font-family: Arial, sans-serif;
        }

        /* Form Container */
        .custom-form {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border: 2px solid #ff66cc; /* Dark Pink Border */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* File Input Group - Inline Layout */
        .file-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        /* Input Fields (Make sure they fit in one line) */
        .file-input-group input[type="text"] {
            flex: 1; /* Allows text input to grow */
            min-width: 150px;
            border: 1px solid #ff66cc;
            border-radius: 5px;
            padding: 5px;
        }

        .file-input-group input[type="file"] {
            flex: 2; /* Makes file input slightly larger */
            border: 1px solid #ff66cc;
            border-radius: 5px;
            padding: 5px;
        }

        /* Buttons */
        .btn {
            border-radius: 5px;
            font-weight: bold;
        }

        .btn.add-file-btn {
            background-color: #ff66cc; /* Pink */
            color: white;
            border: none;
        }

        .btn.add-file-btn:hover {
            background-color: #ff4081; /* Brighter Pink */
        }

        .btn.btn-block {
            background-color: #ff6600; /* Orange */
            color: white;
            border: none;
        }

        .btn.btn-block:hover {
            background-color: #e65c00; /* Darker Orange */
        }

        /* Remove Button (X) */
        .removeFileInput {
            font-size: 20px;
            cursor: pointer;
            color: red;
        }

        /* Preview Container */
        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
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
        }

        /* Loading Indicator */
        #loadingIndicator {
            display: none;
            text-align: center;
            margin-top: 15px;
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 576px) {
            .file-input-group {
                flex-direction: row; /* Stack on small screens */
                gap: 5px;
            }
        }
        
        /* General Styles */
        body {
            background-color: #ffe6f2; /* Light Pink Background */
            color: #ff6600; /* Orange Text */
            font-family: Arial, sans-serif;
            padding-bottom: 70px; /* Prevent content from overlapping the fixed footer */
        }

        /* Navigation Footer */
        .fixed-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #ff66cc; /* Dark Pink Background */
            padding: 10px 0;
            text-align: left;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        .fixed-footer .nav-btn {
            background: white;
            color: #ff66cc;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            transition: 0.3s ease-in-out;
            text-decoration: none;
            display: inline-block;
            margin-left: 50px;
        }

        .fixed-footer .nav-btn:hover {
            background: #ff4081; /* Brighter Pink */
            color: white;
        }

    </style>
</head>
<body>
    @php $refNumber = request()->query('reference_number'); @endphp

    <h4 class="text-center mt-4 {{ empty($refNumber) ? 'text-danger' : '' }}">
        {{ empty($refNumber) ? 'No valid Reference Number provided.' : "Reference Number: $refNumber" }}
    </h4>

    @if (!empty($refNumber))
        <div class="custom-form">
            <form id="fileUploadForm">
                @csrf
                <input type="hidden" name="refNumber" value="{{ $refNumber }}">
                <input type="hidden" id="uploadUrl" value="{{ route('image.requirements.store') }}">

                <div id="file-upload-container">
                    <div class="file-input-group">
                        <input type="text" name="descriptions[]" class="form-control" placeholder="File description" required>
                        <input type="file" name="files[]" class="form-control file-input" accept="image/*" required>
                        <span class="removeFileInput">&times;</span>
                    </div>
                </div>

                <p class="text-danger text-center mt-2"><strong>Note:</strong> Only images up to **10MB** are allowed per image.</p>
                <button type="button" id="addFileButton" class="btn add-file-btn w-100">Add Another File</button>
                <div id="preview" class="preview-container mt-3"></div>
                <div id="loadingIndicator">
                    <div class="spinner-border text-primary"></div>
                    <p>Uploading...</p>
                </div>
                <button type="submit" class="btn btn-block w-100 mt-3">Submit</button>
            </form>
        </div>
    @endif

    <div class="fixed-footer">
        <a href="{{ route('appointment.welcome') }}" class="nav-btn">Back to Home</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileUploadForm = document.getElementById('fileUploadForm');
            const fileUploadContainer = document.getElementById('file-upload-container');
            const previewContainer = document.getElementById('preview');
            const addFileButton = document.getElementById('addFileButton');
            const loadingIndicator = document.getElementById('loadingIndicator');

            function updateRemoveButtons() {
                const fileInputs = fileUploadContainer.querySelectorAll('.file-input-group');
                fileInputs.forEach((group, index) => {
                    const removeButton = group.querySelector('.removeFileInput');
                    removeButton.style.display = index === 0 ? 'none' : 'inline'; // Hide (x) for the first input
                });
            }



            addFileButton.addEventListener('click', () => {
                const newFileInput = document.createElement('div');
                newFileInput.classList.add('file-input-group');
                const previewId = `preview-${Date.now()}`;

                newFileInput.innerHTML = `
                    <input type="text" name="descriptions[]" class="form-control" placeholder="File description" required>
                    <input type="file" name="files[]" class="form-control file-input" accept="image/*" required data-preview-id="${previewId}">
                    <span class="removeFileInput">&times;</span>
                `;

                fileUploadContainer.appendChild(newFileInput);
                updateRemoveButtons();

                newFileInput.querySelector('.removeFileInput').addEventListener('click', function () {
                    removeFileWithPreview(newFileInput, previewId);
                });
            });

            document.addEventListener('change', function (event) {
                if (event.target.classList.contains('file-input')) {
                    const fileInput = event.target;
                    const descriptionInput = fileInput.closest('.file-input-group').querySelector('input[type="text"]');
                    const previewId = fileInput.dataset.previewId;

                    if (fileInput.files.length > 0) {
                        const file = fileInput.files[0];
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                const existingPreview = document.getElementById(previewId);
                                if (existingPreview) existingPreview.remove();

                                const previewItem = document.createElement('div');
                                previewItem.classList.add('preview-item');
                                previewItem.id = previewId;
                                previewItem.innerHTML = `
                                    <img src="${e.target.result}" alt="Uploaded Image">
                                    <p>${descriptionInput.value}</p>
                                `;
                                previewContainer.appendChild(previewItem);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                }
            });

            function removeFileWithPreview(fileInputGroup, previewId) {
                // Remove the associated preview
                if (previewId) {
                    const previewElement = document.getElementById(previewId);
                    if (previewElement) {
                        previewElement.remove();
                    }
                }

                // Remove the input group
                fileInputGroup.remove();

                // Update remove button visibility
                updateRemoveButtons();
            }



            fileUploadForm.addEventListener('submit', function (event) {
                event.preventDefault();
                loadingIndicator.style.display = 'block';

                const formData = new FormData(this);
                fetch(document.getElementById('uploadUrl').value, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value }
                })
                .then(response => response.json())
                .then(data => {
                    loadingIndicator.style.display = 'none';
                    alert(data.success ? "Upload Successful!" : data.message);
                    if (data.success) {
                        fileUploadContainer.innerHTML = `
                            <div class="file-input-group">
                                <input type="text" name="descriptions[]" class="form-control" placeholder="File description" required>
                                <input type="file" name="files[]" class="form-control file-input" accept="image/*" required>
                                <span class="removeFileInput">&times;</span>
                            </div>
                        `;
                        previewContainer.innerHTML = '';
                        updateRemoveButtons();
                    }
                })
                .catch(error => {
                    loadingIndicator.style.display = 'none';
                    alert("Server Error: " + error.message);
                });
            });

            updateRemoveButtons();
        });
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('removeFileInput')) {
                const fileInputGroup = event.target.closest('.file-input-group');
                if (fileInputGroup) {
                    const fileInput = fileInputGroup.querySelector('.file-input');
                    const previewId = fileInput?.dataset.previewId;
                    removeFileWithPreview(fileInputGroup, previewId);
                }
            }
        });


    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
