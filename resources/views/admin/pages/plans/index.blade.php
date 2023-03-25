@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create')}}" class="btn btn-dark">ADD</a></h1>

@stop

@section('content')
<link href="/css/boostrap.css" rel="stylesheet"> <! adicionando o boostrap !>
    <div class="card">
        <div class="card-header">
            #filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
               <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name}}
                            </td>
                            <td>
                                {{ $plan->price}}
                            </td>
                            <td width="50">
                                <a href="" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop
