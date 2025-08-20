<?php

namespace App\Exports;

use App\Models\Tugas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TugasExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'tugas' => Tugas::with('user')->get(),
        );
        return view('admin/tugas/excel', $data);
    }
}
