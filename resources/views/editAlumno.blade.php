@extends('plantilla')
@section('contenido')
<div>
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="{{ url('alumnos', [$alumno]) }}" id="frmAlumnos" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="nombre" value="{{ $alumno->nombre}}" class="form-control" maxlength="50" placeholder="Nombre" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                        <input type="email" name="correo" value="{{ $alumno->correo}}" class="form-control" maxlength="50" placeholder="Correo" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <select name="" id="fk_carrera" class="form-select">
                            @foreach ($carrera as $row)
                                @if ($row->id[0] == $alumno->fk_carrera)
                                {{-- le indicamos que debe estar seleccionado la opcion --}}
                                    <option selected value="{{ $row->id }}">{{ $row->carrera }}</option>
                                @else
                                {{-- en caso contrario si no es igual no va estar seleccionado --}}
                                    <option value="{{ $row->id }}">{{ $row->carrera }}</option>
                                @endif
                            @endforeach
                        </select>
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
