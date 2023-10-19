@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
        </ol>
    </nav>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::model($product, ['route'=> ['products.update', $product], 'method'=>'PUT']) !!}

                    @include('admin.product._form')

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>

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

@stop