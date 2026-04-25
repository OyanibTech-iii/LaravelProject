<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-xl text-navy leading-tight">
                {{ __('Product Management') }}
            </h2>
            <a href="{{ route('products.create') }}" 
               @click.prevent="loadPage($el.href)"
               class="bg-brick text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-coffee-700 transition-colors shadow-lg shadow-brick/20">
                Add Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table id="products-table" class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Product</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Stock</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Supplier</th>
                                    <th class="px-6 py-4 text-right text-[10px] font-bold text-gray-400 uppercase tracking-wider">Actions</th>
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
            if ($.fn.DataTable.isDataTable('#products-table')) {
                $('#products-table').DataTable().destroy();
            }

            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('products.index') }}",
                columns: [
                    { data: 'product', name: 'name' },
                    { data: 'category', name: 'category.name' },
                    { data: 'price_formatted', name: 'price' },
                    { data: 'stock', name: 'stock_quantity' },
                    { data: 'supplier_name', name: 'supplier.name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-right' }
                ],
                order: [[0, 'asc']],
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search products...",
                    lengthMenu: "Show _MENU_",
                },
                drawCallback: function() {
                    if (typeof Alpine !== 'undefined' && Alpine.$data(document.body)) {
                        Alpine.$data(document.body).bindForms();
                    }
                }
            });
        });
    </script>
</x-app-layout>
