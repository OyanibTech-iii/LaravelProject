<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBMS 2 | Query & Relational Algebra Lab</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    <nav class="bg-navy text-white py-6 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-tight">IcedCoffee DBMS Lab</h1>
            <a href="/" class="text-white/70 hover:text-white transition-colors">Back to Landing Page</a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <header class="mb-12">
            <h2 class="text-4xl font-extrabold text-navy mb-4">Relational Query Demonstration</h2>
            <p class="text-xl text-gray-600">Mapping SQL scenarios to Relational Algebra for the Final Project.</p>
        </header>

        <div class="space-y-16">
            @foreach($scenarios as $index => $scenario)
            <section class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="w-12 h-12 bg-brick text-white rounded-full flex items-center justify-center font-bold text-xl">{{ $index + 1 }}</span>
                        <h3 class="text-3xl font-bold text-navy">{{ $scenario['title'] }}</h3>
                    </div>
                    
                    <p class="text-lg text-gray-600 mb-8">{{ $scenario['description'] }}</p>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div class="space-y-4">
                            <h4 class="font-bold text-brick uppercase tracking-wider text-sm">SQL Query</h4>
                            <div class="bg-navy rounded-xl p-6 overflow-x-auto">
                                <code class="text-blue-300 font-mono">{{ $scenario['sql'] }}</code>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h4 class="font-bold text-brick uppercase tracking-wider text-sm">Relational Algebra</h4>
                            <div class="bg-cream border border-brick/20 rounded-xl p-6 overflow-x-auto">
                                <code class="text-navy font-mono text-lg font-bold">{{ $scenario['algebra'] }}</code>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="font-bold text-brick uppercase tracking-wider text-sm">Execution Results</h4>
                        <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        @if(count($scenario['results']) > 0)
                                            @foreach(get_object_vars($scenario['results'][0]) as $key => $value)
                                            <th class="px-6 py-4 text-left text-xs font-bold text-navy uppercase tracking-wider">{{ $key }}</th>
                                            @endforeach
                                        @else
                                            <th class="px-6 py-4 text-left text-xs font-bold text-navy uppercase tracking-wider">Status</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($scenario['results'] as $row)
                                    <tr>
                                        @foreach(get_object_vars($row) as $value)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $value }}</td>
                                        @endforeach
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 italic">No records found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} IcedCoffee DBMS Management System. All rights reserved.
        </div>
    </footer>
</body>
</html>
