<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use App\Fun;
use App\Traduccion;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class TraduccionController extends Controller
{

    public function getData() {
               
        $traducciones = Traduccion::select();

        return Datatables::of($traducciones)

            ->addColumn('es', function ($traduccion) {
                $texto = Str::limit($traduccion->es, 40, '...');
                return "<a href='edit-traduccion/$traduccion->id'>$texto</a>"; 
            })

            ->addColumn('en', function ($traduccion) {
                $texto = Str::limit($traduccion->en, 40, '...');
                return "<a href='edit-traduccion/$traduccion->id'>$texto</a>"; 
            })

            ->addColumn('pr', function ($traduccion) {
                $texto = Str::limit($traduccion->pr, 40, '...');
                return "<a href='edit-traduccion/$traduccion->id'>$texto</a>"; 
            })

            ->addColumn('acciones', function ($traduccion) {
                return "<a href='delete-traduccion/$traduccion->id' class='delReg'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
            })

            ->rawColumns(['es','en','pr','acciones'])

            ->make(true);

    }


    public function viewTraducciones() {

        $traducciones = Traduccion::orderBy('es','desc')->get();
        return view('admin.traducciones.view_traducciones')->with(compact('traducciones'));
    
    }
    
    /*********************************************************/
    /*                      A D D                            */
    /*********************************************************/
    
    public function addTraduccion(Request $request) {
    	
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		//echo "<pre>"; print_r($data); die;
    		$traduccion = new Traduccion;
    		$traduccion->es = $data['es'];
            $traduccion->en = $data['en'];
            $traduccion->pr = $data['pr'];
					
    		$traduccion->save();

    		return redirect('/admin/view-traducciones')->with('flash_message','Traducción creada correctamente...');
    	}

        return view('admin.traducciones.add_traduccion');
    }

    /*********************************************************/
    /*                      E D I T                          */
    /*********************************************************/

    public function editTraduccion(Request $request, $id = null) {

        if ($request->isMethod('post')) {

            $data = $request->all();

            Traduccion::where(['id'=>$id])->update([
                    'es' => $data['es'],
                    'en' => $data['en'],
                    'pr' => $data['pr'],
                ]);
            return redirect('/admin/view-traducciones')->with('flash_message','Traducción actualizada correctamente...');
        }

        $traduccion = Traduccion::where(['id'=>$id])->first();
               
        return view('admin.traducciones.edit_traduccion')->with(compact('traduccion'));
    
    }

    /*********************************************************/
    /*                   D E L E T E                       */
    /*********************************************************/

    public function deleteTraduccion(Request $request, $id = null) {

        if (!empty($id)) {
            Traduccion::where(['id'=>$id])->delete();
            return redirect('/admin/view-traducciones')->with('flash_message','Traducción eliminada...');
        }

        $traducciones = Traduccion::get();
        return view('admin.traducciones.view_paises')->with(compact('traducciones'));
    
    }

    public function loadModel($id)
    {
    /*
        $model=Maquinas::model()->findByPk($id);
        return $model;
    */
    /*
    $model = 
    return $model;
    */

    }


}
