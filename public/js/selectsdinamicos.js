$(function() {



/*$("#pais").change(function(event){
	$.get("estados/"+event.target.value+"",function(response,state){
		console.log(response);
	})
});*/


$("#pais").change(function(event){
	$.get("../estados/"+event.target.value+"",function(response,pais){
		//console.log(event.target.value);
		$("#estado").empty();
		for(i=0;i<response.length;i++){
			$("#estado").append("<option value='"+response[i].Name+"'>"+response[i].Name+"</option>");
		}
	})
});

$("#estado").change(function(event){
	//var pais=$("#pais").val();
	$.get("../ciudades/"+event.target.value+"/"+pais,function(response,estado){
		//console.log(pais);
		$("#ciudad").empty();
		for(i=0;i<response.length;i++){
			$("#ciudad").append("<option value='"+response[i].Name+"'>"+response[i].Name+"</option>");
		}
	})
});

});