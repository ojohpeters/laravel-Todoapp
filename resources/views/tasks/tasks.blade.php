
<x-base title="Tasks">
    @if($tasks->isEmpty())
    <div
    class="bg-white shadow-xl shadow-slate-900 mt-5 overflow-hidden sm:rounded-md max-w-lg mx-auto mb-3 transform  rounded-xl h-max w-full transition duration-300 hover:scale-105">
    <div class="px-4 py-5  sm:px-6">
        <div class="block items-center">
            <h3 class=" text-center text-lg leading-6 font-medium text-red-600 ">
              Empty Task
            </h3>
            <p class="py-4 text-4xl text-red-500">
            No task found
            </p>
        </div>
    </div>
</div>
@endif

    @foreach($tasks as $task) 
    <ul class="bg-white shadow-xl shadow-slate-900 mt-5 overflow-hidden sm:rounded-md max-w-sm mx-auto mb-3">
        <li>
            <div class="px-4 py-5  sm:px-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{$task->tasks}}</h3>
                    <div class="block text-right">   
                @if($task->photo)              
                <a href="{{ asset('storage/' . $task->photo) }}" class="w-16 h-16"> <p class="mt-1 max-w-2xl text-sm text-gray-500">{{$task->description}}</p> </a>
                    <p class="mt-1 max-w-sm text-xs text-gray-700"> Click on the description to open the photo </p>
                    @else
                    <p class="mt-1 max-w-2xl text-sm text-gray-700 font-bold">{{$task->description}}</p> </a>
                    @endif
                    </div>      
                </div>
                <div class="mt-4 flex items-center justify-between">
                    @if($task->completed == 0)
                    <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">
                        Active
                </span></p>
                    @else
                    <p class="text-sm font-medium text-gray-500">Status: <span class="text-red-600">
                    completed
                    </span></p>
                    @endif  
                    <form action="{{route('edittask')}}" method="POST">
                        @csrf
                        <input type="hidden" name="taskid" value="{{$task->id}}">
                        <button class="font-medium text-indigo-600 hover:text-indigo-500">
                            Edit
                        </button>
                    </form>                 
                    <form action="{{route('deletetask')}}" method="POST">
                        @csrf
                        <input type="hidden" name="taskid" value="{{$task->id}}">
                        <button class="font-medium text-red-400 hover:text-red-700">
                            Delete
                        </button>
                    </form>                 
                </div>
            </div>
        </li>     
    </ul>
    @endforeach
</x-base>

