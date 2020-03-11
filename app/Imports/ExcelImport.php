<?php

namespace App\Imports;

use App\fir;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new fir([
            'id'     => $row[0],
            'e_word'   => $row[1],
            'r_word'   => $row[2],
            'e_phrase'    => $row[3],
            'r_phrase'  => $row[4],
            'pic_name'   => $row[5],
            'short_audio'   => $row[6],
            'long_audio'   => $row[7],
            'copyright'   => $row[8],
        ]);
    }
}
