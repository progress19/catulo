<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use Image;
use App\Suscripcion;
use App\Fun;
use Yajra\Datatables\Datatables;
use App\Exports\SuscriptosExport;
use Maatwebsite\Excel\Facades\Excel;

class SuscripcionController extends Controller {

        public function getData() {

            $suscripciones = Suscripcion::select();
                    
            return Datatables::of($suscripciones)
        
                ->addColumn('email', function ($suscripcion) {
                    return $suscripcion->email; 
                })

                ->addColumn('acciones', function ($suscripcion) {
                    return "<a href='delete-suscripcion/$suscripcion->id' class='delReg'><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
                })

                ->rawColumns(['email','acciones'])    
                ->make(true);

        }

        public function exportarSuscriptos() {
            return Excel::download(new SuscriptosExport, 'suscripciones.xlsx');
        }

      public function enviarSuscribir(Request $request) {
      
          $sus = Suscripcion::where('email',$request->email_sus)->get();
        
          if (count($sus)==0) {
              $suscripcion = new Suscripcion();
              $suscripcion->email = $request->email_sus;
              $suscripcion->save();            
      
            return '<div style="padding-top: 30px;"><span style="font-size:20px;"><i class="fas fa-check"></i></span> '.__("trans.Gracias por suscribirte!").'</div>';

          } else {
            return '<div style="padding-top: 30px;"><span style="font-size:20px;"><i class="fas fa-check"></i></span> '.__("trans.El email que intenta registrar, ya se encuentra en nuestra base de datos.").'</div>';
          }
          
      }

    public function viewSuscripciones() {

        $suscripciones = Suscripcion::orderBy('id','asc')->get();
        return view('admin.suscripciones.view_suscripciones')->with(compact('suscripciones'));
    
    }

    /*********************************************************/
    /*                   D E L E T E                         */
    /*********************************************************/

    public function deleteSuscripcion(Request $request, $id = null) {

        if (!empty($id)) {
            Suscripcion::where(['id'=>$id])->delete();
            return redirect('/admin/view-suscripciones')->with('flash_message','Suscripcion eliminada...');
        }

        $suscripciones = Suscripcion::get();
        return view('admin.suscripciones.view_suscripciones')->with(compact('suscripciones'));
    
    }




}
