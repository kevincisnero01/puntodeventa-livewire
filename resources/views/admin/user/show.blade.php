@extends('adminlte::page')

@section('title', 'Detalle de  Usuario')

@section('content_header')
    <h1>Detalle de Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle</li>
        </ol>
    </nav>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::model($user) !!}

                    @include('admin.user._form')

                    <a href="{{route('users.index')}}" class="btn btn-light">
                        Regresar
                    </a>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi Detalle'); </script>
@stop