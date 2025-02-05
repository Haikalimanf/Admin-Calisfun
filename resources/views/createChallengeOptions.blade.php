<x-app-layout>
    <div class="flex items-center justify-center py-14 bg-gray-100">
        <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
            <div class="container mx-auto p-2">
                <h1 class="text-2xl font-bold mb-1">Challenge Option Create</h1>
                <p class="text-gray-500 mb-6">Challenge Option Unit</p>

                <form action="{{ route('challenge-options.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Unit Title -->
                    <div class="mb-4">
                        <label for="unit-title" class="block text-sm font-medium text-gray-700">Answer</label>
                        <input type="text" id="text" name="text" placeholder="Please input your answer"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                    </div>

                    <!-- Lesson Reference To Lesson -->
                    <div class="mb-6">
                        <label for="challenge-option" class="block text-sm font-medium text-gray-700">Select Challenge Option</label>
                        <select name="challenge_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm text-gray-900 bg-white">
                            @foreach ($challenges as $challenge)
                                <option value="{{ $challenge->id }}" class="text-black">{{ $challenge->question }}</option>
                            @endforeach
                        </select>
                    </div>


                    <!-- Radio Button True/False -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Is Correct</label>
                        <div class="mt-2 space-y-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="correct" value="1" class="form-radio h-4 w-4 text-blue-600">
                                <span class="ml-2 text-gray-700">True</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="correct" value="0" class="form-radio h-4 w-4 text-blue-600">
                                <span class="ml-2 text-gray-700">False</span>
                            </label>
                        </div>
                    </div>

                    <!-- Upload Image -->
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image Src</label>
                        <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                            <input id="image_src" name="image_src" type="file">
                        </label>
                    </div>

                    <!-- Upload Sound -->
                    <div class="mb-6">
                        <label for="sound" class="block text-sm font-medium text-gray-700">Sound Src</label>
                        <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                            <input id="audio_src" name="audio_src" type="file">
                        </label>
                    </div>

                    <!-- Create Button -->
                    <button type="submit" 
                        class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        Create New Challenge Option
                    </button>

                    <!-- Garis Bawah -->
                    <hr class="mt-6 border-gray-300">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>