<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Course Create</h1>
                <p class="text-gray-500 mb-6">Create Course</p>

                <!-- Form Create Course -->
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Course Title</label>
                        <input type="text" id="title" name="title" placeholder="Please input your course name..." 
                        value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm" required>
                        @error('title') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" placeholder="Please input your course description..." 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm"
                        required>{{ old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image_src" class="block text-gray-700">Image Source (Path)</label>
                        <input type="text" id="image_src" name="image_src" value="{{ old('image_src') }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm"
                        placeholder="/path/to/image.jpg" required>
                        @error('image_src') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" 
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Create New Course
                    </button>
                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
