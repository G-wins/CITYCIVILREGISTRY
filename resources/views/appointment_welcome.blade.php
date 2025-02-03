<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .modal-body .mb-3 {
            display: flex;
            flex-direction: column;
        }

        .modal-body .form-label {
            margin-bottom: -10px;
            font-size: 16px;
            font-weight: 500;
            text-align: left;
        }

        #refNumber {
            border: 2px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
            flex-grow: 1;
        }

        #refNumber:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
            outline: none;
        }

        .btn {
            padding: 0px;
            font-size: 16px;
        }

        .input-button-container {
            display: flex;
            align-items: center;
        }

        .hint {
            margin-top: -10px;
            font-size: 14px;
            color: #6c757d;
            text-align: left;
        }

        .modal-header .btn-close {
            position: absolute;
            right: 15px;
            top: 15px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/welcome_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="welcome-container">
        <!-- Hero Section -->
        <header class="hero">
            <div class="hero-content">
                <img src="{{ asset('logo/ccro.png') }}" alt="Logo Left" class="logo-left">
                <div class="hero-title">
                    <h1>Republic of the Philippines</h1>
                    <h2>City of San Jose Del Monte</h2>
                    <h3>Registrar’s Office (CCRO)</h3>
                    <p>ARYa San Joseño!</p>
                </div>
                <img src="{{ asset('logo/Csjdm Logo.png') }}" alt="Logo Right" class="logo-right">
            </div>
        </header>

        <!-- Navigation Tabs -->
        <div class="tabs">
            <a href="{{ route('contact.us') }}" class="tab {{ request()->routeIs('contact.us') ? 'active' : '' }}">Contact Us</a>
            <a href="{{ route('requirements') }}" class="tab {{ request()->routeIs('requirements') ? 'active' : '' }}">Requirements</a>
            <a href="{{ route('services') }}" class="tab {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('about.us') }}" class="tab {{ request()->routeIs('about.us') ? 'active' : '' }}">About Us</a>
        </div>

        <!-- Main Content Section -->
        <div class="tabs-container">
            <div id="contact-info" class="tab-content {{ request()->routeIs('contact.us') ? 'active' : '' }}">
                <h3>Contact Information</h3>
                <p>Email: support@example.com</p>
                <p>Phone: (123) 456-7890</p>
                <p>Address: City Civil Registry Office, San Jose Del Monte</p>
            </div>

            <div id="requirements" class="tab-content {{ request()->routeIs('requirements') ? 'active' : '' }}">
                <h3>Requirements</h3>
                <ul>
                    <li><b>Birth Certificate:</b> Valid ID, Application Form, Payment Fee</li>
                    <li><b>Marriage License:</b> Birth Certificates of Both Parties, CENOMAR</li>
                    <li><b>Death Certificate:</b> Medical Certificate, Valid ID</li>
                </ul>
            </div>

            <div id="services" class="tab-content {{ request()->routeIs('services') ? 'active' : '' }}">
                <h3>Services</h3>
                <ul>
                    <li>Birth Certificate Registration</li>
                    <li>Marriage Certificate Processing</li>
                    <li>Death Certificate Issuance</li>
                </ul>
            </div>

            <div id="about-us" class="tab-content {{ request()->routeIs('about.us') ? 'active' : '' }}">
                <h3>About Us</h3>
                <p>Welcome to the City Civil Registry System. We aim to provide efficient and reliable services for document processing.</p>
            </div>
        </div>

        <!-- Proceed Button -->
        <div class="proceed-container">
            <button id="proceed-button" class="btn">Step 1</button>
            <button id="imgButton"  class="btn btn-primary">Go to Image Requirements</button>    
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2025 CITY CIVIL REGISTRY</p>
        </footer>
    </div>

    <!-- Data Privacy Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Data Privacy Notice</h2>
            <p>By proceeding with your appointment request, you agree to the collection and processing of your personal data according to our data privacy policy.</p>
            <button id="confirm-proceed" class="btn" data-url="{{ route('appointment.form') }}">Proceed</button>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header position-relative">
                    <h3 class="modal-title" id="imageModalLabel">Enter Reference Number</h3>
                    <span class="close" id="closeButton">&times;</span>
                </div>
                <div class="modal-body">
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

                    <form action="{{ route('image.requirements') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="refNumber" class="form-label">Reference Number:</label>
                            <div class="input-button-container">
                                <input type="text" id="refNumber" name="refNumber" class="form-control @error('refNumber') is-invalid @enderror" placeholder="Enter your reference number" required>
                                <button type="submit" id="confirm_reference" class="btn btn-primary">Confirm</button>
                            </div>
                            @error('refNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="hint">Your reference number from step 1.</small>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Modal and Button Elements
        const proceedButton = document.getElementById("proceed-button");
        const modal = document.getElementById("modal");
        const closeModal = document.querySelector(".close");
        const confirmProceed = document.getElementById("confirm-proceed");
        const confirmRef = document.getElementById('confirm_reference');
        const imageButton = document.getElementById("imgButton");
        const imgModal = document.getElementById('imageModal');
        const refNumberForm = document.getElementById('refNumberForm');

        // Ensure modals are hidden initially
        if (modal) modal.style.display = "none";
        if (imgModal) imgModal.style.display = "none";

        // Proceed Modal Logic
        if (proceedButton) {
            proceedButton.onclick = function () {
                if (modal) modal.style.display = "flex";
            };
        }

        if (closeModal) {
            closeModal.onclick = function () {
                if (modal) modal.style.display = "none";
            };
        }

        if (confirmProceed) {
            confirmProceed.onclick = function () {
                const url = confirmProceed.getAttribute('data-url') || "{{ route('appointment.form') }}";
                window.location.href = url;
            };
        }

        // Click outside modal to close
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
            if (event.target === imgModal) {
                imgModal.style.display = "none";
            }
        };

        // Image Modal Logic
        if (imageButton) {
            imageButton.onclick = function () {
                if (imgModal) imgModal.style.display = "flex";
            };
        }

        if (document.getElementById('closeButton')) {
            document.getElementById('closeButton').addEventListener('click', function () {
                console.log('Modal close button clicked.');
                if (imgModal) imgModal.style.display = "none";
            });
        }

        // Prevent form submission if input is empty
        if (refNumberForm) {
            refNumberForm.addEventListener('submit', function (event) {
                const refNumberInput = document.getElementById('refNumber');
                if (refNumberInput && refNumberInput.value.trim() === '') {
                    event.preventDefault();
                    alert('Please enter your reference number.');
                }
            });

            // Prevent Enter keypress if input is empty
            const refNumberInput = document.getElementById('refNumber');
            if (refNumberInput) {
                refNumberInput.addEventListener('keydown', function (event) {
                    if (event.key === 'Enter' && this.value.trim() === '') {
                        event.preventDefault();
                        alert('Please enter your reference number.');
                    }
                });
            }
        }
    </script>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/677e2c3149e2fd8dfe0420bd/1ih2dp8mb';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
