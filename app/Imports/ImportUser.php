<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class ImportUser implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $row)
    {
        foreach($row as $r){
            User::create([
                'name'=>$r['name'],
                'email'=>$r['email'],
                'password'=>bcrypt(12345678),
                'profile'=>$r['img'],
            ]);

        }
      
    }
}
