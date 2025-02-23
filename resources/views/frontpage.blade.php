<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<x-app-layout>
    <div class="FrontPageWrapper">
        <h2 class="text-2xl font-semibold mb-4">Create a Post</h2>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- News Post Form -->
        <form id="frontPageForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium">Title</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium">Content</label>
                <textarea name="content" id="content" rows="5" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium">Upload Image (Optional)</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-md">
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">Post News</button>
            </div>
        </form>
    </div>

    <!-- Display Posts -->
    <div class="posts-container">
        <h2 class="section-title"><i class="fas fa-newspaper"></i> Recent Posts</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if($posts->isEmpty())
            <p class="no-posts">No news posts available.</p>
        @else
            <div class="posts-wrapper">
                @foreach($posts as $post)
                    <div class="post-card">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <p class="post-date">Posted on {{ $post->created_at->format('M d, Y') }}</p>
                        <p class="post-content lineMax">{{ $post->content }}</p>
                        
                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="post-image" onclick="openModal(`{{ asset('storage/' . $post->image) }}`)">
                        @endif

                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-form" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>

                    </div>
                @endforeach
            </div>
            <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" id="modalImage">
            </div>

            <!-- Pagination -->
            <div class="pagination">
                {{ $posts->links() }}
            </div>
        @endif
    </div>

</x-app-layout>

<script>
    // Open the Modal
    function openModal(imageSrc) {
        document.getElementById('imageModal').style.display = "flex";
        document.getElementById('modalImage').src = imageSrc;
    }

    // Close the Modal
    function closeModal() {
        document.getElementById('imageModal').style.display = "none";
    }


    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.post-content').forEach(content => {
            // Add class to limit lines initially
            content.classList.add('lineMax');

            // Check if the content is overflowing
            if (content.scrollHeight > content.clientHeight) {
                let readMore = document.createElement('span');
                readMore.className = 'read-more';
                readMore.innerText = ' Read more';

                // Wrap content inside a div for better control
                let wrapper = document.createElement('div');
                wrapper.className = 'post-content-wrapper';
                wrapper.appendChild(content.cloneNode(true));
                content.replaceWith(wrapper);

                wrapper.appendChild(readMore);

                // Event listener to toggle read more/less
                readMore.addEventListener('click', function () {
                    if (wrapper.firstChild.classList.contains('lineMax')) {
                        wrapper.firstChild.classList.remove('lineMax');
                        readMore.innerText = ' Read less';
                    } else {
                        wrapper.firstChild.classList.add('lineMax');
                        readMore.innerText = ' Read more';
                    }
                });
            }
        });
    });

    function confirmDelete(event) {
        event.preventDefault(); // Prevent form submission
        let confirmation = confirm("Are you sure you want to delete this post?");
        if (confirmation) {
            event.target.submit(); // Submit form if confirmed
        }
    }
</script>

</body>
</html>