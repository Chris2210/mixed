<?php
namespace App\Services;
use App\Models\User;
use App\Models\Team;

class UserService {

    public function listar() {

        $usuarios = User::all();
        //dd($usuarios);
        $array = array();

        foreach ($usuarios as $usuario) {

        if($usuario->team_id == 0){
                $team = "SIN EQUIPO";
            }else{

            $team = Team::where('id', $usuario->team_id)->first();
            $team = $team->name;
            }

            $val['id'] = $usuario->id;
            $val['name'] = $usuario->name;
            $val['email'] = $usuario->email;
            $val['phone'] = $usuario->phone;
            if($usuario->NIE == null){
                $val['nie'] = "SIN DNI/NIE";
            }else{
            $val['nie'] = $usuario->NIE;
            }
            $val['userRole'] = $usuario->userRole;
            $val['team'] = $team;
            $val['status'] = $usuario->status;



            array_push($array, $val);
        }

        //dd($array);
        $usuarios = $this->array_to_object($array);

        //dd($array);
        return $usuarios;
    }

    public function listarteam($id){
        $usuarios = User::where('team_id', $id)->get();

        $array = array();

        foreach ($usuarios as $usuario) {

        if($usuario->team_id == 0){
                $team = "SIN EQUIPO";
            }else{

            $team = Team::where('id', $usuario->team_id)->first();
            $team = $team->name;
            }

            $val['id'] = $usuario->id;
            $val['name'] = $usuario->name;
            $val['email'] = $usuario->email;
            $val['phone'] = $usuario->phone;
            if($usuario->NIE == null){
                $val['nie'] = "SIN DNI/NIE";
            }else{
            $val['nie'] = $usuario->NIE;
            }
            $val['userRole'] = $usuario->userRole;
            $val['status'] = $usuario->status;



            array_push($array, $val);
        }

        //dd($array);
        $usuarios = $this->array_to_object($array);
        return $usuarios;
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
