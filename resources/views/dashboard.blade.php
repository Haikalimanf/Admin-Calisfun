<x-app-layout> 

    <!-- Container utama dengan padding atas dan bawah -->
    <div class="max-w-7xl mx-auto py-12">

        <!-- Judul Halaman -->
        <h1 class="text-3xl font-bold text-gray-700 mb-7">Admin Dashboard</h1>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-4 gap-6">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Courses</h2>
                <p class="text-3xl font-bold mt-2">120</p>
            </div>
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <p class="text-3xl font-bold mt-2">450</p>
            </div>
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Challenges Created</h2>
                <p class="text-3xl font-bold mt-2">80</p>
            </div>
            <div class="bg-purple-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Revenue</h2>
                <p class="text-3xl font-bold mt-2">$12,500</p>
            </div>
        </div>

        <!-- Grafik Placeholder -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">User Growth</h2>
            <div class="h-48 bg-gray-200 flex items-center justify-center rounded-lg">
                <span class="text-gray-500">[ Grafik Placeholder ]</span>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
            <ul class="space-y-3">
                <li class="flex items-center space-x-4">
                    <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                    <p class="text-gray-700"><strong>Admin</strong> added a new course <span class="text-blue-500">"Web Development 101"</span></p>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </li>
                <li class="flex items-center space-x-4">
                    <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                    <p class="text-gray-700"><strong>Jane Doe</strong> registered as a new user</p>
                    <span class="text-sm text-gray-500">5 hours ago</span>
                </li>
                <li class="flex items-center space-x-4">
                    <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                    <p class="text-gray-700"><strong>John Smith</strong> completed the challenge <span class="text-red-500">"JS Quiz"</span></p>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </li>
            </ul>
        </div>

        <!-- Task Summary -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">Task Summary</h2>
            <div class="space-y-4">
                <div>
                    <p class="text-gray-700">Update Course Materials</p>
                    <div class="w-full bg-gray-200 h-3 rounded-full mt-2">
                        <div class="bg-blue-500 h-3 rounded-full" style="width: 60%"></div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700">Review New User Registrations</p>
                    <div class="w-full bg-gray-200 h-3 rounded-full mt-2">
                        <div class="bg-green-500 h-3 rounded-full" style="width: 40%"></div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-700">Create New Challenges</p>
                    <div class="w-full bg-gray-200 h-3 rounded-full mt-2">
                        <div class="bg-red-500 h-3 rounded-full" style="width: 80%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>