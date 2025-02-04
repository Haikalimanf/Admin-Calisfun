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
                    <div class="mb-6">
                        <label for="img_src" class="block text-sm font-medium text-gray-700">Image Src</label>
                        <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4-4m0 0l4 4m-4-4V4m12 8h-4m0 0h-4m4 0v4"></path>
                            </svg>
                            <span class="ml-3 text-gray-600 text-sm">Upload New Image</span>
                            <input id="img_src" name="img_src" type="file" class="hidden">
                        </label>
                        @if ($challengeOption->img_src)
                            <p class="mt-2 text-sm text-gray-500">Current Image: {{ $challengeOption->img_src }}</p>
                        @endif
                    </div>

                    <!-- Sound Upload -->
                    <div class="mb-6">
                        <label for="sound_src" class="block text-sm font-medium text-gray-700">Sound Src</label>
                        <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V5l12 7-12 7z"></path>
                            </svg>
                            <span class="ml-3 text-gray-600 text-sm">Upload New Sound</span>
                            <input id="sound_src" name="sound_src" type="file" class="hidden">
                        </label>
                        @if ($challengeOption->sound_src)
                            <p class="mt-2 text-sm text-gray-500">Current Sound: {{ $challengeOption->sound_src }}</p>
                        @endif
                    </div>

                    <!-- Update Button -->
                    <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Update Challenge Option
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
