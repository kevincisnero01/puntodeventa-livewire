@extends('adminlte::page')

@section('title','Gestión de categorías')

@section('content_header')
<div class="row">
<div class="col-lg-12">
    <div class="float-left">
        <h2>Listado de Productos</h2>
    </div>

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('products.create') }}">
            <i class="fas fa-plus"></i> Crear Producto
        </a>
    </div>
</div>
<div class="col-lg-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item" aria-current="page">Productos</li>
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
                        <table id="category_listing" class="table tree">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Categoria</th>
                                    <th>Proveedor</th>
                                    <th>status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                    </td>
                                    <td>
                                        {{ $product->stock }}
                                    </td>
                                    <td>
                                        {{ $product->category->name }}
                                    </td>
                                    <td>
                                        {{ $product->provider->name }}
                                    </td>
                                    <td>
                                        {{ $product->status }}
                                    </td>
                                    <td>
                                        <!--editar-->
                                        <a class="btn btn-info" href="{{ route('products.edit', $product) }}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <!--eliminar-->
                                        <form method="POST" action="{{route('products.destroy',$product)}}" id="delete-item_{{$product->id}}" class="d-inline">
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
                    </div>
                </div>
                <div class="card-footer text-muted">
                    {{$products->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
