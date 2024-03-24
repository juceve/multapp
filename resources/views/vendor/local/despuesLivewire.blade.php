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

    Livewire.on('dataTableL',()=>{
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
    
    });

    
</script>