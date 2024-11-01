<!DOCTYPE html>
<html lang="en">
<head>
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
    <form action="{{ url('/appointment') }}" method="POST">
        @csrf

        <!-- Basic Information -->
        <div class="section-header">Applicant's Information</div>
        <div class="form-row">
            <div class="form-group">
            <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required>
               
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name">
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" name="middle_name" required>

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
                <option value="Cenomar">Cenomar</option>
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
        <div class="input-with-icon">
            <label for="appointment_date">Appointment Date:</label>
            <input type="text" name="appointment_date" id="appointment_date" required>
            <input type="hidden" id="appointment_time" name="appointment_time">
            <i class="fas fa-calendar-alt calendar-icon"></i> <!-- Icon -->


        </div>
        <div id="slot-container"></div>
       


        <button type="submit" id="submit_button">Submit Appointment</button>
    </form>
</div>

<script>

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
                            zIndex: 1000
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
                        <label for="child_last_name">last Name:</label>
                        <input type="text" id="child_last_name" name="child_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="child_first_name">First Name:</label>
                        <input type="text" id="child_first_name" name="child_first_name">
                    </div>
                    <div class="form-group">
                        <label for="child_middle_name">Middle Name:</label>
                        <input type="text" id="child_middle_name" name="child_middle_name" required>
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

                <!-- Father's Information -->
                <div class="form-group"><strong>Father's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father_last_name">Last Name:</label>
                        <input type="text" id="father_last_name" name="father_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_first_name">First Name:</label>
                        <input type="text" id="father_first_name" name="father_first_name">
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Middle Name:</label>
                        <input type="text" id="father_middle_name" name="father_middle_name" required>
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
                        <input type="text" id="mother_first_name" name="mother_first_name">
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Middle Name:</label>
                        <input type="text" id="mother_middle_name" name="mother_middle_name" required>
                    </div>
                </div>
            `;
    
        } else if (selectedService === "Marriage Certificate") {
            dynamicForm.innerHTML = `
                <div class="section-header">Marriage Information</div>
                   <!-- Husband's Information -->
                <div class="form-group"><strong>Husband's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="husband_last_name">Last Name:</label>
                        <input type="text" id="husband_last_name" name="husband_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="husband_first_name">First Name:</label>
                        <input type="text" id="husband_first_name" name="husband_first_name">
                    </div>
                    <div class="form-group">
                        <label for="husband_middle_name">Middle Name:</label>
                        <input type="text" id="husband_middle_name" name="husband_middle_name" required>
                    </div>
                </div>
                 <!-- Wife's Information -->
                <div class="form-group"><strong>Wife's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="wife_last_name">Last Name:</label>
                        <input type="text" id="wife_last_name" name="wife_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="wife_first_name">First Name:</label>
                        <input type="text" id="wife_first_name" name="wife_first_name">
                    </div>
                    <div class="form-group">
                        <label for="wife_middle_name">Middle Name:</label>
                        <input type="text" id="wife_middle_name" name="wife_middle_name" required>
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
                    <label for="applicant_last_name">Last Name:</label>
                    <input type="text" name="applicant_last_name" required>
                </div>

                <div class="form-group">
                    <label for="applicant_first_name">First Name:</label>
                    <input type="text" name="applicant_first_name">
                </div>

                <div class="form-group">
                    <label for="applicant_middle_name">Middle Name:</label>
                    <input type="text" name="applicant_middle_name" required>
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
                    <input type="text" name="spouse_first_name">
                </div>

                <div class="form-group">
                    <label for="spouse_middle_name">Middle Name:</label>
                    <input type="text" name="spouse_middle_name" required>
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
                        <label for="deceased_last_name">Last Name:</label>
                        <input type="text" id="deceased_last_name" name="deceased_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_first_name">First Name:</label>
                        <input type="text" id="deceased_first_name" name="deceased_first_name">
                    </div>
                    <div class="form-group">
                        <label for="deceased_middle_name">Middle Name:</label>
                        <input type="text" id="deceased_middle_name" name="deceased_middle_name" required>
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
        } else if (selectedService === "Cenomar") {
    dynamicForm.innerHTML = `
        <div class="section-header">CENOMAR Request Information</div>

        <!-- Request Information for CENOMAR -->
        <div class="form-group">
            <label for="request_type">Request Type:</label>
            <select name="request_type" required>
                <option value="">Select Request Type</option>
                <option value="">Certificate of No Marriage (CENOMAR)</option>
                <option value="Viewable Online">Viewable Online</option>
                <option value="DocPrint">DocPrint</option>
            </select>
        </div>
           <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" name="brn" maxlength="14" placeholder="000000-0000000-0">
            </div>
                     <div class="section-header">Family Background</div>
                <!-- Father's Information -->
                <div class="form-group"><strong>Father's Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father_last_name">First Name:</label>
                        <input type="text" id="father_last_name" name="father_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_first_name">Middle Name:</label>
                        <input type="text" id="father_first_name" name="father_first_name">
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Last Name:</label>
                        <input type="text" id="father_middle_name" name="father_middle_name" required>
                    </div>
                </div> 
                    <!-- Mother's Information -->
                <div class="form-group"><strong>Mother's Maiden Name</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother_last_name">First Name:</label>
                        <input type="text" id="mother_last_name" name="mother_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_first_name">Middle Name:</label>
                        <input type="text" id="mother_first_name" name="mother_first_name">
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Last Name:</label>
                        <input type="text" id="mother_middle_name" name="mother_middle_name" required>
                    </div>
                </div>

    `;
        }
    }
</script>

</body>
</html>