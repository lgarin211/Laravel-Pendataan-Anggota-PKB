<?php

namespace App\Exports;

use App\Models\data_anggota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class data_anggotasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        if (!empty($_GET)) {
            $bin=['DProvinsi'=>$_GET['Provinsi'],'DKabupaten'=>$_GET['Kabupaten'],"DKecamatan"=>$_GET['Kecamatan'],"DKelurahan"=>$_GET['Kelurahan']];
                if (!empty($bin)) {
                    foreach ($bin as $key => $item) {
                        if ($item=="" or $item=="true") {
                        unset($bin[$key]);
                        }
                    }
                }
            $users = DB::table('data_anggotas');
            foreach ($bin as $key => $item) {
                $users=$users->where($key, $item);
            }
            $users=$users->get();
        }else{
            $users = DB::table('data_anggotas')->get();
        }
        $data=$users;
        return view('exports.data_anggota', [
            'data_anggota' => $data
        ]);

    }
}
