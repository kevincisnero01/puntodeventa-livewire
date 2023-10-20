<div x-data="{ selectedOption : '' }">

    @if(currentRoute() == "customers.create") 
    <div class="form-group">
        {!! Form::label('type', 'Tipo') !!}
        {!! Form::select('type', ['Natural' => 'Natural', 'Juridico' => 'Juridico'], null, [
            'class' => 'form-control', 
            'placeholder' => 'Seleccione una opcion...', 
            'x-model.live' => 'selectedOption',
            isDisabled("products.show")]) !!}
        @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="form-group" x-show="selectedOption == 'Juridico'"  {{ (currentRoute() == "customers.show" ? (!$customer->isJuridico() ? 'style=display:none' : '') : '') }} >
        {!! Form::label('rif', 'Registro de Información Fiscal (RIF) ') !!} 
        {!! Form::text('rif', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("customers.show")]) !!}
        @error('rif') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group" x-show="selectedOption == 'Natural'" {{ (currentRoute() == "customers.show" ? (!$customer->isNatural() ? 'style=display:none' : '') : '') }} >
        {!! Form::label('ci', 'Cedula de Identidad (CI)') !!}
        {!! Form::number('ci', null, ['placeholder' => '', 'class' => 'form-control',  isDisabled("customers.show")]) !!}
        @error('ci') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control',  isDisabled("customers.show")]) !!}
    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('phone', 'Telefono') !!}
    {!! Form::text('phone', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("customers.show")]) !!}
    @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("customers.show")]) !!}
    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('address', 'Dirección') !!}
    {!! Form::text('address', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("customers.show")]) !!}
    @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
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



