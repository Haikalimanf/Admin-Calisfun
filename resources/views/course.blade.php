<x-app-layout>
    <!-- Main content -->
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Course Admin Page</h1>
        <p class="mb-4 text-gray-600">Manage Course on Calisfun</p>

        <!-- Display Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="table-auto w-full text-left border-collapse">
                <thead class="bg-[#FFD5D1]">
                    <tr>
                        <th class="border-b px-4 py-2">No</th>
                        <th class="border-b px-4 py-2">Course Name</th>
                        <th class="border-b px-4 py-2">Image Source</th>
                        <th class="border-b px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr class="bg-white">
                            <td class="border-b px-4 py-2">{{ $course->id }}</td>
                            <td class="border-b px-4 py-2">{{ $course->title }}</td>
                            <td class="border-b px-4 py-2">
                                <img src="{{ Storage::url($course->image_src) ?? asset('images/noimage.png') }}" alt="Image" class="w-10 h-10 object-cover rounded-full">
                            </td>
                            <td class="border-b px-4 py-2">
                                <div class="flex space-x-4">
                                    <!-- Edit Button -->
                                    <a href="{{ route('courses.edit', $course->id) }}" class="text-gray-700 hover:text-gray-900 text-base">Edit</a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-base">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-4">
                {{ $courses->links() }}
            </div>
        </div>

        <!-- Create Button -->
        <div class="mt-4 text-left">
            <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Course</a>
        </div>
    </div>
</x-app-layout>
