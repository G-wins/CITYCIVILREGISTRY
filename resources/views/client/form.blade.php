<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>City Civil Registry</title>

    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="{{ asset('js/form.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                    <input type="text" id="requester_last_name" name="requester_last_name" class="alphabet-only" required>
                </div>
                <div class="form-group">
                    <label for="requester_first_name">First Name:</label>
                    <input type="text" id="requester_first_name" name="requester_first_name" class="alphabet-only" required>
                </div>
                <div class="form-group">
                    <label for="requester_middle_name">Middle Name:</label>
                    <input type="text" id="requester_middle_name" name="requester_middle_name" class="alphabet-only">
                </div>
            </div>

            <div class="form-group">
                <label for="requester_mailing_address">Mailing Address:</label>
                <input type="text" id="requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                <small class="hint">House No., Street Name / Barangay</small>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="requester_city_municipality">City/Municipality:</label>
                    <input type="text" id="requester_city_municipality" name="requester_city_municipality" class="alphabet-only" required>
                </div>
                <div class="form-group">
                    <label for="requester_province">Province:</label>
                    <input type="text" id="requester_province" name="requester_province" class="alphabet-only" required>
                </div>
            </div>
                
            <div class="form-row">
                <div class="form-group">
                    <label for="contact_no">Contact Number:</label>
                    <div class="contact-container" style="display: flex;">
                        <span class="country-code">+63</span>
                        <input type="tel" name="contact_no" id="contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                    </div>
                </div>
          
       
                <div class="form-group">
                    <label for="requester_sex">Sex:</label>
                    <select id="requester_sex" name="requester_sex" required>
                        <option value="" selected disabled>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="requester_age">Age:</label>
                    <input type="number" name="requester_age" id="requester_age" min="1" max="120" required oninput="checkAgeLimit()">
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
                <input type="text" id="requesting_party" name="requesting_party" class="alphabet-only" required><br>
            </div>

            <div class="form-group">
                <label for="relationship_to_owner">Relationship to Owner:</label>
                <input type="text" id="relationship_to_owner" name="relationship_to_owner" class="alphabet-only" required><br>
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
                <input type="text" name="other_purposes" id="purpose_other" placeholder="Specify if other" style="display: none; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label>Delayed Registration:</label>
                <div class="radio-group">
                    <input type="radio" id="delayed_yes" name="delayed" value="Yes" onclick="toggleDelayedDate()" required>
                    <label for="delayed_yes">Yes</label>
                    <input type="radio" id="delayed_no" name="delayed" value="No" checked onclick="toggleDelayedDate()" required>
                    <label for="delayed_no">No</label>
                </div>
            </div>

            <div class="form-group" id="delayed_date_container" style="display:none;">
                <label for="delayed_date">Delayed Date:</label>
                <input type="date" id="delayed_date" name="delayed_date">
            </div>

            <div class=" form-group input-with-icon">
                <label for="appointment_date">Appointment Date:</label>
                <input type="text" name="appointment_date" id="appointment_date" autocomplete="off" required>
            </div>
            <button type="button" id="submit_btn" class="btn btn-primary w-100 py-2 mt-2" onclick="showConfirmation()">Next</button>
        </form> 
    </div>
     


    <div id="confirmationModal" class="modal hidden">
        <div class="modal-content">
            <h3>Confirm Your Details</h3>
            <div id="modal_content">
                <div id="confirmBirthCert" class="hidden">
                    <div class="field">
                        <label>Requester last name:</label>
                        <input type="text" disabled id="cbc_requesterLName">
                    </div>
                    <div class="field">
                        <label>Requester first name:</label>
                        <input type="text" disabled id="cbc_requesterFName">
                    </div>
                    <div class="field">
                        <label>Requester middle name:</label>
                        <input type="text" disabled id="cbc_requesterMName">
                    </div>
                    <div class="field">
                        <label>Requester mailing address:</label>
                        <input type="text" disabled id="cbc_requesterMailingAdd">
                    </div>
                    <div class="field">
                        <label>Requester city/municipality:</label>
                        <input type="text" disabled id="cbc_requesterCityMunicipality">
                    </div>
                    <div class="field">
                        <label>Requester province:</label>
                        <input type="text" disabled id="cbc_requesterProvince">
                    </div>
                    <div class="field">
                        <label>Contact number:</label>
                        <input type="text" disabled id="cbc_contactNo">
                    </div>
                    <div class="field">
                        <label>Requester sex:</label>
                        <input type="text" disabled id="cbc_requesterSex">
                    </div>
                    <div class="field">
                        <label>Requester age:</label>
                        <input type="text" disabled id="cbc_requesterAge">
                    </div>
                    <div class="field">
                        <label>Requester type:</label>
                        <input type="text" disabled id="cbc_requestType">
                    </div>
                    <div class="field">
                        <label>Certificate of convertion:</label>
                        <input type="text" disabled id="cbc_certificateOfConvertion">
                    </div>
                    <div class="field">
                        <label>BRN:</label>
                        <input type="text" disabled id="cbc_brn">
                    </div>
                    <div class="field">
                        <label>Child last name:</label>
                        <input type="text" disabled id="cbc_childLName">
                    </div>
                    <div class="field">
                        <label>Child first name:</label>
                        <input type="text" disabled id="cbc_childFName">
                    </div>
                    <div class="field">
                        <label>Child middle name:</label>
                        <input type="text" disabled id="cbc_childMName">
                    </div>
                    <div class="field">
                        <label>Child sex:</label>
                        <input type="text" disabled id="cbc_childSex">
                    </div>
                    <div class="field">
                        <label>Date of birth:</label>
                        <input type="text" disabled id="cbc_dateOfBirth">
                    </div>
                    <div class="field">
                        <label>Born abroad?:</label>
                        <input type="text" disabled id="cbc_bornAbroad">
                    </div>
                    <div class="field">
                        <label>Country:</label>
                        <input type="text" disabled id="cbc_country">
                    </div>
                    <div class="field">
                        <label>Place of birth (City/Municipality):</label>
                        <input type="text" disabled id="cbc_placeOfBirth_cityMunicipality">
                    </div>
                    <div class="field">
                        <label>Place of birth (Province):</label>
                        <input type="text" disabled id="cbc_placeOfBirth_province">
                    </div>
                    <div class="field">
                        <label>Father's last name:</label>
                        <input type="text" disabled id="cbc_fatherLName">
                    </div>
                    <div class="field">
                        <label>Father's first name:</label>
                        <input type="text" disabled id="cbc_fatherFName">
                    </div>
                    <div class="field">
                        <label>Father's middle name:</label>
                        <input type="text" disabled id="cbc_fatherMName">
                    </div>
                    <div class="field">
                        <label>Mother's last name:</label>
                        <input type="text" disabled id="cbc_motherLName">
                    </div>
                    <div class="field">
                        <label>Mother's first name:</label>
                        <input type="text" disabled id="cbc_motherFName">
                    </div>
                    <div class="field">
                        <label>Mother's middle name</label>
                        <input type="text" disabled id="cbc_motherMName">
                    </div>
                    <div class="field">
                        <label>Requesting party:</label>
                        <input type="text" disabled id="cbc_requestingParty">
                    </div>
                    <div class="field">
                        <label>Relationship to owner:</label>
                        <input type="text" disabled id="cbc_relationshipToOwner">
                    </div>
                    <div class="field">
                        <label>Purpose:</label>
                        <input type="text" disabled id="cbc_purpose">
                    </div>
                    <div class="field">
                        <label>Other purpose:</label>
                        <input type="text" disabled id="cbc_otherPurpose">
                    </div>
                    <div class="field">
                        <label>Delayed?:</label>
                        <input type="text" disabled id="cbc_delayed">
                    </div>
                    <div class="field">
                        <label>Delayed date:</label>
                        <input type="text" disabled id="cbc_delayedDate">
                    </div>
                    <div class="field">
                        <label>Appointment date:</label>
                        <input type="text" disabled id="cbc_appointmentDate">
                    </div>
                </div>
                <div id="confirmMarriageCert" class="hidden">
                    <div class="field">
                        <label>Requester last name:</label>
                        <input type="text" disabled id="cmc_requesterLName">
                    </div>
                    <div class="field">
                        <label>Requester first name:</label>
                        <input type="text" disabled id="cmc_requesterFName">
                    </div>
                    <div class="field">
                        <label>Requester middle name:</label>
                        <input type="text" disabled id="cmc_requesterMName">
                    </div>
                    <div class="field">
                        <label>Requester mailing address:</label>
                        <input type="text" disabled id="cmc_requesterMailingAdd">
                    </div>
                    <div class="field">
                        <label>Requester city/municipality:</label>
                        <input type="text" disabled id="cmc_requesterCityMunicipality">
                    </div>
                    <div class="field">
                        <label>Requester province:</label>
                        <input type="text" disabled id="cmc_requesterProvince">
                    </div>
                    <div class="field">
                        <label>Contact number:</label>
                        <input type="text" disabled id="cmc_contactNo">
                    </div>
                    <div class="field">
                        <label>Requester sex:</label>
                        <input type="text" disabled id="cmc_requesterSex">
                    </div>
                    <div class="field">
                        <label>Requester age:</label>
                        <input type="text" disabled id="cmc_requesterAge">
                    </div>
                    <div class="field">
                        <label>Requester type:</label>
                        <input type="text" disabled id="cmc_requestType">
                    </div>
                    <div class="field">
                        <label>Husband's last name:</label>
                        <input type="text" disabled id="cmc_husbandLName">
                    </div>
                    <div class="field">
                        <label>Husband's first name:</label>
                        <input type="text" disabled id="cmc_husbandFName">
                    </div>
                    <div class="field">
                        <label>Husband's middle name:</label>
                        <input type="text" disabled id="cmc_husbandMName">
                    </div>
                    <div class="field">
                        <label>Wife's last name:</label>
                        <input type="text" disabled id="cmc_wifeLName">
                    </div>
                    <div class="field">
                        <label>Wife's first name:</label>
                        <input type="text" disabled id="cmc_wifeFName">
                    </div>
                    <div class="field">
                        <label>Wife's middle name:</label>
                        <input type="text" disabled id="cmc_wifeMName">
                    </div>
                    <div class="field">
                        <label>Date of marriage:</label>
                        <input type="text" disabled id="cmc_dateOfMarriage">
                    </div>
                    <div class="field">
                        <label>Married abroad?:</label>
                        <input type="text" disabled id="cmc_marriedAbroad">
                    </div>
                    <div class="field">
                        <label>Country:</label>
                        <input type="text" disabled id="cmc_country">
                    </div>
                    <div class="field">
                        <label>Place of marriage (City/Municipality):</label>
                        <input type="text" disabled id="cmc_placeOfMarriage_cityMunicipality">
                    </div>
                    <div class="field">
                        <label>Place of marriage (Province):</label>
                        <input type="text" disabled id="cmc_placeOfMarriage_province">
                    </div>
                    <div class="field">
                        <label>Requesting party:</label>
                        <input type="text" disabled id="cmc_requestingParty">
                    </div>
                    <div class="field">
                        <label>Relationship to owner:</label>
                        <input type="text" disabled id="cmc_relationshipToOwner">
                    </div>
                    <div class="field">
                        <label>Purpose:</label>
                        <input type="text" disabled id="cmc_purpose">
                    </div>
                    <div class="field">
                        <label>Other purpose:</label>
                        <input type="text" disabled id="cmc_otherPurpose">
                    </div>
                    <div class="field">
                        <label>Delayed?:</label>
                        <input type="text" disabled id="cmc_delayed">
                    </div>
                    <div class="field">
                        <label>Delayed date:</label>
                        <input type="text" disabled id="cmc_delayedDate">
                    </div>
                    <div class="field">
                        <label>Appointment date:</label>
                        <input type="text" disabled id="cmc_appointmentDate">
                    </div>
                </div>
                <div id="confirmMarriageLicense" class="hidden">
                    <div class="field">
                        <label>Requester last name:</label>
                        <input type="text" disabled id="cml_requesterLName">
                    </div>
                    <div class="field">
                        <label>Requester first name:</label>
                        <input type="text" disabled id="cml_requesterFName">
                    </div>
                    <div class="field">
                        <label>Requester middle name:</label>
                        <input type="text" disabled id="cml_requesterMName">
                    </div>
                    <div class="field">
                        <label>Requester mailing address:</label>
                        <input type="text" disabled id="cml_requesterMailingAdd">
                    </div>
                    <div class="field">
                        <label>Requester city/municipality:</label>
                        <input type="text" disabled id="cml_requesterCityMunicipality">
                    </div>
                    <div class="field">
                        <label>Requester province:</label>
                        <input type="text" disabled id="cml_requesterProvince">
                    </div>
                    <div class="field">
                        <label>Contact number:</label>
                        <input type="text" disabled id="cml_contactNo">
                    </div>
                    <div class="field">
                        <label>Requester sex:</label>
                        <input type="text" disabled id="cml_requesterSex">
                    </div>
                    <div class="field">
                        <label>Requester age:</label>
                        <input type="text" disabled id="cml_requesterAge">
                    </div>
                    <div class="field">
                        <label>Requester type:</label>
                        <input type="text" disabled id="cml_requestType">
                    </div>
                    <div class="field">
                        <label>BRN:</label>
                        <input type="text" disabled id="cml_brn">
                    </div>
                    <div class="field">
                        <label>Applicant's last name:</label>
                        <input type="text" disabled id="cml_applicantLName">
                    </div>
                    <div class="field">
                        <label>Applicant's first name:</label>
                        <input type="text" disabled id="cml_applicantFName">
                    </div>
                    <div class="field">
                        <label>Applicant's middle name:</label>
                        <input type="text" disabled id="cml_applicantMName">
                    </div>
                    <div class="field">
                        <label>Spouse's last name:</label>
                        <input type="text" disabled id="cml_spouseLName">
                    </div>
                    <div class="field">
                        <label>Spouse's first name:</label>
                        <input type="text" disabled id="cml_spouseFName">
                    </div>
                    <div class="field">
                        <label>Spouse's middle name:</label>
                        <input type="text" disabled id="cml_spouseMName">
                    </div>
                    <div class="field">
                        <label>Planned date of marriage:</label>
                        <input type="text" disabled id="cml_plannedDateOfMarriage">
                    </div>
                    <div class="field">
                        <label>Place of marriage:</label>
                        <input type="text" disabled id="cml_placeOfMarriage">
                    </div>
                    <div class="field">
                        <label>Requesting party:</label>
                        <input type="text" disabled id="cml_requestingParty">
                    </div>
                    <div class="field">
                        <label>Relationship to owner:</label>
                        <input type="text" disabled id="cml_relationshipToOwner">
                    </div>
                    <div class="field">
                        <label>Purpose:</label>
                        <input type="text" disabled id="cml_purpose">
                    </div>
                    <div class="field">
                        <label>Other purpose:</label>
                        <input type="text" disabled id="cml_otherPurpose">
                    </div>
                    <div class="field">
                        <label>Delayed?:</label>
                        <input type="text" disabled id="cml_delayed">
                    </div>
                    <div class="field">
                        <label>Delayed date:</label>
                        <input type="text" disabled id="cml_delayedDate">
                    </div>
                    <div class="field">
                        <label>Appointment date:</label>
                        <input type="text" disabled id="cml_appointmentDate">
                    </div>
                    
                </div>
                <div id="confirmDeathCert" class="hidden">
                    <div class="field">
                        <label>Requester last name:</label>
                        <input type="text" disabled id="cdc_requesterLName">
                    </div>
                    <div class="field">
                        <label>Requester first name:</label>
                        <input type="text" disabled id="cdc_requesterFName">
                    </div>
                    <div class="field">
                        <label>Requester middle name:</label>
                        <input type="text" disabled id="cdc_requesterMName">
                    </div>
                    <div class="field">
                        <label>Requester mailing address:</label>
                        <input type="text" disabled id="cdc_requesterMailingAdd">
                    </div>
                    <div class="field">
                        <label>Requester city/municipality:</label>
                        <input type="text" disabled id="cdc_requesterCityMunicipality">
                    </div>
                    <div class="field">
                        <label>Requester province:</label>
                        <input type="text" disabled id="cdc_requesterProvince">
                    </div>
                    <div class="field">
                        <label>Contact number:</label>
                        <input type="text" disabled id="cdc_contactNo">
                    </div>
                    <div class="field">
                        <label>Requester sex:</label>
                        <input type="text" disabled id="cdc_requesterSex">
                    </div>
                    <div class="field">
                        <label>Requester age:</label>
                        <input type="text" disabled id="cdc_requesterAge">
                    </div>
                    <div class="field">
                        <label>Requester type:</label>
                        <input type="text" disabled id="cdc_requestType">
                    </div>
                    <div class="field">
                        <label>BRN:</label>
                        <input type="text" disabled id="cdc_brn">
                    </div>
                    <div class="field">
                        <label>Deceased's last name:</label>
                        <input type="text" disabled id="cdc_deceasedLName">
                    </div>
                    <div class="field">
                        <label>Deceased's first name:</label>
                        <input type="text" disabled id="cdc_deceasedFName">
                    </div>
                    <div class="field">
                        <label>Deceased's middle name:</label>
                        <input type="text" disabled id="cdc_deceasedMName">
                    </div>
                    <div class="field">
                        <label>Date of death: </label>
                        <input type="text" disabled id="cdc_dateOfDeath">
                    </div>
                    <div class="field">
                        <label>Died abroad?:</label>
                        <input type="text" disabled id="cdc_diedAbroad">
                    </div>
                    <div class="field">
                        <label>Country:</label>
                        <input type="text" disabled id="cdc_country">
                    </div>
                    <div class="field">
                        <label>Place of death (City/Municipality):</label>
                        <input type="text" disabled id="cdc_placeOfDeathCity">
                    </div>
                    <div class="field">
                        <label>Place of death (Province):</label>
                        <input type="text" disabled id="cdc_placeOfDeathProvince">
                    </div>
                    <div class="field">
                        <label>Requesting party:</label>
                        <input type="text" disabled id="cdc_requestingParty">
                    </div>
                    <div class="field">
                        <label>Relationship to owner:</label>
                        <input type="text" disabled id="cdc_relationshipToOwner">
                    </div>
                    <div class="field">
                        <label>Purpose:</label>
                        <input type="text" disabled id="cdc_purpose">
                    </div>
                    <div class="field">
                        <label>Other purpose:</label>
                        <input type="text" disabled id="cdc_otherPurpose">
                    </div>
                    <div class="field">
                        <label>Delayed?:</label>
                        <input type="text" disabled id="cdc_delayed">
                    </div>
                    <div class="field">
                        <label>Delayed date:</label>
                        <input type="text" disabled id="cdc_delayedDate">
                    </div>
                    <div class="field">
                        <label>Appointment date:</label>
                        <input type="text" disabled id="cdc_appointmentDate">
                    </div>
                </div>
                <div id="confirmCenomar" class="hidden">
                    <div class="field">
                        <label>Requester last name:</label>
                        <input type="text" disabled id="cce_requesterLName">
                    </div>
                    <div class="field">
                        <label>Requester first name:</label>
                        <input type="text" disabled id="cce_requesterFName">
                    </div>
                    <div class="field">
                        <label>Requester middle name:</label>
                        <input type="text" disabled id="cce_requesterMName">
                    </div>
                    <div class="field">
                        <label>Requester mailing address:</label>
                        <input type="text" disabled id="cce_requesterMailingAdd">
                    </div>
                    <div class="field">
                        <label>Requester city/municipality:</label>
                        <input type="text" disabled id="cce_requesterCityMunicipality">
                    </div>
                    <div class="field">
                        <label>Requester province:</label>
                        <input type="text" disabled id="cce_requesterProvince">
                    </div>
                    <div class="field">
                        <label>Contact number:</label>
                        <input type="text" disabled id="cce_contactNo">
                    </div>
                    <div class="field">
                        <label>Requester sex:</label>
                        <input type="text" disabled id="cce_requesterSex">
                    </div>
                    <div class="field">
                        <label>Requester age:</label>
                        <input type="text" disabled id="cce_requesterAge">
                    </div>
                    <div class="field">
                        <label>Requester type:</label>
                        <input type="text" disabled id="cce_requestType">
                    </div>
                    <div class="field">
                        <label>BRN:</label>
                        <input type="text" disabled id="cce_brn">
                    </div>
                    <div class="field">
                        <label>Person's last name:</label>
                        <input type="text" disabled id="cce_personLName">
                    </div>
                    <div class="field">
                        <label>Person's first name:</label>
                        <input type="text" disabled id="cce_personFName">
                    </div>
                    <div class="field">
                        <label>Person's middle name:</label>
                        <input type="text" disabled id="cce_personMName">
                    </div>
                    <div class="field">
                        <label>Person sex:</label>
                        <input type="text" disabled id="cce_personSex">
                    </div>
                    <div class="field">
                        <label>Date of birth:</label>
                        <input type="text" disabled id="cce_dateOfBirth">
                    </div>
                    <div class="field">
                        <label>Born abroad?:</label>
                        <input type="text" disabled id="cce_bornAbroad">
                    </div>
                    <div class="field">
                        <label>Country:</label>
                        <input type="text" disabled id="cce_country">
                    </div>
                    <div class="field">
                        <label>Address (City/Municipality):</label>
                        <input type="text" disabled id="cce_personAddressCity">
                    </div>
                    <div class="field">
                        <label>Address (Province):</label>
                        <input type="text" disabled id="cce_personAddressProvince">
                    </div>
                    <div class="field">
                        <label>Father's last name:</label>
                        <input type="text" disabled id="cce_fatherLName">
                    </div>
                    <div class="field">
                        <label>Father's first name:</label>
                        <input type="text" disabled id="cce_fatherFName">
                    </div>
                    <div class="field">
                        <label>Father's middle name:</label>
                        <input type="text" disabled id="cce_fatherMName">
                    </div>
                    <div class="field">
                        <label>Mother's last name:</label>
                        <input type="text" disabled id="cce_motherLName">
                    </div>
                    <div class="field">
                        <label>Mother's first name:</label>
                        <input type="text" disabled id="cce_motherFName">
                    </div>
                    <div class="field">
                        <label>Mother's middle name:</label>
                        <input type="text" disabled id="cce_motherMName">
                    </div>
                    <div class="field">
                        <label>Requesting party:</label>
                        <input type="text" disabled id="cce_requestingParty">
                    </div>
                    <div class="field">
                        <label>Relationship to owner:</label>
                        <input type="text" disabled id="cce_relationshipToOwner">
                    </div>
                    <div class="field">
                        <label>Purpose:</label>
                        <input type="text" disabled id="cce_purpose">
                    </div>
                    <div class="field">
                        <label>Other purpose:</label>
                        <input type="text" disabled id="cce_otherPurpose">
                    </div>
                    <div class="field">
                        <label>Delayed?:</label>
                        <input type="text" disabled id="cce_delayed">
                    </div>
                    <div class="field">
                        <label>Delayed date:</label>
                        <input type="text" disabled id="cce_delayedDate">
                    </div>
                    <div class="field">
                        <label>Appointment date:</label>
                        <input type="text" disabled id="cce_appointmentDate">
                    </div>
                </div>
                <div id="confirmOtherDocument" class="hidden">
                    <div class="field">
                        <label>Requester last name:</label>
                        <input type="text" disabled id="cod_requesterLName">
                    </div>
                    <div class="field">
                        <label>Requester first name:</label>
                        <input type="text" disabled id="cod_requesterFName">
                    </div>
                    <div class="field">
                        <label>Requester middle name:</label>
                        <input type="text" disabled id="cod_requesterMName">
                    </div>
                    <div class="field">
                        <label>Requester mailing address:</label>
                        <input type="text" disabled id="cod_requesterMailingAdd">
                    </div>
                    <div class="field">
                        <label>Requester city/municipality:</label>
                        <input type="text" disabled id="cod_requesterCityMunicipality">
                    </div>
                    <div class="field">
                        <label>Requester province:</label>
                        <input type="text" disabled id="cod_requesterProvince">
                    </div>
                    <div class="field">
                        <label>Contact number:</label>
                        <input type="text" disabled id="cod_contactNo">
                    </div>
                    <div class="field">
                        <label>Requester sex:</label>
                        <input type="text" disabled id="cod_requesterSex">
                    </div>
                    <div class="field">
                        <label>Requester age:</label>
                        <input type="text" disabled id="cod_requesterAge">
                    </div>
                    <div class="field">
                        <label>Other document:</label>
                        <input type="text" disabled id="cod_otherDocument">
                    </div>
                    <div class="field">
                        <label>Document details:</label>
                        <input type="text" disabled id="cod_documentDetails">
                    </div>
                    <div class="field">
                        <label>Requesting party:</label>
                        <input type="text" disabled id="cod_requestingParty">
                    </div>
                    <div class="field">
                        <label>Relationship to owner:</label>
                        <input type="text" disabled id="cod_relationshipToOwner">
                    </div>
                    <div class="field">
                        <label>Purpose:</label>
                        <input type="text" disabled id="cod_purpose">
                    </div>
                    <div class="field">
                        <label>Other purpose:</label>
                        <input type="text" disabled id="cod_otherPurpose">
                    </div>
                    <div class="field">
                        <label>Delayed?:</label>
                        <input type="text" disabled id="cod_delayed">
                    </div>
                    <div class="field">
                        <label>Delayed date:</label>
                        <input type="text" disabled id="cod_delayedDate">
                    </div>
                    <div class="field">
                        <label>Appointment date:</label>
                        <input type="text" disabled id="cod_appointmentDate">
                    </div>

                </div>
            </div>

            <button type="button" onclick="submitForm()">Confirm</button>
            <button type="button" onclick="closeModal()">Cancel</button>
        </div>
    </div>

<script>
    // prevent numerical characters to specific input field
    document.addEventListener("DOMContentLoaded", function() {
        const alphabetInputs = document.querySelectorAll(".alphabet-only");

        alphabetInputs.forEach(input => {
            input.addEventListener("input", function() {
                this.value = this.value.replace(/[^A-Za-z\s]/g, '');
            });
        });
    });
    

    //APPOINTMENT CALENDAR
    $(document).ready(function () {
        // Ensure jQuery UI Datepicker is loaded
        if (!$.fn.datepicker) {
            console.error("Error: jQuery UI Datepicker is not loaded!");
            return;
        }

        // Inject Custom CSS for Proper Datepicker Alignment
        const style = document.createElement('style');
        style.innerHTML = `
            /* Ensure Datepicker Appears Above Input */
            .ui-datepicker {
                z-index: 1050 !important;
                font-size: 1.2em !important;
                background-color: #ffffff !important;
                border: 1px solid #ddd !important;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                height: auto !important;
                padding: 15px;
                border-radius: 8px;
                display: none; /* Hidden by default */
                position: absolute !important;
                width: auto !important;
            }

            /* Unavailable Dates */
            .unavailable-date a {
                background-color: #f44336 !important;
                color: white !important;
                pointer-events: none;
                opacity: 0.7;
            }
        `;
        document.head.appendChild(style);

        // Function to dynamically position and resize the datepicker ABOVE the input field
        function updateDatepickerPosition() {
            var $input = $("#appointment_date");
            var datepicker = $(".ui-datepicker");

            if ($input.length && datepicker.length && datepicker.is(":visible")) {
                var inputOffset = $input.offset();
                var inputWidth = $input.outerWidth();
                var inputHeight = $input.outerHeight();

                // Ensure the datepicker is always positioned ABOVE the input field
                datepicker.css({
                    position: "absolute",
                    top: inputOffset.top - datepicker.outerHeight() - 5, // Position above input
                    left: inputOffset.left,
                    width: inputWidth + "px", // Match input width
                    display: "block"
                });
            }
        }

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
                    beforeShow: function () {
                        updateDatepickerPosition();
                    },
                    beforeShowDay: function (date) {
                        var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                        var day = date.getDay();

                        // Disable weekends and unavailable dates
                        if (day === 0 || day === 6 || bookedDates.includes(formattedDate)) {
                            return [false, 'unavailable-date', 'Unavailable'];
                        }
                        return [true, '', 'Available'];
                    }
                });
            },
            error: function () {
                console.error("Error fetching unavailable dates.");
            }
        });

        // **Fix Flickering & Ensure Datepicker Stays Above**
        let resizeTimeout;
        $(window).on("resize", function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateDatepickerPosition, 50); // Adjust position on resize
        });

        // Ensure Datepicker Shows & Updates Position Correctly
        $("#appointment_date").on("focus", function () {
            $(this).datepicker("show");
            updateDatepickerPosition(); // Update position dynamically
        }).on("blur", function () {
            setTimeout(updateDatepickerPosition, 50); // Ensure proper positioning
        });
    });
</script>
</body>
</html>