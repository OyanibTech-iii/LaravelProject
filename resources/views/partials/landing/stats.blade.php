{{-- Stats/Analytics Section --}}
<section id="stats" class="py-32 bg-zinc-950 text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 reveal">
            <h2 class="text-xl font-bold text-brick mb-4 uppercase tracking-[0.2em]">Our Growth</h2>
            <p class="text-4xl md:text-5xl font-extrabold tracking-tight">Brewing Excellence in Numbers</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Bar Chart: Monthly Sales --}}
            <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[3rem] reveal">
                <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-brick rounded-full"></span>
                    Monthly Brews Served
                </h3>
                <div class="h-[300px] w-full">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            {{-- Point Style Chart: Customer Retention --}}
            <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[3rem] reveal reveal-delay-1">
                <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-brick rounded-full"></span>
                    Community Satisfaction
                </h3>
                <div class="h-[300px] w-full">
                    <canvas id="pointChart"></canvas>
                </div>
            </div>

            {{-- Doughnut Chart: Bean Sourcing --}}
            <div class="bg-white/5 backdrop-blur-md border border-white/10 p-8 rounded-[3rem] reveal reveal-delay-2">
                <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 bg-brick rounded-full"></span>
                    Sourcing Diversity
                </h3>
                <div class="h-[300px] w-full">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
