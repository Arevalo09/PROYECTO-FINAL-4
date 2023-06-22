@extends('plantilla')
@section('contenido') 

<div class="row mt-3">

    <div class="col-md-6 offset-md-3">

        <div class="card">

            <div class="card-header" bg-dark text-white> Editar alumno </div>
            <div class="card-body">

            <form id="frmCarreras" method="POST" action="{{url('alumnos',[$alumno])}}">
                    @method('PUT')
                    @csrf 
                    <div class="input-group mb-3">

                        <span class="input-group-text"><i class="fa-solid fa-user"> </i> </span>
                        <input type="text" name="nombre" value="{{$alumno->nombre}}" class="from-control" maxlength="50" placeholder="nombre" required>

                    </div>

                     <div class="input-group mb-3">

                        <span class="input-group-text"><i class="fa-solid fa-at"> </i> </span>
                        <input type="email" name="correo" value="{{$alumno->correo}}" class="from-control" maxlength="50" placeholder="correo" required>

                    </div>

                     <div class="input-group mb-3">

                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"> </i> </span>
                        <iselect name="id_carrera" class="form-select" required>
                            <option value=""> Carrera </option>
                            @foreach($carreras as $row)
                                @if ($row->id == $alumno->id_carrera)
                                    <option selected value="{{$row->id}}"> {{ $row->carrera }} </option>
                                @else 
                                    <option value="{{$row->id}}"> {{ $row->carrera }} </option>
                                @endif
                            
                            @endforeach
                        </select>

                    </div>

                    <div class="d-grid col-6 mx-auto">
                        <button class="bnt bnt-success"> <i class="fa-solid fa-floppy-disk"> </i> Cerrar </button>

                    </div>

                </form>   

            </div>

        </div>

    </div>

</div>

@endsection