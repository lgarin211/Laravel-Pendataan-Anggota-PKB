<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class DataAnggotaController extends Controller
{
    public function VAL()
    {
           if (!empty($_GET)) {
            $bin=$_GET;
            $users = DB::table('data_anggotas');
                foreach ($bin as $key => $item) {
                    $users=$users->where($key, $item);
                }
            if ($users->count()>0) {
                return response()->json('<p class="text-danger">Data Sudah Ada</p>',200);
            }else{
                return response()->json('<p class="text-primary">Data Bisa Di masukan</p>',200);
            }
        }
    }

    public function Hapus()
    {
        if (!empty($_GET['table'])&&!empty($_GET['id'])) {
            DB::table($_GET['table'])->where('id',$_GET['id'])->delete();    
        }
        return back();
    }
    public function Adminkan()
    {
        if (!empty($_GET['id'])) {
            DB::table('users')->where('id',$_GET['id'])->update(['role' => 'Admin']);    
        }
        return back();
    }
    public function sand()
    {
        if (!empty($_GET['id'])) {
            DB::table('users')->where('id',$_GET['id'])->update(['password' => '$2y$10$XtSKTYo9r/oJikFsTvStT.ddQ52psxxhWgTOTgI.vqR8bfx3rptwW']);    
        }
        return back();
    }
    public function akun_add(Request $request)
    {
        if(!empty($_POST)) {
            $breakpoin=DB::table('users')->where('email',$request->email)->first();
            if (empty($breakpoin)){
            $inpad=[
            "name" => $request->nama,
            "email" => $request->email,
            "password"=>Hash::make($request->password),
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

        if (($request->req!='Upload_KTP') and ($request->req!='Upload_Foto')) {
        // dd($request);
        $file = $request->file($request->req);
        $tujuan_upload = 'public/doc/'.$request->folder.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $binval='public/doc/'.$request->folder.'/'.$upname;
        // dd($binval);
        $nas=$file->move($tujuan_upload,$upname);
        // dd($nas);
        }else{
        $file = $request->file($request->req);
        $tujuan_upload = 'public/doc/'.$request->folder.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_Foto='public/doc/'.$request->folder.'/'.$upname;
        $Upload_thumFoto='/doc/'.$request->reqi.'/thum'.$upname;
        $filePath = public_path($Upload_thumFoto);
        $img = Image::make($file->path());
        $img->resize(340,226);
        $img->save($filePath,100);
        $binval=$Upload_thumFoto;
        }
        DB::table('data_anggotas')
              ->where('id', $request->id)
              ->update([$request->req=>$binval]);
        return back();
    }
    public function kelengkapandata(Request $request)
    {
        // dd($request);
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
        
        $cal= DB::table('data_anggotas')->where('NIK',$request->NIK)->count();

        if ($cal>0) {
            return back()->with('stat','NIK SUDAH TERDAFTAR');
        }

        // dd($request);
        $idauth=$id;
        if ($request->file('Upload_Foto')) {
        $file = $request->file('Upload_Foto');
        $tujuan_upload = 'public/doc/PP/'.$idauth.'/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_Foto='public/doc/PP/'.$idauth.'/'.$upname;
        // dd(public_path($Upload_Foto,$tujuan_upload),('public/'.$upname),$request->file('Upload_Foto'));
        $Upload_thumFoto='/doc/PP/thum'.$upname;
        $filePath = public_path($Upload_thumFoto);
        $img = Image::make($file->path());
        $img->resize(340,226);
        // $file->move($tujuan_upload,$upname);
        $img->save($filePath,100);
        }else{
            $Upload_thumFoto='/public/null';
        }

        if(!empty($request->file('Upload_KTP'))) {
        $file = $request->file('Upload_KTP');
        $tujuan_upload = 'public/doc/KTP';
        $upname=strtotime("now").$file->getClientOriginalName();
        // $Upload_KTP='public/doc/KTP';
        $Upload_thumKTP='/doc/KTP/thum'.$upname;
        $filePath = public_path($Upload_thumKTP);
        $img = Image::make($file->path());
        $img->resize(340,226);
        // $file->move($tujuan_upload,$upname);
        $img->save($filePath,100);
        }else{
            $Upload_thumKTP='/public/null';
        }

        if (!empty($request->file('KK'))) {
        $file = $request->file('KK');
        $tujuan_upload = 'public/doc/SPT/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $KK='public/doc/SPT/'.$upname;
        $file->move($tujuan_upload,$upname);
        }else{
            $KK='/public/null';
        }

        if (!empty($request->file('Upload_Surat_Pernyataan'))) {

        $file = $request->file('Upload_Surat_Pernyataan');
        $tujuan_upload = 'public/doc/SPT/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $Upload_Surat_Pernyataan='public/doc/SPT/'.$upname;
        $file->move($tujuan_upload,$upname);
        }else{
            $Upload_Surat_Pernyataan='/public/null';
        }





        if (!empty($request->file('filelainnya'))) {
        $file = $request->file('filelainnya');
        $tujuan_upload = 'public/doc/OTL/';
        $upname=strtotime("now").$file->getClientOriginalName();
        $filelainnya='public/doc/OTL/'.$upname;
        $file->move($tujuan_upload,$upname);
        }else{
            $filelainnya='/public/null';
        }

        $data=[
          "nama" => $request->nama,
          "NIK" => $request->NIK,
          "tmp" => $request->tmp,
          "tmt" => $request->tmt,
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
          'KK'=>$KK,
          "user_id"=>$id,
          'no_keanggotaan'=>strtotime("now")
        ];

        // dd($data);
        DB::table('data_anggotas')->insert($data);
        // return redirect('/ard');
        return back();
        }
        // return view('DataDiri/datadiri');
    }

    public function cetak()
    {
        
        // $data=DB::table('data_anggotas')->where('user_id',auth()->user()->id)->get();
        $bin=$_GET;
        foreach ($bin as $key => $item) {
                if ($item=="" or $item=="true") {
                    unset($_GET[$key]);
                        }
        }
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
        if (!empty($_GET)) {
            $bin=['Provinsi'=>$_GET['Provinsi'],'Kabupaten'=>$_GET['Kabupaten'],"Kecamatan"=>$_GET['Kecamatan'],"Kelurahan"=>$_GET['Kelurahan']];
                    if (!empty($bin)) {
                        foreach ($bin as $key => $item) {
                            if ($item=="" or $item=="true") {
                            unset($bin[$key]);
                            }
                        }
                    }
        }else{
            $bin=['Provinsi'=>'*','Kabupaten'=>'*',"Kecamatan"=>'*',"Kelurahan"=>'*'];
        }
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
                            <a class="btn btn-success" href="'.url('/').'/cetak?id='.$row->id.'">Cetak</a>
                            <a class="btn btn-success" href="'.url('/').'/resume?id='.$row->id.'">Lihat Data</a>
                            <a class="btn btn-success" href="'.url('/').'/edit?id='.$row->id.'">Udah Data</a>
                            <a class="btn btn-danger" href="'.url('/').'/Hapus?table=data_anggotas&id='.$row->id.'">Hapus Data</a>
                        </div>';
                      return $btn;
                    })
                    ->addColumn('Photo_Profile', function($row){
                      $btn = '<a href="'.url('/').$row->Upload_Foto.'" target="_blank">
                      <img style="width: 120px !important;  height: 150px !important;border-radius: 0% !important;}" src="'.url('/').$row->Upload_Foto.'" class="img-thumbnail" >
                      </a>';
                      return $btn;
                    })
                    ->addColumn('IMG_KTP', function($row){
                      $btn = '
                      <a href="'.url('/').$row->Upload_KTP.'" target="_blank">
                      <img style="    width: 150px !important;  height: 150px !important;border-radius: 0% !important;}" src="'.url('/').$row->Upload_KTP.'" class="img-thumbnail" >
                      </a>';
                      return $btn;
                    })
                    // ->rawColumns(['update', 'nama','pangkat','kesatuan','kotama', 'pinjaman', 'jml_angs', 'jml_tunggakan'])
                    // ->toJson()
                    ->rawColumns(['action','Cetak','IMG_KTP','Photo_Profile'])
                    ->make(true);
        }
        $urlren="$_SERVER[REQUEST_URI]";
        return view('Admin/fbylok',['ren'=>$urlren,'bin'=>$bin]);
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
                            <a class="btn btn-success" href="'.url('/').'/cetak?id='.$row->id.'">Cetak</a>
                            <a class="btn btn-success" href="'.url('/').'/resume?id='.$row->id.'">Lihat Data</a>
                            <a class="btn btn-success" href="'.url('/').'/edit?&id='.$row->id.'">Ubah Data</a>
                            <a class="btn btn-danger" href="'.url('/').'/Hapus?table=data_anggotas&id='.$row->id.'">Hapus Data</a>
                        </div>';
                      return $btn;
                    })
                    ->addColumn('Photo_Profile', function($row){
                      $btn = '<a href="'.url('/').$row->Upload_Foto.'" target="_blank">
                      <img style="width: 120px !important;  height: 150px !important;border-radius: 0% !important;}" src="'.url('/').$row->Upload_Foto.'" class="img-thumbnail" >
                      </a>';
                      return $btn;
                    })
                    ->addColumn('IMG_KTP', function($row){
                      $btn = '
                      <a href="'.url('/').$row->Upload_KTP.'" target="_blank">
                      <img style="    width: 150px !important;  height: 150px !important;border-radius: 0% !important;}" src="'.url('/').$row->Upload_KTP.'" class="img-thumbnail" >
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
