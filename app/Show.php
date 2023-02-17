<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Hashids\Hashids;

class Show extends Model {
    
    protected $table = "shows";

    public function getSlugAttribute() {

        switch ( app()->getLocale() ) {
            case 'es':
                $slug = $this->attributes['titulo_es'];
                break;
            case 'en':
                $slug = $this->attributes['titulo_en'];
                break;
            case 'pr':
                $slug = $this->attributes['titulo_en'];
                break;
        }        

        return Str::slug( $slug );
    
    }

    public function getIdentityAttribute() {
        $hashids = new Hashids();
        return $hashids->encode($this->attributes['id']);
    }

    public static function getNombreShow($id) {

        $show = Show::where( [ 'id' => $id ] )->first();

        switch ( app()->getLocale() ) {
            case 'es':
                return $show->titulo_es;
                break;
            case 'en':
                return $show->titulo_en;
                break;
            case 'pr':
                return $show->titulo_pr;
                break;
        }

    }

    public static function getDescripcionShow($id) {

        $show = Show::where( [ 'id' => $id ] )->first();
        
        switch ( app()->getLocale() ) {
            case 'es':
                return $show->des_es;
                break;
            case 'en':
                return $show->des_en;
                break;
            case 'pr':
                return $show->des_pr;
                break;
        }

    }

}
