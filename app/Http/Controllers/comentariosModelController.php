<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;
use App\comentariosModel;
use Illuminate\Support\Facades\Auth;

class comentariosModelController extends CrudController{

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
    public function comentar(Request $request){
    	if (Auth::check()) {
    	// The user is logged in...
    		$fecha=getdate();
            $idUser = Auth::user()->id;
            $idProd=$request->input('idprod');
            $com=$request->input('txtComentario');
            $nuevo=new comentariosModel;
            $nuevo->id_usuario=$idUser;
            $nuevo->id_producto=$idProd;
            $nuevo->comentario=$com;
            $nuevo->fecha=$fecha["year"]."/".$fecha["mon"]."/".$fecha["mday"];
            $nuevo->save();

            return back()->withInput();
        }
        return Redirect('/login');
    }    
}
