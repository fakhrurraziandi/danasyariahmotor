
<style>
    body{
        font-family: arial;
        font-size: 10px;
    }
</style>

<h2 style="text-align: center;">Report Pengajuan Pembiayaan Dana {{date('d-m-Y', strtotime(request()->get('from')))}} - {{date('d-m-Y', strtotime(request()->get('to')))}}</h2>

<table style="width: 100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Tanggal Incoming</th>
            <th>Mitra DSM</th>
            <th>Cabang BAF</th>
            <th>Nama User</th>
            <th>Alamat User</th>
            <th>No GSM</th>
            <th>No WA</th>
            <th>Tipe Motor</th>
            <th>Tahun Motor</th>
            <th>Status STNK</th>
            <th>Status BPKB</th>
            <th>CS</th>
            <th>CS Status</th>
            <th>CS Note</th>
            <th>MH</th>
            <th>AMM</th>
            <th>MH Status</th>
            <th>MH Note</th>
            <th>Tanggal GO Live</th>
            <th>Pencairan</th>
            <th>Tenor Angsuran</th>
            <th>Angsuran Perbulan</th>
            <th>AKAD A/N</th>
        </tr>
        
    </thead>
    <tbody>
        @foreach ($pengajuan_pembiayaan_dana as $p)
            
        <tr>


            {{-- 'wilayah_pembiayaan_dana_id',  --}}
            {{-- <td>{{$pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana ? $pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->name : '-'}}</td> --}}
            <td>{{$p->created_at}}</td>
            <td>{{$p->mitra ? $p->mitra->name : '-'}}</td>
            <td>{{$p->wilayah_pembiayaan_dana ? $p->wilayah_pembiayaan_dana->name : ''}}</td>
            <td>{{$p->user->name}}</td>
            <td>{{$p->user->alamat . ' '. ($p->user->district ? $p->user->district->name : '')}}</td>
            <td>{{$p->user->no_handphone_1}}</td>
            <td>{{$p->user->no_handphone_2}}</td> 
            <td>{{$p->motor_pembiayaan_dana ? $p->motor_pembiayaan_dana->name : ''}}</td>
            <td>{{$p->tahun_motor}}</td>
            <td>{{$p->status_stnk ? $p->status_stnk->name : ''}}</td>
            <td>{{$p->status_bpkb ? $p->status_bpkb->name : ''}}</td>
            <td>{{$p->cs_pembiayaan_dana ? $p->cs_pembiayaan_dana->name : ''}}</td>
            <td>{{$p->cs_pembiayaan_dana_status}}</td>
            <td>{{$p->cs_pembiayaan_dana_note}}</td>
            <td>{{$p->spv_pembiayaan_dana ? $p->spv_pembiayaan_dana->name : ''}}</td>
            <td>{{$p->manager_pembiayaan_dana ? $p->manager_pembiayaan_dana->name : ''}}</td>
            <td>{{$p->spv_pembiayaan_dana_status}}</td>
            <td>{{$p->spv_pembiayaan_dana_note}}</td>
            <td>{{$p->tanggal_go_live}}</td>
            <td>{{$p->plafond_pembiayaan_disetujui ? 'Rp. '. number_format($p->plafond_pembiayaan_disetujui, 0, ',', '.') : ''}}</td>
            <td>{{$p->tempo_angsuran_pembiayaan_dana ? $p->tempo_angsuran_pembiayaan_dana->tempo . ' Bulan' : ''}}</td>
            <td>{{$p->angsuran ? 'Rp. '. number_format($p->angsuran, 0, ',', '.') : ''}}</td>
            <td>{{$p->akad_atas_nama}}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>