@extends('panelViews::mainTemplate')
@section('page-wrapper')

	<p>
		<div class="rpd-dataform">
            <div class="form">
	        	<div class="btn-toolbar" role="toolbar">
	                <div class="pull-left"><h2>Mostrar Producto</h2></div>
	     			<div class="pull-right">
	     				<a href="#" class="btn btn-default">Modify</a>
	     			</div>
	        	</div>
	        	<br />
	        	<div class="form-group clearfix" id="fg_descripcion" >
	                <label for="descripcion" class="col-sm-2 control-label">Descripción</label>
		            <div class="col-sm-10" id="div_descripcion">
						<div class="help-block">{{$producto->descripcion}}</div>
		        	</div>
	    		</div>
				<div class="form-group clearfix" id="fg_precio" >
	                <label for="precio" class="col-sm-2 control-label">Precio</label>
		            <div class="col-sm-10" id="div_precio">
		                <div class="help-block">{{$producto->precio}}</div>
					</div>
				</div>
				<div class="form-group clearfix" id="fg_costo" >
	                <label for="costo" class="col-sm-2 control-label">Costo</label>
		            <div class="col-sm-10" id="div_costo">
						<div class="help-block">{{$producto->costo}}</div>
					</div>
				</div>
				@foreach($tallasCant as $t)
				<div class="form-group clearfix" id="fg_talla" >
	                <label for="talla" class="col-sm-2 control-label">Cantidad Talla {{$t->descripcion}}</label>
		            <div class="col-sm-10" id="div_talla">
			            <div class="help-block">{{$t->cantidad}}</div>
		        	</div>
				</div>
				@endforeach
				<div class="form-group clearfix" id="fg_color" >
					<label for="color" class="col-sm-2 control-label required">Color</label>
		            <div class="col-sm-10" id="div_color">
						<div class="help-block" style="background:{{$producto->color}};width: 19px;border: 1px solid black;">&nbsp;</div>
					</div>
				</div>
				<div class="form-group clearfix" id="fg_imagen" >
	                <label for="imagen" class="col-sm-2 control-label">Imagen</label>
		            <div class="col-sm-10" id="div_imagen">
						<!-- <div class="help-block"><img src="{{asset("img/productos/$producto->imagen")}}" alt="" style="margin:0 10px 10px 0"></div> -->
						<div class="help-block"><img src="{{asset("img/productos/$producto->imagen")}}" alt="" style="max-width: 100px;"></div>
						<input type="hidden" id="img" name="img" value="{{$producto->imagen}}">
					</div>
				</div>
				<div class="form-group clearfix" id="fg_id_categoria" >
	                <label for="id_categoria" class="col-sm-2 control-label required">Categoria</label>
		            <div class="col-sm-10" id="div_id_categoria">
						<div class="help-block">{{$producto->nombre}}</div>
		        	</div>
				</div>
				<div class="form-group clearfix" id="fg_genero" >
					<label for="genero" class="col-sm-2 control-label required">Genero</label>
		            <div class="col-sm-10" id="div_genero">
						<div class="help-block">
							@if($producto->genero === 0)
								Mujer
							@else
								Hombre
							@endif
						</div>
					</div>
				</div>
	     		<br />
	        	<!-- <input name="save" type="hidden" value="1"> -->
        	</div>
    	</div>
	</p>
	<script>
		$('#imagen').change(function(){
        	var filename = $('#imagen').val();
        	if (filename.substring(3,11) == 'fakepath') {
            	filename = filename.substring(12);
        	} // Remove c:\fake at beginning from localhost chrome
        	$('#my_file').html(filename);
        	$('#img').val(filename);
   		});
	</script>

@stop