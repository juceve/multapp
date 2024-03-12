@extends('adminlte::page')

@section('title')
Listado de Causales |
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Listado de Causales') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('causales.create') }}" class="btn btn-info btn-sm float-right"
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
                                    <th>Importe Bs.</th>

                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($causales as $causale)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>

                                    <td>{{ $causale->nombre }}</td>
                                    <td>{{ $causale->importe }}</td>

                                    <td class="text-right">
                                        <form action="{{ route('causales.destroy',$causale->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('causales.show',$causale->id) }}" title="Ver Info"><i
                                                    class="fa fa-fw fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('causales.edit',$causale->id) }}"><i
                                                    class="fa fa-fw fa-edit" title="Editar"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i
                                                    class="fa fa-fw fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- {!! $causales->links() !!} --}}
        </div>
    </div>
</div>
@endsection