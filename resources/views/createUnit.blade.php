<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Unit Create</h1>
                <p class="text-gray-500 mb-6">Create Unit</p>

                <form action="{{ route('units.store') }}" method="POST">
                    @csrf

                    <!-- Unit Title -->
                    <div class="mb-4">
                        <label for="unit-title" class="block text-sm font-medium text-gray-700">Unit Title</label>
                        <input type="text" id="unit-title" name="title" placeholder="Please input your unit title..."
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm" required>
                    </div>

                    <!-- Unit Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Unit Description</label>
                        <textarea id="description" name="description" placeholder="Please input your unit description..." 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm"
                        required></textarea>
                    </div>

                    <!-- Unit Reference To Course -->
                    <div class="mb-6">
                        <label for="unit-reference" class="block text-sm font-medium text-gray-700">Unit Reference To Course</label>
                        <select id="unit-reference" name="course_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm" required>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Create Button -->
                    <button type="submit" 
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Create New Unit
                    </button>

                    <!-- Garis Bawah -->
                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
