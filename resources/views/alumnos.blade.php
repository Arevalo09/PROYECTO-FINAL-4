
@extends('plantilla')
@section('contenido')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equip="X-UA-Compatible" context="ie=edge">
        <title> CRUD Laravel </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/45900edf3d.js" crossorigin="anonymous"></script>

    </head>

    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx auto">
                <button class="btn btn-dark openModal" data-bs-toggle="modal" data-bs-target="#modalAlumnos">
                    <i class="fa-solid fa-circle-plus"> </i> Añadir
                </button>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ALUMNO</th>
                            <th>CORREO</th>
                            <th>CARRERA</th>
                            <th>EDITAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @php $i=1; @endphp
                        @foreach($alumnos as $row)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td> {{ $row->nombre }} </td>
                            <td> {{ $row->correo }} </td>
                            <td> {{ $row->carrera }} </td>
                        </tr>

                        <tr>
                            <a href="{{ url('alumnos', [$row])}}" class="btn btn-warning"><i class="fa-solid fa-edit"> </i></a>
                        </tr>

                        <tr>
                            <form method="POST" action="{{ url('alumnos',[$row]) }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"> <i class="fa-solid fa-trash"> </i></button>
                            </form>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modalCarreras" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <label class="h5" id="titulo_modal"> Añadir alumnos </label>
                    <button type="button" class="btn-close" data-ds-dismiss="modal" aria-label="Close"> </button>

                </div>

                <div class="modal-body">
                    <form id="frmCarreras" method="POST" action="{{url('alumnos')}}">
                        @csrf
                        <div class="input-group mb-3">

                            <span class="input-group-text"><i class="fa-solid fa-user"> </i> </span>
                            <input type="text" name="nombre" class="from-control" maxlength="50" placeholder="nombre" required>

                        </div>

                        <div class="input-group mb-3">

                            <span class="input-group-text"><i class="fa-solid fa-at"> </i> </span>
                            <input type="email" name="correo" class="from-control" maxlength="50" placeholder="correo" required>

                        </div>

                        <div class="input-group mb-3">

                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"> </i> </span>
                            <iselect name="id_carrera" class="form-select" required>
                                <option value=""> Carrera </option>
                                @foreach($carreras as $row)
                                <option value="{{$row->id}}"> {{ $row->carrera }} </option>
                                @endforeach
                                </select>

                        </div>

                        <div class="d-grid col-6 mx-auto">
                            <button class="bnt bnt-success"> <i class="fa-solid fa-floppy-disk"> </i> Cerrar </button>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">

                    <button type="button" id="btnCerrar" class="btn btn-secondary" data-ds-dismiss="modal"> Cerrar </button>

                </div>

            </div>

        </div>

    </div>

@endsection
