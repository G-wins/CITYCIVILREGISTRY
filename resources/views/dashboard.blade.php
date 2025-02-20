<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .closeModal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Dark transparent background */
        backdrop-filter: blur(8px); /* Blurred background effect */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        overflow: hidden;
    }

    /* Modal Content - Centered and Scrollable */
    .contentSemiWrapper {
        background: white;
        padding: 30px;
        border-radius: 10px;
        width: 90%;
        max-width: 600px; /* Limits the form width */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        position: relative;
        text-align: left;
        animation: fadeIn 0.3s ease-in-out;
       
        /* Scrollable Modal */
        max-height: 80vh; /* Prevents it from taking full height */
        overflow-y: auto; /* Enables vertical scrolling */
    }

    /* Hide scrollbar for Webkit browsers (Chrome, Safari) */
    .contentSemiWrapper::-webkit-scrollbar {
        width: 8px;
    }

    .contentSemiWrapper::-webkit-scrollbar-thumb {
        background: orange;
        border-radius: 10px;
    }

    .contentSemiWrapper::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Fade-in Effect */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Section Headers */
    .section-header {
        font-weight: bold;
        font-size: 16px;
        color: #444;
        margin-bottom: 10px;
        border-bottom: 2px solid #ccc;
        padding-bottom: 5px;
    }

    /* Form Fields */
    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Contact Number Styling */
    .contact-container {
        display: flex;
        align-items: center;
    }

    .country-code {
        background: #f1f1f1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
    }

    .contact-container input {
        flex: 1;
        border-radius: 0 5px 5px 0;
    }

    /* Button Styles */
    button, .btn {
        display: inline-block;
        padding: 10px;
        font-size: 14px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        transition: 0.3s;
    }

    /* Primary Buttons */
    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Secondary Buttons */
    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Hidden Elements */
    .hidden {
        display: none;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .contentSemiWrapper {
            width: 95%;
            padding: 20px;
            max-height: 80vh; /* Adjust max height for smaller screens */
            overflow-y: auto;
        }
    }




    #previewDate, #nextDate {
        background-color: transparent;
        color: #333;
        padding: 4px 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    #previewDate:hover, #nextDate:hover {
        background-color: #f3f4f6; /* Soft hover effect */
        border-color: #999;
    }

    #tableDate {
        border: none;
        background-color: transparent;
        font-size: 0.75rem;
        padding: 2px 6px;
        text-align: center;
        outline: none;
        pointer-events: none; /* Disables clicking on the field */
        width: 100px; /* Adjust width for a compact look */
    }

    #tableDate:focus {
        box-shadow: none;
        border: none;
    }

    /* Search Container */
    .search-container {
        position: relative;
        width: 250px;
        transition: width 0.4s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    /* Search Input */
    #searchDashboard {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 50px;
        font-size: 14px;
        outline: none;
        transition: width 0.4s ease-in-out;
        cursor: pointer;
        background-color: white;
        position: absolute;
        right: 0; /* Ensures it expands towards the left */
    }

    .search-container:focus-within {
        width: 250px;
    }

    /* FontAwesome Search Icon */
    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        font-size: 16px;
        pointer-events: none; /* Prevents interaction */
    }

    /* Responsive Design (For Smaller Screens) */
    @media (max-width: 600px) {
        .search-container {
            width: 43px;
        }

        .search-container:focus-within {
            width: 180px; /* Adjust width for small screens */
        }

        #searchDashboard {
            font-size: 12px;
        }
    }



   
</style>
<style>
    /* Custom Context Menu Styling */
    #customContextMenu {
        display: none;
        position: absolute;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        padding: 10px;
        min-width: 160px;
        z-index: 1000;
        font-family: Arial, sans-serif;
    }

    #customContextMenu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 10px; /* Adds space between the buttons */
    }

    #customContextMenu li {
        padding: 12px 18px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: background 0.3s, color 0.3s;
    }

    #contextDone {
        background: #28a745;
        color: white;
        border: 1px solid #218838;
    }

    #contextDone:hover {
        background: #218838;
    }

    #contextReject {
        background: #dc3545;
        color: white;
        border: 1px solid #c82333;
    }

    #contextReject:hover {
        background: #c82333;
    }

    tr.bg-green-100 {
        background-color: #d4edda !important;
        color: #155724 !important;
    }
    tr.bg-red-100 {
        background-color: #f8d7da !important;
        color: #721c24 !important;
    }

</style>
<style>

    /* Tab Navigation */
    .tab-container {
        display: flex;
        border-bottom: 3px solid #ff7b54;
    }

    .tab-link {
        padding: 12px 10px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        background: #ffb6c1; /* Soft Pink */
        color: #fff;
        border-radius: 8px 8px 0 0;
        margin-right: 5px;
        transition: all 0.3s ease;
        text-decoration: none;
        position: relative;
        top: 0;
    }

    .tab-link:hover {
        background: #ff7b54; /* Soft Orange */
    }

    .tab-link.active {
        background: #ff7b54;
        box-shadow: 0px -3px 5px rgba(0, 0, 0, 0.1);
        top: 4px;
    }

    /* Tab Content */
    .tab-content {
        display: none;
        background: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
   
    .tab-content.active {
        overflow-x: auto;
        display: block;
    }
    .tab-content.active::-webkit-scrollbar{
        height: .5em;
    }
    .tab-content.active::-webkit-scrollbar-track {
        background:rgb(255, 171, 145);
    }
    .tab-content.active::-webkit-scrollbar-thumb {
        background:#ff7b54;
        border-radius: 100px;
    }

    /* Table Styling */
    .table-container {
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }

    th {
        background: #ff7b54; /* Soft Orange */
        color: white;
        font-weight: bold;
        text-align: left;
        padding: 12px;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.3s ease-in-out;
    }

    /* Alternating Row Colors */
    tbody tr:nth-child(even) {
        background-color: #fff5f7; /* Soft Pink */
    }

    tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    /* Hover Effects */
    tbody tr:hover {
        background-color: #ffd3c8; /* Light Orange */
        cursor: pointer;
    }

    /* Status-Based Row Colors */
    .done-row {
        background-color: #c8e6c9 !important; /* Light Green for completed */
    }

    .rejected-row {
        background-color: #ffcccb !important; /* Light Red for rejected */
    }

    /* Responsive Table */
    @media (max-width: 768px) {
        th, td {
            padding: 8px;
            font-size: 14px;
        }
    }

    .viewImagesButton{
        margin-bottom: 30px;
    }

</style>

<style>
   
</style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
   
<x-app-layout>

    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Date and Search Section -->
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center space-x-2 border rounded p-2">
                            <button id="previewDate" class="px-3 py-2 text-gray-600 border rounded hover:bg-gray-100">
                                &lsaquo;
                            </button>
                            <input type="date" id="tableDate" class="border rounded px-3 py-2 text-center text-sm focus:ring-2 focus:ring-gray-400" readonly>
                            <button id="nextDate" class="px-3 py-2 text-gray-600 border rounded hover:bg-gray-100">
                                &rsaquo;
                            </button>
                        </div>
                        <div class="search-container">
                            <input type="text" id="searchDashboard" autocomplete="off">
                            <i id="searchIcon" class="fa-solid fa-magnifying-glass search-icon"></i>
                        </div>
                    </div>

                    <!-- Tabs Section -->
                    <div class="tab-container">
                        <a href="#birthCertificate" class="tab-link active" data-full="Birth Certificate" onclick="changeTab(event, 'birthCertificate')">Birth Certificate</a>
                        <a href="#marriageCertificate" class="tab-link" data-full="Marriage Certificate" onclick="changeTab(event, 'marriageCertificate')">Marriage Certificate</a>
                        <a href="#marriageLicense" class="tab-link" data-full="Marriage License" onclick="changeTab(event, 'marriageLicense')">Marriage License</a>
                        <a href="#deathCertificate" class="tab-link" data-full="Death Certificate" onclick="changeTab(event, 'deathCertificate')">Death Certificate</a>
                        <a href="#cenomar" class="tab-link" data-full="Cenomar" onclick="changeTab(event, 'cenomar')">Cenomar</a>
                        <a href="#otherDocument" class="tab-link" data-full="Other Document" onclick="changeTab(event, 'otherDocument')">Other Document</a>
                    </div>

                    <!-- Tab Contents -->
                    <div id="birthCertificate" class="tab-content active table-container">
                        <table class="w-full text-sm border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $index => $appointment)
                                    @if($appointment->appointment_type === 'Birth Certificate')
                                    <tr id="bc_row" class="hover:bg-gray-50 cursor-pointer
                                            @if($appointment->status === 'Done') done-row
                                            @elseif($appointment->status === 'Rejected') rejected-row
                                            @endif"
                                        onclick="viewBirthCertDetails('{{ $appointment->id }}')">

                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
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

                    <div id="marriageCertificate" class="tab-content table-container">
                        <table class="w-full text-sm border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $index => $appointment)
                                    @if($appointment->appointment_type === 'Marriage Certificate')
                                        <tr id="mc_row" class="hover:bg-gray-50 cursor-pointer" onclick="viewMarriageCertDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
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

                    <div id="marriageLicense" class="tab-content table-container">
                        <table class="w-full text-sm border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $index => $appointment)
                                    @if($appointment->appointment_type === 'Marriage License')
                                        <tr id="ml_row" class="hover:bg-gray-50 cursor-pointer" onclick="viewMarriageLicDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
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

                    <div id="deathCertificate" class="tab-content table-container">
                        <table class="w-full text-sm border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $index => $appointment)
                                    @if($appointment->appointment_type === 'Death Certificate')
                                        <tr id="dc_row" class="hover:bg-gray-50 cursor-pointer" onclick="viewDeathCertDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
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

                    <div id="cenomar" class="tab-content table-container">
                        <table class="w-full text-sm border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $index => $appointment)
                                    @if($appointment->appointment_type === 'Cenomar')
                                        <tr id="ce_row" class="hover:bg-gray-50 cursor-pointer" onclick="viewCenomarDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
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

                    <div id="otherDocument" class="tab-content table-container">
                        <table class="w-full text-sm border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-2">#</th>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                    <th class="border px-4 py-2">Reference Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $index => $appointment)
                                    @if($appointment->appointment_type === 'Other Document')
                                        <tr id="ot_row" class="hover:bg-gray-50 cursor-pointer" onclick="viewOtherDetails('{{ $appointment->id }}')">
                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
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

    <div id="birthCertificateModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
                <h3 class="text-xl font-bold mb-4">Requester's Details</h3>
                <button type="button" class="btn btn-secondary w-100 py-2 mt-2 viewImagesButton" data-modal="birthCertificateModal">View Images</button>
                <form id="birthCertAppointmentForm" action="{{ route('updateBirthCertificate', ['id' => ':id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="bc_refNumber" name="reference_number" class="referenceNumberInput">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="requester_last_name">Last Name:</label>
                            <input id="bc_requester_last_name" type="text" name="requester_last_name" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="requester_first_name">First Name:</label>
                            <input id="bc_requester_first_name" type="text" name="requester_first_name" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="requester_middle_name">Middle Name:</label>
                            <input type="text" id="bc_requester_middle_name" name="requester_middle_name" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="requester_mailing_address">Mailing Address:</label>
                        <input type="text" id="bc_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" disabled required>
                        <small class="hint">House No., Street Name / Barangay</small>
                    </div>

                    <div class="form-row">
                        <!-- City/Municipality Field -->
                        <div class="form-group">
                            <label for="requester_city_municipality">City/Municipality:</label>
                            <input type="text" id="bc_requester_city_municipality" name="requester_city_municipality" disabled required>
                        </div>

                        <!-- Province Field -->
                        <div class="form-group">
                            <label for="requester_province">Province:</label>
                            <input type="text" id="bc_requester_province" name="requester_province" disabled required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact_no">Contact Number:</label>
                            <div class="contact-container">
                                <span class="country-code">+63</span>
                                <input type="tel" name="contact_no" id="bc_contact_no" maxlength="10" placeholder="9123456789" disabled required oninput="checkContactNumber()">
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
                            <select id="bc_requester_sex" name="requester_sex" disabled required>
                                <option value="" selected disabled>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="requester_age">Age:</label>
                            <input type="number" name="requester_age" id="bc_requester_age" min="1" max="120" disabled required oninput="checkAgeLimit()">
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
                        <select id="bc_request_type" name="request_type" disabled required>
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
                            <input type="radio" id="bc_muslim_yes" name="certificate_of_conversion" value="1" disabled required>
                            <label for="bc_muslim_yes">Yes</label>
                            <input type="radio" id="bc_muslim_no" name="certificate_of_conversion" value="0" disabled required>
                            <label for="bc_muslim_no">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="brn">Birth Reference Number (BRN):</label>
                        <input type="text" id="bc_brn" name="brn" maxlength="14" disabled placeholder="000000-0000000-0">
                    </div>

                    <div class="section-header">BIRTH CERTIFICATE DETAILS</div>
                    <h4>Person's/Child's Information</h4>
                    <div class="form-group">
                        <label for="child_last_name">Last Name: (if female, last name before marriage)</label>
                        <input type="text" id="bc_child_last_name" name="child_last_name"disabled required>
                    </div>
                    <div class="form-group">
                        <label for="child_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                        <input type="text" id="bc_child_first_name" name="child_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="child_middle_name">Middle Name: (if female, middle name before marriage)</label>
                        <input type="text" id="bc_child_middle_name" name="child_middle_name" disabled>
                    </div>

                    <div class="form-group">
                        <label>Sex:</label>
                        <select id="bc_child_sex" name="child_sex" disabled required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" id="bc_date_of_birth" name="date_of_birth" disabled required>
                    </div>

                    <!-- Born Abroad Checkbox -->
                    <label>Place of Birth</label>
                    <div class="form-group born-abroad" style="position: relative;">
                        <div style="position: absolute; left: 0; top: 0;">
                            <input type="checkbox" id="bc_born_abroad" name="born_abroad" value="1" disabled onclick="toggleBornCountryField()">
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
                        <input type="text" id="bc_country" name="country" disabled placeholder="Please specify country if born abroad">
                        <small class="hint">Please specify country if born abroad only.</small>
                    </div>

                    <div class="form-row">
                        <!-- City/Municipality Field -->
                        <div class="form-group">
                            <label for="place_of_birth_city_municipality">City/Municipality:</label>
                            <input type="text" id="bc_place_of_birth_city_municipality" name="place_of_birth_city_municipality" disabled required>
                        </div>

                        <!-- Province Field -->
                        <div class="form-group">
                            <label for="place_of_birth_province">Province:</label>
                            <input type="text" id="bc_place_of_birth_province" name="place_of_birth_province" disabled required>
                        </div>
                    </div>

                    <div class="section-header">Family Background</div>

                    <!-- Father's Information -->
                    <div class="form-group"><strong>Father's Name</strong></div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="father_last_name">Last Name:</label>
                            <input type="text" id="bc_father_last_name" name="father_last_name" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="father_first_name">First Name:</label>
                            <input type="text" id="bc_father_first_name" name="father_first_name" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="father_middle_name">Middle Name:</label>
                            <input type="text" id="bc_father_middle_name" name="father_middle_name" disabled>
                        </div>
                    </div>

                    <!-- Mother's Information -->
                    <div class="form-group"><strong>Mother's Name</strong></div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mother_last_name">Last Name:</label>
                            <input type="text" id="bc_mother_last_name" name="mother_last_name" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="mother_first_name">First Name:</label>
                            <input type="text" id="bc_mother_first_name" name="mother_first_name" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="mother_middle_name">Middle Name:</label>
                            <input type="text" id="bc_mother_middle_name" name="mother_middle_name" disabled>
                        </div>
                    </div>

                    <div class="section-header">Purpose of Request</div>
                        <div class="form-group">
                            <label for="purpose">Purpose:</label>
                            <select name="purpose" id="bc_purpose" onchange="bcToggleOtherPurpose()" disabled required>
                                <option value="" selected disabled>Select Purpose</option>
                                <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                                <option value="Employment (Local)">Employment (Local)</option>
                                <option value="School Requirements">School Requirements</option>
                                <option value="Passport/Travel">Passport/Travel</option>
                                <option value="Employment (Abroad)">Employment (Abroad)</option>
                                <option value="Other">Other (Specify)</option>
                            </select>
                            <input type="text" name="purpose_other" id="bc_purpose_other" disabled placeholder="Specify if other" style=" margin-top: 25px;">
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
                            <input type="radio" id="bc_delayed_yes" name="delayed" value="1" onclick="bcToggleDelayedDate()" disabled required>
                            <label for="delayed_yes">Yes</label>
                            <input type="radio" id="bc_delayed_no" name="delayed" value="0" onclick="bcToggleDelayedDate()" disabled required>
                            <label for="bc_delayed_no">No</label>
                        </div>
                        <div class="form-group" id="bc_delayed_date_container" style="display: none;">
                            <label for="delayed_date">Delayed Date:</label>
                            <input type="date" id="bc_delayed_date" name="delayed_date" disabled>
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
                                    bc_delayedDate.removeAttribute("required");
                                    bc_delayedDate.value = "";
                                }
                            }

                        </script>
                        <div class="form-group">
                            <div class="input-with-icon">
                                <label for="appointment_date">Appointment Date:</label>
                                <input type="text" name="appointment_date" id="bc_appointment_date" style="width: 300px; height: 50px;" disabled required>
                                <input type="hidden" id="bc_appointment_time" name="appointment_time">
                                <i class="fas fa-calendar-alt calendar-icon"></i>
                            </div>
                        </div>
                        <div id="slot-container"></div>
                    <input type="submit" class="btn btn-primary w-100 py-2 mt-2">
                    <button id="bcEnableButton">Edit</button>
                    <button id="bcCancelButton" class="hidden">Cancel</button>
            </form>
        </div>
    </div>

    <div id="marriageCertificateModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
        <h3 class="text-xl font-bold mb-4">Requester's Details</h3>
            <button type="button" class="btn btn-secondary w-100 py-2 mt-2 viewImagesButton" data-modal="marriageCertificateModal">View Images</button>
            <form id="marriageAppointmentForm" action="{{ route('updateMarriageCertificate', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Requester's Details -->
                <div class="form-row">
                    <input type="hidden" id="mc_refNumber" name="reference_number" class="referenceNumberInput">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input id="mc_requester_last_name" type="text" name="requester_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input id="mc_requester_first_name" type="text" name="requester_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input id="mc_requester_middle_name" type="text" name="requester_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="mc_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" disabled required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="mc_requester_city_municipality" name="requester_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="mc_requester_province" name="requester_province" disabled required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact_no">Contact Number:</label>
                    <div class="contact-container">
                        <span class="country-code">+63</span>
                        <input type="tel" name="contact_no" id="mc_contact_no" maxlength="10" placeholder="9123456789" disabled required oninput="checkContactNumber()">
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_sex">Sex:</label>
                    <select id="mc_requester_sex" name="requester_sex" disabled required>
                        <option value="" selected disabled>Select</option>
                        <option value="male" >Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="requester_age">Age:</label>
                    <input type="number" name="requester_age" id="mc_requester_age" min="1" max="120" disabled required oninput="checkAgeLimit()">
                </div>

                <!-- Request Information -->
                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select id="mc_requestType" name="request_type" disabled required>
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
                        <input type="text" id="mc_husband_last_name" name="husband_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="husband_first_name">First Name:</label>
                        <input type="text" id="mc_husband_first_name" name="husband_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="husband_middle_name">Middle Name:</label>
                        <input type="text" id="mc_husband_middle_name" name="husband_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group"><strong>MAIDEN NAME OF WIFE</strong></div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="wife_last_name">Last Name:</label>
                        <input type="text" id="mc_wife_last_name" name="wife_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="wife_first_name">First Name:</label>
                        <input type="text" id="mc_wife_first_name" name="wife_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="wife_middle_name">Middle Name:</label>
                        <input type="text" id="mc_wife_middle_name" name="wife_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_marriage">Date of Marriage:</label>
                    <input type="date" id="mc_date_of_marriage" name="date_of_marriage" disabled required>
                </div>

                <div class="form-group">
                    <label>Place of Marriage:</label>
                    <div class="form-group born-abroad" style="position: relative;">
                        <div style="position: absolute; left: 0; top: 0;">
                            <input type="checkbox" id="mc_married_abroad" disabled onclick="toggleMarriedCountryField()">
                        </div>
                        <label for="married_abroad" style="padding-left: 25px; font-size: 14px;">Married Abroad</label>
                    </div>
                    <div class="form-group" id="mc_country_container" style="display: none;">
                        <label for="country">Country:</label>
                        <input type="text" id="mc_country" name="country" disabled placeholder="Please specify country if married abroad">
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
                        <input type="text" id="mc_marriage_city_municipality" name="marriage_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="marriage_province">Province:</label>
                        <input type="text" id="mc_marriage_province" name="marriage_province" disabled required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="mc_requesting_party" name="requesting_party" disabled required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="mc_relationship_to_owner" name="relationship_to_owner" disabled required>
                </div>

                <!-- Purpose of Request -->
                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="mc_purpose" onchange="mcToggleOtherPurpose()" disabled required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan" >Claim Benefits/Loan</option>
                        <option value="Employment (Local)" >Employment (Local)</option>
                        <option value="School Requirements" >School Requirements</option>
                        <option value="Passport/Travel" >Passport/Travel</option>
                        <option value="Employment (Abroad)" >Employment (Abroad)</option>
                        <option value="Other" >Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="mc_purpose_other" disabled placeholder="Specify if other" style="display:none; margin-top: 25px;">
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
                        <input type="radio" id="mc_delayed_yes" name="delayed" value="1" onclick="toggleDelayedDate()" disabled required>
                        <label for="delayed_yes">Yes</label>
                        <input type="radio" id="mc_delayed_no" name="delayed" value="0" onclick="toggleDelayedDate()" disabled required>
                        <label for="delayed_no">No</label>
                    </div>
                    <div class="form-group" id="mc_delayed_date_container" style="display:none;">
                        <label for="delayed_date">Delayed Date:</label>
                        <input type="date" id="mc_delayed_date" name="delayed_date" disabled>
                    </div>
                </div>
                <script>
                    function toggleDelayedDate() {
                        const mc_delayedYes = document.getElementById("mc_delayed_yes").checked;
                        const mc_delayedDateContainer = document.getElementById("mc_delayed_date_container");
                        const mc_delayedDate = document.getElementById("mc_delayed_date");

                        if (mc_delayedYes) {
                            mc_delayedDateContainer.style.display = "block";
                            mc_delayedDate.setAttribute("required", "required");
                        } else {
                            mc_delayedDateContainer.style.display = "none";
                            mc_delayedDate.removeAttribute("required");
                            mc_delayedDate.value = "";
                        }
                    }

                </script>

                <div class="form-group">
                    <label for="appointment_date">Appointment Date:</label>
                    <input type="text" name="appointment_date" id="mc_appointment_date" disabled required>
                    <input type="hidden" id="mc_appointment_time" name="appointment_time">
                    <i class="fas fa-calendar-alt calendar-icon"></i>
                </div>

                <input type="submit" class="btn btn-primary w-100 py-2 mt-2">
                <button id="marriageCertificateEnableButton">Edit</button>
                <button id="mcCancelButton"class="hidden">Cancel</button>
            </form>
        </div>
    </div>

    <div id="marriageLicenseModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="text-xl font-bold mb-4">Requester's Details</h3>
            <button type="button" class="btn btn-secondary w-100 py-2 mt-2 viewImagesButton" data-modal="marriageLicenseModal">View Images</button>
            <form id="marriageLicenseAppointmentForm" action="{{ route('updateMarriageLicense', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <input type="hidden" id="ml_refNumber" name="reference_number" class="referenceNumberInput">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="ml_requester_last_name" name="requester_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="ml_requester_first_name" name="requester_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="ml_requester_middle_name" name="requester_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="ml_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" disabled required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="ml_requester_city_municipality" name="requester_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="ml_requester_province" name="requester_province" disabled required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="ml_contact_no" maxlength="10" placeholder="9123456789" disabled required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="ml_requester_sex" disabled required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="ml_requester_age" min="1" max="120" disabled required oninput="checkAgeLimit()">
                    </div>
                </div>

                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" id="ml_request_type" disabled required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Marriage Certificate">Marriage Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" id="ml_brn" name="brn" maxlength="11" placeholder="0-000-0000000" disabled>
                </div>

                <div class="section-header">Marriage License Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="applicant_last_name">Applicant Last Name:</label>
                        <input type="text" id="ml_applicant_last_name" name="applicant_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="applicant_first_name">Applicant First Name:</label>
                        <input type="text" id="ml_applicant_first_name" name="applicant_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="applicant_middle_name">Applicant Middle Name:</label>
                        <input type="text" id="ml_applicant_middle_name" name="applicant_middle_name" disabled>
                    </div>
                </div>

                <div class="section-header">Spouse's Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="spouse_last_name">Spouse Last Name:</label>
                        <input type="text" id="ml_spouse_last_name" name="spouse_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="spouse_first_name">Spouse First Name:</label>
                        <input type="text" id="ml_spouse_first_name" name="spouse_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="spouse_middle_name">Spouse Middle Name:</label>
                        <input type="text" id="ml_spouse_middle_name" name="spouse_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="planned_date_of_marriage">Planned Date of Marriage:</label>
                    <input type="date" id="ml_planned_date_of_marriage" name="planned_date_of_marriage" disabled required>
                </div>

                <div class="form-group">
                    <label for="place_of_marriage">Place of Marriage:</label>
                    <input type="text" id="ml_place_of_marriage" name="place_of_marriage" disabled required>
                </div>

                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="ml_requesting_party" name="requesting_party" disabled required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="ml_relationship_to_owner" name="relationship_to_owner" disabled required>
                </div>

                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="ml_purpose" disabled required onchange="mlToggleOtherPurpose()">
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="ml_purpose_other" placeholder="Specify if other" disabled style="display:none; margin-top: 25px;">
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
                            <input type="radio" id="ml_delayed_yes" name="delayed" value="1" onclick="mlToggleDelayedDate()" disabled required>
                            Yes
                        </label>
                        <label for="ml_delayed_no">
                            <input type="radio" id="ml_delayed_no" name="delayed" value="0" onclick="mlToggleDelayedDate()" disabled required>
                            No
                        </label>
                    </div>
                    <div class="form-group" id="ml_delayed_date_container" style="display:none;">
                        <label for="ml_delayed_date">Delayed Date:</label>
                        <input type="date" id="ml_delayed_date" name="delayed_date" placeholder="Enter delayed date" disabled>
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
                    <input type="text" name="appointment_date" id="ml_appointment_date" disabled required>
                    <input type="hidden" id="ml_appointment_time" name="appointment_time">
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Done</button>
                <button id="mlEnableButton">Edit</button>
                <button id="mlCancelButton" class="hidden">Cancel</button>
            </form>
        </div>
    </div>

    <div id="deathCertificateModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="text-xl font-bold mb-4">Requester's Details</h3> 
            <button type="button" class="btn btn-secondary w-100 py-2 mt-2 viewImagesButton" data-modal="deathCertificateModal">View Images</button>
            <form id="deathCertificateAppointmentForm" action="{{ route('updateDeathCertificate', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Requester Information -->
                <div class="form-row">
                    <input type="hidden" id="dc_refNumber" name="reference_number" class="referenceNumberInput">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="dc_requester_last_name" name="requester_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="dc_requester_first_name" name="requester_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="dc_requester_middle_name" name="requester_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="dc_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" disabled required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="dc_requester_city_municipality" name="requester_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="dc_requester_province" name="requester_province" disabled required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="dc_contact_no" maxlength="10" placeholder="9123456789" disabled required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="dc_requester_sex" disabled required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="dc_requester_age" min="1" max="120" disabled required oninput="checkAgeLimit()">
                    </div>
                </div>

                <!-- Request Information -->
                <div class="section-header">Request Information</div>
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" id="dc_request_type" disabled required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Death Certificate">Death Certificate</option>
                        <option value="Authentication">Authentication</option>
                        <option value="CD/LI">CD/LI</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" id="dc_brn" name="brn" maxlength="14" placeholder="000000-0000000-0" disabled>
                </div>

                <!-- Deceased Information -->
                <div class="section-header">Deceased Information</div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="deceased_last_name">Last Name:</label>
                        <input type="text" id="dc_deceased_last_name" name="deceased_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_first_name">First Name:</label>
                        <input type="text" id="dc_deceased_first_name" name="deceased_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="deceased_middle_name">Middle Name:</label>
                        <input type="text" id="dc_deceased_middle_name" name="deceased_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_of_death">Date of Death:</label>
                    <input type="date" id="dc_date_of_death" name="date_of_death" disabled required>
                </div>

                <div class="form-group">
                    <label>Place of Death:</label>
                    <div class="form-group died-abroad" style="position: relative;">
                        <input type="checkbox" id="dc_died_abroad" name="died_abroad" disabled onclick="toggleCountryFieldForDeath()">
                        <label for="died_abroad">Died Abroad</label>
                    </div>
                    <div class="form-group" id="dc_country_container" style="display: none;">
                        <label for="country">Country:</label>
                        <input type="text" id="dc_country" name="country" disabled placeholder="Specify country if died abroad">
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
                            <input type="text" id="dc_death_city_municipality" name="death_city_municipality" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="death_province">Province:</label>
                            <input type="text" id="dc_death_province" name="death_province" disabled required>
                        </div>
                    </div>
                </div>

                <!-- Other Information -->
                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="dc_requesting_party" name="requesting_party" disabled required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="dc_relationship_to_owner" name="relationship_to_owner" disabled required>
                </div>

                <!-- Purpose of Request -->
                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="dc_purpose" onchange="dcToggleOtherPurpose()" disabled required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="dc_purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;" disabled>
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
                        <input type="radio" id="dc_delayed_yes" name="delayed" value="1" onclick="dcToggleDelayedDate()" disabled required>
                        <label for="delayed_yes">Yes</label>
                        <input type="radio" id="dc_delayed_no" name="delayed" value="0" onclick="dcToggleDelayedDate()" disabled required>
                        <label for="delayed_no">No</label>
                    </div>
                    <div class="form-group" id="dc_delayed_date_container" style="display:none;">
                        <label for="delayed_date">Delayed Date:</label>
                        <input type="date" id="dc_delayed_date" name="delayed_date" disabled>
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
                    <input type="date" name="appointment_date" id="dc_appointment_date" disabled required>
                </div>

                <!-- Submit Button -->
                <input type="submit" class="btn btn-primary w-100 py-2 mt-2">
                <button id="dcEnableButton">Edit</button>
                <button id="dcCancelButton" class="hidden">Cancel</button>
            </form>
        </div>
    </div>

    <div id="cenomarModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="text-xl font-bold mb-4">Requester's Details</h3>
            <button type="button" class="btn btn-secondary w-100 py-2 mt-2 viewImagesButton" data-modal="cenomarModal">View Images</button>
            <form id="cenomarAppointmentForm" action="{{ route('updateCenomar', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Requester's Details Section -->
                <div class="form-row">
                    <input type="hidden" id="ce_refNumber" name="reference_number" class="referenceNumberInput">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="ce_requester_last_name" name="requester_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="ce_requester_first_name" name="requester_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="ce_requester_middle_name" name="requester_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="ce_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" disabled required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="ce_requester_city_municipality" name="requester_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="ce_requester_province" name="requester_province" disabled required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="ce_contact_no" maxlength="10" placeholder="9123456789" required oninput="checkContactNumber()" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="ce_requester_sex" disabled required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="ce_requester_age" min="1" max="120" required oninput="checkAgeLimit()" disabled>
                    </div>
                </div>

                <!-- Request Type Section -->
                <div class="form-group">
                    <label for="request_type">Request Type:</label>
                    <select name="request_type" id="ce_request_type" disabled required>
                        <option value="" selected disabled>Select Request Type</option>
                        <option value="Certificate of No Marriage (CENOMAR)">Certificate of No Marriage (CENOMAR)</option>
                        <option value="Viewable Online">Viewable Online</option>
                        <option value="DocPrint">DocPrint</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="brn">Birth Reference Number (BRN):</label>
                    <input type="text" id="ce_brn" name="brn" maxlength="14" placeholder="000000-0000000-0" disabled>
                </div>

                <!-- Birth Details Section -->
                <div class="section-header">Birth Details</div>
                <h4>Person's Information</h4>
                <div class="form-group">
                    <label for="person_last_name">Last Name: (if female, last name before marriage)</label>
                    <input type="text" id="ce_person_last_name" name="person_last_name" disabled required>
                </div>
                <div class="form-group">
                    <label for="person_first_name">First Name: (include JR., SR., II, III, IV, etc., if applicable)</label>
                    <input type="text" id="ce_person_first_name" name="person_first_name" disabled required>
                </div>
                <div class="form-group">
                    <label for="person_middle_name">Middle Name: (if female, middle name before marriage)</label>
                    <input type="text" id="ce_person_middle_name" name="person_middle_name" disabled>
                </div>
                <div class="form-group">
                    <label>Sex:</label>
                    <select name="person_sex" id="ce_person_sex" disabled required>
                        <option value="" selected disabled>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="ce_date_of_birth" name="date_of_birth" disabled required>
                </div>
                <div class="form-group born-abroad">
                    <label for="born_abroad">Born Abroad</label>
                    <input type="checkbox" id="ce_born_abroad" name="born_abroad" disabled onclick="ceToggleCountryField()">
                </div>
                <div class="form-group" id="ce_country_container" style="display: none;">
                    <label for="country">Country:</label>
                    <input type="text" id="ce_country" name="country" placeholder="Specify country if born abroad" disabled>
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
                        <input type="text" id="ce_person_city_municipality" name="person_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="person_province">Province:</label>
                        <input type="text" id="ce_person_province" name="person_province" disabled required>
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
                        <input type="text" id="ce_father_last_name" name="father_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="father_first_name">First Name:</label>
                        <input type="text" id="ce_father_first_name" name="father_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="father_middle_name">Middle Name:</label>
                        <input type="text" id="ce_father_middle_name" name="father_middle_name" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <strong>Mother's Maiden Name</strong>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="mother_last_name">Last Name:</label>
                        <input type="text" id="ce_mother_last_name" name="mother_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="mother_first_name">First Name:</label>
                        <input type="text" id="ce_mother_first_name" name="mother_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="mother_middle_name">Middle Name:</label>
                        <input type="text" id="ce_mother_middle_name" name="mother_middle_name" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="ce_requesting_party" name="requesting_party" disabled required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="ce_relationship_to_owner" name="relationship_to_owner" disabled required>
                </div>

                <!-- Request Purpose Section -->
                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="ce_purpose" onchange="ceToggleOtherPurpose()" disabled required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="ce_purpose_other" placeholder="Specify if other" style="display:none;" disabled>
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
                    <input type="radio" id="ce_delayed_yes" name="delayed" value="1" onclick="ceToggleDelayedDate()" disabled required>
                    <label for="delayed_yes">Yes</label>
                    <input type="radio" id="ce_delayed_no" name="delayed" value="0" onclick="ceToggleDelayedDate()" disabled required>
                    <label for="delayed_no">No</label>
                </div>
                <div class="form-group" id="ce_delayed_date_container" style="display:none;">
                    <label for="delayed_date">Delayed Date:</label>
                    <input type="date" id="ce_delayed_date" name="delayed_date" disabled>
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
                    <input type="text" name="appointment_date" id="ce_appointment_date" disabled required>
                    <input type="hidden" id="ce_appointment_time" name="appointment_time">
                </div>

                <!-- Submission Confirmation Modal -->
                <div class="modal-content">
                    <input type="submit" class="btn btn-primary w-100 py-2 mt-2" >
                    <button id="ceEnableButton">Edit</button>
                    <button id="ceCancelButton" class="hidden">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    <div id="otherModal" class="hidden closeModal">
        <div class="contentSemiWrapper">
            <h3 class="text-xl font-bold mb-4">Requester's Details</h3>
            <button type="button" class="btn btn-secondary w-100 py-2 mt-2 viewImagesButton" data-modal="otherModal">View Images</button>
            <form id="otherAppointmentForm" action="{{ route('updateOther', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <input type="hidden" id="ot_refNumber" name="reference_number" class="referenceNumberInput">
                    <div class="form-group">
                        <label for="requester_last_name">Last Name:</label>
                        <input type="text" id="ot_requester_last_name" name="requester_last_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_first_name">First Name:</label>
                        <input type="text" id="ot_requester_first_name" name="requester_first_name" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_middle_name">Middle Name:</label>
                        <input type="text" id="ot_requester_middle_name" name="requester_middle_name" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requester_mailing_address">Mailing Address:</label>
                    <input type="text" id="ot_requester_mailing_address" name="requester_mailing_address" placeholder="House No., Street Name / Barangay" disabled required>
                    <small class="hint">House No., Street Name / Barangay</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="requester_city_municipality">City/Municipality:</label>
                        <input type="text" id="ot_requester_city_municipality" name="requester_city_municipality" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="requester_province">Province:</label>
                        <input type="text" id="ot_requester_province" name="requester_province" disabled required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_no">Contact Number:</label>
                        <div class="contact-container">
                            <span class="country-code">+63</span>
                            <input type="tel" name="contact_no" id="ot_contact_no" maxlength="10" placeholder="9123456789" disabled required oninput="checkContactNumber()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="requester_sex">Sex:</label>
                        <select name="requester_sex" id="ot_requester_sex" disabled required>
                            <option value="" selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requester_age">Age:</label>
                        <input type="number" name="requester_age" id="ot_requester_age" min="1" max="120" required oninput="checkAgeLimit()" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="other_document">Specify Document:</label>
                    <input type="text" id="ot_other_document" name="other_document" placeholder="e.g., Barangay Clearance" disabled required>
                </div>

                <div class="form-group">
                    <label for="document_details">Document Details:</label>
                    <textarea id="ot_document_details" name="document_details" rows="4" placeholder="Provide additional details about the document" disabled required></textarea>
                </div>

                <div class="form-group">
                    <label for="requesting_party">Requesting Party:</label>
                    <input type="text" id="ot_requesting_party" name="requesting_party" disabled required>
                </div>

                <div class="form-group">
                    <label for="relationship_to_owner">Relationship to Owner:</label>
                    <input type="text" id="ot_relationship_to_owner" name="relationship_to_owner" disabled required>
                </div>

                <div class="section-header">Purpose of Request</div>
                <div class="form-group">
                    <label for="purpose">Purpose:</label>
                    <select name="purpose" id="ot_purpose" onchange="otToggleOtherPurpose()" disabled required>
                        <option value="" selected disabled>Select Purpose</option>
                        <option value="Claim Benefits/Loan">Claim Benefits/Loan</option>
                        <option value="Employment (Local)">Employment (Local)</option>
                        <option value="School Requirements">School Requirements</option>
                        <option value="Passport/Travel">Passport/Travel</option>
                        <option value="Employment (Abroad)">Employment (Abroad)</option>
                        <option value="Other">Other (Specify)</option>
                    </select>
                    <input type="text" name="purpose_other" id="ot_purpose_other" placeholder="Specify if other" style="display:none; margin-top: 25px;" disabled>
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
                    <input type="radio" id="ot_delayed_yes" name="delayed" value="1" onclick="otToggleDelayedDate()" disabled required>
                    <label for="delayed_yes">Yes</label>
                    <input type="radio" id="ot_delayed_no" name="delayed" value="0" onclick="otToggleDelayedDate()" disabled required>
                    <label for="delayed_no">No</label>
                </div>

                <div class="form-group" id="ot_delayed_date_container" style="display:none;">
                    <label for="delayed_date">Delayed Date:</label>
                    <input type="date" id="ot_delayed_date" name="delayed_date" disabled>
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
                        <input type="text" name="appointment_date" id="ot_appointment_date" disabled required>
                        <i class="fas fa-calendar-alt calendar-icon"></i>
                    </div>
                </div>

                <input type="submit" id="submit_btn" class="btn btn-primary w-100 py-2 mt-2">
                <button id="otEnableButton" >Edit</button>
                <button id="otCancelButton" class="hidden">Cancel</button>
            </form>
        </div>
    </div>

    <div id="customContextMenu" style="display: none; position: absolute; background: #fff; border: 1px solid #ddd; padding: 10px;">
        <ul>
            <li id="contextDone">Done</li>
            <li id="contextReject">Reject</li>
        </ul>
    </div>


</x-app-layout>
   

</body>
</html>
<!-- context menu for table rows -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("tbody").forEach(tbody => {
            tbody.addEventListener("contextmenu", function (event) {
                let targetRow = event.target.closest("tr");
                if (targetRow) {
                    event.preventDefault();

                    let referenceNumber = targetRow.querySelector("td:last-child").innerText.trim();

                    if (!referenceNumber) {
                        console.error("Reference number not found.");
                        return;
                    }

                    let customMenu = document.getElementById("customContextMenu");
                    customMenu.style.top = `${event.pageY}px`;
                    customMenu.style.left = `${event.pageX}px`;
                    customMenu.style.display = "block";

                    // Store the reference number and row element
                    customMenu.setAttribute("data-reference-number", referenceNumber);
                    customMenu.setAttribute("data-target-row", targetRow.dataset.rowId || ""); // Unique identifier
                }
            });
        });

        // Hide the context menu when clicking anywhere else
        document.addEventListener("click", function () {
            document.getElementById("customContextMenu").style.display = "none";
        });

        // Attach event listeners to the 'Done' and 'Reject' buttons
        document.getElementById("contextDone").addEventListener("click", function () {
            updateStatus("Done");
        });

        document.getElementById("contextReject").addEventListener("click", function () {
            updateStatus("Rejected");
        });

        function updateStatus(status) {
            let referenceNumber = document.getElementById("customContextMenu").getAttribute("data-reference-number");

            if (!referenceNumber) {
                alert("Reference number not found.");
                return;
            }

            fetch("{{ route('update.status') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                },
                body: JSON.stringify({ reference_number: referenceNumber, status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Status updated successfully!");

                    // Find the row with the matching reference number
                    document.querySelectorAll("tbody tr").forEach(row => {
                        let rowRefNumber = row.querySelector("td:last-child").innerText.trim();
                        if (rowRefNumber === referenceNumber) {
                            // Remove previous status classes
                            row.classList.remove("bg-green-100", "text-green-700", "bg-red-100", "text-red-700");

                            // Apply new background color
                            if (status === "Done") {
                                row.classList.add("bg-green-100", "text-green-700", "font-bold");
                            } else if (status === "Rejected") {
                                row.classList.add("bg-red-100", "text-red-700", "font-bold");
                            }

                            // Force DOM repaint (ensures visual update)
                            row.style.display = "none";
                            setTimeout(() => {
                                row.style.display = "table-row";
                            }, 50);
                        }
                    });

                    // Hide the context menu
                    document.getElementById("customContextMenu").style.display = "none";
                } else {
                    alert("Error updating status: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        }
    });


</script>

<!-- Search bar  function -->
<script>
    document.getElementById('searchDashboard').addEventListener('focus', function() {
        document.getElementById('searchIcon').style.display = "none"; // Hide icon when focused
    });

    document.getElementById('searchDashboard').addEventListener('blur', function() {
        if (this.value === "") { // Show icon only if input is empty
            document.getElementById('searchIcon').style.display = "block";
        }
    });

    document.getElementById('searchDashboard').addEventListener('input', function () {
        let query = this.value;

        if (query.length >= 2) {
            fetch(`/dashboard/search?query=${query}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                displayResults(data);
            })
            .catch(error => console.error('Error:', error));
        }
    });

    function displayResults(data) {
        // Clear existing rows in all tables
        const tables = document.querySelectorAll('.tab-content tbody');
        tables.forEach(table => table.innerHTML = '');

        let counter = 1;

        function appendRow(tableId, item, viewFunction) {
            const tableBody = document.querySelector(`#${tableId} tbody`);
            const row = document.createElement('tr');
            row.classList.add('cursor-pointer', 'hover:bg-gray-100');

            // Apply background color based on status
            if (item.status === "Done") {
                row.classList.add("bg-green-100", "text-green-700", "font-bold");
            } else if (item.status === "Rejected") {
                row.classList.add("bg-red-100", "text-red-700", "font-bold");
            }

            row.innerHTML = `
                <td class="border px-4 py-2">${item.id}</td>
                <td class="border px-4 py-2">${item.requester_last_name}</td>
                <td class="border px-4 py-2">${item.requester_first_name}</td>
                <td class="border px-4 py-2">${item.requester_middle_name ?? ''}</td>
                <td class="border px-4 py-2">${item.appointment_date}</td>
                <td class="border px-4 py-2">${item.reference_number}</td>
            `;

            row.addEventListener('click', function() {
                viewFunction(item.id);
            });

            tableBody.appendChild(row);
        }


        // Populate Birth Certificates Table
        data.birth_certificates.forEach(item => appendRow('birthCertificate', item, viewBirthCertDetails));

        // Populate Marriage Certificates Table
        data.marriage_certificates.forEach(item => appendRow('marriageCertificate', item, viewMarriageCertDetails));

        // Populate Marriage Licenses Table
        data.marriage_licenses.forEach(item => appendRow('marriageLicense', item, viewMarriageLicDetails));

        // Populate Death Certificates Table
        data.death_certificates.forEach(item => appendRow('deathCertificate', item, viewDeathCertDetails));

        // Populate Cenomar Table
        data.cenomars.forEach(item => appendRow('cenomar', item, viewCenomarDetails));

        // Populate Other Documents Table
        data.other_documents.forEach(item => appendRow('otherDocument', item, viewOtherDetails));
    }

</script>

<!-- date selector/sorter -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const prevBtn = document.getElementById("previewDate");
        const nextBtn = document.getElementById("nextDate");
        const dateInput = document.getElementById("tableDate");

        // Initialize the current date
        let currentDate = new Date();

        // Function to format date as YYYY-MM-DD
        function formatDate(date) {
            return date.toISOString().split("T")[0];
        }

        // Function to fetch appointments for all tables
        function fetchAppointments(date) {
            dateInput.value = formatDate(date);
            fetch(`/appointments-by-date?appointment_date=${formatDate(date)}`)
                .then(response => response.json())
                .then(data => {
                    requestAnimationFrame(() => {
                        updateTable("birthCertificate", data["Birth Certificate"]);
                        updateTable("marriageCertificate", data["Marriage Certificate"]);
                        updateTable("marriageLicense", data["Marriage License"]);
                        updateTable("deathCertificate", data["Death Certificate"]);
                        updateTable("cenomar", data["Cenomar"]);
                        updateTable("otherDocument", data["Other Document"]);
                    });
                })
                .catch(error => console.error("Error fetching appointments:", error));
        }

        // Function to update a specific table efficiently
        function updateTable(tableId, appointments) {
            const tableBody = document.querySelector(`#${tableId} tbody`);

            if (!tableBody) return;

            const fragment = document.createDocumentFragment();
            tableBody.innerHTML = ""; // Clear table efficiently before updating

            if (!appointments || appointments.length === 0) {
                const noDataRow = document.createElement("tr");
                noDataRow.innerHTML = `<td colspan="6" class="text-center">No appointments for this date</td>`;
                fragment.appendChild(noDataRow);
            } else {
                appointments.forEach((appointment, index) => {
                    const row = document.createElement("tr");
                    row.classList.add("cursor-pointer", "hover:bg-gray-100");
                    row.onclick = () => viewAppointmentDetails(appointment.id, tableId);

                    // Apply background color based on status
                    if (appointment.status === "Done") {
                        row.classList.add("bg-green-100", "text-green-700", "font-bold");
                    } else if (appointment.status === "Rejected") {
                        row.classList.add("bg-red-100", "text-red-700", "font-bold");
                    }

                    row.innerHTML = `
                        <td class="border px-4 py-2">${index + 1}</td>
                        <td class="border px-4 py-2">${appointment.requester_last_name}</td>
                        <td class="border px-4 py-2">${appointment.requester_first_name}</td>
                        <td class="border px-4 py-2">${appointment.requester_middle_name || ""}</td>
                        <td class="border px-4 py-2">${appointment.appointment_date}</td>
                        <td class="border px-4 py-2">${appointment.reference_number}</td>
                    `;

                    fragment.appendChild(row);
                });
            }

            // Append new rows at once (no blinking)
            tableBody.appendChild(fragment);
        }


        // Function to handle viewing appointment details dynamically
        function viewAppointmentDetails(id, tableId) {
            const viewFunctions = {
                birthCertificate: viewBirthCertDetails,
                marriageCertificate: viewMarriageCertDetails,
                marriageLicense: viewMarriageLicDetails,
                deathCertificate: viewDeathCertDetails,
                cenomar: viewCenomarDetails,
                otherDocument: viewOtherDetails,
            };

            if (viewFunctions[tableId]) {
                viewFunctions[tableId](id);
            } else {
                console.error("Invalid table ID");
            }
        }

        // Event listeners for Previous and Next buttons
        prevBtn.addEventListener("click", function () {
            currentDate.setDate(currentDate.getDate() - 1);
            fetchAppointments(currentDate);
        });

        nextBtn.addEventListener("click", function () {
            currentDate.setDate(currentDate.getDate() + 1);
            fetchAppointments(currentDate);
        });

        // Initial load
        fetchAppointments(currentDate);
    });
</script>

<!-- script for all the modal -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const forms = document.querySelectorAll("form");

        forms.forEach((form) => {
            form.addEventListener("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                const formData = new FormData(form);
                const actionUrl = form.action;

                fetch(actionUrl, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            // Hide the modal
                            document.querySelectorAll(".modal").forEach((modal) => {
                                modal.classList.add("hidden");
                            });

                            // Show a success message (Optional)
                            alert("Appointment updated successfully!");

                            // Refresh the page after 1 second
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            alert("An error occurred. Please try again.");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("Something went wrong. Please try again.");
                    });
            });
        });
    });

    // BIRTH CERTIFICATE
    const bcEnableBtn = document.getElementById('bcEnableButton');
    const bcCancelBtn = document.getElementById('bcCancelButton');
    bcEnableButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('bc_requester_last_name').disabled = false;
        document.getElementById('bc_requester_first_name').disabled = false;
        document.getElementById('bc_requester_middle_name').disabled = false;
        document.getElementById('bc_requester_mailing_address').disabled = false;
        document.getElementById('bc_requester_city_municipality').disabled = false;
        document.getElementById('bc_requester_province').disabled = false;
        document.getElementById('bc_contact_no').disabled = false;      
        document.getElementById('bc_requester_sex').disabled = false;
        document.getElementById('bc_requester_age').disabled = false;
        document.getElementById('bc_request_type').disabled = false;
        document.getElementById('bc_muslim_yes').disabled = false;
        document.getElementById('bc_muslim_no').disabled = false;
        document.getElementById('bc_brn').disabled = false;
        document.getElementById('bc_child_last_name').disabled = false;
        document.getElementById('bc_child_first_name').disabled = false;
        document.getElementById('bc_child_middle_name').disabled = false;
        document.getElementById('bc_child_sex').disabled = false;
        document.getElementById('bc_date_of_birth').disabled = false;
        document.getElementById('bc_born_abroad').disabled = false;
        document.getElementById('bc_country').disabled = false;;
        document.getElementById('bc_place_of_birth_city_municipality').disabled = false;
        document.getElementById('bc_place_of_birth_province').disabled = false;
        document.getElementById('bc_father_last_name').disabled = false;
        document.getElementById('bc_father_first_name').disabled = false;
        document.getElementById('bc_father_middle_name').disabled = false;
        document.getElementById('bc_mother_last_name').disabled = false;
        document.getElementById('bc_mother_first_name').disabled = false;
        document.getElementById('bc_mother_middle_name').disabled = false;
        document.getElementById('bc_purpose').disabled = false;
        document.getElementById('bc_purpose_other').disabled = false;
        document.getElementById('bc_delayed_yes').disabled = false;
        document.getElementById('bc_delayed_no').disabled = false;
        document.getElementById('bc_delayed_date').disabled = false;

        bcEnableButton.classList.add('hidden')
        bcCancelBtn.classList.remove('hidden');
    });

    function viewBirthCertDetails(appointmentId){
        fetch(`/appointment/birth/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('bc_refNumber').value = data.reference_number;
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
    const mcEnableButton = document.getElementById('marriageCertificateEnableButton');
    const mcCancelBtn = document.getElementById('mcCancelButton');
    mcEnableButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('mc_requester_last_name').disabled = false;
        document.getElementById('mc_requester_first_name').disabled = false;
        document.getElementById('mc_requester_middle_name').disabled = false;
        document.getElementById('mc_requester_mailing_address').disabled = false;
        document.getElementById('mc_requester_city_municipality').disabled = false;
        document.getElementById('mc_requester_province').disabled = false;
        document.getElementById('mc_contact_no').disabled = false;      
        document.getElementById('mc_requester_sex').disabled = false;
        document.getElementById('mc_requester_age').disabled = false;
        document.getElementById('mc_requestType').disabled = false;
        document.getElementById('mc_husband_last_name').disabled = false;
        document.getElementById('mc_husband_first_name').disabled = false;
        document.getElementById('mc_husband_middle_name').disabled = false;
        document.getElementById('mc_wife_last_name').disabled = false;
        document.getElementById('mc_wife_first_name').disabled = false;
        document.getElementById('mc_wife_middle_name').disabled = false;
        document.getElementById('mc_date_of_marriage').disabled = false;
        document.getElementById('mc_married_abroad').disabled = false;
        document.getElementById('mc_country').disabled = false;
        document.getElementById('mc_marriage_city_municipality').disabled = false;;
        document.getElementById('mc_marriage_province').disabled = false;
        document.getElementById('mc_requesting_party').disabled = false;
        document.getElementById('mc_relationship_to_owner').disabled = false;
        document.getElementById('mc_purpose').disabled = false;
        document.getElementById('mc_purpose_other').disabled = false;
        document.getElementById('mc_delayed_yes').disabled = false;
        document.getElementById('mc_delayed_no').disabled = false;
        document.getElementById('mc_delayed_date').disabled = false;

        mcEnableButton.classList.add('hidden');
        mcCancelBtn.classList.remove('hidden');
    });

    function viewMarriageCertDetails(appointmentId) {
        fetch(`/appointment/marriage/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('mc_refNumber').value = data.reference_number;
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
    const mlEnableButton = document.getElementById('mlEnableButton');
    const mlCancelBtn = document.getElementById('mlCancelButton');
    mlEnableButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('ml_requester_last_name').disabled = false;
        document.getElementById('ml_requester_first_name').disabled = false;
        document.getElementById('ml_requester_middle_name').disabled = false;
        document.getElementById('ml_requester_mailing_address').disabled = false;
        document.getElementById('ml_requester_city_municipality').disabled = false;
        document.getElementById('ml_requester_province').disabled = false;
        document.getElementById('ml_contact_no').disabled = false;      
        document.getElementById('ml_requester_sex').disabled = false;
        document.getElementById('ml_requester_age').disabled = false;
        document.getElementById('ml_request_type').disabled = false;
        document.getElementById('ml_brn').disabled = false;
        document.getElementById('ml_applicant_last_name').disabled = false;
        document.getElementById('ml_applicant_first_name').disabled = false;
        document.getElementById('ml_applicant_middle_name').disabled = false;
        document.getElementById('ml_spouse_last_name').disabled = false;
        document.getElementById('ml_spouse_first_name').disabled = false;
        document.getElementById('ml_spouse_middle_name').disabled = false;
        document.getElementById('ml_planned_date_of_marriage').disabled = false;
        document.getElementById('ml_place_of_marriage').disabled = false;
        document.getElementById('ml_requesting_party').disabled = false;
        document.getElementById('ml_relationship_to_owner').disabled = false;
        document.getElementById('ml_purpose').disabled = false;
        document.getElementById('ml_purpose_other').disabled = false;
        document.getElementById('ml_delayed_yes').disabled = false;
        document.getElementById('ml_delayed_no').disabled = false;
        document.getElementById('ml_delayed_date').disabled = false;;

        mlEnableButton.classList.add('hidden');
        mlCancelBtn.classList.remove('hidden');
    });

    function viewMarriageLicDetails(appointmentId){
        fetch(`/appointment/MLicense/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('ml_refNumber').value = data.reference_number;
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
    const dcEnableButton = document.getElementById('dcEnableButton');
    const dcCancelBtn = document.getElementById('dcCancelButton');
    dcEnableButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('dc_requester_last_name').disabled = false;
        document.getElementById('dc_requester_first_name').disabled = false;
        document.getElementById('dc_requester_middle_name').disabled = false;
        document.getElementById('dc_requester_mailing_address').disabled = false;
        document.getElementById('dc_requester_city_municipality').disabled = false;
        document.getElementById('dc_requester_province').disabled = false;
        document.getElementById('dc_contact_no').disabled = false;      
        document.getElementById('dc_requester_sex').disabled = false;
        document.getElementById('dc_requester_age').disabled = false;
        document.getElementById('dc_request_type').disabled = false;
        document.getElementById('dc_brn').disabled = false;
        document.getElementById('dc_deceased_last_name').disabled = false;
        document.getElementById('dc_deceased_first_name').disabled = false;
        document.getElementById('dc_deceased_middle_name').disabled = false;
        document.getElementById('dc_date_of_death').disabled = false;
        document.getElementById('dc_died_abroad').disabled = false;
        document.getElementById('dc_country').disabled = false;
        document.getElementById('dc_death_city_municipality').disabled = false;
        document.getElementById('dc_death_province').disabled = false;
        document.getElementById('dc_requesting_party').disabled = false;
        document.getElementById('dc_relationship_to_owner').disabled = false;
        document.getElementById('dc_purpose').disabled = false;
        document.getElementById('dc_purpose_other').disabled = false;
        document.getElementById('dc_delayed_yes').disabled = false;
        document.getElementById('dc_delayed_no').disabled = false;
        document.getElementById('dc_delayed_date').disabled = false;;

        dcEnableButton.classList.add('hidden');
        dcCancelBtn.classList.remove('hidden');
    });

    function viewDeathCertDetails(appointmentId){
        fetch(`/appointment/death/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
                // populate the form
                document.getElementById('dc_refNumber').value = data.reference_number;
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
    const ceEnableButton = document.getElementById('ceEnableButton');
    const ceCancelBtn = document.getElementById('ceCancelButton');
    ceEnableButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('ce_requester_last_name').disabled = false;
        document.getElementById('ce_requester_first_name').disabled = false;
        document.getElementById('ce_requester_middle_name').disabled = false;
        document.getElementById('ce_requester_mailing_address').disabled = false;
        document.getElementById('ce_requester_city_municipality').disabled = false;
        document.getElementById('ce_requester_province').disabled = false;
        document.getElementById('ce_contact_no').disabled = false;      
        document.getElementById('ce_requester_sex').disabled = false;
        document.getElementById('ce_requester_age').disabled = false;
        document.getElementById('ce_request_type').disabled = false;
        document.getElementById('ce_brn').disabled = false;

        document.getElementById('ce_person_last_name').disabled = false;
        document.getElementById('ce_person_first_name').disabled = false;
        document.getElementById('ce_person_middle_name').disabled = false;
        document.getElementById('ce_person_sex').disabled = false;
        document.getElementById('ce_date_of_birth').disabled = false;
        document.getElementById('ce_born_abroad').disabled = false;
        document.getElementById('ce_country').disabled = false;
        document.getElementById('ce_person_city_municipality').disabled = false;
        document.getElementById('ce_person_province').disabled = false;
        document.getElementById('ce_father_last_name').disabled = false;
        document.getElementById('ce_father_first_name').disabled = false;
        document.getElementById('ce_father_middle_name').disabled = false;
        document.getElementById('ce_mother_last_name').disabled = false;
        document.getElementById('ce_mother_first_name').disabled = false;
        document.getElementById('ce_mother_middle_name').disabled = false;

        document.getElementById('ce_requesting_party').disabled = false;
        document.getElementById('ce_relationship_to_owner').disabled = false;
        document.getElementById('ce_purpose').disabled = false;
        document.getElementById('ce_purpose_other').disabled = false;
        document.getElementById('ce_delayed_yes').disabled = false;
        document.getElementById('ce_delayed_no').disabled = false;
        document.getElementById('ce_delayed_date').disabled = false;;

        ceEnableButton.classList.add('hidden');
        ceCancelBtn.classList.remove('hidden');
    });

    function viewCenomarDetails(appointmentId){
        fetch(`/appointment/cenomar/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('ce_refNumber').value = data.reference_number;
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
    const otEnableButton = document.getElementById('otEnableButton');
    const otCancelBtn = document.getElementById('otCancelButton');
    otEnableButton.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('ot_requester_last_name').disabled = false;
        document.getElementById('ot_requester_first_name').disabled = false;
        document.getElementById('ot_requester_middle_name').disabled = false;
        document.getElementById('ot_requester_mailing_address').disabled = false;
        document.getElementById('ot_requester_city_municipality').disabled = false;
        document.getElementById('ot_requester_province').disabled = false;
        document.getElementById('ot_contact_no').disabled = false;      
        document.getElementById('ot_requester_sex').disabled = false;
        document.getElementById('ot_requester_age').disabled = false;

        document.getElementById('ot_other_document').disabled = false;
        document.getElementById('ot_document_details').disabled = false;

        document.getElementById('ot_requesting_party').disabled = false;
        document.getElementById('ot_relationship_to_owner').disabled = false;
        document.getElementById('ot_purpose').disabled = false;
        document.getElementById('ot_purpose_other').disabled = false;
        document.getElementById('ot_delayed_yes').disabled = false;
        document.getElementById('ot_delayed_no').disabled = false;
        document.getElementById('ot_delayed_date').disabled = false;;

        otEnableButton.classList.add('hidden');
        otCancelBtn.classList.remove('hidden');
    });

    function viewOtherDetails(appointmentId){
        fetch(`/appointment/other/${appointmentId}`)
        .then(response => response.json())
            .then(data => {
                console.log(data);
            // Populate the modal with the fetched data
            document.getElementById('ot_refNumber').value = data.reference_number;
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

    function closeModal(event) {
        if (event.target === event.currentTarget) {
            // Hide the modal
            event.currentTarget.classList.add("hidden");

            // Disable all form elements inside the modal
            const formElements = event.currentTarget.querySelectorAll("select, input, textarea");
            formElements.forEach(element => {
                element.disabled = true;
            });

            // Hide the cancel button and show the edit button
            if (event.currentTarget.id === "birthCertificateModal") {
                document.getElementById("bcCancelButton").classList.add("hidden");
                document.getElementById("bcEnableButton").classList.remove("hidden");
            } else if (event.currentTarget.id === "marriageCertificateModal") {
                document.getElementById("mcCancelButton").classList.add("hidden");
                document.getElementById("marriageCertificateEnableButton").classList.remove("hidden");
            } else if (event.currentTarget.id === "marriageLicenseModal") {
                document.getElementById("mlCancelButton").classList.add("hidden");
                document.getElementById("mlEnableButton").classList.remove("hidden");
            } else if (event.currentTarget.id === "deathCertificateModal") {
                document.getElementById("dcCancelButton").classList.add("hidden");
                document.getElementById("dcEnableButton").classList.remove("hidden");
            } else if (event.currentTarget.id === "cenomarModal") {
                document.getElementById("ceCancelButton").classList.add("hidden");
                document.getElementById("ceEnableButton").classList.remove("hidden");
            } else if (event.currentTarget.id === "otherModal") {
                document.getElementById("otCancelButton").classList.add("hidden");
                document.getElementById("otEnableButton").classList.remove("hidden");
            }
        }
    }


    // Add click event listeners for closing the modals when clicking outside
    document.getElementById("birthCertificateModal").addEventListener("click", closeModal);
    document.getElementById("marriageCertificateModal").addEventListener("click", closeModal);
    document.getElementById("marriageLicenseModal").addEventListener("click", closeModal);
    document.getElementById("deathCertificateModal").addEventListener("click", closeModal);
    document.getElementById("cenomarModal").addEventListener("click", closeModal);
    document.getElementById("otherModal").addEventListener("click", closeModal);


    // Add click event listener to the cancel button
    // close the modal/cancel changes
    bcCancelBtn.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('bc_requester_last_name').disabled = true;
        document.getElementById('bc_requester_first_name').disabled = true;
        document.getElementById('bc_requester_middle_name').disabled = true;
        document.getElementById('bc_requester_mailing_address').disabled = true;
        document.getElementById('bc_requester_city_municipality').disabled = true;
        document.getElementById('bc_requester_province').disabled = true;
        document.getElementById('bc_contact_no').disabled = true;      
        document.getElementById('bc_requester_sex').disabled = true;
        document.getElementById('bc_requester_age').disabled = true;
        document.getElementById('bc_request_type').disabled = true;
        document.getElementById('bc_muslim_yes').disabled = true;
        document.getElementById('bc_muslim_no').disabled = true;
        document.getElementById('bc_brn').disabled = true;
        document.getElementById('bc_child_last_name').disabled = true;
        document.getElementById('bc_child_first_name').disabled = true;
        document.getElementById('bc_child_middle_name').disabled = true;
        document.getElementById('bc_child_sex').disabled = true;
        document.getElementById('bc_date_of_birth').disabled = true;
        document.getElementById('bc_born_abroad').disabled = true;
        document.getElementById('bc_country').disabled = true;;
        document.getElementById('bc_place_of_birth_city_municipality').disabled = true;
        document.getElementById('bc_place_of_birth_province').disabled = true;
        document.getElementById('bc_father_last_name').disabled = true;
        document.getElementById('bc_father_first_name').disabled = true;
        document.getElementById('bc_father_middle_name').disabled = true;
        document.getElementById('bc_mother_last_name').disabled = true;
        document.getElementById('bc_mother_first_name').disabled = true;
        document.getElementById('bc_mother_middle_name').disabled = true;
        document.getElementById('bc_purpose').disabled = true;
        document.getElementById('bc_purpose_other').disabled = true;
        document.getElementById('bc_delayed_yes').disabled = true;
        document.getElementById('bc_delayed_no').disabled = true;
        document.getElementById('bc_delayed_date').disabled = true;
        document.getElementById('bc_appointment_date').disabled = true;
        closeModal({ target: birthCertificateModal, currentTarget: birthCertificateModal });
    });
    mcCancelBtn.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('mc_requester_last_name').disabled = true;
        document.getElementById('mc_requester_first_name').disabled = true;
        document.getElementById('mc_requester_middle_name').disabled = true;
        document.getElementById('mc_requester_mailing_address').disabled = true;
        document.getElementById('mc_requester_city_municipality').disabled = true;
        document.getElementById('mc_requester_province').disabled = true;
        document.getElementById('mc_contact_no').disabled = true;      
        document.getElementById('mc_requester_sex').disabled = true;
        document.getElementById('mc_requester_age').disabled = true;
        document.getElementById('mc_requestType').disabled = true;
        document.getElementById('mc_husband_last_name').disabled = true;
        document.getElementById('mc_husband_first_name').disabled = true;
        document.getElementById('mc_husband_middle_name').disabled = true;
        document.getElementById('mc_wife_last_name').disabled = true;
        document.getElementById('mc_wife_first_name').disabled = true;
        document.getElementById('mc_wife_middle_name').disabled = true;
        document.getElementById('mc_date_of_marriage').disabled = true;
        document.getElementById('mc_married_abroad').disabled = true;
        document.getElementById('mc_country').disabled = true;
        document.getElementById('mc_marriage_city_municipality').disabled = true;;
        document.getElementById('mc_marriage_province').disabled = true;
        document.getElementById('mc_requesting_party').disabled = true;
        document.getElementById('mc_relationship_to_owner').disabled = true;
        document.getElementById('mc_purpose').disabled = true;
        document.getElementById('mc_purpose_other').disabled = true;
        document.getElementById('mc_delayed_yes').disabled = true;
        document.getElementById('mc_delayed_no').disabled = true;
        document.getElementById('mc_delayed_date').disabled = true;
        document.getElementById('mc_appointment_date').disabled = true;
        closeModal({ target: marriageCertificateModal, currentTarget: marriageCertificateModal });
    });
    mlCancelBtn.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('ml_requester_last_name').disabled = true;
        document.getElementById('ml_requester_first_name').disabled = true;
        document.getElementById('ml_requester_middle_name').disabled = true;
        document.getElementById('ml_requester_mailing_address').disabled = true;
        document.getElementById('ml_requester_city_municipality').disabled = true;
        document.getElementById('ml_requester_province').disabled = true;
        document.getElementById('ml_contact_no').disabled = true;      
        document.getElementById('ml_requester_sex').disabled = true;
        document.getElementById('ml_requester_age').disabled = true;
        document.getElementById('ml_request_type').disabled = true;
        document.getElementById('ml_brn').disabled = true;
        document.getElementById('ml_applicant_last_name').disabled = true;
        document.getElementById('ml_applicant_first_name').disabled = true;
        document.getElementById('ml_applicant_middle_name').disabled = true;
        document.getElementById('ml_spouse_last_name').disabled = true;
        document.getElementById('ml_spouse_first_name').disabled = true;
        document.getElementById('ml_spouse_middle_name').disabled = true;
        document.getElementById('ml_planned_date_of_marriage').disabled = true;
        document.getElementById('ml_place_of_marriage').disabled = true;
        document.getElementById('ml_requesting_party').disabled = true;
        document.getElementById('ml_relationship_to_owner').disabled = true;
        document.getElementById('ml_purpose').disabled = true;
        document.getElementById('ml_purpose_other').disabled = true;
        document.getElementById('ml_delayed_yes').disabled = true;
        document.getElementById('ml_delayed_no').disabled = true;
        document.getElementById('ml_delayed_date').disabled = true;;
        document.getElementById('ml_appointment_date').disabled = true;
        closeModal({ target: marriageLicenseModal, currentTarget: marriageLicenseModal });
    });
    dcCancelBtn.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('dc_requester_last_name').disabled = true;
        document.getElementById('dc_requester_first_name').disabled = true;
        document.getElementById('dc_requester_middle_name').disabled = true;
        document.getElementById('dc_requester_mailing_address').disabled = true;
        document.getElementById('dc_requester_city_municipality').disabled = true;
        document.getElementById('dc_requester_province').disabled = true;
        document.getElementById('dc_contact_no').disabled = true;      
        document.getElementById('dc_requester_sex').disabled = true;
        document.getElementById('dc_requester_age').disabled = true;
        document.getElementById('dc_request_type').disabled = true;
        document.getElementById('dc_brn').disabled = true;
        document.getElementById('dc_deceased_last_name').disabled = true;
        document.getElementById('dc_deceased_first_name').disabled = true;
        document.getElementById('dc_deceased_middle_name').disabled = true;
        document.getElementById('dc_date_of_death').disabled = true;
        document.getElementById('dc_died_abroad').disabled = true;
        document.getElementById('dc_country').disabled = true;
        document.getElementById('dc_death_city_municipality').disabled = true;
        document.getElementById('dc_death_province').disabled = true;
        document.getElementById('dc_requesting_party').disabled = true;
        document.getElementById('dc_relationship_to_owner').disabled = true;
        document.getElementById('dc_purpose').disabled = true;
        document.getElementById('dc_purpose_other').disabled = true;
        document.getElementById('dc_delayed_yes').disabled = true;
        document.getElementById('dc_delayed_no').disabled = true;
        document.getElementById('dc_delayed_date').disabled = true;;
        document.getElementById('dc_appointment_date').disabled = true;
        closeModal({ target: deathCertificateModal, currentTarget: deathCertificateModal });
    });
    ceCancelBtn.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('ce_requester_last_name').disabled = true;
        document.getElementById('ce_requester_first_name').disabled = true;
        document.getElementById('ce_requester_middle_name').disabled = true;
        document.getElementById('ce_requester_mailing_address').disabled = true;
        document.getElementById('ce_requester_city_municipality').disabled = true;
        document.getElementById('ce_requester_province').disabled = true;
        document.getElementById('ce_contact_no').disabled = true;      
        document.getElementById('ce_requester_sex').disabled = true;
        document.getElementById('ce_requester_age').disabled = true;
        document.getElementById('ce_request_type').disabled = true;
        document.getElementById('ce_brn').disabled = true;
        document.getElementById('ce_person_last_name').disabled = true;
        document.getElementById('ce_person_first_name').disabled = true;
        document.getElementById('ce_person_middle_name').disabled = true;
        document.getElementById('ce_person_sex').disabled = true;
        document.getElementById('ce_date_of_birth').disabled = true;
        document.getElementById('ce_born_abroad').disabled = true;
        document.getElementById('ce_country').disabled = true;
        document.getElementById('ce_person_city_municipality').disabled = true;
        document.getElementById('ce_person_province').disabled = true;
        document.getElementById('ce_father_last_name').disabled = true;
        document.getElementById('ce_father_first_name').disabled = true;
        document.getElementById('ce_father_middle_name').disabled = true;
        document.getElementById('ce_mother_last_name').disabled = true;
        document.getElementById('ce_mother_first_name').disabled = true;
        document.getElementById('ce_mother_middle_name').disabled = true;
        document.getElementById('ce_requesting_party').disabled = true;
        document.getElementById('ce_relationship_to_owner').disabled = true;
        document.getElementById('ce_purpose').disabled = true;
        document.getElementById('ce_purpose_other').disabled = true;
        document.getElementById('ce_delayed_yes').disabled = true;
        document.getElementById('ce_delayed_no').disabled = true;
        document.getElementById('ce_delayed_date').disabled = true;;
        document.getElementById('ce_appointment_date').disabled = true;
        closeModal({ target: cenomarModal, currentTarget: cenomarModal });
    });
    otCancelBtn.addEventListener('click', function (event) {
        event.preventDefault();
        document.getElementById('ot_requester_last_name').disabled = true;
        document.getElementById('ot_requester_first_name').disabled = true;
        document.getElementById('ot_requester_middle_name').disabled = true;
        document.getElementById('ot_requester_mailing_address').disabled = true;
        document.getElementById('ot_requester_city_municipality').disabled = true;
        document.getElementById('ot_requester_province').disabled = true;
        document.getElementById('ot_contact_no').disabled = true;      
        document.getElementById('ot_requester_sex').disabled = true;
        document.getElementById('ot_requester_age').disabled = true;

        document.getElementById('ot_other_document').disabled = true;
        document.getElementById('ot_document_details').disabled = true;

        document.getElementById('ot_requesting_party').disabled = true;
        document.getElementById('ot_relationship_to_owner').disabled = true;
        document.getElementById('ot_purpose').disabled = true;
        document.getElementById('ot_purpose_other').disabled = true;
        document.getElementById('ot_delayed_yes').disabled = true;
        document.getElementById('ot_delayed_no').disabled = true;
        document.getElementById('ot_delayed_date').disabled = true;;
        document.getElementById('ot_appointment_date').disabled = true;
        closeModal({ target: otherModal, currentTarget: otherModal });
    });
</script>

<!-- Tab functions -->
<script>
    function changeTab(event, tabId) {
        event.preventDefault();
        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.tab-link').forEach(link => link.classList.remove('active'));

        // Show selected tab
        document.getElementById(tabId).classList.add('active');
        event.target.classList.add('active');
    }
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".tab-link");

        function updateTabLabels() {
            tabs.forEach(tab => {
                const fullText = tab.getAttribute("data-full");
                const shortText = getInitials(fullText);

                if (window.innerWidth < 768) {
                    if (tab.classList.contains("active")) {
                        smoothExpand(tab, fullText); // Use animation when active
                    } else {
                        tab.innerHTML = shortText;
                    }
                } else {
                    tab.innerHTML = fullText;
                }
            });
        }

        function getInitials(text) {
            return text.split(" ").map(word => word[0]).join("").toUpperCase();
        }

        function smoothExpand(tab, fullText) {
            tab.innerHTML = ""; // Reset text first to prevent overlapping characters
            let index = 0;

            function typeNextLetter() {
                if (index < fullText.length) {
                    tab.innerHTML += fullText[index];
                    index++;
                    setTimeout(typeNextLetter, 20); // Adjust speed here
                }
            }

            typeNextLetter();
        }

        function handleTabClick(event) {
            tabs.forEach(tab => tab.classList.remove("active"));
            event.currentTarget.classList.add("active");
            updateTabLabels(); // Ensure labels update properly
        }

        // Initial update
        updateTabLabels();

        // Listen for window resize with debounce
        let resizeTimeout;
        window.addEventListener("resize", () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateTabLabels, 200);
        });

        // Listen for tab clicks to update labels
        tabs.forEach(tab => {
            tab.addEventListener("click", handleTabClick);
        });
    });

</script>

<!-- script for navigating to image requirements -->
<script>
    document.querySelectorAll(".viewImagesButton").forEach(button => {
        button.addEventListener("click", function() {
            let modalId = this.getAttribute("data-modal");
            let modal = document.getElementById(modalId);

            if (!modal) {
                console.error("Modal not found for ID:", modalId);
                alert("Modal not found.");
                return;
            }

            let referenceNumberInput = modal.querySelector(".referenceNumberInput");
            let referenceNumber = referenceNumberInput ? referenceNumberInput.value : null;

            console.log("Clicked Data Reference Number:", referenceNumber); // Debugging Log

            if (!referenceNumber) {
                alert("Reference number is missing.");
                return;
            }

            window.open(`/images/${referenceNumber}`, '_blank');

        });
    });

</script>
