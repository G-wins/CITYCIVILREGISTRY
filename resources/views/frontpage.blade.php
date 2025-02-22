<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <x-app-layout>
        <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Create a News Post</h2>

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- News Post Form -->
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title Input -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Content Input -->
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-medium">Content</label>
                    <textarea name="content" id="content" rows="5" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <!-- Image Upload (Optional) -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-medium">Upload Image (Optional)</label>
                    <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-md">
                </div>

                <!-- Submit Button -->
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">Post News</button>
                </div>
            </form>

        </div>
    </x-app-layout>
</body>
</html>