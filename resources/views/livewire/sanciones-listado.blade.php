<div>

    <div class="row">
        <div class="col-12 col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Inicio</span>
                </div>
                <input type="date" class="form-control" wire:model='fechaI'>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Final</span>
                </div>
                <input type="date" class="form-control" wire:model='fechaF'>
            </div>
        </div>
        <div class="col-12 col-md-2 mb-3">
            <input type="search" class="form-control" wire:model.debounce.700ms='socio' placeholder="Nombre de Socio">
        </div>
        <div class="col-12 col-md-2 mb-3">
            <select name="" class="form-control" wire:model='pasillo'>
                <option value="">Todos los Pasillos</option>
                @foreach ($pasillos as $item)
                <option value="{{$item->pasillo}}">{{$item->pasillo}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-2 mb-3">
            <select class="form-control" id="nrocasetas" wire:model='nrocaseta'>
                <option value="">Todas las Casetas</option>
                @foreach ($casetas as $caseta)
                <option value="{{$caseta->id}}">{{$caseta->nro}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div wire:loading class="text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="table-responsive mt-3" wire:ignore.self>
        <table class="table table-bordered table-striped table-hover dataTableL">
            <thead>
                <tr class="bg-secondary">
                    <th class="text-center">ID</th>
                    <th class="text-center">FECHA</th>
                    <th>SOCIO</th>
                    <th class="text-center">CASETA</th>
                    <th class="text-center">PASILLO</th>
                    <th class="text-right">IMPORTE</th>
                    <th class="text-right">PAGO</th>
                    <th class="text-center">ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($sanciones)

                @forelse ($sanciones as $item)
                @php
                $impago = "";$i++;
                @endphp
                <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td class="text-center" style="width: 100px">{{$item->fecha}}</td>
                    <td>{{$item->socio}}</td>
                    <td class="text-center">{{$item->nrocaseta}}</td>
                    <td class="text-center">{{$item->pasillo}}</td>
                    <td class="text-right">{{$item->importe}}</td>
                    <td class="text-center">
                        @switch($item->estadopago)
                        @case("IMPAGO")
                        <span class="badge badge-pill badge-danger">{{$item->estadopago}}</span>
                        @break
                        @case("PAGADO")
                        <span class="badge badge-pill badge-success">{{$item->estadopago}}</span>
                        @php
                        $impago = "disabled";
                        @endphp
                        @break
                        @endswitch
                    </td>
                    <td class="text-center">

                        @if ($item->estado)
                        <span class="badge badge-pill badge-info">Activo</span>
                        @else
                        <span class="badge badge-pill badge-secondary">Anulado</span>
                        @php
                        $impago = "disabled";
                        @endphp
                        @endif
                    </td>

                    <td class="text-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary btn-sm">Acción</button>
                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-icon"
                                data-toggle="dropdown">
                                <span class="sr-only">Acciones</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{route('sanciones.show',$item->id)}}"><i
                                        class="fas fa-eye"></i> Ver Detalle</a>

                                @can('admin.sanciones.boleta')
                                <button class="dropdown-item" wire:click='generaBoleta({{$item->id}})'><i
                                        class="fas fa-ticket-alt"></i> Generar
                                    Boleta</button>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('admin.sanciones.cobros')
                                <button class="dropdown-item {{$impago}}" onclick="cobrar({{$item->id}})"><i
                                        class="fas fa-cash-register"></i> Realizar
                                    cobro</button>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('admin.sanciones.destroy')
                                <button class="dropdown-item {{$item->estado?'':'disabled'}}"
                                    onclick="anular({{$item->id}})"><i class="fas fa-ban"></i> Anular
                                    Sanción</button>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
                @empty


                @endforelse


            </tbody>
        </table>
        @endif
    </div>

</div>
@section('js')
<script>
    $(document).ready(function(){
        Livewire.emit('updBrowse', browseMobile);
    });
</script>
<script>
    Livewire.on('renderizarpdf', data => {
        var win = window.open("../pdf/boleta/" + data, '_blank');
        win.focus();
    });
</script>
<script>
    Livewire.on('imprimir', data => {
    window.open("/impresiones/boletafoto.php?data=" + data, "_blank");            
})
</script>

<script>
    function anular(id){
        Swal.fire({
  title: "Anular Registro",
  text: "Está seguro de realizar esta operación?",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, continuar",
  cancelButtonText: "No, cancelar",
}).then((result) => {
  if (result.isConfirmed) {
   Livewire.emit('cambiaEstado',id);
  }
});
    }

    function cobrar(id){
        Swal.fire({
  title: "Realizar Cobro Sanción",
  text: "Está seguro de realizar esta operación?",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Si, continuar",
  cancelButtonText: "No, cancelar",
}).then((result) => {
  if (result.isConfirmed) {
   Livewire.emit('realizarCobro',id);
  }
});
    }
</script>
@endsection