<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class UsersExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $name;
    public $year;
    
    public function __construct($cat,$year){
     $this->name = $cat ;
     $this->year = $year ;


    }
    public function collection()
    {
       $users =DB::table('users')
                ->join('categories', 'users.category_id', '=', 'categories.id')
                ->where('categories.name',$this->name)->whereNotIn('users.role_id',['doctor'])->where('categories.year',$this->year)
                ->select('users.id_student', 'users.name')
                ->get();
                
         return $users;
         
    }
    public function headings(): array
    {
        return ["رقم الطالب","الاسم"];
    }
}
