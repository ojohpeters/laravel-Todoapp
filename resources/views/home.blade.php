<x-base title="Todo Home">
    <div class="grid grid-cols-1 md:flex md:flex-row md:space-x-5 max-w-screen-sm px-6 sm:px-8">
        <!-- Todo App Card -->
        <div class="bg-white shadow-xl shadow-slate-900 mt-5 overflow-hidden sm:rounded-md sm:max-w-md mx-auto mb-3 transform rounded-xl h-auto w-full transition duration-300 hover:scale-105">
          <div class="px-4 py-5 sm:px-6">
            <div class="block items-center">
              <h3 class="text-center text-lg leading-6 font-medium text-gray-900">
                Todo App
              </h3>
              <p class="py-4">
                <div class="flex justify-center items-center">
                  <h1 id="typewriter" class="text-xl font-bold"></h1>
                </div>
                A Simple <span class="text-blue-600">TodoApp</span> to help you accomplish your tasks.
              </p>
              <p class="py-4">
                @auth
                  Check out your <a href="{{ route('user.tasks') }}" class="text-blue-500">tasks</a>.
                @endauth
              </p>
              @guest
              <p class="text-gray-400 text-center">
                Kindly <a href="{{ route('user.register') }}"><span class="text-blue-300 hover:text-blue-400">Register</span></a> or 
                <a href="{{ route('loginform') }}"><span class="text-blue-300 hover:text-blue-400">Login</span></a> to proceed and meet a special word of motivation made just for you.
              </p>
              @endguest
            </div>
          </div>
        </div>
           @auth
        <!-- Motivation Card -->
        <div class="bg-white shadow-xl shadow-slate-900 mt-5 overflow-hidden sm:rounded-md sm:max-w-md mx-auto mb-3 transform rounded-xl h-auto w-full transition duration-300 hover:scale-105 justify-center">
     
          <div class="justify-center md:flex md:flex-row md:space-x-5 px-6 sm:px-8">
            <div class="block items-center justify-center">
              <h3 class="text-center text-lg leading-6 font-medium text-gray-900">
                MOTIVATION
              </h3>
              <p class="py-4 text-center">
                "Dream big, but start small. Your goals are just a series of small tasks waiting to be conquered. Every task you complete is a step closer to achieving greatness! Remember, progress—no matter how small—is still progress. So tackle your to-dos today, and let the satisfaction of completing them fuel your journey to success!"
              </p>
            </div>
          </div>
          @endauth
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
