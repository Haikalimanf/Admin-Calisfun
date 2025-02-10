<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Edit Challenge Option</h1>
                <p class="text-gray-500 mb-6">Edit the challenge option details</p>

                <form action="{{ route('challenge-options.update', $challengeOption->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Challenge Text -->
                    <div class="mb-4">
                        <label for="text" class="block text-sm font-medium text-gray-700">Challenge Text</label>
                        <input type="text" id="text" name="text" value="{{ old('text', $challengeOption->text) }}" placeholder="Please input challenge option text..."
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        @error('text')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Correct Option -->
                    <div class="mb-4">
                        <label for="correct" class="block text-sm font-medium text-gray-700">Is Correct?</label>
                        <select id="correct" name="correct"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                            <option value="1" {{ $challengeOption->correct == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $challengeOption->correct == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <!-- Challenge Reference -->
                    <div class="mb-4">
                        <label for="challenge_id" class="block text-sm font-medium text-gray-700">Challenge Reference</label>
                        <input type="number" id="challenge_id" name="challenge_id" value="{{ old('challenge_id', $challengeOption->challenge_id) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        @error('challenge_id')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload -->
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

                    <!-- Sound Upload -->
                    <div class="mb-6">
                        <label for="sound" class="block text-sm font-medium text-gray-700">Sound Src</label>
                        <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                            <!-- Icon for Audio -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-audio-lines mr-2">
                                <path d="M2 10v3"/>
                                <path d="M6 6v11"/>
                                <path d="M10 3v18"/>
                                <path d="M14 8v7"/>
                                <path d="M18 5v13"/>
                                <path d="M22 10v3"/>
                            </svg>
                            <span class="text-gray-600" id="audio_name">Choose a sound</span>
                            <input id="audio_src" name="audio_src" type="file" class="sr-only" onchange="updateFileName('audio_src', 'audio_name')">
                        </label>
                    </div>

                    <!-- Update Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Update Challenge Option
                    </button>
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
