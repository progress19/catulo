<?php

namespace App\Http\Controllers;
use App;
use Lang;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;

use App\Config;
use App\ImgsHome;
use App\Show;
use App\Fun;
use App\Reserva;
use Hashids\Hashids;

use Barryvdh\DomPDF\Facade\Pdf;

class Controller extends BaseController {

    public function __construct() {
        $this->hashids = new Hashids();
    }
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function testEmail(Request $request) {
            $config = Config::where(['id' => 1])->first();
            $data = [];

            //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }}...
            \Mail::send('emails.test', $data, function ($message) use ($config) {
                //remitente
                $message->from('noreply@xxxxxxxx.com', 'xxxxxxxx.com');
                //asunto
                $message->subject('TEST xxxxxxxx xxxxxxxx');
                $message->to('mauriciolav@gmail.com', 'xxxxxxxx.com');
                
            });
        }
    
        public function capturePayPal(Request $request) {

            $show = Show::where( [ 'id' => $this->hashids->decode($request->paymentReference)[0] ] )->first();
            $model = new Reserva;
            
                $model->orderId = $request->orderId;
                $model->orderStatus = $request->orderStatus;
                $model->payerid = $request->payerId;
                $model->payerEmail = $request->payerEmail;
                $model->payerCountry = $request->payerCountry;
                $model->payerName = $request->payerName;
                $model->paymentAmount = $request->paymentAmount;
                $model->paymentAmountId = $request->paymentAmountId;
                $model->idShow = $this->hashids->decode($request->paymentReference)[0];
                $model->nombre = $request->nombre;
                $model->apellido = $request->apellido;
                $model->email = $request->email;
                $model->telefono = $request->whatsapp;
                $model->hotel = $request->hotel;
                $model->fecha = \Carbon\Carbon::createFromFormat('d/m/Y', $request->fecha);
                $model->adultos = $request->adultos;
                $model->menores = $request->menores;
                $model->precio_show = $show->precio;
                $model->total = $request->total_total;
                $model->save();

                /* email send */

                sleep(1);
                App::setLocale($request->locale);

                //$data = $request->all();

                $data = [
                    'nombre' => $request->nombre, 
                    'apellido' => $request->apellido, 
                    'whatsapp' => $request->whatsapp, 
                    'email' => $request->email,
                    'hotel' => $request->hotel,
                    'adultos' => $request->adultos,
                    'menores' => $request->menores,
                    'show' => Show::getNombreShow($show->id),
                    'fecha' => $request->fecha,
                    'precio' => $show->precio,
                    'total' => $request->total_total,
                    'nro_reserva' => $model->id,
                    'orderId' => $model->orderId
                ];

                // Generar PDF
                $pdf = Pdf::loadView('pdf.reserva', $data);
                
                // Guardar PDF temporalmente
                $pdfPath = storage_path('app/public/vouchers/' . $model->orderId . '.pdf');
                $pdf->save($pdfPath);

                \Mail::send('emails.reserva', $data, function($message) use ($request) {
                //remitente
                $message->from('info@catulotango.com', 'Cátulo Tango');
                //asunto
                $message->subject( __('trans.Reserva Cátulo Tango') );
                //destinatarios
                $config = Config::where( ['id'=>1] )->first();
                $destinatarios = explode(',', $config->destinatarios);

                foreach ($destinatarios as $destinatario) {
                    $message->to($destinatario, 'Cátulo Tango');  
                }
                $message->to($request->email, $request->nombre);
            });
            return response()->json([
                'success' => true,
                'voucherLink' => asset('storage/vouchers/' . $model->orderId . '.pdf'),
            ]);
        }

    public function viewEventos() {
        $random_number_array = range(1, 19);
        shuffle($random_number_array );
        $arrays = array_slice($random_number_array ,0,16);
        return view('eventos')->with(['arrays' => $arrays]);
    }

    public function viewHome() {
        $imgsHome = ImgsHome::where('estado','=',1)->inRandomOrder()->limit(12)->get();
        $shows = Show::where('estado','=',1)->get();
        return view('home')->with([
            'imgsHome' => $imgsHome,
            'shows' => $shows
        ]);
    }

    public function enviarContacto(Request $request) {
        sleep(1);
        App::setLocale($request->locale);

        $data = $request->all();

        \Mail::send('emails.contacto', $data, function($message) use ($request) {
            
            //remitente
            //$message->from($request->email, $request->name);
            $message->from('info@catulotango.com', 'Cátulo Tango');

            //asunto
            $message->subject( __('trans.Contacto desde Cátulo Tango') );

            //destinatarios
            $config = Config::where( ['id'=>1] )->first();

            $destinatarios = explode(',', $config->destinatarios);
            foreach ($destinatarios as $destinatario) {
                $message->to($destinatario, 'Cátulo Tango');  
            }
            $message->to($request->email, $request->nombre);
        });
         
        return '<div style="padding-top:40px"><span style="font-size:30px"><i class="fas fa-check"></i></span><br>'.__("trans.GRACIAS POR SU CONSULTA!").' </div>';

    }

}
