@extends('adminlte::page')

@section('title')
Listado de Casetas |
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Listado de Casetas') }}
                        </span>

                        <div class="float-right">
                            @can('admin.casetas.create')
                            <a href="{{ route('casetas.create') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-plus"></i> Nuevo
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover dataTable">
                            <thead class="thead">
                                <tr>


                                    <th class="text-center">Nro Caseta</th>
                                    <th class="text-center">Pasillo</th>
                                    <th class="text-left">Socio</th>
                                    <th class="text-center">Estado</th>

                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($casetas as $caseta)
                                <tr>

                                    <td class="text-center">{{ $caseta->nro }}</td>
                                    <td class="text-center">{{ $caseta->pasillo }}</td>
                                    <td class="text-left">{{ $caseta->socio->nombre }}</td>
                                    <td class="text-center">
                                        @if ($caseta->estado)
                                        <span class="badge badge-pill badge-info">Activo</span>
                                        @else
                                        <span class="badge badge-pill badge-secondary">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        <form action="{{ route('casetas.destroy',$caseta->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('casetas.show',$caseta->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i> </a>
                                            @can('admin.casetas.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('casetas.edit',$caseta->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.casetas.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                    class="fa fa-fw fa-trash"></i></button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection