<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Edit Lesson</h1>
                <p class="text-gray-500 mb-6">Update the lesson details below</p>

                <!-- Form untuk update lesson -->
                <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Lesson Title -->
                    <div class="mb-4">
                        <label for="lesson-title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                        <input type="text" id="lesson-title" name="title" 
                            value="{{ old('title', $lesson->title) }}" 
                            placeholder="Please input your lesson title..."
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        @error('title')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Unit Reference -->
                    <div class="mb-6">
                        <label for="unit-reference" class="block text-sm font-medium text-gray-700">Unit</label>
                        <select id="unit-reference" name="unit_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                            <option value="">-- Select Unit --</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}" 
                                    {{ $lesson->unit_id == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Update Button -->
                    <button type="submit" 
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Update Lesson
                    </button>

                    <!-- Garis Bawah -->
                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
