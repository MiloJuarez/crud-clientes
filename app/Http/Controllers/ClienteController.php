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
    public function index()
    {
        $clientes = Cliente::all();
        return view('pages.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hideSF = true;
        return view('pages.cliente.create', compact('hideSF'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error al guardar el cliente',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $cliente = new Cliente();
        $cliente->nombres = $request->nombres;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->domicilio = $request->domicilio;
        $cliente->correo = $request->correo;
        $cliente->save();

        return response()->json([
            'message' => 'Cliente registrado correctamente',
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $hideSF = true;
            return view('pages.cliente.edit', compact('cliente', 'hideSF'));
        }

        abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $validator = $this->validateRequest($request, $cliente);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Error al actualizar el cliente',
                    'errors' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $cliente->nombres = $request->nombres;
            $cliente->apellido_paterno = $request->apellido_paterno;
            $cliente->apellido_materno = $request->apellido_materno;
            $cliente->domicilio = $request->domicilio;
            $cliente->correo = $request->correo;
            $cliente->save();

            return response()->json([
                'message' => 'Cliente actualizado correctamente',
            ], Response::HTTP_OK);
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function validateRequest(Request $request, $cliente = null)
    {
        $uniqueEmail = '|unique:clientes,correo';
        if ($cliente && $request->correo == $cliente->correo) {
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
