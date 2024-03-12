@extends('adminlte::page')

@section('title')
Nueva Caseta |
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-info">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Nueva Caseta
                        </span>

                        <div class="float-right">
                            <a href="{{ route('casetas.index') }}" class="btn btn-info btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('casetas.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('caseta.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection