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
     * Obtain Trends view.
     */
    public function getTrends()
    {
        return view('redsocial');
    }
    
    /**
     * Obtain Profile view.
     */
    public function getProfile(Request $request)
    {
        $dataUser = Auth::user();
        return view('perfil', array('dataUser' => $dataUser));
    }

    /**
     * Obtain ProfileEdit view.
     */
    public function getProfiledit()
    {
        $dataUser = Auth::user();            
        return view('perfiledit', ['dataUser' => $dataUser]);
    }


    /**
     * Save fields edited from profile. (NAME)
     */
    public function postStoreName(Request $request) {
        //Error messages
        $messages = [
            "name.required" => "El nombre a cambiar es necesario",
            "name.max" => "El nombre no puede tener mas de 255 caracteres"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
        $email = $request->get('user');
        $user = \App\User::where('email',$email)->first();
        $user->name = $request->get('name');
        $user->save();
        }
    }

    /**
     * Save fields edited from profile. (BIRTHDATE)
     */
    public function postStoreBirthdate(Request $request) {
        //Error messages
        $messages = [
            "name.required" => "El nombre a cambiar es necesario",
            "name.max" => "El nombre no puede tener mas de 255 caracteres"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
        $email = $request->get('user');
        $user = \App\User::where('email',$email)->first();
        $user->name = $request->get('name');
        $user->save();
        }
    }

    /**
     * Save fields edited from profile. (STATUSMARITAL)
     */
    public function postStoreStatusMarital(Request $request) {
        //Error messages
        $messages = [
            "name.required" => "El nombre a cambiar es necesario",
            "name.max" => "El nombre no puede tener mas de 255 caracteres"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ], $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
        $email = $request->get('user');
        $user = \App\User::where('email',$email)->first();
        $user->name = $request->get('name');
        $user->save();
        }
    }

    /**
     * Save store language
     */
    public function SaveProgrammingLng(Request $request) {
        $programlng = new \App\programingLng();
        $programlng->user = $request->user;
        $programlng->language = $request->language;
        $programlng->percent = $request->percent;
        $programlng->save();
    }

    public function GetProgrammingLng(Request $request) {
        $email = $request['email'];
        $programlngs = DB::select('select user, language, percent from programing_lngs
                                where user = ?', 
                                [$email]);
        return response()->json(array('lngs'=>$programlngs),200);
    }

    public function UpdateProgrammingLng(Request $request) {
        DB::table('programing_lngs')
            ->where('user',$request['user'])
            ->where('language',$request['language'])
            ->update(['percent' => $request['percent']]);
    }

    public function DeleteProgrammingLng(Request $request) {
        DB::table('programing_lngs')
            ->where('user',$request['user'])
            ->where('language',$request['language'])
            ->delete();
    }
    
    /**
     * Save Work Xperience
     */
    public function StoreWorkXperience(Request $request) {
        $workXp = new \App\experienceJob();
        $workXp->user = $request->user;
        $workXp->position = $request->position;
        $workXp->institution = $request->institution;
        $workXp->finish = $request->finish;
        $workXp->description = $request->description;
        $workXp->activity1 = $request->activity1;
        $workXp->activity2 = $request->activity2;
        $workXp->activity3 = $request->activity3;
        $workXp->save();
    }

    public function GetWorkXperience(Request $request) {
        $email=$request->get('email');
        $workXp = DB::select('select user, position, institution, finish, description, activity1, activity2, activity3 from experience_jobs
            where user = ?', 
            [$email]);
        return response()->json(array('work'=>$workXp),200);
    }

    public function UpdateWorkXperience(Request $request) {
        DB::table('experience_jobs')
            ->where('user',$request['user'])
            ->where('institution',$request['institution'])
            ->update(['position' => $request['position'],'finish' => $request['finish'],'description' => $request['description'],'activity1' => $request['activity1'],'activity2' => $request['activity2'],'activity3' => $request['activity3']]);
    }

    public function DeleteWorkXperience(Request $request) {
        DB::table('experience_jobs')
            ->where('user',$request['user'])
            ->where('institution',$request['institution'])
            ->delete();
    }

    /**
     * Save Education
     */
    public function StoreEducation(Request $request) {
        $education = new \App\education();
        $education->user = $request->user;
        $education->position = $request->position;
        $education->institution = $request->institution;
        $education->finish = $request->finish;
        $education->description = $request->description;
        $education->save();
    }

    public function GetEducation(Request $request) {
        $email=$request->get('email');
        $education = DB::select('select user, position, institution, finish, description from education
                                where user = ?', 
                                [$email]);
        return response()->json(array('education'=>$education),200);
    }

    public function UpdateEducation(Request $request) {
        DB::table('education')
            ->where('user',$request['user'])
            ->where('institution',$request['institution'])
            ->update(['position' => $request['position'],'finish' => $request['finish'],'description' => $request['description']]);
    }

    public function DeleteEducation(Request $request) {
        DB::table('education')
            ->where('user',$request['user'])
            ->where('institution',$request['institution'])
            ->delete();
    }
}
