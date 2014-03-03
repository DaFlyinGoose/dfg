$(function() {
	$( "#sortable" ).sortable();
	$( "#sortable" ).disableSelection();
	$('#save').click(function() {
        $.post('/admin/order/save', { 'order': $( "#sortable" ).sortable( "toArray" ) }, function(data) {
            console.log(data);
        });
	});
});