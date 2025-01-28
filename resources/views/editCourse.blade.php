<!-- resources/views/editCourse.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Edit Course</h1>

        <!-- Form Edit Course -->
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Course Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Course Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" class="mt-1 p-2 border border-gray-300 rounded w-full">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Course Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" class="mt-1 p-2 border border-gray-300 rounded w-full">{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image URL -->
            <div class="mb-4">
                <label for="image_src" class="block text-gray-700">Image URL</label>
                <input type="text" id="image_src" name="image_src" value="{{ old('image_src', $course->image_src) }}" class="mt-1 p-2 border border-gray-300 rounded w-full" alt="Course Image">
                @error('image_src')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Course</button>
        </form>
    </div>
</x-app-layout>
