@extends('layouts.app')
@section('content')
<div class='card'>
    <div class='card-header'>Compras</div>
    <div class='card-body'>


        <div class="col-md-12">
            <div class="text-right">
                <a href="{{url('compras/create')}}" class="btn btn-success">Nova Compra</a>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Compras Realizadas por {{$data['compra']->cliente->nome}}</div>
                <div class="card-body">
                <table class="table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Produtos</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data['compra'] as $compra)
                                <tr>
                                    <td>{{$compra->data}}</td>
                                    @foreach($compra->produto as $produto)
                                        <td>{{$produto->nome}}</td>
                                    @endforeach
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