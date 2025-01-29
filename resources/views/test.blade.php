<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload New Image') }}
        </h2>
    </x-slot>

    <div class="container mx-auto my-4">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3">
                <div class="bg-white shadow-md rounded">
                    <div class="px-4 py-2 border-b border-gray-200">
                        <h2 class="text-lg font-semibold">Upload Image</h2>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('cloudinary.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">
                                    Select Image
                                </label>
                                <input type="file" name="image" id="image" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('image')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Upload
                                </button>
                                <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>