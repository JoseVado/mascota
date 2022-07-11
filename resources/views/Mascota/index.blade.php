@extends('layouts.app')

@section('content')
<div class="container">



<a href="{{ url('mascota/create') }}" class="btn btn-success"> Registrar nueva mascota</a>
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
{!! $mascotas->links() !!}
</div>
@endsection