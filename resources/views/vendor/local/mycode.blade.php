<script>
    var browseMobile;
    function isMobile() {
        if (navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/webOS/i) ||
            navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/iPod/i) ||
            navigator.userAgent.match(/BlackBerry/i) ||
            navigator.userAgent.match(/Windows Phone/i)) {
            a = true;
        } else {
            a = false;
        }
        return a;
    }
    $(document).ready(function(){
        browseMobile = isMobile();
        $('.dataTable').DataTable({
        destroy:true,
        language: {
        url: '//cdn.datatables.net/plug-ins/2.0.1/i18n/es-ES.json',
        },
        });



        $('.dataTableL').DataTable({
        destroy:true,
        searching: false,
        order: [[ 0, "desc" ]],
        layout: {
            topEnd: {
                buttons: [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'Exportar a PDF',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            
        ]
            }
        },
        language: {
        url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/es-MX.json',
        },
        });
    })


    
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
    function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
</script>

<script>
    function copiarPortapapeles(value){
        navigator.clipboard.writeText(value);
    }
    function copiarAlPortapapeles(valor) {
    // Crea un elemento de texto temporal
    var elementoTemporal = document.createElement("textarea");
    
    // Establece el valor del elemento de texto
    elementoTemporal.value = valor;
    
    // Agrega el elemento al cuerpo del documento
    document.body.appendChild(elementoTemporal);
    
    // Selecciona el contenido del elemento de texto
    elementoTemporal.select();
    
    // Copia el contenido seleccionado al portapapeles
    document.execCommand("copy");
    
    // Elimina el elemento temporal
    document.body.removeChild(elementoTemporal);
    
}
</script>

@if ($message = Session::get('successURL'))
<script>
    var value = "{{$message}}";
    Swal.fire({
    title: "Sanción exitosa!",
    text: "Deseas copiar la Imagen al portapapeles?",
    icon: "success",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, copiar",
    cancelButtonText: "No, cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            copiarAlPortapapeles(value) 
            Swal.fire("Copiado correctamente!");
        }
    });
</script>
@endif

@if ($message = Session::get('success'))
<script>
    Swal.fire({
  title: "Excelente!",
  text: "{{$message}}",
  icon: "success"
});
</script>
@endif