<x-app-layout>
    <section class="py-12 mb-12 bg-gray-700">
        <div class="container grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure>
                <img class="object-cover w-full h-60" src="{{ Storage::url($course->image->url)}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title}}</h1>
                <h2 class="mb-3 text-xl">{{ $course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-chart-line"></i>Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i>Matriculados:{{ $course->students_count }}</p>
                <p class="mb-2"><i class="far fa-star"></i>Calificación:{{ $course->rating }}</p>

            </div>
        </div>

    </section>

    <div class="container grid grid-cols-3 gap-6">
        <div class="col-span-2">
            <section class="mb-12 card">
                <div class="card-body">
                    <h1 class="mb-2 text-2xl font-bold">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-check"></i> {{ $goal->name }}</li>
                        @endforeach
                    </ul>
                </div>

            </section>

            <section class="mb-12">
                <h1 class="mb-2 text-3xl font-fold">Temario</h1>
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" 
                        @if ($loop->first)
                            x-data="{ open:true }"
                          @else
                          x-data="{ open:false }"  
                        @endif
                        
                    
                    >
                        <header class="px-4 py-2 bg-gray-200 border border-gray-200 cursor-pointer" x-on:click="open = !open">
                            <h1 class="text-lg font-bold text-gray-600">{{ $section->name}}</h1>
                        </header>
                        <div class="bg.white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-base text-gray-700"><i class="mr-2 text-gray-600 fas fa-play-circle"></i>{{ $lesson->name }}</li>
                                    
                                @endforeach
                            </ul>

                        </div>

                    </article>
                    
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="text-2xl font-bold">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-base text-gray-700"> {{ $requirement->name }}</li>
                    @endforeach

                </ul>

            </section>

            <section>
                <h1 class="text-3xl font-bold">Descripción</h1>
                <div class="text-base text-gray-700">
                    {{ $course->description }}
                </div>
            </section>

        </div>

        <div>
            <section class="mb-4 card">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="object-cover w-12 h-12 rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="text-lg text-gray-500 font-fold">Prof. {{ $course->teacher->name }} </h1>
                            <a class="text-sm text-blue-400 font bold" href="">{{ '@'.Str::slug($course->teacher->name) }}</a>
                        </div>
                    </div>

                    <!-- la ruta post requiere formulario -->
                @can('enrolled', $course)

                    <a class="mt-4 btn btn-danger btn-block" href="{{ route('courses.status', $course)}}">Continuar con el Curso</a>

                @else

                    <form action="{{ route('course.enrolled', $course )}}" method="POST">
                        @csrf
                        <button type="submit" class="mt-4 btn btn-danger btn-block">llevar este curso</button>
                    </form>
                @endcan   
                    

                </div>


            </section>
            <aside>
                @foreach($similares as $similar)
                    <article class="flex mb-6">
                        <img class="object-cover w-40 h-32" src="{{ Storage::url($similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1>
                                <a href="">{{$similar->title}}</a>
                            </h1>

                        </div>
                        
                    </article>
                @endforeach
                            
            </aside>
        </div>


    </div>




</x-app-layout>