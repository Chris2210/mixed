<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserApi;
use App\Models\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class UsersApiController extends Controller
{

    public function changePassword(Request $request){


        $rest = substr($request->password, 1, -1);
        $cont = UserApi::where('email', $request->email)->first();
        $contpass = substr($cont->NIE, 1, -1);

        if($rest == $contpass){
            $newpass = strtoupper($request->password);
        }else{
            $newpass = $request->password;
        }
        $array = array();
        $array = ['email' => $request->email, 'password'=> $newpass];
        //$credentials = $request->only('email', 'password');
        $credentials = $array;


        //dd($array);
        if (Auth::attempt($credentials)) {
            $user = UserApi::where('email', $request->email)->first();
            $user->remember_token = Str::random(60);
            $user->save();

            $data = json_encode($user, true);

            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Se ha creado un nuevo token de recuperación.'
            ]);
        }

       else{
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.'
            ]);
        }
    }

    public function change(Request $request){

        $userExists = UserApi::where('email', $request->email)->exists();
        if($userExists){
            $user = UserApi::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->remember_token = null;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Contraseña cambiada correctamente.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.'
            ]);
        }
    }

    public function recovery(Request $request){

        $userExists = UserApi::where('email', $request->email)->exists();
        if($userExists){
            $user = UserApi::where('email', $request->email)->first();
            $user->remember_token = Str::random(60);
            $user->save();

            // Send email with new password
            // You can use Laravel's Mail facade to send the email
            // For example:
            // Mail::to($user->email)->send(new PasswordRecoveryMail($newPassword));

            $data = json_encode($user, true);

            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Se ha creado un nuevo token de recuperación.'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.'
            ]);
        }
    }

    public function login(Request $request){

        $userExists = UserApi::where('email', $request->email)->exists();
        //dd($userExists);
        if($userExists){
           $userLog = UserApi::where('email', $request->email)->first();
           if($userLog->status == 0){
            return $response = [
            'success' => false,
            'message' => "Usuario bloqueado"
            ];
           }else{
            $token = base64_encode($userLog->password);
            return $response = [
            'success' => true,
            'user'  => $userLog,
            'token' => $token,
            'message' => "Usuario logeado correctamente"
        ];
           }


        }else{
          return $response = [
            'success' => false,
            'message' => "Usuario no encontrado"
            ];
        }
    }

    public function register(Request $request)
    {



        //dd($request->all());
        $userExistsBefore = UserApi::where('email', $request->email)->exists();
        if($userExistsBefore){
        return $response = [
            'success' => false,
            'message' => "Usuario ya registrado"
        ];
        }

        $user = new UserApi();
        $user->name = $request->name;
        $user->NIE = $request->NIE;
        $user->email = $request->email;
        $user->phone = $request->mobile;
        $user->userRole = "PACIENTE";
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->team_id = 1;
        $user->save();

        $userExists = UserApi::where('email', $request->email)->where('password', $user->password)->exists();

        if($userExists){
        $userFirst = UserApi::where('email', $request->email)->where('password', $user->password)->where('status', 1)->exists();
        $token = base64_encode($user->password);

        return $response = [
            'success' => true,
            'user'  => $user,
            'token' => $token,
            'message' => "Usuario registrado correctamente"
        ];
        }else{
        return $response = [
            'success' => false,
            'message' => "Hay un fallo en la registracion"
        ];
        }



    }
}
