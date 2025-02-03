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
        }
        
        /* Header Section */
        .header {
            text-align: center;
            padding: 20px;
            background: linear-gradient(90deg, #ff914d, #e84d8a);
            color: #000;
        }

        .header h1 {
            font-size: 2.8rem;
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

        /* About Us Section */
        .about-container {
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color:rgb(0, 0, 0);
        }

        .section-content {
            font-size: 1.2rem;
            text-align: justify;
            margin-bottom: 20px;
        }

       
    </style>
</head>
<body>
    <header class="header">
        <h1>ABOUT US</h1>
        <hr class="divider">
    </header>

    <main class="about-container">
        <section>
            <h2 class="section-title">CCRO Mandates</h2>
            <p class="section-content">
                Assist the Local Chief Executive in the continuous, permanent, and compulsory recording of vital events such as birth, marriage, death, as well as all decreases, legal instruments, and judicial orders affecting a person’s civil status in appropriate registers as mandated by Civil Registry Law.
            </p>
        </section>

        <section>
            <h2 class="section-title">Vision</h2>
            <p class="section-content">
                A reputable, reliable, competent, and accurate department acknowledged as a partner in the growth of a strong, progressive, and rising city.
            </p>
        </section>

        <section>
            <h2 class="section-title">Mission</h2>
            <p class="section-content">
                To standardize and upgrade the civil registration, resulting in accurate documents through the best current information system with assurance of employee's integrity.
            </p>
        </section>
    </main>

   
    <div class="navigation">
            <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
        </div>
    </div>
</body>
</html>
