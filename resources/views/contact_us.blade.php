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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Main Contact Section */
        main.contact-container {
            width: 90%;
            max-width: 900px;
            padding: 30px;
            margin-top: 140px; /* Prevents overlap with fixed header */
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .contact-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #222;
            text-transform: uppercase;
        }

        .contact-details {
            font-size: 1.2rem;
            text-align: left;
            margin: 0 auto 20px;
            max-width: 700px;
            line-height: 1.8;
        }

        .contact-details p {
            display: flex;
            align-items: center;
            font-size: 1.1rem;
            margin: 10px 0;
        }

        .icon {
            margin-right: 10px;
            font-size: 1.3rem;
        }

        .social-link {
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-weight: bold;
        }

        .social-link:hover {
            text-decoration: underline;
        }

        /* Office Hours */
        .office-hours {
            font-size: 1.2rem;
            font-weight: bold;
            color: #555;
            margin-top: 20px;
        }

        /* Navigation */
        .navigation {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #ff6b6b;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #d64545;
            transform: scale(1.05);
        }

        
        /* Responsive Design */
        @media screen and (max-width: 768px) {
            main.contact-container {
                width: 95%;
                padding: 20px;
                margin-top: 120px;
            }

            .contact-title {
                font-size: 1.7rem;
            }

            .contact-details p {
                font-size: 1rem;
            }

            .btn {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>

    <header class="hero">
        <div class="hero-content">
            <img src="{{ asset('logo/ccro.png') }}" alt="Logo Left" class="logo-left">
            <img src="{{ asset('logo/Csjdm Logo.png') }}" alt="Logo Right" class="logo-right">
            <div class="hero-title">
                <h2>City of San Jose Del Monte</h2>
                <h3>Registry Office (CCRO)</h3>
            </div>
        </div>
    </header>

    <main class="contact-container">
        <section>
            <h2 class="contact-title">City Civil Registry Office</h2>
            <div class="contact-details">
                <p><span class="icon">📍</span>Upper Ground Floor, New Government Center, Barangay Dulong Bayan, City of San Jose del Monte, Bulacan</p>
                <p><span class="icon">📞</span>09995449677</p>
                <p><span class="icon">☎️</span>044-919-7370 to 89 Local 1214</p>
                <p><span class="icon">📧</span><a href="mailto:csjdmlcro@gmail.com" class="social-link">csjdmlcro@gmail.com</a></p>
                <p><span class="icon">🌐</span><a href="https://www.facebook.com" class="social-link" target="_blank">City of San Jose del Monte – Civil Registrar’s Office</a></p>
            </div>

            <h3 class="contact-title">Office Hours</h3>
            <p class="office-hours">Monday to Friday</p>
            <p class="office-hours">8:00 AM – 5:00 PM</p>
        </section>
    </main>

    <div class="navigation">
        <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
    </div>

</body>
</html>
