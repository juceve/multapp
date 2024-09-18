@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-12">
            <h4>SANCIONES DEL DÍA</h4>
            <div class="card">
                <div class="card-header text-warning">{{fechaEs(date('Y-m-d'))}}</div>
                <div class="card-body">
                    @livewire('rpt-sanciondia')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function sendUrlToPrint(url){
    var  beforeUrl = 'intent:';
    var  afterUrl = '#Intent;';
    // Intent call with component
    afterUrl += 'component=ru.a402d.rawbtprinter.activity.PrintDownloadActivity;'
    afterUrl += 'package=ru.a402d.rawbtprinter;end;';
    document.location=beforeUrl+encodeURI(url)+afterUrl;
    return false;
}
</script>

@endsection
