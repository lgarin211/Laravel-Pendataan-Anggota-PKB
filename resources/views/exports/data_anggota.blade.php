<table>
    <thead>
    <tr></tr>
    <tr></tr>
    <tr>
        <th><b>DATA ... </b></th>
        <th></th>
        <th></th>
        <th></th>
        <th>LOGO</th>
        <th></th>
    </tr>
    <tr><th>DEWAN PENGURUS</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>PENGURUS CABANG</th>
    </tr>
    <tr>
        <th>
            @if (!empty($_GET['Kecamatan']))
                @if ($_GET['Kecamatan']!="")
                    KECATAMAN {{$_GET['Kecamatan']}}  
                @endif
            @endif
        </th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>KOTA TANGGERANG</th>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <th>NAMA</th> 
        <th>NIK</th> 
        {{-- <th>EMAIL</th> --}}
        {{-- <th>jenis_kelamin </th> --}}
        <th>Alamat </th> 
        {{-- <th>Provinsi </th> --}}
        {{-- <th>Kabupaten </th> --}}
        {{-- <th>Kecamatan </th>  --}}
        <th>RT </th> 
        <th>RW </th> 
        <th>Kelurahan </th> 
        <th>NOMOR HP </th>
        {{-- <th>Upload_Foto </th> --}}
        <th>Upload_KTP </th> 
        {{-- <th>Upload_Surat_Pernyataan </th> --}}
        <th>Rekomendasi </th>
        {{-- <th>filelainnya </th> 
        <th>no_keanggotaan </th>
        <th>user_id </th> 
        <th>created_at </th>
        <th>updated_at </th> --}}
    </tr>
    </thead>
    <tbody>
    @foreach($data_anggota as $key=>$item)
        <tr>
        {{-- <td>{{$item->Email}}</td> --}}
        <td>{{$item->nama }}</td> 
        <td>`{{$item->NIK }}</td> 
        {{-- <td>{{$item->email }}</td> --}}
        {{-- <td>{{$item->jenis_kelamin }}</td> --}}
        <td>{{$item->Alamat }}</td> 
        {{-- <td>{{$item->Provinsi }}</td> --}}
        {{-- <td>{{$item->Kabupaten }}</td> --}}
        {{-- <td>{{$item->Kecamatan }}</td>  --}} 
        <td>`{{$item->RT }}</td> 
        <td>`{{$item->RW }}</td> 
        <td>`{{$item->Kelurahan }}</td>
        <td>`{{$item->No_Hape }}</td>
        {{-- <td>{{$item->Upload_Foto}}</td> --}}
        {{--<td><img src="{{public_path('/Template1/assets/images/faces/face1.jpg')}}"></td> --}}
        <td><img src="{{public_path($item->Upload_KTP)}}" style="width: 10px;width: 15px;"></td> 
        <td>`{{$item->Rekomendasi }}</td>
        {{-- <td>{{$item->Upload_Surat_Pernyataan}}</td> --}}
        {{-- <td>{{$item->filelainnya }}</td>  --}}
        {{-- <td>{{$item->no_keanggotaan }}</td> --}}
        {{-- <td>{{$item->user_id }}</td>  --}}
        {{-- <td>{{$item->created_at }}</td> --}}
        {{-- <td>{{$item->updated_at }}</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>
{{-- @dd() --}}

