<dl class="row">

        <dt class="col-sm-4">Sumber Informasi</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->sumber_informasi ? $pengajuan_pembiayaan_dana->sumber_informasi : '-'}}</dd>

        

        {{-- @if($pengajuan_pembiayaan_dana->sumber_informasi == 'Mitra Kami') --}}
            <dt class="col-sm-4">Mitra</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->mitra ? $pengajuan_pembiayaan_dana->mitra->name : '-'}}</dd>
        {{-- @endif --}}

        <div class="col-sm-12"><hr></div>
                            
        {{-- 'wilayah_pembiayaan_dana_id',  --}}
        <dt class="col-sm-4">Wilayah</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana ? $pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->name : '-'}}</dd>

        {{-- 'tempo_angsuran_pembiayaan_dana_id',  --}}
        <dt class="col-sm-4">Tempo Angsuran</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana ? $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana->tempo . ' Bulan' : '-'}}</dd>

        {{-- 'motor_pembiayaan_dana_id',  --}}
        <dt class="col-sm-4">Motor</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->motor_pembiayaan_dana ? $pengajuan_pembiayaan_dana->motor_pembiayaan_dana->name : '-'}}</dd>

        {{-- 'status_stnk_id',  --}}
        <dt class="col-sm-4">Status STNK</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_stnk ? $pengajuan_pembiayaan_dana->status_stnk->name : '-'}}</dd>

        {{-- 'status_bpkb_id',  --}}
        <dt class="col-sm-4">Status BPKB</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_bpkb ? $pengajuan_pembiayaan_dana->status_bpkb->name : '-'}}</dd>

        {{-- 'status_rumah_id',  --}}
        <dt class="col-sm-4">Status Kepemilikan Rumah</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_rumah ? $pengajuan_pembiayaan_dana->status_rumah->name : '-'}}</dd>

        {{-- 'status_pekerjaan',  --}}
        <dt class="col-sm-4">Pekerjaan</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_pekerjaan ? $pengajuan_pembiayaan_dana->status_pekerjaan : '-'}}</dd>

        {{-- 'status_sosial',  --}}
        <dt class="col-sm-4">Status Sosial</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_sosial ? $pengajuan_pembiayaan_dana->status_sosial : '-'}}</dd>

        @if($pengajuan_pembiayaan_dana->status_sosial == 'Menikah')
            {{-- 'persetujuan_pasangan',  --}}
            <dt class="col-sm-4">Persetujuan Pasangan</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->persetujuan_pasangan ? $pengajuan_pembiayaan_dana->persetujuan_pasangan : '-'}}</dd>
        @endif

        @if($pengajuan_pembiayaan_dana->status_sosial == 'Belum Nikah')
            {{-- 'persetujuan_orang_tua',  --}}
            <dt class="col-sm-4">Persetujuan Orang Tua</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->persetujuan_orang_tua ? $pengajuan_pembiayaan_dana->persetujuan_orang_tua : '-'}}</dd>
        @endif

        {{-- 'tahun_motor',  --}}
        <dt class="col-sm-4">Tahun Motor</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->tahun_motor ? $pengajuan_pembiayaan_dana->tahun_motor : '-'}}</dd>

        

        {{-- 'status_kartu_kredit',  --}}
        <dt class="col-sm-4">Memiliki Kartu Kredit</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_kartu_kredit ? $pengajuan_pembiayaan_dana->status_kartu_kredit : '-'}}</dd>

        @if($pengajuan_pembiayaan_dana->status_kartu_kredit == 'ya')
            <dt class="col-sm-4">Status Pembayaran Kartu Kredit</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_pembayaran_kartu_kredit ? $pengajuan_pembiayaan_dana->status_pembayaran_kartu_kredit : '-'}}</dd>
        @endif


        {{-- 'status_pinjaman',  --}}
        <dt class="col-sm-4">Status Pinjaman Bank/Leasing/Koperasi</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_pinjaman ? $pengajuan_pembiayaan_dana->status_pinjaman : '-'}}</dd>

        @if($pengajuan_pembiayaan_dana->status_pinjaman == 'ya')
            {{-- 'nama_penyedia_pinjaman',  --}}
            <dt class="col-sm-4">Nama Penyedia Pinjaman</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->nama_penyedia_pinjaman ? $pengajuan_pembiayaan_dana->nama_penyedia_pinjaman : '-'}}</dd>

            <dt class="col-sm-4">Pernah Menunggak ?</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->status_tunggakan_pinjaman ? $pengajuan_pembiayaan_dana->status_tunggakan_pinjaman : '-'}}</dd>

            <dt class="col-sm-4">Pernah Terlambat Bayar Lebih dari 6 Hari ?</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->pernah_terlambat ? $pengajuan_pembiayaan_dana->pernah_terlambat : '-'}}</dd>
        @endif

        {{-- 'keperluan_pinjaman',  --}}
        <dt class="col-sm-4">Keperluan Pinjaman</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->keperluan_pinjaman ? $pengajuan_pembiayaan_dana->keperluan_pinjaman : '-'}}</dd>

        {{-- 'plafond_pembiayaan_diinginkan',  --}}
        <dt class="col-sm-4">Plafond Pembiayaan yang Diinginkan</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->plafond_pembiayaan_diinginkan ? 'Rp. '. number_format($pengajuan_pembiayaan_dana->plafond_pembiayaan_diinginkan, 0, ',', '.') : '-'}}</dd>
        
        {{-- 'tempo_angsuran_pembiayaan_dana_id',  --}}
        <dt class="col-sm-4">Tempo Angsuran yg di inginkan</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana ? $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana->tempo .' Bulan' : '-'}}</dd>
        

        {{-- 'bersedia_disurvey',  --}}
        <dt class="col-sm-4">Bersedia Disurvey</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->bersedia_disurvey ? $pengajuan_pembiayaan_dana->bersedia_disurvey : '-'}}</dd>

        @if($pengajuan_pembiayaan_dana->bersedia_disurvey == 'tidak')
            {{-- 'alasan_tidak_bersedia_disurvey',  --}}
            <dt class="col-sm-4">Alasan Tidak Bersedia Disurvey</dt>
            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->alasan_tidak_bersedia_disurvey ? $pengajuan_pembiayaan_dana->alasan_tidak_bersedia_disurvey : '-'}}</dd>
        @endif

        <div class="col-sm-12"><hr></div>
        
        {{-- 'cs_pembiayaan_dana_id',  --}}
        <dt class="col-sm-4">CS</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->cs_pembiayaan_dana ? $pengajuan_pembiayaan_dana->cs_pembiayaan_dana->name : '-'}}</dd>

        {{-- 'cs_pembiayaan_dana_status',  --}}
        <dt class="col-sm-4">CS Status</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status : '-'}}</dd>

        

        {{-- 'cs_pembiayaan_dana_note',  --}}
        <dt class="col-sm-4">CS Note</dt>
        <dd class="col-sm-8">{!!$pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note ? '<span class="text-danger">'. $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note .'</span>' : '-'!!}</dd>

        @if($pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status == 'denied')
            {{-- 'cs_pembiayaan_dana_status',  --}}
            <dt class="col-sm-4">Note for User</dt>
            <dd class="col-sm-8 text-danger">{{$pengajuan_pembiayaan_dana->user_note ? $pengajuan_pembiayaan_dana->user_note : '-'}}</dd>
        @endif

        <div class="col-sm-12"><hr></div>

        {{-- 'spv_pembiayaan_dana_id',  --}}
        <dt class="col-sm-4">SPV</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->spv_pembiayaan_dana ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana->name : '-'}}</dd>

        {{-- 'spv_pembiayaan_dana_status',  --}}
        <dt class="col-sm-4">SPV Status</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status : '-'}}</dd>

        @if($pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status == 'denied')
            {{-- 'cs_pembiayaan_dana_status',  --}}
            <dt class="col-sm-4">Note for User</dt>
            <dd class="col-sm-8 text-danger">{{$pengajuan_pembiayaan_dana->user_note ? $pengajuan_pembiayaan_dana->user_note : '-'}}</dd>
        @endif


        {{-- 'spv_pembiayaan_dana_note',  --}}
        <dt class="col-sm-4">SPV Note</dt>
        <dd class="col-sm-8">{!!$pengajuan_pembiayaan_dana->spv_pembiayaan_dana_note ? '<span class="text-danger">'. $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_note .'</span>' : '-'!!}</dd>

        <div class="col-sm-12"><hr></div>

        {{-- 'manager_pembiayaan_dana_id',  --}}
        {{-- 'plafond_pembiayaan_diinginkan',  --}}
        {{-- 'plafond_pembiayaan_disetujui',  --}}
        {{-- 'tempo_angsuran_pembiayaan_dana_id_disetujui',  --}}
        {{-- 'angsuran',  --}}

        {{-- 'image_ktp',  --}}
        <dt class="col-sm-4">Image KTP</dt>
        <dd class="col-sm-8">
            {!!$pengajuan_pembiayaan_dana->image_ktp ? '<p><a data-lightbox="image_ktp" data-title="Image KTP" href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_ktp) .'"><img style="width: 100px;" src="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_ktp) .'" /></a></p><p><a href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_ktp) .'" download=""><i class="fa fa-download"></i> Download</a></p>' : '-'!!}
        </dd> 

        {{-- 'image_kk',  --}}
        {{-- <dt class="col-sm-4">Image KK</dt>
        <dd class="col-sm-8">
            {!!$pengajuan_pembiayaan_dana->image_kk ? '<p><a data-lightbox="image_kk" data-title="Image KK" href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_kk) .'"><img style="width: 100px;" src="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_kk) .'" /></a></p><p><a href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_kk) .'" download=""><i class="fa fa-download"></i> Download</a></p>' : '-'!!}
        </dd>  --}}

        {{-- 'image_stnk',  --}}
        <dt class="col-sm-4">Image STNK</dt>
        <dd class="col-sm-8">
            {!!$pengajuan_pembiayaan_dana->image_stnk ? '<p><a data-lightbox="image_stnk" data-title="Image STNK" href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_stnk) .'"><img style="width: 100px;" src="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_stnk) .'" /></a></p><p><a href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_stnk) .'" download=""><i class="fa fa-download"></i> Download</a></p>' : '-'!!}
        </dd> 

        {{-- 'image_bpkb',  --}}
        <dt class="col-sm-4">Image BPKB</dt>
        <dd class="col-sm-8">
            {!!$pengajuan_pembiayaan_dana->image_bpkb ? '<p><a data-lightbox="image_bpkb" data-title="Image BPKB" href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_bpkb) .'"><img style="width: 100px;" src="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_bpkb) .'" /></a></p><p><a href="'. asset('uploads/'. $pengajuan_pembiayaan_dana->image_bpkb) .'" download=""><i class="fa fa-download"></i> Download</a></p>' : '-'!!}
        </dd> 

        <div class="col-sm-12"><hr></div>

        <dt class="col-sm-4">Akad atas nama</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->akad_atas_nama ? $pengajuan_pembiayaan_dana->akad_atas_nama : '-'}}</dd>

        <dt class="col-sm-4">Tanggal Go Live</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->tanggal_go_live ? $pengajuan_pembiayaan_dana->tanggal_go_live : '-'}}</dd>

        <div class="col-sm-12"><hr></div>

        <dt class="col-sm-4">Created at</dt>
        <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->created_at ? $pengajuan_pembiayaan_dana->created_at : '-'}}</dd>

        
    </dl>