$(document).ready(function() {
    $('#table-liste-patient').DataTable({
        language: {
            url: 'libraries/js/dataTable.french.json'
        },
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 4,6 ] }
        ]
    });
});
