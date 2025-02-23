<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/welcome_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="welcome-container">
        <!-- Hero Section -->
        <header class="hero">
            <div class="hero-content">
                <div class="leftSideHeader">
                    <img src="{{ asset('logo/ccro.png') }}" alt="Logo ccro" class="logo-left">
                    <img src="{{ asset('logo/Csjdm Logo.png') }}" alt="Logo csjdm" class="logo-right">
                    <div class="hero-title">
                        <h2>City of San Jose Del Monte</h2>
                        <h3>Registry Office (CCRO)</h3>
                    </div>
                </div>
                    
                <!-- Hamburger Menu Icon -->
                <div class="menu-icon" id="menuIcon">
                    <i class="fas fa-bars"></i>
                </div>
            </div>

            <!-- Navigation Tabs (Will be hidden on small screens) -->
            <nav class="tabs" id="navMenu">
                <a href="{{ route('contact.us') }}" class="tab {{ request()->routeIs('contact.us') ? 'active' : '' }}">Contact Us</a>
                <a href="{{ route('requirements') }}" class="tab {{ request()->routeIs('requirements') ? 'active' : '' }}">Requirements</a>
                <a href="{{ route('services') }}" class="tab {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('about.us') }}" class="tab {{ request()->routeIs('about.us') ? 'active' : '' }}">About Us</a>
            </nav>
        </header>
        <div class="mainContent">
            <div class="steps">
                <h2>Steps to Get an Appointment</h2>
                
                <div class="step">
                    <p><strong>Step 1:</strong> Fill out the form with your personal details and select the type of document you need (Birth Certificate, Marriage Certificate, Marriage License, Death Certificate, CENOMAR, or other documents).</p>
                    <a id="proceed-button" href="#" class="button">Proceed to Form</a>
                </div>

                <div class="step">
                    <p><strong>Step 2:</strong> Upload the required supporting documents to complete your request.</p>
                    <a id="imgButton" href="#" class="button">Upload Documents</a>
                </div>

                <div class="note">
                    <p><small><i>You may return anytime for Step 2, as long as it's within your scheduled appointment date.</i></small></p>
                </div>

                <!-- Tutorial Video (Moved Inside Steps if it's a Guide) -->
                <div class="tutorial-container">
                    <h3>Watch the Tutorial</h3>
                    <video class="tutorial" controls>
                        <source src="{{ asset('video/tutorial.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div class="scroll-indicator">↓ Scroll Down for Updates & Announcements ↓</div>

        <!-- News & Announcements -->
        <div class="postsWrapper">
            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if($posts->isEmpty())
                <p class="no-posts"></p>
            @else
                <div class="posts">
                    @foreach($posts as $post)
                        <div class="post">
                            <div class="news-item">
                                <h3>{{ $post->title }}</h3>
                                <p class="datePost">Posted on {{ $post->created_at->format('M d, Y') }}</p>

                                <p class="news-content lineMax">{{ $post->content }}</p>

                                @if($post->image)
                                    <!-- Clickable Image -->
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image" onclick="openModalZoom(`{{ asset('storage/' . $post->image) }}`)">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div id="imageModalZoom" class="modalZoom" onclick="closeModalZoom(event)">
        <img id="modalImageZoom" class="modal-content-zoom">
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 CITY CIVIL REGISTRY</p>
    </footer>


    <!-- Data Privacy Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Data Privacy Notice</h2>
            <p>By proceeding with your appointment request, you agree to the collection and processing of your personal data according to our data privacy policy.</p>
            <button id="confirm-proceed" class="btn" data-url="{{ route('appointment.form') }}">Proceed</button>
        </div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header position-relative">
                    <h3 class="modal-title" id="imageModalLabel">Enter Reference Number</h3>
                    <span class="close" id="closeButton">&times;</span>
                </div>
                <div class="modal-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="referenceForm" action="{{ route('image.requirements') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="refNumber" class="form-label">Reference Number:</label>
                            <div class="input-button-container">
                                <input type="text" id="refNumber" name="refNumber" class="form-control @error('refNumber') is-invalid @enderror" required>
                                <button type="button" id="confirm_reference" class="btn btn-primary">Confirm</button>
                            </div>
                            <div id="refNumberError" class="text-danger"></div> <!-- Error message container -->
                            @error('refNumber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="hint">Your reference number from step 1.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/welcome.js') }}"></script>
    <script>
        // Open the Modal
        function openModalZoom(imageSrc) {
            let modal = document.getElementById('imageModalZoom');
            let modalImage = document.getElementById('modalImageZoom');

            modalImage.src = imageSrc;  // Set image source
            modal.classList.add('show'); // Add 'show' class to make modal visible
        }

        // Close the Modal when clicking outside the image
        function closeModalZoom(event) {
            let modal = document.getElementById('imageModalZoom');
            
            // Only close if clicking outside the image
            if (event.target === modal) {
                modal.classList.remove('show'); // Remove 'show' class to hide modal
            }
        }



        $(document).ready(function(){
            $('#confirm_reference').click(function(){
                var refNumber = $('#refNumber').val();
                var form = $('#referenceForm');

                $.ajax({
                    url: "{{ route('check.reference') }}", // Route for checking reference
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        refNumber: refNumber
                    },
                    success: function(response) {
                        if(response.valid) {
                            window.location.href = response.redirect; // Redirect if valid
                        } else {
                            $('#refNumberError').text("Reference number not found. Please try again.");
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        $('#refNumberError').text("An error occurred. Please try again later.");
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.news-content').forEach(content => {
                content.classList.add('lineMax');

                if (content.scrollHeight > content.clientHeight) {
                    let readMore = document.createElement('span');
                    readMore.className = 'read-more';
                    readMore.innerText = '... Read more';

                    content.appendChild(readMore);

                    readMore.addEventListener('click', function () {
                        if (content.classList.contains('lineMax')) {
                            content.classList.remove('lineMax');
                            readMore.innerText = ' Read less';
                        } else {
                            content.classList.add('lineMax');
                            readMore.innerText = '... Read more';
                        }
                    });
                }
            });
        });


    </script>
</body>
</html>