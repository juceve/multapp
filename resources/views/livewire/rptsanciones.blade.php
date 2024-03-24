<div>
    @section('title')
    Reporte de Sanciones
    @endsection
    <div class="card">
        <div class="card-body">
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
            </div>
            <hr>
            <h4 class="text-center">REPORTE DE SANCIONES</h4>
            <p class="text-center">Del: {{$fechaI}} al {{$fechaF}}</span></p>
            <div class="table-responsive mt-3" wire:ignore.self>
                <table class="table table-bordered table-striped table-hover dataTableL1 w-100">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-center">ID</th>
                            <th class="text-center">FECHA</th>
                            <th>SOCIO</th>
                            <th class="text-center">CASETA</th>
                            <th class="text-center">PASILLO</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center">PAGO</th>
                            <th class="text-right">IMPORTE</th>
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
                            <td class="text-center">
                                @if ($item->estado)Activo
                                @else
                                Anulado
                                @endif
                            </td>
                            <td class="text-center">
                                {{$item->estadopago}}
                            </td>
                            <td class="text-right">{{number_format($item->importe,1,'.') }}</td>
                        </tr>
                        @empty
                        @endforelse

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6"></td>
                            <td class="text-right"><strong>TOTAL</strong></td>
                            <td class="text-right"><strong>{{number_format($sanciones->sum('importe'),1,'.')}}</strong>
                            </td>

                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $('.dataTableL1').DataTable({
        destroy:true,
        searching: false,
        
        layout: {
            topEnd: {
                buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',               
            },
            {
                extend: 'pdfHtml5',
                text: 'Exportar a PDF',
                
                customize: function(doc) {
                    // Configura el tamaño de la página a Carta y la orientación
                    doc.pageOrientation = 'landscape'; // o 'landscape' si prefieres orientación horizontal
                    doc.pageSize = 'LETTER';

                    // Ajusta el ancho de las columnas para que se escalen correctamente
                    var columnCount = doc.content[1].table.body[0].length;
                    doc.content[1].table.widths = Array(columnCount).fill('*'); // Divide el ancho de manera equitativa

                    // Alinear todo el contenido a la izquierda
                    doc.content.forEach(function(content) {
                        if (content.table && content.table.body) {
                            content.table.body.forEach(function(row) {
                                row.forEach(function(cell, index) {
                                    if (cell.text) {
                                        cell.alignment = 'left';
                                        cell.fontSize = 8; // Ajusta el tamaño de la letra según sea necesario
                                        if (index === columnCount - 1) {
                                            cell.alignment = 'right'; // Alinea la última columna a la derecha
                                        }
                                    }
                                });
                            });
                        }
                    });

                   // Ajusta el estilo de los títulos de las columnas si es necesario
                   if (doc.content[1].table.body.length > 0) {
                        var header = doc.content[1].table.body[0];
                        header.forEach(function(headerCell, index) {
                            headerCell.alignment = (index === columnCount - 1) ? 'right' : 'left'; // Alinea el último título de la columna a la derecha
                            headerCell.fontSize = 8; // Ajusta el tamaño de la letra de los títulos de las columnas según sea necesario
                        });
                    }
                }
            },
            
        ]
            }
        },
        language: {
        url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-MX.json',
        },
        });
    
    Livewire.on('dataTableL1',()=>{
        $('.dataTableL1').DataTable({
        destroy:true,
        searching: false,
        
        layout: {
            topEnd: {
                buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',               
            },
            {
                extend: 'pdfHtml5',
                text: 'Exportar a PDF',
                
                customize: function(doc) {
                    // Configura el tamaño de la página a Carta y la orientación
                    doc.pageOrientation = 'landscape'; // o 'landscape' si prefieres orientación horizontal
                    doc.pageSize = 'LETTER';

                    // Ajusta el ancho de las columnas para que se escalen correctamente
                    var columnCount = doc.content[1].table.body[0].length;
                    doc.content[1].table.widths = Array(columnCount).fill('*'); // Divide el ancho de manera equitativa

                    // Alinear todo el contenido a la izquierda
                    doc.content.forEach(function(content) {
                        if (content.table && content.table.body) {
                            content.table.body.forEach(function(row) {
                                row.forEach(function(cell, index) {
                                    if (cell.text) {
                                        cell.alignment = 'left';
                                        cell.fontSize = 8; // Ajusta el tamaño de la letra según sea necesario
                                        if (index === columnCount - 1) {
                                            cell.alignment = 'right'; // Alinea la última columna a la derecha
                                        }
                                    }
                                });
                            });
                        }
                    });

                   // Ajusta el estilo de los títulos de las columnas si es necesario
                   if (doc.content[1].table.body.length > 0) {
                        var header = doc.content[1].table.body[0];
                        header.forEach(function(headerCell, index) {
                            headerCell.alignment = (index === columnCount - 1) ? 'right' : 'left'; // Alinea el último título de la columna a la derecha
                            headerCell.fontSize = 8; // Ajusta el tamaño de la letra de los títulos de las columnas según sea necesario
                        });
                    }
                }
            },
            
        ]
            }
        },
        language: {
        url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-MX.json',
        },
        });
    });
</script>

@endsection