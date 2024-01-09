<?php

namespace App\Http\Controllers;

use App\Models\Pais;



use Illuminate\Http\Request;

class PaisController extends Controller
{
    //endpoint para todos los paises

    public function select()
    {
        try {

            $paises = Pais::all();

            if ($paises->count() > 0) {
                return response()->json([
                    'code' => 200,
                    'data' => $paises
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'No Hay Paises en la Base de Datos'
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
