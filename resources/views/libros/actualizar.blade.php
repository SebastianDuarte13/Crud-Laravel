@extends('layouts.app')
@section('content')

<!-- Modal -->
<div class="modal fade" id="modal{{ $libro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Libro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('libros.update', $libro) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="nombre" value="{{ $libro->nombre }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $libro->descripcion }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="autor">Autor:</label>
                    <input type="text" class="form-control" id="autor" name="autor" value="{{ $libro->autor }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  

@endsection