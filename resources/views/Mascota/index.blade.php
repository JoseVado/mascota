@extends('layouts.app')

@section('content')
<div class="container">


<a href="{{ url('mascota/create') }}" class="btn btn-success"> Registrar nueva mascota</a>
<div class="card-group" style={{count($mascotas)==1?'width:300px; height: 300px;':'width:900px; height: 900px;'}} >
    @foreach ($mascotas as $mascota)
    <div class="card"> 
        <img src="{{ asset('storage').'/'.$mascota->Foto }}" class="img-responsive" alt="Card image cap">
       
        <div class="card-body">
            <h5 class="card-title">{{ $mascota->Nombre }}</h5>
            <p class="card-text">{{ $mascota->Enfermedades }}</p>
            <p class="card-text"><small class="text-muted">{{isset($mascota->updated_at)?
                'Modificado el:'.$mascota->updated_at:
                "Creado el:".$mascota->created_at }}</small></p>
            <a href="{{ url('/mascota/'.$mascota->id) }}" class="btn btn-warning">
                Mostrar más
            </a>
        </div>
    </div>
    @endforeach
</div>
<!--
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
            <th>Enfermedades</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mascotas as $mascota)
        <tr>
            <td>{{ $mascota->id }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$mascota->Foto }}" width="100" alt="">
            </td>
            <td>{{ $mascota->Nombre }}</td>
            <td>{{ $mascota->Tipo }}</td>
            <td>{{ $mascota->Edad }}</td>
            <td>{{ $mascota->Enfermedades }}</td>
            <td>
                <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}" class="btn btn-warning">
                    Editar
                </a>

                |

                <form action="{{ url('/mascota/'.$mascota->id) }}" method="post" class="d-inline">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
-->


{!! $mascotas->links() !!}
</div>
@endsection