@extends('layouts.default')

@section('titulo', 'Ingresar Estudiantes')


@section('contenido')

<h2>Editar Estudiante [{{$estudiante->nombre}}]</h2>
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
@endif
<div class="container p-5">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h4>DATOS DEL ESTUDIANTE</h4>
            </div>
            <form action="{{route('estudiantes.update', $estudiante)}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre..." value="{{old('nombre', $estudiante->nombre)}}">*
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="nota1" class="form-control" placeholder="Ingrese la nota 1..." value="{{old('nota1', $estudiante->nota1)}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nota2" class="form-control" placeholder="Ingrese la nota 2..." value="{{old('nota2', $estudiante->nota2)}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nota3" class="form-control" placeholder="Ingrese la nota 3..." value="{{old('nota3', $estudiante->nota3)}}">
                    </div>
                </div>
                <div class="card-footer row">
                    <div class="col-md-6">
                        <input type="submit" value="Guardar" class="btn btn-success btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('estudiantes.index')}}" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

