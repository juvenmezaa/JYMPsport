<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\Tallas_ProductosModel;
use DB;
use Illuminate\Http\Request;

class Tallas_ProductosModelController extends CrudController
{
        public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(Tallas_ProductosModel::with('productos','tallas'));
        $this->filter->add('id', 'ID', 'text');
        $tallas = array();
        $tallas["1"] = "XS";
        $tallas["2"] = "S";
        $tallas["3"] = "M";
        $tallas["4"] = "L";
        //dd($tallas);
        $this->filter->add('id_talla', 'TALLA', 'select')->options($tallas);
        $this->filter->add('id_producto', 'PRODUCTO', 'text');
  		$this->filter->add('cantidad', 'Cantidad', 'text');

        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();
        //$t=$this->'id_talla';
       // dd($t);

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('id_talla', 'TALLA');
        $this->grid->add('{{ implode(", ", $tallas->pluck("talla")->all()) }}','Talla');
        $this->grid->add('id_producto','PRODUCTO');
        $this->grid->add('{{ implode(", ", $productos->pluck("descripcion")->all()) }}','Descripción Producto');
        $this->grid->add('cantidad', 'Cantidad');
        
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


        $this->edit = \DataEdit::source(new \App\Tallas_ProductosModel());

        $this->edit->label('Editar REL TP');
        $this->edit->add('id','id','text')->rule('required');
        $this->edit->add('id_talla','Talla','text')->rule('required');
        $this->edit->add('id_producto','PRODUCTO','text')->rule('required');
        $this->edit->add('cantidad','Cantidad','text')->rule('required');
        
        return $this->returnEditView();
    }    
}
