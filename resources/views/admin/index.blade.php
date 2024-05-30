<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="flex flex-col gap-6 w-full max-w-6xl mx-auto px-4 md:px-6 py-8">
                    <div class="flex items-center justify-between">
                        <h1 class="text-4xl font-extrabold text-gray-800">JOki Thirty</h1>
                        <a href="{{ route('admin.create') }}"
                            class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-9 rounded-md px-3 bg-black text-white hover:bg-black"
                            aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:R9lafnnja:"
                            data-state="closed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-4 h-4 mr-2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            Add Task
                        </a>
                    </div>
                    <!--search-->
                    <div class="">
                        <input name="keyword" id="searchInput"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 pl-10 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Search Jokian" required="" type="search">
                    </div>
                    <div class="border rounded-lg overflow-hidden">
                        <div class="relative w-full overflow-auto">
                            <table class="w-full caption-bottom text-sm">
                                <thead class="border-b bg-gray-100">
                                    <tr class="border-b">
                                        <th class="h-12 px-4 text-left align-middle font-semibold text-gray-800">Title</th>
                                        <th class="h-10 px-4 text-left align-middle font-semibold text-gray-800">Description</th>
                                        <th class="h-12 px-4 text-left align-middle font-semibold text-gray-800">Due Date</th>
                                        <th class="h-12 px-4 text-left align-middle font-semibold text-gray-800">Status</th>
                                        <th class="h-12 px-4 align-middle font-semibold text-gray-800 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200" id="taskTable">
                                    @foreach ($admin as $item)
                                        <tr class="task-row hover:bg-gray-50">
                                            <td class="p-4 font-semibold text-gray-900 task-title">{{ $item->title }}</td>
                                            <td class="p-4 text-gray-500 task-description line-clamp-1 md:truncate w-64">
                                                {{ $item->description }}</td>
                                            <td class="p-4 text-gray-700">
                                                {{ \Carbon\Carbon::parse($item->due_date)->format('d/m/Y') }}</td>
                                            <td class="p-4">
                                                <div
                                                    class="task-status inline-flex w-fit items-center whitespace-nowrap rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                                    {{ $item->status === 'Progress' ? 'bg-yellow-300 text-yellow-800' : ($item->status === 'Completed' ? 'bg-green-500 text-gray-100' : 'bg-gray-100 text-gray-800') }}">
                                                    {{ $item->status }}
                                                </div>
                                            </td>
                                            <td class="p-4 text-right flex justify-end space-x-2">
                                                <a href="{{ route('admin.edit', encrypt($item->id)) }}"
                                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-indigo-600 hover:text-white h-10 w-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                                        <path d="M12 20h9"></path>
                                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z">
                                                        </path>
                                                    </svg>
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                <button
                                                    onclick="showTaskModal('{{ $item->title }}', '{{ $item->description }}', '{{ \Carbon\Carbon::parse($item->due_date)->format('d/m/Y') }}', '{{ $item->status }}')"
                                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-green-600 hover:text-white h-10 w-10">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12" y2="16"></line>
                                                    </svg>
                                                    <span class="sr-only">Show</span>
                                                </button>
                                                <form action="{{ route('admin.destroy', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this task?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-red-600 hover:text-white h-10 w-10">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="w-4 h-4">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                        </svg>
                                                        <span class="sr-only">Delete</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-white hover:bg-gray-100 h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg>
                                Filter
                            </button>
                            <button
                                class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-white hover:bg-gray-100 h-9 rounded-md px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <line x1="10" x2="21" y1="6" y2="6"></line>
                                    <line x1="10" x2="21" y1="12" y2="12"></line>
                                    <line x1="10" x2="21" y1="18" y2="18"></line>
                                    <path d="M4 6h1v4"></path>
                                    <path d="M4 10h2"></path>
                                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path>
                                </svg>
                                Sort
                            </button>
                        </div>
                        <nav aria-label="pagination" class="mx-auto flex w-full justify-center" role="navigation"
                            currentpage="1" totalpages="5"></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="taskModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-800 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-2xl leading-6 font-semibold text-gray-900" id="modalTitle"></h3>
                            <div class="mt-4">
                                <div class="border border-indigo-300 p-4 rounded-md bg-gray-50">
                                    <p class="text-base text-gray-600" id="modalDescription"></p>
                                </div>
                                <p class="mt-3 text-sm text-gray-500" id="modalDueDate"></p>
                                <p class="text-sm text-gray-500" id="modalStatus"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                        onclick="closeModal()">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    // search
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            var keyword = this.value.trim().toLowerCase();
            var tasks = document.querySelectorAll('.task-row');
            tasks.forEach(function(task) {
                var title = task.querySelector('.task-title').textContent.trim().toLowerCase();
                var description = task.querySelector('.task-description').textContent.trim().toLowerCase();
                var status = task.querySelector('.task-status').textContent.trim().toLowerCase();
                if (title.includes(keyword) || description.includes(keyword) || status.includes(keyword)) {
                    task.style.display = '';
                } else {
                    task.style.display = 'none';
                }
            });
        });
    });
    // Modal Show
    function showTaskModal(title, description, dueDate, status) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDescription').textContent = description;
        document.getElementById('modalDueDate').textContent = 'Due Date: ' + dueDate;
        document.getElementById('modalStatus').textContent = 'Status: ' + status;

        document.getElementById('taskModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('taskModal').classList.add('hidden');
    }
</script>
