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
            <button id="proceed-button" class="btn">Proceed</button>
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
            <button id="confirm-proceed" class="btn">Agree and Proceed</button>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const proceedButton = document.getElementById("proceed-button");
        const modal = document.getElementById("modal");
        const closeModal = document.querySelector(".close");
        const confirmProceed = document.getElementById("confirm-proceed");

        modal.style.display = "none";

        proceedButton.onclick = function () {
            modal.style.display = "flex"; 
        };

        closeModal.onclick = function () {
            modal.style.display = "none"; 
        };

        confirmProceed.onclick = function () {
            window.location.href = "{{ route('appointment.form') }}";  
        };

        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none"; 
            }
        };
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
