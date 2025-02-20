<!DOCTYPE html>
<html lang="en">
<head>
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
                <div class="leftSideHeader">
                    <img src="{{ asset('logo/ccro.png') }}" alt="Logo ccro" class="logo-left">
                    <img src="{{ asset('logo/Csjdm Logo.png') }}" alt="Logo csjdm" class="logo-right">
                    <div class="hero-title">
                        <h2>City of San Jose Del Monte</h2>
                        <h3>Registry Office (CCRO)</h3>
                    </div>
                </div>
                
                <!-- Hamburger Menu Icon -->
                <div class="menu-icon" id="menuIcon">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <!-- Navigation Tabs (Will be hidden on small screens) -->
            <nav class="tabs" id="navMenu">
                <a href="{{ route('contact.us') }}" class="tab {{ request()->routeIs('contact.us') ? 'active' : '' }}">Contact Us</a>
                <a href="{{ route('requirements') }}" class="tab {{ request()->routeIs('requirements') ? 'active' : '' }}">Requirements</a>
                <a href="{{ route('services') }}" class="tab {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('about.us') }}" class="tab {{ request()->routeIs('about.us') ? 'active' : '' }}">About Us</a>
            </nav>
        </header>

        

        <div class="scroll-indicator">↓ Scroll Down ↓</div>
        <div class="mainContent">
            <!-- Proceed Button -->
            <div class="steps">
                <h2>Steps to Get an Appointment</h2>
                <div class="step">
                    <p><strong>Step 1:</strong> Fill out the form with your personal details and select the type of document you need (Birth Certificate, Marriage Certificate, Marriage License, Death Certificate, CENOMAR, or other documents). <a id="proceed-button" href="#">Click here to fill up the form</a>.</p>
                </div>
                <div class="step">
                    <p><strong>Step 2:</strong> Upload the required supporting documents to complete your request. <a id="imgButton" href="#">Click here to upload your documents</a>.</p>
                </div>
                <div class="step">
                    <p><small><i>Can't upload your document yet? Just save your reference number and return here on or before your scheduled appointment date to complete the upload.</i></small></p>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer">
                <p>&copy; 2025 CITY CIVIL REGISTRY</p>
            </footer>
        </div>
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
                                <input type="text" id="refNumber" name="refNumber" class="form-control @error('refNumber') is-invalid @enderror" required>
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
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lastScrollTop = window.scrollY;
            const mainContent = document.querySelector(".mainContent");

            window.addEventListener("scroll", function () {
                let currentScroll = window.scrollY;
                let screenHeight = window.innerHeight; // Get viewport height
                let mainContentTop = mainContent.offsetTop; // Get mainContent's position

                if (currentScroll < lastScrollTop - 10) { 
                    // If scrolling up, go all the way to the top
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                } else if (currentScroll > lastScrollTop + 1) { 
                    // If scrolling down, go all the way down to mainContent
                    window.scrollTo({
                        top: mainContentTop,
                        behavior: "smooth"
                    });
                }

                lastScrollTop = currentScroll;
            });
        });





        document.addEventListener("DOMContentLoaded", function () {
            const menuIcon = document.getElementById("menuIcon");
            const navMenu = document.getElementById("navMenu");

            // Toggle menu visibility smoothly
            menuIcon.addEventListener("click", function () {
                navMenu.classList.toggle("show");
            });

            // Close menu when clicking outside
            document.addEventListener("click", function (event) {
                if (!menuIcon.contains(event.target) && !navMenu.contains(event.target)) {
                    navMenu.classList.remove("show");
                }
            });
        });


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

        $(document).ready(function () {
            $("#confirm_reference").click(function (event) {
                event.preventDefault(); // Prevent default form submission
                
                let refNumber = $("#refNumber").val();

                $.ajax({
                    url: "{{ route('check.reference') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        refNumber: refNumber
                    },
                    success: function (response) {
                        if (response.valid) {
                            // If valid, redirect to image_requirements.blade.php with the reference number
                            window.location.href = response.redirect + "?reference_number=" + encodeURIComponent(refNumber);
                        } else {
                            // If invalid, show an alert and prevent submission
                            alert("Invalid Reference Number. Please check your input.");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>