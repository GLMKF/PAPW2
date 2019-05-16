<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Quotation;

class AdminController extends Controller
{
    /**
     * God of controllers.
     *
     * Controll all redirects
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Obtain Login view.
     */
    public function getLogin()
    {
        return view('logeo');
    }

    /**
     * Obtain Login view.
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        //Error messages
        $messages = [
            "email.required" => "Correo requerido",
            "email.email" => "No es un correo valido",
            "email.exists" => "El correo no existe",
            "password.required" => "Contraseña requerida",
            "password.min" => "Contraseña debe contar con almenos 6 caracteres"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ], $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password ], $request->remember)) {
            // if (Auth::attempt(['approve' => '1', 'email' => $request->email, 'password' => $request->password ], $request->remember)) {
                // Authentication passed...
                return redirect()->intended('profile');
            }
            else
            {
                // Redirect::back()->withErrors(['No coinciden las credenciales', '']);
                // return Redirect::to('/login');
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                    'approve' => 'Contraseña incorrecta o aun no ha sido validado',
                ]);
            }
        }
    }

    /**
     * Obtain Profile view.
     */
    public function getLogout()
    {
        Auth::logout();
        return view('index');
    }

    /**
     * Obtain Profile view.
     */
    public function postSignup(Request $request)
    {
        //Error messages
        $messages = [
            "email.required" => "Email es un campo requerido",
            "email.email" => "Debe ser un email valido",
            "email.unique" => "El email ya tiene una cuenta asignada",
            "profile.required" => "Tipo de usuario requerido",
            "speciality.required" => "Especialidad requerida",
            "password.required" => "Contraseña requerida",
            "password.min" => "Contraseña debe contener almenos 6 caracteres",
            "password_confirmation.min" => "Contraseña debe contener almenos 6 caracteres",
            "password_confirmation.same" => 'Las contraseñas deben coincidir'
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required',
            'profile' => 'required',
            'speciality' => 'required',
            'password_confirmation' => 'min:6|same:password'
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
            $user = \App\User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'typeUser' => $request->get('profile'),
                'speciality' => $request->get('speciality'),
                'password' => bcrypt($request->get('password')),
            ]);
            return view('logeo');
        }
    }

    /**
     * Obtain Profile view.
     */
    public function getProfile()
    {
        $dataUser = DB::table('users')->get();
    
        return view('perfil', ['dataUser' => $dataUser]);
    }

    /**
     * Obtain ProfileEdit view.
     */
    // public function getProfiledit()
    // {
    //     $dataUser = DB::table('users')->get();
    
    //     return view('perfiledit', ['dataUser' => $dataUser]);
    // }

    /**
     * Obtain Trends view.
     */
    public function getTrends()
    {
        return view('redsocial');
    }
}
