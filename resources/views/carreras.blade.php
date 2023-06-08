@extends('plantilla')
@section('contenido')
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            {{-- boton responsivo --}}
            <div class="d-grid mx-auto">
                {{-- boton de color negro y abrira el modal de carreras --}}
                <button class="btn btn-dark openModal" data-bs-toggle="modal" data-bs-target="#modalCarreras">
                    {{-- icono del estilo Font Awesome --}}
                    <i class="fa-solid fa-circle-plus"></i> Añadir
                </button>
            </div>
        </div>
    </div>
    {{-- Table de contenido --}}
    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Carrera</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- variable en php que se ira incrementando --}}
                        @php
                            $i = 1;
                        @endphp
                        {{-- el foreach es para poder trar datos mediente una variable --}}
                        @foreach ($carreras as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->carrera }}</td>
                                {{-- boton de edita con un link hacia un formulario para editar --}}
                                <td>
                                    <a href="{{ url('carreras', [$row]) }}" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
                                    {{-- <button class="btn btn-warning"><i class="fa-solid fa-edit"></i></button> --}}
                                </td>
                                {{-- el boton de eliminar lo metemos en un formulario donde se enviara informacion por el metodo POST --}}
                                <td>
                                    <form action="{{ url('carreras', [$row]) }}" method="POST">
                                        @method("delete")
                                        @csrf
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL CHINGON--}}
    <div class="modal fade" id="modalCarreras" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5" id="titulo_modal">Añadir carrera</label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('carreras') }}" id="frmCarreras" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                            <input type="text" name="carrera" class="form-control" maxlength="50" placeholder="Carrera" required>
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCarrera" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
