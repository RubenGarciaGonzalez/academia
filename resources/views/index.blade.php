@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Academia S.A.
@endsection
@section('contenido')
    <div class="text-center mt-3">
        <a href="{{route('alumnos.index')}}" class="btn btn-info mr-3">Gestionar Alumnos</a>
        <a href="{{route('modulos.index')}}" class="btn btn-success mr-3">Gestionar Módulos</a>
    </div>
@endsection