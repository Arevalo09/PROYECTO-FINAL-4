@extends('plantilla')
@section('contenido') 

<div class="row mt-3">

    <div class="col-md-6 offset-md-3">

        <div class="card">

            <div class="card-header" bg-dark text-white> Editar carrera </div>
            <div class="card-body">

            <form id="frmCarreras" method="POST" action="{{url('Carrera',[$carrera])}}">
                    @method('PUT') 
                    @csrf 
                    <div class="input-group mb-3">

                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"> </i> </span>
                        <input type="text" name="carrera" value="{{ $carrera->carrera}}" class="from-control" maxlength="50" placeholder="Carrera" required>

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