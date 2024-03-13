@extends('adminlte::page')

@section('title')
Listado de Sanciones
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Listado de Sanciones') }}
                        </span>

                        <div class="float-right">
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    @livewire('sanciones-listado')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script>
    function anular(id){
        Swal.fire({
                title: "ANULAR REGISTRO",
                text: "¿Está seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('cambiaEstado',id);
                }
            });
    }

    function cobrar(id){
        Swal.fire({
                title: "REALIZAR COBRO",
                text: "¿Está seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('realizarCobro',id);
                }
            });
    }
</script>


@endsection