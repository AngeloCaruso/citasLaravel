@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-6">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="mb-0">Nueva cita médica</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" class="form" role="form" action="{{ url('/citas/'.$cita->id) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Usuario</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="user_id" required>
                                @foreach($usuarios as $usuarioAct)
                                <option value="{{$usuarioAct->id}}" @if(isset($cita->usuario)) {{$cita->user_id == $usuarioAct->id ? 'selected' : ''}} @endif>{{$usuarioAct->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Fecha</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="datetime-local" name="fecha" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Médico</label>
                        <div class="col-lg-9">
                            <div class="card mb-3">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-4">
                                        <img src="data:image/png;base64,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" class="card-img" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <input class="editMedicoId" type="hidden" name="medico_id" value="{{$cita->id}}">
                                            <h5 class="card-title editMedicoNombre">{{$cita->medico}}</h5>
                                            <p class="card-text mb-0 editMedicoEspecialidad">{{$cita->especialidad}}</p>
                                            <p class="card-text editMedicoCiudad"><small class="text-muted">{{$cita->ciudad}}</small></p>
                                            <button class="btn btn-primary btnCambiarMedico" data-toggle="modal" data-target="#medicosModal">Cambiar médico</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                        <div class="col-lg-9">
                            <a href="{{ url('/citas') }}" class="btn btn-secondary"> Cancelar </a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('medicosModal')
@endsection