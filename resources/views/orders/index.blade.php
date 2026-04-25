<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-navy leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table id="orders-table" class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Order ID</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Staff</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-4 text-right text-[10px] font-bold text-gray-400 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            if ($.fn.DataTable.isDataTable('#orders-table')) {
                $('#orders-table').DataTable().destroy();
            }

            $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('orders.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer_name', name: 'customer.last_name' },
                    { data: 'staff_name', name: 'user.name' },
                    { data: 'total_formatted', name: 'total_amount' },
                    { data: 'status_badge', name: 'status' },
                    { data: 'date_formatted', name: 'order_date' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-right' }
                ],
                order: [[0, 'desc']],
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search orders...",
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
