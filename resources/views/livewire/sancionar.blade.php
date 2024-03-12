<div class="container">
    @section('plugins.Select2', true)
    <h3 class="text-center">SANCIONAR CASETA</h3>
    <div class="card card-danger">
        <div class="card-header">
            Formulario de Sanción
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group" wire:ignore>
                        <label>Causa Sanción</label>
                        <select class="Select2 w-100" wire:model='causalid' id="causalid">
                            <option value="">Seleccione una Causa</option>
                            @forelse ($causales as $item)
                            <option value="{{$item->id}}">{{$item->nombre}}</option>
                            @empty

                            @endforelse

                        </select>
                    </div>
                </div>
                <div wire:loading wire:target="causalid">
                    <div class="spinner-border text-info " role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="col-12 col-md-6 {{$vImporte}}">
                    <div class="form-group">
                        <label>Importe Bs.</label>
                        <input type="text" class="form-control" wire:model='importe' readonly>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group" wire:ignore>
                        <label>Nro. Caseta</label>
                        <select class="Select2 w-100" wire:model='casetaid' id='casetaid'>
                            <option value="">Seleccione una Caseta</option>
                            @forelse ($casetas as $item)
                            <option value="{{$item->id}}">{{$item->nro}}</option>
                            @empty

                            @endforelse
                            <option value="">1</option>
                        </select>
                    </div>

                </div>
                <div wire:loading wire:target="casetaid">
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <div class="col-12 col-md-6 {{$vCaseta}}">
                    <div class="form-group">
                        <label>Pasillo</label>
                        <input type="text" class="form-control" wire:model='pasillo' readonly>
                    </div>
                </div>
                <div class="col-12 col-md-6 {{$vCaseta}}">
                    <div class="form-group">
                        <label>Socio</label>
                        <input type="text" class="form-control" wire:model='nombresocio' readonly>
                    </div>
                </div>
                <div class="col-12 col-md-6 {{$vCaseta}}">
                    <div class="form-group">
                        <label>Captura Instantanea:</label>
                        {{-- <input type="file" wire:model="photo" class="form-control"> --}}
                        <div class="input-group mb-3">

                            <div class="custom-file">
                                <input type="file" id="imageInput" capture="camera" class="custom-file-input"
                                    accept="image/*" onchange="procesar()" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Seleccione una Imagen</label>
                            </div>
                        </div>
                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                @if (!is_null($caseta) &&!is_null($causal))
                <div class="col-12 col-md-6 {{$vCaseta}} mb-3">
                    <button class="btn btn-warning btn-block col-12" wire:click='sancionar'>SANCIONAR
                        <i class="fas fa-gavel"></i></button>
                </div>
                @endif

                <div wire:loading wire:target="photo">
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </div>
            <div class="d-none" id="divOutput" wire:ignore>
                Previsualización: <br> <br>
                <div>
                    <img id="output" style="width: 100%" onchange="enviar()">
                </div>
            </div>
            <div id="preview" class="p-3 py-3" wire:ignore></div>
        </div>
    </div>
    @section('js')

    <script>
        function procesar(){
        var srcEncoded;
        @this.set('filename',"");
        const preview = document.getElementById('preview');
        const input = document.querySelector('#imageInput');
            // const file = document.querySelector('#imageInput').files[0];
            for (let i = 0; i < input.files.length; i++) {
            const file = input.files[i];
            if (!file) {
                return;
            }

            const reader = new FileReader();

            reader.readAsDataURL(file);

            reader.onload = function (event) {
                const imgElement = document.createElement("img");
                imgElement.src = event.target.result;
                

                imgElement.onload = function (e) {
                    const canvas = document.createElement("canvas");
                    const MAX_WIDTH = 400;

                    const scaleSize = MAX_WIDTH / e.target.width;
                    canvas.width = MAX_WIDTH;
                    canvas.height = e.target.height * scaleSize;

                    const ctx = canvas.getContext("2d");

                    ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);

                    srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");

                    // document.querySelector("#output").src = srcEncoded;    
                    // document.querySelector("#divOutput").classList.remove('d-none');

                    const resizedImg = new Image();
                    resizedImg.src = srcEncoded;
                    resizedImg.classList.add('img-fluid');
                    preview.appendChild(resizedImg);
                    @this.cargaImagenBase64(srcEncoded);
                };
            };
        }
        
    }
    </script>

    {{-- //////////////////////////////////////////////// --}}
    <script>
        $('.Select2').select2({
        theme: 'bootstrap4'
    });
    </script>
    <script>
        $('#causalid').on('change', function (e) {
                @this.set('causalid', e.target.value)
            });
    $('#casetaid').on('change', function (e) {
                @this.set('casetaid', e.target.value)
            });
    </script>
    <script>
        Livewire.on('imprimir', data => {
        window.open("/impresiones/boleta.php?data=" + data, "_blank");            
    })
    </script>
    @endsection