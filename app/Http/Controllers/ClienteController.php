<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'clientesAtivos'   => Cliente::get(),
            'clientesInativos' => Cliente::onlyTrashed()->get()
        ];

        return view('clientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'cliente' => '',
            'url' => 'clientes',
            'method' => 'POST',
        ];
        return view('clientes.form', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $cliente = Cliente::create([
                'nome' => $request['cliente']['nome']
            ]);
            DB::commit();
            return redirect('clientes')->with('success', 'Cliente cadastrado com sucesso!');
        } catch(Exception $e) {
            DB::rollback();
            return redirect('clientes')->with('error', 'Erro! Cliente não cadastrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $data = [
            'cliente' => $cliente,
            'url'     => 'clientes/'.$id,
            'method'  => 'PUT',
        ];
        return view('clientes.form', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        DB::beginTransaction();
        try {
            $cliente->update([
                'nome' => $request['cliente']['nome']
            ]);
            DB::commit();
            return redirect('clientes')->with('success', 'Cliente atualizado com sucesso!');
        } catch(Exception $e) {
            DB::rollback();
            return redirect('clientes')->with('error', 'Erro ao atualizar cliente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::withTrashed()->findOrFail($id);
        if($cliente->trashed()) {
            $cliente->restore();
            return back()->with('success', 'Cliente reativado com sucesso!');
        } else {
            $cliente->delete();
            return back()->with('success', 'Cliente desativado com sucesso!');
        }
    }
}
