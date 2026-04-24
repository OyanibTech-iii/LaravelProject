<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-navy leading-tight">
            {{ __('DBMS Lab: Relational Query Demonstration') }}
        </h2>
    </x-slot>

    <div class="py-12" x-init="
        Alpine.store('lab', {
            activeIndex: {{ $activeIndex }},
            scenarios: {{ json_encode($scenarios) }},
            get activeScenario() {
                return this.scenarios[this.activeIndex];
            }
        })
    ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <template x-if="$store.lab.activeScenario">
                <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden animate-fadeIn">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="w-12 h-12 bg-brick text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-brick/20" x-text="$store.lab.activeIndex + 1"></span>
                            <h3 class="text-2xl font-black text-navy" x-text="$store.lab.activeScenario.title"></h3>
                        </div>
                        
                        <p class="text-base text-gray-600 mb-10 leading-relaxed" x-text="$store.lab.activeScenario.description"></p>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                            <div class="space-y-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-1 h-4 bg-brick rounded-full"></div>
                                    <h4 class="font-bold text-navy uppercase tracking-widest text-xs">SQL Query</h4>
                                </div>
                                <div class="bg-navy rounded-2xl p-6 overflow-x-auto shadow-inner">
                                    <code class="text-blue-300 font-mono text-sm leading-6" x-text="$store.lab.activeScenario.sql"></code>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-1 h-4 bg-brick rounded-full"></div>
                                    <h4 class="font-bold text-navy uppercase tracking-widest text-xs">Relational Algebra</h4>
                                </div>
                                <div class="bg-cream border border-brick/10 rounded-2xl p-6 overflow-x-auto shadow-inner">
                                    <code class="text-navy font-mono text-sm font-bold leading-6" x-text="$store.lab.activeScenario.algebra"></code>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center gap-2">
                                <div class="w-1 h-4 bg-brick rounded-full"></div>
                                <h4 class="font-bold text-navy uppercase tracking-widest text-xs">Execution Results</h4>
                            </div>
                            <div class="bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-100/50">
                                            <tr>
                                                <template x-for="(value, key) in ($store.lab.activeScenario.results[0] || {Status: ''})">
                                                    <th class="px-6 py-4 text-left text-xs font-bold text-navy uppercase tracking-wider" x-text="key"></th>
                                                </template>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                            <template x-for="row in $store.lab.activeScenario.results">
                                                <tr class="hover:bg-gray-50/50 transition-colors">
                                                    <template x-for="value in row">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-medium" x-text="value"></td>
                                                    </template>
                                                </tr>
                                            </template>
                                            <template x-if="$store.lab.activeScenario.results.length === 0">
                                                <tr>
                                                    <td class="px-6 py-12 text-center text-sm text-gray-400 italic">No records found.</td>
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
