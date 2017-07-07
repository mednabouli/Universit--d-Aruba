 

$(document).ready(function() {

    $('#eleves').DataTable( {
        "ajax": "json/eleves.json",
        
        "columns": [
            
            { "data": "elevesID" },
            { "data": "elevesfirst_name" },
            { "data": "eleveslast_name" },
            { "data": "eleveshas_skipair" },
            { "data":  "elevesID"}
        ],
        "columnDefs": [ {
            "targets": 4,

            "render": function(data){
                return '<a href="'+data+'">view</a>';
            }
        }],
        select: true
    } );
} );