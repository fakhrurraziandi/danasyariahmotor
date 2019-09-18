
<style>
    body{
        font-family: arial;
        font-size: 10px;
    }
</style>

<h2 style="text-align: center;">Report List Mitra {{date('d-m-Y', strtotime(request()->get('from')))}} - {{date('d-m-Y', strtotime(request()->get('to')))}}</h2>

<table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>

            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>No Handphone 1</th>
            <th>No Handphone 2</th>
            <th>Jenis Identitas</th>
            <th>No Identitas</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Province</th>
            <th>City</th>
            <th>District</th>
            <th>Village</th>
            <th>Nama Bank</th>
            <th>No Rekening Bank</th>
            <th>Link Ref</th>
            <th>Jumlah Pengajuan Customer</th>
            <th>Created At</th>
            <th>Updated At</th>

            
        </tr>
        
    </thead>
    <tbody>
        @foreach ($users as $user)
            
        <tr>


            <th>{{$user->id}}</th>
            <th>{{$user->name}}</th>
            <th>{{$user->email}}</th>
            <th>{{$user->no_handphone_1}}</th>
            <th>{{$user->no_handphone_2}}</th>
            <th>{{$user->jenis_identitas}}</th>
            <th>{{$user->no_identitas}}</th>
            <th>{{$user->alamat}}</th>
            <th>{{$user->tempat_lahir}}</th>
            <th>{{$user->tanggal_lahir}}</th>
            <th>{{$user->province ? $user->province->name : '-'}}</th>
            <th>{{$user->city ? $user->city->name : '-'}}</th>
            <th>{{$user->district ? $user->district->name : '-'}}</th>
            <th>{{$user->village ? $user->village->name : '-'}}</th>
            <th>{{$user->nama_bank}}</th>
            <th>{{$user->no_rekening_bank}}</th>
            <th>{{$user->link_ref}}</th>
            <th>{{$user->pengajuan_pembiayaan_dana_mitra()->count()}}</th>
            <th>{{$user->created_at}}</th>
            <th>{{$user->updated_at}}</th>
            
        </tr>
        @endforeach
    </tbody>
</table>