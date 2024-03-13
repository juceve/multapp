@extends('adminlte::page')

@section('title')
Sistema |
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Sistema') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('sistemas.create') }}" class="btn btn-info btn-sm float-right"
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
                                    <th>No</th>

                                    <th>Leyendaboleta</th>
                                    <th>Dato1</th>
                                    <th>Dato2</th>
                                    <th>Dato3</th>
                                    <th>Dato4</th>
                                    <th>Dato5</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sistemas as $sistema)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $sistema->leyendaboleta }}</td>
                                    <td>{{ $sistema->dato1 }}</td>
                                    <td>{{ $sistema->dato2 }}</td>
                                    <td>{{ $sistema->dato3 }}</td>
                                    <td>{{ $sistema->dato4 }}</td>
                                    <td>{{ $sistema->dato5 }}</td>

                                    <td>
                                        <form action="{{ route('sistemas.destroy',$sistema->id) }}" method="POST"
                                            class="delete" onsubmit="return false">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('sistemas.show',$sistema->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> </a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('sistemas.edit',$sistema->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
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

        </div>
    </div>
</div>
@endsection