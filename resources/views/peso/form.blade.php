<br>
<h1> {{ $modo }} PESO </h1>
@include('layouts.partials.messages')
<div class="form-floating mb-3">
    <input type="integer" placeholder="gramos" name="gramos" class="form-control" id="gramos"
        value="{{ isset($peso->gramos) ? $peso->gramos : old('gramos') }}">
    <label for="exampleInputPassword1" class="form-label">Peso En Gramos</label>
</div>
<button type="submit" class="btn btn-primary" value="update">{{ $modo }} PESO</button>
<a href="{{ url('peso') }}" class="btn btn-success"> Regresar </a>
