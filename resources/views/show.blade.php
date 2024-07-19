<style>
    .action-button {
        background-color: #007bff; /* Color azul similar al de Bootstrap */
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        margin-left: 10px;
        display: inline-block;
    }

    .delete-button {
        background-color: #f44336; /* Color rojo para el botón de eliminar */
    }
</style>

@extends('layout')

@section('title','Servicio | ' . $servicio->titulo)

@section('content')
<table cellpadding="3" cellspacing="5">
    <tr>
        <td colspan="4">
            {{ $servicio->titulo }}
            @auth
                <a href="{{ route('servicios.edit', $servicio) }}" class="action-button">Editar</a>
                <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="action-button delete-button">Eliminar</button>
                </form>
            @endauth
        </td>
    </tr>
    <tr>
        <td colspan="4">{{ $servicio->descripcion }}</td>
    </tr>
    <tr>
        <td colspan="4">{{ $servicio->created_at->diffForHumans() }}</td>
    </tr>
</table>
@endsection
