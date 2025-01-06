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
        <header class="welcome-header">
            <h1>Welcome to the Appointment System</h1>
            <p>Your gateway to efficient document processing and scheduling.</p>
        </header>

        <div class="welcome-content">
            <nav class="welcome-tabs">
                <button class="tab active" data-target="steps">Steps</button>
                <button class="tab" data-target="requirements">Requirements</button>
            </nav>
            
            <section id="steps" class="tab-content active">
                <h3>Steps:</h3>
                <ol>
                    <li>Read the requirements carefully.</li>
                    <li>Click "Proceed" to fill out the appointment form.</li>
                </ol>
            </section>
            
            <section id="requirements" class="tab-content">
                <h3>Requirements:</h3>
                <ul>
                    <li>Valid ID</li>
                    <li>Birth Certificate</li>
                    <li>Marriage Certificate</li>
                </ul>
            </section>
        </div>
        
        <div class="welcome-footer">
          <button id="proceed_button" class="btn">Proceed</button>
        </div>

    </div>

    <script>
        // Tab functionality
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(content => content.classList.remove('active'));

                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-target')).classList.add('active');
            });
        });

        // Proceed button functionality
        document.getElementById("proceed_button").onclick = function () {
            window.location.href = "{{ route('appointment.form') }}";
        };
    </script>
</body>
</html>
