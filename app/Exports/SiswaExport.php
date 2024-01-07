<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    public $search;

    public function __construct($search){
        $this->search = $search;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Gantilah ini dengan query yang sesuai
        return Siswa::when($this->search ?? null, function ($query, $search) {
            $query->where("lmb_siswa", "like", "%" . $search . "%");
            $query->orWhere("nis", "like", "%" . $search . "%");
            $query->orWhere("nama", "like", "%" . $search . "%");
            $query->orWhere("email", "like", "%" . $search . "%");
        })->get();
    }
}
