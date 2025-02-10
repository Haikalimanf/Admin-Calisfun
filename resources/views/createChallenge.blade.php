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
                        <label for="challenge-question" class="block text-sm font-medium text-gray-700">Challenge Question</label>
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
                    
                    <!-- Image Upload Section -->
                    <div id="image-upload-section" class="mb-4" style="display: {{ $challenge->type == 'HINT' ? 'block' : 'none' }};">
                        <label for="image_src" class="block text-sm font-medium text-gray-700">Image Source</label>
                        <input type="file" id="image_src" name="image_src" class="hidden" accept="image/jpeg, image/png, image/jpg, image/svg+xml" onchange="updateFileName()">
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
                        <!-- Tampilkan gambar lama jika ada -->
                        @if ($challenge->image_src)
                            <div class="mt-2">
                                <img src="{{ $challenge->image_src }}" alt="Current Image" class="w-32 h-32 object-cover">
                            </div>
                        @endif
                        @error('image_src') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>


                    <script>
                        // Mengupdate nama file ketika file gambar dipilih
                        function updateFileName() {
                            const fileInput = document.getElementById('image_src');
                            const fileName = fileInput.files[0] ? fileInput.files[0].name : "No file chosen";
                            const fileExtension = fileInput.files[0] ? fileInput.files[0].name.split('.').pop() : "";
                            const formattedFileName = fileName + " (" + fileExtension.toUpperCase() + ")";
                            document.getElementById('file-name').textContent = formattedFileName;
                        }

                        // Menangani perubahan tipe Challenge
                        document.getElementById('challenge-type').addEventListener('change', function() {
                            var type = this.value;
                            var imageUploadSection = document.getElementById('image-upload-section');
                            var imageInput = document.getElementById('image_src');

                            if (type === 'SELECT') {
                                imageUploadSection.style.display = 'none';  // Sembunyikan bagian gambar
                                imageInput.removeAttribute('required');  // Hapus atribut required
                            } else {
                                imageUploadSection.style.display = 'block';  // Tampilkan bagian gambar
                                imageInput.setAttribute('required', 'required');  // Tambahkan atribut required
                            }
                        });

                        // Memastikan perubahan tipe terjadi saat halaman pertama kali dimuat
                        document.getElementById('challenge-type').dispatchEvent(new Event('change'));
                    </script>

                    <!-- Create Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Create New Challenge
                    </button>

                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
