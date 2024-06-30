<div>
    <form action="#" class=" bg-gray-700 p-4" wire:submit.prevent="saveTask">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div>
                <label class="block mb-2 text-sm font-medium text-white">Task Title *</label>
                <input type="text" wire:model="title" class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type a title form your task...">
                <div class="text-xs text-red-500 italic">@error('title') {{ $message }} @enderror</div>
            </div>  
            <div>
                <label class="block mb-2 text-sm font-medium text-white">Priority *</label>
                <select wire:model="priority" class="border text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Select priority</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
                <div class="text-xs text-red-500 italic">@error('priority') {{ $message }} @enderror</div>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-white">Due Date *</label>
                <input type="date" wire:model="due_date" class="border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                <div class="text-xs text-red-500 italic">@error('due_date') {{ $message }} @enderror</div>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-white">Assigned Type *</label>
                <select wire:model.live="assigned_type" class="border text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Select type</option>
                    <option value="User">User</option>
                    <option value="Team">Team</option>
                </select>
                <div class="text-xs text-red-500 italic">@error('assigned_type') {{ $message }} @enderror</div>
            </div>
            @if($assigned_type == 'User')
            <div>
                <label class="block mb-2 text-sm font-medium text-white">Assign To *</label>
                <select wire:model="assigned_user" class="border text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Select User</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <div class="text-xs text-red-500 italic">@error('assigned_user') {{ $message }} @enderror</div>
            </div>
            @endif
            @if($assigned_type == 'Team')
            <div>
                <label class="block mb-2 text-sm font-medium text-white">Assign To *</label>
                <select wire:model="assigned_team" class="border text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                    <option selected="">Select Team</option>
                    @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                </select>
                <div class="text-xs text-red-500 italic">@error('assigned_team') {{ $message }} @enderror</div>
            </div>
            @endif
            <div class="sm:col-span-2">
                <label class="block mb-2 text-sm font-medium text-white">Description</label>
                <textarea wire:model="description" rows="8" class="block p-2.5 w-full text-sm rounded-lg border focus:ring-primary-500 focus:border-primary-500 bg-gray-700  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Your description here"></textarea>
            </div>
        </div>
        <button type="submit" class="mt-4  focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800">Add Task</button>
    <form>
</div>
