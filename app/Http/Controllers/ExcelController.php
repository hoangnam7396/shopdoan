<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel,Input,File;


class ExcelController extends Controller
{
    public function getImport()
    {
        return view('excel.import');
    }
    public function postImport(){
        Excel::load(Input::file('file'),function ($reader){
           $reader->each(function($sheet){
               foreach($sheet->toArray() as $row){
                   User::firstorCreate($sheet->toArray());
               }
           }) ;
        });
        echo "Import thành công";
    }
    public function export()
    {
        $export = Bill::select('id','id_customer','date_order','total','payment','note','created_at','updated_at')->get();
        Excel::create('export data', function ($excel) use($export){
            $excel->sheet('Sheet 1', function ($sheet) use($export){
               $sheet->fromArray($export);
            });
        })->export('xlsx');
    }
}

