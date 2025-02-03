<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
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
            width: 60%;
            margin: 0 auto;
        }

        /* Services List Section */
        .services-container {
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .services-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .services-list li {
            font-size: 1.2rem;
            margin: 10px 0;
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }

       
    </style>
</head>
<body>
    <header class="header">
        <h1>SERVICES</h1>
        <hr class="divider">
    </header>

    <main class="services-container">
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