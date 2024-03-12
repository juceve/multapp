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
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script>
    window.onload = function() {
    $('.dataTableL').DataTable({
        destroy:true,
        searching: false,
        layout: {
            topEnd: {
                buttons: ['excel', 'pdf', 'print']
            }
        },
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
        },
        });
};
</script>
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
</script>
<script>
    Livewire.on('renderizarpdf', data => {
        var win = window.open("../pdf/boleta/" + data, '_blank');
        win.focus();
    });
</script>
@endsection