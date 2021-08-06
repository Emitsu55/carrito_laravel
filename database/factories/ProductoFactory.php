<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nombre' => $this->faker->firstNameFemale,
            'Precio'  => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'Descripcion'  => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'Imagen'  => $this->faker->randomElement(['image5', 'image3', 'image1']),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ];
    }
}

// $factory->define(Producto::class, function (Faker $faker) {
//     return [
//         'Nombre' => $faker->firstNameFemale,
//         'Precio'  => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
//         'Descripcion'  => $faker->realText($maxNbChars = 200, $indexSize = 2),
//         'Imagen'  => $faker->randomElement(['image5', 'image3', 'image1']),
//         'created_at' => date('Y-m-d H:m:s'),
//         'updated_at' => date('Y-m-d H:m:s')
//     ];
// });
