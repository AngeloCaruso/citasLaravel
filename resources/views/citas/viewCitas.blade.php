@extends('layout')

@section('content')
<h1 class="mt-5">Citas médicas</h1>
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicosModal">
            Crear cita
        </button>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover text-center mb-0">
            <thead>
                <th>#</th>
                <th>Fecha de la consulta</th>
                <th>Usuario</th>
                <th>Especialidad</th>
                <th>Medico asignado</th>
                <th>Ciudad</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cita->fecha}}</td>
                    <td>{{$cita->usuario}}</td>
                    <td>{{$cita->especialidad}}</td>
                    <td>{{$cita->medico}}</td>
                    <td>{{$cita->ciudad}}</td>
                    <td>
                        <a class="btn btn-warning btn-block mb-1" href="{{ url('/citas/'.$cita->id.'/edit') }}">Editar</a>
                        <form action="{{ url('/citas/'.$cita->id) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger btn-block" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
@include('medicosModal')
@endsection