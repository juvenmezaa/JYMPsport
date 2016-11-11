<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use DB;
use Illuminate\Http\Request;

class productosModelController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(new \App\Productos());
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('descripcion', 'Descripción', 'text');
        $this->filter->add('precio', 'Precio', 'text');
        $this->filter->add('costo', 'Costo', 'text');
        $this->filter->add('talla', 'Talla', 'select')->options(\App\Tallas::pluck("talla","id")->all());
        $this->filter->add('color', 'Color', 'text');
        $generos = array();
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
        $this->grid->add('cantidad','Cantidad');
        $this->grid->add('visitas','Visitas');
        $this->grid->add('talla','Talla');
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
    
    public function  edit($entity){
        
        parent::edit($entity);


        $this->edit = \DataEdit::source(new \App\Productos());

        $this->edit->label('Editar Producto');
        $this->edit->add('descripcion','Descripción','text')->rule('required');
        $this->edit->add('precio','Precio','text')->rule('required');
        $this->edit->add('costo','Costo','text')->rule('required');
        $this->edit->add('cantidad','Cantidad','text')->rule('required');
        $this->edit->add('talla','Talla','select')->options(\App\Tallas::pluck("talla","id")->all())->rule('required');
        //$tallas = DB::table('tallas')->select('id','talla')->get();
        //$this->edit->add('talla','Talla','select')->options($tallas);
        $this->edit->add('color','Color','text')->rule('required');
        $this->edit->add('imagen','Imagen','image')->move(public_path().'/img/productos','')->preview(80,80);
        $this->edit->add('id_categoria','Categoria','select')->options(\App\CategoriasModel::pluck("nombre","id")->all())->rule('required');
        $generos = array();
        $generos["0"] = "Mujer";
        $generos["1"] = "Hombre";
        //dd($generos);
        $this->edit->add('genero','Genero','select')->options($generos)->rule('required');

        return $this->returnEditView();
    }    
}
