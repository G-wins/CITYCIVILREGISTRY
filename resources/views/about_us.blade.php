<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f9f9f9, #f5c8d1);
            color: #333;
            line-height: 1.9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Main Container */
        .about-container {
            width: 90%;
            max-width: 900px;
            padding: 40px;
            margin-top: 140px; /* Adjusted to prevent overlapping with fixed header */
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1s ease-in-out; /* Add a fade-in animation */
        }

        /* Page Title */
        .pageTitle h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        .pageTitle h1::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, rgb(255, 46, 133), rgb(255, 114, 49));
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* About Sections */
        .about-section {
            margin-bottom: 40px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Section Titles */
        .section-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 40px;
            height: 3px;
            background: linear-gradient(to right, rgb(255, 46, 133), rgb(255, 114, 49));
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* Section Content */
        .section-content {
            font-size: 1.1rem;
            text-align: justify;
            line-height: 1.8;
            color: #555;
            padding: 0 20px;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

         /* Button */
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
            margin: 20px;
        }

        .btn:hover {
            background-color: #d64545; 
            transform: scale(1.05); 
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
        
        <main class="about-container">
            <div class="pageTitle">
                <h1>ABOUT US</h1>
            </div>

            <!-- CCRO Mandates Section -->
            <section class="about-section">
                <h2 class="section-title">CCRO Mandates</h2>
                <div class="section-content">
                    <p>
                        Assist the Local Chief Executive in the continuous, permanent, and compulsory recording of vital events such as birth, marriage, death, as well as all decreases, legal instruments, and judicial orders affecting a person’s civil status in appropriate registers as mandated by Civil Registry Law.
                    </p>
                </div>
            </section>

            <!-- Vision Section -->
            <section class="about-section">
                <h2 class="section-title">Vision</h2>
                <div class="section-content">
                    <p>
                        A reputable, reliable, competent, and accurate department acknowledged as partner in the growth of a strong, progressive, and rising city.
                    </p>
                </div>
            </section>

            <!-- Mission Section -->
            <section class="about-section">
                <h2 class="section-title">Mission</h2>
                <div class="section-content">
                    <p>
                        To standardize and upgrade the civil registration, resulting in accurate documents through the best current information system with assurance of employee's integrity.
                    </p>
                </div>
            </section>
        </main>

   
    <div class="navigation">
            <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
        </div>
    </div>
</body>
</html>
