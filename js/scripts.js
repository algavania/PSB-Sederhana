$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        $('#container').load('list-data.php?keyword=' + $('#keyword').val());
    });
});