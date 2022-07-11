@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/mascota/'.$mascota->id) }}" method="post" enctype="multipart/form-data">
    @csrf   
    {{ method_field('PATCH') }}
    @include('Mascota.form',['modo'=>'Editar'])
</form>
</div>
@endsection
