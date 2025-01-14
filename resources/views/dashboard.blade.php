<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    /* Match calendar width to input field */
    .flatpickr-calendar {
        width: 100% !important; /* Ensure the calendar width matches the input field width */
        max-width: none; /* Prevent any maximum width restriction */
    }

    /* Adjust individual day size for more space */
    .flatpickr-day {
        width: 60px; /* Increase width */
        height: 60px; /* Increase height */
        line-height: 60px; /* Center the day number */
        position: relative; /* Allow slot text to be positioned below */
    }

    /* Style the slots left text */
    .flatpickr-day div {
        position: absolute;
        bottom: 5px; /* Position text at the bottom of each day */
        left: 50%;
        transform: translateX(-50%);
        font-size: 12px; /* Adjust font size for better readability */
        color: green; /* Default color for available slots */
        font-weight: bold;
    }

    /* Style for disabled days */
    .flatpickr-day.flatpickr-disabled div {
        color: red; /* Change slot text color for full days */
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
        .flatpickr-day {
            width: 45px;
            height: 45px;
            line-height: 45px;
        }

        .flatpickr-day div {
            font-size: 10px;
        }
    }

    .wrap{
        overflow-y: auto;
    }

    /* Modal backdrop - covers the entire page with a slight blur */
    #marriageCertificateModal, #birthCertificateModal, #marriageLicenseModal, #deathCertificateModal, #cenomarModal, #otherModal{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        backdrop-filter: blur(5px);
        align-items: center;
        justify-content: center;
        z-index: 10;
        overflow: auto;
    }

    #marriageCertificateModal .contentSemiWrapper, #birthCertificateModal .contentSemiWrapper, #marriageLicenseModal .contentSemiWrapper , #deathCertificateModal .contentSemiWrapper, #cenomarModal .contentSemiWrapper, #otherModal .contentSemiWrapper{
        background: rgba(255, 255, 255, 0.9); /* White with slight transparency */
        width: 80%;
        max-width: 900px;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        overflow-y: auto;
        max-height: 90vh;
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 100;
    }

    /* Title */
    .contentSemiWrapper h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    /* Section header styling */
    .section-header {
        font-size: 18px;
        font-weight: bold;
        margin-top: 30px;
        color: #007bff;
    }

    /* Form group and inputs */
    .form-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .form-group {
        flex: 1;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    .form-group input[type="date"] {
        padding: 8px;
    }

    .form-group input[type="tel"] {
        padding-left: 35px; /* Space for country code */
    }

    .contact-container {
        display: flex;
        align-items: center;
        position: relative;
    }

    .country-code {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
        color: #555;
    }

    /* Hint styling for small text */
    .small.hint {
        font-size: 12px;
        color: #888;
    }

    /* Dropdown select styling */
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    /* Buttons */
    button {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Checkbox and Radio button styles */
    input[type="checkbox"], input[type="radio"] {
        margin-right: 10px;
        margin-left: 10px;
        aspect-ratio: 1;
        width: 15PX;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Scrollable content area */
    #marriageCertificateModal .contentSemiWrapper, #birthCertificateModal .contentSemiWrapper, #marriageLicenseModal .contentSemiWrapper , #deathCertificateModal .contentSemiWrapper, #cenomarModal .contentSemiWrapper, #otherModal .contentSemiWrapper{
        overflow-y: auto;
        max-height: 90vh;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }
        
        .form-group {
            flex: 1 1 100%;
            margin-bottom: 15px;
        }
    }

    /* Focus state for inputs */
    input:focus, select:focus {
        border-color:rgb(255, 0, 212);
        outline: none;
        box-shadow: 0 0 3px rgba(255, 81, 0, 0.5);
    }

</style>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    
<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

   <!-- Notification Dropdown -->
   <header class="flex justify-between items-center bg-gray-100 p-4 shadow">


        <div id="notificationDropdownButton" class="relative cursor-pointer">
            <!-- Notification Bell Icon -->
            <i class="fas fa-bell text-gray-700 text-xl"></i>

            <!-- Notification Count Badge -->
            @if (Auth::user()->unreadNotifications->count() > 0)
                <span class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-full">
                    {{ Auth::user()->unreadNotifications->count() }}
                </span>
                
            @endif
        </div>
    </header>



    <!-- Dropdown Content -->
    <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-lg overflow-hidden z-50">
        <div class="bg-blue-500 text-white font-semibold px-4 py-2">
            Notifications
        </div>
        <div class="py-2 max-h-60 overflow-y-auto">
            @forelse(Auth::user()->unreadNotifications as $notification)
                <a href="#" class="block px-4 py-3 hover:bg-gray-100 transition">
                    <p class="text-sm font-medium text-gray-700">
                        {{ strtoupper($notification->data['name']) }} submitted a {{ $notification->data['document_type'] }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                    </p>
                </a>
            @empty
                <p class="px-4 py-3 text-sm text-gray-500 text-center">No new notifications</p>
            @endforelse
        </div>
        <div class="border-t px-4 py-2 text-center">
            <a href="#" class="text-blue-500 hover:underline text-sm">View All Notifications</a>
        </div>
    </div>
</div>

</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 wrap">
                    <h3 class="text-lg font-semibold mb-4">Data Overview</h3>
                    
                    <!-- Tabs -->
                    <ul class="flex border-b">
                        <li class="-mb-px mr-1">
                            <a href="#birthCertificate" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Birth Certificates</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#marriageCertificate" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Marriage Certificates</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#marriageLicense" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Marriage License</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#deathCertificate" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Death Certificates</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#cenomar" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Cenomar</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#otherDocument" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Other Document</a>
                        </li>
                        <!-- Add more tabs as needed -->
                    </ul>

                    <!-- Tab Contents -->
                    <div id="birthCertificate" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Birth Certificate')
                                        <tr class="cursor-pointer hover:bg-gray-100" onclick="viewBirthCertDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $appointment->requester_last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->reference_number }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="marriageCertificate" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Marriage Certificate')
                                        <tr class="cursor-pointer hover:bg-gray-100" onclick="viewMarriageCertDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $appointment->requester_last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->reference_number }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="marriageLicense" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Marriage License')
                                        <tr class="cursor-pointer hover:bg-gray-100" onclick="viewMarriageLicDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $appointment->requester_last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->reference_number }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="deathCertificate" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Death Certificate')
                                        <tr class="cursor-pointer hover:bg-gray-100" onclick="viewDeathCertDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $appointment->requester_last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->reference_number }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="cenomar" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Cenomar')
                                        <tr class="cursor-pointer hover:bg-gray-100" onclick="viewCenomarDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $appointment->requester_last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->reference_number }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="otherDocument" class="tab-content">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>

                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Other Document')
                                        <tr class="cursor-pointer hover:bg-gray-100" onclick="viewOtherDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $appointment->requester_last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->requester_middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->reference_number }}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for birth certificate -->
    <div id="birthCertificateModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
                <h3 class="text-xl font-bold mb-4">Edit Appointment Details</h3>
                <form id="birthCertAppointmentForm" action="{{ route('updateBirthCertificate', ['id' => ':id']) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT for updating -->

                    <div class="section-header">Requester's Details</div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="requester_last_name">Last Name:</label>
                            <input id="bc_requester_last_name" type="text" name="requester_last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="requester_first_name">First Name:</label>
                            <input id="bc_requester_first_name" type="text" name="requester_first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="requester_middle_name">Middle Name:</label>
                            <input type="text" id="bc_requester_middle_name" name="requester_middle_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="requester_mailing_address">Mailing Address:</label>
                        <input type="text" id="bc_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                        <small class="hint">House No., Street Name / Barangay</small>
                    </div>

                    <div class="form-row">
                        <!-- City/Municipality Field -->
                        <div class="form-group">
                            <label for="requester_city_municipality">City/Municipality:</label>
                            <input type="text" id="bc_requester_city_municipality" name="requester_city_municipality" required>
                        </div>

                        <!-- Province Field -->
                        <div class="form-group">
                            <label for="requester_province">Province:</label>
                            <input type="text" id="bc_requester_province" name="requester_province" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_no">Contact Number:</label>
                            <div class="contact-container">
                                <span class="country-code">+63</span>
                                <input type="tel" name="contact_no" id="bc_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
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
                            <select id="bc_requester_sex" name="requester_sex" required>
                                <option value="" selected disabled>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="requester_age">Age:</label>
                            <input type="number" name="requester_age" id="bc_requester_age" min="1" max="120" required oninput="checkAgeLimit()">
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
                            </script>
                        </div>
                    </div>

                    <div class="section-header">Request Information</div>
                    <div class="form-group">
                        <label for="request_type">Request Type:</label>
                        <select id="bc_request_type" name="request_type" required>
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
                            <input type="radio" id="bc_muslim_yes" name="certificate_of_conversion" value="1" required>
                            <label for="bc_muslim_yes">Yes</label>
                            <input type="radio" id="bc_muslim_no" name="certificate_of_conversion" value="0" required>
                            <label for="bc_muslim_no">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="brn">Birth Reference Number (BRN):</label>
                        <input type="text" id="bc_brn" name="brn" maxlength="14" placeholder="000000-0000000-0">
                    </div>

                    <div class="section-header">BIRTH CERTIFICATE DETAILS</div>
                    <h4>Person's/Child's Information</h4>
                    <div class="form-group">
                        <label for="child_last_name">Last Name: (if female, last name before marriage)</label>
                        <input type="text" id="bc_child_last_name" name="child_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="child_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                        <input type="text" id="bc_child_first_name" name="child_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="child_middle_name">Middle Name: (if female, middle name before marriage)</label>
                        <input type="text" id="bc_child_middle_name" name="child_middle_name">
                    </div>

                    <div class="form-group">
                        <label>Sex:</label>
                        <select id="bc_child_sex" name="child_sex" required>
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
                            <input type="checkbox" id="bc_born_abroad" name="born_abroad" value="1" onclick="toggleBornCountryField()">
                        </div>
                        <label for="born_abroad" style="padding-left: 25px; font-size: 14px;">Born Abroad</label>
                    </div>
                    <script>
                        // toggle the country inputfield depend on the married abroad checkbox
                        function toggleBornCountryField() {
                            const checkboxBornAbroad = document.getElementById('bc_born_abroad');
                            const countryContainerBc = document.getElementById('bc_country_container');
                            const countryBcInputField = document.getElementById('bc_country');

                            // Show or hide the country container based on checkbox status
                            if (checkboxBornAbroad.checked) {
                                countryContainerBc.style.display = 'block';
                                countryBcInputField.setAttribute('required', 'required');
                            } else {
                                countryContainerBc.style.display = 'none';
                                countryBcInputField.removeAttribute('required');
                                countryBcInputField.value = '';
                            }
                        }
                    </script>

                    <!-- Country Field (Visible if Born Abroad is checked) -->
                    <div class="form-group" id="bc_country_container" style="display: none;">
                        <label for="country">Country:</label>
                        <input type="text" id="bc_country" name="country" placeholder="Please specify country if born abroad">
                        <small class="hint">Please specify country if born abroad only.</small>
                    </div>

                    <div class="form-row">
                        <!-- City/Municipality Field -->
                        <div class="form-group">
                            <label for="place_of_birth_city_municipality">City/Municipality:</label>
                            <input type="text" id="bc_place_of_birth_city_municipality" name="place_of_birth_city_municipality" required>
                        </div>

                        <!-- Province Field -->
                        <div class="form-group">
                            <label for="place_of_birth_province">Province:</label>
                            <input type="text" id="bc_place_of_birth_province" name="place_of_birth_province" required>
                        </div>
                    </div>

                    <div class="section-header">Family Background</div>

                    <!-- Father's Information -->
                    <div class="form-group"><strong>Father's Name</strong></div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="father_last_name">Last Name:</label>
                            <input type="text" id="bc_father_last_name" name="father_last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="father_first_name">First Name:</label>
                            <input type="text" id="bc_father_first_name" name="father_first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="father_middle_name">Middle Name:</label>
                            <input type="text" id="bc_father_middle_name" name="father_middle_name">
                        </div>
                    </div>

                    <!-- Mother's Information -->
                    <div class="form-group"><strong>Mother's Name</strong></div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mother_last_name">Last Name:</label>
                            <input type="text" id="bc_mother_last_name" name="mother_last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="mother_first_name">First Name:</label>
                            <input type="text" id="bc_mother_first_name" name="mother_first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="mother_middle_name">Middle Name:</label>
                            <input type="text" id="bc_mother_middle_name" name="mother_middle_name">
                        </div>
                    </div>

                    <div class="section-header">Purpose of Request</div>
                        <div class="form-group">
                            <label for="purpose">Purpose:</label>
                            <select name="purpose" id="bc_purpose" onchange="bcToggleOtherPurpose()" required>
                                <option value="" selected disabled>Select Purpose</option>
                                <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                                <option value="Employment (Local)">Employment (Local)</option>
                                <option value="School Requirements">School Requirements</option>
                                <option value="Passport/Travel">Passport/Travel</option>
                                <option value="Employment (Abroad)">Employment (Abroad)</option>
                                <option value="Other">Other (Specify)</option>
                            </select>
                            <input type="text" name="purpose_other" id="bc_purpose_other" placeholder="Specify if other" style=" margin-top: 25px;">
                        </div>
                        <script>
                            const otherPurposeInput = document.getElementById('bc_purpose_other');

                            // toggle purpose input field
                            function bcToggleOtherPurpose() {
                                const purposeSelect = document.getElementById('bc_purpose');
                                const otherPurposeInput = document.getElementById('bc_purpose_other');

                                if (purposeSelect.value === "Other") {
                                    otherPurposeInput.style.display = "block";
                                    otherPurposeInput.setAttribute('required', 'required');
                                } else {
                                    otherPurposeInput.style.display = "none";
                                    otherPurposeInput.removeAttribute('required');
                                    otherPurposeInput.value = ""; 
                                }
                            }

                        </script>
                        
                        <label>Delayed Registration:</label>
                        <div class="radio-group">
                            <input type="radio" id="bc_delayed_yes" name="delayed" value="1" onclick="bcToggleDelayedDate()" required>
                            <label for="delayed_yes">Yes</label>
                            <input type="radio" id="bc_delayed_no" name="delayed" value="0" onclick="bcToggleDelayedDate()" required>
                            <label for="bc_delayed_no">No</label>
                        </div>
                        <div class="form-group" id="bc_delayed_date_container" style="display: none;">
                            <label for="delayed_date">Delayed Date:</label>
                            <input type="date" id="bc_delayed_date" name="delayed_date">
                        </div>

                        <script>
                            function bcToggleDelayedDate() {
                                const bc_delayedYes = document.getElementById("bc_delayed_yes").checked; // Check if "Yes" is selected
                                const bc_delayedDateContainer = document.getElementById("bc_delayed_date_container"); // The container to show/hide
                                const bc_delayedDate = document.getElementById("bc_delayed_date"); // The date input field

                                if (bc_delayedYes) {
                                    bc_delayedDateContainer.style.display = "block"; // Show the container
                                    bc_delayedDate.setAttribute("required", "required"); // Make the date field required
                                } else {
                                    bc_delayedDateContainer.style.display = "none"; // Hide the container
                                    bc_delayedDate.removeAttribute("required"); // Remove the required attribute
                                    bc_delayedDate.value = ""; // Clear the value of the date field
                                }
                            }

                        </script>
                        <div class="form-group">
                            <div class="input-with-icon">
                                <label for="appointment_date">Appointment Date:</label>
                                <input type="text" name="appointment_date" id="bc_appointment_date" style="width: 300px; height: 50px;" required>
                                <input type="hidden" id="bc_appointment_time" name="appointment_time">
                                <i class="fas fa-calendar-alt calendar-icon"></i> <!-- Icon -->
                            </div>
                        </div>
                        <div id="slot-container"></div>
                <input type="submit" class="btn btn-primary w-100 py-2 mt-2">
            </form>
        </div>
    </div>


    <!-- Modal for Marriage Certificate -->
    <div id="marriageCertificateModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="text-xl font-bold mb-4">Edit Appointment Details</h3>
            <form id="marriageAppointmentForm" action="{{ route('updateMarriageCertificate', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Requester's Details -->
                <div class="section-header">Requester's Details</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input id="mc_requester_last_name" type="text" name="requester_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input id="mc_requester_first_name" type="text" name="requester_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input id="mc_requester_middle_name" type="text" name="requester_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="mc_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="mc_requester_city_municipality" name="requester_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="mc_requester_province" name="requester_province" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_no">Contact Number:</label>
                    <div class="contact-container">
                        <span class="country-code">+63</span>
                        <input type="tel" name="contact_no" id="mc_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_sex">Sex:</label>
                    <select id="mc_requester_sex" name="requester_sex" required>
                        <option value="" selected disabled>Select</option>
                        <option value="male" >Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="requester_age">Age:</label>
                    <input type="number" name="requester_age" id="mc_requester_age" min="1" max="120" required oninput="checkAgeLimit()">
                </div>

                <!-- Request Information -->
                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select id="mc_requestType" name="request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Marriage Certificate">Marriage Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>

                <!-- Marriage Information -->
                <div class="section-header">Marriage Information</div>
                <div class="form-group"><strong>NAME OF HUSBAND</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="husband_last_name">Last Name:</label>
                        <input type="text" id="mc_husband_last_name" name="husband_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="husband_first_name">First Name:</label>
                        <input type="text" id="mc_husband_first_name" name="husband_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="husband_middle_name">Middle Name:</label>
                        <input type="text" id="mc_husband_middle_name" name="husband_middle_name">
                    </div>
                </div>

                <div class="form-group"><strong>MAIDEN NAME OF WIFE</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="wife_last_name">Last Name:</label>
                        <input type="text" id="mc_wife_last_name" name="wife_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="wife_first_name">First Name:</label>
                        <input type="text" id="mc_wife_first_name" name="wife_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="wife_middle_name">Middle Name:</label>
                        <input type="text" id="mc_wife_middle_name" name="wife_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_marriage">Date of Marriage:</label>
                    <input type="date" id="mc_date_of_marriage" name="date_of_marriage" required>
                </div>

                <div class="form-group">
                    <label>Place of Marriage:</label>
                    <div class="form-group born-abroad" style="position: relative;">
                        <div style="position: absolute; left: 0; top: 0;">
                            <input type="checkbox" id="mc_married_abroad" onclick="toggleMarriedCountryField()">
                        </div>
                        <label for="married_abroad" style="padding-left: 25px; font-size: 14px;">Married Abroad</label>
                    </div>
                    <div class="form-group" id="mc_country_container" style="display: none;">
                        <label for="country">Country:</label>
                        <input type="text" id="mc_country" name="country" placeholder="Please specify country if married abroad">
                        <small class="hint">Please specify country if married abroad only</small>
                    </div>
                </div>
                <script>
                    // toggle the country inputfield depend on the married abroad checkbox
                    function toggleMarriedCountryField() {
                        const mc_checkBoxMarriedAbroad = document.getElementById('mc_married_abroad');
                        const countryContainerMarried = document.getElementById('mc_country_container');
                        const countryMarriedInputField = document.getElementById('mc_country');

                        // Show or hide the country container based on checkbox status
                        if (mc_checkBoxMarriedAbroad.checked) {
                            countryContainerMarried.style.display = 'block';
                            countryMarriedInputField.setAttribute('required', 'required');
                        } else {
                            countryContainerMarried.style.display = 'none';
                            countryMarriedInputField.removeAttribute('required');
                        }
                    }
                </script>

                <div class="form-row">
                    <div class="form-group">
                        <label for="marriage_city_municipality">City/Municipality:</label>
                        <input type="text" id="mc_marriage_city_municipality" name="marriage_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="marriage_province">Province:</label>
                        <input type="text" id="mc_marriage_province" name="marriage_province" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="mc_requesting_party" name="requesting_party" required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="mc_relationship_to_owner" name="relationship_to_owner" required>
                </div>

                <!-- Purpose of Request -->
                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="mc_purpose" onchange="mcToggleOtherPurpose()" required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan" >Claim Benefits/Loan</option>
                        <option value="Employment (Local)" >Employment (Local)</option>
                        <option value="School Requirements" >School Requirements</option>
                        <option value="Passport/Travel" >Passport/Travel</option>
                        <option value="Employment (Abroad)" >Employment (Abroad)</option>
                        <option value="Other" >Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="mc_purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;">
                </div>
                <script>
                    // toggle purpose input field
                    function mcToggleOtherPurpose() {
                        const mc_purposeSelect = document.getElementById('mc_purpose');
                        const mc_otherPurposeInput = document.getElementById('mc_purpose_other');

                        // Check if "Other" is selected
                        if (mc_purposeSelect.value === "Other") {
                            mc_otherPurposeInput.style.display = "block";
                            mc_otherPurposeInput.setAttribute('required', 'required');
                        } else {
                            mc_otherPurposeInput.style.display = "none";
                            mc_otherPurposeInput.value = ""; 
                            mc_otherPurposeInput.removeAttribute('required');
                        }
                    }
                </script>
                <div class="form-group">
                    <label>Delayed Registration:</label>
                    <div class="radio-group">
                        <input type="radio" id="mc_delayed_yes" name="delayed" value="Yes" onclick="toggleDelayedDate()" required>
                        <label for="delayed_yes">Yes</label>
                        <input type="radio" id="mc_delayed_no" name="delayed" value="No" onclick="toggleDelayedDate()" required>
                        <label for="delayed_no">No</label>
                    </div>
                    <div class="form-group" id="mc_delayed_date_container" style="display:none;">
                        <label for="delayed_date">Delayed Date:</label>
                        <input type="date" id="mc_delayed_date" name="delayed_date">
                    </div>
                </div>
                <script>
                    function toggleDelayedDate() {
                        const mc_delayedYes = document.getElementById("mc_delayed_yes").checked; // Check if "Yes" is selected
                        const mc_delayedDateContainer = document.getElementById("mc_delayed_date_container"); // The container to show/hide
                        const mc_delayedDate = document.getElementById("mc_delayed_date"); // The date input field

                        if (mc_delayedYes) {
                            mc_delayedDateContainer.style.display = "block"; // Show the container
                            mc_delayedDate.setAttribute("required", "required"); // Make the date field required
                        } else {
                            mc_delayedDateContainer.style.display = "none"; // Hide the container
                            mc_delayedDate.removeAttribute("required"); // Remove the required attribute
                            mc_delayedDate.value = ""; // Clear the value of the date field
                        }
                    }

                </script>

                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="text" name="appointment_date" id="mc_appointment_date" required>
                    <input type="hidden" id="mc_appointment_time" name="appointment_time">
                    <i class="fas fa-calendar-alt calendar-icon"></i> <!-- Icon -->
                </div>

                <input type="submit" class="btn btn-primary w-100 py-2 mt-2">
            </form>
        </div>
    </div>


        <!-- Modal for Marriage License -->
    <div id="marriageLicenseModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="text-xl font-bold mb-4">Requester's Details</h3>
            <form id="marriageLicenseAppointmentForm" action="{{ route('updateMarriageLicense', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="ml_requester_last_name" name="requester_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="ml_requester_first_name" name="requester_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="ml_requester_middle_name" name="requester_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="ml_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="ml_requester_city_municipality" name="requester_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="ml_requester_province" name="requester_province" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="ml_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="ml_requester_sex" required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="ml_requester_age" min="1" max="120" required oninput="checkAgeLimit()">
                    </div>
                </div>

                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" id="ml_request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Marriage Certificate">Marriage Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" id="ml_brn" name="brn" maxlength="11" placeholder="0-000-0000000">
                </div>

                <div class="section-header">Marriage License Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="applicant_last_name">Applicant Last Name:</label>
                        <input type="text" id="ml_applicant_last_name" name="applicant_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="applicant_first_name">Applicant First Name:</label>
                        <input type="text" id="ml_applicant_first_name" name="applicant_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="applicant_middle_name">Applicant Middle Name:</label>
                        <input type="text" id="ml_applicant_middle_name" name="applicant_middle_name">
                    </div>
                </div>

                <div class="section-header">Spouse's Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="spouse_last_name">Spouse Last Name:</label>
                        <input type="text" id="ml_spouse_last_name" name="spouse_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="spouse_first_name">Spouse First Name:</label>
                        <input type="text" id="ml_spouse_first_name" name="spouse_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="spouse_middle_name">Spouse Middle Name:</label>
                        <input type="text" id="ml_spouse_middle_name" name="spouse_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="planned_date_of_marriage">Planned Date of Marriage:</label>
                    <input type="date" id="ml_planned_date_of_marriage" name="planned_date_of_marriage" required>
                </div>

                <div class="form-group">
                    <label for="place_of_marriage">Place of Marriage:</label>
                    <input type="text" id="ml_place_of_marriage" name="place_of_marriage" required>
                </div>

                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="ml_requesting_party" name="requesting_party" required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="ml_relationship_to_owner" name="relationship_to_owner" required>
                </div>

                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="ml_purpose" required onchange="mlToggleOtherPurpose()">
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="ml_purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;">
                </div>
                <script>
                        // toggle purpose input field
                    function mlToggleOtherPurpose() {
                        const mlPurposeSelect = document.getElementById('ml_purpose');
                        const mlOtherPurposeInput = document.getElementById('ml_purpose_other');

                        // Check if "Other" is selected
                        if (mlPurposeSelect.value === "Other") {
                            mlOtherPurposeInput.style.display = "block";
                            mlOtherPurposeInput.setAttribute('required', 'required');
                        } else {
                            mlOtherPurposeInput.style.display = "none";
                            mlOtherPurposeInput.value = ""; 
                            mlOtherPurposeInput.removeAttribute('required');
                        }
                    }
                </script>
                <div class="form-group">
                    <label>Delayed Registration:</label>
                    <div class="radio-group">
                        <label for="ml_delayed_yes">
                            <input type="radio" id="ml_delayed_yes" name="delayed" value="1" onclick="mlToggleDelayedDate()" required>
                            Yes
                        </label>
                        <label for="ml_delayed_no">
                            <input type="radio" id="ml_delayed_no" name="delayed" value="0" onclick="mlToggleDelayedDate()" required>
                            No
                        </label>
                    </div>
                    <div class="form-group" id="ml_delayed_date_container" style="display:none;">
                        <label for="ml_delayed_date">Delayed Date:</label>
                        <input type="date" id="ml_delayed_date" name="delayed_date" placeholder="Enter delayed date">
                    </div>
                </div>

                <script>
                    function mlToggleDelayedDate() {
                        const isDelayedYes = document.getElementById("ml_delayed_yes").checked;
                        const delayedDateContainer = document.getElementById("ml_delayed_date_container");
                        const delayedDateInput = document.getElementById("ml_delayed_date");

                        if (isDelayedYes) {
                            // Show delayed date field and make it required
                            delayedDateContainer.style.display = "block";
                            delayedDateInput.setAttribute("required", "required");
                        } else {
                            // Hide delayed date field and remove required attribute
                            delayedDateContainer.style.display = "none";
                            delayedDateInput.removeAttribute("required");
                            delayedDateInput.value = ""; // Clear the value when hidden
                        }
                    }

                </script>

                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="text" name="appointment_date" id="ml_appointment_date" required>
                    <input type="hidden" id="ml_appointment_time" name="appointment_time">
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Done</button>
            </form>
        </div>
    </div>

        <!-- Modal for Death Certificate -->
    <div id="deathCertificateModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="section-header">Requester's Details</h3>   
            <form id="deathCertificateAppointmentForm" action="{{ route('updateDeathCertificate', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Requester Information -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="dc_requester_last_name" name="requester_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="dc_requester_first_name" name="requester_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="dc_requester_middle_name" name="requester_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="dc_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="dc_requester_city_municipality" name="requester_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="dc_requester_province" name="requester_province" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="dc_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="dc_requester_sex" required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="dc_requester_age" min="1" max="120" required oninput="checkAgeLimit()">
                    </div>
                </div>

                <!-- Request Information -->
                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" id="dc_request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Death Certificate">Death Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" id="dc_brn" name="brn" maxlength="14" placeholder="000000-0000000-0">
                </div>

                <!-- Deceased Information -->
                <div class="section-header">Deceased Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="deceased_last_name">Last Name:</label>
                        <input type="text" id="dc_deceased_last_name" name="deceased_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_first_name">First Name:</label>
                        <input type="text" id="dc_deceased_first_name" name="deceased_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_middle_name">Middle Name:</label>
                        <input type="text" id="dc_deceased_middle_name" name="deceased_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_death">Date of Death:</label>
                    <input type="date" id="dc_date_of_death" name="date_of_death" required>
                </div>

                <div class="form-group">
                    <label>Place of Death:</label>
                    <div class="form-group died-abroad" style="position: relative;">
                        <input type="checkbox" id="dc_died_abroad" name="died_abroad" onclick="toggleCountryFieldForDeath()">
                        <label for="died_abroad">Died Abroad</label>
                    </div>
                    <div class="form-group" id="dc_country_container" style="display: none;">
                        <label for="country">Country:</label>
                        <input type="text" id="dc_country" name="country" placeholder="Specify country if died abroad">
                    </div>
                    <script>
                            function toggleCountryFieldForDeath() {
                                const dc_checkboxAbroad = document.getElementById('dc_died_abroad');
                                const dc_countryContainer = document.getElementById('dc_country_container');
                                const dc_countryInputField = document.getElementById('dc_country');

                                if (dc_checkboxAbroad.checked) {
                                    dc_countryContainer.style.display = 'block';
                                    dc_countryInputField.setAttribute('required', 'required');
                                } else {
                                    dc_countryContainer.style.display = 'none';
                                    dc_countryInputField.removeAttribute('required');
                                }
                            }
                        </script>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="death_city_municipality">City/Municipality:</label>
                            <input type="text" id="dc_death_city_municipality" name="death_city_municipality" required>
                        </div>
                        <div class="form-group">
                            <label for="death_province">Province:</label>
                            <input type="text" id="dc_death_province" name="death_province" required>
                        </div>
                    </div>
                </div>

                <!-- Other Information -->
                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="dc_requesting_party" name="requesting_party" required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="dc_relationship_to_owner" name="relationship_to_owner" required>
                </div>

                <!-- Purpose of Request -->
                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="dc_purpose" onchange="dcToggleOtherPurpose()" required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="dc_purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;">
                </div>
                <script>
                        // toggle purpose input field
                    function dcToggleOtherPurpose() {
                        const dcPurposeSelect = document.getElementById('dc_purpose');
                        const dcOtherPurposeInput = document.getElementById('dc_purpose_other');

                        // Check if "Other" is selected
                        if (dcPurposeSelect.value === "Other") {
                            dcOtherPurposeInput.style.display = "block";
                            dcOtherPurposeInput.setAttribute('required', 'required');
                        } else {
                            dcOtherPurposeInput.style.display = "none";
                            dcOtherPurposeInput.value = ""; 
                            dcOtherPurposeInput.removeAttribute('required');
                        }
                    }
                </script>

                <!-- Delayed Registration -->
                <div class="form-group">
                    <label>Delayed Registration:</label>
                    <div class="radio-group">
                        <input type="radio" id="dc_delayed_yes" name="delayed" value="1" onclick="dcToggleDelayedDate()" required>
                        <label for="delayed_yes">Yes</label>
                        <input type="radio" id="dc_delayed_no" name="delayed" value="0" onclick="dcToggleDelayedDate()" required>
                        <label for="delayed_no">No</label>
                    </div>
                    <div class="form-group" id="dc_delayed_date_container" style="display:none;">
                        <label for="delayed_date">Delayed Date:</label>
                        <input type="date" id="dc_delayed_date" name="delayed_date">
                    </div>
                </div>
                <script>
                    function dcToggleDelayedDate() {
                        const dc_delayedYes = document.getElementById("dc_delayed_yes").checked; // Check if "Yes" is selected
                        const dc_delayedDateContainer = document.getElementById("dc_delayed_date_container"); // The container to show/hide
                        const dc_delayedDate = document.getElementById("dc_delayed_date"); // The date input field

                        if (dc_delayedYes) {
                            dc_delayedDateContainer.style.display = "block";
                            dc_delayedDate.setAttribute("required", "required");
                        } else {
                            dc_delayedDateContainer.style.display = "none"; 
                            dc_delayedDate.removeAttribute("required"); 
                            dc_delayedDate.value = ""; 
                        }
                    }

                </script>

                <!-- Appointment Date -->
                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="date" name="appointment_date" id="dc_appointment_date" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit">
                </div>
            </form>
        </div>
    </div>

    <!-- Modal for CENOMAR -->
    <div id="cenomarModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="section-header">Requester's Details</h3>   
            <form id="cenomarAppointmentForm" action="{{ route('updateCenomar', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Requester's Details Section -->
                <div class="section-header">Requester's Details</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="ce_requester_last_name" name="requester_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="ce_requester_first_name" name="requester_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="ce_requester_middle_name" name="requester_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="ce_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="ce_requester_city_municipality" name="requester_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="ce_requester_province" name="requester_province" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="ce_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="ce_requester_sex" required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="ce_requester_age" min="1" max="120" required oninput="checkAgeLimit()">
                    </div>
                </div>

                <!-- Request Type Section -->
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" id="ce_request_type" required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Certificate of No Marriage (CENOMAR)">Certificate of No Marriage (CENOMAR)</option>
                        <option value="Viewable Online">Viewable Online</option>
                        <option value="DocPrint">DocPrint</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" id="ce_brn" name="brn" maxlength="14" placeholder="000000-0000000-0">
                </div>

                <!-- Birth Details Section -->
                <div class="section-header">Birth Details</div>
                <h4>Person's Information</h4>
                <div class="form-group">
                    <label for="person_last_name">Last Name: (if female, last name before marriage)</label>
                    <input type="text" id="ce_person_last_name" name="person_last_name" required>
                </div>
                <div class="form-group">
                    <label for="person_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                    <input type="text" id="ce_person_first_name" name="person_first_name" required>
                </div>
                <div class="form-group">
                    <label for="person_middle_name">Middle Name: (if female, middle name before marriage)</label>
                    <input type="text" id="ce_person_middle_name" name="person_middle_name">
                </div>
                <div class="form-group">
                    <label>Sex:</label>
                    <select name="person_sex" id="ce_person_sex" required>
                        <option value="" selected disabled>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="ce_date_of_birth" name="date_of_birth" required>
                </div>
                <div class="form-group born-abroad">
                    <label for="born_abroad">Born Abroad</label>
                    <input type="checkbox" id="ce_born_abroad" name="born_abroad" onclick="ceToggleCountryField()">
                </div>
                <div class="form-group" id="ce_country_container" style="display: none;">
                    <label for="country">Country:</label>
                    <input type="text" id="ce_country" name="country" placeholder="Specify country if born abroad">
                </div>
                <script>
                    // toggle the country inputfield depend on the married abroad checkbox
                    function ceToggleCountryField() {
                        const ce_checkBoxBornAbroad = document.getElementById('ce_born_abroad');
                        const ce_countryContainer = document.getElementById('ce_country_container');
                        const ce_countryInputField = document.getElementById('ce_country');

                        // Show or hide the country container based on checkbox status
                        if (ce_checkBoxBornAbroad.checked) {
                            ce_countryContainer.style.display = 'block';
                            ce_countryInputField.setAttribute('required', 'required');
                        } else {
                            ce_countryContainer.style.display = 'none';
                            ce_countryInputField.removeAttribute('required');
                        }
                    }
                </script>
                <div class="form-row">
                    <div class="form-group">
                        <label for="person_city_municipality">City/Municipality:</label>
                        <input type="text" id="ce_person_city_municipality" name="person_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="person_province">Province:</label>
                        <input type="text" id="ce_person_province" name="person_province" required>
                    </div>
                </div>

                <!-- Family Background Section -->
                <div class="section-header">Family Background</div>
                <div class="form-group">
                    <strong>Father's Name</strong>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="father_last_name">Last Name:</label>
                        <input type="text" id="ce_father_last_name" name="father_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_first_name">First Name:</label>
                        <input type="text" id="ce_father_first_name" name="father_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Middle Name:</label>
                        <input type="text" id="ce_father_middle_name" name="father_middle_name">
                    </div>
                </div>
                <div class="form-group">
                    <strong>Mother's Maiden Name</strong>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother_last_name">Last Name:</label>
                        <input type="text" id="ce_mother_last_name" name="mother_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_first_name">First Name:</label>
                        <input type="text" id="ce_mother_first_name" name="mother_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Middle Name:</label>
                        <input type="text" id="ce_mother_middle_name" name="mother_middle_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="ce_requesting_party" name="requesting_party" required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="ce_relationship_to_owner" name="relationship_to_owner" required>
                </div>

                <!-- Request Purpose Section -->
                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="ce_purpose" onchange="ceToggleOtherPurpose()" required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="ce_purpose_other" placeholder="Specify if other" style="display:none;">
                </div>
                <script>
                    // toggle purpose input field
                    function ceToggleOtherPurpose() {
                        const cePurposeSelect = document.getElementById('ce_purpose');
                        const ceOtherPurposeInput = document.getElementById('ce_purpose_other');

                        // Check if "Other" is selected
                        if (cePurposeSelect.value === "Other") {
                            ceOtherPurposeInput.style.display = "block";
                            ceOtherPurposeInput.setAttribute('required', 'required');
                        } else {
                            ceOtherPurposeInput.style.display = "none";
                            ceOtherPurposeInput.value = ""; 
                            ceOtherPurposeInput.removeAttribute('required');
                        }
                    }
                </script>
                <div class="radio-group">
                    <label>Delayed Registration:</label>
                    <input type="radio" id="ce_delayed_yes" name="delayed" value="1" onclick="ceToggleDelayedDate()" required>
                    <label for="delayed_yes">Yes</label>
                    <input type="radio" id="ce_delayed_no" name="delayed" value="0" onclick="ceToggleDelayedDate()" required>
                    <label for="delayed_no">No</label>
                </div>
                <div class="form-group" id="ce_delayed_date_container" style="display:none;">
                    <label for="delayed_date">Delayed Date:</label>
                    <input type="date" id="ce_delayed_date" name="delayed_date">
                </div>
                <script>
                    function ceToggleDelayedDate() {
                        const ce_delayedYes = document.getElementById("ce_delayed_yes").checked; // Check if "Yes" is selected
                        const ce_delayedDateContainer = document.getElementById("ce_delayed_date_container"); // The container to show/hide
                        const ce_delayedDate = document.getElementById("ce_delayed_date"); // The date input field

                        if (ce_delayedYes) {
                            ce_delayedDateContainer.style.display = "block"; // Show the container
                            ce_delayedDate.setAttribute("required", "required"); // Make the date field required
                        } else {
                            ce_delayedDateContainer.style.display = "none"; // Hide the container
                            ce_delayedDate.removeAttribute("required"); // Remove the required attribute
                            ce_delayedDate.value = ""; // Clear the value of the date field
                        }
                    }
                </script>

                <!-- Appointment Date Section -->
                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="text" name="appointment_date" id="ce_appointment_date" required>
                    <input type="hidden" id="ce_appointment_time" name="appointment_time">
                </div>

                <!-- Submission Confirmation Modal -->
                <div class="modal-content">
                    <input type="submit" class="btn btn-primary w-100 py-2 mt-2" >
                </div>
            </form>

        </div>
    </div>

    <div id="otherModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="section-header">Requester's Details</h3>
            <form id="otherAppointmentForm" action="{{ route('updateOther', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="section-header">Requester's Details</div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="ot_requester_last_name" name="requester_last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="ot_requester_first_name" name="requester_first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="ot_requester_middle_name" name="requester_middle_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="ot_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="ot_requester_city_municipality" name="requester_city_municipality" required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="ot_requester_province" name="requester_province" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="ot_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="ot_requester_sex" required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="ot_requester_age" min="1" max="120" required oninput="checkAgeLimit()">
                    </div>
                </div>

                <div class="form-group">
                    <label for="other_document">Specify Document:</label>
                    <input type="text" id="ot_other_document" name="other_document" placeholder="e.g., Barangay Clearance" required>
                </div>

                <div class="form-group">
                    <label for="document_details">Document Details:</label>
                    <textarea id="ot_document_details" name="document_details" rows="4" placeholder="Provide additional details about the document" required></textarea>
                </div>

                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="ot_requesting_party" name="requesting_party" required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="ot_relationship_to_owner" name="relationship_to_owner" required>
                </div>

                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="ot_purpose" onchange="otToggleOtherPurpose()" required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="ot_purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;">
                </div>
                <script>
                    // toggle purpose input field
                    function otToggleOtherPurpose() {
                        const otPurposeSelect = document.getElementById('ot_purpose');
                        const otOtherPurposeInput = document.getElementById('ot_purpose_other');

                        // Check if "Other" is selected
                        if (otPurposeSelect.value === "Other") {
                            otOtherPurposeInput.style.display = "block";
                            otOtherPurposeInput.setAttribute('required', 'required');
                        } else {
                            otOtherPurposeInput.style.display = "none";
                            otOtherPurposeInput.value = ""; 
                            otOtherPurposeInput.removeAttribute('required');
                        }
                    }
                </script>
                <label>Delayed Registration:</label>
                <div class="radio-group">
                    <input type="radio" id="ot_delayed_yes" name="delayed" value="Yes" onclick="otToggleDelayedDate()" required>
                    <label for="delayed_yes">Yes</label>
                    <input type="radio" id="ot_delayed_no" name="delayed" value="No" onclick="otToggleDelayedDate()" required>
                    <label for="delayed_no">No</label>
                </div>

                <div class="form-group" id="ot_delayed_date_container" style="display:none;">
                    <label for="delayed_date">Delayed Date:</label>
                    <input type="date" id="ot_delayed_date" name="delayed_date">
                </div>
                <script>
                    function otToggleDelayedDate() {
                        const ot_delayedYes = document.getElementById("ot_delayed_yes").checked; // Check if "Yes" is selected
                        const ot_delayedDateContainer = document.getElementById("ot_delayed_date_container"); // The container to show/hide
                        const ot_delayedDate = document.getElementById("ot_delayed_date"); // The date input field

                        if (ot_delayedYes) {
                            ot_delayedDateContainer.style.display = "block"; // Show the container
                            ot_delayedDate.setAttribute("required", "required"); // Make the date field required
                        } else {
                            ot_delayedDateContainer.style.display = "none"; // Hide the container
                            ot_delayedDate.removeAttribute("required"); // Remove the required attribute
                            ot_delayedDate.value = ""; // Clear the value of the date field
                        }
                    }
                </script>

                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <div class="input-with-icon">
                        <input type="text" name="appointment_date" id="ot_appointment_date" required>
                        <i class="fas fa-calendar-alt calendar-icon"></i>
                    </div>
                </div>

                <div id="slot-container"></div>

                <input type="submit" id="submit_btn" class="btn btn-primary w-100 py-2 mt-2">
            </form>
        </div>
    </div>


</x-app-layout>
    

</body>
</html>

<script>
    

    // BIRTH CERTIFICATE
    function viewBirthCertDetails(appointmentId){
        fetch(`/appointment/birth/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('bc_requester_last_name').value = data.requester_last_name;
            document.getElementById('bc_requester_first_name').value = data.requester_first_name;
            document.getElementById('bc_requester_middle_name').value = data.requester_middle_name;
            document.getElementById('bc_requester_mailing_address').value = data.requester_mailing_address;
            document.getElementById('bc_requester_city_municipality').value = data.requester_city_municipality;
            document.getElementById('bc_requester_province').value = data.requester_province;
            document.getElementById('bc_contact_no').value = data.contact_no;
            document.getElementById('bc_requester_sex').value = data.requester_sex;
            document.getElementById('bc_requester_age').value = data.requester_age;
            document.getElementById('bc_request_type').value = data.request_type;
            
            
            if (data.certificate_of_conversion === "Yes" || data.certificate_of_conversion === "1" || data.certificate_of_conversion === true) {
                document.getElementById('bc_muslim_yes').checked = true;
            } else{
                document.getElementById('bc_muslim_no').checked = true;
            }
            document.getElementById('bc_brn').value = data.brn;
            document.getElementById('bc_child_last_name').value = data.child_last_name;
            document.getElementById('bc_child_first_name').value = data.child_first_name;
            document.getElementById('bc_child_middle_name').value = data.child_middle_name;
            document.getElementById('bc_child_sex').value = data.child_sex;
            document.getElementById('bc_date_of_birth').value = data.date_of_birth;

            const bc_checkBoxBornAbroad = document.getElementById('bc_born_abroad');
            const countryContainerBc = document.getElementById('bc_country_container');
            const countryBcInputField = document.getElementById('bc_country');
            if(data.born_abroad === true){
                bc_checkBoxBornAbroad.checked = true;
                countryContainerBc.style.display = 'block';
                countryBcInputField.setAttribute('required', 'required');
            }else{
                bc_checkBoxBornAbroad.checked = false
                countryContainerBc.style.display = 'none';
                countryBcInputField.removeAttribute('required');
            }

            document.getElementById('bc_born_abroad').value = data.born_abroad;
            document.getElementById('bc_country').value = data.country;
            document.getElementById('bc_place_of_birth_city_municipality').value = data.place_of_birth_city_municipality;
            document.getElementById('bc_place_of_birth_province').value = data.place_of_birth_province;
            document.getElementById('bc_father_last_name').value = data.father_last_name;
            document.getElementById('bc_father_first_name').value = data.father_first_name;
            document.getElementById('bc_father_middle_name').value = data.father_middle_name;
            document.getElementById('bc_mother_last_name').value = data.mother_last_name;
            document.getElementById('bc_mother_first_name').value = data.mother_first_name;
            document.getElementById('bc_mother_middle_name').value = data.mother_middle_name;
            document.getElementById('bc_purpose').value = data.purpose;

            bcToggleOtherPurpose(data.purpose, data.purpose_other);

            const purposeSelect = document.getElementById('bc_purpose');
            const otherPurposeInput = document.getElementById('bc_purpose_other');

            if (data.purpose === "Other") {
                otherPurposeInput.style.display = "block";
            } else {
                otherPurposeInput.style.display = "none";
            }
            
            document.getElementById('bc_purpose_other').value = data.other_purposes;

            const bc_delayedYes = document.getElementById('bc_delayed_yes');
            const bc_delayedNo = document.getElementById('bc_delayed_no');
            const bc_delayedDateContainer = document.getElementById('bc_delayed_date_container');
            const bc_delayedDate = document.getElementById('bc_delayed_date');

            if (data.delayed === true) {
                bc_delayedYes.checked = true;
                bc_delayedDateContainer.style.display = "block";
                bc_delayedDate.value = data.delayed_date || "";
            } else if (data.delayed === false) {
                bc_delayedNo.checked = true;
                bc_delayedDate.value = "";
                bc_delayedDateContainer.style.display = "none";
            }
            document.getElementById('bc_delayed_date').value = data.delayed_date ? data.delayed_date : "";
            
            
            // Populate the appointment date and time fields
            document.getElementById('bc_appointment_date').value = data.appointment_date;
            
            // Update the form action URL with the current appointment ID
            document.getElementById('birthCertAppointmentForm').action = document.getElementById('birthCertAppointmentForm').action.replace(':id', appointmentId);
            // Show the modal after populating the data
            document.getElementById('birthCertificateModal').classList.remove('hidden');
            document.getElementById('marriageCertificateModal').classList.add('hidden');
            document.getElementById('marriageLicenseModal').classList.add('hidden');
            
        })
        .catch(error => {
            console.error("Error fetching appointment details:", error);
        });
    }
    // END OF BIRTH CERTIFICATE
    

    // MARRIAGE CERTIFICATE    
    function viewMarriageCertDetails(appointmentId) {
        fetch(`/appointment/marriage/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('mc_requester_last_name').value = data.requester_last_name;
            document.getElementById('mc_requester_first_name').value = data.requester_first_name;
            document.getElementById('mc_requester_middle_name').value = data.requester_middle_name;
            document.getElementById('mc_requester_mailing_address').value = data.requester_mailing_address;
            document.getElementById('mc_requester_city_municipality').value = data.requester_city_municipality;
            document.getElementById('mc_requester_province').value = data.requester_province;
            document.getElementById('mc_contact_no').value = data.contact_no;
            document.getElementById('mc_requester_sex').value = data.requester_sex;
            document.getElementById('mc_requester_age').value = data.requester_age;
            document.getElementById('mc_requestType').value = data.request_type;
            document.getElementById('mc_husband_last_name').value = data.husband_last_name;
            document.getElementById('mc_husband_first_name').value = data.husband_first_name;
            document.getElementById('mc_husband_middle_name').value = data.husband_middle_name;
            document.getElementById('mc_wife_last_name').value = data.wife_last_name;
            document.getElementById('mc_wife_first_name').value = data.wife_first_name;
            document.getElementById('mc_wife_middle_name').value = data.wife_middle_name;
            document.getElementById('mc_date_of_marriage').value = data.date_of_marriage;
            document.getElementById('mc_marriage_city_municipality').value = data.marriage_city_municipality;
            document.getElementById('mc_marriage_province').value = data.marriage_province;
            document.getElementById('mc_requesting_party').value = data.requesting_party;
            document.getElementById('mc_relationship_to_owner').value = data.relationship_to_owner;
            document.getElementById('mc_delayed_date').value = data.delayed_date;
            
            
            document.getElementById('mc_purpose').value = data.purpose;
            const mc_checkBoxMarriedAbroad = document.getElementById('mc_married_abroad');
            
            if(data.married_abroad === true){
                mc_checkBoxMarriedAbroad.checked = true;
            }else{
                mc_checkBoxMarriedAbroad.checked = false;
            }
            document.getElementById('mc_country').value = data.country;

            // delayed true or false
            const mc_delayedYes = document.getElementById('mc_delayed_yes');
            const mc_delayedNo = document.getElementById('mc_delayed_no');
            const mc_delayedDateContainer = document.getElementById('mc_delayed_date_container');
            const mc_delayedDate = document.getElementById('mc_delayed_date');
            if (data.delayed === true) {
                mc_delayedYes.checked = true;
                mc_delayedDateContainer.style.display = 'block';
                mc_delayedDate.value = data.delayed_date || '';
                mc_delayedDate.setAttribute('required', 'required');
            } else if (data.delayed === false) {
                mc_delayedNo.checked = true;
                mc_delayedDateContainer.style.display = 'none';
                mc_delayedDate.value = '';
                mc_delayedDate.removeAttribute('required');
            }

            const mc_purposeSelect = document.getElementById('mc_purpose');
            const mc_otherPurposeInput = document.getElementById('mc_purpose_other');

            // Check if "Other" is selected
            if (mc_purposeSelect.value === "Other") {
                mc_otherPurposeInput.style.display = "block";
            } else {
                mc_otherPurposeInput.style.display = "none";
            }
            document.getElementById('mc_purpose_other').value = data.other_purposes;

            
            // Populate the appointment date and time fields
            document.getElementById('mc_appointment_date').value = data.appointment_date;
            
            // Update the form action URL with the current appointment ID
            document.getElementById('marriageAppointmentForm').action = document.getElementById('marriageAppointmentForm').action.replace(':id', appointmentId);
            // Show the modal after populating the data
            document.getElementById('marriageCertificateModal').classList.remove('hidden');
            document.getElementById('marriageLicenseModal').classList.add('hidden');
            document.getElementById('birthCertificateModal').classList.add('hidden');
            
        })
        .catch(error => {
            console.error("Error fetching appointment details:", error);
        });
    }
    // END OF MARRIAGE CERTIFICATE


    // MARRIAGE LICENSE
    function viewMarriageLicDetails(appointmentId){
        fetch(`/appointment/MLicense/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('ml_requester_last_name').value = data.requester_last_name;
            document.getElementById('ml_requester_first_name').value = data.requester_first_name;
            document.getElementById('ml_requester_middle_name').value = data.requester_middle_name;
            document.getElementById('ml_requester_mailing_address').value = data.requester_mailing_address;
            document.getElementById('ml_requester_city_municipality').value = data.requester_city_municipality;
            document.getElementById('ml_requester_province').value = data.requester_province;
            document.getElementById('ml_contact_no').value = data.contact_no;
            document.getElementById('ml_requester_sex').value = data.requester_sex;
            document.getElementById('ml_requester_age').value = data.requester_age;
            document.getElementById('ml_request_type').value = data.request_type;
            document.getElementById('ml_brn').value = data.brn;
            document.getElementById('ml_applicant_last_name').value = data.applicant_last_name;
            document.getElementById('ml_applicant_first_name').value = data.applicant_first_name;
            document.getElementById('ml_applicant_middle_name').value = data.applicant_middle_name;
            document.getElementById('ml_spouse_last_name').value = data.spouse_last_name;
            document.getElementById('ml_spouse_first_name').value = data.spouse_first_name;
            document.getElementById('ml_spouse_middle_name').value = data.spouse_middle_name;
            document.getElementById('ml_planned_date_of_marriage').value = data.planned_date_of_marriage;
            document.getElementById('ml_place_of_marriage').value = data.place_of_marriage;
            document.getElementById('ml_requesting_party').value = data.requesting_party;
            document.getElementById('ml_relationship_to_owner').value = data.relationship_to_owner;
            
            
            document.getElementById('ml_purpose').value = data.purpose;

            const mlPurposeSelect = document.getElementById('ml_purpose');
            const mlOtherPurposeInput = document.getElementById('ml_purpose_other');

            // Check if "Other" is selected
            if (mlPurposeSelect.value === "Other") {
                mlOtherPurposeInput.style.display = "block";
            } else {
                mlOtherPurposeInput.style.display = "none";
            }
            document.getElementById('ml_purpose_other').value = data.other_purposes;

            // Handle Delayed Registration
            const ml_delayedYes = document.getElementById('ml_delayed_yes');
            const ml_delayedNo = document.getElementById('ml_delayed_no');
            const ml_delayedDateContainer = document.getElementById('ml_delayed_date_container');
            const ml_delayedDate = document.getElementById('ml_delayed_date');


            if (data.delayed === true) {
                ml_delayedYes.checked = true;
                ml_delayedDateContainer.style.display = 'block';
                ml_delayedDate.value = data.delayed_date || ''; 
                ml_delayedDate.setAttribute('required', 'required');
            } else if (data.delayed === false) {
                ml_delayedNo.checked = true;
                ml_delayedDateContainer.style.display = 'none'; 
                ml_delayedDate.value = '';
                ml_delayedDate.removeAttribute('required');
            } else {
                console.error("Unexpected value for 'delayed':", delayedValue);
            }

            document.getElementById('ml_delayed_date').value = data.delayed_date;
                        
            // Populate the appointment date and time fields
            document.getElementById('ml_appointment_date').value = data.appointment_date;
            
            // Update the form action URL with the current appointment ID
            document.getElementById('marriageLicenseAppointmentForm').action = document.getElementById('marriageLicenseAppointmentForm').action.replace(':id', appointmentId);
            // Show the modal after populating the data
            document.getElementById('marriageLicenseModal').classList.remove('hidden');
            document.getElementById('marriageCertificateModal').classList.add('hidden');
            document.getElementById('birthCertificateModal').classList.add('hidden');
            
        })
        .catch(error => {
            console.error("Error fetching appointment details:", error);
        });
    }
    // END OF MARRIAGE LICENSE

    // DEATH CERTIFICATE
    function viewDeathCertDetails(appointmentId){
        fetch(`/appointment/death/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
                // populate the form
                document.getElementById('dc_requester_last_name').value = data.requester_last_name;
                document.getElementById('dc_requester_first_name').value = data.requester_first_name;
                document.getElementById('dc_requester_middle_name').value = data.requester_middle_name;
                document.getElementById('dc_requester_mailing_address').value = data.requester_mailing_address;
                document.getElementById('dc_requester_city_municipality').value = data.requester_city_municipality;
                document.getElementById('dc_requester_province').value = data.requester_province;
                document.getElementById('dc_contact_no').value = data.contact_no;
                document.getElementById('dc_requester_sex').value = data.requester_sex;
                document.getElementById('dc_requester_age').value = data.requester_age;
                document.getElementById('dc_request_type').value = data.request_type;
                document.getElementById('dc_brn').value = data.brn;
                
                document.getElementById('dc_deceased_last_name').value = data.deceased_last_name;
                document.getElementById('dc_deceased_first_name').value = data.deceased_first_name;
                document.getElementById('dc_deceased_middle_name').value = data.deceased_middle_name;
                document.getElementById('dc_date_of_death').value = data.date_of_death;
                document.getElementById('dc_died_abroad').value = data.died_abroad;
                document.getElementById('dc_country').value = data.country;

                const dc_checkboxAbroad = document.getElementById('dc_died_abroad');
                const dc_countryContainer = document.getElementById('dc_country_container');
                const dc_countryInputField = document.getElementById('dc_country');

                // Siguraduhing ang `died_abroad` ay ma-check nang tama
                if (data.died_abroad === true || data.died_abroad === "1" || data.died_abroad === 1) {
                    dc_checkboxAbroad.checked = true;
                    dc_countryContainer.style.display = 'block';
                    dc_countryInputField.setAttribute('required', 'required');
                } else {
                    dc_checkboxAbroad.checked = false;
                    dc_countryContainer.style.display = 'none';
                    dc_countryInputField.removeAttribute('required');
                }


                document.getElementById('dc_death_city_municipality').value = data.death_city_municipality;
                document.getElementById('dc_death_province').value = data.death_province;
                document.getElementById('dc_requesting_party').value = data.requesting_party;
                document.getElementById('dc_relationship_to_owner').value = data.relationship_to_owner;

                const dcPurposeSelect = document.getElementById('dc_purpose');
                const dcOtherPurposeInput = document.getElementById('dc_purpose_other');

                // Check if "Other" is selected
                if (dcPurposeSelect.value === "Other") {
                    dcOtherPurposeInput.style.display = "block";
                } else {
                    dcOtherPurposeInput.style.display = "none";
                }
                document.getElementById('dc_purpose_other').value = data.other_purposes;


                // Handle Delayed Registration
                const dc_delayedYes = document.getElementById('dc_delayed_yes');
                const dc_delayedNo = document.getElementById('dc_delayed_no');
                const dc_delayedDateContainer = document.getElementById('dc_delayed_date_container');
                const dc_delayedDate = document.getElementById('dc_delayed_date');
                if (data.delayed === true) {
                    dc_delayedYes.checked = true;
                    dc_delayedDateContainer.style.display = 'block';
                    dc_delayedDate.value = data.delayed_date || ''; 
                    dc_delayedDate.setAttribute('required', 'required');
                } else if (data.delayed === false) {
                    dc_delayedNo.checked = true;
                    dc_delayedDateContainer.style.display = 'none'; 
                    dc_delayedDate.value = '';
                    dc_delayedDate.removeAttribute('required');
                } else {
                    console.error("Unexpected value for 'delayed':", delayedValue);
                }

                document.getElementById('dc_purpose').value = data.purpose;
                document.getElementById('dc_delayed_date').value = data.delayed_date;
                            
                // Populate the appointment date and time fields
                document.getElementById('dc_appointment_date').value = data.appointment_date;

                // Update the form action URL with the current appointment ID
                document.getElementById('deathCertificateAppointmentForm').action = document.getElementById('deathCertificateAppointmentForm').action.replace(':id', appointmentId);
                // Show the modal after populating the data
                document.getElementById('deathCertificateModal').classList.remove('hidden');
                document.getElementById('marriageLicenseModal').classList.add('hidden');
                document.getElementById('marriageCertificateModal').classList.add('hidden');
                document.getElementById('birthCertificateModal').classList.add('hidden');
            })
        .catch(error => {
            console.error("Error fetching appointment details:", error);
        });
    }
    // END OF DEATH CERTIFICATE

    // CENOMAR
    function viewCenomarDetails(appointmentId){
        fetch(`/appointment/cenomar/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('ce_requester_last_name').value = data.requester_last_name;
            document.getElementById('ce_requester_first_name').value = data.requester_first_name;
            document.getElementById('ce_requester_middle_name').value = data.requester_middle_name;
            document.getElementById('ce_requester_mailing_address').value = data.requester_mailing_address;
            document.getElementById('ce_requester_city_municipality').value = data.requester_city_municipality;
            document.getElementById('ce_requester_province').value = data.requester_province;
            document.getElementById('ce_contact_no').value = data.contact_no;
            document.getElementById('ce_requester_sex').value = data.requester_sex;
            document.getElementById('ce_requester_age').value = data.requester_age;
            document.getElementById('ce_request_type').value = data.request_type;
            document.getElementById('ce_brn').value = data.brn;
            document.getElementById('ce_person_last_name').value = data.person_last_name;
            document.getElementById('ce_person_first_name').value = data.person_first_name;
            document.getElementById('ce_person_middle_name').value = data.person_middle_name;
            document.getElementById('ce_person_sex').value = data.person_sex;
            document.getElementById('ce_date_of_birth').value = data.date_of_birth;
            document.getElementById('ce_born_abroad').value = data.born_abroad;

            const ce_checkBoxBornAbroad = document.getElementById('ce_born_abroad');
            const ce_countryContainer = document.getElementById('ce_country_container');
            const ce_countryInputField = document.getElementById('ce_country');
            if(data.born_abroad === true || data.born_abroad === '1' || data.born_abroad === 1){
                ce_checkBoxBornAbroad.checked = true;
                ce_countryContainer.style.display = 'block';
                ce_countryInputField.setAttribute('required', 'required');
            }else{
                ce_checkBoxBornAbroad.checked = false
                ce_countryContainer.style.display = 'none';
                ce_countryInputField.removeAttribute('required');
            }

            document.getElementById('ce_country').value = data.country;
            document.getElementById('ce_person_city_municipality').value = data.person_city_municipality;
            document.getElementById('ce_person_province').value = data.person_province;
            document.getElementById('ce_father_last_name').value = data.father_last_name;
            document.getElementById('ce_father_first_name').value = data.father_first_name;
            document.getElementById('ce_father_middle_name').value = data.father_middle_name;
            document.getElementById('ce_mother_last_name').value = data.mother_last_name;
            document.getElementById('ce_mother_first_name').value = data.mother_first_name;
            document.getElementById('ce_mother_middle_name').value = data.mother_middle_name;
            document.getElementById('ce_requesting_party').value = data.requesting_party;
            document.getElementById('ce_relationship_to_owner').value = data.relationship_to_owner;
            document.getElementById('ce_purpose').value = data.purpose;
            
            document.getElementById('ce_delayed_date').value = data.delayed_date ? data.delayed_date : "";;
            
            
            // Populate the appointment date and time fields
            document.getElementById('ce_appointment_date').value = data.appointment_date;
            
            
            document.getElementById('ce_date_of_birth').value = data.date_of_birth;


            // Check if "Other" is selected
            const cePurposeSelect = document.getElementById('ce_purpose');
            const ceOtherPurposeInput = document.getElementById('ce_purpose_other');
            if (cePurposeSelect.value === "Other") {
                ceOtherPurposeInput.style.display = "block";
            } else {
                ceOtherPurposeInput.style.display = "none";
            }
            document.getElementById('ce_purpose_other').value = data.other_purposes;

            const ce_delayedYes = document.getElementById('ce_delayed_yes');
            const ce_delayedNo = document.getElementById('ce_delayed_no');
            const ce_delayedDateContainer = document.getElementById('ce_delayed_date_container');
            const ce_delayedDate = document.getElementById('ce_delayed_date');

            if (data.delayed === true) {
                ce_delayedYes.checked = true;
                ce_delayedDateContainer.style.display = "block";
                ce_delayedDate.value = data.delayed_date || "";
                ce_delayedDate.setAttribute("required", "required");
            } else if (data.delayed === false) {
                ce_delayedNo.checked = true;
                ce_delayedDate.value = "";
                ce_delayedDateContainer.style.display = "none";
                ce_delayedDate.removeAttribute("required");
            }
            
            // Update the form action URL with the current appointment ID
            document.getElementById('cenomarAppointmentForm').action = document.getElementById('cenomarAppointmentForm').action.replace(':id', appointmentId);
            // Show the modal after populating the data
            document.getElementById('cenomarModal').classList.remove('hidden');
            document.getElementById('birthCertificateModal').classList.add('hidden');
            document.getElementById('marriageCertificateModal').classList.add('hidden');
            document.getElementById('marriageLicenseModal').classList.add('hidden');
            
        })
        .catch(error => {
            console.error("Error fetching appointment details:", error);
        });
    }
    // END OF CENOMAR

    // OTHER DOCUMENT
    function viewOtherDetails(appointmentId){
        fetch(`/appointment/other/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('ot_requester_last_name').value = data.requester_last_name;
            document.getElementById('ot_requester_first_name').value = data.requester_first_name;
            document.getElementById('ot_requester_middle_name').value = data.requester_middle_name;
            document.getElementById('ot_requester_mailing_address').value = data.requester_mailing_address;
            document.getElementById('ot_requester_city_municipality').value = data.requester_city_municipality;
            document.getElementById('ot_requester_province').value = data.requester_province;
            document.getElementById('ot_contact_no').value = data.contact_no;
            document.getElementById('ot_requester_sex').value = data.requester_sex;
            document.getElementById('ot_requester_age').value = data.requester_age;
            document.getElementById('ot_other_document').value = data.other_document;
            document.getElementById('ot_document_details').value = data.document_details;
            document.getElementById('ot_requesting_party').value = data.requesting_party;
            document.getElementById('ot_relationship_to_owner').value = data.relationship_to_owner;
            document.getElementById('ot_purpose').value = data.purpose;
            document.getElementById('ot_purpose_other').value = data.purpose_other;
            
            // Check if "Other" is selected
            const otPurposeSelect = document.getElementById('ot_purpose');
            const otOtherPurposeInput = document.getElementById('ot_purpose_other');
            if (otPurposeSelect.value === "Other") {
                otOtherPurposeInput.style.display = "block";
            } else {
                otOtherPurposeInput.style.display = "none";
            }
            document.getElementById('ot_purpose_other').value = data.other_purposes;

            const ot_delayedYes = document.getElementById('ot_delayed_yes');
            const ot_delayedNo = document.getElementById('ot_delayed_no');
            const ot_delayedDateContainer = document.getElementById('ot_delayed_date_container');
            const ot_delayedDate = document.getElementById('ot_delayed_date');

            if (data.delayed === true) {
                ot_delayedYes.checked = true;
                ot_delayedDateContainer.style.display = "block";
                ot_delayedDate.value = data.delayed_date || "";
            } else if (data.delayed === false) {
                ot_delayedNo.checked = true;
                ot_delayedDate.value = "";
                ot_delayedDateContainer.style.display = "none";
            }
            document.getElementById('ot_delayed_date').value = data.delayed_date ? data.delayed_date : "";
            
            
            // Populate the appointment date and time fields
            document.getElementById('ot_appointment_date').value = data.appointment_date;

            // Update the form action URL with the current appointment ID
            document.getElementById('otherAppointmentForm').action = document.getElementById('otherAppointmentForm').action.replace(':id', appointmentId);
            // Show the modal after populating the data
            document.getElementById('otherModal').classList.remove('hidden');
            document.getElementById('birthCertificateModal').classList.add('hidden');
            document.getElementById('marriageCertificateModal').classList.add('hidden');
            document.getElementById('marriageLicenseModal').classList.add('hidden');
        })
        .catch(error => {
            console.error("Error fetching appointment details:", error);
        });

    }
    // END OF OTHER DOCUMENT

    // Function to close the modal
    function closeModal(event) {
        // Close the modal if the clicked element is the modal itself (not the content wrapper)
        if (event.target === event.currentTarget) {
            event.currentTarget.classList.add("hidden");
        }
    }
    document.getElementById("birthCertificateModal").addEventListener("click", closeModal);
    document.getElementById("marriageCertificateModal").addEventListener("click", closeModal);
    document.getElementById("marriageLicenseModal").addEventListener("click", closeModal);
    document.getElementById("deathCertificateModal").addEventListener("click", closeModal);
    document.getElementById("cenomarModal").addEventListener("click", closeModal);
    document.getElementById("otherModal").addEventListener("click", closeModal);

</script>



<script>



    // Script for Dropdown Functionality
        const dropdownButton = document.getElementById('notificationDropdownButton');
        const dropdownContent = document.getElementById('notificationDropdown');

        dropdownButton.addEventListener('click', () => {
        dropdownContent.classList.toggle('hidden');

        // Kapag visible na ang dropdown, mark notifications as read
        if (!dropdownContent.classList.contains('hidden')) {
            const url = dropdownButton.getAttribute('data-url'); 

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);

                // I-reset ang notification count
                const notificationCount = document.querySelector('.notification-count');
                if (notificationCount) {
                    notificationCount.textContent = '0';
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

    window.addEventListener('click', (e) => {
        if (!dropdownButton.contains(e.target) && !dropdownContent.contains(e.target)) {
            dropdownContent.classList.add('hidden');
        }
    });

</script>


<!-- Script for Tab Functionality -->
<script>
    document.querySelectorAll('.tab-content').forEach((content) => {
        content.style.display = 'none'; // Hide all tabs by default
    });
    document.querySelector('#birthCertificate').style.display = 'block'; // Show default tab

    document.querySelectorAll('.border-b a').forEach((tab) => {
        tab.addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelectorAll('.tab-content').forEach((content) => {
                content.style.display = 'none'; // Hide all contents
            });
            document.querySelectorAll('.border-b a').forEach((link) => {
                link.classList.remove('text-blue-800');
            });
            document.querySelector(this.getAttribute('href')).style.display = 'block'; // Show clicked tab content
            this.classList.add('text-blue-800');
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const appointmentDateInput = document.getElementById('mc_appointment_date');

        // Fetch slot information from the backend
        fetch('/api/date-slots')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(dateSlots => {
                flatpickr(appointmentDateInput, {
                    dateFormat: 'Y-m-d',
                    disable: [
                        ...Object.keys(dateSlots).filter(date => dateSlots[date].status === 'Full'), // Disable full dates
                        function (date) {
                            return date < new Date(); // Disable past dates
                        },
                    ],
                    onDayCreate: function (dObj, dStr, fp, dayElem) {
                        const date = dayElem.dateObj.toISOString().split('T')[0];

                        if (dateSlots[date]) {
                            const slotsLeft = dateSlots[date].slots_left;

                            // Add the "slots left" text dynamically
                            const slotInfo = document.createElement('div');
                            slotInfo.textContent = `Slots: ${slotsLeft}`;
                            slotInfo.style.color = slotsLeft > 0 ? 'green' : 'red';
                            dayElem.appendChild(slotInfo);

                            // Optional: Style full dates
                            if (slotsLeft === 0) {
                                dayElem.classList.add('flatpickr-disabled');
                            }
                        }
                    },
                });
            })
            .catch(error => {
                console.error('Error fetching date slots:', error);
            });
    });


</script>

