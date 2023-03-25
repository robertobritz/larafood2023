@extends('adminlte::page')

@section('title', "Detalhe do Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>

@stop

@section('content')
<link href="/css/boostrap.css" rel="stylesheet"> <! adicionando o boostrap !>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plan->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{ $plan->url}}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.')}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plan->description}}
                </li>
            </ul>
        </div>
    </div>
@endsection
