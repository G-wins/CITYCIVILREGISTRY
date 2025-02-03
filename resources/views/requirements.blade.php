<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #f9f9f9, #ffe0e6);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Header Section */
        .header {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            text-align: center;
            padding: 20px;
            background: linear-gradient(90deg, #ff914d, #e84d8a);
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .header p {
            margin-top: 10px;
            font-size: 1.2rem;
        }

        /* Requirements Container */
        .requirements-container {
            max-width: 1200px;
            width: 90%;
            margin: 120px auto 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

         /* Cards Layout */
         .main-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 90%;
            margin-top: 90px;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.4s ease;
            border: 2px solid #ff6b6b;
            width: 100%;
            max-width: 300px;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to bottom, #fff7f0, #ffe4e6);
        }

        .card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ff6f61;
        }

        .card p {
            font-size: 1rem;
            color: #666;
            margin-top: 10px;
        }

        /* Content Section */
        .content-section {
            display: none;
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
            margin-top: 30px;
            width: 100%;
        }

        .content-section.active {
            display: block;
        }

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

        /* Sub-sections for Details */
        .sub-section {
            margin: 10px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sub-section:hover {
            background-color: #f0f0f0;
        }

        .sub-section h4 {
            margin: 0;
            font-size: 1.2rem;
            color: #ff6f61;
        }

        .sub-content {
            margin-top: 10px;
            padding-left: 15px;
            font-size: 0.95rem;
            color: #333;
            display: none;
        }

        .sub-content.active {
            display: block;
        }


           
            /* Responsive Design */
            @media (max-width: 768px) {
            .main-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .main-cards {
                grid-template-columns: repeat(1, 1fr);
            }
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
            <div class="sub-section" data-subtarget="timely">
                <h4>Timely Registration of Live Birth from Married and Solo Parent</h4>
                <div class="sub-content">
                <p>
                    <Strong>Registration of live birth</Strong> shall be made in the Local Civil Registry Office of the city/municipality where the birth occurred.
                    It shall be registered within thirty (30) days from the time of occurrence.
                        </p>
                        <h4>Requirements:</h4>
                        <ul>
                            <li>Four (4) copies of Form 102 duly accomplished and signed by the proper parties.</li>
                        </ul>

                        <h4>TIMELY REGISTRATION OF LIVE BIRTH OF ILLEGITIMATE CHILDREN</h4>
                        <p>
                            <Strong>Registration of live birth</Strong> shall be made in the Local Civil Registry Office of the city/municipality where the birth occurred.
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
                </div>


            <div class="sub-section" data-subtarget="delayed">
                <h4>Delayed Registration of Birth</h4>
                <div class="sub-content">
                <p>
                     A report of vital event made beyond the reglementary period is considered delayed. A notice to the public on the pending application for DELAYED REGISTRATION shall be posted in the bulletin board of the city/municipality for a period of not less than ten (10) days. If after ten (10) days, no one opposes the registration, the civil registrar shall evaluate the veracity of the statements made in the required documents submitted. When the civil registrar is convinced that the event really occurred within the jurisdiction of the civil registry office and finding out that the said event was not registered, he shall register the delayed report thereof.
                </p>
                <h4>Requirements:</h4>
                <ul>
                    <li>No record of Birth from PSA and CCR of City of San Jose del Monte.</li>
                    <li><Strong>Submit original copy of any two (2) of the following both showing date and place of birth of the registrant:</Strong>
                        <ul>
                            <li>Medical Certificate and Birth Certificate if born in hospital, lying-in, or clinic.</li>
                            <li>Baptismal Certificate.</li>
                            <li>White Card.</li>
                            <li>Form 137 (either Elementary or High School) or school certification or Transcript of Records.</li>
                            <li>Voter’s Registration</li>
                            <li>Brgy. Certification</li>
                            <li>Affidavit, Employment Records (GSIS/SSS E-1 OR E-Form), Other documents the OFFICE MAY CONSIDER relevant and necessary for the approval of the application (Philhealth-MD, Service, Record, Personal Data Sheet, Medical Record, OSCA Certification, etc. </li>
                        </ul>
                    </li>
                    <li>Photocopy of ID/cedula of parents & registrant.</li>
                    <li>Marriage Contract of registrant, if married, Certified copy of Marriage Contract of Parents or Birth Certificate of brother/sister with date and place of marriage of parents or Birth Certificate of older brother/sister with proof of legitimacy.</li>
                    <li>Joint Affidavit of two disinterested persons.</li>
                    <li>Affidavit of Midwife/Hilot stating the reason of delay.</li>
                    <li>Pre-Natal Record of mother regardless of birth order (For Minor Children) or if the mother is more than 40 years old at the time of the birth of the child.</li>
                </ul>
                </div>
            </div>
        

            <div class="sub-section" data-subtarget="illegitimate">
                <h4>Illegitimate Children</h4>
                <div class="sub-content">
                <p>
                    <Strong>Born before August 3, 1988,</Strong> the FATHER must sign the Affidavit of Acknowledgment at the back of COLB.
                    <Strong>IF FATHER IS DECEASED,</Strong> submit documents that will <Strong>prove the filiation</Strong> of the child or documents showing that the father has acknowledged the child, i.e., ITR, public document, and private handwritten instrument.
                </p>
                <h4>A.O. 1 s. 2016 <Strong>Revised IRR of RA 9255 based on Supreme Court Ruling on GRANDA vs. ANTONIO</Strong></h4>
                <p>
                    <Strong>Born from AUGUST 3, 1988 – MARCH 18, 2004,</Strong> with or without Admission of Paternity at the back of the COLB, the child shall use the SURNAME OF THE MOTHER.
                </p>
                <p>
                    <Strong>Born from MARCH 19, 2004 – PRESENT:</Strong>
                        <li> With Admission of Paternity but no AUSF, the child shall use the SURNAME OF THE MOTHER</li>
                        <li>With Admission of Paternity and with AUSF, the child shall use the SURNAME OF THE FATHER</li>

                    <ul>
                        <li><Strong>0 - 6 yrs. old</Strong> – AUSF to be executed by the mother or the guardian, in the absence of the mother.</li>
                        <li><Strong>7 - 17 yrs. old</Strong> – AUSF to be executed by the child & sworn attestation executed by the mother or the guardian.</li>
                        <li><Strong>18 yrs. and above</Strong> – AUSF to be executed by the child without need of attestation.</li>
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
            </div>


            <div class="sub-section" data-subtarget="late-registration-of-birth">
                <h4>Late Registration of Birth</h4>
                <div class="sub-content">
                <ul>
                    <p><Strong>1.</Strong> No record of Birth from PSA and CCR of City of San Jose del Monte.</p>
                    <p><Strong>2. Submit original copy of any two (2) of the following both showing date and place of birth of the registrant:</Strong>
                <ul>
                    <li>Baptismal Certificate.</li>
                    <li>White Card.</li>
                    <li>Form 137 (either Elementary or High School) or school certification or Transcript of Records.</li>
                    <li>Voter’s Registration</li>
                    <li>Employment Records (GSIS/SSS E-1 or E-Form)</li>
                    <li>Other Documents the OFFICE MAY CONSIDER relevant and necessary for the approval of the application (Philhealth-MDR, Service Record, Personal Data Sheet, Medical Record, OSCA Certification)</li>
                </ul>
                    <p><Strong>3.</Strong> Medical Certificate and Birth Certificate if born in hospital, lying-in, or clinic.</p>
                    <p><Strong>4.</Strong> Government-issued ID of registrant</p>
                    <p><Strong>5.</Strong> Marriage Contract of registrant, if married</p>
                    <p><Strong>6.</Strong> Barangay Certification as proof of residency</p>
                    <p><Strong>7.</Strong> National ID</p>
                    <p><Strong>8.</Strong> Any (2) documentary evidence showing the identity of the parents such as but not limited to his/her certificate of live birth, government issued ID, certificate of marriage or certificate of death if deceased </p>
                    <p><Strong>9.</Strong> 2pcs. Unedited front-facing photo of the registrant (2x2 size. white backgrund, taken within 3 mos. from the date of registration</p>
                    <p><Strong>10.</Strong>Joint Affidavit of two disinterested persons.</p>
                    <p><Strong>11.</Strong>Affidavit of Midwife/Hilot stating the reason of delay</p>
                    <p><Strong>12.</Strong>Pre-Natal Record of mother regardless of birth order (For Minor Children) or if the mother is more than 40 years old at the time of the birth of the child.</p>
                </ul>

            <p><Strong>CHILDREN FROM NON-MARITAL PARENTS</Strong>the<Strong>FATHER</Strong> must sign the affidavit of acknowledgement at the back of COLB</p>

            <p>
                <Strong>IF FATHER IS DECEASED,</Strong> submit documents that will prove the filiation of the child or documents showing that the father has acknowledged the child, i.e., ITR, public document and private handwritten instrument.
            </p>      
            <p>    
                    <li> With Admission of Paternity but no AUSF, the child shall use the SURNAME OF THE MOTHER</li>
                    <li>With Admission of Paternity and with AUSF, the child shall use the SURNAME OF THE FATHER</li>

                <ul>
                    <li><Strong>0 - 6 yrs. old</Strong> – AUSF to be executed by the mother or the guardian, in the absence of the mother.</li>
                    <li><Strong>7 - 17 yrs. old</Strong> – AUSF to be executed by the child & sworn attestation executed by the mother or the guardian.</li>
                    <li><Strong>18 yrs. and above</Strong> – AUSF to be executed by the child without need of attestation.</li>
                </ul>
            </p>
      </div>
 </div>


        

        

        








        <!-- Other Sections -->
        <div id="marriage-certificate" class="content-section">
            <h2>Marriage Certificate</h2>
            <p>Details for Marriage Certificate Registration go here.</p>
        </div>
        <div id="death-certificate" class="content-section">
            <h2>Death Certificate</h2>
            <p>Details for Death Certificate Registration go here.</p>
        </div>
        <div id="marriage-license" class="content-section">
            <h2>Marriage License</h2>
            <p>Details for Marriage License Registration go here.</p>
        </div>
        <div id="cenomar" class="content-section">
            <h2>Cenomar</h2>
            <p>Details for Cenomar Registration go here.</p>
        </div>
        <div id="other-document" class="content-section">
            <h2>Other Document</h2>
            <p>Details for Other Document Registration go here.</p>
        </div>
    </div>

    <script>
        const cards = document.querySelectorAll('.card');
        const sections = document.querySelectorAll('.content-section');
        const subSections = document.querySelectorAll('.sub-section');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                const target = card.dataset.target;
                const targetSection = document.getElementById(target);

                if (targetSection) {
                    sections.forEach(section => section.classList.remove('active'));
                    targetSection.classList.add('active');
                }
            });
        });

        subSections.forEach(subSection => {
            subSection.addEventListener('click', () => {
                const subContent = subSection.querySelector('.sub-content');
                subContent.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
