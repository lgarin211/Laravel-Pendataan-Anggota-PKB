<?php

  

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use DataTables;
use Illuminate\Support\Facades\DB;

use App\Exports\data_anggotasExport;
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
                      $btn = '<a href="javascript:void(0)" class="edit btn btn-warning btn-sm">edit Data'.$row->id.'</a>';
                      return $btn;
                    })
                    ->addColumn('Cetak', function ($row) {
                        $btn='<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Cetak Kartu ke'.$row->id.'</a>';
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

        return Excel::download(new data_anggotasExport, 'users.xlsx');
    }
    public function dapilexport() 
    {

        return Excel::download(new data_anggotasExport, 'users.xlsx');
    }


}