<x-guest-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Edit Task</h2>
        <form class="grid grid-cols-2 gap-4" action="{{ route('admin.update', $model->id) }}"  method="POST">
            @csrf
            @method('PUT')
            <div class="col-span-2 space-y-2">
                <label for="title" class="text-sm font-medium leading-none">Title</label>
                <input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ $model->title }}"
                    placeholder="Enter title"
                    class="w-full h-10 rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>
            <div class="col-span-2 space-y-2">
                <label for="description" class="text-sm font-medium leading-none">Description</label>
                <input
                    id="description"
                    name="description"
                    type="text"
                    value="{{ $model->description }}"
                    placeholder="Enter description"
                    class="w-full h-10 rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>
            <div class="col-span-2 space-y-2">
                <label for="due_date" class="text-sm font-medium leading-none">Due Date</label>
                <input
                    id="due_date"
                    name="due_date"
                    type="date"
                    value="{{ $model->due_date }}"
                    class="w-full h-10 rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                />
            </div>
            <div class="col-span-2 space-y-2">
                <label for="status" class="text-sm font-medium leading-none">Status</label>
                <select
                    id="status"
                    name="status"
                    class="w-full h-10 rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                    <option value="Progress" {{ $model->status == 'Progress' ? 'selected' : '' }}>Progress</option>
                    <option value="completed" {{ $model->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="col-span-2 flex justify-end mt-4">
                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-md bg-black text-white px-4 py-2 text-sm font-medium transition-colors hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                    Update Task
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
