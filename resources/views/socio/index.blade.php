@extends('adminlte::page')

@section('template_title')
Socios
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Socios') }}
                        </span>

                        <div class="float-right">
                            @can('admin.socios.create')
                            <a href="{{ route('socios.create') }}" class="btn btn-info btn-sm float-right"
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
                                    <th class="text-center">No</th>

                                    <th>Nombre</th>

                                    <th>Celular</th>
                                    <th>Estado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socios as $socio)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>

                                    <td>{{ $socio->nombre }}</td>

                                    <td>{{ $socio->celular }}</td>
                                    <td>
                                        @if ($socio->estado)
                                        <span class="badge badge-pill badge-info">Activo</span>
                                        @else
                                        <span class="badge badge-pill badge-secondary">Inactivo</span>
                                        @endif

                                    </td>

                                    <td align="right">
                                        <form action="{{ route('socios.destroy',$socio->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('socios.show',$socio->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            @can('admin.socios.edit')
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('socios.edit',$socio->id) }}" title="Editar"><i
                                                    class="fa fa-fw fa-edit"></i> </a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('admin.socios.destroy')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash" title="Eliminar"></i> </button>
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
            {{-- {!! $socios->links() !!} --}}
        </div>
    </div>
</div>
@endsection