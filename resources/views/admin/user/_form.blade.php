<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['placeholder' => 'Nombre de usuario', 'class' => 'form-control', isDisabled("users.show")]) !!}
    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    {!! Form::label('email', 'Correo electrónico') !!}
    {!! Form::text('email', null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control', isDisabled("users.show")]) !!}
    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

<!--Solo mostrar en  el formulario de crear-->
@if(currentRoute() == "users.create")
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password',['class' => 'form-control']) !!}
        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
        {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
        @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
@endif

<!--Solo mostrar en  el formulario de crear y editar-->
@if(currentRoute() == "users.create" || currentRoute() == "users.edit")
    <h3>Listado de Roles</h3>
    <div class="form-group">
    <ul class="list-unstyled">
        @forelse($roles as $role)
        <li>
            <label>
                {!! Form::radio('role', $role->id , !empty($user) ? ($user->roles->first()->id == $role->id ? true : false) : null ) !!}
                {{ $role->name }}
                {{-- <em>({{$role->description}})</em> --}}
            </label>
        </li>
        @empty
        <li>No se encontraron roles disponibles.</li>
        @endforelse
    </ul>
    @error('roles') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
@endif


