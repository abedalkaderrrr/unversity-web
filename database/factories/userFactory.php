<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;

use Illuminate\Support\Str;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class userFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'id_student' => $this->faker->unique()->buildingNumber(),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'role_id' => Role::all()->random()->name,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
