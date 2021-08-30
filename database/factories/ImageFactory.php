<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;


class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'url' => 'cursos/' . $this->faker->image('public/storage/cursos', 640, 480, null, false)
            //640 ancho y 480 alto
            //null porque versiones tenia categoria de imagenes
            //true almacena de esta forma: public/storage/cursos/image.jpg
            //false almacena: image.jpg

        ];
    }
}
