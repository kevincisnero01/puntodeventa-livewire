@extends('adminlte::page')

@section('title', 'Crear Proveedor')

@section('content_header')
    <h2>Crear Proveedor</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
        </ol>
    </nav>
@stop

@section('content')


<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route'=>'providers.store', 'method'=>'POST']) !!}

                    @include('admin.provider._form')

                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>

                    <a href="{{route('providers.index')}}" class="btn btn-light">
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
@stop