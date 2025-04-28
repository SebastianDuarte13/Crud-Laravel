@extends('layouts.app')
@section('content')
    <div class="card text-start">

        <div class="card-body">
            <h4 class="card-title">añadir un libro</h4>
            <form action="{{ route('libros.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titulo">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Titulo del libro"
                        required>
                </div>
                <div class="form-group">
                    <label for="Descripcion">Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                        placeholder="Descripcion del libro" required>
                </div>
                <div class="form-group">
                    <label for="Autor">Autor:</label>
                    <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor del libro" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>


            </form>
            @if (session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>

            @endif
        </div>
    </div>

@endsection