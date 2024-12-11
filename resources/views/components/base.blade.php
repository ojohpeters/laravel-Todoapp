<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Todo' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    

</head>

<body>
    <div class="container sticky top-0">
        <nav class="bg-white border-gray-200 dark:bg-gray-900 sticky top-0">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <!-- Logo Section -->
                <a href="{{ route('home') }}" class="flex items-center -space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/img/todologo.jpg') }}" class="h-8" alt="Todo App Logo" />
                    <span class="text-blue-500 self-center text-2xl font-semibold whitespace-nowrap dark:text-blue-200">
                        Todo App
                    </span>
                </a>
        
                <!-- Search & Hamburger Menu -->
                <div class="flex md:order-2">
                    <!-- Search for Larger Screens -->
                    @auth
                    <div class="relative hidden md:block">
                        <form action="{{route('searchtask')}}" method="POST">
                            @csrf
                             <input type="text" id="search-tasks" aria-label="Search tasks"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Search tasks..." name="search">
                            <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-16 sm:w-16  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </form>                       
                    </div>
                    @endauth
                    <!-- Hamburger Menu -->
                    <button data-collapse-toggle="navbar-search" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 dark:hover:bg-gray-700"
                        aria-controls="navbar-search" aria-expanded="false">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
        
                <!-- Navbar Items -->
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                    <ul
                        class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <!-- Home -->
                        <li>
                            <a href="{{ route('home') }}"
                                class="{{ request()->routeIs('home') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                Home
                            </a>
                        </li>
        
                        <!-- Guest Links -->
                        @guest
                        <li>
                            <a href="{{ route('user.register') }}"
                                class="{{ request()->routeIs('user.register') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                Register
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('loginform') }}"
                                class="{{ request()->routeIs('loginform') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                Login
                            </a>
                        </li>
                        @endguest
        
                        <!-- Auth Links -->
                        @auth
                        <li>
                            <a href="{{ route('user.tasks') }}"
                                class="{{ request()->routeIs('user.tasks') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                Tasks
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('task.form') }}"
                                class="{{ request()->routeIs('task.form') ? 'text-blue-700 font-semibold' : 'text-gray-900' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                Create Tasks
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                    class="block py-2 px-3 text-red-900 rounded hover:bg-gray-100 md:hover:bg-transparent dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                    Logout
                                </button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        

    </div>
    <div class="container">
        {{ $slot }}
    </div>
    <script src="{{ asset('assets/js/flowbite.bundle.js') }}"></script>
</body>

</html>
