<div x-data="{ nameCategory: '' }">
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control', "x-model.lazy" => "nameCategory" , isDisabled("categories.show")]) !!}
        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['placeholder' => '', 'class' => 'form-control',"x-slug" => "nameCategory", isDisabled("categories.show")]) !!}
        @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('icon', 'Icono') !!}
        {!! Form::text('icon', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("categories.show")]) !!}
        @error('icon') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Descripción') !!}
        {!! Form::text('description', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("categories.show")]) !!}
        @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
</div>


