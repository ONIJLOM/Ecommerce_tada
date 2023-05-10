<br>
<h1> {{ $modo }} ROL </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="text" placeholder="Rol" name="name" class="form-control" id="Rol"
        value="{{ isset($role->name) ? $role->name : old('name') }}">
    <label for="exampleInputPassword1" class="form-label">Name Rol</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="" >Permisos Para Este Rol: </label><br>
        @foreach ($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                {{ $value->name }}</label><br>
        @endforeach
    </div>
</div><br>

<button type="submit" class="btn btn-primary" value="update">{{ $modo }} ROL</button>

<a href="{{ url('role') }}" class="btn btn-success"> Regresar </a>
