<?php

namespace Database\Factories;
use App\Models\Room;
use App\Models\Category;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->unique()->randomElement(['computer 1','computer 2','computer 3','computer 4',
            'computer 5','computer6','computer7','computer8',
            'electron 1','electron 2','electron3','electron4',]), //12
            'category_id'=> Category::all()->random()->id,
            'capacity'=>  $this->faker->randomElement([100,50,200]),
        ];
    }
}
