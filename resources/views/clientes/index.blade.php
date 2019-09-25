@extends('layouts.app')
@section('content')
<div class='card'>
    <div class='card-header'>Cliente</div>
    <div class='card-body'>


        <div class="col-md-12">
            <div class="text-right">
                <a href="{{url('cliente/create')}}" class="btn btn-success">Novo Cliente</a>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Clientes Ativos</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th colspan='2'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['clientesAtivos'] as $cliente)
                                <tr>
                                    <td>{{$cliente->nome}}</td>
                                    <td><a href="{{url('cliente/'.$cliente->id.'edit')}}"></td>
                                    <td>
                                        <form action="{{url('clientes', [$cliente->id])}}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-danger" value="Desativar"/>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop