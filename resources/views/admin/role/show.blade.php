@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
<div class="col-lg-12">
    <h2>Detalles de Rol</h2>
</div>
<div class="col-lg-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item" aria-current="page">Detalle </li>
        </ol>
    </nav>
</div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="border-bottom text-center pb-4" title="Rol">
                            <h3>{{$role->name}}</h3>
                        </div>
                        <div class="border-bottom py-4">
                            <div class="list-group">
                                <a id="list-1" data-toggle="list" href="#list-permissions" role="tab" aria-controls="permissions" 
                                    class="list-group-item list-group-item-action active" >
                                    Permisos
                                </a>
                                <a id="list-2" data-toggle="list" href="#list-users" role="tab" aria-controls="users"
                                    class="list-group-item list-group-item-action" >
                                    Usuarios
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 pl-lg-5">
                        <div class="tab-content" id="nav-tabContent">
                            <!--Permisos-->
                            <div class="tab-pane fade show active" id="list-permissions" role="tabpanel" aria-labelledby="list-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Permisos asignados al Rol</h4>
                                    </div>
                                </div>
                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">

                                        <div class="table-responsive">
                                            <table id="order-listing" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Nombre</th>
                                                        {{-- <th>Slug</th>
                                                        <th>Descripción</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($role->permissions as $permission)
                                                    <tr>
                                                        <th>{{$permission->id}}</th>
                                                        <td>{{$permission->name}}</td>
                                                        {{-- <td>{{$permission->slug}}</td>
                                                        <td>{{$permission->description}}</td> --}}
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--Usuarios-->
                            <div class="tab-pane fade" id="list-users" role="tabpanel" aria-labelledby="list-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Usuarios con el Rol</h4>
                                    </div>
                                </div>
                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">

                                        <div class="table-responsive">
                                            <table id="order-listing1" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($role->users as $user)
                                                    <tr>
                                                        <th>{{$user->id}}</th>
                                                        <!--nombre-->
                                                        <td>
                                                            <a href="{{route('users.show',$user)}}">{{$user->name}}</a>
                                                        </td>
                                                        <!--correo-->
                                                        <td>{{$user->email}}</td>
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
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">No se encontraron registros.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{route('roles.index')}}" class="btn btn-primary float-right">Regresar</a>
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