<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <h2 class="font-bold text-lg text-navy leading-tight">
                {{ __('DBMS Lab: Advanced Relational Concepts') }}
            </h2>
            <div class="flex bg-gray-100 p-1 rounded-xl w-fit">
                <a href="{{ route('query-lab', ['tab' => 'queries']) }}" 
                   @click.prevent="loadPage($el.href)"
                   class="px-4 py-2 rounded-lg text-xs font-bold transition-all {{ $activeTab === 'queries' ? 'bg-white text-brick shadow-sm' : 'text-gray-500 hover:text-navy' }}">
                    Queries & Algebra
                </a>
                <a href="{{ route('query-lab', ['tab' => 'normalization']) }}" 
                   @click.prevent="loadPage($el.href)"
                   class="px-4 py-2 rounded-lg text-xs font-bold transition-all {{ $activeTab === 'normalization' ? 'bg-white text-brick shadow-sm' : 'text-gray-500 hover:text-navy' }}">
                    Normalization Lab
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12" x-data="{ 
        tab: '{{ $activeTab }}',
        normStep: '3NF',
        normalization: {{ json_encode($normalizationData) }},
        scenarios: {{ json_encode($scenarios) }},
        activeIndex: {{ $activeIndex }}
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Queries Tab -->
            <div x-show="tab === 'queries'" class="space-y-8 animate-fadeIn">
                <template x-if="scenarios[activeIndex]">
                    <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-8 md:p-12">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="w-10 h-10 bg-brick text-white rounded-xl flex items-center justify-center font-bold text-lg shadow-lg shadow-brick/20" x-text="activeIndex + 1"></span>
                                <h3 class="text-xl font-black text-navy" x-text="scenarios[activeIndex].title"></h3>
                            </div>
                            
                            <p class="text-sm text-gray-600 mb-10 leading-relaxed" x-text="scenarios[activeIndex].description"></p>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                                <div class="space-y-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-1 h-3 bg-brick rounded-full"></div>
                                        <h4 class="font-bold text-navy uppercase tracking-widest text-[10px]">SQL Query</h4>
                                    </div>
                                    <div class="bg-navy rounded-2xl p-6 overflow-x-auto shadow-inner border border-white/5">
                                        <code class="text-blue-300 font-mono text-xs leading-6" x-text="scenarios[activeIndex].sql"></code>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-1 h-3 bg-brick rounded-full"></div>
                                        <h4 class="font-bold text-navy uppercase tracking-widest text-[10px]">Relational Algebra</h4>
                                    </div>
                                    <div class="bg-cream border border-brick/10 rounded-2xl p-6 overflow-x-auto shadow-inner">
                                        <code class="text-navy font-mono text-xs font-bold leading-6" x-text="scenarios[activeIndex].algebra"></code>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-1 h-3 bg-brick rounded-full"></div>
                                    <h4 class="font-bold text-navy uppercase tracking-widest text-[10px]">Execution Results</h4>
                                </div>
                                <div class="bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-100/50">
                                                <tr>
                                                    <template x-for="(value, key) in (scenarios[activeIndex].results[0] || {Status: ''})">
                                                        <th class="px-6 py-4 text-left text-[10px] font-bold text-navy uppercase tracking-wider" x-text="key"></th>
                                                    </template>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-100">
                                                <template x-for="row in scenarios[activeIndex].results">
                                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                                        <template x-for="value in row">
                                                            <td class="px-6 py-3 whitespace-nowrap text-xs text-gray-600 font-medium" x-text="value"></td>
                                                        </template>
                                                    </tr>
                                                </template>
                                                <template x-if="scenarios[activeIndex].results.length === 0">
                                                    <tr>
                                                        <td class="px-6 py-12 text-center text-xs text-gray-400 italic">No records found.</td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </template>
            </div>

            <!-- Normalization Tab -->
            <div x-show="tab === 'normalization'" class="space-y-8 animate-fadeIn">
                <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-8 md:p-12">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                            <div>
                                <h3 class="text-2xl font-black text-navy mb-1" x-text="normalization[normStep].title"></h3>
                                <p class="text-brick font-bold text-xs" x-text="'Rule: ' + normalization[normStep].rule"></p>
                            </div>
                            <div class="flex gap-2 p-1 bg-gray-100 rounded-xl w-fit h-fit">
                                <template x-for="step in ['1NF', '2NF', '3NF']">
                                    <button @click="normStep = step" 
                                            class="px-5 py-2.5 rounded-lg font-black transition-all text-xs"
                                            :class="normStep === step ? 'bg-brick text-white shadow-lg shadow-brick/20 scale-105' : 'text-gray-400 hover:text-navy hover:bg-white/50'"
                                            x-text="step">
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                            <div class="lg:col-span-1 space-y-6">
                                <div class="bg-cream rounded-2xl p-6 border border-brick/10">
                                    <h4 class="text-sm font-bold text-navy mb-3 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brick" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Normalization Logic
                                    </h4>
                                    <p class="text-xs text-gray-600 leading-relaxed" x-text="normalization[normStep].description"></p>
                                </div>

                                <div class="bg-navy rounded-2xl p-6 text-white shadow-xl">
                                    <h4 class="text-[10px] font-bold mb-4 opacity-80 uppercase tracking-widest">Schema Stats</h4>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center border-b border-white/10 pb-2">
                                            <span class="text-xs opacity-60">Total Tables</span>
                                            <span class="font-bold text-brick text-xs" x-text="normalization[normStep].tables.length"></span>
                                        </div>
                                        <div class="flex justify-between items-center border-b border-white/10 pb-2">
                                            <span class="text-xs opacity-60">Redundancy</span>
                                            <span class="font-bold text-xs" :class="normStep === '3NF' ? 'text-green-400' : 'text-yellow-400'" x-text="normStep === '3NF' ? 'Minimal' : (normStep === '2NF' ? 'Reduced' : 'High')"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-2">
                                <div class="flex items-center gap-2 mb-6">
                                    <div class="w-1 h-3 bg-brick rounded-full"></div>
                                    <h4 class="font-bold text-navy uppercase tracking-widest text-[10px]">Relational Schema Design</h4>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <template x-for="table in normalization[normStep].tables">
                                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-200 hover:border-brick/30 transition-all hover:shadow-sm group">
                                            <div class="flex items-center gap-3 mb-3">
                                                <div class="w-7 h-7 bg-navy rounded-lg flex items-center justify-center text-white group-hover:bg-brick transition-colors">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <h5 class="font-black text-navy text-sm" x-text="table.name"></h5>
                                            </div>
                                            <div class="bg-white rounded-lg p-3 border border-gray-100 shadow-inner">
                                                <p class="text-[10px] font-mono text-gray-500 leading-relaxed break-words" x-text="table.columns"></p>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</x-app-layout>
