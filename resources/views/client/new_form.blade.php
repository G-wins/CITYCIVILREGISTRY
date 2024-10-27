<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Civil Registry</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
<div class="form-container">
    <h2>City Civil Registry Appointment</h2>
    <form action="{{ url('/appointment') }}" method="POST">
        @csrf

        <!-- Basic Information -->
        <div class="section-header">Applicant's Information</div>
        <div class="form-row">
            <div class="form-group">
            <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required>
               
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required>

            </div>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" required>
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
                <label for="sex">Sex:</label>
                <select name="sex" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="lgbtq">LGBTQ</option>
                </select>
            </div>
            <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" min="1" max="120" required oninput="checkAgeLimit()">
            <script>
                    function checkAgeLimit() {
                        var ageInput = document.getElementById("age");
                        if (ageInput.value > 120) {
                            ageInput.value = 120;
                        }
                        if (ageInput.value < 1) {
                            ageInput.value = 1;
                        }
                    }
                    document.getElementById("age").addEventListener("input", function() {
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
                <option value="">Select Service</option>
                <option value="Birth Certificate">Birth Certificate</option>
                <option value="Marriage Certificate">Marriage Certificate</option>
                <option value="Marriage License">Marriage License</option>
                <option value="Death Certificate">Death Certificate</option>
                <option value="Other">Other (Specify)</option>
            </select>
        </div>

        <!-- Field for "Other" document type -->
        <div id="other_document_field" class="form-group" style="display:none;">
            <label for="other_document">Specify Document:</label>
            <input type="text" id="other_document" name="other_document">
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

        <div class="form-group">
            <label for="purpose">Purpose:</label>
             <input type="text" id="purpose" name="purpose" required><br>
        </div>
        <div class="form-group">
    <label>Delayed Registration:</label>
        <div class="radio-group">
            <input type="radio" id="delayed_yes" name="delayed" value="Yes" onclick="toggleDelayedDate()" required>
            <label for="delayed_yes">Yes</label>
            <input type="radio" id="delayed_no" name="delayed" value="No" onclick="toggleDelayedDate()" required>
            <label for="delayed_no">No</label>
        </div>
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
            <label for="appointment_date">Appointment Date:</label>
            <input type="date" name="appointment_date" id="appointment_date" required>
        </div>

        <button type="submit">Submit Appointment</button>
    </form>
</div>

<script>
   
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("appointment_date").setAttribute('min', today);

    function showForm() {
        var selectedService = document.getElementById("appointment_type").value;
        var dynamicForm = document.getElementById("dynamic_form");
        var otherDocumentField = document.getElementById("other_document_field");

        dynamicForm.innerHTML = ""; 

        if (selectedService === "Other") {
            otherDocumentField.style.display = "block";
        } else {
            otherDocumentField.style.display = "none";
        }

        if (selectedService === "Birth Certificate") {
            dynamicForm.innerHTML = `
                <div class="section-header">Child Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="child_first_name">First Name:</label>
                        <input type="text" id="child_first_name" name="child_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="child_middle_name">Middle Name:</label>
                        <input type="text" id="child_middle_name" name="child_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="child_last_name">Last Name:</label>
                        <input type="text" id="child_last_name" name="child_last_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                </div>
                <div class="form-group">
                    <label for="place_of_birth">Place of Birth:</label>
                    <input type="text" id="place_of_birth" name="place_of_birth" required>
                </div>

                <div class="section-header">Family Background</div>

                <!-- Mother's Information -->
                <div class="form-group"><strong>Mother's Maiden Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother_first_name">First Name:</label>
                        <input type="text" id="mother_first_name" name="mother_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Middle Name:</label>
                        <input type="text" id="mother_middle_name" name="mother_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="mother_last_name">Last Name:</label>
                        <input type="text" id="mother_last_name" name="mother_last_name" required>
                    </div>
                </div>

                <!-- Father's Information -->
                <div class="form-group"><strong>Father's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father_first_name">First Name:</label>
                        <input type="text" id="father_first_name" name="father_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Middle Name:</label>
                        <input type="text" id="father_middle_name" name="father_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="father_last_name">Last Name:</label>
                        <input type="text" id="father_last_name" name="father_last_name" required>
                    </div>
                </div>
                      <div class="section-header">Request for</div>
      <div class="form-group">
            <label for="request_for">Select Request Type:</label>
            <select id="request_for" name="request_for" required>
                <option value="">Select Request Type</option>
                <option value="copy_issuance">Copy Issuance</option>
                <option value="authentication">Authentication</option>
                <option value="viewable_online">Viewable Online</option>
                <option value="endorsement">Endorsement</option>
                <option value="docprint">Docprint</option>
                <option value="premium_annotation">Premium Annotation</option>
            </select>
        </div>


        <!-- FOR MUSLIM -->
        <div class="section-header">For Muslim</div>
        <div class="form-group">
            <input type="checkbox" name="muslim_conversion" value="certificate_conversion_islam"> Certificate of Conversion to Islam
        </div>

        <!-- REQUIREMENTS -->
        <div class="section-header">Requirements</div>
        <div class="form-group">
            <input type="checkbox" name="requirement_id" value="valid_id"> Your Valid Government-Issued ID
            <input type="checkbox" name="requirement_representative_id" value="representative_id"> If Representative, Valid Government-Issued ID of Representative, Signed Authorization Letter and Valid Government-Issued ID of the Document Owner
        </div>

        <!-- BReN, if known -->
        <div class="form-group">
            <label for="bren">BReN, if known</label>
            <input type="text" name="bren" maxlength="12" placeholder="Birth Reference Number">
            <small>The BReN can be found on the previously issued PSA copy of the birth certificate of the person/child, if any.</small>
        </div>

        <!-- BIRTH CERTIFICATE DETAILS -->
        <div class="section-header">Person’s/Child’s Information</div>
        <div class="form-row">
            <div class="form-group">
                <label for="child_last_name">Last Name (if female, last name before marriage):</label>
                <input type="text" id="child_last_name" name="child_last_name" required>
            </div>
            <div class="form-group">
                <label for="child_first_name">First Name (include JR., SR., II, III, IV, etc, if applicable):</label>
                <input type="text" id="child_first_name" name="child_first_name" required>
            </div>
            <div class="form-group">
                <label for="child_middle_name">Middle Name (if female, middle name before marriage):</label>
                <input type="text" id="child_middle_name" name="child_middle_name">
            </div>
        </div>

        <div class="form-group">
            <label for="child_sex">Sex:</label>
            <select id="child_sex" name="child_sex" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
        </div>

        <div class="form-group">
            <label for="place_of_birth">Place of Birth (City/Municipality and Province, Country if born abroad):</label>
            <input type="text" id="place_of_birth" name="place_of_birth" required>
        </div>

        <!-- PURPOSE OF REQUEST -->
        <div class="section-header">Purpose of Your Request</div>
        <div class="form-group">
            <label for="purpose_of_request">Purpose:</label>
            <select id="purpose_of_request" name="purpose_of_request" required>
                <option value="">Select Purpose</option>
                <option value="claim_benefits_loan">Claim Benefits/Loan</option>
                <option value="employment_local">Employment (Local)</option>
                <option value="school_requirements">School Requirements</option>
                <option value="passport_travel">Passport/Travel</option>
                <option value="employment_abroad">Employment (Abroad)</option>
                <option value="others">Others (Specify)</option>
            </select>
        </div>

        <!-- REQUESTER'S DETAILS -->
        <div class="section-header">Requester’s Details</div>
        <div class="form-row">
            <div class="form-group">
                <label for="requester_last_name">Last Name:</label>
                <input type="text" id="requester_last_name" name="requester_last_name" required>
            </div>
            <div class="form-group">
                <label for="requester_first_name">First Name (include JR., SR., II, III, IV, etc, if applicable):</label>
                <input type="text" id="requester_first_name" name="requester_first_name" required>
            </div>
            <div class="form-group">
                <label for="requester_middle_name">Middle Name:</label>
                <input type="text" id="requester_middle_name" name="requester_middle_name">
            </div>
        </div>

        <div class="form-group">
            <label for="requester_address">Address (House No., Street Name, Barangay):</label>
            <input type="text" id="requester_address" name="requester_address" required>
        </div>

        <div class="form-group">
            <label for="requester_city_province">City/Municipality, Province (Country if abroad):</label>
            <input type="text" id="requester_city_province" name="requester_city_province" required>
        </div>

        <div class="form-group">
            <label for="requester_mobile_number">Mobile Number:</label>
            <input type="tel" id="requester_mobile_number" name="requester_mobile_number" placeholder="9123456789" maxlength="10" required>
        </div>
            `;
    
        } else if (selectedService === "Marriage Certificate") {
            dynamicForm.innerHTML = `
                <div class="section-header">Marriage Information</div>
                <!-- Husband's Information -->
                <div class="form-group"><strong>Husband's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="husband_first_name">First Name:</label>
                        <input type="text" id="husband_first_name" name="husband_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="husband_middle_name">Middle Name:</label>
                        <input type="text" id="husband_middle_name" name="husband_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="husband_last_name">Last Name:</label>
                        <input type="text" id="husband_last_name" name="husband_last_name" required>
                    </div>
                </div>

                <!-- Wife's Information -->
                <div class="form-group"><strong>Wife's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="wife_first_name">First Name:</label>
                        <input type="text" id="wife_first_name" name="wife_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="wife_middle_name">Middle Name:</label>
                        <input type="text" id="wife_middle_name" name="wife_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="wife_last_name">Last Name:</label>
                        <input type="text" id="wife_last_name" name="wife_last_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_marriage">Date of Marriage:</label>
                    <input type="date" id="date_of_marriage" name="date_of_marriage" required>
                </div>
            `;

        } else if (selectedService === "Marriage License") {
              dynamicForm.innerHTML = `
        <div class="form-group">
            <div class="section-header">Marriage License Information</div>

            
            <!-- Applicant's Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="applicant_first_name">First Name:</label>
                    <input type="text" name="applicant_first_name" required>
                </div>

                <div class="form-group">
                    <label for="applicant_middle_name">Middle Name:</label>
                    <input type="text" name="applicant_middle_name">
                </div>

                <div class="form-group">
                    <label for="applicant_last_name">Last Name:</label>
                    <input type="text" name="applicant_last_name" required>
                </div>
            </div>

            <!-- Spouse's Information -->
            <div class="form-group"><strong>Spouse's Information</strong></div>
            <div class="form-row">
                <div class="form-group">
                    <label for="spouse_first_name">First Name:</label>
                    <input type="text" name="spouse_first_name" required>
                </div>

                <div class="form-group">
                    <label for="spouse_middle_name">Middle Name:</label>
                    <input type="text" name="spouse_middle_name">
                </div>

                <div class="form-group">
                    <label for="spouse_last_name">Last Name:</label>
                    <input type="text" name="spouse_last_name" required>
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
                <div class="section-header">Deceased Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="deceased_first_name">First Name:</label>
                        <input type="text" id="deceased_first_name" name="deceased_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_middle_name">Middle Name:</label>
                        <input type="text" id="deceased_middle_name" name="deceased_middle_name">
                    </div>
                    <div class="form-group">
                        <label for="deceased_last_name">Last Name:</label>
                        <input type="text" id="deceased_last_name" name="deceased_last_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="place_of_death">Place of Death:</label>
                    <input type="text" id="place_of_death" name="place_of_death" required>
                </div>
                <div class="form-group">
                    <label for="date_of_death">Date of Death:</label>
                    <input type="date" id="date_of_death" name="date_of_death" required>
                </div>
            `;
        }
    }
</script>

</body>
</html>