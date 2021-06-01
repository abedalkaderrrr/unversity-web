<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class StudentsExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $category;
    
    
    public function __construct($cat){
     $this->category = $cat ;
     


    }
    public function collection()
    {
       $users =DB::table('users')
                ->join('categories', 'users.category_id', '=', 'categories.id')
                ->where('categories.catId',$this->category)->whereNotIn('users.role_id',['doctor'])
                ->select('users.id_student', 'users.name')
                ->get();
                
         return $users;
         
    }
    public function headings(): array
    {
        return ["رقم الطالب","الاسم"];
    }
}
