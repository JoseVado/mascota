@extends('layouts.app')

@section('content')

<div class="container">
    <h6><small>Creado el: {{ $mascota->created_at }}</small></h6>
    <h6><small>Ultima actualización: {{isset($mascota->updated_at)?$mascota->updated_at:"Sin modificaciones" }}</small></h6>
<div class="jumbotron jumbotron-fluid">
    <h1 class="display-1">{{ $mascota->Nombre }}</h1>
    
    <div class="container-fluid" style="width:800px; margin:0 auto;">
        
        <div class="row">
            <div class="col-sm-auto">
                
                <img src="{{ asset('storage').'/'.$mascota->Foto }}" width="300" alt="">
                
            </div>
        
            <div class="col-sm-auto">
                <div class="container-fluid">
                    <h5 class="text-center"><strong>Folio</strong></h5>
                    <p class="text-center">{{ $mascota->id }}</p>
                    <h5 class="text-center"><strong>Tipo</strong></h5>
                    <p class="text-center">{{ $mascota->Tipo }}</p>
                    <h5 class="text-center"><strong>Edad</strong></h5>
                    <p class="text-center">{{ $mascota->Edad }}</p>
                    <h5 class="text-center"><strong>Enfermedades</strong></h5>
                    <p class="text-center">{{ $mascota->Enfermedades }}</p>
                </div>
            </div>
        </div>
        
    </div>
    
    <hr class="my-4">
</div>

<div class="row justify-content-between">
    <div class="col-8">
        <a href="{{ url('/mascota/') }}" class="btn btn-info">
            Regresar
        </a>
    </div>
    <div class="col-1">
        <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}" class="btn btn-info">
            Editar
        </a>
    </div>
    <div class="col-1">
        <form action="{{ url('/mascota/'.$mascota->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
        </form>
    </div>
    
</div>
</div>

@endsection