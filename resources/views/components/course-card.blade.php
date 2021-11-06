    @props(['course'])
    
            <article class="card">
                <img class="object-cover w-full h-36" src="{{Storage::url($course->image->url)}}" alt="">
                <div class="card-body">
                    <h1 class="card-title">{{ Str::limit($course->title, 40)}}</h1>
                    <p class="mb-2 text-sm text-gray-500">Profe: {{$course->teacher->name}}</p>
                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=1 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=2 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=3 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=4 ? 'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$course->rating ==5 ? 'yellow':'gray'}}-400"></i></li>
        
                        </ul>
                        <p class="ml-auto text-sm text-gray-500">
                            <i class="fas fa-users"></i>
                            ({{$course->students_count}})
                        </p>
                    </div>

                    <a href="{{ route('courses.show', $course)}}" class="right-0 mt-2 btn btn-primary btn-block">
                        Mostrar Detalle
                    </a>

                    
                </div>
            </article>