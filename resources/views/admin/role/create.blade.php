@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Crear Roles</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registro</li>
        </ol>
    </nav>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route'=>'roles.store', 'method'=>'POST']) !!}

                    @include('admin.role._form')

                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>

                    <a href="{{route('roles.index')}}" class="btn btn-light">
                        Cancelar
                    </a>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@stop