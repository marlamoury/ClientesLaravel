<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required',
        ]);

        return Cliente::create($request->all());
    }

    public function show($id)
    {
        return Cliente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:clientes,email,'.$id,
            'telefone' => 'required',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return $cliente;
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
