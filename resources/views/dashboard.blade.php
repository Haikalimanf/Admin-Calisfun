<x-app-layout> 

    <!-- Container utama dengan padding atas dan bawah -->
    <div class="max-w-7xl mx-auto py-12">

        <!-- Judul Halaman -->
        <h1 class="text-3xl font-bold text-gray-700 mb-7">Admin Dashboard</h1>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-3 gap-6 mb-10">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Courses</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalCourses }}</p>
            </div>
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Total Users</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
            </div>
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Challenges Created</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalChallenges }}</p>
            </div>
        </div>

        <!-- Grafik User Growth -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-semibold mb-4">User Growth</h2>
            <canvas id="userGrowthChart" class="w-full h-48"></canvas>
        </div>


    </div>


<!-- Scripts for Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('userGrowthChart').getContext('2d');
    var userGrowthChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Active Users"],
            datasets: [{
                label: 'Total Active Users',
                data: [{{ $totalActiveUsers }}],
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        }
    });
</script>

</x-app-layout>
