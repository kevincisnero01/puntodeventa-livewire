<div x-data="{ nameCategory: '' }">
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control' , isDisabled("providers.show")]) !!}
        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Correo') !!}
        {!! Form::text('email', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("providers.show")]) !!}
        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('rif', 'RIF') !!}
        {!! Form::text('rif', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("providers.show")]) !!}
        @error('rif') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('address', 'Dirección') !!}
        {!! Form::text('address', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("providers.show")]) !!}
        @error('address') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('phone', 'Telefono') !!}
        {!! Form::text('phone', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("providers.show")]) !!}
        @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</div>


