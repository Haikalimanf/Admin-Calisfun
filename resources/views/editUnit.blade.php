<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Edit Unit</h1>
                <p class="text-gray-500 mb-6">Edit Unit on Calisfun</p>

                <!-- Form untuk update unit -->
                <form action="{{ route('units.update', $unit->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menandakan bahwa ini adalah permintaan PUT untuk update -->

                <!-- Unit Title -->
                <div class="mb-4">
                    <label for="unit-title" class="block text-sm font-medium text-gray-700">Unit Title</label>
                    <input type="text" id="unit-title" name="title" value="{{ $unit->title }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                </div>

                <!-- Unit Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Unit Description</label>
                    <textarea id="description" name="description"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm"
                            required>{{ $unit->description }}</textarea>
                </div>


                <!-- Unit Reference To Course -->
                <div class="mb-6">
                    <label for="unit-course" class="block text-sm font-medium text-gray-700">Unit Course</label>
                    <select id="unit-course" name="course_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        <option value="">Pilih Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $unit->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                


                    <!-- Create Button -->
                    <button type="submit"
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Update Unit
                    </button>

                    <!-- Garis Bawah -->
                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
