<x-app-layout>
    <section class="bg-cover" style="background-image:url({{asset('img/cursos/pastor_2021.jpg')}})">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-4xl text-white font-fold">Domina la tecnología web con Coders Free</h1>
                <p class="mt-2 mb-4 text-lg text-white">En Coders Free encontrarás cursos, manuales y artículos que te ayudarán a convertirte en un profesional del desarrollador web</p>

                            <!-- component -->
                <!-- This is an example component -->
                @livewire('search')

            </div>          
        </div>
        
    </section>

    @livewire('course-index')
</x-app-layout>