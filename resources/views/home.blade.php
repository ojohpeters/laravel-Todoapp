<x-base title="Todo Home">
    <div class="grid grid-flow-col">
          <div
        class="bg-white shadow-xl shadow-slate-900 mt-5 overflow-hidden sm:rounded-md max-w-lg mx-auto mb-3 transform  rounded-xl h-max w-full transition duration-300 hover:scale-105">
        <div class="px-4 py-5  sm:px-6">
            <div class="block items-center">
                <h3 class=" text-center text-lg leading-6 font-medium text-gray-900">
                    Todo App
                </h3>
                <p class="py-4">
                <div class="flex justify-center items-center">
                    <h1 id="typewriter" class="text-xl font-bold"></h1>
                </div>
                A Simple <span class="text-blue-600"> TodoApp </span>To help you accomplish your Tasks
                </p>
                <p class="py-4">
                    @auth()
                        Checkout your <a href="{{ route('user.tasks') }}" class="text-blue-500">tasks</a>
                    @endauth
                </p>
                @guest
                    <p class="text-gray-400 text-center ">
                        Kindly <a href="{{ route('user.register') }}"> <span class="text-blue hover:text-blue-400"> Register
                        </a></span> or <a href="{{ route('loginform') }}"> <span> Login </a></span>To Proceesd
                    </p>
                @endguest

            </div>
        </div>
    </div>
    <div
        class="bg-white shadow-xl shadow-slate-900 mt-5 overflow-hidden sm:rounded-md max-w-lg mx-auto mb-3 transform  rounded-xl h-max w-full transition duration-300 hover:scale-105">
        <div class="px-4 py-5  sm:px-6">
            <div class="block items-center">
                <h3 class=" text-center text-lg leading-6 font-medium text-gray-900 ">
                  MOTIVATION
                </h3>
                <p class="py-4">
                "Dream big, but start small. Your goals are just a series of small tasks waiting to be conquered. Every
               task you complete is a step closer to achieving greatness! Remember, progress—no matter how small—is
                still progress. So tackle your to-dos today, and let the satisfaction of completing them fuel your
                journey to success!"
                </p>
            </div>
        </div>
    </div>
    </div>
  

    <script>
        @auth
        const username = "{{ Auth::user()->username }}";
        @endauth
        @guest
        const username = "Guest";
        @endguest
        const words = ["Hello, " + username, "Welcome to my Todo!",
            "Add a Task And Believe you can achieve It!.",
        ];
        let i = 0;
        let j = 0;
        let currentWord = "";
        let isDeleting = false;

        function type() {
            currentWord = words[i];
            if (isDeleting) {
                document.getElementById("typewriter").textContent = currentWord.substring(0, j - 1);
                j--;
                if (j == 0) {
                    isDeleting = false;
                    i++;
                    if (i == words.length) {
                        i = 0;
                    }
                }
            } else {
                document.getElementById("typewriter").textContent = currentWord.substring(0, j + 1);
                j++;
                if (j == currentWord.length) {
                    isDeleting = true;
                }
            }
            setTimeout(type, 200);
        }
        type();
    </script>
</x-base>
