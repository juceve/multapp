@extends('adminlte::page')

@section('template_title')
Editar Socio
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-success">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            Editar Socio
                        </span>

                        <div class="float-right">
                            <a href="{{ route('socios.index') }}" class="btn btn-success btn-sm float-right"
                                data-placement="left">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('socios.update', $socio->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('socio.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection