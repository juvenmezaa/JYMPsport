<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;
use DB;
use App\comentariosModel;
use Illuminate\Http\Request;

class comentariosModelController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        $this->filter = \DataFilter::source(comentariosModel::with('users'));
        $this->filter->add('id', 'ID', 'text');
        $this->filter->add('id_usuario', 'Usuario', 'text');
        $this->filter->add('id_producto', 'Producto', 'text');
        $this->filter->add('fecha', 'Fecha de Publicación', 'date');
        $this->filter->add('comentario', 'Comentario', 'text');

        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('comentario', 'Comentario');
        
        //$usuario = DB::table('users AS u')->join('comentarios AS c', 'c.id_usuario','=','u.id')->select('u.name')->get();
        $this->grid->add('id_usuario','Usuario');
        //$this->grid->add('{{ $comentarios->pluck("name")->all() }}','UsuarioNombre');
        $this->grid->add('{{ implode(", ", $users->pluck("name")->all()) }}','Nombre de Usuario');
        //$usuario = $this->grid->getColumn('id_usuario');

        //$user = $usuario->name;
        //dd($usuario);
        //$productos = array();

        //$productos = \App\comentariosModel::pluck("","id")->all();
        //$this->grid->add('{{ implode(", ", $roles->pluck("name")->all()) }}', 'Role');
        //$this->grid->add('{{ implode(" ", DB::table("users")->pluck("name","id")->all()) }}','Usuario');
        //$this->grid->add('{{ DB::table("users AS U")->join("comentarios AS C","U.id","=","C.id_usuario")->pluck("U.name")->all() }}','UsuarioNombre');
        $this->grid->add('id_producto','Producto');

        $this->grid->paginate(10);

        $this->addStylesToGrid();
    
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);
		
		/*
		$this->edit = \DataEdit::source(new \App\comentariosModel());
	
        $this->edit->label('Editar Comentario');
        $this->edit->add('descripcion','Descripción','text')->rule('required');
        $this->edit->add('precio','Precio','text')->rule('required');
        $this->edit->add('costo','Costo','text')->rule('required');
        $this->edit->add('cantidad','Cantidad','text')->rule('required');
        $this->edit->add('talla','Talla','select')->options(\App\Tallas::pluck("talla","id")->all())->rule('required');
        //$tallas = DB::table('tallas')->select('id','talla')->get();
        //$this->edit->add('talla','Talla','select')->options($tallas);
        $this->edit->add('color','Color','text')->rule('required');
        $this->edit->add('imagen','Imagen','image')->move(public_path().'/img/productos','')->preview(80,80);
        $generos = array();
        $generos["0"] = "Mujer";
        $generos["1"] = "Hombre";
        //dd($generos);
        $this->edit->add('genero','Genero','select')->options($generos)->rule('required');
       */
        return $this->returnEditView();
    }    
}
