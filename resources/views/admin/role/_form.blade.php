<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("roles.show")]) !!}
    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

{{-- <div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("roles.show")]) !!}
    @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description', null, ['placeholder' => '', 'class' => 'form-control', isDisabled("roles.show")]) !!}
    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
</div> --}}

<div x-data="{ checkAll : false }">
<h3>Permisos especiales</h3>
<div class="form-group">
    <label><input type="radio" name="checkPermissions" value="true" @click="checkAll = true"> Acceso total</label>
    <label><input type="radio" name="checkPermissions" value="false" @click="checkAll = false"> Ningún acceso</label>
</div>

<h3>Lista de permisos</h3>
<div class="form-group">
<ul class="list-unstyled">
    @forelse ($permissions as $permission)
    <li>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, [ 'x-bind:checked' => 'checkAll']) !!}
            {{ $permission->name }}
            {{-- <em>({{$permission->description}})</em> --}}
        </label>
    </li>
    @empty
    <li>No hay permisos disponibles</li>
    @endforelse
</ul>
@error('permissions') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
</div>