<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Wilayah;
use App\CsKreditMotor;
use App\SpvKreditMotor;
use Illuminate\Http\Request;
use App\Rules\RefCodeIsvalid;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect()->intended($this->redirectPath());
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/register/success';
    protected $redirectTo = '/akad-kredit?from_register=true';

    public function redirectPath()
    {
        if(request()->has('as_mitra')){
            return '/mitra-request';
        }

        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    public function mitra_register()
    {
        return view('auth.mitra-register');
        // return 'mitra-register';
    }

    public function success()
    {
        return view('auth.user-register-success');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:spv_kredit_motor');
        $this->middleware('guest:cs_kredit_motor');
        $this->middleware('guest:spv_pembiayaan_dana');
        $this->middleware('guest:cs_pembiayaan_dana');
    }

    public function showRegistrationForm()
    {
        $list_wilayah = Wilayah::all();
        return view('auth.user-register', compact('list_wilayah'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_handphone_1' => ['required'],
            // 'no_handphone_2' => ['required'],
            'jenis_identitas' => ['required'],
            'no_identitas' => ['required'],
            // 'kota' => ['required'],
            'alamat' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'province_id' => ['required'],
            'city_id' => ['required'],
            'district_id' => ['required'],
            'sumber_informasi' => ['required'],
            'ref_code' => ['required', new RefCodeIsvalid],
        ]);

        $validator->setAttributeNames([
            'no_handphone_2' => 'No Whatsapp'
        ]); 

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user_data = [

            'name'            => $data['name'],
            'email'           => $data['email'],
            'password'        => Hash::make($data['password']),
            
            'no_handphone_1'  => $data['no_handphone_1'],
            'no_handphone_2'  => $data['no_handphone_2'],
            'jenis_identitas' => $data['jenis_identitas'],
            'no_identitas'    => $data['no_identitas'],
            'province_id'            => $data['province_id'],
            'city_id'            => $data['city_id'],
            'district_id'            => $data['district_id'],
            'alamat'          => $data['alamat'],
            'tempat_lahir'    => $data['tempat_lahir'],
            'tanggal_lahir'   => $data['tanggal_lahir'],
            'sumber_informasi'   => $data['sumber_informasi'],
            'ref_code'   => $data['ref_code'],
        ];
        
        // dd($user_data);

        $user = User::create($user_data); 

        $mitra = User::where('ref_code', $data['ref_code'])->first();


        

        if($mitra){
            $user->mitra_id = $mitra->id;
            $user->save();
        }
        
        // $user->notify(new \App\Notifications\User\RegistrationGreeting($user));
        

        return $user;
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function createAdmin(Request $request)
    {
        $this->adminValidator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }


    // -----------------------------------------------------------------

    public function showSpvKreditMotorRegisterForm()
    {
        $list_wilayah = Wilayah::all();
        return view('auth.register', ['url' => 'spv_kredit_motor', 'list_wilayah' => $list_wilayah]);
    }

    protected function spvKreditMotorValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:spv_kredit_motor'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'wilayah_id' => ['required'],
        ]);
    }

    protected function createSpvKreditMotor(Request $request)
    {
        $this->spvKreditMotorValidator($request->all())->validate();
        $spv_kredit_motor = SpvKreditMotor::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'wilayah_id' => $request['wilayah_id'],
        ]);
        return redirect()->intended('login/spv_kredit_motor');
    }


    // -----------------------------------------------------------------

    public function showCsKreditMotorRegisterForm()
    {
        $list_wilayah = Wilayah::all();
        $list_spv_kredit_motor = SpvKreditMotor::all();
        return view('auth.register', ['url' => 'cs_kredit_motor', 'list_spv_kredit_motor' => $list_spv_kredit_motor, 'list_wilayah' => $list_wilayah]);
    }

    protected function csKreditMotorValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cs_kredit_motor'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'spv_kredit_motor_id' => ['required'],
        ]);
    }

    protected function createCsKreditMotor(Request $request)
    {
        $this->csKreditMotorValidator($request->all())->validate();
        $cs_kredit_motor = CsKreditMotor::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'spv_kredit_motor_id' => $request['spv_kredit_motor_id'],
        ]);
        return redirect()->intended('login/cs_kredit_motor');
    }
}
