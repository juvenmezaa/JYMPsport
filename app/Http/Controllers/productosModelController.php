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
        //dd($this);
        $this->filter->submit('search');
        $this->filter->reset('reset');
        //dd($this);
        $this->filter->build();
        //dd($this);
        $this->grid = \DataGrid::source($this->filter);
        //dd($this);
        $this->grid->add('id','ID', true)->style("width:100px");
        $this->grid->add('{{$descripcion}}', 'Descripción');
        $this->grid->add('precio','Precio');
        $this->grid->add('costo','Costo');
        //$this->grid->add('{{ $tallasProd->pluck("cantidad")->sum() }}','Cantidad Total');
        $this->grid->add('{{ $tallasProd->pluck("cantidad")->sum() }}','Cantidad Total');
        $this->grid->add('visitas','Visitas');
        $this->grid->add('color','Color');
        $this->grid->add('genero','Genero');
        //dd($this);
        $this->grid->paginate(10);

        $this->addStylesToGrid();
        //dd($this);
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
    public function gestionar(Request $datos){
        if($datos->request->get('delete') !== null){
            //Obtenemos el id del producto:
            $id_Producto = $datos->request->get('delete');
            //Eliminamos de la tabla Tallas_Productos:
            DB::table('tallas_productos')->where('id_producto','=',$id_Producto)->delete();
            //Eliminamos de la tabla Productos:
            productosModel::find($id_Producto)->delete();
            return Redirect("/panel/productosModel/all");

        } else if($datos->request->get('show') !== null){
            $id_Producto = $datos->request->get('show');
            $producto = DB::table('productos AS P')->join('categorias AS C','C.id','=','P.id_categoria')->where('P.id',$id_Producto)->select('P.id','P.descripcion','P.precio','P.costo','P.color','P.imagen','P.genero','C.nombre')->get();
            $producto = $producto[0];
            $tallasCant = DB::table('tallas_productos AS TP')->join('tallas AS T','TP.id_talla','=','T.id')->where('id_producto',$id_Producto)->select('TP.id','TP.id_Producto','TP.id_talla','TP.cantidad','T.talla','T.descripcion')->get();
            return view('mostrarProducto', compact('producto','tallasCant'));
        } else if ($datos->request->get('modify') !== null) {
            $id_Producto = $datos->request->get('modify');
            $producto = DB::table('productos AS P')->join('categorias AS C','C.id','=','P.id_categoria')->where('P.id',$id_Producto)->select('P.id','P.descripcion','P.precio','P.costo','P.color','P.imagen','P.genero','P.id_categoria','C.nombre')->get();
            $producto = $producto[0];
            //dd($producto);
            $tallasCant = DB::table('tallas_productos AS TP')->join('tallas AS T','TP.id_talla','=','T.id')->where('id_producto',$id_Producto)->select('TP.id','TP.id_Producto','TP.id_talla','TP.cantidad','T.talla','T.descripcion')->get();
            //dd($tallasCant);
            $tallas = Tallas::all();
            $categorias = categoriasModel::all();
            return view('actualizarProducto', compact('producto','tallasCant','tallas','categorias'));
        }

        $categorias = categoriasModel::all();
        $tallas = Tallas::all();
        return view("registrarProducto", compact('categorias','tallas'));
    }

    public function actualizar(Request $datos){
        $producto = productosModel::find($datos->input('id'));
        $id_Producto = $datos->input('id');

        $producto->descripcion = $datos->input('descripcion');
        $producto->precio = $datos->input('precio');
        $producto->costo = $datos->input('costo');
        $producto->color = $datos->input('color');
        $producto->imagen = $datos->input('img');
        $producto->id_categoria = $datos->input('id_categoria');
        $producto->genero = $datos->input('genero');
        $producto->save();

        $cantxs = $datos->input('tallaXS');
        $cants = $datos->input('tallaS');
        $cantm = $datos->input('tallaM');
        $cantl = $datos->input('tallaL');

        if($cantxs){
            $idT = DB::table('tallas_productos')->where('id_producto','=',$id_Producto)->where('id_talla','=','1')->select('id')->first();
            if($idT){
                $tallasP = Tallas_ProductosModel::find($idT->id);
                $tallasP->id_talla = 1;
                $tallasP->id_producto = $id_Producto;
                $tallasP->cantidad = $cantxs;
                $tallasP->save();
            } else {
                $nuevoTP = new Tallas_ProductosModel;
                $nuevoTP->id_talla = 1;
                $nuevoTP->id_producto = $id_Producto;
                $nuevoTP->cantidad = $cantxs;
                $nuevoTP->save();
            }
        }
        if($cants){
            $idT = DB::table('tallas_productos')->where('id_producto','=',$id_Producto)->where('id_talla','=','2')->select('id')->first();
            if($idT){
                $tallasP = Tallas_ProductosModel::find($idT->id);
                $tallasP->id_talla = 2;
                $tallasP->id_producto = $id_Producto;
                $tallasP->cantidad = $cants;
                $tallasP->save();
            } else {
                $nuevoTP = new Tallas_ProductosModel;
                $nuevoTP->id_talla = 2;
                $nuevoTP->id_producto = $id_Producto;
                $nuevoTP->cantidad = $cants;
                $nuevoTP->save();
            }
        }
        if($cantm){
            $idT = DB::table('tallas_productos')->where('id_producto','=',$id_Producto)->where('id_talla','=','3')->select('id')->first();
            if($idT){
                $tallasP = Tallas_ProductosModel::find($idT->id);
                $tallasP->id_talla = 3;
                $tallasP->id_producto = $id_Producto;
                $tallasP->cantidad = $cantm;
                $tallasP->save();
            } else {
                $nuevoTP = new Tallas_ProductosModel;
                $nuevoTP->id_talla = 3;
                $nuevoTP->id_producto = $id_Producto;
                $nuevoTP->cantidad = $cantm;
                $nuevoTP->save();
            }
        }
        if($cantl){
            $idT = DB::table('tallas_productos')->where('id_producto','=',$id_Producto)->where('id_talla','=','4')->select('id')->first();
            if($idT){
                $tallasP = Tallas_ProductosModel::find($idT->id);
                $tallasP->id_talla = 4;
                $tallasP->id_producto = $id_Producto;
                $tallasP->cantidad = $cantl;
                $tallasP->save();
            } else {
                $nuevoTP = new Tallas_ProductosModel;
                $nuevoTP->id_talla = 4;
                $nuevoTP->id_producto = $id_Producto;
                $nuevoTP->cantidad = $cantl;
                $nuevoTP->save();
            }
        }

        return Redirect('/panel/productosModel/all');
    }

    public function guardar(Request $datos){
        $descripcion = $datos->input('descripcion');
        $precio = $datos->input('precio');
        $costo = $datos->input('costo');
        $cantxs = $datos->input('tallaXS');
        $cants = $datos->input('tallaS');
        $cantm = $datos->input('tallaM');
        $cantl = $datos->input('tallaL');
        $color = $datos->input('color');
        $imagen = $datos->input('img');
        //dd($cantl);
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
        if($cantxs){
            $nuevoTP = new Tallas_ProductosModel;
            $nuevoTP->id_producto = $idP[0]->id;
            $nuevoTP->id_talla = 1;
            $nuevoTP->cantidad = $cantxs;
            $nuevoTP->save();
        }
        if($cants){
            $nuevoTP = new Tallas_ProductosModel;
            $nuevoTP->id_producto = $idP[0]->id;
            $nuevoTP->id_talla = 2;
            $nuevoTP->cantidad = $cants;
            $nuevoTP->save();
        }
        if($cantm){
            $nuevoTP = new Tallas_ProductosModel;
            $nuevoTP->id_producto = $idP[0]->id;
            $nuevoTP->id_talla = 3;
            $nuevoTP->cantidad = $cantm;
            $nuevoTP->save();
        }
        if($cantl){
            $nuevoTP = new Tallas_ProductosModel;
            $nuevoTP->id_producto = $idP[0]->id;
            $nuevoTP->id_talla = 4;
            $nuevoTP->cantidad = $cantl;
            $nuevoTP->save();
        }
        //Redireccionar
        return Redirect('/panel/productosModel/all');

    }
}
