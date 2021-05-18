<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

    $name = $this->faker->randomElement(['computer','electron','power']);
    $year= $this->faker->randomElement([1,2,3,4,5]);
     
    $section = $this->faker->randomElement([1,2]); 
   // dd(App\Category::where('name',$name ));
     $cat =Category::where('name',$name )->first();
   while( $cat->year ?? 7 ==$year && $cat->name == $name && $cat->section ==$section ) {
    $year= $this->faker->randomElement([1,2,3,4,5]);
    }
    $catId =Str::substr($name, 0, 2) . $year;
    return [
        'catId'=> $catId , 
        'name'=> $name ,
         
        'year'=> $year
        ,
        'section'=> $section,

    ];
    }
}
