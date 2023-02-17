$(document).ready(function() {

    /* FORM SUSCRIBIR */

    $("#frmSuscribir").validate({

        event: "blur",
        rules: {
            'email_sus': "required email",
        },
        messages: {
            'email_sus': $('#emailSusTra').val(),
        },
        debug: true,
        errorElement: 'label',
        submitHandler: function(form){
            $("#frmSuscribir").hide();
            $("#responseSuscribir").show();
            $("#responseSuscribir").html("<div style='text-align:center; padding-top:4px'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div>");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            })

            $.ajax({

                url:"enviarSuscribir",
                method: "post",
                data: $('#frmSuscribir').serialize(),
                success: function(msg){
                    $('#responseSuscribir').html(msg);
                }
            });
        }
    }); 

    /* FORM CONTACTO */

    $("#mensaje").hide();

        $("#frmContacto").validate({
            event: "blur",
            rules: {'nombre': "required",'email': "required email",'comentario': "required"},
            messages: {
                'nombre': $('#campoObligatorio').val(),
                'email': $('#campoObligatorio').val(),
                'comentario': $('#campoObligatorio').val(), 
            },
            debug: true,errorElement: "label",
            submitHandler: function(form){

            /*
                if (grecaptcha === undefined) {
                    alert('Recaptcha not defined'); 
                    return; 
                }

                var response = grecaptcha.getResponse();

                if (!response) {

                        grecaptcha.reset();
                        grecaptcha.execute();

                    //alert('Coud not get recaptcha response'); 
                    return; 
                } 
            */

                var baseUrl = document.getElementById('baseUrl').value;

                $("#frmContacto").hide();
                $("#responseContacto").show();
                $("#responseContacto").html("<div style='text-align:center; padding-top:40px'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div>");
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                })
                $.ajax({

                    url: baseUrl+"/enviarContacto",
                    method: "post",
                    data: $('#frmContacto').serialize(),
                    success: function(msg){
                        $('#responseContacto').html(msg);
                    }
                });
            }
        });    


  

});