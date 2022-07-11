<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['mascotas'] = Mascota::paginate(2);
        return view('Mascota.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos = [
            'Nombre'=>'required|string|max:100',
            'Tipo'=>'required|string|max:100',
            'Edad'=>'required|integer|max:100',
            'Enfermedades'=>'required|string',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida',
        ];

        $this->validate($request,$campos,$mensaje);

        $datosMascota = $request->except('_token');

        if($request->hasFile('Foto')){
            $datosMascota['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Mascota::insert($datosMascota);
        return redirect('mascota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mascota = Mascota::findOrFail($id);
        return view('Mascota.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mascota = Mascota::findOrFail($id);
        return view('Mascota.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'Nombre'=>'required|string|max:100',
            'Tipo'=>'required|string|max:100',
            'Edad'=>'required|integer|max:100',
            'Enfermedades'=>'required|string',
            
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        $datosMascota = $request->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $mascota = Mascota::findOrFail($id);
            Storage::delete('public/'.$mascota->Foto);
            $datosMascota['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        
        Mascota::where('id',"=",$id)->update($datosMascota);

        return redirect('mascota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mascota = Mascota::findOrFail($id);

        if(Storage::delete('public/'.$mascota->Foto)){
            Mascota::destroy($id);
        }
        
        return redirect('mascota');
    }
}
