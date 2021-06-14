<?php

namespace App\Imports;

use App\Models\Mark;
use Maatwebsite\Excel\Concerns\ToModel;

class MarksImport implements ToModel
{
    protected $matrial;
    public function __construct($mat)
    {
        $this->matrial = $mat;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mark([
            'user_id' => $row[0],
           'mark' => $row[1], 
           'matrial_id' =>$this->matrial ,
        ]);
    }
}
