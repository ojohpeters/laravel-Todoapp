<x-base title="Create">
    <form action="{{route('task.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="max-w-sm mx-auto  bg-white rounded-md shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-900 text-white">
                <h1 class="text-lg font-bold">Todo App</h1>
            </div>
            <div class="px-6 py-4">
    
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="card-number">
                        Task Name
                    </label>
                    <input
                        class="appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="card-number" type="text" placeholder="Study" name="taskname">
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
                        placeholder="Write your thoughts here..." name="description">
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
                        aria-describedby="file_input_help" id="file_input" type="file" name="photo">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                        800x400px).</p>
                        @error('photo')
                        <div class="text-red-500"> {{$message}} </div>
                    @enderror
                </div>
                <input type="hidden" name="completed" value="0">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full">
                    Add Task
                </button>
            </div>
        </div>
    </form>
</x-base>
