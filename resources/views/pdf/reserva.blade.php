<!DOCTYPE html>
<html>

<head>
    <title>Reserva</title>
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
        <h1>Cátulo Tango - Reserva</h1>
    </div>
    <div class="details">
        <p><strong>Nombre:</strong> {{ $nombre }} {{ $apellido }}</p>
        <p><strong>WhatsApp:</strong> {{ $whatsapp }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Hotel:</strong> {{ $hotel }}</p>
        <p><strong>Adultos:</strong> {{ $adultos }}</p>
        <p><strong>Menores:</strong> {{ $menores }}</p>
        <p><strong>Show:</strong> {{ $show }}</p>
        <p><strong>Fecha:</strong> {{ $fecha }}</p>
        <p><strong>Total:</strong> USD {{ $total }}</p>
    </div>
</body>

</html>
