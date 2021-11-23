<table>
    <thead>

    <tr></tr>
    <tr></tr>
    <tr>
        <th><strong>DATA ... </strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong><img src="{{public_path('PKB/PKB.jpg')}}" style="width:80px"></strong></th>
        <th><strong>PENGURUS CABANG</strong></th>
    </tr>
    <tr><th><strong>DEWAN PENGURUS ...</strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong>PARTAI KEBANGKITA BANGSA</strong></th>
    </tr>
    <tr>
        <th><strong>            
            @if (!empty($pro))
                @foreach ($pro as $key=>$tag)
                    {{$key}} : {{$tag}},
                @endforeach
            @endif
        </strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong></strong></th>
        <th><strong>
            @if (!empty($pro['Kabupaten']))
                @if ($pro['Kabupaten']!="")
                    {{$pro['Kabupaten']}}  
                @endif
            @endif
        </strong></th>
    </tr>

    <tr></tr>
    <tr></tr>
    <tr>
        <th><strong>NAMA</strong></th> 
        <th><strong>NIK</strong></th> 
        {{-- <th><strong>EMAIL</strong></th> --}}
        {{-- <th><strong>jenis_kelamin</strong> </th> --}}
        <th><strong>Alamat</strong> </th> 
        {{-- <th><strong>Provinsi</strong> </th> --}}
        {{-- <th><strong>Kabupaten</strong> </th> --}}
        {{-- <th><strong>Kecamatan</strong> </th>  --}}
        <th><strong>RT</strong> </th> 
        <th><strong>RW</strong> </th> 
        <th><strong>Kelurahan</strong> </th> 
        <th><strong>NOMOR</strong> HP </th>
        {{-- <th><strong>Upload_Foto</strong> </th> --}}
        <th><strong>Upload_KTP</strong> </th> 
        {{-- <th><strong>Upload_Surat_Pernyataan</strong> </th> --}}
        <th><strong>Rekomendasi</strong> </th>
        {{-- <th><strong>filelainnya</strong> </th> 
        <th><strong>no_keanggotaan</strong> </th>
        <th><strong>user_id</strong> </th> 
        <th><strong>created_at</strong> </th>
        <th><strong>updated_at</strong> </th> --}}
    </tr>
    </thead>
    <tbody>
    @foreach($data_anggota as $key=>$item)
        <tr>
        {{-- <td width="100">{{$item->Email}}</td> --}}
        <td width="20">{{$item->nama }}</td> 
        <td width="20">`{{$item->NIK }}</td> 
        {{-- <td width="100">{{$item->email }}</td> --}}
        {{-- <td width="100">{{$item->jenis_kelamin }}</td> --}}
        <td width="30">{{$item->Alamat }}</td> 
        {{-- <td width="100">{{$item->Provinsi }}</td> --}}
        {{-- <td width="100">{{$item->Kabupaten }}</td> --}}
        {{-- <td width="100">{{$item->Kecamatan }}</td>  --}} 
        <td width="10">`{{$item->RT }}</td> 
        <td width="10">`{{$item->RW }}</td> 
        <td width="20">`{{$item->Kelurahan }}</td>
        <td width="20">`{{$item->No_Hape }}</td>
        {{-- <td width="100">{{$item->Upload_Foto}}</td> --}}
        {{--<td width="100"><img src="{{public_path('/Template1/assets/images/faces/face1.jpg')}}"></td> --}}
        <td width="50"><img src="{{public_path($item->Upload_KTP)}}" style="width: 10px;width: 15px;"></td> 
        <td width="20">`{{$item->Rekomendasi }}</td>
        {{-- <td width="100">{{$item->Upload_Surat_Pernyataan}}</td> --}}
        {{-- <td width="100">{{$item->filelainnya }}</td>  --}}
        {{-- <td width="100">{{$item->no_keanggotaan }}</td> --}}
        {{-- <td width="100">{{$item->user_id }}</td>  --}}
        {{-- <td width="100">{{$item->created_at }}</td> --}}
        {{-- <td width="100">{{$item->updated_at }}</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>


{{-- @dd($pro) --}}