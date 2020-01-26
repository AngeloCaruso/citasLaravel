@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-sm-6">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="mb-0">Nuevo médico</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" class="form" role="form" action="{{ url('/medicos') }}" method="post">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="nombre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Especialidad</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="especialidad" required>
                                <option selected diabled value="">Elija un usuario</option>
                                <option value="Medico general">Médico general</option>
                                <option value="Anestesiologia">Anestesiología</option>
                                <option value="Cardiologia">Cardiología</option>
                                <option value="Gastrointerologia">Gastrointerología</option>
                                <option value="Endocrinologia">Endocrinología</option>
                                <option value="Infectologia">Infectología</option>
                                <option value="Pediatria">Pediatría</option>
                                <option value="Neumologia">Neumología</option>
                                <option value="Psiquiatria">Psiquiatría</option>
                                <option value="Alergologia">Alergología</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Ciudad</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="ciudad" required>
                                <option selected diabled value="">Elija una ciudad</option>
                                <option value="Barranquilla">Barranquilla</option>
                                <option value="Cali">Cali</option>
                                <option value="Medellin">Medellín</option>
                                <option value="Bogota">Bogotá</option>
                                <option value="Cartagena">Cartagena</option>
                                <option value="Santa Marta">Santa Marta</option>
                            </select>
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

@endsection