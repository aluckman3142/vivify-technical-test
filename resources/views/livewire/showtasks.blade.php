<div>


<div class="relative overflow-x-auto">
    <div class="w-full bg-orange-500">
    <div class="grid grid-cols-4 gap-4">
        <div class="pt-2 pl-2 font-bold">Vivify Task Manager</div>
        
        <div>
        <div class="pt-2 font-bold">
<label class="inline-flex items-center cursor-pointer">
  <input type="checkbox" value="true" class="sr-only peer" wire:model.live="completed">
  <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600"></div>
  <span class="ms-3 text-sm font-medium text-white">View Completed</span>
</label> </div>

</div>
    </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
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
            <tr class="bg-white border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
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
