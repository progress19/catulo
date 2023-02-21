<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model {

    protected $table = "reservas";

    public function show()   {
        return $this->belongsTo('App\Show', 'idShow');
    }

    public static function getPagoStatus($id) {
    
        $reserva = Reserva::find($id);

            switch ( $reserva->orderStatus ) {
                
                case 'COMPLETED':
                    return '<span class="pago-aprobado"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> APROBADO';
                    break;
                
                case 'rejected':
                    return '<span class="pago-rechazado"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> RECHAZADO';
                    break;
                
                case 'pending':
                    return '<span class="pago-pendiente"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> PENDIENTE';
                    break;
                
                case 'in_process':
                    return '<span class="pago-proceso"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> EN PROCESO';
                    break;
                
                case 'cancelado':
                    return '<span class="pago-cancelado"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> CANCELADO';
                    break;
                
                default:
                    return '<span class="pago-sinestado"><span class="glyphicon glyphicon-warning-sign" title="Estado desconocido" aria-hidden="true"></span> S/E';
                break;

            }

    }

}
