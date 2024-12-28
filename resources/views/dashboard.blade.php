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
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                                        <tr>
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
                                        <tr>
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
                                        <tr>
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
                                        <tr>
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
                                        <tr>
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
                                        <tr>
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
                    <!-- More tab contents as needed -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Script for Dropdown Functionality -->
<script>
        const dropdownButton = document.getElementById('notificationDropdownButton');
        const dropdownContent = document.getElementById('notificationDropdown');

        dropdownButton.addEventListener('click', () => {
        dropdownContent.classList.toggle('hidden');

        // Kapag visible na ang dropdown, mark notifications as read
        if (!dropdownContent.classList.contains('hidden')) {
            const url = dropdownButton.getAttribute('data-url'); // Kukunin ang URL mula sa data attribute

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
