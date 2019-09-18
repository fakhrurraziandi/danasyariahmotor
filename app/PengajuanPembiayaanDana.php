<?php

namespace App;

use App\User;
use App\StatusBpkb;
use App\StatusStnk;
use App\StatusRumah;
use App\WithdrawCart;
use App\CsKreditMotor;
use App\WithdrawDetail;
use App\CsPembiayaanDana;
use App\SpvPembiayaanDana;
use App\MotorPembiayaanDana;
use Sofa\Eloquence\Eloquence;
use App\ManagerPembiayaanDana;
use App\WilayahPembiayaanDana;
use App\TempoAngsuranPembiayaanDana;
use Illuminate\Database\Eloquent\Model;

class PengajuanPembiayaanDana extends Model
{
	use Eloquence;

    protected $table = 'pengajuan_pembiayaan_dana';
    protected $fillable = [
		

		
		'user_id', 
		'sumber_informasi',
		'mitra_id',
		'mitra_profit',
		'mitra_profit_withdraw_status',
		'wilayah_pembiayaan_dana_id', 
		'tempo_angsuran_pembiayaan_dana_id', 
		'motor_pembiayaan_dana_id', 
		'status_stnk_id', 
		'status_bpkb_id', 
		'status_rumah_id', 
		'tahun_motor', 
		'status_keberadaan_bpkb', 
		'leasing_koperasi__sisa_tempo_angsuran', 
		'leasing_koperasi__nilai_angsuran', 
		'leasing_koperasi__status_pembayaran_angsuran', 
		'leasing_koperasi__total_keterlambatan', 
		'status_kartu_kredit', 
		'status_pembayaran_kartu_kredit', 
		'status_pinjaman', 
		'nama_penyedia_pinjaman', 
		'status_tunggakan_pinjaman', 
		'pernah_terlambat', 
		'keperluan_pinjaman', 
		'status_pekerjaan', 
		'status_sosial', 
		'persetujuan_pasangan', 
		'persetujuan_orang_tua', 
		'bersedia_disurvey', 
		'alasan_tidak_bersedia_disurvey', 
		'cs_pembiayaan_dana_id', 
		'cs_pembiayaan_dana_status', 
		'cs_pembiayaan_dana_note', 
		'spv_pembiayaan_dana_id', 
		'spv_pembiayaan_dana_status', 
		'spv_pembiayaan_dana_note', 
		'manager_pembiayaan_dana_id', 
		'plafond_pembiayaan_diinginkan', 
		'plafond_pembiayaan_disetujui', 
		'tempo_angsuran_pembiayaan_dana_id_disetujui', 
		'angsuran', 
		'image_ktp', 
		'image_kk', 
		'image_stnk', 
		'image_bpkb', 
		'akad_atas_nama',
		'tanggal_go_live' 

		// tempo_angsuran_pembiayaan_dana_id_disetujui
    ];

    protected $searchableColumns = [
		'user_id', 
		'sumber_informasi',
		'mitra_id',
		'mitra_profit',
		'mitra_profit_withdraw_status',
		'wilayah_pembiayaan_dana_id', 
		'tempo_angsuran_pembiayaan_dana_id', 
		'motor_pembiayaan_dana_id', 
		'status_stnk_id', 
		'status_bpkb_id', 
		'status_rumah_id', 
		'tahun_motor', 
		'status_keberadaan_bpkb', 
		'leasing_koperasi__sisa_tempo_angsuran', 
		'leasing_koperasi__nilai_angsuran', 
		'leasing_koperasi__status_pembayaran_angsuran', 
		'leasing_koperasi__total_keterlambatan', 
		'status_kartu_kredit', 
		'status_pembayaran_kartu_kredit', 
		'status_pinjaman', 
		'nama_penyedia_pinjaman', 
		'status_tunggakan_pinjaman', 
		'pernah_terlambat', 
		'keperluan_pinjaman', 
		'status_pekerjaan', 
		'status_sosial', 
		'persetujuan_pasangan', 
		'persetujuan_orang_tua', 
		'bersedia_disurvey', 
		'alasan_tidak_bersedia_disurvey', 
		'cs_pembiayaan_dana_id', 
		'cs_pembiayaan_dana_status', 
		'cs_pembiayaan_dana_note', 
		'spv_pembiayaan_dana_id', 
		'spv_pembiayaan_dana_status', 
		'spv_pembiayaan_dana_note', 
		'manager_pembiayaan_dana_id', 
		'plafond_pembiayaan_diinginkan', 
		'plafond_pembiayaan_disetujui', 
		'tempo_angsuran_pembiayaan_dana_id_disetujui', 
		'angsuran', 
		'image_ktp', 
		'image_kk', 
		'image_stnk', 
		'image_bpkb', 
		'akad_atas_nama',
		'tanggal_go_live',
		'user_note'
	];

	public $with = [
		'wilayah_pembiayaan_dana',
		'tempo_angsuran_pembiayaan_dana',
		'tempo_angsuran_pembiayaan_dana_disetujui',
		'motor_pembiayaan_dana',
		'status_stnk',
		'status_bpkb',
		'status_rumah',
		'user',
		'mitra',
		'cs_pembiayaan_dana',
		'spv_pembiayaan_dana',
		'manager_pembiayaan_dana'
	];

	public $appends = ['status','already_withdraw'];

	public function getAlreadyWithdrawAttribute()
	{
		$withdraw_detail_count = WithdrawDetail::where([
			['pengajuan_pembiayaan_dana_id', '=', $this->id]
		])->count();

		if($withdraw_detail_count > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getStatusAttribute()
	{
		if($this->cs_pembiayaan_dana_status == 'denied'){
			return 'Denied';
		}else if($this->cs_pembiayaan_dana_status == 'approved'){
			if($this->spv_pembiayaan_dana_status == 'denied'){
				return 'Denied';
			}else if($this->spv_pembiayaan_dana_status == 'approved'){
				return 'Approved';
			}else{
				return 'Pending';
			}
		}else{
			return 'Pending';
		}
	}
	
	public function wilayah_pembiayaan_dana()
	{
		return $this->belongsTo(WilayahPembiayaanDana::class, 'wilayah_pembiayaan_dana_id', 'id');
	}
	public function tempo_angsuran_pembiayaan_dana()
	{
		return $this->belongsTo(TempoAngsuranPembiayaanDana::class, 'tempo_angsuran_pembiayaan_dana_id', 'id');
	}

	public function tempo_angsuran_pembiayaan_dana_disetujui()
	{
		return $this->belongsTo(TempoAngsuranPembiayaanDana::class, 'tempo_angsuran_pembiayaan_dana_id_disetujui', 'id');
	}
	public function motor_pembiayaan_dana()
	{
		return $this->belongsTo(MotorPembiayaanDana::class, 'motor_pembiayaan_dana_id', 'id');
	}

	public function status_stnk()
	{
		return $this->belongsTo(StatusStnk::class, 'status_stnk_id', 'id');
	}
	public function status_bpkb()
	{
		return $this->belongsTo(StatusBpkb::class, 'status_bpkb_id', 'id');
	}
	public function status_rumah()
	{
		return $this->belongsTo(StatusRumah::class, 'status_rumah_id', 'id');
	}

	public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id', 'id');
    }

	// public function tahun_motor($id){
	// 	$b=$this->find($id);
	// 	return $b->tahun_motor;
	// }
    public function cs_pembiayaan_dana()
    {
        return $this->belongsTo(CsPembiayaanDana::class, 'cs_pembiayaan_dana_id', 'id');
    }

    public function spv_pembiayaan_dana()
    {
        return $this->belongsTo(SpvPembiayaanDana::class, 'spv_pembiayaan_dana_id', 'id');
	}
	
	public function manager_pembiayaan_dana()
    {
        return $this->belongsTo(ManagerPembiayaanDana::class, 'manager_pembiayaan_dana_id', 'id');
	}
	
	public function withdraw_detail()
	{
		return $this->hasOne(WithdrawDetail::class, 'pengajuan_pembiayaan_dana_id', 'id');
	}

	public function withdraw_cart()
	{
		return $this->hasOne(WithdrawCart::class, 'pengajuan_pembiayaan_dana_id', 'id');
	}
	
}
