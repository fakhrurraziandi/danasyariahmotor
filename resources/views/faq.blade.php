@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__kontak_kami') . ' | '.
\App\ContentVariable::getValue('website_title'))

@section('content')

<?php  
$faq = [
    [
        "q" => "Apa itu Pembiayaan Dana Syariah?",
        "a" => "Adalah fasilitas pembiayaan yang di miliki oleh BAF Syana yang bekerja sama dengan DSM ( Dana Syariah Motor), yang memanfaatkan sepeda motor yang sudah di miliki oleh konsumen untuk memenuhui berbagai macam kebutuhan dengan menggunakan prinsip syariah, jadi skema yang digunakan adalah skema jual dan sewa balik, konsumen menjual sepeda motor ke BAF Syana kemudian BAF Syana membayar sejumlah uang atas penjualan sepeda motor tersebut kepada konsumen dan kemudian BAF Syana menyewakan kembali sepeda motor itu kepada konsumen yang sama dan konsumen setiap bulan akan membayar uang sewa atas penggunaan sepeda motor itu selama jangka waktu yang sudah di sepekati, ketika jangka waktu sudah berakhir atau konsumen sudah membayar seluruh uang sewa selama masa sewa itu maka sepada motor tersebut akan di hibahkan kepada konsumen beserta seluruh bukti kepemilikannya",
    ],
    [
        "q" => "Kenapa gunakan Akad Syariah? ",
        "a" => "Karena OJK mengatur bahwa Bahwa BAF Syana boleh membiayai fasilitas Dana Syariah ini hanya bisa di lakukan dengan menggunakan prinsip syariah.",
    ],
    [
        "q" => "Seperti apa Akad Syariah yang digunakan?",
        "a" => "Menggunakan akad Ba'i Wal IMBT, jadi ada dua akad didalamnya, yang pertama itu adalah akan Ba'i. Akad Ba'i itu digunakan pada saat terjadi konsumen menjual unitnya ke BAF Syana. Akad Kedua adalah akad IMBT atau Ijarah Munttaiyah Bit Tamlik, akad ini digunakan pada saat BAF Syana membayar uang penjualan kepada konsumen kemudian konsumen membayar sewa setiap bulan kepada BAF Syana. Setelah akhir masa selesai sewa BAF Syana menghibahkan motor tersebut kepada konsumen.",
    ],
    [
        "q" => "Siapa yang bisa memanfaatkan fasilitas Dana Syariah?",
        "a" => "BAF Syana ini bisa di manfaatkan oleh siapa saja, oleh seluruh masyarakat diseluruh indonesia yang memiliki sepeda motor mempunyai Kesempatan untuk mengajukan Fasilitas Dana Syariah Melalui DSM. ",
    ],
    [
        "q" => "Kebutuhan apa saja yang bisa difasilitasi Dana Syariah?",
        "a" => "Berbagai macam kebutuhan bisa di biayai oleh Dana Syariah, mau kebutuhan yang sifatnya mendesak misalnya atau kebutuhan yang terencana yang produktif bisa memanfaatkan pembiayaan dana syariah. untuk modal usaha, untuk biaya sekolah anak, biaya renovasi, travelling dll. "
    ],
    [
        "q" => "Perhitungan denda keterlambatan konsumen Dana Syariah apakah sistemnya sama dengan pembiayaan konvesional?",
        "a" => "tidak sama, setiap ada keterlambatan diwajibkan membayar uang ganti kerugian, karena setiap keterlambatan konsumen membayar angsuran sewa pasti akan menimbulkan beberapa kerugian untuk BAF Syana, seperti membayar tenaga manpower untuk melakukan kunjungan kepada konsumen, dll. Jadi sifatnya menggantikan biaya operasional."
    ],
    [
        "q" => "Apakah Dana Syariah ini ada diseluruh Indonesia?",
        "a" => "Kami hadir di seluruh Pelosok Nusantara Indonesia. " 
    ],
    [
        "q" => "Berapa lama Pengajuan akan di Setujui ?",
        "a" => "Semua tergantung dari dokumen penunjang seperti KTP - KK - BKPB- STNK dan surat penghasilan atau bukti penghasilannya. dan juga tergantung Kondisi Motor Konsumen. Bisa nya apabila semua dokumen dan motor tidak ada masalah dana akan cair 1 hari setelah di survey. "
    ],

    [
        "q" => "Apakah ada BI Checking?",
        "a" => "kami tidak menggunakan BI Checking",
    ],

    [
        "q" => "Bagaimana Proses Pencairannya? ",
        "a" => "Ketika BAF Syana Mensetujui Pengajuan konsumen maka dana akan cair kepada konsumen bisa dengan Sistem transfer atau datang ke cabang BAF Syana sesuai domisili Konsumen dan BAF Syana Menerima BPKB Sepeda Motor. ",
    ],

    [
        "q" => "Kenapa harus Mengajukannya di DSM?",
        "a" => "Karena Kami Merupakan Partner Bisnis dari BAF Syana dan sudah pastinya semua Aplikasi lewat Online akan jauh Lebih cepat dan Mudah. ",
    ],

    [
        "q" => "Motor masih Kredit apakah bisa diproses?",
        "a" => "Bisa, Minimal sisa Angsuran tinggal 6 Bulan. ",
    ],

    [
        "q" => "STNK mati pajak apakah bisa di proses?",
        "a" => "Bisa, Maksimal STNK mati tidak lebih dari 4 thn dengan kondisi atas nama sendiri/pasangan. ",
    ],

    [
        "q" => "Merk Motor apa saja yg bisa di proses?",
        "a" => "Semua jenis motor terutama Merk YAMAHA - HONDA - KAWASAKI Dan SUZUKI",
    ],

    [
        "q" => "Motor Tahun Berapa yang bisa di proses?",
        "a" => "Minimal 10 tahun dari tahun sekarang. ",
    ],

    [
        "q" => "Apakah Dana pembiayaan Syariah ini ada potongan biaya?",
        "a" => "Tidak, konsumen akan terima bersih sesuai nilai Motornya. ",
    ],

    [
        "q" => "OK Saya Berminat, Bagaimana Cara Pengajuannya? ",
        "a" => "Pertama Konsumen wajib Register terlebih dahulu isi semua data yang dibutuhkan untuk proses pengajuan, setelah selesai register akan muncul halaman berhasil register lalu klik menu Pengajuan dana kemudian konsumen akad di arahkan ke halaman Ajukan pinjaman, paling bawah halaman tersebut konsumen bisa isi form pengajuan pinjaman Dana Syariah setelah selesai klik Ajukan Pinjaman. Data yang masuk akan segera di proses oleh customer support DSM dan akan segera di follow up. Setelah di setujui Oleh Staf DSM maka data konsumen akan di ajukan ke cabang sesuai domisili konsumen untuk segera di proses oleh pihak surveyor BAF Syana ( Pastikan No GSM dan Whastapp-nya Aktif) dan disiapkan semua dokumen saat surveyor survey kerumah konsumen , ketika disetujui maka dana akan cair ke konsumen. ",
    ],
]
?>


<section class="py-100" id="section-form" style="background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>FAQ</h1>
                <p class="lead">Pertanyaan Seputar Pinjaman Dana Syariah</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="accordion" id="accordionExample">

                    @foreach(App\Faq::all() as $index => $data)
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-header bg-white" id="heading-{{$index}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link px-0 text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse-{{$index}}" aria-expanded="true" aria-controls="collapse-{{$index}}">
                                            <strong>{!!$data["question"]!!}</strong>
                                    </button>
                                    
                                </h2>
                            </div>

                            <div id="collapse-{{$index}}" class="collapse" aria-labelledby="heading-{{$index}}"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    {!!$data["answer"]!!}
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</section>





@endsection

@section('scripts')
<script>
    $(function(){

            function number_format (number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            onChangeMotorIdHandler();

            function onChangeMotorIdHandler(){

                var json_angsuran_motor = $('#motor_id').find('option:selected').data('json_angsuran_motor');

                console.log(json_angsuran_motor);

                if(json_angsuran_motor){
                    
                    $('#angsuran_motor_id').find('option').remove();
                    $('#angsuran_motor_id').append('<option value="">:: Pilih Uang Muka ::</option>');

                    $('#angsuran_motor_detail_id').find('option').remove();
                    $('#angsuran_motor_detail_id').append('<option value="">:: Pilih Jangka Waktu ::</option>');

                    json_angsuran_motor.forEach(function(angsuran_motor){
                        $('#angsuran_motor_id').append('<option data-json_angsuran_motor_detail=\''+ JSON.stringify(angsuran_motor.angsuran_motor_detail) +'\' value="'+ angsuran_motor.id +'">Rp. '+ number_format(angsuran_motor.dp, 0, ',', '.') +'</option>');
                    });
                }
                    

                onChangeAngsuranMotorIdhandler();
            }

            function onChangeAngsuranMotorIdhandler(){
                var json_angsuran_motor_detail = $('#angsuran_motor_id').find('option:selected').data('json_angsuran_motor_detail');

                console.log(json_angsuran_motor_detail);

                if(json_angsuran_motor_detail){
                    $('#angsuran_motor_detail_id').find('option').remove();
                    $('#angsuran_motor_detail_id').append('<option value="">:: Pilih Jangka Waktu ::</option>');
                    json_angsuran_motor_detail.forEach(function(angsuran_motor_detail){
                        $('#angsuran_motor_detail_id').append('<option value="'+ angsuran_motor_detail.id +'">'+ angsuran_motor_detail.tempo_angsuran_motor.tempo +' Bulan x Rp. '+ number_format(angsuran_motor_detail.angsuran_per_bulan, 0, ',', '.') +'</option>');
                    });
                }

                    
            }

            $('#motor_id').on('change', onChangeMotorIdHandler);

            

            $('#angsuran_motor_id').on('change', onChangeAngsuranMotorIdhandler);


        });
</script>
@endsection