<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-extrabold text-2xl text-navy leading-tight">
                {{ __('Analytics Dashboard') }}
            </h2>
            <div class="flex items-center gap-2 text-sm text-gray-500 font-medium">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                Live System Data
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Total Revenue</p>
                    <p class="text-3xl font-black text-navy">₱{{ number_format($stats['total_sales'], 0) }}</p>
                    <div class="mt-4 flex items-center gap-2 text-xs font-bold text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        12% from last month
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Total Orders</p>
                    <p class="text-3xl font-black text-navy">{{ number_format($stats['total_orders']) }}</p>
                    <div class="mt-4 flex items-center gap-2 text-xs font-bold text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        8% from last month
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Unique Customers</p>
                    <p class="text-3xl font-black text-navy">{{ number_format($stats['total_customers']) }}</p>
                    <div class="mt-4 flex items-center gap-2 text-xs font-bold text-brick">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                        2% from last month
                    </div>
                </div>
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Active Menu</p>
                    <p class="text-3xl font-black text-navy">{{ $stats['total_products'] }}</p>
                    <div class="mt-4 flex items-center gap-2 text-xs font-bold text-gray-400">
                        Steady availability
                    </div>
                </div>
            </div>

            <!-- Dashboard Analytics -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold text-navy flex items-center gap-3">
                    Sales Performance
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100 h-[450px] flex flex-col">
                        <h4 class="font-bold text-gray-500 mb-8 uppercase tracking-wider text-sm">7-Day Revenue Trend</h4>
                        <div class="flex-1 min-h-0 relative">
                            <canvas id="salesTrendChart"></canvas>
                        </div>
                    </div>
                    <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100 h-[450px] flex flex-col">
                        <h4 class="font-bold text-gray-500 mb-8 uppercase tracking-wider text-sm">Revenue by Category</h4>
                        <div class="flex-1 min-h-0 relative flex justify-center">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Growth Metrics (The ones from landing page) -->
            <div class="space-y-6">
                <h3 class="text-xl font-bold text-navy flex items-center gap-3">
                    Growth Performance
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    {{-- Bar Chart --}}
                    <div class="bg-navy p-10 rounded-[3rem] shadow-xl text-white h-[400px] flex flex-col">
                        <h4 class="font-bold text-white/50 mb-6 uppercase tracking-wider text-xs">Monthly Growth</h4>
                        <div class="flex-1 min-h-0 relative">
                            <canvas id="growthBarChart"></canvas>
                        </div>
                    </div>

                    {{-- Point Chart --}}
                    <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100 h-[400px] flex flex-col">
                        <h4 class="font-bold text-gray-400 mb-6 uppercase tracking-wider text-xs">Retention Rate</h4>
                        <div class="flex-1 min-h-0 relative">
                            <canvas id="retentionPointChart"></canvas>
                        </div>
                    </div>

                    {{-- Doughnut Chart --}}
                    <div class="bg-white p-10 rounded-[3rem] shadow-sm border border-gray-100 h-[400px] flex flex-col">
                        <h4 class="font-bold text-gray-400 mb-6 uppercase tracking-wider text-xs">Sourcing Diversity</h4>
                        <div class="flex-1 min-h-0 relative flex justify-center">
                            <canvas id="sourcingDoughnutChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            const brickColor = '#B85C38';
            const navyColor = '#1A2B48';
            
            const delayedAnimation = {
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default') {
                        delay = context.dataIndex * 150 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            };

            // 1. Sales Trend
            const salesCanvas = document.getElementById('salesTrendChart');
            if (salesCanvas) {
                new Chart(salesCanvas, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($salesData->pluck('date')) !!},
                        datasets: [{
                            data: {!! json_encode($salesData->pluck('total')) !!},
                            borderColor: brickColor,
                            backgroundColor: 'rgba(184, 92, 56, 0.1)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 4,
                            pointRadius: 6,
                            pointBackgroundColor: '#fff',
                            pointBorderColor: brickColor,
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        animation: delayedAnimation,
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { beginAtZero: true, grid: { color: '#f3f4f6' } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }

            // 2. Category Chart
            const catCanvas = document.getElementById('categoryChart');
            if (catCanvas) {
                new Chart(catCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($categoryData->pluck('name')) !!},
                        datasets: [{
                            data: {!! json_encode($categoryData->pluck('total')) !!},
                            backgroundColor: [navyColor, brickColor, '#8B4513', '#A68A64'],
                            borderWidth: 0,
                            hoverOffset: 15
                        }]
                    },
                    options: {
                        animation: { animateRotate: true, duration: 2000 },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '75%',
                        plugins: {
                            legend: { position: 'bottom', labels: { usePointStyle: true, padding: 25 } }
                        }
                    }
                });
            }

            // 3. Growth Bar Chart
            const growthCanvas = document.getElementById('growthBarChart');
            if (growthCanvas) {
                new Chart(growthCanvas, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            data: [1200, 1900, 1500, 2100, 2400, 2800],
                            backgroundColor: brickColor,
                            borderRadius: 12
                        }]
                    },
                    options: {
                        animation: delayedAnimation,
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: 'rgba(255,255,255,0.5)' } },
                            x: { grid: { display: false }, ticks: { color: 'rgba(255,255,255,0.5)' } }
                        }
                    }
                });
            }

            // 4. Retention Point Chart
            const retentionCanvas = document.getElementById('retentionPointChart');
            if (retentionCanvas) {
                new Chart(retentionCanvas, {
                    type: 'line',
                    data: {
                        labels: ['21', '22', '23', '24', '25', '26'],
                        datasets: [{
                            data: [65, 72, 78, 85, 88, 94],
                            borderColor: navyColor,
                            backgroundColor: 'rgba(26, 43, 72, 0.05)',
                            fill: true,
                            pointStyle: 'rectRot',
                            pointRadius: 8,
                            pointBackgroundColor: brickColor,
                            tension: 0.4
                        }]
                    },
                    options: {
                        animation: delayedAnimation,
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { grid: { color: '#f3f4f6' } },
                            x: { grid: { display: false } }
                        }
                    }
                });
            }

            // 5. Sourcing Doughnut
            const sourcingCanvas = document.getElementById('sourcingDoughnutChart');
            if (sourcingCanvas) {
                new Chart(sourcingCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: ['Africa', 'S. America', 'Asia'],
                        datasets: [{
                            data: [35, 45, 20],
                            backgroundColor: [brickColor, navyColor, '#A68A64'],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        animation: { animateScale: true, duration: 2000 },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
                        }
                    }
                });
            }
        })();
    </script>
</x-app-layout>
