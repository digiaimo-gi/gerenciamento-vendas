@extends('layouts.app')
@section('content')
<div class='card'>
    <div class='card-header'>Produto</div>
    <div class='card-body'>


        <div class="col-md-12">
            <div class="text-right">
                <a href="{{url('produtos/create')}}" class="btn btn-success">Novo Produto</a>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Produtos Ativos</div>
                <div class="card-body">
                <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th colspan='2'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['produtosAtivos'] as $produto)
                                <tr>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->valor}}</td>
                                    <td>
                                        <a href="{{url('produtos/'. $produto->id. '/edit')}}" class="btn btn-warning">Editar</a></td>
                                    <td>
                                        <form action="produtos/ {{$produto->id}}" method="POST">
                                            @method("DELETE")
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-danger" value="Desativar"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                    <div class="card-header">Produtos Inativos</div>
                    <div class="card-body">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Valor</th>
                                    <th colspan='2'>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['produtosInativos'] as $produto)
                                    <tr>
                                        <td>{{$produto->nome}}</td>
                                        <td>{{$produto->valor}}</td>
                                        <td>
                                            <form action="produtos/ {{$produto->id}}" method="POST">
                                                @method("DELETE")
                                                {{csrf_field()}}
                                                <input type="submit" class="btn btn-danger" value="Reativar"/>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop