<div>
    <h2 class="mb-3">Sanciones Impagas</h2>
    <div class="card">
        <div class="card-header bg-primary text-white">
            Listado de Sanciones Impagas
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped dataTable">
                    <thead class="bg-info">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-left">SOCIO</th>
                            <th class="text-center">CASETA</th>
                            <th class="text-center">FECHA</th>
                            <th class="text-right">IMPORTE BS.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sanciones as $item)
                        <tr class="text-center">
                            <td class="text-center">{{$item->id}}</td>
                            <td class="text-left">J{{$item->socio?$item->socio->nombre:"NULL"}}</td>
                            <td class="text-center">{{$item->caseta?$item->caseta->nro:"NULL"}}</td>
                            <td class="text-center">{{$item->fecha}}</td>
                            <td class="text-right">{{$item->importe}}</td>
                            <td class="text-right">
                                <button class="btn btn-outline-info" style="width: 50px;" title="Ver Info">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-outline-success" style="width: 50px;" title="Cobrar">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </button>
                                <button class="btn btn-outline-danger" style="width: 50px;" title="Genera Boleta">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>