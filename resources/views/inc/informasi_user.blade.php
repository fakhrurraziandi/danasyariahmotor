<dl class="row">
    <dt class="col-sm-4">Nama Lengkap Sesuai KTP</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->name}}</dd>

    <dt class="col-sm-4">Email</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->email}}</dd>

    <dt class="col-sm-4">No Handphone GSM</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->no_handphone_1}}</dd>

    <dt class="col-sm-4">No Whatsapp</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->no_handphone_2 ? $pengajuan_pembiayaan_dana->user->no_handphone_2 : '-'}}</dd>

    <dt class="col-sm-4">Jenis Identitas</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->jenis_identitas ? $pengajuan_pembiayaan_dana->user->jenis_identitas : '-'}}</dd>

    <dt class="col-sm-4">No Identitas</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->no_identitas ? $pengajuan_pembiayaan_dana->user->no_identitas : '-'}}</dd>

    <dt class="col-sm-4">Tempat Lahir</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->tempat_lahir ? $pengajuan_pembiayaan_dana->user->tempat_lahir : '-'}}</dd>

    <dt class="col-sm-4">Tanggal Lahir</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->tanggal_lahir ? $pengajuan_pembiayaan_dana->user->tanggal_lahir : '-'}}</dd>

    <dt class="col-sm-4">Provinsi</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->province ? $pengajuan_pembiayaan_dana->user->province->name : '-'}}</dd>

    <dt class="col-sm-4">Kota</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->city ? $pengajuan_pembiayaan_dana->user->city->name : '-'}}</dd>

    <dt class="col-sm-4">Kecamatan</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->district ? $pengajuan_pembiayaan_dana->user->district->name : '-'}}</dd>

    <dt class="col-sm-4">Alamat</dt>
    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->alamat ? $pengajuan_pembiayaan_dana->user->alamat : '-'}}</dd>

    
</dl>