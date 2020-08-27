<?php

namespace App\Exports;

use App\Report;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
protected $id;

function __construct($id){

    $this->id=$id;
}


    public function collection()
    {

        return Report::where('id',$id)->get()([
            'title','purpose'
        ]);
        // return Report::find($id);
    }
}
