<?php



namespace App;

use App\Wilayah;
use Sofa\Eloquence\Eloquence;
use App\PengajuanPembiayaanDana;
use Illuminate\Support\Facades\URL;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

require_once '../BitlyPHP-master/bitly.php';

class User extends Authenticatable
{
    use Notifiable;
    use Eloquence;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
 
        'name', 
        'email', 
        'email_verified_at', 
        'password', 
        'remember_token', 
        'sumber_informasi', 
        'no_handphone_1', 
        'no_handphone_2', 
        'jenis_identitas', 
        'no_identitas', 
        'alamat', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'province_id', 
        'city_id', 
        'district_id', 
        'village_id', 
        'userId', 
        'mitra_status', 
        'upline_mitra_id', 
        'pekerjaan', 
        'spesifikasi_perangkat_komputer', 
        'software_marketing_digital', 
        'alamat_website', 
        'bersedia_dipasang_widget', 
        'target_income_pasif_sebagai_mitra', 
        'nama_facebook', 
        'nama_bank', 
        'no_rekening_bank', 
        'photo', 
        'mitra_code', 
        'ref_code', 
    ];

    protected $searchableColumns = [
        'name', 
        'email', 
        'email_verified_at', 
        'password', 
        'remember_token', 
        'sumber_informasi', 
        'no_handphone_1', 
        'no_handphone_2', 
        'jenis_identitas', 
        'no_identitas', 
        'alamat', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'province_id', 
        'city_id', 
        'district_id', 
        'village_id', 
        'userId', 
        'mitra_status', 
        'upline_mitra_id', 
        'pekerjaan', 
        'spesifikasi_perangkat_komputer', 
        'software_marketing_digital', 
        'alamat_website', 
        'bersedia_dipasang_widget', 
        'target_income_pasif_sebagai_mitra', 
        'nama_facebook', 
        'nama_bank', 
        'no_rekening_bank', 
        'photo', 
        'mitra_code', 
        'ref_code', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $with = [
        'province',
        'city',
        'district'  
    ];

    protected $appends = ['url_pengajuan_mitra', 'url_photo', 'link_ref'];

    

    public function getLinkRefAttribute()
    {
        if($this->mitra_code){
            return $url = route('akad-kredit', ['mitra_code' => $this->mitra_code]);

            
            
        }else{
            return null;
        }
    }

    public function getUrlPhotoAttribute()
    {
        if($this->photo){
            return URL::to('/uploads/'. $this->photo);
        }else{
            return URL::to('/uploads/no_image.png');
        }
    }

    public function getUrlPengajuanMitraAttribute()
    {
        if($this->mitra_code){
            return route('akad-kredit').'/'. $this->mitra_code;
        }else{
            return null;
        }
        
    }


    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function downline()
    {
        
    }

    public function pengajuan_pembiayaan_dana_mitra()
    {
        return $this->hasMany(PengajuanPembiayaanDana::class, 'mitra_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id', 'id');
    }

    public function pengajuan_pembiayaan_dana()
    {
        return $this->hasMany(PengajuanPembiayaanDana::class, 'user_id', 'id');
    }
    

    
    
}
