<?php

  

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use DataTables;
use Illuminate\Support\Facades\DB;

use App\Exports\data_anggotasExport;
use App\Exports\dapil_anggotasExport;

use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)
    {

        if ($request->ajax()) {

            $users = DB::table('users')->get();
            $data = $users;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn='
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-success" href="/sand?id='.$row->id.'" >Reset Sandi</a>
                            <a class="btn btn-success" href="/Adminkan?id='.$row->id.'">Adminkan</a>
                            <a class="btn btn-danger" href="/Hapus?table=users&id='.$row->id.'">Hapus Data</a>
                        </div>
                        ';
                    return $btn;
                    })
                    ->addColumn('Cetak', function ($row) {
                        $btn='
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-success" href="/sand?id='.$row->id.'" onclick("alert(`Sandi Sudah Di ubah`)")>Reset Sandi</a>
                            <a class="btn btn-dangger" href="/Hapus?table=users&id='.$row->id.'">Hapus Data</a>
                        </div>
                        ';
                    return $btn;
                    })
                    // ->rawColumns(['update', 'nama','pangkat','kesatuan','kotama', 'pinjaman', 'jml_angs', 'jml_tunggakan'])
                    // ->toJson()
                    ->rawColumns(['action','Cetak'])
                    ->make(true);
        }

        return view('Admin/userseting');

    }

    public function anggota(Request $request)
    {
        $users = DB::table('data_anggotas')->get();
        if ($request->ajax()) {
            $data = $users;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                      $btn = '
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-success" href="/cetak?id='.$row->id.'">Cetak</a>
                            <a class="btn btn-success" href="/edit?id='.$row->id.'">Lihat Data</a>
                            <a class="btn btn-success" href="/edit?dapil=true&id='.$row->id.'">Buat Dapil</a>
                            <a class="btn btn-dangger" href="/Hapus?table=data_anggotas&id='.$row->id.'">Hapus Data</a>
                        </div>';
                      return $btn;
                    })
                    ->addColumn('Photo_Profile', function($row){
                      $btn = '<a href="/'.$row->Upload_Foto.'" target="_blank">
                      <img style="width: 150px !important;  height: 150px !important;border-radius: 0% !important;}" src="'.$row->Upload_Foto.'" class="img-thumbnail" >
                      </a>';
                      return $btn;
                    })
                    ->addColumn('IMG_KTP', function($row){
                      $btn = '
                      <a href="/'.$row->Upload_KTP.'" target="_blank">
                      <img style="    width: 150px !important;  height: 150px !important;border-radius: 0% !important;}" src="'.$row->Upload_KTP.'" class="img-thumbnail" >
                      </a>';
                      return $btn;
                    })
                    // ->rawColumns(['update', 'nama','pangkat','kesatuan','kotama', 'pinjaman', 'jml_angs', 'jml_tunggakan'])
                    // ->toJson()
                    ->rawColumns(['action','Cetak','IMG_KTP','Photo_Profile'])
                    ->make(true);
        }

        return view('Admin/master');

    }


    public function export() 
    {
        $bin=['Provinsi','Kabupaten',"Kecamatan","Kelurahan"];
        $name='';
        if (!empty($_GET)) {
            $bin=['Provinsi'=>$_GET['Provinsi'],'Kabupaten'=>$_GET['Kabupaten'],"Kecamatan"=>$_GET['Kecamatan'],"Kelurahan"=>$_GET['Kelurahan']];

                if (!empty($bin)) {
                    foreach ($bin as $key => $item) {
                        if ($item=="" or $item=="true") {
                        unset($bin[$key]);
                        }else{
                            $name=$name.$item.'|';
                        }
                    }
                }
        }
        $nama=date('d-m-Y ').$name.'('.strtotime("now").').xlsx';
        // dd($nama);
        return Excel::download(new data_anggotasExport, $nama);
    }

    public function dapilexport() 
    {
        $name="dapil";
        $nama=date('d-m-Y ').$name.'('.strtotime("now").').xlsx';
        // dd($nama);
        return Excel::download(new dapil_anggotasExport, $nama);
    }


}