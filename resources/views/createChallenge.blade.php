<x-app-layout>
        <div class="flex items-center justify-center py-14 bg-gray-100">
            <div class="bg-white shadow-md rounded-lg px-10 py-8 w-9/12">
                <div class="container mx-auto p-2">
                    <h1 class="text-2xl font-bold mb-1">Challenge Create</h1>
                    <p class="text-gray-500 mb-6">Create Challenge</p>

                    <form action="" method="POST">
                        @csrf

                        <!-- Unit Title -->
                        <div class="mb-4">
                            <label for="unit-title" class="block text-sm font-medium text-gray-700">Challenge Question</label>
                            <input type="text" id="unit-title" name="title" placeholder="Please input your Question..."
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                        </div>

                        <!-- Challenge Type -->
                        <div class="mb-6">
                            <label for="challenge-type" class="block text-sm font-medium text-gray-700">Type</label>
                            <select id="challenge-type" name="reference"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                                <option value="select">SELECT</option>
                                <option value="hint">HINT</option>
                            </select>
                        </div>

                        <!-- Unit Reference To Challenge -->
                        <div class="mb-6">
                            <label for="unit-reference" class="block text-sm font-medium text-gray-700">Challenge Reference To Lesson</label>
                            <select id="unit-reference" name="reference"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-300 px-3 py-2 text-sm">
                                <option value="Lesson 1">Lesson 1</option>
                                <option value="Lesson 2">Lesson 2</option>
                                <option value="Lesson 3">Lesson 3</option>
                            </select>
                        </div>

                        <!-- Create Button -->
                        <button type="submit" 
                            class="w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                            Create New Challenge
                        </button>

                        <!-- Garis Bawah -->
                        <hr class="mt-6 border-gray-300">
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
