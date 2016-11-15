@extends('panelViews::mainTemplate')
@section('page-wrapper')
	
	<form action="#" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="genero">Género</label>
			<select name="genero" class="form-control" required>
				<option selected value="">Seleccione un género...</option>
				<option value="0">Mujer</option>
				<option value="1">Hombre</option>
			</select>
		</div>

		<div class="form-group">
			<label for="categoria">Categoría</label>
			<select name="categoria" class="form-control" required>
				<option selected value="">Seleccione una categoría...</option>
				@foreach($categorias as $cat)
					<option value="{{$cat->id}}">{{$cat->nombre}}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label for="producto">Producto</label>
			<select name="producto" class="form-control" required>
				<option value=""></option>
			</select>
		</div>


	</form>

@stop