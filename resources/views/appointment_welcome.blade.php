<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/welcome_style.css') }}">
</head>
<body>
    <!-- Welcome Content -->
    <div id="welcome_content" class="welcome-container">
        <h1>Welcome to the Appointment System</h1>
        <p>Please follow the steps below to proceed:</p>
        <div class="steps">
            <h3>Steps:</h3>
            <ol>
                <li>Read the requirements carefully.</li>
                <li>Click "Proceed" to fill out the appointment form.</li>
            </ol>
        </div>
        <div class="requirements">
            <h3>Requirements:</h3>
            <ul>
                <li>Valid ID</li>
                <li>Birth Certificate</li>
                <li>Marriage Certificate</li>
            </ul>
        </div>
        <!-- When clicking this button, the modal will show -->
        <button id="proceed_button" class="btn">Proceed</button>
    </div>

    <!-- Modal for Data Privacy -->
    <div id="privacy_modal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <h2>Data Privacy Statement</h2>
            <p>
                We value your privacy and ensure that all personal information collected will be used with due diligence and prudence,
                in compliance with the Data Privacy Act of 2012.
            </p>
            <p>
                By clicking "I Agree," you confirm that you understand and consent to our data privacy policy.
            </p>
            <div class="modal-buttons">
                <button id="agree_button">I Agree</button>
            </div>
        </div>
    </div>

    <script>
        // Show modal when the "Proceed" button is clicked
        document.getElementById("proceed_button").onclick = function () {
            const modal = document.getElementById("privacy_modal");
            modal.style.display = "flex"; // Show the modal
        };

        // Close the modal when "I Agree" is clicked
        document.getElementById("agree_button").onclick = function () {
            const modal = document.getElementById("privacy_modal");
            modal.style.display = "none"; // Hide the modal
            window.location.href = "{{ route('appointment.form') }}"; // Redirect to the form
        };
    </script>
</body>
</html>
