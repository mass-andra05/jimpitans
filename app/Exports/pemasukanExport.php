<?php

namespace App\Exports;

use App\Models\pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;

class pemasukanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pemasukan::all();
    }
}
