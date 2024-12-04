<script>
    $(document).ready(function() {

        /* FORM RESERVA */

        $("#frmReserva").validate({
            event: "blur",
            rules: {
                'nombre': "required",
                'email': "required email",
                'fecha': "required"
            },
            messages: {
                'nombre': $('#campoObligatorio').val(),
                'email': $('#campoObligatorio').val(),
                'fecha': $('#campoObligatorio').val(),
            },
            debug: true,
            errorElement: "label",

            submitHandler: function(data) {

                var baseUrl = document.getElementById('baseUrl').value;
                const element = document.querySelector('#completeForm');
                element.classList.add('animate__animated', 'animate__fadeOut');
                element.addEventListener('animationend', () => {
                    $('#completeForm').addClass('d-none');
                    $('#resumenReservaPago').removeClass('d-none');
                    const element_a = document.querySelector('#resumenReservaPago');
                    element_a.classList.add('animate__animated', 'animate__fadeIn');
                    element.classList.remove('animate__animated', 'animate__fadeOut');
                    element_a.classList.remove('animate__animated', 'animate__fadeIn');
                });
                $('#nombre_resumen').html($('input[name="nombre"]').val());
                $('#apellido_resumen').html($('input[name="apellido"]').val());
                $('#whatsapp_resumen').html($('input[name="whatsapp"]').val());
                $('#email_resumen').html($('input[name="email"]').val());
                $('#fecha_resumen').html($('input[name="fecha"]').val());
                $('#hotel_resumen').html($('input[name="hotel"]').val());
                $('#adultos_resumen').html($('input[name="adultos"]').val());
                $('#menores_resumen').html($('input[name="menores"]').val());

                var total = $('#total_total').val();
                var reference_id = $('#paymentReference').val();
                var description = $('#description').val();
                var adultos = $('input[name="adultos"]').val();

                $('html, body').stop().animate({
                    scrollTop: $("#resumenReservaPago").offset().top - 113
                }, 1000);

                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            application_context: {
                                brand_name: 'CÁTULO TANGO SHOW',
                                user_action: 'PAY_NOW',
                                shipping_preference: 'NO_SHIPPING',
                            },
                            purchase_units: [{
                                reference_id: reference_id,
                                description: description,
                                amount: {
                                    currency: 'USD',
                                    value: total,
                                    breakdown: {
                                        item_total: {
                                            currency_code: 'USD',
                                            value: total
                                        },
                                    }
                                },
                                items: [{
                                    unit_amount: {
                                        currency_code: 'USD',
                                        value: total
                                    },
                                    quantity: '1',
                                    name: description,
                                    description: "descripcion show"
                                }, ],
                            }],
                        });
                    },

                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            //console.log(details);

                            $('html, body').stop().animate({scrollTop: $("#pay-response").offset().top - 113 }, 1000);

                            $('.box-show-int').addClass('d-none');
                            $('#pay-response').removeClass('d-none');

                            var texto = '<p id= class="mb-3">@lang('trans.Aguarde por favor')...</p>';
                            var loading = "<div style='text-align:center;'><div class='lds-ring-black'><div></div><div></div><div></div><div></div></div></div>";
                            var mensaje = texto + loading;
                            
                            $('#pay-response').html(mensaje);
                            $('#pay-response').fadeIn();

                            objResponse = {
                                orderId: data.orderID,
                                id: details.id,
                                orderStatus: details.status,
                                payerId: details.payer.payer_id,
                                payerEmail: details.payer.email_address,
                                payerCountry: details.payer.address
                                    .country_code,
                                payerName: details.payer.name.given_name +
                                    ' ' + details.payer.name.surname,
                                paymentAmount: details.purchase_units[0]
                                    .payments.captures[0].amount
                                    .currency_code + ' ' + details
                                    .purchase_units[0].payments.captures[0]
                                    .amount.value,
                                paymentReference: details.purchase_units[0]
                                    .reference_id,
                                paymentAmountId: details.purchase_units[0]
                                    .payments.captures[0].id,
                            };
                            objForm = $('#frmReserva').serializeArray().reduce(
                                function(m, o) {
                                    m[o.name] = o.value;
                                    return m;
                                }, {});
                            var jsonObject = $.extend({}, objResponse, objForm);
                            if (details.status == 'COMPLETED') {
                                var request = $.ajax({
                                    url: baseUrl + '/capturePayPal',
                                    type: 'POST',
                                    data: $.param(jsonObject)
                                });
                                request.done(function(data) {
                                    $('#pay-response').html(
                                        '<div style="text-align: center;">' +
                                        '<i class="fa-solid fa-check" style="font-size: 38px;"></i>' +
                                        '</div>' +
                                        '@lang('trans.Agradecemos sinceramente su reserva. Un voucher le será enviado por correo electrónico. Tenga en cuenta que el correo podría llegar a su carpeta de spam o correo no deseado. Si lo necesita, puede descargar el voucher directamente haciendo clic en el botón a continuación.')' +
                                        '<br><a href="' + data
                                        .voucherLink +
                                        '" target="_blank" style="background-color: #b60017; display: inline-block;" class="nav-link btn btn-primary mt-3">' +
                                        '<i class="fa-solid fa-ticket"></i> @lang('trans.Descargar Voucher')' +
                                        '</a>'
                                    );

                                    
                                });

                                request.fail(function(jqXHR) {});
                            } else {
                                alert('ERROR EN EL PAGO');
                                // FAIL PAY
                            }
                        });
                    },
                    onCancel: function(data) {
                        // CANCEL PAY
                        //alert('CANCEL');
                    }
                }).render('#paypal-button-container');
            }
        });
    });
</script>
