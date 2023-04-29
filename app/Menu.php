<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    protected $table = "menus";

    public static function getTitleImgMenu( $tipo, $img ) {
    
        $title = '';

        if ( $tipo == 1 ) { // Entradas
            if ( $img == 1 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Empanada de carne'; break;
                case 'en': $title = 'Hand cutted meat (Empanada)'; break;
                case 'pr': $title = 'Empanada de carne'; break;
                }   
            }
            if ( $img == 2 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Ensalada Caprese'; break;
                case 'en': $title = 'Caprese salad'; break;
                case 'pr': $title = 'Salada caprese'; break;
                }   
            }
            if ( $img == 3 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Sopa del día'; break;
                case 'en': $title = 'Soup of the day'; break;
                case 'pr': $title = 'Sopa do dia'; break;
                }   
            }
        }

        if ( $tipo == 2 ) { // Principal
            if ( $img == 1 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Pollo relleno'; break;
                case 'en': $title = 'Stuffed Chicken'; break;
                case 'pr': $title = 'Frango recheado'; break;
                }   
            }
            if ( $img == 2 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Ravioles de espinaca'; break;
                case 'en': $title = 'Spinach ravioli'; break;
                case 'pr': $title = 'Ravióli de espinafre'; break;
                }   
            }
            if ( $img == 3 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Salmón con vegetales'; break;
                case 'en': $title = 'Salmon with vegetables'; break;
                case 'pr': $title = 'Salmão com legumes'; break;
                }   
            }
            if ( $img == 4 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Bife de chorizo con papas'; break;
                case 'en': $title = 'Steak meat with rustic fries'; break;
                case 'pr': $title = 'Bife de chouriço com batatas'; break;
                }   
            }
        }

        if ( $tipo == 3 ) { // Postres
            if ( $img == 1 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Brownie con helado'; break;
                case 'en': $title = 'Brownie with ice cream'; break;
                case 'pr': $title = 'Brownie com sorvete'; break;
                }   
            }
            if ( $img == 2 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Flan con dulce de leche y crema'; break;
                case 'en': $title = 'Homemade custar (dulce de leche) and cream'; break;
                case 'pr': $title = 'Flan com doce de leite e creme'; break;
                }   
            }
            if ( $img == 3 ) { switch ( app()->getLocale() ) {
                case 'es': $title = 'Panqueques con dulce de leche'; break;
                case 'en': $title = 'Pancakes with dulce de leche'; break;
                case 'pr': $title = 'Panqueca com doce de leite'; break;
                }   
            }
        }
                        
        echo $title;
    
    }

}

