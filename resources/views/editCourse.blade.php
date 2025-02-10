<!-- resources/views/editCourse.blade.php -->

<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Edit Course</h1>
                <p class="text-gray-500 mb-6">Edit Course on Calisfun</p>

                <!-- Form Edit Course -->
                <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Course Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" id="title" name="title" placeholder="Please input your Course Name..."
                        value="{{ old('title', $course->title) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        @error('title')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Course Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image URL -->
                    <div class="mb-4">
                        <label for="image_src" class="block text-sm font-medium text-gray-700">Image Source</label>
                        <input type="file" id="image_src" name="image_src" class="hidden" accept="image/jpeg, image/png, image/jpg, image/svg+xml" required onchange="updateFileName()">
                        <div class="flex items-center justify-between space-x-4">
                            <label for="image_src" class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images mr-2">
                                    <path d="M18 22H4a2 2 0 0 1-2-2V6"/>
                                    <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/>
                                    <circle cx="12" cy="8" r="2"/>
                                    <rect width="16" height="16" x="6" y="2" rx="2"/>
                                </svg>
                                <span id="file-name" class=" text-gray-600">No file chosen</span>
                            </label>
                        </div>
                        @error('image_src') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white p-2 mt-3 rounded">Update Course</button>
                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateFileName() {
            const fileInput = document.getElementById('image_src');
            const fileName = fileInput.files[0] ? fileInput.files[0].name : "No file chosen";
            const fileExtension = fileInput.files[0] ? fileInput.files[0].name.split('.').pop() : "";
            const formattedFileName = fileName + " (" + fileExtension.toUpperCase() + ")";
            document.getElementById('file-name').textContent = formattedFileName;
            document.getElementById('image_name').textContent = "Change Image";
        }
    </script>
</x-app-layout>
