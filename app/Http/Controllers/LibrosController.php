<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libros; // Asegúrate de importar el modelo Libro

class LibrosController extends Controller
{
    public function crear(){
        return view('libros.crear');
    }

    public function leer(){
        $libros = Libros::all();
        return view('libros.leer', compact('libros'));
    }
    public function update(Request $request, libros $libro){
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:255',
            
        ]);

        $libro->update($request->all());  

        return redirect()->back()->with('success', 'Libro actualizado exitosamente.');

    }

    public function eliminar(){
        $libros = Libros::all();
        return view('libros.eliminar', compact('libros'));
    }

    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:255',
            
        ]);

        $libros = new Libros();
        $libros->name = $request->name;
        $libros->descripcion = $request->descripcion;
        $libros->autor = $request->autor;

        $libros->save();

        return redirect()->back()->with('success', 'Libro guardado exitosamente.');

    }

//     public function destroy(Libros $libro)
// {
//     $libro->delete();
//     return redirect()->back()->with('success', 'Libro eliminado exitosamente.');
// }

    public function destroy($id)
    {
        $libro = Libros::findOrFail($id);
        $libro->delete();
        return redirect()->back()->with('success', 'Libro eliminado exitosamente.');
    }
}

