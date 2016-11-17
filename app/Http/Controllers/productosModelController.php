<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use DB;
use App\productosModel;
use App\categoriasModel;
use App\Tallas;
use App\Tallas_ProductosModel;
use Illuminate\Http\Request;

class productosModelController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(productosModel::with('tallasProd'));
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('descripcion', 'Descripción', 'text');
        $this->filter->add('precio', 'Precio', 'text');
        $this->filter->add('costo', 'Costo', 'text');

        $opciones = \App\Tallas::pluck("talla", "id")->all();
        $first_opcion = array(""=>"Selecciona una talla...");
        $tallas = $first_opcion + $opciones;

        $this->filter->add('talla', 'Talla', 'select')->options($tallas);
        $this->filter->add('color', 'Color', 'colorpicker');
        $generos = array();
        $generos[""] = "Selecciona un género...";
        $generos["0"] = "Mujer";
        $generos["1"] = "Hombre";
        $this->filter->add('genero', 'Genero', 'select')->options($generos);
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('{{$descripcion}}', 'Descripción');
        $this->grid->add('precio','Precio');
        $this->grid->add('costo','Costo');
        $this->grid->add('{{ count( $tallasProd->pluck("talla")->all() ) }}','Cantidad Total');
        $this->grid->add('visitas','Visitas');
        $this->grid->add('color','Color');
        $this->grid->add('genero','Genero');

        $this->grid->paginate(10);

        $this->addStylesToGrid();
        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields


			$this->filter = \DataFilter::source(new \App\Category);
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name');
			$this->grid->add('code', 'Code');
			$this->addStylesToGrid();

        */
                 
        return $this->returnView();
    }
    
    public function edit($entity){
        
        parent::edit($entity);


        $this->edit = \DataEdit::source(new productosModel());
        $this->edit->label('Editar Producto');
        $this->edit->add('descripcion','Descripción','text')->rule('required');
        $this->edit->add('precio','Precio','text')->rule('required');
        $this->edit->add('costo','Costo','text')->rule('required');
        $this->edit->add('tallasProd.cantidad','Cantidad','text')->rule('required');
        $tallas = DB::table('tallas_productos AS TP')->rightjoin('tallas AS T','TP.id_talla','=','T.id')->get();
        $this->edit->add('tallasProd.id_talla','Talla','select')->options(\App\Tallas::pluck("talla","id")->all())->rule('required');
        //$this->edit->add('talla','Talla','select')->options(\App\Tallas::pluck("talla","id")->all())->rule('required');
        //$tallas = DB::table('tallas')->select('id','talla')->get();
        //$this->edit->add('talla','Talla','select')->options($tallas);
        
        $this->edit->add('color','Color','colorpicker')->rule('required');
        $this->edit->add('imagen','Imagen','image')->move(public_path().'/img/productos','')->preview(80,80);
        $this->edit->add('id_categoria','Categoria','select')->options(\App\CategoriasModel::pluck("nombre","id")->all())->rule('required');
        $generos = array();
        $generos["0"] = "Mujer";
        $generos["1"] = "Hombre";
        //dd($generos);
        $this->edit->add('genero','Genero','select')->options($generos)->rule('required');

        return $this->returnEditView();
    }    
    public function registrar(Request $datos){
        $categorias = categoriasModel::all();
        $tallas = Tallas::all();
        return view("registrarProducto", compact('categorias','tallas'));
    }

    public function guardar(Request $datos){
        $descripcion = $datos->input('descripcion');
        $precio = $datos->input('precio');
        $costo = $datos->input('costo');
        $cantidad = $datos->input('cantidad');
        $talla = $datos->input('talla');
        $color = $datos->input('color');
        $imagen = $datos->input('img');
        //dd($imagen);
        $categoria = $datos->input('id_categoria');
        $genero = $datos->input('genero');

        $nuevoProd = new productosModel;
        $nuevoProd->descripcion = $descripcion;
        $nuevoProd->precio = $precio;
        $nuevoProd->costo = $costo;
        $nuevoProd->color = $color;
        $nuevoProd->imagen = $imagen;
        $nuevoProd->id_categoria = $categoria;
        $nuevoProd->genero = $genero;
        $nuevoProd->save();

        $idP = DB::table('productos')->latest('id')->select('id')->get();
        //dd($idP[0]->id);

        $nuevoTP = new Tallas_ProductosModel;
        $nuevoTP->id_producto = $idP[0]->id;
        $nuevoTP->id_talla = $talla;
        $nuevoTP->cantidad = $cantidad;
        $nuevoTP->save();

        //Redireccionar
        return Redirect('/panel/productosModel/all');

    }
}
