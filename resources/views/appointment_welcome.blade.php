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
            <h1>Welcome to the Appointment System</h1>
            <p>Your gateway to efficient document processing and scheduling</p>
        </header>

        <!-- Tabs Section -->
        <div class="tabs-container">
            <div class="tabs">
                <button class="tab" data-target="contact-info">Contact Information</button>
                <button class="tab" data-target="requirements">Requirements</button>
                <button class="tab" data-target="services">Services</button>
                <button class="tab active" data-target="about-us">About Us</button>
            </div>
            <div class="tab-content-container">
              <button id="proceed-button" class="btn">Proceed</button>
             </div>
             <div id="contact-info" class="tab-content">
                <h3>Contact Information</h3>
                <p>Email: support@example.com</p>
                <p>Phone: (123) 456-7890</p>
                <p>Address: City Civil Registry Office, San Jose Del Monte</p>
             </div>
        <div id="requirements" class="tab-content">
              <h3>Requirements</h3>
                <ul>
                    <li><b>Birth Certificate:</b> Valid ID, Application Form, Payment Fee</li>
                    <li><b>Marriage License:</b> Birth Certificates of Both Parties, CENOMAR</li>
                    <li><b>Death Certificate:</b> Medical Certificate, Valid ID</li>
                </ul>
           </div>
           <div id="services" class="tab-content">
                <h3>Services</h3>
                <ul>
                    <li>Birth Certificate Registration</li>
                    <li>Marriage Certificate Processing</li>
                    <li>Death Certificate Issuance</li>
                </ul>
            </div>
           <div class="tab-content-container">
            <div id="about-us" class="tab-content active">
                <h3>About Us</h3>
                <p>Welcome to the City Civil Registry System. We aim to provide efficient and reliable services for document processing.</p>
            </div>
                </div>
            </div>


        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2025 City Civil Registry System</p>
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
            if (event.target === document.getElementById("chatSupportModal")) {
                document.getElementById("chatSupportModal").style.display = "none";
            }
        }



        document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".tab");
        const contents = document.querySelectorAll(".tab-content");

        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                tabs.forEach(t => t.classList.remove("active"));
                contents.forEach(c => c.classList.remove("active"));

                tab.classList.add("active");
                document.getElementById(tab.dataset.target).classList.add("active");
            });
        });
        });


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
