<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-navy leading-tight">
            {{ __('Active Sessions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table id="sessions-table" class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">IP Address</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">Last Activity</th>
                                    <th class="px-6 py-4 text-left text-[10px] font-bold text-gray-400 uppercase tracking-wider">User Agent</th>
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
            if ($.fn.DataTable.isDataTable('#sessions-table')) {
                $('#sessions-table').DataTable().destroy();
            }

            $('#sessions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('sessions.index') }}",
                columns: [
                    { data: 'user', name: 'users.name' },
                    { data: 'ip_address', name: 'ip_address' },
                    { data: 'last_activity_formatted', name: 'last_activity' },
                    { data: 'user_agent', name: 'user_agent' }
                ],
                order: [[2, 'desc']],
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search sessions...",
                    lengthMenu: "Show _MENU_",
                }
            });
        });
    </script>
</x-app-layout>
