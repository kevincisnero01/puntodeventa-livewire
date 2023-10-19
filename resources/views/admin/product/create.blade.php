@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h2>Crear Producto</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
        </ol>
    </nav>
@stop

@section('content')


<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route'=>'products.store', 'method'=>'POST']) !!}

                    @include('admin.product._form')

                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>

                    <a href="{{route('products.index')}}" class="btn btn-light">
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
    <script defer src="https://unpkg.com/alpinejs-slug@latest/dist/slug.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@stop