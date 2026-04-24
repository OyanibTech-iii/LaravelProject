<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-navy leading-tight">
                {{ __('Customer Directory') }}
            </h2>
            <a href="{{ route('customers.create') }}" 
               @click.prevent="loadPage($el.href)"
               class="bg-brick text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-coffee-700 transition-colors shadow-lg shadow-brick/20">
                New Customer
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative text-sm" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table id="customers-table" class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Contact</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Loyalty Points</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Joined Date</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <!-- DataTables will populate this -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#customers-table')) {
                $('#customers-table').DataTable().destroy();
            }

            $('#customers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('customers.index') }}",
                columns: [
                    { data: 'customer', name: 'first_name' },
                    { data: 'contact', name: 'email' },
                    { data: 'loyalty_points', name: 'points' },
                    { data: 'joined_date', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-right' }
                ],
                order: [[3, 'desc']], // Order by Joined Date by default
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search customers...",
                    lengthMenu: "Show _MENU_",
                },
                drawCallback: function() {
                    // Re-bind forms for the AJAX loader after DataTable draws
                    if (typeof Alpine !== 'undefined' && Alpine.$data(document.body)) {
                        Alpine.$data(document.body).bindForms();
                    }
                }
            });
        });
    </script>
</x-app-layout>
