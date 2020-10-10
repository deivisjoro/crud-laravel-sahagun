@extends('layouts.default')

@section('titulo', 'Listado de estudiantes')


@section('contenido')

<h2>Listado de Estudiantes</h2>
<div class="container p-5">
    <div class="alert alert-primary">
        <a href="{{route('estudiantes.create')}}" class="btn btn-primary">Ingresar</a>
    </div>    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>N</th>
                <th>Estudiantes</th>
                <th colspan="3">Notas</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($estudiantes->count())
               
               @foreach($estudiantes as $i => $estudiante)
               
                <tr>
                        <td>{{($i+1)}}</td>
                        <td>{{$estudiante->nombre}}</td>
                        <td>{{$estudiante->nota1}}</td>
                        <td>{{$estudiante->nota2}}</td>
                        <td>{{$estudiante->nota3}}</td>
                        <td>{{($estudiante->nota1+$estudiante->nota2+$estudiante->nota3)/3}}</td>
                        <td>
                                <div class="row">
                                <a class="btn btn-warning" href="{{route('estudiantes.edit', $estudiante)}}">Editar</a>
                                <form action="{{route('estudiantes.destroy', $estudiante)}}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger ml">Eliminar</button>
                                </form>
                                </div>
                        </td>
                </tr>         

               @endforeach                         

            @else
                <tr>
                    <td colspan="7">
                        <div class="alert alert-warning">
                                No se encontraron registros
                        </div>
                    </td>
                </tr>
            @endif          
        </tbody>    
    </table>  
    {{$estudiantes->links()}}  
</div>

@endsection

