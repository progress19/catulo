<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;
use App\Fun;
use Yajra\Datatables\Datatables;
use Image;
use Hashids\Hashids;

class ShowController extends Controller {

    public function __construct() {
        $this->hashids = new Hashids();
    }

    public static function calculateTotal() {
       //$adultos = 
        $show = Show::where( ['id' => $_REQUEST['id'] ] )->first();
        return $_REQUEST['adultos'] * $show->precio + $_REQUEST['menores'] * $show->precio / 2;
    }

    public function viewShow($locale, $id, $slug) {
        $show = Show::where( ['id' => $this->hashids->decode($id)[0]] )->first();
        return view('show')->with(compact('show'));
    }

    public function getData() {
               
        $shows = Show::select();

        return Datatables::of($shows)

            ->addColumn('imagen', function ($show) {
                return '<img src=" '.asset( Fun::getPathImage('large','shows',$show->imagen)).' " class="img-responsive" style="height:70px" >';
            })

            ->addColumn('titulo_es', function ($show) {
                return "<a href='edit-show/$show->id'>$show->titulo_es</a>"; 
            })

            ->addColumn('precio', function ($show) {
                return 'USD '.$show->precio; 
            })

            ->addColumn('estado', function ($show) {
                return Fun::getIconStatus($show->estado); 
            })

            ->addColumn('acciones', function ($show) {
                return "<a href='delete-show/$show->id' class='delReg'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
            })

            ->rawColumns(['titulo_es','precio','imagen','estado','acciones'])

            ->make(true);

    }

    public function viewShows() {

        $shows = Show::orderBy('titulo_es','asc')->get();
        return view('admin.shows.view_shows')->with(compact('shows'));
    }

    /*********************************************************/
    /*                      A D D                            */
    /*********************************************************/
    
    public function addShow(Request $request) {
        
        if ($request->isMethod('post')) {
            $data = $request->all();

            $show = new Show;
            $show->titulo_es = $data['titulo_es'];
            $show->titulo_en = $data['titulo_en'];
            $show->titulo_pr = $data['titulo_pr'];
            $show->des_es = $data['des_es'];
            $show->des_en = $data['des_en'];
            $show->des_pr = $data['des_pr'];
            $show->precio = $data['precio'];
            $show->estado = $data['estado'];

            //upload image
            if ($request->hasFile('imagen')) {

                $image_tmp = $request->file('imagen');
                if ($image_tmp->isValid()) {
                                        
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(0000000,9999999).'.'.$extension;
                    
                    //dd(Fun::getPathImage('large','show',$filename));

                    //Resize image
                    Image::make($image_tmp)->save(Fun::getPathImage('large','shows',$filename));

                    //Store
                    $show->imagen = $filename;
                }
            }
    
            $show->save();
            return redirect('/admin/view-shows')->with('flash_message','Show creado correctamente...');
        }

       return view('admin.shows.add_show');
    }

    /*********************************************************/
    /*                      E D I T                          */
    /*********************************************************/

    public function editShow(Request $request, $id = null) {

        if ($request->isMethod('post')) {

            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            //upload imagen
            if ($request->hasFile('imagen')) {

                $image_tmp = $request->file('imagen');
                if ($image_tmp->isValid()) {
                                        
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(0000000,9999999).'.'.$extension;
                    
                    //Resize image
                    Image::make($image_tmp)->save(Fun::getPathImage('large','shows',$filename));
                }

            } else {$filename = $data['current_imagen'];}
            
            Show::where(['id'=>$id])->update([
                'titulo_es' => $data['titulo_es'],
                'titulo_en' => $data['titulo_en'],
                'titulo_pr' => $data['titulo_pr'],
                'des_es' => $data['des_es'],
                'des_en' => $data['des_en'],
                'des_pr' => $data['des_pr'],
                'precio' => $data['precio'],
                'imagen' => $filename,
                'estado' => $data['estado'],
                ]);
            return redirect('/admin/view-shows')->with('flash_message','Show actualizado correctamente...');
        }

        $show = Show::where(['id'=>$id])->first();
       
        return view('admin.shows.edit_show')->with(compact('show'));
    
    }


    /*********************************************************/
    /*                   D E L E T E                       */
    /*********************************************************/

    public function deleteShow(Request $request, $id = null) {

        if (!empty($id)) {
            Show::where(['id'=>$id])->delete();
            return redirect('/admin/view-shows')->with('flash_message','Show eliminado...');
        }

        $shows = Show::get();
        return view('admin.shows.view_show')->with(compact('shows'));
    
    }


}
