<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Category;
use App\Models\Matrial;
use App\Models\User;
use App\Models\Role;
use App\Models\Booking;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class bookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'room_id'=> Room::all()->random()->id ,
        'user_id'=> Role::where('name','doctor')->first()->users()->first()->id ,
        'category_id'=> Category::all()->random()->id ,
        'matrial_id'=> Matrial::all()->random()->id ,
        'lecture'=> $this->faker->randomElement([1,2,3,4,5]) ,
        ];
    }
}
