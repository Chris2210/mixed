<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\User;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('teams.index', compact('teams'));
    }

    public function create()
    {

        $hospitals = ['Hospital 12 de octubre', 'Hospital Ramon y Cajal', 'Hospital La Paz', 'Hospital Gregorio Marañon', 'Hospital La Princesa', 'Hospital Puerta de Hierro', 'Hospital Infanta Leonor', 'Hospital Infanta Sofia', 'Hospital Severo Ochoa', 'Hospital Universitario de Fuenlabrada', 'Hospital Universitario del Henares', 'Hospital Universitario de Getafe', 'Hospital Universitario de Móstoles', 'Hospital Universitario de Torrejón'];
        $sections = ['Sección Traumatologia', 'Sección Pediatria', 'Sección Cardiologia', 'Sección Neurologia', 'Sección Oftalmologia', 'Sección Urologia', 'Sección Ginecologia', 'Sección Oncologia', 'Sección Dermatologia', 'Sección Psiquiatria', 'Sección Endocrinologia', 'Sección Neumologia', 'Sección Reumatologia', 'Sección Gastroenterologia'];
        $leaders = User::where('userRole', '=', 'LEADER')->get();
        return view('teams.create', compact('hospitals', 'sections', 'leaders'));
    }

    public function update(Request $request)
    {
        //dd($request->all());

        $team = Team::find($request->id);
        $leader = User::where('id', $request->leader)->first();



        $team->name = $request->input('hospital').' - '.$request->input('section').' - '.$leader->name;
        $team->hospital = $request->input('hospital');
        $team->seccion = $request->input('section');
        $team->leader = $request->leader;
        $team->save();

        $teams = Team::all();

        return view('teams.index', compact('teams'));

    }

    public function store(Request $request)
    {

        //dd($request->all());
        $leader = User::where('id', $request->leader)->first();
        $exists = Team::where('hospital', $request->hospital)
            ->where('seccion', $request->section)
            ->where('leader', $request->leader)
            ->exists();
        //dd($exists);
        if($exists) {
            return redirect()->back()->with('error', 'El equipo ya existe.');
        }else{
        $team = new Team();
        $team->name = $request->input('hospital').' - '.$request->input('section').' - '.$leader->name;
        $team->hospital = $request->input('hospital');
        $team->seccion = $request->input('section');
        $team->leader = $request->leader;
        $team->status = 1;
        $team->save();

        $teams = Team::all();

        return view('teams.index', compact('teams'));
        }

    }

    public function show($id)
    {
        $team = Team::find($id);
        $hospitals = ['Hospital 12 de octubre', 'Hospital Ramon y Cajal', 'Hospital La Paz', 'Hospital Gregorio Marañon', 'Hospital La Princesa', 'Hospital Puerta de Hierro', 'Hospital Infanta Leonor', 'Hospital Infanta Sofia', 'Hospital Severo Ochoa', 'Hospital Universitario de Fuenlabrada', 'Hospital Universitario del Henares', 'Hospital Universitario de Getafe', 'Hospital Universitario de Móstoles', 'Hospital Universitario de Torrejón'];
        $sections = ['Sección Traumatologia', 'Sección Pediatria', 'Sección Cardiologia', 'Sección Neurologia', 'Sección Oftalmologia', 'Sección Urologia', 'Sección Ginecologia', 'Sección Oncologia', 'Sección Dermatologia', 'Sección Psiquiatria', 'Sección Endocrinologia', 'Sección Neumologia', 'Sección Reumatologia', 'Sección Gastroenterologia'];
        $leaders = User::where('userRole', '=', 'LEADER')->get();
        return view('teams.show', compact('team', 'hospitals', 'sections', 'leaders'));
    }

     public function statusOK($id){



        if(Auth::user()->userRole != 'SUPERADMIN'){
            return redirect('404');
        }else{
        $teams = Team::find($id);
        //dd($user);
        $teams->status = 1;
        $teams->save();

        $teams = Team::all();

        return view('teams.index', compact('teams'));

    }
    }

     public function statusKO($id){



        if(Auth::user()->userRole != 'SUPERADMIN'){
            return redirect('404');
        }else{
        $teams = Team::find($id);
        //dd($user);
        $teams->status = 0;
        $teams->save();

        $teams = Team::all();

        return view('teams.index', compact('teams'));

    }
    }


}
