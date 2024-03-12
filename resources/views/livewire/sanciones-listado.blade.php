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
                <option value="">Pasillos</option>
                @foreach ($pasillos as $item)
                <option value="{{$item->pasillo}}">{{$item->pasillo}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-2 mb-3">
            <select class="form-control" id="nrocasetas" wire:model='nrocaseta'>
                <option value="">Nro. Casetas</option>
                @foreach ($casetas as $caseta)
                <option value="{{$caseta->id}}">{{$caseta->nro}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover dataTableL">
            <thead>
                <tr class="bg-secondary">
                    <th class="text-center">NRO</th>
                    <th class="text-center">FECHA</th>
                    <th>SOCIO</th>
                    <th class="text-center">NRO CASETA</th>
                    <th class="text-center">PASILLO</th>
                    <th class="text-right">IMPORTE</th>
                    <th class="text-center">ESTADO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if ($sanciones)

                @forelse ($sanciones as $item)
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center">{{$item->fecha}}</td>
                    <td>{{$item->socio}}</td>
                    <td class="text-center">{{$item->nrocaseta}}</td>
                    <td class="text-center">{{$item->pasillo}}</td>
                    <td class="text-right">{{$item->importe}}</td>
                    <td class="text-center">
                        {{-- @switch($item->estadopago)
                        @case("IMPAGO")
                        <span class="badge badge-pill badge-danger">{{$item->estadopago}}</span>
                        @break
                        @case("PAGADO")
                        <span class="badge badge-pill badge-success">{{$item->estadopago}}</span>
                        @break
                        @endswitch --}}
                        @if ($item->estado)
                        <span class="badge badge-pill badge-info">Activo</span>
                        @else
                        <span class="badge badge-pill badge-secondary">Inactivo</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('sanciones.show',$item->id)}}" class="btn btn-sm btn-info"
                            title="Ver Detalle"><i class="fas fa-eye"></i></a>
                        <button class="btn btn-sm btn-success" title="Generar Boleta"
                            wire:click='generaBoleta({{$item->id}})'><i class="fas fa-ticket-alt"></i></button>
                        <button class="btn btn-sm btn-danger {{$item->estado?'':'disabled'}}" title="Anular Sanción"
                            onclick="anular({{$item->id}})"><i class="fas fa-ban"></i></button>
                    </td>
                </tr>
                @empty


                @endforelse


            </tbody>
        </table>
        @endif
    </div>
</div>