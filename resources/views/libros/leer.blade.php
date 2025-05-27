@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Sistema de Gestión de Libros</h1>

    {{-- Botón para crear nuevo libro --}}
    <div class="mb-3 text-end">
        <a href="{{ route('libros.crear') }}" class="btn btn-success">+ Nuevo Libro</a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de libros --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Autor</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                    <tr>
                        <td>{{ $libro->name }}</td>
                        <td>{{ $libro->descripcion }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td class="text-center">
                            {{-- Botón para abrir modal de edición --}}
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $libro->id }}">Editar</button>

                            {{-- Formulario de eliminación --}}
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este libro?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    {{-- Modal de edición --}}
                    <div class="modal fade" id="editModal{{ $libro->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $libro->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $libro->id }}">Editar Libro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name{{ $libro->id }}" class="form-label">Nombre</label>
                                            <input type="text" name="name" class="form-control" id="name{{ $libro->id }}" value="{{ $libro->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion{{ $libro->id }}" class="form-label">Descripción</label>
                                            <textarea name="descripcion" class="form-control" id="descripcion{{ $libro->id }}" required>{{ $libro->descripcion }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="autor{{ $libro->id }}" class="form-label">Autor</label>
                                            <input type="text" name="autor" class="form-control" id="autor{{ $libro->id }}" value="{{ $libro->autor }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay libros registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
