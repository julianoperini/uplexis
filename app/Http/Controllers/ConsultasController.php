<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sintegra;

class ConsultasController extends Controller
{
    public function index() {
        // Exibe todas as consultas já realizadas
        $consultas = Sintegra::all();
        return view('consultas', ['consultas' => $consultas]);
    }
    
    public function abre_registro($id) {
        // Abre informações do registro escolhido
        $registro = Sintegra::find($id);
        return view('registro', ['registro' => $registro]);
    }
    
    public function apaga_registro($id) {
        // Exclui o registro do banco de dados
        $apaga = Sintegra::find($id);
        $apaga->delete();
        return redirect('/consultas');
    }
}
