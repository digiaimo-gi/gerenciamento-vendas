@extends('layouts.app')
@section('content')
<div class='card'>
    <div class='card-header'>Painel</div>
    <div class='card-body'>

        <h6>Navegação</h6>
        <hr>

        <div class="row">

            <div class="col">
                <ul class="list-inline">
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/clientes">Clientes</a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/produtos">Produtos</a></li>
                    <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="/compras">Compras</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop