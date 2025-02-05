<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto bg-white">
                    <h1 class="text-3xl font-bold mb-3">Course Admin Page</h1>
                    <p class="mb-4 text-gray-600">Manage Course on Calisfun</p>

                    <!-- Display Success Message -->
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Search input -->
                    <div class="relative m-[2px] mb-3 mr-5 float-left">
                        <label for="inputSearch" class="sr-only">Search </label>
                        <form action="{{ route('courses.search') }}" method="GET">
                            <input 
                                id="inputSearch" 
                                name="search"
                                type="text" 
                                value="{{ request('search') }}" 
                                placeholder="Search..." 
                                class="block w-64 rounded-lg border py-2 pl-10 pr-4 text-sm focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-400" 
                            />
                            <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 transform text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </button>
                        </form>
                    </div>



                <!-- Table -->
                <table class="min-w-full text-left text-sm whitespace-nowrap">
                    <!-- Table head -->
                    <thead class="uppercase tracking-wider border-b-2 bg-neutral-50">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                No
                                <a href="" class="inline">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512"
                                        class="w-[0.75rem] h-[0.75rem] inline ml-1 text-neutral-500 mb-[1px]"
                                        fill="currentColor">
                                        <path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Course Name
                                <a href="" class="inline">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512"
                                        class="w-[0.75rem] h-[0.75rem] inline ml-1 text-neutral-500 mb-[1px]"
                                        fill="currentColor">
                                        <path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Image Source
                                <a href="" class="inline">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512"
                                        class="w-[0.75rem] h-[0.75rem] inline ml-1 text-neutral-500 mb-[1px]"
                                        fill="currentColor">
                                        <path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Action
                                <a href="" class="inline">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512"
                                        class="w-[0.75rem] h-[0.75rem] inline ml-1 text-neutral-500 mb-[1px]"
                                        fill="currentColor">
                                        <path d="M137.4 41.4c12.5-12.5 32.8-12.5 45.3 0l128 128c9.2 9.2 11.9 22.9 6.9 34.9s-16.6 19.8-29.6 19.8H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9l128-128zm0 429.3l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128c-12.5 12.5-32.8 12.5-45.3 0z" />
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    </thead>

                    <!-- table body -->
                    <tbody>
                    @foreach($courses as $course)
                        <tr class="border-b hover:bg-neutral-100">
                            <th scope="row" class="px-6 py-4">{{ $course->id }}</th>
                            <td class="px-6 py-4">{{ $course->title }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ $course->image_src}}" alt="Image" class="w-10 h-10 object-cover rounded-full">
                            </td>
                            <td class="border-b px-4 py-4">
                                <div class="relative">
                                    <!-- Button untuk membuka dropdown -->
                                    <button
                                        class="text-gray-700 hover:text-gray-900 text-base flex items-center space-x-2 bg-gray-100 px-3 py-2 rounded-md focus:outline-none"
                                        onclick="toggleDropdown(event)"
                                    >
                                        <span>Aksi</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9l-7.5 7.5L4.5 9" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown menu -->
                                    <div
                                        class="absolute right-0 top-[-9px] mt-2 w-32 bg-white border rounded-md shadow-lg hidden"
                                        id="dropdownMenu"
                                    >
                                        <a
                                            href="{{ route('courses.edit', $course->id) }}"
                                            class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center space-x-2"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-4.536a2.25 2.25 0 113.182 3.182L7.5 21H3v-4.5L16.732 3.732z" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-100 flex items-center space-x-2"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
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

                <nav class="mt-10 flex items-center justify-between text-sm" aria-label="Page navigation example">
                    <p>
                        Showing <strong class="font-bold text-blue-600">1-5</strong> of <strong class="font-bold text-blue-600">10</strong>
                    </p>

                    <ul class="list-style-none flex">
                        <li>
                            <a class="relative block rounded px-3 py-1.5 text-sm text-white transition-all duration-300 hover:bg-blue-800 bg-blue-600 " href="#!">Previous</a>
                        </li>
                        <li>
                            <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100" href="#!">1</a>
                        </li>
                        <li aria-current="page">
                            <a class="relative block rounded bg-blue-100 px-3 py-1.5 text-sm font-medium text-blue-700 transition-all duration-300" href="#!">
                                2
                                <span class="absolute -m-px h-px w-px overflow-hidden whitespace-nowrap border-0 p-0 [clip:rect(0,0,0,0)]">(current)</span>
                            </a>
                        </li>
                        <li>
                            <a class="relative block rounded bg-transparent px-3 py-1.5 text-sm text-neutral-600 transition-all duration-300 hover:bg-neutral-100" href="#!">3</a>
                        </li>
                        <li>
                            <a class="relative block rounded px-3 py-1.5 text-sm text-white transition-all duration-300 hover:bg-blue-800 bg-blue-600 " href="#!">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Create Button -->
        <div class="mt-8 text-left">
            <a href="{{ route('courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create New Course</a>
        </div>
        </div>
    </div>
</x-app-layout>
