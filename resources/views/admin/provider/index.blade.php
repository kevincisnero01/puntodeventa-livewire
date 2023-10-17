@extends('adminlte::page')

@section('title','Gestión de categorías')

@section('content_header')
<div class="row">
<div class="col-lg-12">
    <div class="float-left">
        <h2>Listado de Proveedores</h2>
    </div>

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('providers.create') }}">
            <i class="fas fa-plus"></i> Crear Proveedor
        </a>
    </div>
</div>
<div class="col-lg-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Panel</a></li>
            <li class="breadcrumb-item" aria-current="page">Proveedores</li>
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
                                    <th>Dirección</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <td>
                                        {{ $provider->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('providers.show', $provider) }}">{{ $provider->name }}</a>
                                        <br>
                                        {{ $provider->email }}
                                    </td>
                                    <td>
                                        {{ $provider->address }}
                                    </td>
                                    <td>
                                        {{ $provider->phone }}
                                    </td>
                                    <td>
                                        <!--editar-->
                                        <a class="btn btn-info" href="{{ route('providers.edit', $provider) }}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <!--eliminar-->
                                        <form method="POST" action="{{route('providers.destroy',$provider)}}" id="delete-item_{{$provider->id}}" class="d-inline">
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
                    {{$providers->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
