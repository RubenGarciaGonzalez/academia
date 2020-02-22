@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Detalles Módulo
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class="alert alert-info my-3">{{$text}}</p>
@endif
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($modulo->nombre)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <h5 class="card-title text-center">{{($modulo->id)}}</h5>
            <p class="card-text">
            <p><b>Nombre:</b> {{$modulo->nombre}}</p>
            <p><b>Horas:</b> {{$modulo->horas}}</p>
            <a href="{{route('modulos.index')}}" class="float-right btn btn-success my-3">Volver</a>
            <a href="{{route('alumnos.fmatricula', $alumno)}}" class="btn btn-primary float-right mr-3 my-3">Matricular Alumno</a>
            <a href="{{route('alumnos.fcalificar', $alumno)}}" class="btn btn-danger float-right mr-3 my-3">Calificar Alumno</a>            
        </div>
    </div>
@endsection