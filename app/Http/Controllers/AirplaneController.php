<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airplane;

class AirplaneController extends Controller
{
    public function index () {
        return view("welcome");
    }

    public function get () {
        $airplanes = Airplane::get();

        return view('planes')->with("planes", $airplanes);
    }

    public function form () {
        return view('createPlanes');
    }

    public function create (Request $request) {
        $plane = new Airplane();

        $plane->name = $request->input("name");
        $plane->data_criacao = $request->input("data");
        $plane->unidades_produzidas = $request->input("unidades");
        $plane->nacao = $request->input("nacao");
        $plane->tipo = $request->input("tipo");
        $plane->velocidade_maxima = $request->input("velocidade");
        $plane->produzida = $request->input("produzido");

        $plane->save();

        return redirect()->route("planes");
    }

    public function destroy (Airplane $plane) {
        $plane->delete();

        return redirect()->route("planes");
    }
}
