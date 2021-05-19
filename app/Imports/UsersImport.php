<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $name;
    public $year;
    
    public function __construct($cat,$year){
     $this->name = $cat ;
     $this->year = $year ;


    }
   
    public function model(array $row)
    {    
        $id = Role::where('name','student')->first()->id ;
        $catId= Category::where('name',$this->name)->where('year',$this->year)->first()->id ?? 1;     
       // echo $catId;
        //dd();
        return new User([
            'id_student'=>$row[0]  ,
             'name'=>$row[1], 
             'email'=>$row[2],
             'password'=> bcrypt($row[3]),
             'role_id'=> 'student',
             'category_id'=>$catId ,
        ]);
    }
}
