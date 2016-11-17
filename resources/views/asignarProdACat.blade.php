@extends('panelViews::mainTemplate')
@section('page-wrapper')
	
	<form action="{{ url('/panel/categoriasproductos/asignar')}}" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<div class="form-group">
			<label for="categoria">Categoría</label>
			<select id="categoria" name="categoria" class="form-control" required>
				<option selected value="">Seleccione una categoría...</option>
				@foreach($categorias as $cat)
					<option value="{{$cat->id}}">{{$cat->nombre}}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="producto">Producto</label>
			<select id="producto" name="producto" class="form-control" required>
				<option selected value="">Seleccione un producto...</option>
				@foreach($productos as $p)
					<option value="{{ $p->id }}">{{$p->descripcion}}</option>
				@endforeach
			</select>
		</div>

		<input type="submit" class="btn btn-primary" value="Asignar">

	</form>
	
	<!-- <script>
		$(document).ready(function(){
			$('#categoria').change(function(){
				$.get("{{ url('/panel/categoriasproductosModel/all')}}",
				{ option: $(this).val() },
				function(data) {
					$('#producto').empty();
					$.each(data, function(key, element) {
						$('#producto').append("<option value='" + key + "'>" + element + "</option>");
					});
				});
			});
		});
	</script> -->
@stop