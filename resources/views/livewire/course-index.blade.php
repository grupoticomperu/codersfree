<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="bg-gray-200 py-4 mb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4">
                <i class="fas fa-archway text-xs mr-2"></i>todos los cursos
            </button>


                <!-- Dropdown Categoria-->
            <div class="relative mr-4" x-data="{ open:false }">
                <button class="px-4 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                    <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                    <div class="py-2">
                    <hr></hr>
                    </div>
                    <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">    
                        Logout
                    </a>
                </div>
                <!-- // Dropdown Body -->
            </div>
                <!-- // Dropdown niveles -->
            <div class="relative" x-data="{ open:false }">
                <button class="px-4 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                        <i class="fas fa-tags text-sm mr-2"></i>
                        Niveles
                        <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                    <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                        <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                        <div class="py-2">
                        <hr></hr>
                        </div>
                        <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">    
                            Logout
                        </a>
                </div>
                    <!-- // Dropdown Body -->
            </div>


        </div>

    </div>
    <!-- mostrando los cursos -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <article class="card">
                <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                <div class="card-body">
                    <h1 class="card-title">{{ Str::limit($course->title, 40)}}</h1>
                    <p class="text-gray-500 text-sm mb-2">Profe: {{$course->teacher->name}}</p>
                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=1 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=2 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=3 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=4 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating ==5 ? 'yellow':'gray'}}-400"></i></li>
        
                        </ul>
                        <p class="text-sm text-gray-500 ml-auto">
                            <i class="fas fa-users"></i>
                            ({{$course->students_count}})
                        </p>
                    </div>

                    <a href="{{ route('courses.show', $course)}}" class="mt-2 btn btn-primary right-0 btn-block">
                        Mostrar Detalle
                    </a>

                    
                </div>
            </article>
        @endforeach

    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-8">
        {{ $courses->links() }}
    </div>
    

</div>
