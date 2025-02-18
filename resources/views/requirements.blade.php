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
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
        <!-- Hero Section and Logo -->
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
        
        
    <div class="requirements-container">
        <div class="pageTitle">
            <h1>REQUIREMENTS</h1>
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
            <div class="card" data-target="marriage-license">
                <h3>Marriage License</h3>
                <p>View requirements for Marriage License Registration.</p>
            </div>
            <div class="card" data-target="death-certificate">
                <h3>Death Certificate</h3>
                <p>View requirements for Death Certificate Registration.</p>
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
            <div class="sub-section" data-subtarget="timely-registration-of-live-birth-from-married-and-solo-parent">
                <h4>Timely Registration of Live Birth from Married and Solo Parent</h4>
                <div class="sub-content">
                <p>
                    <Strong>Registration of live birth</Strong> shall be made in the Local Civil Registry Office of the city/municipality where the birth occurred.
                    It shall be registered within thirty (30) days from the time of occurrence.
                </p><br>
                        <h4>Requirements:</h4>
                        <ul style="padding-left: 40px;">
                            <p>Four (4) copies of Form 102 duly accomplished and signed by the proper parties.</p>
                        </ul><br>

                        <h4>TIMELY REGISTRATION OF LIVE BIRTH OF ILLEGITIMATE CHILDREN</h4>
                        <p>
                            <Strong>Registration of live birth</Strong> shall be made in the Local Civil Registry Office of the city/municipality where the birth occurred.
                            It shall be registered within thirty (30) days from the time of occurrence.
                        </p><br>
                        <h4>Requirements:</h4>
                        <ul style="padding-left: 40px;">
                            <li>Four (4) copies of Form 102 duly accomplished and signed by the proper parties.</li>
                            <li>Duly accomplished, signed, and notarized affidavit of acknowledgment/admission of paternity.</li>
                            <li>Duly accomplished and notarized affidavit to use the surname of the father (AUSF) executed by the mother (3 original copies).</li>
                            <li>Community tax certificate/Valid ID of parents (2 photocopies).</li>
                        </ul><br>
                        <h4>Fees:</h4>
                        <ul style="padding-left: 40px;">
                            <p>₱200.00 – Acknowledgement of Paternity</p>
                            <p>₱300.00 – Affidavit to Use the Surname of Father</p>
                        </ul>
                    </div>
                </div>


            <div class="sub-section" data-subtarget="delayed-registration-of-birth">
                <h4>Delayed Registration of Birth</h4>
                <div class="sub-content">
                <p>
                     A report of vital event made beyond the reglementary period is considered delayed. A notice to the public on the pending application for DELAYED REGISTRATION shall be posted in the bulletin board of the city/municipality for a period of not less than ten (10) days. If after ten (10) days, no one opposes the registration, the civil registrar shall evaluate the veracity of the statements made in the required documents submitted. When the civil registrar is convinced that the event really occurred within the jurisdiction of the civil registry office and finding out that the said event was not registered, he shall register the delayed report thereof.
                </p><br>
                <h4>Requirements:</h4>
                <ul style="padding-left: 40px;">
                    <li>No record of Birth from PSA and CCR of City of San Jose del Monte.</li>
                    <li><Strong>Submit original copy of any two (2) of the following both showing date and place of birth of the registrant:</Strong>
                        <ul style="padding-left: 40px;">
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
       

            <div class="sub-section" data-subtarget="illegitimate-children">
                <h4>Illegitimate Children</h4>
                <div class="sub-content">
                <p>
                    <Strong>Born before August 3, 1988,</Strong> the FATHER must sign the Affidavit of Acknowledgment at the back of COLB.
                    <Strong>IF FATHER IS DECEASED,</Strong> submit documents that will <Strong>prove the filiation</Strong> of the child or documents showing that the father has acknowledged the child, i.e., ITR, public document, and private handwritten instrument.
                </p><br>
                <h4>A.O. 1 s. 2016 <Strong>Revised IRR of RA 9255 based on Supreme Court Ruling on GRANDA vs. ANTONIO</Strong></h4>
                <p>
                    <Strong>Born from AUGUST 3, 1988 – MARCH 18, 2004,</Strong> with or without Admission of Paternity at the back of the COLB, the child shall use the SURNAME OF THE MOTHER.
                </p>
                <p>
                    <Strong>Born from MARCH 19, 2004 – PRESENT:</Strong>
                        <li> With Admission of Paternity but no AUSF, the child shall use the SURNAME OF THE MOTHER</li>
                        <li>With Admission of Paternity and with AUSF, the child shall use the SURNAME OF THE FATHER</li>

                  <ul style="padding-left: 40px;">
                        <li><Strong>0 - 6 yrs. old</Strong> – AUSF to be executed by the mother or the guardian, in the absence of the mother.</li>
                        <li><Strong>7 - 17 yrs. old</Strong> – AUSF to be executed by the child & sworn attestation executed by the mother or the guardian.</li>
                        <li><Strong>18 yrs. and above</Strong> – AUSF to be executed by the child without need of attestation.</li>
                    </ul>
                </p><br>

                <h4>Fees:</h4>
                <ul style="padding-left: 40px;">
                    <p>₱35.00 – Certificate of No record</p>
                    <p>₱35.00 – Verification</p>
                    <p>₱200.00 – Acknowledgement of Paternity</p>
                    <p>₱300.00 – Authority to Use Surname of Father</p>
                </ul>
                </div>
            </div>




 <div class="sub-section" data-subtarget="requirements-for-out-of-town-delayed-registration-of birth-certificate">
    <h4>Requiements for out of Town Delayed Registraion of Birth Certificate</h4>
    <div class="sub-content">
        <ul>
            <P><Strong>1.</Strong> No record of Birth from PSA</P>
            <p><Strong>2.</Strong> Submit original copy of any two (2) of the following both showing date and place of birth of the registrant:</p>
            <ul style="padding-left: 40px;">
                    <li>Baptismal Certificate</li>
                    <li>White Card</li>
                    <li>Form 137 (either Elementary or High School) or school certification or Transcript of Records</li>
                    <li>Voter’s Registration Record</li>
                    <li>Employment Records (GSIS/SSS E-1 or E-Form)</li>
                    <li>
                        Other documents the OFFICE MAY CONSIDER relevant and necessary for the approval of the application (Philhealth-MDR, Service Record, Personal Data Sheet, Medical Record, OSCA Certification, etc.)
                    </li>
                </ul>
       
            <p><Strong>3.</Strong> Medical Certificate/Birth Certificate if born in hospital, lying-in, or clinic</p>
            <p><Strong>4.</Strong> Photocopy of ID of registrant</p>
            <p><Strong>5.</Strong> Marriage Contract of registrant, if married</p>
            <p><Strong>6.</Strong> Barangay Certification</p>
            <p><Strong>7.</Strong> National ID</p>
            <p><Strong>8.</Strong> Any (2) documentary evidence showing the identity of the parents such as but not limited to his/her certificate of live birth, government-issued ID, certificate of marriage, or certificate of death if deceased </p>
            <p><Strong>9.</Strong> 2 pcs. unedited front-facing photo of the registrant (2x2 size, white background, taken within 3 mos. from the date of registration)</p>
            <p><Strong>10.</Strong> Affidavit for Out-of-Town Delayed Registration</p>
            <p><Strong>11.</Strong> Joint Affidavit of 2 Disinterested Persons</p>
        </ul>
    </div>
</div>


<div class="sub-section" data-subtarget="correction-of-clerical-error">
    <h4>Correction of Clerical Error</h4>
    <div class="sub-content">
        <p>
            <strong>Republic Act No. 9048</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical error in an entry and/or change of name or nickname in the civil register except corrections involving the change in sex, age, nationality and status of a person without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office (LCRO) where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
        </p><br>
        <h4>Who May Avail the Service:</h4>
        <ul style="padding-left: 40px;">
            <li>Owner of the record that contains the error to be changed or corrected</li>
            <li>Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected</li>
        </ul><br>
        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries</li>
            <li>Not less than 2 public or private documents upon which the correction shall be based:
                <ul style="padding-left: 40px;">
                    <li>Baptismal Certificate</li>
                    <li>Voter’s Affidavit</li>
                    <li>Employment Record</li>
                    <li>GSIS/SSS Record</li>
                    <li>Medical Record</li>
                    <li>School Record</li>
                    <li>Business Record</li>
                    <li>Driver’s License</li>
                    <li>Insurance</li>
                    <li>Land Titles</li>
                    <li>Certificate of Land Transfer</li>
                    <li>Bank Passbook</li>
                    <li>NBI/Police Clearance</li>
                    <li>Civil Registry Records of Ascendants and Others</li>
                </ul>
            </li>
        </ul>
        <h4>Fees:</h4>
        <ul style="padding-left: 40px;">
            <p>₱1,000.00 – Filing Fee</p>
            <p>₱150.00 – Posting Fee</p>
            <p>₱200.00 – Certificate of Finality</p>
            <p>₱500.00 – Migrant Fee</p>
            <p>Other expenses: Courier & Notary</p>
        </ul><br>
        <p>
        <li>Don't submit<Strong> FAKE DOCUMENTS</Strong> to avoid penalty. All supporting documents are subject for<Strong> VERIFICATION and FURTHER EVALUATION</Strong></li>
        <li>Complete the needed requirements before submission</li>
        <li>Ten (10) days mandatory posting period will commence on the day requirements are submitted</li>
        </p>
    </div>
</div>


<div class="sub-section" data-subtarget="correction-of-clerical-error-in-date-of-birth-sex-month-in-the-in-the-date-of-birth-internal-&-external-service">
    <h4>Correction of Clerical Error in the Date of Birth, Sex, Month, in the Date of Birth (Internal & External Service)</h4>
    <div class="sub-content">
        <p>
            <strong>Republic Act No. 10172</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical errors in the day and month in the date of birth or sex of a person appearing in the civil register without a need of a judicial order while Republic Act No. 9048 is an act further authorizing the City or Municipal Civil Registrar or the Consul General to change a name or nickname in the civil register without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
        </p><br>

        <h4>Who May File the Petition?</h4>
        <ul style="padding-left: 40px;">
            <li>Owner of the record that contains the error to be changed or corrected.</li>
            <li>
                Owner's spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected; provided, however, that when a person is a minor or physically or mentally incapacitated, the petition may be filed by his/her spouse, or any of his/her children, parents, brothers, sisters, grandparents, guardians or persons duly authorized by law.
            </li>
            <li>For correction of clerical error in sex: the petitioner affected by such error shall personally file the petition.</li>
        </ul><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries.</li>
            <li>Baptismal Certificate.</li>
            <li>Earliest School Record (Form-137).</li>
            <li>Previous Medical Record.</li>
            <li>Other documents showing date of birth.</li>
            <li>
                Certification of no civil, criminal, and administrative records from:
                <ul style="padding-left: 40px;">
                    <li>Employer; Affidavit of Non-Employment (if unemployed).</li>
                    <li>Police Clearance.</li>
                    <li>NBI Clearance.</li>
                </ul>
            </li>
            <li>Sex Change Certification from Public Health Office that the document owner did not undergo sex change.</li>
            <li>Affidavit of Publication.</li>
            <li>Community Tax Certificate.</li>
            <li>DSWD Certification of Minor (if minor).</li>
        </ul><br>

        <h4>Fees:</h4>
        <ul style="padding-left: 40px;">
            <p>₱3,000.00 – Filing Fee</p>
            <p>₱150.00 – Posting Fee</p>
            <p>₱200.00 – Certificate of Finality</p>
            <p>₱1,000.00 – Migrant Fee</p>
            <p>Other expenses: Courier & Notary</p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="change-of-first-name(cfn)-under-ra9048">
    <h4>Change of First Name (CFN) Under R.A. 9048 </h4>
    <div class="sub-content">
        <p><strong>From</strong> _______________ <strong>to</strong> _______________</p><br>

        <h3>Requirements:</h3>
        <ul style="padding-left: 40px;">
        <ol>
            <li>Birth Certificate – from PSA</li>
            <li>Baptismal Certificate</li>
            <li>School Records</li>
            <li>Voters Registration</li>
            <li>Marriage Contract (if married)</li>
            <li>Valid ID’s</li>
            <li>Clearances:</li>
            <ul style="padding-left: 20px;">
                <li>a. <strong>If EMPLOYED</strong> - Certification of Employment indicating <em>NO CIVIL, ADMINISTRATIVE AND CRIMINAL RECORDS</em></li>
                <li><strong>IF NOT EMPLOYED</strong> – Affidavit of Non-Employment and No Pending Case</li>
                <li>b. P.N.P. Clearance – new</li>
                <li>c. N.B.I. Clearance – new</li>
            </ul>
            <li>Affidavit of Publication</li>
            <li>Community Tax Certificate</li>
            <li>* <strong>CSWD Certification of Minor</strong> (For minor document owner)</li>
            <li>* <strong>Special Power of Attorney</strong></li>
        </ol>
        </ul><br>

        <h3>Additional Requirements:</h3>
        <ul style="padding-left: 40px;">
            <li>3 photo copies of all the documents listed above</li>
            <li>1 folder – long</li>
            <li>1 plastic envelope – long</li>
        </ul><br>

        <h3>Fees:</h3>
        <ul style="padding-left: 40px;">
            <p><strong>Filing Fee:</strong> P 3,000</p>
            <p><strong>Posting Fee:</strong> P 150</p>
            <p><strong>Certificate of Finality:</strong> P 200</p>
            <p><strong>Publication:</strong></p>
            <p><strong>Courier/Notary:</strong></p>
        <h3>MIGRANT PETITION</h3>
            <p><strong>Filing Fee:</strong> P 1,000</p>
            <p><strong>Posting Fee:</strong> P 150</p>
            <p><strong>Courier:</strong></p><br>
        </ul>
            <p><strong>(NO INTERVIEW / FILING EVERY FRIDAY)</strong></p>
        </div>
    </div>




    <div class="sub-section" data-subtarget="correction-of-clerical-error-RA10172">
        <h4>Correction of Clerical Error R.A. 10172 </h4>
        <div class="sub-content">
            <table>
                <tr>
                    <td><strong>Error:</strong></td>
                    <td>____________</td>
                    <td><strong>to</strong></td>
                    <td>____________</td>
                </tr>
                <tr>
                    <td></td>
                    <td>____________</td>
                    <td><strong>to</strong></td>
                    <td>____________</td>
                </tr>
                <tr>
                    <td></td>
                    <td>____________</td>
                    <td><strong>to</strong></td>
                    <td>____________</td>
                </tr>
            </table><br>
   
            <h3>Requirements:</h3>
            <ul style="padding-left: 40px;">
            <ol>
                <li>Birth Certificate – PSA / CCRO Copy</li>
                <li>Baptismal Certificate</li>
                <li>Earliest School Record – Elem. Form 137</li>
                <li>Medical Records – (previous)</li>
                <li>Other documents showing correct date of Birth</li>
                <li>Clearances:</li>
                <ul style="padding-left: 40px;">
                    <li>a. <strong>If EMPLOYED</strong> - Latest Certificate of Employment indicating <em>NO CIVIL, ADMINISTRATIVE AND CRIMINAL RECORDS</em></li>
                    <li><strong>IF NOT EMPLOYED</strong> – Affidavit of Non-Employment and No Pending Case</li>
                    <li>b. Police Clearance – new</li>
                    <li>c. N.B.I. Clearance – new</li>
                </ul>
                <li>Sex change Certification from Public Health Office that the document owner did not undergo sex change</li>
                <li>Affidavit of Publication</li>
                <li>Community Tax Certificate and Valid ID - <strong>petitioner</strong></li>
                <li>* <strong>DSWD – Certification of Minor</strong> (of minor)</li>
            </ol>
            </ul><br>
   
            <h3>Additional Requirements:</h3>
            <ul style="padding-left: 40px;">
                <li>3 photo copies of all the documents listed above</li>
                <li>1 folder – long</li>
                <li>1 plastic envelope – long</li>
            </ul><br>
   
            <h3>Fees:</h3>
            <ul style="padding-left: 20px;">
            <p><strong>Filing Fee:</strong> P 3,000</p>
            <p><strong>Posting Fee:</strong> P 150</p>
            <p><strong>Certificate of Finality:</strong> P 200</p>
            <p><strong>Publication:</strong></p>
            <p><strong>Courier:</strong></p><br>
   
            <h3><em>MIGRANT PETITION</em></h3>
            <p><strong>Filing Fee:</strong> P 1,000</p>
            <p><strong>Posting Fee:</strong> P 150</p>
            <p><strong>Courier:</strong></p>
            </ul>
   
            <p><strong>(NO INTERVIEW/FILING EVERY FRIDAY)</strong></p>    
         </div>
  </div>
   





<div class="sub-section" data-subtarget="issuance-of-certified-photocopy-/certification-of-birth-death-and-marriage-certificate">
    <h4>Issuance of Certified Photocopy / Certification of Birth, Death, and Marriage Certificate</h4>
    <div class="sub-content">
        <p><Strong>A CERTIFIED TRUE COPY</Strong> is a photocopy of the registered civil registry document in this City signed by the City Civil Registrar or his designed officer to certify that the copy is a true copy of the registered document kept this Office.</p><br>
        <h4>Who May Avail the Service:</h4>
        <ul style="padding-left: 40px;">
            <li>The owner himself or through a duly authorized representative;</li>
            <li>His/her spouse, parent, direct descendants, guardian, or institution legally in charge of him/her, if minor;</li>
            <li>The court or proper public official whenever absolutely necessary in administrative, judicial, or other official proceedings to determine the identity of a person;</li>
            <li>In case of the person’s death, the nearest of kin</li>
        </ul><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>Any Government-issued Identification Card (ID)</li>
            <li>If the child is a minor, his parents, guardian, or the institution legally in charge of him, as the case may be, shall issue the authorization required.;</li>
            <li>Photocopy of the one giving the authorization with 3 fresh signatures and the grantee is also required.</li>
            <li>Affidavit of kinship, as needed</li>
        </ul><br>

        <h4>Fees:</h4>
        <ul style="padding-left: 40px;">
            <p>₱35.00 each Certified True Copy of document.</p>
            <p>₱50.00 per Certification of document.</p>
        </ul>
    </div>
</div>


<div class="sub-section" data-subtarget="issuance-of-security-paper-breqs">
    <h4>Issuance of Security Paper (BREQS)</h4>
    <div class="sub-content">
        <p>
            Copy of Birth, Marriage, or Death Certificates from Philippine Statistics Authority is printed on a SECURITY PAPER.
        </p><br>

        <h4>Who May Avail the Service:</h4>
        <ul style="padding-left: 40px;">
            <li>The owner himself or through a duly authorized representative;</li>
            <li>His/her spouse, parent, direct descendants, guardian, or institution legally in charge of him/her, if minor;</li>
            <li>The court or proper public official whenever absolutely necessary in administrative, judicial, or other official proceedings to determine the identity of a person.</li>
            <li>In case of the person’s death, the nearest of kin.</li>
        </ul><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>Any Government issued Identification Card (ID).</li>
            <li>If the child is a minor, his parents, guardian, or the institution legally in charge of him, as the case may be, shall issue the authorization required.</li>
            <li>Photocopy of the one giving the authorization with 3 fresh signatures, and the grantee is also required.</li>
            <li>Affidavit of kinship, as needed.</li>
        </ul><br>

        <h4>Fees:</h4>
        <ul style="padding-left: 30px;">
            <p>₱255.00 per copy of Certificate of Live Birth, Certificate of Death, & Certificate of Marriage.</p>
            <p>₱310.00 per copy of Certificate of No Marriage (CENOMAR).</p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="authority-to-use-the-surname-of the-father">
    <h4>Authority to Use the Surname of the Father (RA 9255)</h4>
    <div class="sub-content">
        <p>
            <strong>AFFIDAVIT TO USE THE SURNAME OF FATHER</strong> shall be registered in the Register of Legal Instruments of the Civil Registry Office where the birth of the child was recorded. This process allows children born out of wedlock to use the surname of their father. This only applies to children born on March 19, 2004 onwards.
        </p><br>

        <h4>Who May Avail This Service:</h4>
        <ul style="padding-left: 40px;">
            <li>Children born on March 19, 2004 onwards.</li>
        </ul><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>Latest Certified Copy of Birth Certificate of the Child. Include dorsal page if signed by father.</li>
            <li>If not, Affidavit of Acknowledgment/Admission of Paternity is needed.</li>
            <li>Affidavit to Use the Surname of Father:  
            <li><strong>0 - 6 yrs. old</strong> – AUSF to be executed by the mother or the guardian, in the absence of the mother.</li>
            <li><strong>7 - 17 yrs. old</strong> – AUSF to be executed by the child & sworn attestation executed by the mother or the guardian.</li>
            <li><strong>18 yrs. and above</strong> – AUSF to be executed by the child without need of attestation.</li>
            <li>Valid ID of Father and Mother (Original and Photocopy).</li>
            <li>Original and Photocopy of Baptismal Certificate.</li>
            <li>Original School Records showing the names of parents (Must be Certified True Copy).</li>
            <li>If mother is deceased, submit Certified Copy of Death Certificate (Latest Copy).</li><br>
            <li><Strong>If Filiation has not been expressly recognized by the father, submit any two (2) of the following documents showing clearly the paternity between the father and the child:</Strong>
                <ul style="padding-left: 40px;">
                    <li>Employment Records</li>
                    <li>SSS/GSIS Records</li>
                    <li>Insurance</li>
                    <li>Certification of Membership in any Organization</li>
                    <li>Statement of Assets and Liabilities</li>
                    <li>Income Tax Return (ITR)</li>
                </ul>
            </li>
        </ul><br>

        <h4>Fees:</h4>
        <ul>
            <p>₱200.00 – Affidavit to Use the Surname of Father</p>
            <p>₱300.00 – Acknowledgement of Paternity</p>
            <p>₱200.00 – Endorsement</p>
            <p>₱35.00 – Certified True Copy of every supporting document</p>
        </ul><br>

        <h4>Note:</h4>
        <ul>
            <p>All public documents executed abroad shall be registered with the Civil Registry Office of Manila.</p>
            <p>All Affidavit shall be registered within 20 days from the date of execution.</p>
            <p>All documents are subject for evaluation.</p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="legitimation">
    <h4>Legitimation (RA 9858)</h4>
    <div class="sub-content">
        <p>
            <strong>Legitimation by Subsequent Marriage of Parents</strong> shall be registered in the Register of Legal Instruments of the Civil Registry Office where the birth of the child was recorded. Only children conceived and born outside of wedlock of parents, who, at the time of the conception of the former, were not disqualified by any impediment to marry each other, may be legitimated.
        </p><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>Latest Local Certified True Copy of Birth Certificate of the Child.</li>
            <li>Latest Copy of Marriage Contract of Parents.
            <li>If issued in San Jose del Monte, Certified True Copy Only.</li>
            <li>If issued outside San Jose del Monte, PSA/NSO Copy Only.</li>  
            <li>Latest Copy of Certificate of No Marriage of both parents from PSA (CENOMAR).</li>
            <li>Original Baptismal Certificate of the Child.</li> <br>

            <li><Strong>If the surname of the father does not appear at the birth certificate of the child, submit at least two (2) supporting documents from the following: </Strong>
             
                    <li>SSS Form E-1 or E-4 of the father where the child is declared as beneficiary.</li>
                    <li>GSIS of the father where the child is declared as beneficiary.</li>
                    <li>Income Tax Return (ITR) of the father where the child is declared as beneficiary.</li>
                    <li>Philhealth of the father where the child is declared as beneficiary.</li>
                    <li>Insurance of parents where the child is declared as beneficiary.</li>
                    <li>Original Copy of Report Card (F-138) & Certified True Copy of School Record (F-137) of the child wherein the name of the father is declared and signature of the father is affix at the card.</li>
                    <li>Statement of Assets and Liabilities.</li>  <br>
           
            <li><Strong>If mother is deceased,</Strong> submit the Latest Certified True Copy of Death Certificate.</li>
            <li><Strong>If the father is deceased,</Strong> AUTHENTIC WRITING WILL BE NEEDED. SUBMIT THE FOLLOWING DOCUMENTS LISTED AT NO.5 or any other records that will prove the filiation of the child or documents showing the father has acknowledged the child.</li>
            <li>Submit photocopy of the Valid ID and Cedula of Parents.</li>
            <li>Affidavit of Acknowledgment/Admission of Paternity.</li>
            <li>Joint Affidavit of Legitimation (if one of the parents is in a foreign country, secure Affidavit of Legitimation from the Philippine Consulate in the country where he/she is located. The said affidavit should be signed by the Consul General and red ribbon).</li>
            <li>Joint Supplemental Affidavit (if either of the parent is a minor at time of conception).</li> <br>
       

        <h4>Fees:</h4>
        <ul style="padding-left: 20px;">
            <p>₱300.00 – Acknowledgement of Paternity</p>
            <p>₱300.00 – Legitimation</p>
            <p>₱200.00 – Endorsement</p>
            <p>₱35.00 – Certified True Copy of every supporting document</p>
        </ul><br>

        <h4>Note:</h4>
        <ul style="padding-left: 20px;">
            <p><Strong>ALL PUBLIC DOCUMENTS EXECUTED ABROAD SHALL BE REGISTERED WITH THE CIVIL REGISTRY OFFICE OF MANILA.</Strong></p>
            <p><Strong>ALL AFFIDAVIT BE REGISTERED WITHIN 20 DAYS FROM THE DATE OF EXECUTION.</Strong></p>
            <p><Strong>ALL DOCUMENTS ARE SUBJECT FOR EVALUATION</Strong></p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="supplemental-report">
    <h4>Supplemental Report</h4>
    <div class="sub-content">
        <p>
            <strong>A Supplemental Report</strong> may be filed to supply information inadvertently omitted when the document is registered. It shall not be used in any manner to change or to correct any entry which was previously entered in the civil register. The Civil Registrar shall accept only one supplemental report for not more than two omitted information in any registered event.
         </p><br>

         <h4>Who May File the Petition?</h4>
         
             <p>
                 The supplemental report may be filed by the parent/guardian or the party concerned, if of age, who shall execute an affidavit indicating the entry/entries missed in the registration and the reasons why there was a failure in supplying the required entry.
             </p> <br>
       

         <h4>Requirements:</h4>
         <ul style="padding-left: 40px;">
             <li>PSA Copy of the certificate containing the omitted entry or entries.</li>
             <li>Not less than two (2) public or private documents upon which the omitted entry/entries shall be based:
                     <li>Baptismal Certificate</li>
                     <li>Voter’s Affidavit</li>
                     <li>Employment Record</li>
                     <li>GSIS/SSS Record</li>
                     <li>Medical Record</li>
                     <li>School Record</li>
                     <li>Business Record</li>
                     <li>Driver’s License</li>
                     <li>Insurance</li>
                     <li>Land Titles</li>
                     <li>Certificate of Land Transfer</li>
                     <li>Bank Passbook</li>
                     <li>NBI/Police Clearance</li>
                     <li>Civil Registry Records of Ascendants and Others</li>
                     <li>If Gender is omitted, request for certification from hospital is needed.</li>
                     <li>Affidavit for Supplemental Report</li>
             </ul><br>
             </li>
         <h4>Fees:</h4>
         <ul style="padding-left: 40px;">
             <p>₱300.00 – Supplemental Report</p>
             <p>₱200.00 – Endorsement</p>
             <p>₱35.00 – Certified True Copy of every supporting document</p>
         </ul><br>
    </div>
</div>
</div>








        <!-- Marriage Certificate -->
        <div id="marriage-certificate" class="content-section">
            <h2>Marriage Certificate</h2>
            <p>Select a category to view details:</p>
            <div class="sub-section" data-subtarget="timely-registration-of-marriage">
                <h4>Timely Registration of Marriage</h4>
            <div class="sub-content">
                <p>
                    The time for submission of the <strong>CERTIFICATE OF MARRIAGE</strong> is within fifteen (15) days following the solemnization of marriage while in marriage exempt from license requirement, the prescribed period is thirty (30) days at the place where the marriage was solemnized.
                </p><br>
            <h4>Requirements:</h4>
            <ul style="padding-left: 40px;">
                <li>Four (4) copies of Form 97 duly accomplished and signed by the proper parties.</li>
            </ul>
        </div>
   </div>



       
   <div class="sub-section" data-subtarget="requirements-for-late-registration-of-marriage-certificate">
    <h4>Requirements for Late Registration of Marriage Certificate</h4>
    <div class="sub-content">
        <ul style="padding-left: 40px;">
            <p><Strong>1.</Strong> Latest copy of Certificate of No Record from PSA and City of San Jose Del Monte, Bulacan</p>
            <p><Strong>2.</Strong> Latest copy of Certificate of No Marriage (CENOMAR) from PSA (for both parties)</p>
            <p><Strong>3.</Strong> Original or Duplicate Copy of Old Marriage Certificate with Signatures</p>
            <p><Strong>4.</Strong> If not available, certification from the church or Solemnizing Officer indicating date of said marriage based on their record or logbook </p>
            <p><Strong>5.</Strong> Affidavit of delayed registration which shall be executed by the solemnizing officer stating therein the exact place and date of marriage, the facts and circumstances surrounding the marriage, and the reason or cause of delay</p>
            <p><Strong>6.</Strong> If the solemnizing officer is deceased and no longer available, certification from PSA re: Authority to solemnize Marriage (CRASM) </p>
            <p><Strong>7.</Strong> Affidavit of Contracting Parties indicating the reason or cause of delay with VALID ID</p>
            <p><Strong>8.</Strong> Affidavit of delayed registration executed by 2 witnesses stating therein the exact place and date of marriage, the facts and circumstances surrounding the marriage, and the reason or cause of delay WITH VALID ID</p>
            <p><Strong>9.</Strong> Certified copy of Application for Marriage License bearing the date when the marriage license was issued, if applicable </p>
            <p><Strong>10.</Strong> Certified Copy of Birth Certificate of children with date and place of marriage of parents</p>
            <p><Strong>11.</Strong> If marriage outside of Church, letter of request to solemnize Marriage outside of Church (notarized)</p>
            <p><Strong>12.</Strong> Follow the information indicated in the old copy of marriage certificate in accomplishing the new form</p>
        </ul>

        <h4>Reminders:</h4>
        <ul style="padding-left: 40px;">
            <li>Don’t submit <strong>“FAKE DOCUMENTS”</strong> to avoid penalty. All supporting documents are subject for <strong>VERIFICATION</strong>.</li>
            <li>All Birth Certificates for submission must be certified photocopy.</li>
            <li>All supporting documents submitted must be original copy.</li>
            <li>
                Accomplished correctly and completely the four (4) copies of the Certificate of Marriage. Avoid erasures and alterations.
            </li>
            <li>Please complete all needed requirements before submission.</li>
            <li>Ten (10) days mandatory posting period will commence on the day requirements are submitted.</li><br>
            <p><strong>Registration Fee: PHP 150.00</strong></p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="correction-of-clerical-error">
    <h4>Correction of Clerical Error</h4>
    <div class="sub-content">
        <p>
            <strong>Republic Act No. 9048</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical error in an entry and/or change of name or nickname in the civil register except corrections involving the change in sex, age, nationality and status of a person without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office (LCRO) where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
        </p><br>
        <h4>Who May Avail the Service:</h4>
        <ul style="padding-left: 40px;">
            <li>Owner of the record that contains the error to be changed or corrected</li>
            <li>Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected</li>
        </ul><br>
        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries</li>
            <li>Not less than 2 public or private documents upon which the correction shall be based:
                <ul style="padding-left: 40px;">
                    <li>Baptismal Certificate</li>
                    <li>Voter’s Affidavit</li>
                    <li>Employment Record</li>
                    <li>GSIS/SSS Record</li>
                    <li>Medical Record</li>
                    <li>School Record</li>
                    <li>Business Record</li>
                    <li>Driver’s License</li>
                    <li>Insurance</li>
                    <li>Land Titles</li>
                    <li>Certificate of Land Transfer</li>
                    <li>Bank Passbook</li>
                    <li>NBI/Police Clearance</li>
                    <li>Civil Registry Records of Ascendants and Others</li>
                </ul>
            </li>
        </ul><br>
        <h4>Fees:</h4>
        <ul style="padding-left: 40px;">
            <p>₱1,000.00 – Filing Fee</p>
            <p>₱150.00 – Posting Fee</p>
            <p>₱200.00 – Certificate of Finality</p>
            <p>₱500.00 – Migrant Fee</p>
            <p>Other expenses: Courier & Notary</p>
        </ul><br>
        <ul>
            <p>
                <li>Don't submit<Strong> FAKE DOCUMENTS</Strong> to avoid penalty. All supporting documents are subject for<Strong> VERIFICATION and FURTHER EVALUATION</Strong></li>
                <li>Complete the needed requirements before submission</li>
                <li>Ten (10) days mandatory posting period will commence on the day requirements are submitted</li>
            </p>
        </ul>
    </div>
</div>




     
<div class="sub-section" data-subtarget="issuance-of-certified-photocopy/-certification-of-marriage-certificate">
    <h4>Issuance of Certfied Photocopy / Certification of Marriage Certificate</h4>
    <div class="sub-content">
        <p><Strong>A CERTIFIED TRUE COPY</Strong> is a photocopy of the registered civil registry document in this City signed by the City Civil Registrar or his designed officer to certify that the copy is a true copy of the registered document kept this Office.</p><br>
        <h4>Who May Avail the Service:</h4>
        <ul style="padding-left: 40px;">
            <li>The owner himself or through a duly authorized representative;</li>
            <li>His/her spouse, parent, direct descendants, guardian, or institution legally in charge of him/her, if minor;</li>
            <li>The court or proper public official whenever absolutely necessary in administrative, judicial, or other official proceedings to determine the identity of a person;</li>
            <li>In case of the person’s death, the nearest of kin</li>
        </ul><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>Any Government-issued Identification Card (ID)</li>
            <li>If the child is a minor, his parents, guardian, or the institution legally in charge of him, as the case may be, shall issue the authorization required.;</li>
            <li>Photocopy of the one giving the authorization with 3 fresh signatures and the grantee is also required.</li>
            <li>Affidavit of kinship, as needed</li>
        </ul><br>

        <h4>Fees:</h4>
        <ul style="padding-left: 40px;">
            <p>₱35.00 each Certified True Copy of document.</p>
            <p>₱50.00 per Certification of document.</p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="issuance-of-security-paper-(BREQS)">
    <h4>Issuance of Security Paper (BREQS)</h4>
    <div class="sub-content">
        <p>
            Copy of Birth, Marriage, or Death Certificates from Philippine Statistics Authority is printed on a SECURITY PAPER.
        </p><br>
        <h4>Who May Avail the Service:</h4>
        <ul style="padding-left: 40px;">
            <li>The owner himself or through a duly authorized representative;</li>
            <li>His/her spouse, parent, direct descendants, guardian, or institution legally in charge of him/her, if minor;</li>
            <li>The court or proper public official whenever absolutely necessary in administrative, judicial, or other official proceedings to determine the identity of a person.</li>
            <li>In case of the person’s death, the nearest of kin.</li>
        </ul><br>

        <h4>Requirements:</h4>
        <ul style="padding-left: 40px;">
            <li>Any Government issued Identification Card (ID).</li>
            <li>If the child is a minor, his parents, guardian, or the institution legally in charge of him, as the case may be, shall issue the authorization required.</li>
            <li>Photocopy of the one giving the authorization with 3 fresh signatures, and the grantee is also required.</li>
            <li>Affidavit of kinship, as needed.</li>
        </ul><br>

        <h4>Fees:</h4>
        <ul style="padding-left: 40px;">
            <p>₱255.00 per copy of Certificate of Live Birth, Certificate of Death, & Certificate of Marriage.</p>
            <p>₱310.00 per copy of Certificate of No Marriage (CENOMAR).</p>
        </ul>
    </div>
</div>



<div class="sub-section" data-subtarget="supplemental-report">
    <h4>Supplemental Report</h4>
    <div class="sub-content">
        <p>
            <strong>A Supplemental Report</strong> may be filed to supply information inadvertently omitted when the document is registered. It shall not be used in any manner to change or to correct any entry which was previously entered in the civil register. The Civil Registrar shall accept only one supplemental report for not more than two omitted information in any registered event.
         </p><br>

         <h4>Who May File the Petition?</h4>
         <ul style="padding-left: 40px;">
             <li>
                 The supplemental report may be filed by the parent/guardian or the party concerned, if of age, who shall execute an affidavit indicating the entry/entries missed in the registration and the reasons why there was a failure in supplying the required entry.
             </li>
         </ul><br>

         <h4>Requirements:</h4>
         <ul style="padding-left: 40px;">
             <li>PSA Copy of the certificate containing the omitted entry or entries.</li>
             <li>Not less than two (2) public or private documents upon which the omitted entry/entries shall be based:
                <ul style="padding-left: 40px;">
                     <li>Baptismal Certificate</li>
                     <li>Voter’s Affidavit</li>
                     <li>Employment Record</li>
                     <li>GSIS/SSS Record</li>
                     <li>Medical Record</li>
                     <li>School Record</li>
                     <li>Business Record</li>
                     <li>Driver’s License</li>
                     <li>Insurance</li>
                     <li>Land Titles</li>
                     <li>Certificate of Land Transfer</li>
                     <li>Bank Passbook</li>
                     <li>NBI/Police Clearance</li>
                     <li>Civil Registry Records of Ascendants and Others</li>
                 </ul>
             </li>
             <li>If Gender is omitted, request for certification from hospital is needed.</li>
             <li>Affidavit for Supplemental Report</li>
         </ul><br>
                <h4>Fees:</h4>
                <ul style="padding-left: 20px;">
                    <p>₱300.00 – Supplemental Report</p>
                    <p>₱200.00 – Endorsement</p>
                    <p>₱35.00 – Certified True Copy of every supporting document</p>
                </ul>
            </div>
        </div>
  </div>








        <!-- Marriage License -->
        <div id="marriage-license" class="content-section">
            <h2>Marriage License</h2>
            <div class="sub-section" data-subtarget="requirements-for-application-of-marriage-license">
                <h4>Requirements for Application of Marriage License</h4>
                <div class="sub-content">
                    <p><strong>(Personal Appearance of the contracting parties / should be 18 years old and above)</strong></p><br>
                    <h4>Requirements:</h4>
                    <ul style="padding-left: 40px;">
                        <li>PSA original Copy of Certificate of Live Birth
                            <ul style="padding-left: 40px;">
                                <li>*If No Record of Birth - Latest Original Copy of Baptismal/MDR (Philhealth)/MDF(Pag-ibig)/E1 Form (SSS)</li>
                            </ul>
                        </li>
                        <li>PSA Original Copy of Certificate of No Marriage (6 months validity/CENOMAR)</li>
                        <li>Valid ID’s with Address in City of San Jose del Monte, Bulacan  – (<Strong>at least one of the applicant</Strong>- present the original & 2 photocopies with 3 affixed signature) </li>
                        <li>Certificate of Pre-Marriage Orientation (PMO) & Marriage Counselling <Strong>(City Population Office - located at 2nd floor, New Government Center)</Strong></li>
                        <li>Latest ID Picture (Passport size- white backgound)</li>
                    </ul><br>
                    <h4>Applicants between 18 and below 21 years old:</h4>
                    <ul style="padding-left: 40px;">
                        <li>
                            <strong>Parental Consent</strong> – Parents (Father and Mother or Guardian in the order mentioned) need to come personally with valid ID. If mother or father is already dead, please provide a copy of Death Certificate. (PSA Copy and 2 pcs Photocopy)
                        </li>
                        <li>*Parental consent provided for under Art. 14 of the Family Code of the Philippines</li>
                    </ul><br>
           
                    <h4>Applicants between 21 and below 25 years old:</h4>
                    <ul style="padding-left: 40px;">
                        <li>
                            <strong>Parental Advice</strong> – Parents (Father and Mother or Guardian in the order mentioned) need to come personally with valid ID. If mother and father is already dead, please provide a copy of Death Certificate (PSA Copy and 2 photocopies).
                        </li>
                        <li>
                            *Parental Advice – If not obtained or unfavorable, Marriage License shall not be issued until after 3 months following the completion of the publication of the application. A sworn statement of the contracting parties must likewise be submitted indicating therein that the parents refuse to give advice.
                        </li>
                    </ul><br>
           
                    <h4>Foreigner or Former Filipino Citizen but now is Naturalized Citizen of other country:</h4>
                    <ul style="padding-left: 40px;">
                        <li>Certificate of Legal Capacity to Marry <Strong>issued by their respective Embassy here in the Philippines</Strong> (translate if in non-English content)</li>
                        <li>Passport ID – Original & 2 photocopies with 3 affixed signature (showing data and date of arrival)</li>
                        <li>PSA Copy of Certificate of No Marriage (CENOMAR)</li>
                        <li>Certificate of Pre-Marriage Orientation -PMO (City Population Office)</li>
                        <li>If applicant is naturalized citizen, Naturalized papers / Election of Citizenship (present the original copy and 2 photocopies)</li>
                    </ul><br>
           
                    <h4>Additional Document Needed:</h4>
                    <p><strong>FOR WIDOW/WIDOWER:</strong></p>
                    <ul style="padding-left: 40px;">
                        <li>PSA Copy of Death Certificate of deceased spouse</li>
                        <li>PSA Copy of Marriage Certificate</li>
                        <li>PSA Copy of CENOMAR / Having Advisory of Marriage</li>
                    </ul><br>
           
                    <p><strong>FOR ANNULLED:</strong></p>
                    <ul style="padding-left: 40px;">
                        <li>Decree of Annulment / Decree of Nullity of Marriage certified by the court</li>
                        <li>Court Decision and Annotated COM PSA Copy</li>
                    </ul>>br>
           
                    <p><strong>FOR JUDICIAL DECLARATION PRESSUMPTIVE DEATH:</strong></p>
                    <ul style="padding-left: 40px;">
                        <li>Court Decision</li>
                        <li>Annotated COM -PSA Copy</li>
                    </ul><br>
           
                    <p><strong>FOR DIVORCED/DIVORCEE (Foreigner / Non-Filipino Citizen):</strong></p>
                    <ul style="padding-left: 40px;">
                        <li>Divorce decree (translate if in non-English content)</li>
                        <li>Court Decision (translate in non-English content)</li>
                        <li>Annotated COM PSA Copy</li>
                    </ul><br>
           
                    <p><strong>FOR DIVORCE granted by Foreign Courts to Filipino abroad ( marriage took place here in the Phil.)</strong></p>
                    <ul style="padding-left: 40px;">
                        <li>Divorce decree issued by a foreign court </li>
                        <li>Judicial Recognition of Divorce obtained from the Philippine Court</li>
                        <li>Annotated COM-PSA Copy</li>
                    </ul><br>
           
                    <p><strong>FOR DIVORCE Granted to MUSLIM Filipino:</strong></p>
                    <ul style="padding-left: 40px;">
                        <li>Sharia’h Court (PD 1083)</li>
                        <li>Divorce decree 3 copies</li>
                        <li>Court Decision certified by the Sharia’h Court and Annotated COM PSA Copy</li>
                    </ul><br>
           
                    <h4>Notes:</h4>
                    <ul style="padding-left: 40px;">
                        <li>At least one of the applicant must be a resident of the place where they will apply for marriage license.</li>
                        <li>All requirements must be submitted upon application. Present all original copy, after assessment/evaluation <Strong>submit 2 photocopies of each requirement.</Strong></li>
                        <li>The marriage license will be issue on the <Strong>11th day</Strong> after the <Strong>10-day posting period</Strong> upon submission of the application for marriage license. <Strong>License expires 120 days</Strong> from the date licensed was issued.</li>
                    </ul><br>
           
                    <h4>For added guidance & information please follow the following steps:</h4>
                    <ul style="padding-left: 40px;">
                        <li>Comply all applicable requirements as stated above and proper fill out Application for Marriage License Form.</li>
                        <li>Attend Pre-Marriage Orientation at City Population Office.</li>
                        <li>Submit personally the complete requirement to the City Civil Registry Office and pay the corresponding fee (₱250.00 at the City Treasurer’s Office).</li>
                        <li>Wait for 10-days posting period (Notice of Application).</li>
                        <li>Claim the Marriage License presenting the issued Claim Stub after the completion of 10-day posting period and payment of License Fee (₱2.00).</li>
                        <li>Please check/review all entries to avoid errors and bring the Marriage License to your Solemnizing Officer for the scheduled wedding ceremony.</li>
                    </ul>
                </div>
            </div>
        </div>







        <!-- Death Certificate -->
        <div id="death-certificate" class="content-section">
            <h2>Death Certificate</h2>
            <p>Select a category to view details:</p>
            <div class="sub-section" data-subtarget="timely-registration-of-death">
                <h4>Timely Registration of Death</h4>
                <div class="sub-content">
             <p>
                 <strong>REGISTRATION OF DEATH CERTIFICATE</strong> shall be made in the Office of the Civil Registrar of the city/municipality where it occurred within thirty (30) days from the time of death.
             </p><br>
             <h4>Requirements:</h4>
             <ul style="padding-left: 40px;">
                 <li>Four (4) copies of Form 103 duly accomplished and signed by the proper parties.</li>
             </ul>
         </div>                
     </div>



        <div class="sub-section" data-subtarget="delayed-registration-of-death">
            <h4>Delayed Registration of Death</h4>
            <div class="sub-content">
                <h4>Requirements:</h4>
                <ul style="padding-left: 40px;">
                    <li>Original Death Certificate prepared by Hospital or Funeral Parlor</li>
                    <li>Latest Copy of Certificate of No Record from PSA (NSO) and CCR of City of San Jose del Monte</li>
                    <li>
                        Affidavit of the nearest relative of the deceased or any person having legal charge of the deceased when he/she was still alive stating therein the exact date and place of death, the facts and circumstances surrounding the death and the reason or cause of delay
                    </li>
                    <li>Original Copy of the Certificate of Burial, Cremation or other means of corpse disposal</li>
                    <li>Certificate from the Funeral Parlor and Cemetery</li>
                    <li>Joint Affidavit of two Disinterested Persons</li>
                    <li>For Muslim Registrants, fill-up Municipal Form No. 103</li>
                </ul><br>
                <h4>Fees:</h4>
                <ul style="padding-left: 40px;">
                    <li>₱150.00 – Delayed Registration of Death</li>
                </ul><br>
                <p>
                    <li>Don't submit<Strong> FAKE DOCUMENTS</Strong> to avoid penalty. All supporting documents are subject for<Strong> VERIFICATION</Strong></li>
                    <li>All supporting documents submitted must be original copy</li>
                    <li>Please avoid erasures and alterations in the preparation of the Death Certificate</li>
                    <li>Please Complete all the needed requirements before submission</li>
                    <li>Ten (10) days posting period. Will commence on the day when requirements was submitted</li>
                </p>    
            </div>                
        </div>



        <div class="sub-section" data-subtarget="correction-of-clerical-error">
            <h4>Correction of Clerical Error</h4>
            <div class="sub-content">
                 <p>
                    <strong>Republic Act No. 9048</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical error in an entry and/or change of name or nickname in the civil register except corrections involving the change in sex, age, nationality and status of a person without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office (LCRO) where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
                </p><br>
                <h4>Who May Avail the Service:</h4>
                <ul style="padding-left: 40px;">
                    <li>Owner of the record that contains the error to be changed or corrected</li>
                    <li>Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected</li>
                </ul><br>
                <h4>Requirements:</h4>
                <ul style="padding-left: 40px;">
                    <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries</li>
                    <li>Not less than 2 public or private documents upon which the correction shall be based:
                        <ul style="padding-left: 40px;">
                            <li>Baptismal Certificate</li>
                            <li>Voter’s Affidavit</li>
                            <li>Employment Record</li>
                            <li>GSIS/SSS Record</li>
                            <li>Medical Record</li>
                            <li>School Record</li>
                            <li>Business Record</li>
                            <li>Driver’s License</li>
                            <li>Insurance</li>
                            <li>Land Titles</li>
                            <li>Certificate of Land Transfer</li>
                            <li>Bank Passbook</li>
                            <li>NBI/Police Clearance</li>
                            <li>Civil Registry Records of Ascendants and Others</li>
                        </ul>
                    </li>
                </ul><br>
                <h4>Fees:</h4>
                <ul style="padding-left: 40px;">
                    <p>₱1,000.00 – Filing Fee</p>
                    <p>₱150.00 – Posting Fee</p>
                    <p>₱200.00 – Certificate of Finality</p>
                    <p>₱500.00 – Migrant Fee</p>
                    <p>Other expenses: Courier & Notary</p>
                </ul>
            </div>                
        </div>



        <div class="sub-section" data-subtarget="issuance-of-certified-photocopy-/certification-of-death-certificate">
            <h4>Issuance of Certified Photocopy / Certification of Death Certificate</h4>
            <div class="sub-content">
                <p><Strong>A CERTIFIED TRUE COPY</Strong> is a photocopy of the registered civil registry document in this City signed by the City Civil Registrar or his designed officer to certify that the copy is a true copy of the registered document kept this Office.</p><br>
            <h4>Who May Avail the Service:</h4>
            <ul style="padding-left: 40px;">
                <li>The owner himself or through a duly authorized representative;</li>
                <li>His/her spouse, parent, direct descendants, guardian, or institution legally in charge of him/her, if minor;</li>
                <li>The court or proper public official whenever absolutely necessary in administrative, judicial, or other official proceedings to determine the identity of a person;</li>
                <li>In case of the person’s death, the nearest of kin</li>
            </ul><br>

            <h4>Requirements:</h4>
            <ul style="padding-left: 40px;">
                <li>Any Government-issued Identification Card (ID)</li>
                <li>If the child is a minor, his parents, guardian, or the institution legally in charge of him, as the case may be, shall issue the authorization required.;</li>
                <li>Photocopy of the one giving the authorization with 3 fresh signatures and the grantee is also required.</li>
                <li>Affidavit of kinship, as needed</li>
            </ul><br>

            <h4>Fees:</h4>
            <ul style="padding-left: 40px;">
                <p>₱35.00 each Certified True Copy of document.</p>
                <p>₱50.00 per Certification of document.</p>
            </ul>
        </div>                
     </div>



     <div class="sub-section" data-subtarget="supplemental-report">
        <h4>Supplemental Report</h4>
        <div class="sub-content">
            <p>
                <strong>A Supplemental Report</strong> may be filed to supply information inadvertently omitted when the document is registered. It shall not be used in any manner to change or to correct any entry which was previously entered in the civil register. The Civil Registrar shall accept only one supplemental report for not more than two omitted information in any registered event.
             </p><br>

             <h4>Who May File the Petition?</h4>
             <ul style="padding-left: 40px;">
                 <li>
                     The supplemental report may be filed by the parent/guardian or the party concerned, if of age, who shall execute an affidavit indicating the entry/entries missed in the registration and the reasons why there was a failure in supplying the required entry.
                 </li>
             </ul><br>

             <h4>Requirements:</h4>
             <ul style="padding-left: 40px;">
                 <li>PSA Copy of the certificate containing the omitted entry or entries.</li>
                 <li>Not less than two (2) public or private documents upon which the omitted entry/entries shall be based:
                    <ul style="padding-left: 40px;">
                         <li>Baptismal Certificate</li>
                         <li>Voter’s Affidavit</li>
                         <li>Employment Record</li>
                         <li>GSIS/SSS Record</li>
                         <li>Medical Record</li>
                         <li>School Record</li>
                         <li>Business Record</li>
                         <li>Driver’s License</li>
                         <li>Insurance</li>
                         <li>Land Titles</li>
                         <li>Certificate of Land Transfer</li>
                         <li>Bank Passbook</li>
                         <li>NBI/Police Clearance</li>
                         <li>Civil Registry Records of Ascendants and Others</li>
                     </ul>
                 </li>
                 <li>If Gender is omitted, request for certification from hospital is needed.</li>
                 <li>Affidavit for Supplemental Report</li>
             </ul><br>

             <h4>Fees:</h4>
             <ul style="padding-left: 20px;">
                 <p>₱300.00 – Supplemental Report</p>
                 <p>₱200.00 – Endorsement</p>
                 <p>₱35.00 – Certified True Copy of every supporting document</p>
             </ul>
        </div>                
    </div>
</div>







        <!-- Cenomar -->
        <div id="cenomar" class="content-section">
            <h2>Cenomar</h2>
            <div class="sub-section" data-subtarget="cenomar">
                <h4>Cenomar</h4>
                <div class="sub-content">
                <p><strong>Requirements:</strong></p><br>
                <ul style="padding-left: 20px;">
                    <li>Valid ID</li>
                <ul/>
          </div>
     </div>
 </div>






       <!--Other Document-->
        <div id="other-document" class="content-section">
            <h2>Other Document</h2>
            <p>Select a category to view details:</p>
         <div class="sub-section" data-subtarget="registration-of-court-orders-/decree-and-request-of-annotated-records">
            <h4>Registration of Court Orders / Decree and Request of Annotated Records</h4>
            <div class="sub-content">
                <h4>A. For Locally Originated Court Decree/Order</h4>
                <h4>Checklist of Requirements:</h4>
                <ul style="padding-left: 40px;">
                    <li>Certified Copy of the Decision/Order (3 copies)</li>
                    <li>Original Copy of the Certificate of Finality</li>
                    <li>Affidavit for Late Registration (if not registered within the prescribed period)</li>
                    <li>Original PSA copy of the document needing annotation/correction</li>
                    <li>Valid ID of Petitioner</li>
                    <li>SPA and Valid ID, if registrant is not the Petitioner</li>
                </ul><br>

                <h4>Where to Secure:</h4>
                <ul style="padding-left: 40px;">
                    <li>Regional Trial Court where the decision/order was rendered/issued</li>
                    <li>Notary Public</li>
                    <li>Philippine Statistics Authority (PSA)</li>
                    <li>Petitioner</li>
                </ul><br>

                <h4>Fees:</h4>
                <ul style="padding-left: 40px;">
                    <li>Adoption: ₱3,000</li>
                    <li>Annulment of Marriage: ₱3,000</li>
                    <li>Divorce or Legal Separation: ₱3,000</li>
                    <li>Other similar registrable instruments: ₱500</li>
                    <li>Certified True Copy of the Decree/Order: ₱35 each</li>
                    <li>Endorsement: ₱200</li>
                </ul><br>

                <h4>B. For Court Decree/Order Originated from Outside the City (2 copies each)</h4>
                <h4>Checklist of Requirements:</h4>
                <ul style="padding-left: 40px;">
                    <li>Certificate of Registration</li>
                    <li>Certificate of Authenticity</li>
                    <li>Certified Copy of Court Decree</li>
                    <li>Certified Copy of the Finality</li>
                    <li>Original PSA Copy of the document needing annotation/correction</li>
                    <li>Valid ID of Petitioner</li>
                    <li>SPA and Valid ID, if registrant is not the Petitioner</li>
                </ul><br>

                <h4>Where to Secure:</h4>
                <ul style="padding-left: 40px;">
                    <li>City/Municipality Civil Registry Office where the Court Decree was Registered</li>
                    <li>Philippine Statistics Authority (PSA)</li>
                    <li>Petitioner</li>
                </ul><br>

                <h4>Fees:</h4>
                <ul style="padding-left: 40px;">
                    <li>Clerical Error: ₱300</li>
                    <li>Adoption: ₱500</li>
                    <li>Annulment: ₱1,000</li>
                    <li>Others: ₱300</li>
                    <li>Certified True Copy of the Decree/Order: ₱35 each</li>
                    <li>Endorsement: ₱200</li>
                </ul><br>

                <h4>C. For Recognition of Foreign Judgment</h4>
                <h4>Checklist of Requirements:</h4>
                <ul style="padding-left: 40px;">
                    <li>Judgment/orders rendered by foreign courts must be judicially confirmed/enforced by a civil action at the Regional Trial Courts in the Philippines (RTC-Phil.)</li>
                    <li>The RTC-Phil decision must be registered in the Local Civil Registry Office of the city/municipality where the court is functioning</li>
                    <li>Original or Certified True Copy of the foreign judgment or order duly registered at the City Civil Registry Office of Manila (where all foreign court orders are to be registered)</li>
                    <li>Certificate of Registration</li>
                </ul><br>

                <h4>Where to Secure:</h4>
                <ul style="padding-left: 40px;">
                    <li>Regional Trial Court where the decision/order was rendered</li>
                    <li>City/Municipal Civil Registry Office</li>
                </ul><br>

                <h4>Fees:</h4>
                <ul style="padding-left: 40px;">
                    <p>₱1,000</p>
                    <p>Certified True Copy of the Decree/Order: ₱35 each</p>
                    <p>Endorsement: ₱200</p>
                </ul>
         </div>
     </div>


     <div class="sub-section" data-subtarget="acknowledgement-admission-of-paternity">
        <h4>Acknowledgement / Admission of Paternity</h4>
        <div class="sub-content">
            <p>
                The <strong>ACKNOWLEDGEMENT</strong> of an illegitimate child by both parents or by the mother alone if the father refuses shall be done in a public instrument (considered authentic writing under Article 278 of the Civil Code).
            </p><br>

            <h4>Who May Avail This Service?</h4>
            <ul style="padding-left: 40px;">
                <li>Children born prior to the effective of Family Code on August 03, 1988.</li>
            </ul><br>

            <h4>Requirements:</h4>
            <ul style="padding-left: 40px;">
                <li>Local Copy of Birth Certificate of the Child.</li>
                <li>Affidavit of Acknowledgement (for births before August 03, 1988).</li>
                <li>Affidavit of Admission of Paternity (for births on or before August 03, 1988).</li>
                <li>Valid ID of Father and Mother (Original and Photocopy).</li>
                <li>Submit at least two (2) of the following documents or any other records that will prove the filiation of the child or documents showing the father has acknowledged the child:
                    <ul style="padding-left: 40px;">
                        <li>Employment Records</li>
                        <li>SSS/GSIS Records</li>
                        <li>Insurance</li>
                        <li>Certification of Membership in any Organization</li>
                        <li>Statement of Assets and Liabilities</li>
                        <li>Income Tax Return (ITR)</li>
                    </ul>
                </li>
                <li><Strong>IF THE FATHER IS DECEASED,</Strong> submit Death Certificate and AUTHENTIC WRITING WILL BE NEEDED.</li>
            </ul><br>

            <h4>Fees:</h4>
            <ul style="padding-left: 40px;">
                <p>₱300.00 – Acknowledgement of Paternity</p>
                <p>₱200.00 – Endorsement</p>
                <p>₱35.00 – Certified True Copy of every supporting document</p>
            </ul>      
        </div>
    </div>



    <div class="sub-section" data-subtarget="annotation-in-the-civil-register-based-on-court-decree">
        <h4>Annotation in The Civil Register based on Court / Decree</h4>
        <div class="sub-content">
            <p>
                The Civil Registry Office where the event of the decree/order was registered shall process the ANNOTATION OF CIVIL REGISTRY DOCUMENT BASED ON THE COURT DECREE. This procedure is done upon compliance of complete requirements of the petitioner.
            </p><br>

            <h4>Who May Avail the Service:</h4>
            <ul style="padding-left: 40px;">
                <li>Owner of the record to be annotated</li>
                <li>
                    Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian, or any other person duly authorized by law or by the owner of the document sought to be annotated
                </li>
            </ul><br>

            <h4>Requirements:</h4>
            <ul style="padding-left: 40px;">
                <li>Three sets of certified true copy of court decision, finality, certificate of authenticity, and certification</li>
            </ul><br>

            <h4>Fees:</h4>
            <ul style="padding-left: 40px;">
                <p>₱1,000.00 – Annulment</p>
                <p>₱500.00 – Adoption</p>
                <p>₱300.00 – Clerical Error</p>
                <p>₱300.00 – Others</p>
            </ul>
        </div>
    </div>
    </div>




    <div class="navigation">
            <a href="{{ route('appointment.welcome') }}" class="btn">Back to Home</a>
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