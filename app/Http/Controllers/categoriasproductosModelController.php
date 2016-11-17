<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\categoriasModel;
use App\productosModel;
use DB;
use App\Http\Controllers\categoriasproductosController;

class categoriasproductosModelController extends CrudController{

	public function asignarACategoria2(Request $request){
		dd($request);
		categoriasproductosController::asignarACategoria2;
		$id = $request->input('option');
		dd($id);
		$productosG = DB::table('categorias_productos AS CP')->join('productos AS P','P.id','CP.id_producto')->where('id_categoria','<>',$id)->get;
		$productos = $productosG->lists('descripcion','id');
		$categorias = categoriasModel::all();
		return view("asignarProdACat", compact('categorias','productos'));
	}

	public function asignar(){
		$id_producto = $request->input('producto');
		$id_categoria = $request->input('categoria');
		$consulta = DB::table('categorias_productos')->where('id_producto','=',$id_producto,'AND','id_categoria','=',$id_categoria)->get();
		dd($consulta);
		$nuevo = new categoriasproductosModel;
		$nuevo->id_categoria = $id_categoria;
		$nuevo->id_producto = $id_producto;
		$nuevo->save();

		return view("asignarProdACat");
	}

	public function asignarACategoria(){
		// $productosG = DB::table('productos')->where('genero','=',$genero)->get();
		// $productos = $productosG->lists('descripcion','id');

		// $categoriasG = DB::table('categorias AS C')->join('categorias_productos AS CP','C.id','=','CP.id_categoria')->join('productos AS P','P.id','=','CP.id_producto')->where('P.genero','=',$genero)->get();
		// $categoriasG = categoriasModel::find($id)->nombre;

		// $categorias = $cateogirasG->lists('nombre','id');
		$productos = productosModel::all();
		$categorias = categoriasModel::all();
		return view("asignarProdACat", compact('categorias','productos'));
	}

    public function all($entity){
        parent::all($entity); 

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
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	
			$this->edit = \DataEdit::source(new \App\Category());

			$this->edit->label('Edit Category');

			$this->edit->add('name', 'Name', 'text');
		
			$this->edit->add('code', 'Code', 'text')->rule('required');


        */
       
        return $this->returnEditView();
    }    
}
