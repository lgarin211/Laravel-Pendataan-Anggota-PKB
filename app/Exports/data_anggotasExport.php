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
        $bin=['Provinsi','Kabupaten',"Kecamatan","Kelurahan"];;
        if (!empty($_GET['Provinsi'])) {
            $bin=['Provinsi'=>$_GET['Provinsi'],'Kabupaten'=>$_GET['Kabupaten'],"Kecamatan"=>$_GET['Kecamatan'],"Kelurahan"=>$_GET['Kelurahan']];
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
        // dd($bin);
        return view('exports.data_anggota', [
            'data_anggota' => $data,'pro'=>$bin
        ]);

    }
}
