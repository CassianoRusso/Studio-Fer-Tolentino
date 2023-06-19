$(document).ready(function(){
    if($('.caixa-historico').length > 0){
        var order = "desc";
        
    }else{
        var order = "asc";
    }

    $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        "order": [[ 0, order ]],
        responsive: true,
        "aoColumnDefs": [{
        "bSortable": false,
        "aTargets": ['no-sort']
        }]
    });

    

});