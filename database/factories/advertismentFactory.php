<?php

namespace Database\Factories;

use App\Models\Advertisment;
use App\Models\User;
use App\Models\Role;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class advertismentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::where('role_id','admin')->first()->id,
            'slice'=> 'co1,co2,co3,co4,co5,po1,po2,po3,el1.el2.el3',
            'title'=> "title",
            'content'=> 'bla bla bla bla bla',
            'photo'=> null,
            //'period'=> 7,
            'status'=> 1,
        ];
    }
}
