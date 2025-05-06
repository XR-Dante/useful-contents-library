<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center">

            <div class="flex space-x-4 items-center">


                <a href="/" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                    <svg class="h-6 w-6 mr-1 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-1.657-2-4-2-4s-2 2.343-2 4a2 2 0 002 2 2 2 0 002-2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21H4a2 2 0 01-2-2v-7a8 8 0 0116 0v7a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-bold">Content-hub</span>
                </a>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="/home" class="py-5 px-3 text-gray-700 hover:text-gray-900">Home</a>
                    <a href="/about" class="py-5 px-3 text-gray-700 hover:text-gray-900">About</a>
                    <a href="/contact" class="py-5 px-3 text-gray-700 hover:text-gray-900">Authors</a>
                    <a href="/contents" class="py-5 px-3 text-gray-700 hover:text-gray-900">Contents</a>

                    {{-- CREATE button dinamik chiqarish --}}
                    @if(isset($currentCategory))
                        <a href="/{{ $currentCategory }}/create" class="py-2 px-3 bg-green-500 text-white rounded hover:bg-green-400 transition">
                            Create {{ ucfirst($currentCategory) }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-light p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/videos">Video</a></li>
                    <li><a class="dropdown-item" href="/music">Music</a></li>
                    <li><a class="dropdown-item" href="/books">Book</a></li>
                </ul>
            </div>
{{--            <div class="dropdown">--}}
{{--                <button class="btn btn-light p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    Genres--}}
{{--                </button>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    @foreach ($genres as $genre)--}}
{{--                        <li><a class="dropdown-item" href="/{{$genres->name}}">Video</a></li>--}}
{{--                    @endforeach--}}
{{--                    <li><a class="dropdown-item" href="/videos">Video</a></li>--}}
{{--                    <li><a class="dropdown-item" href="/music">Music</a></li>--}}
{{--                    <li><a class="dropdown-item" href="/books">Book</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}


            @if(request()->is('home'))
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/login" class="py-2 px-3 bg-blue-500 text-white rounded hover:bg-blue-400 transition">Login</a>
                    <a href="/register" class="py-2 px-3 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">Register</a>
                </div>
            @endif

        </div>
    </div>
</nav>
