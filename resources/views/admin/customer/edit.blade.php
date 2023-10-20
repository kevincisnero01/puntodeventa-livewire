@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h2>Editar Cliente</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                {!! Form::model($customer, ['route'=> ['customers.update', $customer], 'method'=>'PUT']) !!}

                    @include('admin.customer._form')

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>

                    <a href="{{route('customers.index')}}" class="btn btn-light">
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