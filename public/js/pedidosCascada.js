function cascadaCantidad(){
	$('option','#cantidad').remove();
	var cant=$('#tallas').find(':selected').attr('value2');
	for(i=1;i<=cant;i++)
		$('#cantidad').append("<option value='"+i+"'>"+i+"</option>")
}