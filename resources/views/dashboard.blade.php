<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Data Overview</h3>
                    
                    <!-- Tabs -->
                    <ul class="flex border-b">
                        <li class="-mb-px mr-1">
                            <a href="#birthCertificate" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Birth Certificate</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#marraigeCertificate" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Marraige Certificate</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#marraigeLicense" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Marraige License</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#deathCertificate" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Death Certificate</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#cenomar" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Cenomar</a>
                        </li>
                        <li class="-mb-px mr-1">
                            <a href="#appointments" class="bg-white inline-block py-2 px-4 text-blue-500 font-semibold hover:text-blue-800">Others</a>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Birth Certificate')
                                        <tr>
                                            <td class="border px-4 py-2">{{ $appointment->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="marraigeCertificate" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Marriage Certificate')
                                        <tr>
                                            <td class="border px-4 py-2">{{ $appointment->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="marraigeLicense" class="tab-content hidden">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Marriage License')
                                        <tr>
                                            <td class="border px-4 py-2">{{ $appointment->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Death Certificate')
                                        <tr>
                                            <td class="border px-4 py-2">{{ $appointment->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Cenomar')
                                        <tr>
                                            <td class="border px-4 py-2">{{ $appointment->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="appointments" class="tab-content">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Last Name</th>
                                    <th class="border px-4 py-2">First Name</th>
                                    <th class="border px-4 py-2">Middle Name</th>
                                    <th class="border px-4 py-2">Appointment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    @if($appointment->appointment_type === 'Other')
                                        <tr>
                                            <td class="border px-4 py-2">{{ $appointment->last_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->first_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->middle_name }}</td>
                                            <td class="border px-4 py-2">{{ $appointment->appointment_date }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- More tab contents as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
