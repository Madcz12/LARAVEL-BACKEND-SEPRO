<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function select()
    {
        try {
            $project = Project::all();
            if ($project->count() > 0) {
                return response()->json([
                    'code' => 200,
                    'data' => $project
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'No Hay Proyectos en la Base de Datos'
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function store(Request $request){
        try {
            $validacion = Validator::make($request->all(), [
                'nombre_proyecto' => 'required',
                'sector' => 'required',
                'empresa' => 'required',
                'objetivo' => 'required',
                'alcance' => 'required',
                'monto' => 'required',
                'financiamiento' => ['in' => ['propio', 'externo']],
                'nudos_criticos' => 'required|boolean:true',
                'cronograma' => 'required',
                'gestiones_adquisicion' => 'required',
                'base' => 'required',
                'plan' => 'required',
                'recomendaciones' => 'required',
            ]);

            if ($validacion->fails()) {
                return response()->json([
                    'code' => 400,
                    'data' => $validacion->messages()
                ], 400);
            } else {
                $project = Project::create($request->all());
                return response()->json([
                    'code' => 200,
                    'data' => 'Proyecto Insertado'
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function update(Request $request, $id){
        try {
            $validacion = Validator::make($request->all(), [
                'nombre_proyecto' => 'required',
                'sector' => 'required',
                'empresa' => 'required',
                'objetivo' => 'required',
                'alcance' => 'required',
                'monto' => 'required',
                'financiamiento' => ['in' => ['propio', 'externo']],
                'nudos_criticos' => 'required|boolean:true',
                'cronograma' => 'required',
                'gestiones_adquisicion' => 'required',
                'base' => 'required',
                'plan' => 'required',
                'recomendaciones' => 'required',
            ]);

            if ($validacion->fails()) {
                return response()->json([
                    'code' => 400,
                    'data' => $validacion->messages()
                ], 400);
            } else {
                $project = Project::find($id);
                if ($project) {
                    $project->update($request->all());
                    return response()->json([
                        'code' => 200,
                        'data' => 'Proyecto Actualizado',
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 404,
                        'data' => 'Proyecto No Actualizado',
                    ], 404);
                }
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function delete($id){
        try {
            $proyecto = Project::find($id);
            if ($proyecto) {
                $proyecto->delete($id);
                return response()->json([
                    'code' => 209,
                    'data' => 'Proyecto Eliminado',
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'Proyecto No Eliminado',
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function find($id){
        try {
            // buscar el cliente
            $proyecto = Project::find($id);
            if ($proyecto) {
                $datos = Project::select([
                    'proyecto.id',
                    'proyecto.nombre_proyecto',
                    'proyecto.status_proyecto',
                    'proyecto.sector',
                    'proyecto.empresa',
                    'proyecto.objetivo',
                    'proyecto.alcance',
                    'proyecto.monto',
                    'proyecto.nudos_criticos',
                    'proyecto.cronograma',
                    'proyecto.gestione',
                    'proyecto.financiamiento',
                ])->whereEnum('financiamiento', 'externo')->get();

                return response()->json([
                    'code' => 200,
                    // para enviarle unicamente el cliente que esta solicitando
                    'data' => $datos[0]
                ], 200);
            } else {
                return response()->json([
                    'code' => 404,
                    'data' => 'Proyecto No Eliminado',
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
