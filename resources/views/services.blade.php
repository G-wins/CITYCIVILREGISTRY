<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <style>
        /* Navigation */
        .navigation {
            text-align: center;
            margin: 30px 0;
        }
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f9f9f9, #f5c8d1); 
            color: #333;
            line-height: 1.9;
        }
        

        
        /* Main Container */
        .services-container {
            padding: 40px;
            max-width: 800px;
            margin: 140px auto 40px; 
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            animation: fadeIn 1s ease-in-out; 
        }

        /* Services Title */
        .services-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        .services-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, rgb(255, 46, 133), rgb(255, 114, 49));
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* Divider */
        .divider {
            border: 0;
            height: 2px;
            background: linear-gradient(to right, rgb(255, 46, 133), rgb(255, 114, 49));
            width: 60%;
            margin: 20px auto;
        }

        /* Services List */
        .services-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        .services-list li {
            font-size: 1.2rem;
            margin: 15px 0;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .services-list li::before {
            content: '•';
            color: rgb(255, 46, 133);
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .services-list li:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, rgba(255, 46, 133, 0.1), rgba(255, 114, 49, 0.1));
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
        
    <main class="services-container">
        <div class="pageTtitle">
            <h1>SERVICES</h1>
        </div>
        <ul class="services-list">
            <li>Birth Certificate Registration</li>
            <li>Marriage Certificate Registration</li>
            <li>Death Certificate Registration</li>
            <li>Application for Marriage License</li>
            <li>Out of Town Delayed Registration</li>
            <li>PSA, BREQS</li>
            <li>Certified True Copy (Form 102, 97, 103)</li>
            <li>Certification (Form 1A, 2A, 3A, No Record, Destroy)</li>
            <li>R.A 9048 (Clerical Error, Change of First Name)</li>
            <li>R.A 10172 (Change of Gender, Change of Date and Month of Birth)</li>
            <li>Court Decree</li>
            <li>Legal Instrument/Legitimation</li>
            <li>R.A 9255 (Affidavit to Use the Surname of Father)</li>
            <li>Pre-Registration of Birth Certificate</li>
        </ul>
    </main>

    

    <div class="navigation">
            <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
        </div>
    </div>
</body>
</html>