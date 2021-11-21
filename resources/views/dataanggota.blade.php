<!DOCTYPE html>

<html>

<head>

    <title>Laravel 8 Datatables Tutorial - ItSolutionStuff.com</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

</body>

   

<script type="text/javascript">

  $(function () {

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('anggota.index') }}",

        columns: [

            {data: 'action', name: 'action', orderable: false, searchable: false},

            {data: 'Cetak', name: 'Cetak', orderable: false, searchable: false},

            // {data: 'id', name: 'id'},

            {data: 'nama', name: 'nama'},

			{data: 'NIK', name: 'NIK'},

            {data: 'jenis_kelamin', name: 'jenis_kelamin'},

            {data: 'Alamat', name: 'Alamat'},

			{data: 'Provinsi', name: 'Provinsi'},

            {data: 'Kabupaten', name: 'Kabupaten'},
			
			{data: 'Kecamatan', name: 'Kecamatan'},
			
			{data: 'Kelurahan', name: 'Kelurahan'},
			
			{data: 'RT', name: 'RT'},

			{data: 'RW', name: 'RW'},
			
			{data: 'No_Hape', name: 'No_Hape'},
			
			{data: 'Rekomendasi', name: 'Rekomendasi'},

			{data: 'email', name: 'email'},
			// {data: 'no_keanggotaan"', name: 'no_keanggotaan"'},

        ]

    });

    

  });
</script>

</html>