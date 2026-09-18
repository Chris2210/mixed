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

class FotosController extends Controller
{
    public function photosList($id){

        $fotos = Photo::where('id', $id)->orderBy()->get();

        $data = json_encode($fotos, true);
        return $response = $data;

    }
}
