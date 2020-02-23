@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Gestión de Modulos
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-danger my-3">{{$text}}</p>
@endif
<a href="{{route('modulos.create')}}" class="btn btn-info mb-3"><i class="fa fa-plus mr-2"></i>Crear Módulo</a>
<a href="{{route('alumnos.index')}}" class="btn btn-danger mb-3 float-right"><i class="fa fa-undo mr-2"></i>Ir a Alumnos</a>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Detalles</th>
            <th scope="col" class="align-middle">Nombre</th>
            <th scope="col" class="align-middle">Horas</th>
            <th scope="col" class="align-middle">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($modulos as $modulo)
                <tr>
                    <th scope="row">
                        <a href="{{route('modulos.show', $modulo)}}" class="btn btn-primary fa fa-address-card fa-3x ">
                        </a>
                    </th>
                    <td class="align-middle">{{$modulo->nombre}}</td>
                    <td class="align-middle">{{$modulo->horas}}</td>
                    <td class="align-middle">
                    <form class="form-inline" name="del" action="{{route('modulos.destroy', $modulo)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Borrar Módulo?')" class="btn btn-danger fa fa-trash fa-2x"></button>
                        <a href="{{route('modulos.edit', $modulo)}}" class="btn btn-warning fa fa-edit fa-2x ml-3"></a>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$modulos->links()}}
@endsection