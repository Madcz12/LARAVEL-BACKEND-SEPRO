<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function register(Request $request)
    {
        try {
            $validacion = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required'
            ]);

            if ($validacion->fails()) {
                return response()->json([
                    'code' => 400,
                    'data' => $validacion->messages()
                ], 400);
            } else {
                $usuario = User::create($request->all());
                return response()->json([
                    'code' => 200,
                    'data' => $usuario,
                    'token' => $usuario->createToken('api-key')->plainTextToken
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validacion = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required'
            ]);

            if ($validacion->fails()) {
                return response()->json([
                    'code' => 400,
                    'data' => $validacion->messages()
                ], 400);
            } else {
                if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                    $usuario = User::where('username', $request->username)->first();
                    return response()->json([
                        'code' => 200,
                        'data' => $usuario,
                        'token' => $usuario->createToken('api-key')
                            ->plainTextToken
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 401,
                        'data' => 'Usuario no Autorizado'
                    ], 401);
                }
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
