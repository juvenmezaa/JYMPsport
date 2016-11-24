@extends('panelViews::mainTemplate')
@section('page-wrapper')

	<p>
		<div class="rpd-dataform">
            <form method="POST" action="{{url('/panel/productosModel/actualizar')}}" accept-charset="UTF-8" class="form-horizontal" role="form" enctype="multipart/form-data">
	            <input type="hidden" name="_token" value="{{csrf_token()}}">
	        	<input type="hidden" name="id" value="{{$producto->id}}">
	        	<div class="btn-toolbar" role="toolbar">
	                <div class="pull-left"><h2>Editar Producto</h2></div>
	            </div>
	     		<br />
	        
	        	<div class="form-group clearfix" id="fg_descripcion" >
	                <label for="descripcion" class="col-sm-2 control-label required">Descripción</label>
		            <div class="col-sm-10" id="div_descripcion">
						<input class="form-control form-control" type="text" value="{{$producto->descripcion}}" id="descripcion" name="descripcion" required>
		        	</div>
	    		</div>
				<div class="form-group clearfix" id="fg_precio" >
	                <label for="precio" class="col-sm-2 control-label required">Precio</label>
		            <div class="col-sm-10" id="div_precio">
		                <input class="form-control form-control" type="number" step="any" value="{{$producto->precio}}" id="precio" name="precio" required>
					</div>
				</div>
				<div class="form-group clearfix" id="fg_costo" >
	                <label for="costo" class="col-sm-2 control-label required">Costo</label>
		            <div class="col-sm-10" id="div_costo">
						<input class="form-control form-control" type="number" step="any" value="{{$producto->costo}}" id="costo" name="costo" required>
					</div>
				</div>
<!-- 				<div class="form-group clearfix" id="fg_cantidad" >
					<label for="cantidad" class="col-sm-2 control-label required">Cantidad</label>
	            <div class="col-sm-10" id="div_cantidad">
					<input class="form-control form-control" type="text" id="cantidad" name="cantidad">
				</div>
				</div> -->
				<!-- @foreach($tallas as $t)
				<div class="form-group clearfix" id="fg_talla" >
	                <label for="talla" class="col-sm-2 control-label required">Cantidad Talla {{$t->descripcion}}</label>
		            <div class="col-sm-10" id="div_talla">
		            	<input type="number" class="form-control form-control" id="talla{{$t->talla}}" name="talla{{$t->talla}}" required>
		            	@foreach($tallasCant as $tc)
		            		@if($t->talla === $tc->talla)
								<script>
						        	$('#talla{{$t->talla}}').val({{$tc->cantidad}});
								</script>
		            		@else
		            			<script>
		            				var cant = 0;
						        	$('#talla{{$t->talla}}').val(cant);
								</script>
		            		@endif

		            		<!-- @if($t->talla === $tc->talla)
								<input class="form-control form-control" type="number" id="talla{{$t->talla}}" name="talla{{$t->talla}}" value="{{$tc->cantidad}}" required>
		            		@else
								<input class="form-control form-control" type="number" id="talla{{$t->talla}}" name="talla{{$t->talla}}" value="0" required>
		            		@endif -->
		            	
		            	<!-- @endforeach
		        	</div>
				</div>
				@endforeach --> 	

				
				@foreach($tallas as $t)
				<div class="form-group clearfix" id="fg_talla" >
	                <label for="talla" class="col-sm-2 control-label required">Cantidad Talla {{$t->descripcion}}</label>
		            <div class="col-sm-10" id="div_talla">
		            	<input type="number" class="form-control form-control" id="talla{{$t->talla}}" name="talla{{$t->talla}}" value="0" required>
		            	<!-- @foreach($tallasCant as $tc)
		            		@if($t->talla === $tc->talla)
								<script>
						        	$('#talla{{$t->talla}}').val({{$tc->cantidad}});
								</script>
		            		@else
		            			<script>
		            				var cant = 0;
						        	$('#talla{{$t->talla}}').val(cant);
								</script>
		            		@endif
		            	
		            	@endforeach -->
		        	</div>
				</div>
				@endforeach
				
				@foreach($tallasCant as $tc)
					@if($tc->id_talla === 1)
						<script>
						//$('#tallaXS').hide();
							$('#tallaXS').val({{$tc->cantidad}});
						</script>
					@elseif($tc->id_talla === 2)
						<script>
							$('#tallaS').val({{$tc->cantidad}});
						</script>
					@elseif($tc->id_talla === 3)
						<script>
							$('#tallaM').val({{$tc->cantidad}});
						</script>
					@elseif($tc->id_talla === 4)
						<script>
							$('#tallaL').val({{$tc->cantidad}});
						</script>
					@endif
					<!-- <script>
						if ($('#tallaXS').length && {{$tc->id_talla}} == 1) {
							$('#tallaXS').val({{$tc->cantidad}});
						}
					</script> -->
				@endforeach



				<div class="form-group clearfix" id="fg_color" >
					<label for="color" class="col-sm-2 control-label required">Color</label>
		            <div class="col-sm-10" id="div_color">
						<input class="form-control form-control" type="color" value="{{$producto->color}}" id="color" name="color">
					</div>
				</div>
				<div class="form-group clearfix" id="fg_imagen" >
	                <label for="imagen" class="col-sm-2 control-label">Imagen</label>
		            <div class="col-sm-10" id="div_imagen">
		            	<div class="clearfix"><img src="{{asset("img/productos/$producto->imagen")}}" class="pull-left" alt="" style="max-width: 100px;">&nbsp;
						<strong>{{$producto->imagen}}</strong>
		            	</div>
						<input class="form-control form-control" type="file" value="{{$producto->imagen}}" id="imagen" name="imagen">
						<input type="hidden" id="img" name="img" value="{{$producto->imagen}}">
					</div>
				</div>
				<div class="form-group clearfix" id="fg_id_categoria" >
	                <label for="id_categoria" class="col-sm-2 control-label required">Categoria</label>
		            <div class="col-sm-10" id="div_id_categoria">
						<select class="form-control form-control" type="select" id="id_categoria" name="id_categoria" required>
							<option value="">Selecciona una categoria...</option>
							@foreach($categorias as $c)
								@if($c->id === $producto->id_categoria)
									<option value="{{$c->id}}" selected>{{$c->nombre}}</option>
								@else
									<option value="{{$c->id}}">{{$c->nombre}}</option>
								@endif
							@endforeach
						</select>
		        	</div>
				</div>
				<div class="form-group clearfix" id="fg_genero" >
					<label for="genero" class="col-sm-2 control-label required">Genero</label>
		            <div class="col-sm-10" id="div_genero">
						<select class="form-control form-control" type="select" id="genero" name="genero" required>
							@if($producto->genero === 0)
								<option value="">Selecciona un genero...</option>
								<option value="0" selected>Mujer</option>
								<option value="1">Hombre</option>
							@else
								<option value="">Selecciona un genero...</option>
								<option value="0">Mujer</option>
								<option value="1" selected>Hombre</option>
							@endif
						</select>
					</div>
				</div>
				<div class="btn-toolbar" role="toolbar">
					<div class="pull-left">
		            	<input class="btn btn-primary" type="submit" value="Save">
		            </div>
	            </div>
	     		<br />
	        	<!-- <input name="save" type="hidden" value="1"> -->
        	</form>
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