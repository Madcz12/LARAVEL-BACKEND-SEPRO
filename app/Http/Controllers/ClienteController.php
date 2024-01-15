<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClienteController extends Controller
{
    //endpoint para seleccionar clientes
    public function select()
    {
        try {

            $clientes = Cliente::select('cliente.id', 'cliente.nombre', 'cliente.telefono', 'pais.nombre as fk_pais')
                ->join('pais', 'cliente.fk_pais', '=', 'pais.id')
                ->get();

            if ($clientes->count() > 0) {
                return response()->json([
                    'code' => 200,
                    'data' => $clientes
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'No Hay Clientes en la Base de Datos'
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validacion = Validator::make($request->all(), [
                'nombre' => 'required',
                'telefono' => 'required',
                'fk_pais' => 'required',
            ]);

            if ($validacion->fails()) {
                return response()->json([
                    'code' => 400,
                    'data' => $validacion->messages()
                ], 400);
            } else {
                $cliente = Cliente::create($request->all());
                return response()->json([
                    'code' => 200,
                    'data' => 'Cliente Insertado'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    // endpoint para modificar
    public function update(Request $request, $id)
    {
        try {
            $validacion = Validator::make($request->all(), [
                'nombre' => 'required',
                'telefono' => 'required',
                'fk_pais' => 'required',
            ]);

            if ($validacion->fails()) {
                return response()->json([
                    'code' => 400,
                    'data' => $validacion->messages()
                ], 400);
            } else {
                $cliente = Cliente::find($id);
                if ($cliente) {
                    $cliente->update($request->all());
                    return response()->json([
                        'code' => 200,
                        'data' => 'Cliente Actualizado',
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 404,
                        'data' => 'Cliente No Actualizado',
                    ], 404);
                }
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    // endpoint para eliminar
    public function delete($id)
    {
        try {
            $cliente = Cliente::find($id);
            if ($cliente) {
                $cliente->delete($id);
                return response()->json([
                    'code' => 209,
                    'data' => 'Cliente Eliminado',
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'Cliente No Eliminado',
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    // endpoint para buscar por id
    public function find($id)
    {
        try {
            // buscar el cliente
            $cliente = Cliente::find($id);
            if ($cliente) {
                $datos = Cliente::select('cliente.id', 'cliente.nombre', 'cliente.telefono', 'pais.nombre as fk_pais')
                    ->join('pais', 'pais.id', '=', 'cliente.fk_pais')
                    ->where('cliente.id', '=', $id)
                    ->get();
                return response()->json([
                    'code' => 200,
                    // para enviarle unicamente el cliente que esta solicitando
                    'data' => $datos[0]
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'Cliente No Eliminado',
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    // endpoint para buscar por id 2
    public function find2($id)
    {
        try {
            // buscar el cliente
            $cliente = Cliente::find($id);
            if ($cliente) {
                $datos = Cliente::select('cliente.id', 'cliente.nombre', 'cliente.telefono', 'cliente.fk_pais')->get();
                return response()->json([
                    'code' => 200,
                    'data' => $datos[0]
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'Cliente No Eliminado',
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
