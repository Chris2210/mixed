<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Photo;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use Carbon\Carbon;

class UsuariosController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function editphoto(Request $request)
    {
        //dd($request->all());
        $photo = Photo::findOrFail($request->input('id'));
        $photo->isChecked = $request->input('status');
        $photo->save();

        $operacion = Operation::where('id', $photo->operation_id)->first();
        $usuario = User::where('id', $operacion->user_id)->first();
        $photos = Photo::where('operation_id', $operacion->id)->where('user_id', $operacion->user_id)->orderBy('created_at', 'desc')->get();

        return view('usuarios.showphotos', compact('usuario', 'photos', 'operacion'));
    }

    public function showphotos($id)
    {

        $operacion = Operation::where('id', $id)->first();
        $usuario = User::where('id', $operacion->user_id)->first();
        $photos = Photo::where('operation_id', $id)->where('user_id', $operacion->user_id)->orderBy('created_at', 'desc')->get();

        return view('usuarios.showphotos', compact('usuario', 'photos', 'operacion'));
    }

    public function storeuser(Request $request){
        //dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->NIE);
        $user->phone = $request->phone;
        $user->NIE = $request->NIE;
        $user->userRole = "PACIENTE";
        $user->status = 1;
        $user->team_id = $request->team_id;
        $user->save();

        $usuarios = $this->userService->listarteam($request->team_id);
        //dd($usuarios);
        return view('usuarios.usuariosteam', compact('usuarios'));
    }

    public function createuser()
    {
        return view('usuarios.createuser');
    }

    public function createoperation($id){

        $user = User::where('id', $id)->first();
        return view('usuarios.createoperation', compact('user'));
    }

    public function usuariosteam($id)
    {

        $usuarios = $this->userService->listarteam($id);
        //dd($usuarios);
        return view('usuarios.usuariosteam', compact('usuarios'));
    }

    public function index()
    {


        $usuarios = $this->userService->listar();

        return view('usuarios.index', compact('usuarios'));
    }

    public function storeoperation(Request $request){
        //dd($request->all());
        $date = Carbon::parse($request->date)->format('Y-m-d');

        $exists = Operation::where('user_id', $request->user_id)->where('date', $date)->exists();

        if(!$exists){
        $opNew = new Operation();
        $opNew->name = $request->name;
        $opNew->size = $request->size;
        $opNew->date = Carbon::parse($request->date)->format('Y-m-d');
        $opNew->team_id = $request->team_id;
        $opNew->user_id = $request->user_id;
        $opNew->isActive = 1;
        //dd($opNew);
        $opNew->save();
        }


        $usuario = User::findOrFail($request->user_id);
        $operaciones = Operation::where('user_id', $request->user_id)->get();
        return view('usuarios.showpatient', compact('usuario', 'operaciones'));

    }

    public function showpatient($id)
    {
        $usuario = User::findOrFail($id);

        $op = Operation::where('user_id', $id)->get();
        $array = array();
        foreach($op as $operacion){

            $numFotos = Photo::where('operation_id', $operacion->id)->where('user_id', $operacion->user_id)->get();
            //dd($numFotos->count());
            $val['id'] = $operacion->id;
            $val['name'] = $operacion->name;
            $val['size'] = $operacion->size;
            $val['date'] = $operacion->date;
            $val['team_id'] = $operacion->team_id;
            $val['user_id'] = $operacion->user_id;
            $val['isActive'] = $operacion->isActive;
            $val['numFotos'] = $numFotos->count();

            array_push($array, $val);

        }

        $operaciones = $this->array_to_object($array);

        //dd($operaciones);

        return view('usuarios.showpatient', compact('usuario', 'operaciones'));
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        $userRole = ['SUPERADMIN', 'ADMIN', 'PACIENTE', 'LEADER', 'ENFERMERO'];
        $teams = Team::all();
        return view('usuarios.show', compact('usuario', 'userRole', 'teams'));
    }

    public function update(Request $request)
    {

        //dd($request->all());
        $user = User::findOrFail($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->NIE = $request->input('dni');
        $user->userRole = $request->input('userRole');
        $user->status = $request->input('status');
        $user->team_id = $request->input('team_id');
        $user->save();

        $usuarios = $this->userService->listar();

        return view('usuarios.index', compact('usuarios'));
    }

    public function statususerOK($id)
    {



            $user = User::find($id);
            //dd($user);
            $user->status = 1;
            $user->save();

            $usuarios = $this->userService->listarteam(Auth::user()->team_id);
        //dd($usuarios);
        return view('usuarios.usuariosteam', compact('usuarios'));
        }

    public function statususerKO($id)
    {




            $user = User::find($id);
            $user->status = 0;
            $user->save();


            $usuarios = $this->userService->listarteam(Auth::user()->team_id);
        //dd($usuarios);
        return view('usuarios.usuariosteam', compact('usuarios'));
        }


    public function statusOK($id)
    {


        if (Auth::user()->userRole != 'SUPERADMIN') {
            return redirect('404');
        } else {
            $user = User::find($id);
            //dd($user);
            $user->status = 1;
            $user->save();

            $usuarios = $this->userService->listar();

            return view('usuarios.index', compact('usuarios'));
        }
    }
    public function statusKO($id)
    {



        if (Auth::user()->userRole != 'SUPERADMIN') {
            return redirect('404');
        } else {
            $user = User::find($id);
            $user->status = 0;
            $user->save();


            $usuarios = $this->userService->listar();

            return view('usuarios.index', compact('usuarios'));
        }
    }

    public function array_to_object(array $array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = self::array_to_object($value);
            }
        }
        return (object)$array;
    }
}

