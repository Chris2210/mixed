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

class DashboardController extends Controller
{



    public function index()
    {
        $user = Auth::user();
        $photos = Photo::where('isChecked', 2)->orderBy('user_id', 'desc')->where('team_id', $user->team_id)->get();
        $array = array();
        foreach ($photos as $photo) {
            $operation = Operation::where('id', $photo->operation_id)->first();
            $paciente = User::where('id', $operation->user_id)->first();
            $val['fecha_entrada'] = $operation->created_at;
            $val['paciente'] = $paciente->name;
            $val['operacion'] = $operation->name;
            $val['fecha_operacion'] = $operation->date;
            $val['operation_id'] = $operation->id;
            array_push($array, $val);
        }
        $items = $this->array_to_object($array);
        return view('dashboard', compact('user', 'photos', 'items'));
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
