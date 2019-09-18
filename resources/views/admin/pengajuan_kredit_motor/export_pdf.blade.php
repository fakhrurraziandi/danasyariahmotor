
<style>
    body{
        font-family: arial;
        font-size: 10px;
    }
</style>

<h2 style="text-align: center;">Report Pengajuan Kredit Motor {{date('d-m-Y', strtotime(request()->get('from')))}} - {{date('d-m-Y', strtotime(request()->get('to')))}}</h2>

<table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Wilayah</th>
            <th>Motor</th>
            <th>DP</th>
            <th>Angsuran x Bulan</th>
            <th>CS Kredit Motor</th>
            <th>CS Kredit Motor Status</th>

            <th>SPV Kredit Motor</th>
            <th>SPV Kredit Motor Status</th>

            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengajuan_kredit_motor as $p)
            
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->user->name}}</td>
            <td>{{$p->wilayah_kredit_motor->name}}</td>

            
            
            <td>{{$p->angsuran_motor->motor->name}}</td>

            
            <td>{{'Rp. '. number_format($p->angsuran_motor->dp, 0, ',', '.')}}</td>
            <td>{{'Rp. '. number_format($p->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $p->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'}}</td>

            
            <td>{{$p->cs_pembiayaan_dana ? $p->cs_pembiayaan_dana->name : '-'}}</td>
            <td>{{$p->cs_pembiayaan_dana_status ? $p->cs_pembiayaan_dana_status : '-'}}</td>
            <td>{{$p->spv_pembiayaan_dana ? $p->spv_pembiayaan_dana->name : '-'}}</td>
            <td>{{$p->spv_pembiayaan_dana_status ? $p->spv_pembiayaan_dana_status : '-'}}</td>

            <td>{{$p->created_at}}</td>
            <td>{{$p->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>