@extends('layouts.app')
@section('content')
    <div class="card text-start">

        <div class="card-body">
            <h4 class="card-title">eliminar un libro</h4>
            <form action="{{ route('libros.destroy') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="IdLibro">Id del Libro:</label>
                    <input type="text" class="form-control" id="IdLibro" name="IdLibro" placeholder="Titulo del libro"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </form>
            @if (session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>

            @endif
            @if (session('error'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('error') }}
                </div>

            @endif
        </div>
    </div>

@endsection