// contact number
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

// Age limit
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

// Show/hide the delayed date input
function toggleDelayedDate() {
    var delayedYes = document.getElementById("delayed_yes").checked;
    var delayedDateContainer = document.getElementById("delayed_date_container");
   
    if (delayedYes) {
        delayedDateContainer.style.display = "block";
    } else {
        delayedDateContainer.style.display = "none";
    }
}

// Modal for confirmation info
function showConfirmation() {
    // Get all required fields inside the form
    let form = document.getElementById("appointment_form");
    let requiredFields = form.querySelectorAll("[required]");
    let isValid = true;
    let firstInvalidField = null;

    // Check if any required field is empty
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.style.border = "2px solid red"; // Highlight empty fields
            if (!firstInvalidField) firstInvalidField = field; // Capture first empty field
        } else {
            field.style.border = ""; // Reset border if valid
        }
    });

    if (!isValid) {
        alert("Please fill out all required fields before proceeding.");
        if (firstInvalidField) firstInvalidField.focus(); // Focus on first empty field
        return; // Stop execution, prevent opening modal
    }

    // Get the selected document type
    let selectedType = document.getElementById("appointment_type").value;
    console.log("Selected Document Type: ", selectedType);

    // Hide all confirmation sections first
    let allConfirmSections = document.querySelectorAll('[id^="confirm"]');
    allConfirmSections.forEach(section => section.classList.add('hidden'));

    // Identify the correct confirmation section to show
    let selectedConfirmElement = null;

    if(selectedType === "Birth Certificate"){
        document.getElementById("cbc_requesterLName").value = document.getElementById('requester_last_name').value;
        document.getElementById("cbc_requesterFName").value = document.getElementById('requester_first_name').value;
        document.getElementById("cbc_requesterMName").value = document.getElementById('requester_middle_name').value;
        document.getElementById("cbc_requesterMailingAdd").value = document.getElementById('requester_mailing_address').value;
        document.getElementById("cbc_requesterCityMunicipality").value = document.getElementById('requester_city_municipality').value;
        document.getElementById("cbc_requesterProvince").value = document.getElementById('requester_province').value;
        document.getElementById("cbc_contactNo").value = document.getElementById('contact_no').value;
        document.getElementById("cbc_requesterSex").value = document.querySelector('select[name="requester_sex"]').value;
        document.getElementById("cbc_requesterAge").value = document.getElementById('requester_age').value;
        document.getElementById("cbc_requestType").value = document.getElementById('request_type').value;
        document.getElementById("cbc_certificateOfConvertion").value = document.querySelector('input[name="certificate_of_conversion"]:checked').value;
        document.getElementById("cbc_brn").value = document.getElementById('brn').value;
        document.getElementById("cbc_childLName").value = document.getElementById('child_last_name').value;
        document.getElementById("cbc_childFName").value = document.getElementById('child_first_name').value;
        document.getElementById("cbc_childMName").value = document.getElementById('child_middle_name').value;
        document.getElementById("cbc_childSex").value = document.getElementById('child_sex').value;
        document.getElementById("cbc_dateOfBirth").value = document.getElementById('bc_date_of_birth').value;
        document.getElementById("cbc_bornAbroad").value = document.getElementById('born_abroad').value;
        document.getElementById("cbc_country").value = document.getElementById('country').value;
        document.getElementById("cbc_placeOfBirth_cityMunicipality").value = document.getElementById('place_of_birth_city_municipality').value;
        document.getElementById("cbc_placeOfBirth_province").value = document.getElementById('place_of_birth_province').value;
        document.getElementById("cbc_fatherLName").value = document.getElementById('father_last_name').value;
        document.getElementById("cbc_fatherFName").value = document.getElementById('father_first_name').value;
        document.getElementById("cbc_fatherMName").value = document.getElementById('father_middle_name').value;
        document.getElementById("cbc_motherLName").value = document.getElementById('mother_last_name').value;
        document.getElementById("cbc_motherFName").value = document.getElementById('mother_first_name').value;
        document.getElementById("cbc_motherMName").value = document.getElementById('mother_middle_name').value;
        document.getElementById("cbc_requestingParty").value = document.getElementById('requesting_party').value;
        document.getElementById("cbc_relationshipToOwner").value = document.getElementById('relationship_to_owner').value;
        let purposeSelect = document.getElementById("purpose");
        document.getElementById("cbc_purpose").value = purposeSelect.value;
        // Copy "Other Purpose" input if visible
        let otherPurposeInput = document.getElementById("purpose_other");
        if (purposeSelect.value === "Other") {
            document.getElementById("cbc_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cbc_otherPurpose").value = "";
        }
        // Copy delayed registration radio button selection
        let delayedRadio = document.querySelector('input[name="delayed"]:checked');
        if (delayedRadio) {
            document.getElementById("cbc_delayed").value = delayedRadio.value;
        }
        // Copy delayed date if applicable
        let delayedDateInput = document.getElementById("delayed_date");
        document.getElementById("cbc_delayedDate").value = delayedDateInput.value;

        // Copy appointment date
        document.getElementById("cbc_appointmentDate").value = document.getElementById("appointment_date").value;

        document.getElementById('confirmBirthCert').classList.remove('hidden');
    }else if(selectedType === "Marriage Certificate"){
        document.getElementById("cmc_requesterLName").value = document.getElementById('requester_last_name').value;
        document.getElementById("cmc_requesterFName").value = document.getElementById('requester_first_name').value;
        document.getElementById("cmc_requesterMName").value = document.getElementById('requester_middle_name').value;
        document.getElementById("cmc_requesterMailingAdd").value = document.getElementById('requester_mailing_address').value;
        document.getElementById("cmc_requesterCityMunicipality").value = document.getElementById('requester_city_municipality').value;
        document.getElementById("cmc_requesterProvince").value = document.getElementById('requester_province').value;
        document.getElementById("cmc_contactNo").value = document.getElementById('contact_no').value;
        document.getElementById("cmc_requesterSex").value = document.querySelector('select[name="requester_sex"]').value;
        document.getElementById("cmc_requesterAge").value = document.getElementById('requester_age').value;
        document.getElementById("cmc_requestType").value = document.getElementById('request_type').value;
        document.getElementById("cmc_husbandLName").value = document.getElementById('husband_last_name').value;
        document.getElementById("cmc_husbandFName").value = document.getElementById('husband_first_name').value;
        document.getElementById("cmc_husbandMName").value = document.getElementById('husband_middle_name').value;
        document.getElementById("cmc_wifeLName").value = document.getElementById('wife_last_name').value;
        document.getElementById("cmc_wifeFName").value = document.getElementById('wife_first_name').value;
        document.getElementById("cmc_wifeMName").value = document.getElementById('wife_middle_name').value;
        document.getElementById("cmc_dateOfMarriage").value = document.getElementById('date_of_marriage').value;
        document.getElementById("cmc_marriedAbroad").value = document.getElementById('married_abroad').value;
        document.getElementById("cmc_country").value = document.getElementById('country').value;
        document.getElementById("cmc_placeOfMarriage_cityMunicipality").value = document.getElementById('marriage_city_municipality').value;
        document.getElementById("cmc_placeOfMarriage_province").value = document.getElementById('marriage_province').value;
        document.getElementById("cmc_requestingParty").value = document.getElementById('requesting_party').value;
        document.getElementById("cmc_relationshipToOwner").value = document.getElementById('relationship_to_owner').value;
        let purposeSelect = document.getElementById("purpose");
        document.getElementById("cmc_purpose").value = purposeSelect.value;
        let otherPurposeInput = document.getElementById("purpose_other");
        if (purposeSelect.value === "Other") {
            document.getElementById("cmc_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cmc_otherPurpose").value = "";
        }if (purposeSelect.value === "Other") {
            document.getElementById("cmc_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cmc_otherPurpose").value = "";
        }
        // Copy delayed registration radio button selection
        let delayedRadio = document.querySelector('input[name="delayed"]:checked');
        if (delayedRadio) {
            document.getElementById("cmc_delayed").value = delayedRadio.value;
        }
        // Copy delayed date if applicable
        let delayedDateInput = document.getElementById("delayed_date");
        document.getElementById("cmc_delayedDate").value = delayedDateInput.value;

        // Copy appointment date
        document.getElementById("cmc_appointmentDate").value = document.getElementById("appointment_date").value;

        document.getElementById('confirmMarriageCert').classList.remove('hidden');
    }else if(selectedType === "Marriage License"){
        document.getElementById("cml_requesterLName").value = document.getElementById('requester_last_name').value;
        document.getElementById("cml_requesterFName").value = document.getElementById('requester_first_name').value;
        document.getElementById("cml_requesterMName").value = document.getElementById('requester_middle_name').value;
        document.getElementById("cml_requesterMailingAdd").value = document.getElementById('requester_mailing_address').value;
        document.getElementById("cml_requesterCityMunicipality").value = document.getElementById('requester_city_municipality').value;
        document.getElementById("cml_requesterProvince").value = document.getElementById('requester_province').value;
        document.getElementById("cml_contactNo").value = document.getElementById('contact_no').value;
        document.getElementById("cml_requesterSex").value = document.querySelector('select[name="requester_sex"]').value;
        document.getElementById("cml_requesterAge").value = document.getElementById('requester_age').value;
        document.getElementById("cml_requestType").value = document.getElementById('request_type').value;
        document.getElementById("cml_brn").value = document.getElementById('brn').value;
        document.getElementById("cml_applicantLName").value = document.getElementById('applicant_last_name').value;
        document.getElementById("cml_applicantFName").value = document.getElementById('applicant_first_name').value;
        document.getElementById("cml_applicantMName").value = document.getElementById('applicant_middle_name').value;
        document.getElementById("cml_spouseLName").value = document.getElementById('spouse_last_name').value;
        document.getElementById("cml_spouseFName").value = document.getElementById('spouse_first_name').value;
        document.getElementById("cml_spouseMName").value = document.getElementById('spouse_middle_name').value;
        document.getElementById("cml_plannedDateOfMarriage").value = document.getElementById('planned_date_of_marriage').value;
        document.getElementById("cml_placeOfMarriage").value = document.getElementById('place_of_marriage').value;
        document.getElementById("cml_requestingParty").value = document.getElementById('requesting_party').value;
        document.getElementById("cml_relationshipToOwner").value = document.getElementById('relationship_to_owner').value;
        let purposeSelect = document.getElementById("purpose");
        document.getElementById("cml_purpose").value = purposeSelect.value;
        // Copy "Other Purpose" input if visible
        let otherPurposeInput = document.getElementById("purpose_other");
        if (purposeSelect.value === "Other") {
            document.getElementById("cml_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cml_otherPurpose").value = "";
        }
        // Copy delayed registration radio button selection
        let delayedRadio = document.querySelector('input[name="delayed"]:checked');
        if (delayedRadio) {
            document.getElementById("cml_delayed").value = delayedRadio.value;
        }
        // Copy delayed date if applicable
        let delayedDateInput = document.getElementById("delayed_date");
        document.getElementById("cml_delayedDate").value = delayedDateInput.value;

        // Copy appointment date
        document.getElementById("cml_appointmentDate").value = document.getElementById("appointment_date").value;

        document.getElementById('confirmMarriageLicense').classList.remove('hidden');
    }else if(selectedType === "Death Certificate"){
        document.getElementById("cdc_requesterLName").value = document.getElementById('requester_last_name').value;
        document.getElementById("cdc_requesterFName").value = document.getElementById('requester_first_name').value;
        document.getElementById("cdc_requesterMName").value = document.getElementById('requester_middle_name').value;
        document.getElementById("cdc_requesterMailingAdd").value = document.getElementById('requester_mailing_address').value;
        document.getElementById("cdc_requesterCityMunicipality").value = document.getElementById('requester_city_municipality').value;
        document.getElementById("cdc_requesterProvince").value = document.getElementById('requester_province').value;
        document.getElementById("cdc_contactNo").value = document.getElementById('contact_no').value;
        document.getElementById("cdc_requesterSex").value = document.querySelector('select[name="requester_sex"]').value;
        document.getElementById("cdc_requesterAge").value = document.getElementById('requester_age').value;
        document.getElementById("cdc_requestType").value = document.getElementById('request_type').value;
        document.getElementById("cdc_brn").value = document.getElementById('brn').value;
        document.getElementById("cdc_deceasedLName").value = document.getElementById('deceased_last_name').value;
        document.getElementById("cdc_deceasedFName").value = document.getElementById('deceased_first_name').value;
        document.getElementById("cdc_deceasedMName").value = document.getElementById('deceased_middle_name').value;
        document.getElementById("cdc_dateOfDeath").value = document.getElementById('date_of_death').value;
        document.getElementById("cdc_diedAbroad").value = document.getElementById('died_abroad').value;
        document.getElementById("cdc_country").value = document.getElementById('country').value;
        document.getElementById("cdc_placeOfDeathCity").value = document.getElementById('death_city_municipality').value;
        document.getElementById("cdc_placeOfDeathProvince").value = document.getElementById('death_province').value;
        document.getElementById("cdc_requestingParty").value = document.getElementById('requesting_party').value;
        document.getElementById("cdc_relationshipToOwner").value = document.getElementById('relationship_to_owner').value;
        let purposeSelect = document.getElementById("purpose");
        document.getElementById("cdc_purpose").value = purposeSelect.value;
        // Copy "Other Purpose" input if visible
        let otherPurposeInput = document.getElementById("purpose_other");
        if (purposeSelect.value === "Other") {
            document.getElementById("cdc_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cdc_otherPurpose").value = "";
        }
        // Copy delayed registration radio button selection
        let delayedRadio = document.querySelector('input[name="delayed"]:checked');
        if (delayedRadio) {
            document.getElementById("cdc_delayed").value = delayedRadio.value;
        }
        // Copy delayed date if applicable
        let delayedDateInput = document.getElementById("delayed_date");
        document.getElementById("cdc_delayedDate").value = delayedDateInput.value;

        // Copy appointment date
        document.getElementById("cdc_appointmentDate").value = document.getElementById("appointment_date").value;

        document.getElementById('confirmDeathCert').classList.remove('hidden');
    }else if(selectedType === "Cenomar"){
        document.getElementById("cce_requesterLName").value = document.getElementById('requester_last_name').value;
        document.getElementById("cce_requesterFName").value = document.getElementById('requester_first_name').value;
        document.getElementById("cce_requesterMName").value = document.getElementById('requester_middle_name').value;
        document.getElementById("cce_requesterMailingAdd").value = document.getElementById('requester_mailing_address').value;
        document.getElementById("cce_requesterCityMunicipality").value = document.getElementById('requester_city_municipality').value;
        document.getElementById("cce_requesterProvince").value = document.getElementById('requester_province').value;
        document.getElementById("cce_contactNo").value = document.getElementById('contact_no').value;
        document.getElementById("cce_requesterSex").value = document.querySelector('select[name="requester_sex"]').value;
        document.getElementById("cce_requesterAge").value = document.getElementById('requester_age').value;
        document.getElementById("cce_requestType").value = document.getElementById('request_type').value;
        document.getElementById("cce_brn").value = document.getElementById('brn').value;
        document.getElementById("cce_personLName").value = document.getElementById('person_last_name').value;
        document.getElementById("cce_personFName").value = document.getElementById('person_first_name').value;
        document.getElementById("cce_personMName").value = document.getElementById('person_middle_name').value;
        document.getElementById("cce_personSex").value = document.getElementById('person_sex').value;
        document.getElementById("cce_dateOfBirth").value = document.getElementById('date_of_birth').value;
        document.getElementById("cce_bornAbroad").value = document.getElementById('born_abroad').value;
        document.getElementById("cce_country").value = document.getElementById('country').value;
        document.getElementById("cce_personAddressCity").value = document.getElementById('person_city_municipality').value;
        document.getElementById("cce_personAddressProvince").value = document.getElementById('person_province').value;
        document.getElementById("cce_fatherLName").value = document.getElementById('father_last_name').value;
        document.getElementById("cce_fatherFName").value = document.getElementById('father_first_name').value;
        document.getElementById("cce_fatherMName").value = document.getElementById('father_middle_name').value;
        document.getElementById("cce_motherLName").value = document.getElementById('mother_last_name').value;
        document.getElementById("cce_motherFName").value = document.getElementById('mother_first_name').value;
        document.getElementById("cce_motherMName").value = document.getElementById('mother_middle_name').value;
        document.getElementById("cce_requestingParty").value = document.getElementById('requesting_party').value;
        document.getElementById("cce_relationshipToOwner").value = document.getElementById('relationship_to_owner').value;
        let purposeSelect = document.getElementById("purpose");
        document.getElementById("cce_purpose").value = purposeSelect.value;
        // Copy "Other Purpose" input if visible
        let otherPurposeInput = document.getElementById("purpose_other");
        if (purposeSelect.value === "Other") {
            document.getElementById("cce_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cce_otherPurpose").value = "";
        }
        // Copy delayed registration radio button selection
        let delayedRadio = document.querySelector('input[name="delayed"]:checked');
        if (delayedRadio) {
            document.getElementById("cce_delayed").value = delayedRadio.value;
        }
        // Copy delayed date if applicable
        let delayedDateInput = document.getElementById("delayed_date");
        document.getElementById("cce_delayedDate").value = delayedDateInput.value;

        // Copy appointment date
        document.getElementById("cce_appointmentDate").value = document.getElementById("appointment_date").value;

        document.getElementById('confirmCenomar').classList.remove('hidden');
    }else if(selectedType === "Other Document"){
        document.getElementById("cod_requesterLName").value = document.getElementById('requester_last_name').value;
        document.getElementById("cod_requesterFName").value = document.getElementById('requester_first_name').value;
        document.getElementById("cod_requesterMName").value = document.getElementById('requester_middle_name').value;
        document.getElementById("cod_requesterMailingAdd").value = document.getElementById('requester_mailing_address').value;
        document.getElementById("cod_requesterCityMunicipality").value = document.getElementById('requester_city_municipality').value;
        document.getElementById("cod_requesterProvince").value = document.getElementById('requester_province').value;
        document.getElementById("cod_contactNo").value = document.getElementById('contact_no').value;
        document.getElementById("cod_requesterSex").value = document.querySelector('select[name="requester_sex"]').value;
        document.getElementById("cod_requesterAge").value = document.getElementById('requester_age').value;
        document.getElementById("cod_otherDocument").value = document.getElementById('other_document').value;
        document.getElementById("cod_documentDetails").value = document.getElementById('document_details').value;
        document.getElementById("cod_requestingParty").value = document.getElementById('requesting_party').value;
        document.getElementById("cod_relationshipToOwner").value = document.getElementById('relationship_to_owner').value;
        let purposeSelect = document.getElementById("purpose");
        document.getElementById("cod_purpose").value = purposeSelect.value;
        // Copy "Other Purpose" input if visible
        let otherPurposeInput = document.getElementById("purpose_other");
        if (purposeSelect.value === "Other") {
            document.getElementById("cod_otherPurpose").value = otherPurposeInput.value;
        } else {
            document.getElementById("cod_otherPurpose").value = "";
        }
        // Copy delayed registration radio button selection
        let delayedRadio = document.querySelector('input[name="delayed"]:checked');
        if (delayedRadio) {
            document.getElementById("cod_delayed").value = delayedRadio.value;
        }
        // Copy delayed date if applicable
        let delayedDateInput = document.getElementById("delayed_date");
        document.getElementById("cod_delayedDate").value = delayedDateInput.value;

        // Copy appointment date
        document.getElementById("cod_appointmentDate").value = document.getElementById("appointment_date").value;

        document.getElementById("confirmOtherDocument").classList.remove('hidden');
    }


    // Show the modal
    document.getElementById("confirmationModal").style.display = "block";
}

// if born abroad is true, show the input field for country
function toggleCountryField() {
    var bornAbroadCheckbox = document.getElementById("born_abroad");
    var countryContainer = document.getElementById("country_container");

    if (bornAbroadCheckbox.checked) {
        countryContainer.style.display = "block";
    } else {
        countryContainer.style.display = "none";
    }
}

// if married abroad is true, show the country input field
function toggleMarriageCountryField() {
    var marriedAbroadCheckbox = document.getElementById("married_abroad");
    var countryContainer = document.getElementById("country_container");

    if (marriedAbroadCheckbox.checked) {
        countryContainer.style.display = "block";
    } else {
        countryContainer.style.display = "none";
    }
}

// show other purposes input field if 'other' is selected
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

// show country input field if died abroad is true
function toggleCountryFieldForDeath() {
    var diedAbroadCheckbox = document.getElementById("died_abroad");
    var countryContainer = document.getElementById("country_container");

    if (diedAbroadCheckbox.checked) {
        countryContainer.style.display = "block";
    } else {
        countryContainer.style.display = "none";
    }
}

// cofirmation modal will close
function closeModal() {
    document.getElementById("confirmationModal").style.display = "none";
}

// form submit
function submitForm() {
    document.getElementById("appointment_form").submit();
}


// Function to prevent numeric input in specified fields
function preventNumbers(event) {
    this.value = this.value.replace(/[0-9]/g, ''); // Removes numeric characters immediately
}

// Function to apply restrictions after the form loads
function applyRestrictions() {
    var letterOnlyFields = [
        "child_last_name", "child_first_name", "child_middle_name",
        "father_last_name", "father_first_name", "father_middle_name",
        "mother_last_name", "mother_first_name", "mother_middle_name",
        "husband_last_name", "husband_first_name", "husband_middle_name",
        "wife_last_name", "wife_first_name", "wife_middle_name",
        "deceased_last_name", "deceased_first_name", "deceased_middle_name",
        "person_last_name", "person_first_name", "person_middle_name",
        "spouse_last_name", "spouse_first_name", "spouse_middle_name",
        "applicant_last_name", "applicant_first_name", "applicant_middle_name"
    ];

    letterOnlyFields.forEach(function (id) {
        var inputField = document.getElementById(id);
        if (inputField) {
            inputField.addEventListener("input", preventNumbers); // Listen for input changes
        }
    });
}

// Ensure the script runs after the DOM is fully loaded
document.addEventListener("DOMContentLoaded", applyRestrictions);

// Dynamic form
function showForm() {
    var selectedService = document.getElementById("appointment_type").value;
    var dynamicForm = document.getElementById("dynamic_form");

    

    if (selectedService === "Birth Certificate") {
        dynamicForm.innerHTML = `  
            <div class="section-header">Request Information</div>
            <div class="requestInfoWrapper">
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select id="request_type" name="request_type" required>
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
                <div class="form-group" style="margin-top: 15px;">
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
                    <input type="text" id="brn" name="brn" maxlength="14" class="numbers-only" placeholder="000000-0000000-0">
                </div>
            </div>
            <div class="section-header">BIRTH CERTIFICATE DETAILS</div>
            <h4>Person's/Child's Information</h4>
            <div class="form-group">
                <label for="child_last_name">Last Name: (if female, last name before marriage)</label>
                <input type="text" id="child_last_name" name="child_last_name" required>
            </div>
            <div class="form-group">
                <label for="child_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                <input type="text" id="child_first_name" name="child_first_name" required>
            </div>
            <div class="form-group">
                <label for="child_middle_name">Middle Name: (if female, middle name before marriage)</label>
                <input type="text" id="child_middle_name" name="child_middle_name">
            </div>
            <div class="form-group">
                <label>Sex:</label>
                <select id="child_sex" name="child_sex" required>
                    <option value="" selected disabled>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" id="bc_date_of_birth" name="date_of_birth" required>
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
                <select id="request_type" name="request_type" required>
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
            <div class="form-group married-abroad">
            <label>Place of Marriage:</label>
                <div class="form-group married-abroad" style="position: relative;">
                <div style="position: absolute; left: 0; top: 0;">
                   <input type="checkbox" id="married_abroad" onclick="toggleMarriageCountryField()">
                </div>
                <label for="married_abroad" style="padding-left: 25px; font-size: 14px;">Married Abroad</label>
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
            <select id="request_type" name="request_type" required>
                <option value="" selected disabled>Select Request Type</option>
                <option value="Marriage Certificate">Marriage Certificate</option>
                <option value="Authentication">Authentication</option>
                <option value="CD/LI">CD/LI</option>
            </select>
            </div>
           
            <div class="form-group">
                <label for="brn">Birth Reference Number (BRN):</label>
                <input type="text" name="brn" id="brn" maxlength="11" placeholder="0-000-0000000">
            </div>
            <div class="form-group">
            <div class="section-header">Marriage License Information</div>    
            <!-- Applicant's Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="applicant_last_name">Last Name:</label>
                            <input type="text" id="applicant_last_name" name="applicant_last_name" required>
                    </div>

                    <div class="form-group">
                        <label for="applicant_first_name">First Name:</label>
                        <input type="text" id="applicant_first_name" name="applicant_first_name" required>
                    </div>

                        <div class="form-group">
                            <label for="applicant_middle_name">Middle Name:</label>
                            <input type="text" id="applicant_middle_name" name="applicant_middle_name">
                        </div>
                    </div>

                    <!-- Spouse's Information -->
        <div class="form-group"><strong>Spouse's Information</strong></div>
        <div class="form-row">
            <div class="form-group">
                <label for="spouse_last_name">Last Name:</label>
                <input type="text" id="spouse_last_name" name="spouse_last_name" required>
            </div>

            <div class="form-group">
                <label for="spouse_first_name">First Name:</label>
                <input type="text" id="spouse_first_name" name="spouse_first_name" required>
            </div>

            <div class="form-group">
                <label for="spouse_middle_name">Middle Name:</label>
                <input type="text" id="spouse_middle_name" name="spouse_middle_name">
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
                <input type="text" id="place_of_marriage" name="place_of_marriage" required>
            </div>
        </div>
        `;
           
    } else if (selectedService === "Death Certificate") {
        dynamicForm.innerHTML = `
        <div class="section-header">Request Information</div>
            <div class="form-group">
                <label for="request_type">Request Type:</label>
                <select id="request_type" name="request_type" required>
                    <option value="" selected disabled>Select Request Type</option>
                    <option value="Death Certificate">Death Certificate</option>
                    <option value="Authentication">Authentication</option>
                    <option value="CD/LI">CD/LI</option>
                </select>
            </div>
        </div>

            <div class="form-group">
                <label for="brn">Birth Reference Number (BRN):</label>
                <input type="text" id="brn" name="brn" maxlength="14" placeholder="000000-0000000-0">
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
                <select id="request_type" name="request_type" required>
                    <option value="" selected disabled>Select Request Type</option>
                    <option value="Certificate of No Marriage (CENOMAR)">Certificate of No Marriage (CENOMAR)</option>
                    <option value="Viewable Online">Viewable Online</option>
                    <option value="DocPrint">DocPrint</option>
                </select>
            </div>
            <div class="form-group">
                        <label for="brn">Birth Reference Number (BRN):</label>
                        <input type="text" id="brn" name="brn" maxlength="14" placeholder="000000-0000000-0">
                </div>
                <div class="section-header">BIRTH DETAILS</div>
                    <h4>Person's Information</h4>
                        <div class="form-group">
                            <label for="person_last_name">Last Name: (if female, last name before marriage)</label>
                            <input type="text" id="person_last_name" name="person_last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="person_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                            <input type="text" id="person_first_name" name="person_first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="person_middle_name">Middle Name: (if female, middle name before marriage)</label>
                            <input type="text" id="person_middle_name" name="person_middle_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sex:</label>
                        <select id="person_sex" name="person_sex" required>
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
                            <!-- Hidden input ensures "0" is sent if the checkbox is unchecked -->
                            <input type="hidden" name="born_abroad" value="0">
                            
                            <!-- Checkbox now sends "1" when checked -->
                            <input type="checkbox" id="born_abroad" name="born_abroad" value="1" onclick="toggleCountryField()">
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
                    </div>`;

    } else if (selectedService === "Other Document") {
        dynamicForm.innerHTML = `
       
        <div class="form-group">
            <label for="other_document">Specify Document:</label>
            <input type="text" id="other_document" name="other_document" placeholder="e.g., Barangay Clearance" required>
        </div>

        <div class="form-group">
            <label for="document_details">Document Details:</label>
            <textarea id="document_details" name="document_details" rows="4" placeholder="Provide additional details about the document" required></textarea>
        </div>`;

    }
    applyRestrictions();
}

// If user press enter, it prevent submitting esp if field with required
document.getElementById("appointment_form").addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        validateForm();
    }
});

function validateForm() {
    const form = document.getElementById("appointment_form");
    const inputs = form.querySelectorAll("[required]");
    let isValid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add("error");
            isValid = false;
        } else {
            input.classList.remove("error");
        }
    });

    if (!isValid) {
        alert("Please fill out all required fields.");
    }
}
document.getElementById('appointment_form').addEventListener('submit', function (event) {
    console.log(new FormData(this)); // Log form data to check missing fields
});

