<!DOCTYPE html>
<html>

<head>
    <title>Reserva Catulo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .details {
            margin: 20px;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="alignment" align="center" style="line-height:10px"><a href="https://catulotango.com" target="_blank" style="outline:none" tabindex="-1"><img src="https://catulotango.com/images/CatuloTango-2.jpg" style="display: block; height: auto; border: 0; width: 136px; max-width: 100%;" width="136" alt="Logo" title="Logo"></a></div>
        <h2>Cátulo Tango - @lang('trans.Reserva') Nº: {{ $nro_reserva }}</h2>
        <p>Order Id: {{ $orderId }}</p>
        <hr>
    </div>
    <div class="details">

        <p><strong>@lang('trans.Nombre'):</strong> {{ $nombre }} {{ $apellido }}</p>
        <p><strong>WhatsApp:</strong> {{ $whatsapp }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Hotel:</strong> {{ $hotel }}</p>
        <p><strong>@lang('trans.Adultos'):</strong> {{ $adultos }}</p>
        <p><strong>@lang('trans.Menores'):</strong> {{ $menores }}</p>
        <p><strong>Show:</strong> {{ $show }}</p>
        <p><strong>@lang('trans.Fecha'):</strong> {{ $fecha }}</p>
        <p><strong>Total:</strong> USD {{ $total }}</p>
        <br>
        <p>Pickup schedule: 7:30 PM - 8:15 PM</p>
        <p>
            Dropoff: <br>
            After Show
        </p>
        <p>Wait in your Hotel Lobby</p>
    
        <p>@lang('trans.Atención: Por favor informar por mail : reservas@catulotango.com o por Whatsapp:+5491163991032 , dirección, número de habitación o apartamento y piso de dónde se encuentran hospedados (Centro, Recoleta o Palermo) para facilitar el traslado hacia nuestro establecimiento. Está información será solicitada 24 HS antes de ingresar al show. Las reservas que no presenten está información, no contarán con el servicio de transporte. Válido solo para Cena Show Tradicional y Cena Show VIP.')</p>

        <hr>

        <div style="font-family: sans-serif">
            <div class style="font-size: 12px; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px; color: #656565; line-height: 2;">
                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 28px;">(+5411) 6399-1032</p>
                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 28px;"><a href="mailto:info@catulotango.com.com" style="text-decoration: underline; color: #656565;">info@catulotango.com.com</a>&nbsp;</p>
                <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 28px;">Dr. Tomás Manuel de Anchorena 647 - Abasto - Buenos Aires - Argentina&nbsp;</p>
            </div>
        </div>

    </div>
        
</body>

</html>
