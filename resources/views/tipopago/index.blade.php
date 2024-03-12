@extends('adminlte::page')

@section('title')
Listado de Tipos de Pago
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Listado de Tipos de Pago') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tipopagos.create') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>
                                    <th class="text-center">No</th>

                                    <th>Nombre</th>
                                    <th class="text-center">Nombrecorto</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipopagos as $tipopago)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>

                                    <td>{{ $tipopago->nombre }}</td>
                                    <td class="text-center">{{ $tipopago->nombrecorto }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('tipopagos.destroy',$tipopago->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('tipopagos.show',$tipopago->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i> </a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('tipopagos.edit',$tipopago->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                    class="fa fa-fw fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- {!! $tipopagos->links() !!} --}}
        </div>
    </div>
</div>
@endsection