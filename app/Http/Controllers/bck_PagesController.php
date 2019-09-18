<?php

namespace App\Http\Controllers;

use App\Role;
use App\Admin;
use App\Motor;
use App\Wilayah;
use App\TypeMotor;
use App\StatusBpkb;
use App\StatusStnk;
use App\WarnaMotor;
use App\StatusRumah;
use App\AngsuranMotor;
use App\CsKreditMotor;
use App\ContactMessage;
use App\KapasitasMesin;
use App\TempoAngsuranMotor;
use App\WilayahKreditMotor;
use App\KategoriSpesifikasi;
use App\MotorPembiayaanDana;
use Illuminate\Http\Request;
use App\PengajuanKreditMotor;
use App\WilayahPembiayaanDana;
use App\AngsuranPembiayaanDana;
use App\PengajuanPembiayaanDana;
use App\TempoAngsuranPembiayaanDana;
use Illuminate\Support\Facades\Auth;
use App\AngsuranPembiayaanDanaDetail;
use App\CsKreditMotorWilayahKreditMotor;
use Illuminate\Support\Facades\Validator;
use App\Rules\PlafondPembiayaanDiInginkan;
use Illuminate\Support\Facades\Notification;


// use App\Notifications\CsKreditMotor\NewPengajuan;

class PagesController extends Controller
{
    public function index()
    {
    	return view('home');
    }

    public function tentangKami()
    {
    	return view('tentang-kami');
    }

    public function akadKredit()
    {
        $list_wilayah_pembiayaan_dana = WilayahPembiayaanDana::all();
        $list_tempo_angsuran_pembiayaan_dana = TempoAngsuranPembiayaanDana::orderBy('tempo')->get();
        $list_motor_pembiayaan_dana = MotorPembiayaanDana::all();
        $list_status_stnk = StatusStnk::all();
        $list_status_bpkb = StatusBpkb::all();
        $list_status_rumah = StatusRumah::all();
		$list_tahun = array();
		for($tahun = date('Y') ;$tahun >= (date('Y') - 10); $tahun--){
			$list_tahun[]=$tahun;
		}
    	return view('akad-kredit', compact(
            'list_wilayah_pembiayaan_dana', 
            'list_tempo_angsuran_pembiayaan_dana', 
            'list_motor_pembiayaan_dana', 
            'list_status_stnk',
            'list_status_bpkb',
            'list_status_rumah',
			'list_tahun'
        ));
    }

    public function get_pencairan_pembiayaan_dana(Request $request)
    {

        // return $request->all();
        $motor_pembiayaan_dana_id   = $request->get('motor_pembiayaan_dana_id');
        $wilayah_pembiayaan_dana_id = $request->get('wilayah_pembiayaan_dana_id');
        $tahun_motor                = $request->get('tahun_motor');
        $status_stnk_id             = $request->get('status_stnk_id');
        $status_bpkb_id             = $request->get('status_bpkb_id');
        $tempo_angsuran_pembiayaan_dana_id        = $request->get('tempo_angsuran_pembiayaan_dana_id');

        

        $angsuran_pembiayaan_dana = AngsuranPembiayaanDana::where([
            ['motor_pembiayaan_dana_id', '=', $motor_pembiayaan_dana_id],
            ['wilayah_pembiayaan_dana_id', '=', $wilayah_pembiayaan_dana_id],
            ['tahun', '=', $tahun_motor],
            ['status_stnk_id', '=', $status_stnk_id],
            ['status_bpkb_id', '=', $status_bpkb_id],
        ])->first();

        $angsuran_pembiayaan_dana_detail = null;

        if($angsuran_pembiayaan_dana){

            $angsuran_pembiayaan_dana_detail = AngsuranPembiayaanDanaDetail::where([
                ['angsuran_pembiayaan_dana_id', '=', $angsuran_pembiayaan_dana->id],
                ['tempo_angsuran_pembiayaan_dana_id', '=', $tempo_angsuran_pembiayaan_dana_id],
            ])->first();

            return [
                'status' => true,
                'data' => [
                    'angsuran_pembiayaan_dana' => $angsuran_pembiayaan_dana,
                    'angsuran_pembiayaan_dana_detail' => $angsuran_pembiayaan_dana_detail
                ]
            ];
        }else{
            return [
                'status' => false,
            ];
        }

        

        // return $angsuran_pembiayaan_dana;
    }

    public function submitAkadKredit(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        

        // return $data;

       // return $data;
        
        // $request->validate([
        //     'wilayah_pembiayaan_dana_id' => 'required',
        //     // 'plafond_pembiayaan' => 'required',
        //     'tempo_angsuran_pembiayaan_dana_id' => 'required',
        //     'motor_pembiayaan_dana_id' => 'required',
        //     'status_stnk_id' => 'required',
        //     'status_bpkb_id' => 'required',
        //     'status_rumah_id' => 'required',
        //     'tahun_motor' => 'required',
		// 	'plafond_pembiayaan_disetujui' => 'required',
        //     'plafond_pembiayaan_diinginkan' => 'required|lte:plafond_pembiayaan_disetujui',
        //     'angsuran' => 'required',
        // ]);

        // $validator = Validator::make($data, [
        //     'wilayah_pembiayaan_dana_id' => 'required',
        //     // 'plafond_pembiayaan' => 'required',
        //     'tempo_angsuran_pembiayaan_dana_id' => 'required',
        //     'motor_pembiayaan_dana_id' => 'required',
        //     'status_stnk_id' => 'required',
        //     'status_bpkb_id' => 'required',
        //     'status_rumah_id' => 'required',
        //     'tahun_motor' => 'required',
        //     'plafond_pembiayaan_diinginkan' => ['required', new PlafondPembiayaanDiInginkan($data)],
        //     'plafond_pembiayaan_disetujui' => 'required',
        //     'angsuran' => 'required',
        // ]);

        $data = [
            'user_id' => $user->id,
            'wilayah_pembiayaan_dana_id' => $request->get('wilayah_pembiayaan_dana_id'),
            // 'plafond_pembiayaan' => str_replace('.', '', $request->get('plafond_pembiayaan')),
            'tempo_angsuran_pembiayaan_dana_id' => $request->get('tempo_angsuran_pembiayaan_dana_id'),
            'motor_pembiayaan_dana_id' => $request->get('motor_pembiayaan_dana_id'),
            'status_stnk_id' => $request->get('status_stnk_id'),
            'status_bpkb_id' => $request->get('status_bpkb_id'),
            'status_rumah_id' => $request->get('status_rumah_id'),
            'tahun_motor' => $request->get('tahun_motor'),
            // 'plafond_pembiayaan_minimal' => (int) str_replace('.', '', $request->get('plafond_pembiayaan_minimal')),
            'plafond_pembiayaan_disetujui' => (int) str_replace('.', '', $request->get('plafond_pembiayaan_diinginkan')),
            'plafond_pembiayaan_diinginkan' => (int) str_replace('.', '', $request->get('plafond_pembiayaan_diinginkan')),
            'angsuran' => str_replace('.', '', $request->get('angsuran')),
        ];
        
        $request = new Request($data);

        $this->validate($request, [
            'wilayah_pembiayaan_dana_id' => 'required',
            // 'plafond_pembiayaan' => 'required',
            'tempo_angsuran_pembiayaan_dana_id' => 'required',
            'motor_pembiayaan_dana_id' => 'required',
            'status_stnk_id' => 'required',
            'status_bpkb_id' => 'required',
            'status_rumah_id' => 'required',
            'tahun_motor' => 'required',
            // 'plafond_pembiayaan_minimal' => 'required',
			// 'plafond_pembiayaan_disetujui' => 'required',
            'plafond_pembiayaan_diinginkan' => 'required',
            'angsuran' => 'required',
        ]);
        

        $pengajuan_pembiayaan_dana = PengajuanPembiayaanDana::create($data);

        if($pengajuan_pembiayaan_dana){
            
            // Make Notiication

            $wilayah_pembiayaan_dana = WilayahPembiayaanDana::find($request->wilayah_pembiayaan_dana_id);

            $cs_pembiayaan_dana = $wilayah_pembiayaan_dana->cs_pembiayaan_dana()->inRandomOrder()->first();
            
            if($cs_pembiayaan_dana){

                $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_id = $cs_pembiayaan_dana->id;
                $pengajuan_pembiayaan_dana->update();
                
                $cs_pembiayaan_dana->notify(new \App\Notifications\CsPembiayaanDana\PengajuanPembiayaanDanaNew($pengajuan_pembiayaan_dana));

                $pengajuan_pembiayaan_dana->user->notify(new \App\Notifications\User\PengajuanPembiayaanDanaNew($pengajuan_pembiayaan_dana));

                $admins = Admin::all();
                Notification::send($admins, new \App\Notifications\Admin\PengajuanPembiayaanDanaNew($pengajuan_pembiayaan_dana));

                
                // $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_id = $cs_pembiayaan_dana->spv_pembiayaan_dana->id;
                // $pengajuan_pembiayaan_dana->manager_pembiayaan_dana_id = $cs_pembiayaan_dana->spv_pembiayaan_dana->manager_pembiayaan_dana->id;
                
                
            }
            

            return redirect()->route('akad-kredit-success');
        }
    }
    
    public function pengajuanOnline()
    {
        $list_wilayah_kredit_motor = WilayahKreditMotor::all();
        $list_motor = Motor::whereHas('angsuran_motor')->with([
            'angsuran_motor' => function($q){
                $q->with(['angsuran_motor_detail' => function($q){
                    $q->with('tempo_angsuran_motor');
                }]);
            }
        ])->get();
    	return view('pengajuan-online',compact('list_wilayah_kredit_motor', 'list_motor'));
    }

    public function submitPengajuanOnline(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        $request->validate([
            'wilayah_kredit_motor_id' => 'required',
            'motor_id' => 'required',
            'angsuran_motor_id' => 'required',
            'angsuran_motor_detail_id' => 'required',
        ]);

        $data = [
            'user_id' => $user->id,
            'wilayah_kredit_motor_id' => $request->get('wilayah_kredit_motor_id'),
            'angsuran_motor_id' => $request->get('angsuran_motor_id'),
            'angsuran_motor_detail_id' => $request->get('angsuran_motor_detail_id'),
        ];

        $pengajuan_kredit_motor = PengajuanKreditMotor::create($data);

        if($pengajuan_kredit_motor){
            
            // Make Notiication

            $wilayah_kredit_motor = WilayahKreditMotor::find($request->wilayah_kredit_motor_id);

            $cs_kredit_motor = $wilayah_kredit_motor->cs_kredit_motor()->inRandomOrder()->first();
            $pengajuan_kredit_motor->cs_kredit_motor_id = $cs_kredit_motor->id;
            $pengajuan_kredit_motor->update();
            
            $cs_kredit_motor->notify(new \App\Notifications\CsKreditMotor\PengajuanKreditMotorNew($pengajuan_kredit_motor));

            $admins = Admin::all();
            Notification::send($admins, new \App\Notifications\Admin\PengajuanKreditMotorNew($pengajuan_kredit_motor));

            

            return redirect()->route('pengajuan-online-success');
        }
    }

    public function pengajuanOnlineSuccess()
    {
        return view('pengajuan-online-success');
    }


    public function akadKreditSuccess()
    {
        return view('akad-kredit-success');
    }

    public function beliMotor(Request $request)
    {
        

        $list_type_motor = TypeMotor::all();
        $list_warna_motor = WarnaMotor::all();
        $list_kapasitas_mesin = KapasitasMesin::all();

        // $type_motor_ids      = $request->get('type_motor_ids');
        // $warna_motor_ids     = $request->get('warna_motor_ids');
        // $kapasitas_mesin_ids = $request->get('kapasitas_mesin_ids');
        // $tahun               = $request->get('tahun');

        $query = Motor::query();

        $query->when(request()->has('type_motor_ids'), function($q){
            $q->whereIn('type_motor_id', request()->get('type_motor_ids'));
        });

        $query->when(request()->has('kapasitas_mesin_ids'), function($q){
            $q->whereIn('kapasitas_mesin_id', request()->get('kapasitas_mesin_ids'));
        });

        $query->when(request()->has('tahun'), function($q){
            $q->whereIn('tahun', request()->get('tahun'));
        });

        $query->when(request()->has('keyword'), function($q){
            $q->where('name', 'LIKE', '%'. request()->get('keyword') .'%');
        });
        

        $list_motor = $query->whereHas('angsuran_motor')->paginate(9);

        return view('beli-motor', compact( 'list_motor', 'list_type_motor', 'list_warna_motor', 'list_kapasitas_mesin'));
    }

    public function detailMotor($slug, Request $request)
    {
        $cs_kredit_motor_ids = CsKreditMotor::pluck('id');
        $wilayah_kredit_motor_ids = CsKreditMotorWilayahKreditMotor::whereIn('cs_kredit_motor_id', $cs_kredit_motor_ids)->groupBy('wilayah_kredit_motor_id')->pluck('wilayah_kredit_motor_id');
        $list_wilayah_kredit_motor = WilayahKreditMotor::whereIn('id', $wilayah_kredit_motor_ids)->get();


        $list_motor = Motor::all();
        $motor = Motor::with([
            'testimoni_motor',
            'angsuran_motor.angsuran_motor_detail.tempo_angsuran_motor',
            'spesifikasi_motor',
        ])->where('slug', $slug)->first();
        $list_kategori_spesifikasi = KategoriSpesifikasi::all();

        // return $motor;
        return view('detail-motor', compact('motor', 'list_wilayah_kredit_motor', 'list_motor', 'list_kategori_spesifikasi'));
    }

    public function notifications()
    {
        
        return view('notifications');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function submitContactUs(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        ContactMessage::create($request->all());

        return redirect()->route('kontak-kami')->with([
            'kontak_kami_success' => true
        ]);
    }

    public function gallery()
    {
        return view('gallery');
    }
	public function privacy(){
		return "
			<h1>Privacy Policy for Dana Syariah Motor</h1>

<p>At Dana Syariah Motor, accessible from https://www.danasyariahmotor.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Dana Syariah Motor and how we use it.</p>

<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at admin@danasyariahmotor.com</p>

<h2>Log Files</h2>

<p>Dana Syariah Motor follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.</p>




<h2>Privacy Policies</h2>

<P>You may consult this list to find the Privacy Policy for each of the advertising partners of Dana Syariah Motor. Our Privacy Policy was created with the help of the <a href='https://www.privacypolicygenerator.info'>Privacy Policy Generator</a>.</p>

<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Dana Syariah Motor, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

<p>Note that Dana Syariah Motor has no access to or control over these cookies that are used by third-party advertisers.</p>

<h2>Third Party Privacy Policies</h2>

<p>Dana Syariah Motor's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.</p>

<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites. What Are Cookies?</p>

<h2>Children's Information</h2>

<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

<p>Dana Syariah Motor does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>

<h2>Online Privacy Policy Only</h2>

<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Dana Syariah Motor. This policy is not applicable to any information collected offline or via channels other than this website.</p>

<h2>Consent</h2>

<p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
		";
		
	}
}
