<div x-data="{ nameProduct: '' }">
    <!--Solo mostrar en  el formulario de crear-->
    @if(currentRoute() == "products.show")
    <div class="form-group">
        {!! Form::label('code', 'Codigo') !!}
        {!! Form::number('code', null, ['placeholder' => '', 'class' => 'form-control',  isDisabled("products.show")]) !!}
        @error('code') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control',  isDisabled("products.show")]) !!}
        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('stock', 'Stock') !!}
        {!! Form::number('stock', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("products.show")]) !!}
        @error('stock') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('sell_price', 'Precio de Venta') !!}
        {!! Form::text('sell_price', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("products.show")]) !!}
        @error('sell_price') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('short_description', 'Descripción Corta') !!}
        {!! Form::text('short_description', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("products.show")]) !!}
        @error('short_description') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('long_description', 'Descripción Larga') !!}
        {!! Form::text('long_description', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("products.show")]) !!}
        @error('long_description') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Categoria') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...', isDisabled("products.show")] ) !!}
        @error('category_id') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('provider_id', 'Proveedor') !!}
        {!! Form::select('provider_id', $providers, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...', isDisabled("products.show")] ) !!}
        @error('provider_id') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Estado') !!}
        {!! Form::select('status', $statuses, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...', isDisabled("products.show")]) !!}
        @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>


