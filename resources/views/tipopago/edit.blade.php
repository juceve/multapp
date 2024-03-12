@extends('adminlte::page')

@section('title')
Editar Tipo de pago |
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-success">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Editar Tipo de pago
                        </span>

                        <div class="float-right">
                            <a href="{{ route('tipopagos.index') }}" class="btn btn-success btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tipopagos.update', $tipopago->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('tipopago.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection