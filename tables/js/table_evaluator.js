$(document).ready(function(){
    /*every time a checkbox is clicked this function will send all 
     * curently selected textboxes as a string to load_tables.php*/
    $('input[type=checkbox]').click(function(){
        var selected = [];
        $(':checkbox:checked').each(function() {
           selected.push($(this).attr('name'));
        });
        var newGraph = selected.toString();
        $("#table").load("../load_tables.php",{
            newGraph:newGraph
        });
    });
});
