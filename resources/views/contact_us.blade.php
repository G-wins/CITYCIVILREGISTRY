<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f9f9f9, #f5c8d1); 
            color: #333;
            line-height: 1.9;
        }
        

        /* Header Section */
        .header {
            text-align: center;
            padding: 20px;
            background: linear-gradient(90deg, #ff914d, #e84d8a);
            color: #000;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .divider {
            border: 0;
            height: 2px;
            background:rgb(0, 0, 0);
            width: 80%;
            margin: 0 auto;
        }

        /* Contact Information Section */
        .contact-container {
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color:rgb(0, 0, 0);
            text-align: center;
        }

        .contact-details {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .contact-details p {
            margin: 10px 0;
        }

        .icon {
            margin-right: 10px;
        }

        .social-link {
            color:rgb(0, 0, 0);
            text-decoration: none;
            font-weight: bold;
        }

        .social-link:hover {
            text-decoration: underline;
        }

       
    </style>
</head>
<body>
    <header class="header">
        <h1>CONTACT INFORMATION</h1>
        <hr class="divider">
    </header>

    <main class="contact-container">
        <section>
            <h2 class="contact-title">City Civil Registry Office</h2>
            <div class="contact-details">
                <p><span class="icon">📍</span>Upper Ground Floor, New Government Center, Barangay Dulong Bayan, City of San Jose del Monte, Bulacan</p>
                <p><span class="icon">📞</span>09995449677</p>
                <p><span class="icon">☎️</span>044-919-7370 to 79 Local 1214</p>
                <p><span class="icon">☎️</span>044-919-7380 to 89 Local 1214</p>
                <p><span class="icon">📧</span><a href="mailto:csjdmlcro@gmail.com" class="social-link">csjdmlcro@gmail.com</a></p>
                <p><span class="icon">🌐</span><a href="https://www.facebook.com" class="social-link" target="_blank">City of San Jose del Monte – Civil Registrar’s Office</a></p>
            </div>

            <h3 class="contact-title">Office Hours</h3>
            <p>Monday to Friday</p>
            <p>8:00 AM – 5:00 PM</p>
        </section>
    </main>

   

    <div class="navigation">
            <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
        </div>
    </div>
</body>
</html>
