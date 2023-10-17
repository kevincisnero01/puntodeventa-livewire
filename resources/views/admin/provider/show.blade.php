@extends('adminlte::page')

@section('title', 'Detalle de  Proveedor')

@section('content_header')
    <h1>Detalle de Proveedor</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle</li>
        </ol>
    </nav>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::model($provider) !!}

                    @include('admin.provider._form')

                    <a href="{{route('providers.index')}}" class="btn btn-light">
                        Regresar
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