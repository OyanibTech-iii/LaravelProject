{{-- Stats/Analytics Section --}}
<section id="stats" class="py-32 bg-zinc-950 text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 reveal">
            <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em]">Our Growth</h2>
            <p class="text-4xl md:text-5xl font-extrabold tracking-tight">Brewing Excellence in Numbers</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Bar Chart: Monthly Sales --}}
            <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[3rem] reveal flex flex-col">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <span class="w-2 h-2 bg-brick rounded-full"></span>
                        Monthly Brews
                    </h3>
                    <span class="text-3xl font-black text-brick">{{ number_format($monthlyBrews->sum('count')) }}</span>
                </div>
                <div class="h-[300px] w-full flex-1">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            {{-- Point Style Chart: Customer Retention --}}
            <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[3rem] reveal reveal-delay-1 flex flex-col">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <span class="w-2 h-2 bg-brick rounded-full"></span>
                        Satisfaction
                    </h3>
                    <span class="text-3xl font-black text-brick">{{ $satisfactionRate }}%</span>
                </div>
                <div class="h-[300px] w-full flex-1">
                    <canvas id="pointChart"></canvas>
                </div>
            </div>

            {{-- Doughnut Chart: Bean Sourcing --}}
            <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[3rem] reveal reveal-delay-2 flex flex-col">
                <div class="flex justify-between items-start mb-6">
                    <h3 class="text-xl font-bold flex items-center gap-2">
                        <span class="w-2 h-2 bg-brick rounded-full"></span>
                        Diversity
                    </h3>
                    <span class="text-3xl font-black text-brick">{{ $categoryDistribution->count() }} Varieties</span>
                </div>
                <div class="h-[300px] w-full flex-1">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
