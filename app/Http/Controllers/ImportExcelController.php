<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Excel;
use App\Imports\ExcelImport;

class ImportExcelController extends Controller
{
    function index(){
        $data = DB::table('fir')->orderBy('id','DESC')->get();
        return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();
        $res = Excel::import(new ExcelImport, $path);
dd(res);
//            return redirect('/')->with('success', 'All good!');

/*
        $data = Excel::import($path)->get();
        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                foreach($value as $row)
                {
                    $insert_data[] = array(
                        'id'  => $row['id'],
                        'e_word'   => $row['e_word'],
                        'r_word'   => $row['r_word'],
                        'e_phrase'    => $row['e_phrase'],
                        'r_phrase'  => $row['r_phrase'],
                        'pic_name'   => $row['pic_name'],
                        'short_audio'   => $row['short_audio'],
                        'long_audio'   => $row['long_audio'],
                        'copyright'   => $row['copyright']
                    );
                }
            }
            if(!empty($insert_data))
            {
                DB::table('fir')->insert($insert_data);
            }
        }
*/
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}
