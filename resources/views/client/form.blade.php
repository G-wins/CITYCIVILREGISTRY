<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #confirmation_modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            max-height: 80vh; /* Limit the height to 80% of the viewport */
            overflow-y: auto; /* Enable vertical scrolling */
            margin: 0 auto;
            position: relative;
            padding-right: 10px; /* Extra padding for scrollbar */
        }
        #close_modal {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        


    </style>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Civil Registry</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/your_custom_script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</head>
<body>
<div class="form-container">
    <h2>CITY CIVIL REGISTRY</h2>
    <form id="appointment_form" action="{{ url('/appointment') }}" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- Basic Information -->
      <div class="section-header">Requester's Details</div>
        <div class="form-row">
            <div class="form-group">
            <label for="requester_last_name">Last Name:</label>
                <input type="text" name="requester_last_name" required>
               
            </div>
            <div class="form-group">
                <label for="requester_first_name">First Name:</label>
                <input type="text" name="requester_first_name"  required>
            </div>
            <div class="form-group">
                <label for="requester_middle_name">Middle Name:</label>
                <input type="text" name="requester_middle_name">

            </div>
        </div>

        <div class="form-group">
        <label for="requester_mailing_address">Mailing Address:</label>
        <input type="text" id="requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
        <small class="hint">House No., Street Name / Barangay</small>
    </div>
    <div class="form-row">
                <!-- City/Municipality Field -->
                <div class="form-group">
                    <label for="requester_city_municipality">City/Municipality:</label>
                    <input type="text" id="requester_city_municipality" name="requester_city_municipality" required>
                </div>

                <!-- Province Field -->
                <div class="form-group">
                    <label for="requester_province">Province:</label>
                    <input type="text" id="requester_province" name="requester_province" required>
                </div>
            </div>
    
    


        <div class="form-row">
            <div class="form-group">
            <label for="contact_no">Contact Number:</label>
                <div class="contact-container">
                    <span class="country-code">+63</span>
                    <input type="tel" name="contact_no" id="contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                </div>
                        <script>
                    function checkContactNumber() {
                        var contactInput = document.getElementById("contact_no");
                        var value = contactInput.value;

                        
                        contactInput.value = value.replace(/[^0-9]/g, '');

                        if (!contactInput.value.startsWith("9")) {
                            contactInput.value = "9";
                        }
                        if (contactInput.value.length > 10) {
                            contactInput.value = contactInput.value.slice(0, 10);
                        }
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="requester_sex">Sex:</label>
                <select name="requester_sex" required>
                    <option value="" selected disabled>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
            <label for="requester_age">Age:</label>
            <input type="number" name="requester_age" id="requester_age" min="1" max="120" required oninput="checkAgeLimit()">
            <script>
                    function checkAgeLimit() {
                        var ageInput = document.getElementById("requester_age");
                        if (ageInput.value > 120) {
                            ageInput.value = 120;
                        }
                        if (ageInput.value < 1) {
                            ageInput.value = 1;
                        }
                    }
                    document.getElementById("requester_age").addEventListener("input", function() {
                        var value = this.value;
                        if (value > 120) {
                            this.value = 120;
                        } else if (value < 1) {
                            this.value = 1;
                        }
                    });
                </script>
            </div>
        </div>

        <!-- Document Service Needed -->
        <div class="form-group">
            <label for="appointment_type">Document Service Needed:</label>
            <select id="appointment_type" name="appointment_type" onchange="showForm()" required>
                <option value="" selected disabled>Select Service</option>
                <option value="Birth Certificate">Birth Certificate</option>
                <option value="Marriage Certificate">Marriage Certificate</option>
                <option value="Marriage License">Marriage License</option>
                <option value="Death Certificate">Death Certificate</option>
                <option value="Cenomar">Cenomar</option>
                <option value="Other Document">Other (Specify)</option>
            </select>
        </div>

       
        <div id="dynamic_form"></div>
        <div class="form-group">
            <label for="requesting_party">Requesting Party:</label>
            <input type="text" id="requesting_party" name="requesting_party" required><br>
        </div>

        <div class="form-group">
            <label for="relationship_to_owner">Relationship to Owner:</label>
            <input type="text" id="relationship_to_owner" name="relationship_to_owner" required><br>
        </div>

        <div class="section-header">Purpose of Request</div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <select name="purpose" id="purpose" onchange="toggleOtherPurpose()" required>
                            <option value="" selected disabled>Select Purpose</option>
                            <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                            <option value="Employment (Local)">Employment (Local)</option>
                            <option value="School Requirements">School Requirements</option>
                            <option value="Passport/Travel">Passport/Travel</option>
                            <option value="Employment (Abroad)">Employment (Abroad)</option>
                            <option value="Other">Other (Specify)</option>
                        </select>
                        <input  type="text" name="other_purposes" id="purpose_other" placeholder="Specify if other" style="display: none; margin-top: 10px;">  </div>
           
                        <label>Delayed Registration:</label>
                        <div class="radio-group">
                            <input type="radio" id="delayed_yes" name="delayed" value="Yes" onclick="toggleDelayedDate()" required>
                            <label for="delayed_yes">Yes</label>
                            <input type="radio" id="delayed_no" name="delayed" value="No" onclick="toggleDelayedDate()" required>
                            <label for="delayed_no">No</label>
                        </div> 
                <div class="form-group" id="delayed_date_container" style="display:none;">
                    <label for="delayed_date">Delayed Date:</label>
                    <input type="date" id="delayed_date" name="delayed_date">
                </div>
                <script>
                    
                    function toggleDelayedDate() {
                        var delayedYes = document.getElementById("delayed_yes").checked;
                        var delayedDateContainer = document.getElementById("delayed_date_container");
                        
                        if (delayedYes) {
                            delayedDateContainer.style.display = "block";
                        } else {
                            delayedDateContainer.style.display = "none";
                        }
                    }
                </script>
        <div class="form-group">
        <div class="input-with-icon">
            <label for="appointment_date">Appointment Date:</label>
            <input type="text" name="appointment_date" id="appointment_date" required>
            <input type="hidden" id="appointment_time" name="appointment_time">
            <i class="fas fa-calendar-alt calendar-icon"></i> <!-- Icon -->


        </div>
        <div id="slot-container"></div>
        
      

        <button type="button" id="submit_btn" class="btn btn-primary w-100 py-2 mt-2" onclick="showConfirmation()">Next</button>
    </form>


    <div id="confirmation_modal" style="display:none;">
    <div class="modal-content">
        <span id="close_modal" onclick="closeModal()">X</span>
        <h2>Confirm Your Information</h2>
        <div id="modal_data"></div>
        <button class="btn btn-primary w-100 py-2 mt-2" onclick="proceedToPrivacyNotice()">Confirm and Submit</button>
    </div>
</div>






 
    <script>
    var isSubmitting = false;

    const privacyNotices = {
        "Birth Certificate": `
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
        <p><strong>Note:</strong> All documents are subject for evaluation.</p>
    
    
    
    
    
    
    
    
    <h2>Requirements for Out-of-Town Delayed Registration of Birth</h2>
<p><strong>City of San Jose del Monte, Bulacan</strong></p>
<ul>
    <li>No record of Birth from PSA</li>
    <li>
        Submit original copy of any two (2) of the following both showing <strong>date and place of birth</strong> of the registrant:
        <ul>
            <li>Baptismal Certificate</li>
            <li>White Card</li>
            <li>Form 137 (either Elementary or High School) or school certification or Transcript of Records</li>
            <li>Voter’s Registration Record</li>
            <li>Employment Records (GSIS/SSS E-1 or E-Form)</li>
            <li>
                Other documents the OFFICE MAY CONSIDER relevant and necessary for the approval of the application (Philhealth-MDR, Service Record, Personal Data Sheet, Medical Record, OSCA Certification, etc.)
            </li>
        </ul>
    </li>
    <li>Medical Certificate/Birth Certificate if born in hospital, lying-in, or clinic</li>
    <li>Photocopy of ID of registrant</li>
    <li>Marriage Contract of registrant, if married</li>
    <li>Barangay Certification</li>
    <li>National ID</li>
    <li>
        Any (2) documentary evidence showing the identity of the parents such as but not limited to his/her certificate of live birth, government-issued ID, certificate of marriage, or certificate of death if deceased
    </li>
    <li>2 pcs. unedited front-facing photo of the registrant (2x2 size, white background, taken within 3 mos. from the date of registration)</li>
    <li>Affidavit for Out-of-Town Delayed Registration</li>
    <li>Joint Affidavit of 2 Disinterested Persons</li>
</ul>
<p><strong>Note:</strong> Don’t submit <strong>“FAKE DOCUMENTS”</strong> to avoid penalty. All supporting documents are subject for <strong>VERIFICATION</strong> and <strong>FURTHER EVALUATION</strong>. Complete the needed requirements before submission.</p>






<h2>Correction of Clerical Error</h2>
<p>
    <strong>Republic Act No. 9048</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical error in an entry and/or change of name or nickname in the civil register except corrections involving the change in sex, age, nationality and status of a person without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office (LCRO) where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
</p>
<h4>Who May Avail the Service:</h4>
<ul>
    <li>Owner of the record that contains the error to be changed or corrected</li>
    <li>Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected</li>
</ul>
<h4>Requirements:</h4>
<ul>
    <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries</li>
    <li>Not less than 2 public or private documents upon which the correction shall be based:
        <ul>
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
<ul>
    <li>₱1,000.00 – Filing Fee</li>
    <li>₱150.00 – Posting Fee</li>
    <li>₱200.00 – Certificate of Finality</li>
    <li>₱500.00 – Migrant Fee</li>
    <li>Other expenses: Courier & Notary</li>
</ul>
<p><strong>Note:</strong> All documents are subject for evaluation.</p>

`,









        "Marriage Certificate": `
<h2>Timely Registration of Marriage</h2>
<p>
    The time for submission of the <strong>CERTIFICATE OF MARRIAGE</strong> is within fifteen (15) days following the solemnization of marriage while in marriage exempt from license requirement, the prescribed period is thirty (30) days at the place where the marriage was solemnized.
</p>
<h4>Requirements:</h4>
<ul>
    <li>Four (4) copies of Form 97 duly accomplished and signed by the proper parties.</li>
</ul>




       <h2>Requirements for Late Registration of Marriage Certificate</h2>
<ul>
    <li>Latest copy of Certificate of No Record from PSA and City of San Jose Del Monte, Bulacan</li>
    <li>Latest copy of Certificate of No Marriage (CENOMAR) from PSA (for both parties)</li>
    <li>Original or Duplicate Copy of Old Marriage Certificate with Signatures</li>
    <li>
        If not available, certification from the church or Solemnizing Officer indicating date of said marriage based on their record or logbook
    </li>
    <li>
        Affidavit of delayed registration which shall be executed by the solemnizing officer stating therein the exact place and date of marriage, the facts and circumstances surrounding the marriage, and the reason or cause of delay
    </li>
    <li>
        If the solemnizing officer is deceased and no longer available, certification from PSA re: Authority to solemnize Marriage (CRASM)
    </li>
    <li>
        Affidavit of Contracting Parties indicating the reason or cause of delay with VALID ID
    </li>
    <li>
        Affidavit of delayed registration executed by 2 witnesses stating therein the exact place and date of marriage, the facts and circumstances surrounding the marriage, and the reason or cause of delay WITH VALID ID
    </li>
    <li>
        Certified copy of Application for Marriage License bearing the date when the marriage license was issued, if applicable
    </li>
    <li>
        Certified Copy of Birth Certificate of children with date and place of marriage of parents
    </li>
    <li>
        If marriage occurred outside of Church, letter of request to solemnize Marriage outside of Church (notarized)
    </li>
    <li>
        Follow the information indicated in the old copy of marriage certificate in accomplishing the new form
    </li>
</ul>

<h4>Reminders:</h4>
<ul>
    <li>Don’t submit <strong>“FAKE DOCUMENTS”</strong> to avoid penalty. All supporting documents are subject for <strong>VERIFICATION</strong>.</li>
    <li>All Birth Certificates for submission must be certified photocopy.</li>
    <li>All supporting documents submitted must be original copy.</li>
    <li>
        Accomplished correctly and completely the four (4) copies of the Certificate of Marriage. Avoid erasures and alterations.
    </li>
    <li>Please complete all needed requirements before submission.</li>
    <li>Ten (10) days mandatory posting period will commence on the day requirements are submitted.</li>
    <li><strong>Registration Fee: PHP 150.00</strong></li>
</ul>





<p>
    <strong>Republic Act No. 9048</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical error in an entry and/or change of name or nickname in the civil register except corrections involving the change in sex, age, nationality and status of a person without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office (LCRO) where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
</p>
<h4>Who May Avail the Service:</h4>
<ul>
    <li>Owner of the record that contains the error to be changed or corrected</li>
    <li>Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected</li>
</ul>
<h4>Requirements:</h4>
<ul>
    <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries</li>
    <li>Not less than 2 public or private documents upon which the correction shall be based:
        <ul>
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
<ul>
    <li>₱1,000.00 – Filing Fee</li>
    <li>₱150.00 – Posting Fee</li>
    <li>₱200.00 – Certificate of Finality</li>
    <li>₱500.00 – Migrant Fee</li>
    <li>Other expenses: Courier & Notary</li>
</ul>
<p><strong>Note:</strong> A
    `,



    "Marriage License": `
       <h2>Requirements for Application of Marriage License</h2>
<p><strong>(Personal Appearance of the contracting parties / should be 18 years old and above)</strong></p>
<h4>Requirements:</h4>
<ul>
    <li>PSA Copy of Certificate of Live Birth
        <ul>
            <li>*If No Record of Birth - Latest Original Copy of Baptismal</li>
        </ul>
    </li>
    <li>PSA Copy of Certificate of No Marriage (CENOMAR) – 6 Months Validity</li>
    <li>Valid ID’s with Address in City of San Jose del Monte, Bulacan (present the Original & 2 photocopies with 3 affixed signature)</li>
    <li>Certificate of Pre-Marriage Orientation (PMO) & Marriage Counselling (City Population Office)</li>
    <li>Latest ID Picture (Passport size)</li>
</ul>

<h4>Applicants between 18 and below 21 years old:</h4>
<ul>
    <li>
        <strong>Parental Consent</strong> – Parents (Father and Mother or Guardian in the order mentioned) need to come personally with valid ID. If mother or father is already dead, please provide a copy of Death Certificate. (PSA Copy and 2 pcs Photocopy)
    </li>
    <li>*Parental consent provided for under Art. 14 of the Family Code of the Philippines</li>
</ul>

<h4>Applicants between 21 and below 25 years old:</h4>
<ul>
    <li>
        <strong>Parental Advice</strong> – Parents (Father and Mother or Guardian in the order mentioned) need to come personally with valid ID. If mother and father is already dead, please provide a copy of Death Certificate (PSA Copy and 2 photocopies).
    </li>
    <li>
        *Parental Advice – If not obtained or unfavorable, Marriage License shall not be issued until after 3 months following the completion of the publication of the application. A sworn statement of the contracting parties must likewise be submitted indicating therein that the parents refuse to give advice.
    </li>
</ul>

<h4>Foreigner or Former Filipino Citizen but now is Naturalized Citizen of other country:</h4>
<ul>
    <li>Certificate of Legal Capacity to Marry issued by their respective Embassy here in the Philippines (translate if in non-English content)</li>
    <li>Passport ID – Original & 2 photocopies with 3 affixed signature (showing data and date of arrival)</li>
    <li>PSA Copy of Certificate of No Marriage (CENOMAR)</li>
    <li>Certificate of Pre-Marriage Orientation -PMO (City Population Office)</li>
    <li>If applicant is naturalized citizen, Naturalized papers / Election of Citizenship (present the original copy and 2 photocopies)</li>
</ul>

<h4>Additional Document Needed:</h4>
<p><strong>For Widow/Widower:</strong></p>
<ul>
    <li>PSA Copy of Death Certificate of deceased spouse</li>
    <li>PSA Copy of Marriage Certificate</li>
    <li>PSA Copy of CENOMAR and Having Advisory of Marriage</li>
</ul>

<p><strong>For Annulled:</strong></p>
<ul>
    <li>Decree of Annulment / Decree of Nullity of Marriage certified by the court</li>
    <li>Court Decision and Annotated COM PSA Copy</li>
</ul>

<p><strong>For Judicial Declaration of Presumptive Death:</strong></p>
<ul>
    <li>Court Decision</li>
    <li>Annotated COM PSA Copy</li>
</ul>

<p><strong>For Divorce (Foreigner / Non-Filipino Citizen):</strong></p>
<ul>
    <li>Divorce decree (translate if in non-English content)</li>
    <li>Court Decision (translate in non-English content)</li>
    <li>Annotated COM PSA Copy</li>
</ul>

<p><strong>For Divorce Granted to Muslim Filipino:</strong></p>
<ul>
    <li>Sharia’h Court (PD 1083)</li>
    <li>Divorce decree 3 copies</li>
    <li>Court Decision certified by the Sharia’h Court and Annotated COM PSA Copy</li>
</ul>

<h4>Notes:</h4>
<ul>
    <li>At least one of the applicant must be a resident of the place where they will apply for marriage license.</li>
    <li>All requirements must be submitted upon application. Present all original copy, after assessment/evaluation submit 2 photo copies of each requirement.</li>
    <li>The marriage license will be issued on the 11th day after the 10-day posting period upon submission of the application for marriage license. License expires 120 days from the date licensed was issued.</li>
</ul>

<h4>Steps for Additional Guidance:</h4>
<ul>
    <li>Comply all applicable requirements as stated above and proper fill out Application for Marriage License Form.</li>
    <li>Attend Pre-Marriage Orientation at City Population Office.</li>
    <li>Submit personally the complete requirement to the City Civil Registry Office and pay the corresponding fee (₱250.00 at the City Treasurer’s Office).</li>
    <li>Wait for 10-days posting period (Notice of Application).</li>
    <li>Claim the Marriage License presenting the issued Claim Stub after the completion of 10-day posting period and payment of License Fee (₱2,000).</li>
    <li>Please check/review all entries to avoid errors and bring the Marriage License to your Solemnizing Officer for the scheduled wedding ceremony.</li>
</ul>

<p>
    For more information and queries, please visit our Facebook Page (Contact CCR Office): 
    <strong>City of San Jose del Monte – City Registrar’s Office / 0999-544-9677</strong>
</p>

    `,




    "Death Certificate": `
       <h2>Timely Registration of Death</h2>
<p>
    <strong>REGISTRATION OF DEATH CERTIFICATE</strong> shall be made in the Office of the Civil Registrar of the city/municipality where it occurred within thirty (30) days from the time of death.
</p>
<h4>Requirements:</h4>
<ul>
    <li>Four (4) copies of Form 103 duly accomplished and signed by the proper parties.</li>
</ul>




<h2>Delayed Registration of Death</h2>
<h4>Requirements:</h4>
<ul>
    <li>Original Death Certificate prepared by Hospital or Funeral Parlor</li>
    <li>Latest Copy of Certificate of No Record from PSA (NSO) and CCR of City of San Jose del Monte</li>
    <li>
        Affidavit of the nearest relative of the deceased or any person having legal charge of the deceased when he/she was still alive stating therein the exact date and place of death, the facts and circumstances surrounding the death and the reason or cause of delay
    </li>
    <li>Original Copy of the Certificate of Burial, Cremation or other means of corpse disposal</li>
    <li>Certificate from the Funeral Parlor and Cemetery</li>
    <li>Joint Affidavit of two Disinterested Persons</li>
    <li>For Muslim Registrants, fill-up Municipal Form No. 103</li>
</ul>
<h4>Fees:</h4>
<ul>
    <li>₱150.00 – Delayed Registration of Death</li>
</ul>
<p><strong>Note:</strong> All documents are subject for evaluation.</p>





<p>
    <strong>Republic Act No. 9048</strong> is an act further authorizing the City or Municipal Civil Registrar or the Consul General to correct clerical or typographical error in an entry and/or change of name or nickname in the civil register except corrections involving the change in sex, age, nationality and status of a person without a need of a judicial order. A petition shall be filed with the Local Civil Registry Office (LCRO) where the record containing the clerical error to be corrected is kept. However, in case the present residence is different from where his civil registry record is registered, he may file the petition in the nearest LCRO in his area. His petition will be treated as a migrant petition.
</p>
<h4>Who May Avail the Service:</h4>
<ul>
    <li>Owner of the record that contains the error to be changed or corrected</li>
    <li>Owner’s spouse, children, parents, brothers, sisters, grandparents, guardian or any other person duly authorized by law or by the owner of the document sought to be corrected</li>
</ul>
<h4>Requirements:</h4>
<ul>
    <li>PSA Copy of Birth Certificate containing the alleged erroneous entry or entries</li>
    <li>Not less than 2 public or private documents upon which the correction shall be based:
        <ul>
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
<ul>
    <li>₱1,000.00 – Filing Fee</li>
    <li>₱150.00 – Posting Fee</li>
    <li>₱200.00 – Certificate of Finality</li>
    <li>₱500.00 – Migrant Fee</li>
    <li>Other expenses: Courier & Notary</li>
</ul>
<p><strong>Note:</strong> A
    `,





    "Cenomar": `
        <h2>Privacy Notice for Certificate of No Marriage (CENOMAR)</h2>
        <p>The PSA supports the policy of the State to protect the fundamental right of privacy. In view of the passage of Republic Act No. 10173 also known as "Data Privacy Act of 2012," this office cannot issue documents from which the identity of an individual is apparent or can be reasonably and directly ascertained without the consent of the individual whose personal information is processed.</p>
        <p><strong>Such consent must be evidenced by written, electronic, or recorded means.</strong></p>
        <p>Hence, original and certified true copy of the Certificate of Live Birth, Certificate of Marriage, Certificate of Death, and Certificate of No Marriage (CENOMAR), and Advisory on Marriages, can only be issued to:</p>
        <ol>
            <li>The owner himself or through a duly authorized representative;</li>
            <li>His/her spouse, parent, direct descendants, guardian, or institution legally in-charge of him/her, if minor;</li>
            <li>The court or proper public official whenever absolutely necessary in administrative, judicial, or other official proceedings to determine the identity of a person;</li>
            <li>In case of the person's death, the nearest of kin.</li>
        </ol>
        <p>I understand that as per Data Privacy Act of 2012, PSA documents, if available in this office, cannot be released to me without valid IDs/government-issued IDs and proper authorization from the owner of the document, his/her parent (if minor), his/her spouse, his/her direct descendant, or his/her authorized guardian/institution-in-charge.</p>
    `,

    "Other Document": `
        <h2>Privacy Notice for Other Document</h2>
        <p>Please review the following:</p>
        <ol>
            <li>I declare that I am the document owner/duly-authorized representative for the specified document request.</li>
            <li>I give my consent to the processing of my information under the Data Privacy Act.</li>
            <li>All submitted information will remain confidential.</li>
        </ol>`
};

function showConfirmation() {
    const formElements = document.querySelectorAll("#appointment_form [name]");
    const modalData = document.getElementById("modal_data");
    modalData.innerHTML = '';

    formElements.forEach(element => {
        if (element.type !== "hidden" && element.value.trim() !== "") {
            modalData.innerHTML += `<p><strong>${formatFieldName(element.name)}:</strong> ${element.value}</p>`;
        }
    });

    document.getElementById("confirmation_modal").style.display = "flex";
}

function proceedToPrivacyNotice() {
    const selectedService = document.getElementById("appointment_type").value;

    if (!selectedService) {
        alert("Please select a document service.");
        return;
    }

    const privacyMessage = privacyNotices[selectedService] || `
        <h2>Privacy Notice</h2>
        <p>No specific privacy notice available for this service.</p>`;

    const privacyWindow = window.open('', '_blank');
    privacyWindow.document.write(`
        <html>
        <head>
            <title>Privacy Notice</title>
             <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                    line-height: 1.6;
                }
                h2 {
                    text-align: center;
                    color: #007BFF;
                    font-size: 28px;
                    border-bottom: 2px solid #007BFF;
                    padding-bottom: 10px;
                    margin-bottom: 20px;
                }
                p {
                    margin-bottom: 20px;
                    text-align: justify;
                }
                ul, ol {
                    padding-left: 40px;
                }
                ul li, ol li {
                    margin-bottom: 10px;
                }
                button {
                    display: block;
                    margin: 20px auto;
                    padding: 10px 20px;
                    font-size: 16px;
                    cursor: pointer;
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }
                button:hover {
                    background-color: #45a049;
                }
                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    background-color: #f9f9f9;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
            </style>
        </head>
      <body>
            <div class="container">
                ${privacyMessage}
                <button onclick="window.opener.finalSubmit(); window.close();">I Agree and Submit</button>
            </div>
        </body>
        </html>
    `);
}

function finalSubmit() {
    alert("Form submitted successfully!");
    document.getElementById("appointment_form").submit();
}

function closeModal() {
    document.getElementById("confirmation_modal").style.display = "none";
}

function formatFieldName(fieldName) {
    return fieldName.replace(/_/g, ' ').replace(/\b\w/g, char => char.toUpperCase());
}









    //APPOINTMENT CALENDAR
    $(document).ready(function () {
        // Inject Custom CSS for Datepicker
        const style = document.createElement('style');
        style.innerHTML = `
          .ui-datepicker {
            z-index: 1000 !important;
            margin-top: 8px !important;
            font-size: 1.2em !important;
            background-color: #ffffff !important;
            border: 1px solid #ddd !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 780px !important; /* Increase width */
            height: auto !important; /* Auto height */
            padding: 15px; /* Adjust padding */
        }

        .ui-datepicker table {
            width: 100% !important; 
            height: 100% !important;  
        }

        .unavailable-date a {
            background-color: #f44336 !important; 
            color: white !important;
            pointer-events: none; 
        }

        .slots-info {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        `;
        document.head.appendChild(style);

        // Initialize Datepicker
        var today = new Date();

        // Fetch unavailable dates
        $.ajax({
            url: '/appointments/unavailable-dates',
            method: 'GET',
            success: function (bookedDates) {
                $("#appointment_date").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: today,
                    beforeShow: function (input, inst) {
                        // Ensure calendar appears below the input
                        setTimeout(function () {
                            inst.dpDiv.css({
                                top: $(input).offset().top + $(input).outerHeight() + 10,
                                left: $(input).offset().left,
                                zIndex: 1000
                            });
                        }, 0);
                    },
                    beforeShowDay: function (date) {
                        var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);

                        // Disable and highlight unavailable dates
                        if (bookedDates.includes(formattedDate)) {
                            return [false, 'unavailable-date', 'Fully Booked'];
                        }
                        return [true, '', ''];
                    },
                    onSelect: function (dateText) {
                        loadAvailableSlots(dateText); 
                    }
                });
            },
            error: function () {
                console.error("Error fetching unavailable dates.");
            }
        });

        // Function to Load Available Slots
        function loadAvailableSlots(selectedDate) {
            $.ajax({
                url: '/appointments/slots',
                method: 'GET',
                data: { date: selectedDate },
                success: function (response) {
                    $('#slots-container').html(`
                        <div class="slot-section">
                            <h4>Available Slots</h4>
                            <div>
                                <strong>AM:</strong> ${response.am_slots} Slots
                            </div>
                            <div>
                                <strong>PM:</strong> ${response.pm_slots} Slots
                            </div>
                        </div>
                    `);
                },
                error: function () {
                    $('#slots-container').html('<p>Error fetching slots. Please try again.</p>');
                }
            });
        }
    });






//PLACE OF BIRTH (COUNTRY IF BORN ABROAD)
function toggleCountryField() {
    var bornAbroadCheckbox = document.getElementById("born_abroad");
    var countryContainer = document.getElementById("country_container");

    if (bornAbroadCheckbox.checked) {
        countryContainer.style.display = "block";
    } else {
        countryContainer.style.display = "none";
    }
}

//PURPOSE DYNAMIC FORM
function toggleOtherPurpose() {
    const purpose = document.getElementById('purpose').value;
    const purposeOther = document.getElementById('purpose_other');

    if (purpose === 'Other') {
        purposeOther.style.display = 'block';
        purposeOther.setAttribute('required', 'required');
    } else {
        purposeOther.style.display = 'none';
        purposeOther.removeAttribute('required');
    }
}

//DEATH CERTIFICATE (DIED ABROAD)
function toggleCountryFieldForDeath() {
    var diedAbroadCheckbox = document.getElementById("died_abroad");
    var countryContainer = document.getElementById("country_container");

    if (diedAbroadCheckbox.checked) {
        countryContainer.style.display = "block";
    } else {
        countryContainer.style.display = "none";
    }
}
 
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("appointment_date").setAttribute('min', today);

    function showForm() {
        var selectedService = document.getElementById("appointment_type").value;
        var dynamicForm = document.getElementById("dynamic_form");
       
      
    

      

        if (selectedService === "Birth Certificate") {
            dynamicForm.innerHTML = `  
                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Copy Issuance">Copy Issuance</option>
                        <option value="Authentication">Authentication</option>
                        <option value="Viewable Online">Viewable Online</option>
                        <option value="Endorsement">Endorsement</option>
                        <option value="DocPrint">DocPrint</option>
                        <option value="Premium Annotation">Premium Annotation</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>
                  <div class="form-group">
                <label>For Muslim: Certificate of Conversion to Islam</label>
                <div class="radio-group">
                    <input type="radio" id="muslim_yes" name="certificate_of_conversion" value="Yes" required>
                    <label for="muslim_yes">Yes</label>
                    <input type="radio" id="muslim_no" name="certificate_of_conversion" value="No" checked required>
                    <label for="muslim_no">No</label>
                </div>
            </div>

                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" name="brn" maxlength="14" placeholder="000000-0000000-0">
                </div>
               <div class="section-header">BIRTH CERTIFICATE DETAILS</div>
                <h4>Person's/Child's Information</h4>
                    <div class="form-group">
                        <label for="child_last_name">Last Name: (if female, last name before marriage)</label>
                        <input type="text" name="child_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="child_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                        <input type="text" name="child_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="child_middle_name">Middle Name: (if female, middle name before marriage)</label>
                        <input type="text" name="child_middle_name">
                    </div>
                </div>
                 <div class="form-group">
                    <label>Sex:</label>
                    <select name="child_sex" required>
                        <option value="" selected disabled>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                </div>
                
                <!-- Born Abroad Checkbox -->
                <label>Place of Birth</label>
                <div class="form-group born-abroad" style="position: relative;">
                    <div style="position: absolute; left: 0; top: 0;">
                        <input type="checkbox" id="born_abroad" onclick="toggleCountryField()">
                    </div>
                    <label for="born_abroad" style="padding-left: 25px; font-size: 14px;">Born Abroad</label>
                </div>

                <!-- Country Field (Visible if Born Abroad is checked) -->
                <div class="form-group" id="country_container" style="display: none;">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" placeholder="Please specify country if born abroad">
                    <small class="hint">Please specify country if born abroad only.</small>
                </div>
            </div>

            <div class="form-row">
                <!-- City/Municipality Field -->
                <div class="form-group">
                    <label for="place_of_birth_city_municipality">City/Municipality:</label>
                    <input type="text" id="place_of_birth_city_municipality" name="place_of_birth_city_municipality" required>
                </div>

                <!-- Province Field -->
                <div class="form-group">
                    <label for="place_of_birth_province">Province:</label>
                    <input type="text" id="place_of_birth_province" name="place_of_birth_province" required>
                </div>
            </div>
                <div class="section-header">Family Background</div>

                <!-- Father's Information -->
                <div class="form-group"><strong>Father's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father_last_name">Last Name:</label>
                        <input type="text" id="father_last_name" name="father_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_first_name">First Name:</label>
                        <input type="text" id="father_first_name" name="father_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Middle Name:</label>
                        <input type="text" id="father_middle_name" name="father_middle_name">
                    </div>
                </div>
                <!-- Mother's Information -->
                <div class="form-group"><strong>Mother's Maiden Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother_last_name">Last Name:</label>
                        <input type="text" id="mother_last_name" name="mother_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_first_name">First Name:</label>
                        <input type="text" id="mother_first_name" name="mother_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Middle Name:</label>
                        <input type="text" id="mother_middle_name" name="mother_middle_name">
                    </div>
                </div>
            `;
    
        } else if (selectedService === "Marriage Certificate") {
            dynamicForm.innerHTML = `
                     <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Marriage Certificate">Marriage Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                <div class="section-header">Marriage Information</div>
                <div class="form-group"><strong>NAME OF HUSBAND</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="husband_last_name">Last Name:</label>
                        <input type="text" id="husband_last_name" name="husband_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="husband_first_name">First Name:</label>
                        <input type="text" id="husband_first_name" name="husband_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="husband_middle_name">Middle Name:</label>
                        <input type="text" id="husband_middle_name" name="husband_middle_name">
                    </div>
                </div>

                <!-- Wife's Information -->
                <div class="form-group"><strong>MAIDEN NAME OF WIFE</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="wife_last_name">Last Name:</label>
                        <input type="text" id="wife_last_name" name="wife_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="wife_first_name">First Name:</label>
                        <input type="text" id="wife_first_name" name="wife_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="wife_middle_name">Middle Name:</label>
                        <input type="text" id="wife_middle_name" name="wife_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_marriage">Date of Marriage:</label>
                    <input type="date" id="date_of_marriage" name="date_of_marriage" required>
                </div>
                  <div class="form-group">
                <label>Place of Marriage:</label>
                     <div class="form-group born-abroad" style="position: relative;">
                    <div style="position: absolute; left: 0; top: 0;">
                        <input type="checkbox" id="born_abroad" onclick="toggleCountryField()">
                    </div>
                    <label for="born_abroad" style="padding-left: 25px; font-size: 14px;">Married Abroad</label>
                </div>
                <div class="form-group" id="country_container" style="display: none;">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" placeholder="Please specify country if married abroad">
                    <small class="hint">Please specify country if married abroad only</small>
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="marriage_city_municipality">City/Municipality:</label>
                        <input type="text" id="marriage_city_municipality" name="marriage_city_municipality" required>
                    </div>
                    <div class ="form-group">
                        <label for="marriage_province">Province:</label>
                        <input type="text" id="marriage_province" name="marriage_province" required>
                    </div>
                  </div>
                       
            `;

        } else if (selectedService === "Marriage License") {
              dynamicForm.innerHTML =`
                 <div class="section-header">Request Information</div>
                <div class="form-group">
                 <label for="request_type">Request Type:</label>
                 <select name="request_type" required>
                    <option value="" selected disabled>Select Request Type</option>
                    <option value="Marriage Certificate">Marriage Certificate</option>
                    <option value="Authentication">Authentication</option>
                    <option value="CD/LI">CD/LI</option>
                 </select>
                 </div>
                 
                  <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" name="brn" maxlength="11" placeholder="0-000-0000000">
                 </div>
                 <div class="form-group">
                 <div class="section-header">Marriage License Information</div>    
                 <!-- Applicant's Information -->
                 <div class="form-row">
                     <div class="form-group">
                        <label for="applicant_last_name">Last Name:</label>
                                <input type="text" name="applicant_last_name" required>
                         </div>

                         <div class="form-group">
                             <label for="applicant_first_name">First Name:</label>
                              <input type="text" name="applicant_first_name" required>
                          </div>

                            <div class="form-group">
                                <label for="applicant_middle_name">Middle Name:</label>
                                <input type="text" name="applicant_middle_name">
                            </div>
                        </div>

                        <!-- Spouse's Information -->
            <div class="form-group"><strong>Spouse's Information</strong></div>
            <div class="form-row">
                <div class="form-group">
                    <label for="spouse_last_name">Last Name:</label>
                    <input type="text" name="spouse_last_name" required>
                </div>

                <div class="form-group">
                    <label for="spouse_first_name">First Name:</label>
                    <input type="text" name="spouse_first_name" required>
                </div>

                <div class="form-group">
                    <label for="spouse_middle_name">Middle Name:</label>
                    <input type="text" name="spouse_middle_name">
                </div>
            </div>

            <!-- Planned Date and Place of Marriage -->
            <div class="form-group"><strong>Marriage Details</strong></div>
             <div class="form-group">
                    <label for="planned_date_of_marriage">Planned Date of Marriage:</label>
                    <input type="date" id="planned_date_of_marriage" name="planned_date_of_marriage" required>
                </div>

                <div class="form-group">
                    <label for="place_of_marriage">Place of Marriage:</label>
                    <input type="text" name="place_of_marriage" required>
                </div>
            </div>
    `;
        
           
            document.getElementById("planned_date_of_marriage").setAttribute('min', today);

        } else if (selectedService === "Death Certificate") {
            dynamicForm.innerHTML = `
             <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Death Certificate">Death Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>
            </div>

                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" name="brn" maxlength="14" placeholder="000000-0000000-0">
                </div>
                <div class="section-header">Deceased Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="deceased_last_name">Last Name:</label>
                        <input type="text" id="deceased_last_name" name="deceased_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_first_name">First Name:</label>
                        <input type="text" id="deceased_first_name" name="deceased_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_middle_name">Middle Name:</label>
                        <input type="text" id="deceased_middle_name" name="deceased_middle_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_of_death">Date of Death:</label>
                    <input type="date" id="date_of_death" name="date_of_death" required>
                </div>
                <div class="form-group">
                    <label>Place of Death:</label>
                      <div class="form-group died-abroad" style="position: relative;">
                        <div style="position: absolute; left: 0; top: 0;">
                            <input type="checkbox" id="died_abroad" onclick="toggleCountryFieldForDeath()">
                        </div>
                        <label for="died_abroad" style="padding-left: 25px; font-size: 14px;">Died Abroad</label>
                    </div>
                    <div class="form-group" id="country_container" style="display: none;">
                        <label for="country">Country:</label>
                        <input type="text" id="country" name="country" placeholder="Please specify country if died abroad">
                        <small class="hint">Please specify country if death occurred abroad only.</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="death_city_municipality">City/Municipality:</label>
                            <input type="text" id="death_city_municipality" name="death_city_municipality" required>
                        </div>
                        <div class="form-group">
                            <label for="death_province">Province:</label>
                            <input type="text" id="death_province" name="death_province" required>
                        </div>
                    </div>
                </div>

             
            `;

        } else if (selectedService === "Cenomar") {
    dynamicForm.innerHTML = `
        <div class="section-header">CENOMAR Request Information</div>

        <!-- Request Information for CENOMAR -->
        <div class="form-group">
            <label for="request_type">Request Type:</label>
            <select name="request_type" required>
                <option value="" selected disabled>Select Request Type</option>
                <option value="Certificate of No Marriage (CENOMAR)">Certificate of No Marriage (CENOMAR)</option>
                <option value="Viewable Online">Viewable Online</option>
                <option value="DocPrint">DocPrint</option>
            </select>
        </div>
           <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" name="brn" maxlength="14" placeholder="000000-0000000-0">
            </div>
             <div class="section-header">BIRTH DETAILS</div>
                <h4>Person's Information</h4>
                    <div class="form-group">
                        <label for="person_last_name">Last Name: (if female, last name before marriage)</label>
                        <input type="text" name="person_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="person_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                        <input type="text" name="person_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="person_middle_name">Middle Name: (if female, middle name before marriage)</label>
                        <input type="text" name="person_middle_name">
                    </div>
                </div>
                 <div class="form-group">
                    <label>Sex:</label>
                    <select name="person_sex" required>
                        <option value="" selected disabled>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                </div>
                
                <!-- Born Abroad Checkbox -->
                <label>Place of Birth</label>
                <div class="form-group born-abroad" style="position: relative;">
                    <div style="position: absolute; left: 0; top: 0;">
                        <input type="checkbox" id="born_abroad" onclick="toggleCountryField()">
                    </div>
                    <label for="born_abroad" style="padding-left: 25px; font-size: 14px;">Born Abroad</label>
                </div>

                <!-- Country Field (Visible if Born Abroad is checked) -->
                <div class="form-group" id="country_container" style="display: none;">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" placeholder="Please specify country if born abroad">
                    <small class="hint">Please specify country if born abroad only.</small>
                </div>
            </div>

            <div class="form-row">
                <!-- City/Municipality Field -->
                <div class="form-group">
                    <label for="person_city_municipality">City/Municipality:</label>
                    <input type="text" id="person_city_municipality" name="person_city_municipality" required>
                </div>

                <!-- Province Field -->
                <div class="form-group">
                    <label for="person_province">Province:</label>
                    <input type="text" id="person_province" name="person_province" required>
                </div>
            </div>
                     <div class="section-header">Family Background</div>

                <!-- Father's Information -->
                <div class="form-group"><strong>Father's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father_last_name">Last Name:</label>
                        <input type="text" id="father_last_name" name="father_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_first_name">First Name:</label>
                        <input type="text" id="father_first_name" name="father_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Middle Name:</label>
                        <input type="text" id="father_middle_name" name="father_middle_name">
                    </div>
                </div> 

                 <!-- Mother's Information -->
                <div class="form-group"><strong>Mother's Maiden Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother_last_name">Last Name:</label>
                        <input type="text" id="mother_last_name" name="mother_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_first_name">First Name:</label>
                        <input type="text" id="mother_first_name" name="mother_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Middle Name:</label>
                        <input type="text" id="mother_middle_name" name="mother_middle_name">
                    </div>
                </div>
    `;

            } else if (selectedService === "Other Document") {
                dynamicForm.innerHTML = `
                
                  <div class="form-group">
                    <label for="other_document">Specify Document:</label>
                    <input type="text" id="other_document" name="other_document" placeholder="e.g., Barangay Clearance" required>
                </div>

                <div class="form-group">
                    <label for="document_details">Document Details:</label>
                    <textarea id="document_details" name="document_details" rows="4" placeholder="Provide additional details about the document" required></textarea>
                </div>

            `;

}
    }

    
</script>

</body>
</html>