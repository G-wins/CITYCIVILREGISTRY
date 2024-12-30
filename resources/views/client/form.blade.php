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
                        <input type="text" name="purpose_other" id="purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;">
                    </div>
           
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
        <div id="confirmation_modal" style="display:none;">
            <div class="modal-content bg-light">
                <span id="close_modal" onclick="closeModal()">X</span>
                <h2>Confirm Your Information</h2>
                <div id="modal_data"></div>
                <button class="btn btn-primary w-100 py-2 mt-2" onclick="submitForm()">Confirm and Submit</button>
            </div>
        </div>
    </form>
</div>
 
<script>
   var isSubmitting = false;

// Function to show the confirmation modal
function showConfirmation() {
    var missingFields = validateRequiredFields();
    if (missingFields.length > 0) {
        showWarningMessage(missingFields);
        return;
    }

    var formData = collectFormData();
    var modalData = document.getElementById("modal_data");
    modalData.innerHTML = ''; 

    for (let key in formData) {
        if (formData[key]) {
            modalData.innerHTML += `<p><strong>${key}:</strong> ${formData[key]}</p>`;
        }
    }

    document.getElementById("confirmation_modal").style.display = "flex";
}

// Function to validate required fields
function validateRequiredFields() {
    var formElements = document.getElementById("appointment_form").elements;
    var missingFields = [];

    for (let i = 0; i < formElements.length; i++) {
        var element = formElements[i];
        if (element.hasAttribute("required") && !element.value.trim()) {
            missingFields.push(element.name);
        }
    }

    return missingFields;
}

// Function to show warning message
function showWarningMessage(missingFields) {
    var existingAlert = document.querySelector(".alert-warning");
    if (existingAlert) {
        existingAlert.remove();
    }

    var warningMessage = "Please fill in the following required fields:\n" + missingFields.join(", ");
    var alertDiv = document.createElement("div");
    alertDiv.className = "alert alert-warning mt-3";
    alertDiv.role = "alert";
    alertDiv.innerHTML = warningMessage;

    var form = document.getElementById("appointment_form");
    form.parentNode.insertBefore(alertDiv, form);
}

// Function to collect form data
function collectFormData() {
    var formData = {};
    var formElements = document.getElementById("appointment_form").elements;

    for (let i = 0; i < formElements.length; i++) {
        var element = formElements[i];
        if (element.name && element.value && element.name !== "_token") {
            formData[element.name] = element.value;
        }
    }

    return formData;
}

// Function to submit the form
function submitForm() {
    // Prevent multiple submissions
    if (isSubmitting) return;
    isSubmitting = true;

    // Disable the confirm button to prevent re-clicking
    document.getElementById("confirm_button").disabled = true;

    var formData = new FormData(document.getElementById('appointment_form'));

    $.ajax({
        url: "{{ route('appointment.store') }}",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            document.getElementById("confirmation_modal").style.display = "none";
            document.getElementById("appointment_form").style.display = "none";
            document.getElementById("thankYouMessage").style.display = "block";
            isSubmitting = false;
        },
        error: function(xhr, status, error) {
            console.log("Status: " + status);
            console.log("Error: " + error);
            console.log("Response Text: " + xhr.responseText);

            alert('Something went wrong. Please try again.');
            isSubmitting = false;

            // Re-enable the confirm button if there's an error
            document.getElementById("confirm_button").disabled = false;
        }
    });
}

// Attach event listeners
document.getElementById("submit_btn").addEventListener("click", function(event) {
    event.preventDefault();
    showConfirmation();
});


// Close modal function
function closeModal() {
    document.getElementById("confirmation_modal").style.display = "none";
}





    //APPOINTMENT CALENDAR
    $(function() {
    var today = new Date();

    // Fetch booked dates and initialize the date picker
    $.ajax({
        url: '/appointments/unavailable-dates',
        method: 'GET',
        success: function(bookedDates) {
            let originalScrollPosition;

$("#appointment_date").datepicker({
    dateFormat: 'yy-mm-dd',
    minDate: new Date(),
    beforeShow: function(input, inst) {
        originalScrollPosition = $(window).scrollTop();
    },
    onSelect: function(dateText, inst) {
        setTimeout(function() {
            $(window).scrollTop(originalScrollPosition);
        }, 0);


    loadAvailableSlots(dateText);
},
onClose: function() {
        $(window).scrollTop(originalScrollPosition);
    },

                beforeShow: function(input, inst) {
                    $(".form-container").css("height", "auto");
                    $(".form-container").css("padding-bottom", "200px"); // Increase space below for the calendar
                    $("#submit_button").css("margin-top", "250px"); // Adjust this value as needed
                    
                    setTimeout(function() {
                        inst.dpDiv.css({
                            top: $(input).offset().top + $(input).outerHeight() + 5,
                            left: $(input).offset().left,
                            Index: 1000
                        });
                    }, 0);
                },
                onClose: function() {
                    $(".form-container").css("padding-bottom", "200px"); // Adjust as needed
                    $("#submit_button").css("margin-top", "20px"); // Original position
                }
            });
        },
        error: function() {
            console.error("Error fetching unavailable dates.");
        }
    });
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

//PURPOSE DYNAMIC FORM(BIRTH CERTIFICATE)
function toggleOtherPurpose() {
    const purposeSelect = document.getElementById("purpose");
    const otherInput = document.getElementById("purpose_other");

    if (purposeSelect.value === "Other") {
        otherInput.style.display = "block"; 
        otherInput.required = true;         
    } else {
        otherInput.style.display = "none";  
        otherInput.required = false;        
        otherInput.value = "";              
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