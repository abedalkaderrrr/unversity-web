<?php

namespace Database\Factories;

use App\Models\Matrial;
use App\Models\Category;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class matrialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matrial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->randomElement(['control','analysis','programing','math','electrical']), //5
            //'catId'=> Category::all()->random()->catId,
            'term' => $this->faker->randomElement([1,2]),
        ];
    }
}
