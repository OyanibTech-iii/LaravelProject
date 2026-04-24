<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-navy leading-tight">
            {{ __('Analytics Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Total Sales</p>
                    <p class="text-xl font-black text-navy">₱{{ number_format($stats['total_sales'], 0) }}</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Total Orders</p>
                    <p class="text-xl font-black text-navy">{{ $stats['total_orders'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Customers</p>
                    <p class="text-xl font-black text-navy">{{ $stats['total_customers'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Active Products</p>
                    <p class="text-xl font-black text-navy">{{ $stats['total_products'] }}</p>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Line Chart -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-navy mb-6">7-Day Sales Trend</h3>
                    <canvas id="salesTrendChart" height="200"></canvas>
                </div>

                <!-- Doughnut Chart -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-navy mb-6">Sales by Category</h3>
                    <div class="max-w-[300px] mx-auto">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            // Sales Trend Chart
            const salesCanvas = document.getElementById('salesTrendChart');
            if (salesCanvas) {
                const salesCtx = salesCanvas.getContext('2d');
                new Chart(salesCtx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($salesData->pluck('date')) !!},
                        datasets: [{
                            label: 'Daily Sales',
                            data: {!! json_encode($salesData->pluck('total')) !!},
                            borderColor: '#B85C38', // brick
                            backgroundColor: 'rgba(184, 92, 56, 0.1)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 4,
                            pointBackgroundColor: '#B85C38'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: { display: false }
                            },
                            x: {
                                grid: { display: false }
                            }
                        }
                    }
                });
            }

            // Category Distribution Chart
            const categoryCanvas = document.getElementById('categoryChart');
            if (categoryCanvas) {
                const categoryCtx = categoryCanvas.getContext('2d');
                new Chart(categoryCtx, {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($categoryData->pluck('name')) !!},
                        datasets: [{
                            data: {!! json_encode($categoryData->pluck('total')) !!},
                            backgroundColor: [
                                '#1A2B48', // navy
                                '#B85C38', // brick
                                '#8B4513', // coffee-600
                                '#C79A8B', // coffee-400
                            ],
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    usePointStyle: true
                                }
                            }
                        },
                        cutout: '70%'
                    }
                });
            }
        })();
    </script>
</x-app-layout>
