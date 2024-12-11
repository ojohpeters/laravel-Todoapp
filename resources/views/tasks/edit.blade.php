<x-base title="Edit">
    <form action="{{route('makeedit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach($task as $tsk)            
        @endforeach
        <div class="max-w-sm mx-auto shadow-md shadow-slate-700  bg-white rounded-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-900 text-white">
                <h1 class="text-lg font-bold">Todo App</h1>
            </div>
            <div class="px-6 py-4">
                <select id="pricingType" name="completed"
                class="w-full h-10 border-2 border-sky-500 focus:outline-none focus:border-sky-500 text-sky-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                @php
                $status = $tsk->completed == 1 ? 'Completed' : 'Active';
            @endphp
                <option value="{{$tsk->completed}}" selected="">{{$status}}</option>
                <option value="1">Completed</option>
                <option value="0">Active</option>            
                
            </select>    
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="card-number">
                        Task Name
                    </label>
                    <input type="hidden" value="{{$tsk->id}}" name="id">
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="card-number" type="text" placeholder="Study" name="taskname" value="{{$tsk->tasks}}">
                        @error('taskname')
                        <div class="text-red-500"> {{$message}} </div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="desc">
                        Task Description
                        
                    </label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..." name="description" value="Test">
                       {{$tsk->description}}
                    </textarea>
                    @error('description')
                    <div class="text-red-500"> {{$message}} </div>
                @enderror
    
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="desc">
                        Task photo
                    </label>    

                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="photo" value="/home/0xz3r0/Pictures/MOIMOI.jpg">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        800x400px).</p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 ">
                            You can leave the photo input field if you don't want to update the picture
                        </p>
                        @error('photo')
                        <div class="text-red-500"> {{$message}} </div>
                    @enderror
                </div>
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                    Edit Task
                </button>
            </div>
        </div>
    </form>
</x-base>
