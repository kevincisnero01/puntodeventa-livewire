@extends('adminlte::page')

@section('title','Gestión de usuarios del sistema')

@section('content_header')



<div class="row">
<div class="col-lg-12">
    <div class="float-left">
        <h2>Usuarios del sistema</h2>
    </div>

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('users.create') }}">Crear Usuario</a>
    </div>
</div>
<div class="col-lg-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item" aria-current="page">Usuarios</li>
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
                <table id="users_listing" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <!--nombre-->
                            <td><a href="{{route('users.show',$user)}}">{{$user->name}}</a></td>
                            <!--correo-->
                            <td>{{$user->email}}</td>
                            <!--roles-->
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $rol)
                                    <label class="badge badge-success">{{ $rol }}</label>
                                @endforeach
                                @endif
                            </td>
                            <!--acciones-->
                            <td>
                                <!--editar-->
                                <a class="btn btn-info" href="{{ route('users.edit', $user) }}" title="Editar">
                                    <i class="far fa-edit"></i>
                                </a>
                                <!--eliminar-->
                                <form method="POST" action="{{route('users.destroy',$user)}}" id="delete-item_{{$user->id}}" class="d-inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="button" 
                                        class="btn btn-danger delete-confirm"
                                        onclick="confirmDelete('delete-item_{{$user->id}}')" title="Eliminar">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
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
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
