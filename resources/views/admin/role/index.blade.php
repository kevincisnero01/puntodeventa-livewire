@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<div class="row">
<div class="col-lg-12">
    <div class="float-left">
        <h2>Roles del sistema</h2>
    </div>

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('roles.create') }}">Crear Rol</a>
    </div>
</div>
<div class="col-lg-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item" aria-current="page">Roles</li>
        </ol>
    </nav>
</div>
</div>
@stop

@section('content')

    <x-action-session-message/>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>
                                        <a href="{{route('roles.show',$role)}}">{{$role->name}}</a>
                                    </td>
                                    <td>
                                        <!--editar-->
                                        <a class="btn btn-info" href="{{ route('roles.edit', $role) }}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <!--eliminar-->
                                        <form method="POST" action="{{ route('roles.destroy', $role) }}" id="delete-item_{{$role->id}}" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" title="Eliminar"
                                                class="btn btn-danger delete-confirm"
                                                onclick="return confirm('¿Estas seguro que quieres eliminar este registro?');"
                                                >
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--paginacion-->
                        <div>
                            {{ $roles->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop