<h1>{{$modo}} mascota</h1>

@if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach ( $errors->all() as $error )
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    
@endif

<div class="form-group">

<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ isset($mascota->Nombre)?$mascota->Nombre:old('Nombre') }}" id="Nombre" class="form-control">

</div>

<div class="form-group">

<label for="Tipo">Tipo</label>
<input type="text" name="Tipo" value="{{isset($mascota->Tipo)?$mascota->Tipo:old('Tipo') }}" id="Tipo" class="form-control">

</div>

<div class="form-group">

<label for="Edad">Edad</label>
<input type="text" name="Edad" value="{{isset($mascota->Edad)?$mascota->Edad:old('Edad') }}" id="Edad" class="form-control">

</div>

<div class="form-group">

<label for="Enfermedades">Enfermedades</label>
<input type="text" name="Enfermedades"  value="{{isset($mascota->Enfermedades)?$mascota->Enfermedades:old('Enfermedades') }}"id="Enfermedades" class="form-control">

</div>

<div class="form-group">


@if (isset($mascota->Foto))
    <img src="{{ asset('storage').'/'.$mascota->Foto }}" width="100" alt="">
@endif
<input type="file" name="Foto" id="Foto" class="form-control">

</div>

<input type="submit" value="{{$modo}} datos" class="btn btn-success">
<a href="{{ url('mascota/') }}" class="btn btn-primary"> Regresar</a>