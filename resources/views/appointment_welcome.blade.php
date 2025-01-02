<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/welcome_style.css') }}">
    </head>
<body>
    <div class="welcome-container">
        <h1>Welcome to the Appointment System</h1>
        <p>Please follow the steps below to proceed:</p>
        <div class="steps">
            <h3>Steps:</h3>
            <ol>
                <li>Read the requirements.</li>
                <li>Click the "Proceed" button to fill out the form.</li>
            </ol>
        </div>
        <div class="requirements">
            <h3>Requirements:</h3>
            <ul>
                <li>Birth Certificate</li>
                <li>Marriage Certificate</li>
                <li>Valid ID</li>
            </ul>
        </div>
        <a href="{{ route('appointment.form') }}" class="btn">Proceed to Appointment Form</a>
    </div>
</body>
</html>
