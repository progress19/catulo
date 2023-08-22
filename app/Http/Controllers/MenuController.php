<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;
use App\Fun;
use Yajra\Datatables\Datatables;

class MenuController extends Controller {
        
    public function viewMenu() {  //front
        $menus = Menu::get();        

      /*
        for ( $id=1; $id < 4; $id++ ) { 

            $menu = Menu::where([ 'id' => $id ])->first();

            switch ( app()->getLocale() ) {
            
                case 'es':
                    $link = asset('pics/menus/large/'.$menu->es);
                    break;

                case 'en':
                    $link = asset('pics/menus/large/'.$menu->en);
                    break;

                case 'pr':
                    $link = asset('pics/menus/large/'.$menu->en);
                    break;
                }    
            
        }
        */
        return view('menu')->with(compact($menus));
    }

    public function getData() {
        $menus = Menu::select();
        return Datatables::of($menus)
            ->addColumn('nombre', function ($menu) {
                return "<a href='edit-menu/$menu->id'>$menu->nombre</a>"; 
            })
            ->addColumn('es', function ($menu) {
                return "<a target='new' href='".asset('pics/menus/large/'.$menu->es)."'>$menu->es</a>"; 
            })
            ->addColumn('en', function ($menu) {
                return "<a target=_new' href='".asset('pics/menus/large/'.$menu->en)."'>$menu->en</a>"; 
            })
            ->addColumn('pr', function ($menu) {
                return "<a target='new' href='".asset('pics/menus/large/'.$menu->pr)."'>$menu->pr</a>"; 
            })
            ->rawColumns(['nombre','es','en','pr'])
            ->make(true);
    }

    public function viewMenus() {
        return view('admin.menus.view_menus');
    }

    /*********************************************************/
    /*                      E D I T                          */
    /*********************************************************/

    public function editMenu(Request $request, $id = null) {

        if ($request->isMethod('post')) {

            $data = $request->all();
            $filePath = 'pics/menus/large/';

            //upload es
            if ($request->hasFile('es')) {

                $file = $request->file('es');
                $filename_es = $request->file('es')->getClientOriginalName();
                $file->move($filePath, $filename_es);
                 
            } else {$filename_es = $data['current_file_es'];}

            //upload en
            if ($request->hasFile('en')) {

                $file = $request->file('en');
                $filename_en = $request->file('en')->getClientOriginalName();
                $file->move($filePath, $filename_en);
                 
            } else {$filename_en = $data['current_file_en'];}

            //upload pr
            if ($request->hasFile('pr')) {

                $file = $request->file('pr');
                $filename_pr = $request->file('pr')->getClientOriginalName();
                $file->move($filePath, $filename_pr);
                 
            } else {$filename_pr = $data['current_file_pr'];}
            
            Menu::where(['id'=>$id])->update([
                'es' => $filename_es,
                'en' => $filename_en,
                'pr' => $filename_pr,
            ]);
            return redirect('/admin/view-menus')->with('flash_message','Menú actualizado correctamente...');
        }

        $menu = Menu::where(['id'=>$id])->first();
        return view('admin.menus.edit_menu')->with(compact('menu'));
    }
}
