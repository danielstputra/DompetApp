<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Validation\RegisterRequest;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Session;
use Hash;
use Mail; 

class AuthController extends Controller
{
    use RegisterRequest;

    public function __construct()
    {

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function viewRegistration()
    {
        $config = $this->config;

        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.registration', compact('config'));
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|min:6|max:100',
            'password'    => 'required_with:email|min:6|max:100',
        ],[
            'password.required_with'  => "The password field is empty."
        ]);
        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $usermail = $request->get('email');
        $password = $request->get('password');
        $remember = (!empty( $request->get('rememberMe'))) ? TRUE : FALSE;

        if (filter_var($usermail, FILTER_VALIDATE_EMAIL)) {
            $isEmailExist = User::where('email', $usermail)->first();
            if($isEmailExist != null){
                if (Auth::attempt([
                    'email' => $usermail,
                    'password' => $password
                ], $remember)){
                    return redirect()->route('admin.dashboard');
                } else {
                    return back()->with('error', 'Gagal melakukan login akun, silakan periksa kembali kata sandi / alamat email anda!');
                }
            } else {
                return back()->with('error', 'Gagal melakukan login akun, dikarenakan email tidak terdaftar!');
            }
        } else {
            return back()->with('error', 'Gagal melakukan login akun, dikarenakan format email tidak benar!');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $this->registerDataSanitization($request->all());
        $user = User::create([
            'username' => trim($request->input('username')),
            'fullname' => trim($request->input('fullname')),
            'email' => strtolower($request->input('email')),
            'user_image' => trim('default.png'),
            'email_token' => Str::random(32),
            'phone_number' => trim($request->input('phone_number')),
            'password' => Hash::make($request->input('password'))
        ]);

        \Mail::to($user->email)->send(new VerificationEmail($user));
        session()->flash('message', 'Please check your email to activate your account');
        return redirect()->back();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        $user = Auth::user();
        $user->user_online = "offline";
        $user->last_login = null;
        $user->save();

        Session::flush();
        Auth::logout();

        session()->flash('success', 'Berhasil melakukan logout akun!');
        return redirect()->route('login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token = null)
    {
        if ($token == null) {
            session()->flash('error', 'Upaya login tidak valid, dikarenakan token tidak benar!');
            return redirect()->route('login');
        }

        $user = User::where('email_token', $token)->first();
        if($user == null ){
            session()->flash('error', 'Upaya login tidak valid, dikarenakan email token tidak benar!');
            return redirect()->route('login');
        }

        $user->update([
            'user_status' => 'active',
            'is_email_verified' => true,
            'email_verified_at' => Carbon::now(),
            'email_token' => null
        ]);

        session()->flash('success', 'Akun Anda diaktifkan, Anda dapat masuk sekarang!');
        return redirect()->route('login');
    }
}
