// Call the dataTables jQuery plugin
$(document).ready(function() {

    $('#table-1').DataTable({
  
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_pt.json"
      },
  
      responsive: true,
      "bDestroy": true
  
    });
  
  });