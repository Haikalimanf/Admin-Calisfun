<x-app-layout> 

    <!-- Container utama dengan padding atas dan bawah -->
    <div class="max-w-7xl mx-auto py-12">

        <!-- Judul Halaman -->
        <h1 class="text-3xl font-bold text-gray-700 mb-7">Admin Dashboard</h1>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-3 gap-6 mb-10">
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
        </div>

        <!-- Grafik User Growth -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">User Growth</h2>
            <canvas id="userGrowthChart" class="w-full h-48"></canvas>
        </div>

        <!-- Recent Statistics -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">Recent Statistics</h2>
            <div class="space-y-4">
                <!-- New Courses Added -->
                <div class="flex justify-between">
                    <p class="text-gray-700">New Courses Added</p>
                    <p class="text-gray-600">8</p>
                </div>
                <!-- New Users Registered -->
                <div class="flex justify-between">
                    <p class="text-gray-700">New Users Registered</p>
                    <p class="text-gray-600">25</p>
                </div>
                <!-- Completed Challenges -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Challenges Completed</p>
                    <p class="text-gray-600">15</p>
                </div>
            </div>
        </div>

        <!-- Site Performance Summary -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">Site Performance</h2>
            <div class="space-y-4">
                <!-- Active Users -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Active Users (Today)</p>
                    <p class="text-gray-600">200</p>
                </div>
                <!-- Site Uptime -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Site Uptime</p>
                    <p class="text-gray-600">99.9%</p>
                </div>
                <!-- Issues Reported -->
                <div class="flex justify-between">
                    <p class="text-gray-700">Issues Reported</p>
                    <p class="text-gray-600">2</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // User Growth Chart
        var ctx = document.getElementById('userGrowthChart').getContext('2d');
        var userGrowthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'User Growth',
                    data: [50, 100, 150, 200, 250, 300, 350],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            }
        });
    </script>

</x-app-layout>
