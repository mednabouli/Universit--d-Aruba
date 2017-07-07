 

$(document).ready(function() {

    $('#boat').DataTable( {
        "ajax": "json/canoe.json",
        
        "columns": [
            
            { "data": "boatID" },
            { "data": "boatName" },
            { "data": "boatPrice" },
            { "data": "boatColor" },
            { "data": "boatChange" },
            { "data":  "boatID"}
        ],
        "columnDefs": [ {
            "targets": 5,

            "render": function(data){
                return '<a href="'+data+'">view</a>';
            }
        }],
        select: true
    } );
} );