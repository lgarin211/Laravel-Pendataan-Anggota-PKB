<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class DataAnggotaController extends Controller
{
    public function akun_add(Request $request)
    {
        if(!empty($_POST)) {
            $breakpoin=DB::table('users')->where('email',$request->email)->first();
            if (empty($breakpoin)){
            $inpad=[
            "name" => $request->nama,
            "email" => $request->email,
            "password"=>'$2y$10$XtSKTYo9r/oJikFsTvStT.ddQ52psxxhWgTOTgI.vqR8bfx3rptwW',
            ];
            DB::table('users')->insert($inpad);
            return back();
            }else{
                return back();
            }
        }
    }
    public function pasfile(Request $request)
    {
        // dd($_POST);
        if ($request->req!='Upload_KTP') {
        $file = $request->file($request->req);
        $tujuan_upload = 'doc/'.$request->folder.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $binval='doc/'.$request->folder.'/'.$upname;
        $file->move($tujuan_upload,$upname);

        }else{
        $file = $request->file($request->req);
        $tujuan_upload = 'doc/'.$request->folder.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_Foto='doc/'.$request->folder.'/'.$upname;
        // dd(public_path($Upload_Foto,$tujuan_upload),('public/'.$upname),$request->file('Upload_Foto'));
        $Upload_thumFoto='/doc/'.$request->reqi.'/thum'.$upname;
        $filePath = public_path($Upload_thumFoto);
        $img = Image::make($file->path());
        $img->resize(340,226);
        // $file->move($tujuan_upload,$upname);
        $img->save($filePath,100);
        $binval=$Upload_thumFoto;
        // dd($Upload_thumFoto);
        }
        // dd($request->req);
        DB::table('data_anggotas')
              ->where('id', $request->id)
              ->update([$request->req=>$binval]);
        return back();
    }
    public function kelengkapandata(Request $request)
    {
        // dd('as');
        $id=auth()->user()->id;
        if(!empty($request->poinadmin)) {
            $breakpoin=DB::table('users')->where('email',$request->email)->first();
            if (empty($breakpoin)) {
                         $inpad=[
            "name" => $request->nama,
            "email" => $request->email,
            "password"=>'$2y$10$XtSKTYo9r/oJikFsTvStT.ddQ52psxxhWgTOTgI.vqR8bfx3rptwW',
            ];

            DB::table('users')->insert($inpad);
            }
            $id=DB::table('users')->where('email',$request->email)->first()->id;
        }
        if(!empty($_POST)) {

        // dd($request);
        $idauth=$id;

        $file = $request->file('Upload_Foto');
        $tujuan_upload = 'doc/PP/'.$idauth.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_Foto='doc/PP/'.$idauth.'/'.$upname;
        // dd(public_path($Upload_Foto,$tujuan_upload),('public/'.$upname),$request->file('Upload_Foto'));
        $Upload_thumFoto='/doc/PP/thum'.$upname;
        $filePath = public_path($Upload_thumFoto);
        $img = Image::make($file->path());
        $img->resize(340,226);
        // $file->move($tujuan_upload,$upname);
        $img->save($filePath,100);

        $file = $request->file('Upload_KTP');
        $tujuan_upload = 'doc/KTP/'.$idauth.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_KTP='doc/KTP/'.$idauth.'/';
        $Upload_thumKTP='/doc/KTP/'.$idauth.'/thum'.$upname;
        $filePath = public_path($Upload_thumKTP);
        $img = Image::make($file->path());
        $img->resize(340,226);
        $file->move($tujuan_upload,$upname);
        $img->save($filePath,100);

        $file = $request->file('Upload_Surat_Pernyataan');
        $tujuan_upload = 'doc/SPT/'.$idauth.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_Surat_Pernyataan='doc/SPT/'.$idauth.'/'.$upname;
        $file->move($tujuan_upload,$upname);

        $file = $request->file('filelainnya');
        $tujuan_upload = 'doc/OTL/'.$idauth.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $filelainnya='doc/OTL/'.$idauth.'/'.$upname;
        $file->move($tujuan_upload,$upname);

        $data=[
          "nama" => $request->nama,
          "NIK" => $request->NIK,
          "jenis_kelamin" => $request->jenis_kelamin,
          "Provinsi" => $request->Provinsi,
          "Kabupaten" => $request->Kabupaten,
          "Kecamatan" => $request->Kecamatan,
          "Kelurahan" => $request->Kelurahan,
          "RT" => $request->RT,
          "RW" => $request->RW,
          "Alamat" => $request->Alamat,
          "email" => $request->email,
          "No_Hape" => $request->No_Hape,
          "Rekomendasi" => $request->Rekomendasi,
          "Upload_Foto"=> $Upload_thumFoto,
          "Upload_KTP"=>$Upload_thumKTP,
          "Upload_Surat_Pernyataan"=>$Upload_Surat_Pernyataan,
          "filelainnya"=>$filelainnya,
          "user_id"=>$id,
          'no_keanggotaan'=>strtotime("now")
        ];

        // dd($data);
        DB::table('data_anggotas')->insert($data);
        return redirect('/dashboard');}
        // return view('DataDiri/datadiri');
    }

    public function cetak()
    {
        // $data=DB::table('data_anggotas')->where('user_id',auth()->user()->id)->get();
        $data=DB::table('data_anggotas');
        foreach ($_GET as $key => $value) {
            $data->where($key,$value);
        }
        $data=$data->get();
        // dd($data);
        return view('Cetak/cetak',['data'=>$data]);
    }
    public function edit(Request $request)
    {
        if (!empty($_POST)) {
             // dd($_POST);
            $data=[
              "nama" => $request->nama,
              "NIK" => $request->NIK,
              "jenis_kelamin" => $request->jenis_kelamin,
              "Provinsi" => $request->Provinsi,
              "Kabupaten" => $request->Kabupaten,
              "Kecamatan" => $request->Kecamatan,
              "Kelurahan" => $request->Kelurahan,
              "RT" => $request->RT,
              "RW" => $request->RW,
              "Alamat" => $request->Alamat,
              "email" => $request->email,
              "No_Hape" => $request->No_Hape,
              "Rekomendasi" => $request->Rekomendasi,
              "Status" => $request->Status,
              // "Upload_Foto"=> $Upload_Foto,
              // "Upload_KTP"=>$Upload_KTP,
              // "Upload_Surat_Pernyataan"=>$Upload_Surat_Pernyataan,
              // "filelainnya"=>$filelainnya,
              // "user_id"=>auth()->user()->id,
              // 'no_keanggotaan'=>strtotime("now")
            ];
                // dd($data);
              DB::table('data_anggotas')
              ->where('id', $request->id)
              ->update($data);
                // dd($data);
                // DB::table('data_anggotas')->insert($data);
            return back();
        }
        if (!empty($_GET['id'])) {
        $data=DB::table('data_anggotas')->where('id',$_GET['id'])->first();
        // $data2=DB::table('Dapil_anggotas')->where('id',$_GET['id'])->first();
        if(!empty($request->poinadmin)) {
        return back();
        }
        return view('DataDiri.edit',['data'=>$data]);
        }

    }
    public function Fbylok(Request $request)
    {
        if ($request->ajax()) {
            if (!empty($_GET)) {
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
                }else{
                        $users = DB::table('data_anggotas');
                }
            $users=$users->get();
            $data = $users;
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                      $btn = '
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-success" href="/cetak?id='.$row->id.'">Cetak</a>
                            <a class="btn btn-success" href="/edit?id='.$row->id.'">Lihat Data</a>
                            <a class="btn btn-success" href="/edit?Dapil=true&id='.$row->id.'">Buat Dapil</a>
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
        $urlren="$_SERVER[REQUEST_URI]";
        return view('Admin/fbylok',['ren'=>$urlren]);
    }

    public function Fbydapil(Request $request)
    {
        // dd($_GET);
        if ($request->ajax()) {
                $bin=['DProvinsi'=>$_GET['Provinsi'],'DKabupaten'=>$_GET['Kabupaten'],"DKecamatan"=>$_GET['Kecamatan'],"DKelurahan"=>$_GET['Kelurahan']];
                if (!empty($bin)) {
                    foreach ($bin as $key => $item) {
                        if ($item=="" or $item=="true") {
                        unset($bin[$key]);
                        }
                    }
                }
            $users = DB::table('data_anggotas')->WhereNotNull('DProvinsi');
            foreach ($bin as $key => $item) {
                $users=$users->where($key, $item);
            }
            $users=$users->get();
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
        $urlren="$_SERVER[REQUEST_URI]";
        return view('Admin/fbydapil',['ren'=>$urlren]);
    }

    public function Dapil(Request $request)
    {
        $id=$_POST['anggota_id'];
        unset($_POST['_token'],$_POST['user_id'],$_POST['no_keanggotaan'],$_POST['anggota_id']);
        DB::table('data_anggotas')->where('id',$id)->update($_POST);
        return redirect('/Fbydapil');
    }
}
