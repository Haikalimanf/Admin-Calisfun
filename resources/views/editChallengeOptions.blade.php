<x-app-layout>
        <div class="flex items-center justify-center py-14 bg-gray-100">
            <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
                <div class="container mx-auto p-2">
                    <h1 class="text-2xl font-bold mb-1">Edit Lesson Create</h1>
                    <p class="text-gray-500 mb-6">Edit Lesson Unit on Calisfun</p>

                    <form action="" method="POST">
                        @csrf

                        <!-- Unit Title -->
                        <div class="mb-4">
                            <label for="unit-title" class="block text-sm font-medium text-gray-700">Lesson Title</label>
                            <input type="text" id="unit-title" name="title" placeholder="Please input your Unit Title..."
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        </div>

                        <!-- Lesson Reference To Lesson -->
                        <div class="mb-6">
                            <label for="unit-reference" class="block text-sm font-medium text-gray-700">Challenge Reference To Lesson</label>
                            <select id="unit-reference" name="reference"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                                <option value="unit 1">unit 1</option>
                                <option value="unit 2">unit 2</option>
                                <option value="unit 3">unit 3</option>
                            </select>
                        </div>

                        <!-- Upload Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image Src</label>
                            <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                                <!-- Icon -->
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4-4m0 0l4 4m-4-4V4m12 8h-4m0 0h-4m4 0v4"></path>
                                </svg>
                                <!-- Text -->
                                <span class="ml-3 text-gray-600 text-sm">Upload Image</span>
                                <input id="image" name="image" type="file" class="hidden">
                            </label>
                        </div>

                        <!-- Upload Sound -->
                        <div class="mb-6">
                            <label for="sound" class="block text-sm font-medium text-gray-700">Sound Src</label>
                            <label class="flex items-center w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-pointer hover:border-gray-400 transition">
                                <!-- Icon -->
                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V5l12 7-12 7z"></path>
                                </svg>
                                <!-- Text -->
                                <span class="ml-3 text-gray-600 text-sm">Upload Sound</span>
                                <input id="sound" name="sound" type="file" class="hidden">
                            </label>
                        </div>

                        <!-- Create Button -->
                        <button type="submit" 
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            Update Challenge Option
                        </button>

                        <!-- Garis Bawah -->
                        <hr class="mt-6 border-gray-300">
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
