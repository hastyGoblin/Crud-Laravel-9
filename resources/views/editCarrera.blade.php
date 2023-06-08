@extends('plantilla')
@section('contenido')
<div>
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="{{ url("carreras", [$carrera])}}" id="frmCarreras" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        {{-- en un value precargamos el valor de la carrera, carrerara es nuestro objeto que contiene toda la informacion de registros de la carrera
                            y carrera que esta a la derecha es el nombre de la columna --}}
                        <input type="text" name="carrera" value="{{ $carrera->$carrera}}" class="form-control" maxlength="50" placeholder="Carrera" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
