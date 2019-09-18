
<style>
    body{
        font-family: arial;
        font-size: 10px;
    }
</style>

<h2 style="text-align: center;">Report Spv Pembiayaan Dana {{date('d-m-Y', strtotime(request()->get('from')))}} - {{date('d-m-Y', strtotime(request()->get('to')))}}</h2>

<table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>

            <th>Name </th>
            <th>Email </th>
            <th>Phone_number</th>
            <th>Photo_profile</th>
            <th>Created At</th>
            <th>Updated At</th>

            
        </tr>
        
    </thead>
    <tbody>
        @foreach ($list_spv_pembiayaan_dana as $spv_pembiayaan_dana)
            
            <tr>
                <td>{{$spv_pembiayaan_dana->name }}</td>
                <td>{{$spv_pembiayaan_dana->email }}</td>
                <td>{{$spv_pembiayaan_dana->phone_number}}</td>
                <td>
                    @if($spv_pembiayaan_dana->photo_profile)
                        <img src="{{asset('uploads/'. $spv_pembiayaan_dana->photo_profile)}}" style="width: 100px;" alt="Dana Syariah Motor">
                    @else
                        -
                    @endif
                    
                </td>
                <td>{{$spv_pembiayaan_dana->created_at}}</td>
                <td>{{$spv_pembiayaan_dana->updated_at}}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>