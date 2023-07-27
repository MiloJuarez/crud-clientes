<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = "";
        $clientes = collect([]);

        if ($request->has('search') && empty($request->search) == false) {
            $search = $request->search;
            $clientes = Cliente::where('nombres', 'like', "%{$search}%")
                ->orWhere('apellido_paterno', 'like', "%{$search}%")->orWhere('apellido_materno', 'like', "%{$search}%")->get();
        } else {
            $clientes = Cliente::all();
        }
        return view('pages.cliente.index', compact('clientes', 'search'));
    }

    /**
     * Get client resource
     *
     * @param \Illuminate\Http\Request $request
     * @param integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request, int $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return response()->json([
                'cliente' => $cliente
            ], Response::HTTP_OK);
        }

        return response()->json([
            'cliente' => null,
            'message' => 'Cliente no encontrado'
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeUpdate(Request $request, $id = null)
    {
        $cliente = Cliente::find($id);
        $action = "guardar";
        $success = "registrado";

        if ($cliente) {
            $action = "modificar";
            $success = "modificado";
        }

        $validator = $this->validateRequest($request, $cliente);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error al ' . $action . ' el cliente',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $cliente = Cliente::updateOrCreate([
            'id' => $id
        ], [
            "nombres" => $request->nombres,
            "apellido_paterno" => $request->apellido_paterno,
            "apellido_materno" => $request->apellido_materno,
            "domicilio" => $request->domicilio,
            "email" => $request->correo,
        ]);

        return response()->json([
            'message' => 'Cliente ' . $success . ' correctamente',
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            return response()->json([
                'message' => 'Cliente eliminado correctamente',
            ], Response::HTTP_NO_CONTENT);
        }

        return response()->json([
            'message' => 'Cliente inválido',
            'errors' => ['Cliente no encontrado']
        ], Response::HTTP_NOT_FOUND);
    }

    public function validateRequest(Request $request, $cliente = null)
    {
        $uniqueEmail = '|unique:clientes,email';
        if ($cliente && $request->correo == $cliente->email) {
            $uniqueEmail = '';
        }

        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:80',
            'apellido_materno' => 'required|string|max:80',
            'domicilio' => 'required|string|max:255',
            'correo' => 'required|string|email|max:100' . $uniqueEmail,
        ]);

        return $validator;
    }
}
