<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements</title>
    <style>
        /* Reset */
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom, #f9f9f9, #f5c8d1); 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
}




/* Hero Section */
.hero {
    background: linear-gradient(90deg, #ff914d, #e84d8a);
    color: white;
    text-align: center;
    padding: 20px;  
    width: 100vw; 
    margin: 0;
    position: fixed; 
    top: 0; 
    left: 0; 
    z-index: 1000;
    box-sizing: border-box; 
}

.hero h1 {
    font-size: 2.5rem;  
    margin: 0;
}

.hero p {
    font-size: 1.2rem;  
    margin: 10px 0;
}


/* LOGO */
.logo-left {
    position: absolute; 
    top: 15px; 
    left:600px; 
    width: 100px; 
    height: auto;
}

.logo-right {
    position: absolute; 
    top: 15px; 
    right: 600px; 
    width: 100px; 
    height: auto;
}










        /* Container */
        .requirements-container {
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #007bff;
        }

        .header p {
            font-size: 14px;
            color: #555;
        }

        /* Main Cards */
        .main-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            flex: 1;
            max-width: 300px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 18px;
            color: #007bff;
            margin-bottom: 10px;
        }

        /* Sub-Cards */
        .sub-card {
            margin: 10px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sub-card:hover {
            background-color: #e9ecef;
        }

        .sub-card h4 {
            margin: 0;
            font-size: 16px;
            color: #007bff;
        }

        /* Content Section */
        .content-section {
            display: none;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 15px;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .content-section.active {
            display: block;
        }

        /* Back Button */
        .back-btn {
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="requirements-container">
        <!-- Header -->
        <div class="header">
            <h1>Requirements</h1>
            <p>Select a document type below to view the details.</p>
        </div>

        <!-- Main Cards -->
        <div class="main-cards">
            <div class="card" data-target="live-birth">
                <h3>Live Birth</h3>
                <p>View requirements for Live Birth Registration.</p>
            </div>
            <div class="card" data-target="marriage-certificate">
                <h3>Marriage Certificate</h3>
                <p>View requirements for Marriage Certificate Registration.</p>
            </div>
            <div class="card" data-target="death-certificate">
                <h3>Death Certificate</h3>
                <p>View requirements for Death Certificate Registration.</p>
            </div>
            <div class="card" data-target="marriage-license">
                <h3>Marriage License</h3>
                <p>View requirements for Marriage License Registration.</p>
            </div>
            <div class="card" data-target="cenomar">
                <h3>Cenomar</h3>
                <p>View requirements for Cenomar Registration.</p>
            </div>
            <div class="card" data-target="other-document">
                <h3>Other Document</h3>
                <p>View requirements for Other Document Registration.</p>
            </div>
        </div>

        <!-- Live Birth Section -->
        <div id="live-birth" class="content-section">
            <h2>Live Birth</h2>
            <p>Select a category to view details:</p>
            <div class="sub-card" data-subtarget="timely-registration">
                <h4>Timely Registration</h4>
            </div>
            <div class="sub-card" data-subtarget="delayed-registration">
                <h4>Delayed Registration</h4>
            </div>
        </div>

        <!-- Timely Registration -->
        <div id="timely-registration" class="content-section">
        <h2>Timely Registration of Live Birth</h2>
        <h3>From Married & Solo Parent</h3>
        <p>
            Registration of live birth shall be made in the Local Civil Registry Office of the city/municipality where the birth occurred. 
            It shall be registered within thirty (30) days from the time of occurrence.
        </p>
        <h4>Requirements:</h4>
        <ul>
            <li>Four (4) copies of Form 102 duly accomplished and signed by the proper parties.</li>
        </ul>

        <h3>Timely Registration of Live Birth of Illegitimate Children</h3>
        <p>
            Registration of live birth shall be made in the Local Civil Registry Office of the city/municipality where the birth occurred. 
            It shall be registered within thirty (30) days from the time of occurrence.
        </p>
        <h4>Requirements:</h4>
        <ul>
            <li>Four (4) copies of Form 102 duly accomplished and signed by the proper parties.</li>
            <li>Duly accomplished, signed, and notarized affidavit of acknowledgment/admission of paternity.</li>
            <li>Duly accomplished and notarized affidavit to use the surname of the father (AUSF) executed by the mother (3 original copies).</li>
            <li>Community tax certificate/Valid ID of parents (2 photocopies).</li>
        </ul>
        <h4>Fees:</h4>
        <ul>
            <li>₱200.00 – Acknowledgement of Paternity</li>
            <li>₱300.00 – Affidavit to Use the Surname of Father</li>
        </ul>
        </div>

        <div id="delayed-registration" class="content-section">
        <h2>Delayed Registration of Birth</h2>
        <p>
            A report of vital event made beyond the reglementary period is considered delayed. A notice to the public on the pending application for delayed registration shall be posted in the bulletin board of the city/municipality for a period of not less than ten (10) days. If after ten (10) days, no one opposes the registration, the civil registrar shall evaluate the veracity of the statements made in the required documents submitted. When the civil registrar is convinced that the event really occurred within the jurisdiction of the civil registry office and finding out that the said event was not registered, he shall register the delayed report thereof.
        </p>
        <h4>Requirements:</h4>
        <ul>
            <li>No record of Birth from PSA (NSO) and CCR of City of San Jose del Monte.</li>
            <li>Submit original copy of any two (2) of the following both showing date and place of birth of the registrant:
                <ul>
                    <li>Medical Certificate and Birth Certificate if born in hospital, lying-in, or clinic.</li>
                    <li>Baptismal Certificate.</li>
                    <li>White Card.</li>
                    <li>Form 137 (either Elementary or High School) or school certification or Transcript of Records.</li>
                    <li>Voter’s Registration Record.</li>
                    <li>Employment Records (GSIS/SSS E-1 or E-Form).</li>
                    <li>Other documents the OFFICE MAY CONSIDER relevant and necessary for the approval of the application (Philhealth-MDR, Service Record, Personal Data Sheet, Medical Record, OSCA Certification, etc.).</li>
                </ul>
            </li>
            <li>Photocopy of ID/cedula of parents & registrant.</li>
            <li>Marriage Contract of registrant, if married, Certified copy of Marriage Contract of Parents or Birth Certificate of brother/sister with date and place of marriage of parents or Birth Certificate of older brother/sister with proof of legitimacy.</li>
            <li>Joint Affidavit of two disinterested persons.</li>
            <li>Affidavit of Midwife/Hilot stating the reason of delay.</li>
            <li>Pre-Natal Record of mother regardless of birth order (For Minor Children) or if the mother is more than 40 years old at the time of the birth of the child.</li>
        </ul>

        <h4>Illegitimate Children:</h4>
        <p>
            Born before August 3, 1988, the father must sign the Affidavit of Acknowledgment at the back of COLB. 
            If the father is deceased, submit documents that will prove the filiation of the child or documents showing that the father has acknowledged the child, i.e., ITR, public document, and private handwritten instrument.
        </p>
        <h4>A.O. 1 s. 2016 Revised IRR of RA 9255 based on Supreme Court Ruling on GRANDA vs. ANTONIO</h4>
        <p>
            Born from AUGUST 3, 1988 – MARCH 18, 2004, with or without Admission of Paternity at the back of the COLB, the child shall use the SURNAME OF THE MOTHER.
        </p>
        <p>
            Born from MARCH 19, 2004 – PRESENT:
            <ul>
                <li>0 - 6 yrs. old – AUSF to be executed by the mother or the guardian, in the absence of the mother.</li>
                <li>7 - 17 yrs. old – AUSF to be executed by the child & sworn attestation executed by the mother or the guardian.</li>
                <li>18 yrs. and above – AUSF to be executed by the child without need of attestation.</li>
            </ul>
        </p>

        <h4>Fees:</h4>
        <ul>
            <li>₱35.00 – Certificate of No record</li>
            <li>₱35.00 – Verification</li>
            <li>₱200.00 – Acknowledgement of Paternity</li>
            <li>₱300.00 – Authority to Use Surname of Father</li>
        </ul>
    </div>


    

    












    <div class="navigation">
            <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        const cards = document.querySelectorAll('.card');
        const sections = document.querySelectorAll('.content-section');
        const subCards = document.querySelectorAll('.sub-card');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                sections.forEach(section => section.classList.remove('active'));
                const target = card.dataset.target;
                document.getElementById(target).classList.add('active');
            });
        });

        subCards.forEach(subCard => {
            subCard.addEventListener('click', () => {
                sections.forEach(section => section.classList.remove('active'));
                const subTarget = subCard.dataset.subtarget;
                document.getElementById(subTarget).classList.add('active');
            });
        });
    </script>
</body>
</html>
