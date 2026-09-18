<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserApi;
use App\Models\Operation;
use App\Models\Photo;
use App\Models\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class DatosController extends Controller
{

public function verUltimaFoto($id, $team, $user){

        $foto = Photo::where('operation_id', $id)->where('team_id', $team)->where('user_id', $user)->latest()->first();
        $data = json_encode($foto, true);
        return $response = $data;

}

public function editPhoto($id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json(['message' => 'Photo not found'], 404);
        }

        else{
          return response()->json(['message' => 'Photo updated successfully', 'data' => $photo], 200);
        }


    }

public function photosList($id){

        $fotos = Photo::where('operation_id', $id)->where('isChecked', '!=', 1)->orderBy('id', 'DESC')->get();

        $data = json_encode($fotos, true);
        return $response = $data;

    }

public function lastPhoto($id, $team, $user){

        $foto = Photo::where('operation_id', $id)->where('team_id', $team)->where('user_id', $user)->latest()->first();
        $data = json_encode($foto, true);
        return $response = $data;

}



public function showPhoto($photo)
    {
        //dd($plate);
        //$queryPlate = Photo::where('id', $photo)->first();



        $exists = Photo::where('id', $photo)->exists();


        if ($exists) {
            $item = Photo::where('id', $photo)->first();
            $link = $item->route;
            return $response = [
                'success' => true,
                'link'  => $link,
                'message' => "Sent"
            ];
        } else {
            return $response = [
                'success' => false,
                'exists'  => 0,
                'message' => "Sent"
            ];
        }
    }




public function deletephoto($photo)
    {
        $query = Photo::where('id', $photo)->first();

        $route = $query->route;

        $routeComplete = explode('https://mixed.intrafesa.org/', $route);


        $rutaFinal = public_path($routeComplete[1]); // Obtiene la ruta completa a public/uploads/

        if (file_exists($rutaFinal)) {
            unlink($rutaFinal);
        }
        //dd($file[1]);
        $query->name = '';
        $query->route = '';
        $query->update();

        //$link = $plate->nombre;
        return $response = [
            'success' => true,
            'link'  => null,
            'message' => "Deleted succesfully"
        ];
    }

    public function deleteNew($operation, $team, $user)
    {
        $query = Photo::where('operation_id', $operation)->where('team_id', $team)->where('user_id', $user)->latest()->first();

        $route = $query->route;

        $routeComplete = explode('https://mixed.intrafesa.org/', $route);


        $rutaFinal = public_path($routeComplete[1]); // Obtiene la ruta completa a public/uploads/

        if (file_exists($rutaFinal)) {
            unlink($rutaFinal);
        }
        //dd($file[1]);
        //$query->name = '';
        //$query->route = '';
        $query->delete();

        //$link = $plate->nombre;
        return $response = [
            'success' => true,
            'link'  => null,
            'message' => "Deleted succesfully"
        ];
    }




    public function enviarPhoto($photo)
    {
        $query = Photo::where('id', $photo)->first();

        $query->isChecked = 2;

        $query->save();


            return $response = [
                'success' => true,
                'message' => "Sent"
            ];

    }


    public function upload()
    {




        header('Access-Control-Allow-Origin: *');

        //$now = Carbon::now()->format('YmdHis');

        $target_path = "uploads/fotos/";

        $target_path = $target_path . basename($_FILES['file']['name']);

        $name = (string)basename($_FILES['file']['name']);

        //dd($name);



        $valu = explode('-', $name);

        //$name = $now."-".$valu[0]."-".$valu[1];

        //this.id + '-' + this.team + '-' + this.user +

        //dd($valu[0]);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
            header('Content-type: application/json');

            $imgName11 = "uploads/fotos/".$name;
            //dd($imgName11);
            $image11 = base64_encode(file_get_contents($imgName11));






            //$valuation = Photo::where('user_id', $valu[0])->where('isChecked', 1)->latest()->first();

            $valuation = new Photo();

            $valuation->name = $name;
            $valuation->route = "https://mixed.intrafesa.org/public/uploads/fotos/" . $name;
            $valuation->operation_id = $valu[0];
            $valuation->isChecked = 2;
            $valuation->isSent = 1;
            $valuation->health = 1;
            $valuation->feel = "";
            $valuation->date = Carbon::now()->format('Y-m-d');
            $valuation->team_id = $valu[1];
            $valuation->user_id = $valu[2];
            $valuation->created_at = now();
            $valuation->updated_at = now();
            //dd($valuation);
            $valuation->save();


            $data = ['success' =>
            true, 'message' => 'Upload and move success'];
            echo json_encode($data);


        } else {
            header('Content-type: application/json');
            $data = ['success' => false, 'message' => 'There was an
                error uploading the file, please try again!'];
            echo json_encode($data);
        }
    }


   public function heathOne(Request $request)
    {


        $insertSteoTwo = Photo::where('id', $request->id)->first();
        $insertSteoTwo->health = $request->health;
        $insertSteoTwo->isChecked = 2;
        $insertSteoTwo->isSent = 1;

        $insertSteoTwo->save();

        $data = Photo::where('id', $request->id)->first();

        return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];
    }

    public function heathTwo(Request $request)
    {


        $insertSteoTwo = Photo::where('id', $request->id)->first();
        $insertSteoTwo->health = $request->health;
        $insertSteoTwo->isChecked = 2;
        $insertSteoTwo->isSent = 1;

        $insertSteoTwo->save();

        $data = Photo::where('id', $request->id)->first();

        return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];
    }

     public function heathThree(Request $request)
    {


        $insertSteoTwo = Photo::where('id', $request->id)->first();
        $insertSteoTwo->health = $request->health;
        $insertSteoTwo->save();

        $data = Photo::where('id', $request->id)->first();

        return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];
    }
     public function heathFour(Request $request)
    {


       $insertSteoTwo = Photo::where('id', $request->id)->first();
        $insertSteoTwo->health = $request->health;
        $insertSteoTwo->isChecked = 2;
        $insertSteoTwo->isSent = 1;

        $insertSteoTwo->save();

        $data = Photo::where('id', $request->id)->first();

        return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];
    }
    public function heathFive(Request $request)
    {


       $insertSteoTwo = Photo::where('id', $request->id)->first();
        $insertSteoTwo->health = $request->health;
        $insertSteoTwo->isChecked = 2;
        $insertSteoTwo->isSent = 1;

        $insertSteoTwo->save();

        $data = Photo::where('id', $request->id)->first();

        return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];
    }
    public function heathSix(Request $request)
    {


        $insertSteoTwo = Photo::where('id', $request->id)->first();
        $insertSteoTwo->health = $request->health;
        $insertSteoTwo->isChecked = 2;
        $insertSteoTwo->isSent = 1;

        $insertSteoTwo->save();

        $data = Photo::where('id', $request->id)->first();

        return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];
    }


    public function recuperarFoto($id)
    {
        $photo = Photo::where('id', $id)->first();
        $data = json_encode($photo, true);
        return $response = $data;
        /*return $response = [
            'success' => true,
            'data'  => $data,
            'message' => "Sent"
        ];*/
    }


    public function crearFoto($id, $team, $user){


        $today = Carbon::now()->format('Y-m-d');

        $exists = Photo::where('operation_id', $id)->where('team_id', $team)->where('user_id', $user)->where('date', $today)->exists();

        if(!$exists){
        $foto = new Photo();
        $foto->name = '';
        $foto->route = '';
        $foto->operation_id = $id;
        $foto->team_id = $team;
        $foto->user_id = $user;
        $foto->date = Carbon::now()->format('Y-m-d');
        $foto->isChecked = 1;
        $foto->health = 1;
        $foto->feel = '';
        $foto->save();

        $item = Photo::where('operation_id', $id)->where('team_id', $team)->where('user_id', $user)->where('date', $today)->where('isChecked', '==', 1)->latest()->first();

        $data = json_encode($item, true);
        return $response = $data;
        }else{
        //return $response = false;
        $item = Photo::where('operation_id', $id)->where('team_id', $team)->where('user_id', $user)->where('date', $today)->where('isChecked', '==', 1)->latest()->first();
        $data = json_encode($item, true);
        return $response = $data;
        }





    }

    public function operations($id){

    $operations = Operation::where('user_id', $id)->orderBy('id', 'DESC')->get();
/*
    return $response = [
            'success' => true,
            'data'  => $operations,
            'message' => "Data sent OK"
        ];
*/
        $data = json_encode($operations, true);
        return $response = $data;
    }

     public function activeoperations($id){

    $operations = Operation::where('user_id', $id)->where('isActive', 1)->orderBy('id', 'DESC')->get();

    $array = array();

    foreach ($operations as $operation) {

        $lastPhoto = Photo::where('operation_id', $operation->id)->latest()->first();

        $val['id'] = $operation->id;
        $val['name'] = $operation->name;
        $val['size'] = $operation->size;
        $val['date'] = $operation->date;
        $val['name'] = $operation->name;
        $val['user_id'] = $operation->user_id;
        $val['team_id'] = $operation->team_id;
        $val['isActive'] = $operation->isActive;
        if($lastPhoto){
        $val['route'] = $lastPhoto->route;
        $val['photo_id'] = $lastPhoto->id;
        $val['last_date'] = $lastPhoto->date;
        $val['isChecked'] = $lastPhoto->isChecked;
        }else{
            $val['route'] = null;
            $val['photo_id'] = null;
            $val['last_date'] = null;
            $val['isChecked'] = null;
        }






        array_push($array, $val);

        //array_push($array, $operation->id);
    }

        $data = json_encode($array, true);

        return $response = [
            'success' => true,
            'data'  => $array,
            'message' => "Data sent OK"
        ];

        //$data = json_encode($operations, true);
        //return $response = $data;
    }


}
