<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Challenge Create</h1>
                <p class="text-gray-500 mb-6">Create Challenge</p>

                <form action="{{ route('challenges.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Challenge Question -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Challenge Question</label>
                        <input type="text" id="challenge-question" name="question" placeholder="Please input your Question..."
                        value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm" required>
                        @error('question') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <!-- Challenge Type -->
                    <div class="mb-6">
                        <label for="challenge-type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select id="challenge-type" name="type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                            <option value="HINT">HINT</option>
                            <option value="SELECT">SELECT</option>
                        </select>
                    </div>

                    <!-- Challenge Reference To Lesson -->
                    <div class="mb-6">
                        <label for="lesson-reference" class="block text-sm font-medium text-gray-700">Challenge Reference To Lesson</label>
                        <select id="lesson-reference" name="lesson_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                            @foreach($lessons as $lesson)
                                <option value="{{ $lesson->id }}" {{ old('lesson_id', $challenge->lesson_id ?? '') == $lesson->id ? 'selected' : '' }}>
                                    {{ $lesson->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Image Upload (Initially Hidden) -->
                    <div class="mb-4" id="image-upload-section" style="display: none;">
                        <label for="image_src" class="block text-gray-700">Image Source</label>
                        <input type="file" id="image_src" name="image_src" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        @error('image_src') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>

                    <!-- Create Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Create New Challenge
                    </button>

                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('challenge-type').addEventListener('change', function() {
        var type = this.value;
        var imageUploadSection = document.getElementById('image-upload-section');
        var imageInput = document.getElementById('image_src');

        if (type === 'SELECT') {
            imageUploadSection.style.display = 'none';
            imageInput.removeAttribute('required'); // Hapus atribut required
        } else {
            imageUploadSection.style.display = 'block';
            imageInput.setAttribute('required', 'required'); // Tambahkan atribut required
        }
    });

    // Menjalankan event listener untuk memastikan tampilan sudah sesuai saat pertama kali load
    document.getElementById('challenge-type').dispatchEvent(new Event('change'));
    </script>
</x-app-layout>
