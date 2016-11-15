<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use App\categoriasModel;
use Illuminate\Http\Request;

class categoriasModelController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(categoriasModel::with('productos'));
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('nombre', 'Nombre', 'text');
        $this->filter->add('descripcion', 'Descripción', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('nombre','Nombre');
        $this->grid->add('{{$descripcion}}', 'Descripción');
        $this->grid->add('{{ implode("\n ",$productos->pluck("descripcion")->all()) }}','Total de Productos');

        $this->grid->paginate(10);
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        $this->edit = \DataEdit::source(new categoriasModel());

        $this->edit->label('Editar Categoría');
       
        $this->edit->add('nombre','Nombre', 'text')->rule('required');
        $this->edit->add('descripcion', 'Descripción', 'text')->rule('required');

        return $this->returnEditView();
    }    
}
