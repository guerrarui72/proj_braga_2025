<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       // $clientes = Cliente::paginate(10);
        //return view('clientes.index', ['clientes' => DB::table('clientes')->get()->paginate(10)]);
        $clientes = Cliente::paginate(10);

        // Passa a variável $clientes para a view
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //echo("Criar cliente");
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cliente = new Cliente();
        $cliente->nome = $request->nome;
        $cliente->morada = $request->morada;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->data_nascimento = $request->data_nascimento;

        $cliente->save();

        return redirect()->back()->with('alert', 'Operação realizada com sucesso!');

        //echo("gravar cliente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        //echo("Vou mostrar o cliente {$id}");
        $cliente = Cliente::findorfail($id);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $cliente = Cliente::findorfail($id);
        // dd($cliente);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // Buscar o cliente pelo ID, caso não encontre ele irá gerar uma exceção e mostrar erro 404
        $cliente = Cliente::findOrFail($id);

        // Validar os dados do formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'morada' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'data_nascimento' => 'required|date',
        ]);

        // Atualizar os dados do cliente com os dados validados
        $cliente->update($validated); // Usando dados validados, e não request->only()

        // Redirecionar para a lista de clientes com uma mensagem de sucesso
        return redirect()->route('clientes.index')->with('alert', 'Alteração realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cliente = Cliente::find($id);

        // if (!$cliente) {
        //     return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado.');
        // }

        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado com sucesso!');
    }


    public function minhapagina(){
        return view('clientes.exemplo');
    }
}
