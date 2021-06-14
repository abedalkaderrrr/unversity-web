<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Room;
use App\Models\Matrial;
use App\Models\User;
use App\Models\Role;
use App\Models\Booking;
use App\Models\Advertisment;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       //  factory(Category::class,15)->create();
        Category::factory()->count(15)->create();
        
        Room::factory()->count(10)->create();
        Matrial::factory()->count(5)->create();
        Role::factory()->count(1)->create();
        Role::factory()->create(['name'=>'doctor']);
        Role::factory()->create(['name'=>'admin']);
        Role::factory()->create(['name'=>'Group admin']);
        User::factory()->create(['email'=>'admin@example.com','role_id'=>'admin']);
        User::factory()->create(['email'=>'student@example.com','role_id'=>'student']);
        User::factory()->create(['email'=>'teacher@example.com','role_id'=>'doctor']);
        User::factory()->count(20)->create();
        Advertisment::factory()->count(10)->create();        
        Booking::factory()->count(4)->create();


        User::factory()->count(3)
         ->create()
           ->each(function ($user) {
                $user->matrials()->save(Matrial::factory()->make());
            });
        // dd($cat);

    }
}
