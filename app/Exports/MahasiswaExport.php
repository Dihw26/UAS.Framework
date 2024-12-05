<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data mahasiswa untuk diexport.
     */
    public function collection()
    {
        return Mahasiswa::select('npm', 'nama', 'prodi')->get(); 
    }

    /**
     * Tambahkan header untuk file Excel.
     */
    public function headings(): array
    {
        return ['NPM', 'Nama', 'Prodi'];
    }
}
