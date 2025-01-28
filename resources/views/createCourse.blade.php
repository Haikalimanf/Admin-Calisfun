<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Create New Course</h1>

        <!-- Form Create Course -->
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Course Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                @error('title') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" class="mt-1 p-2 border border-gray-300 rounded w-full" required>{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="image_src" class="block text-gray-700">Image Source (Path)</label>
                <input type="text" id="image_src" name="image_src" value="{{ old('image_src') }}" class="mt-1 p-2 border border-gray-300 rounded w-full" placeholder="/path/to/image.jpg" required>
                @error('image_src') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Create Course</button>
        </form>
    </div>
</x-app-layout>
