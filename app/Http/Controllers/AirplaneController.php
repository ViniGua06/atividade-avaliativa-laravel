<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airplane;

class AirplaneController extends Controller
{
    public function index () {
        return view("welcome");
    }

    public function get ($page) {
        $airplanes = Airplane::get();

        $skip = 0;
        
        if ($page == 1) {
            $skip = 0;
        } else {
            $skip = ($page - 1) * 9 ;
        }

        $number_of_links = 0;

        if ($airplanes->isEmpty()) {
            $number_of_links = 1;
        } else {
            $number_of_links = ceil(count($airplanes) / 9);
        }

        return view('planes')
        ->with("planes", $airplanes->skip($skip)->take(9))
        ->with('quantity', count($airplanes))
        ->with('links', $number_of_links)
        ->with("page", $page);
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

        return redirect()->route("page", 1);
    }

    public function destroy (Airplane $plane) {
        $plane->delete();

        return redirect()->route("page", 1);
    }

    public function goToUpdateForm ($id) {
        $airplane = Airplane::find($id);

        return view("updatePlaneForm")->with("plane", $airplane);
    }

    public function update (Request $request, Airplane $plane) {
        $plane->name = $request->input("name");
        $plane->data_criacao = $request->input("data");
        $plane->unidades_produzidas = $request->input("unidades");
        $plane->nacao = $request->input("nacao");
        $plane->tipo = $request->input("tipo");
        $plane->velocidade_maxima = $request->input("velocidade");
        $plane->produzida = $request->input("produzido");

        $plane->save();

        return redirect()->route('page', 1);
    }
}
