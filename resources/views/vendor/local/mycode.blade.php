<script>
    $(document).ready( function () {
        
    $('.dataTable').DataTable({
        destroy:true,
        language: {
        url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
        },
        });
    } );

    Livewire.on('dataTableL',()=>{
        $('.dataTableL').DataTable({
        destroy:true,
        searching: false,
        layout: {
            topStart: {
                buttons: ['excel', 'pdf', 'print']
            }
        },
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
        },
        });
    
    });
</script>

<script>
    $('.delete').submit(function(e) {
            Swal.fire({
                title: "ELIMINAR REGISTRO",
                text: "¿Está seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        })
        
        $('.anular').submit(function(e) {
            Swal.fire({
                title: "ANULAR REGISTRO",
                text: "¿Está seguro de realizar esta operación?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        })
</script>

<script>
    Livewire.on('success',msg=>{
        Swal.fire({
        title: "Excelente!",
        text: msg,
        icon: "success"
        });
    })
    Livewire.on('warning',msg=>{
        Swal.fire({
        title: "Ateención!",
        text: msg,
        icon: "warning"
        });
    })
    Livewire.on('error',msg=>{
        Swal.fire({
        title: "Error!",
        text: msg,
        icon: "error"
        });
    })
</script>

<script>
    function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
</script>

@if ($message = Session::get('success'))
<script>
    Swal.fire({
  title: "Excelente!",
  text: "{{$message}}",
  icon: "success"
});
</script>
@endif