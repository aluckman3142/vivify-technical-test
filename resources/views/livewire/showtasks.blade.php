<div>


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Task Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Priority
                </th>
                <th scope="col" class="px-6 py-3">
                   Due Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->tasks as $task)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$task->title}}
                </th>
                <td class="px-6 py-4">
                    {{$task->priority}}
                </td>
                <td class="px-6 py-4">
                    {{$task->due_date}}
                </td>
                <td class="px-6 py-4">
                    {{$task->status}}
                </td>
                <td class="px-6 py-4">
                   Mark Completed
                </td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

</div>
