@extends('adminlte::page')

@section('title', "Permissões do Cargo {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" class="">Cargos</a></li>
    </ol>
    <h1>Permissões do Cargo <strong>{{ $role->name }} </strong>
        <a href="{{ route('roles.permissions.available', $role->id)}}" class="btn btn-dark">ADD NOVO PERMISSÃO</a>
    </h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
               <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50px">Ação</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name}}
                            </td>
                            <td style="width=1000px">
                                <a href="{{ route('roles.permission.detach', [ $role->id, $permission->id]) }}" class="btn btn-danger">Remover</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $permissions->appends($filters)->links() !!}
            @else
            {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
