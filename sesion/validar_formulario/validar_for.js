$(document).ready(function() {
//Validando si existe la Cedula en BD antes de enviar el Form
$("#documento").on("keyup", function() {
var documento = $("#documento").val(); //CAPTURANDO EL VALOR DE INPUT CON ID CEDULA
var longitudCedula = $("#documento").val().length; //CUENTO LONGITUD
//Valido la longitud 
if(longitudCedula >= 5){
        $.ajax({
            url: 'validar_formulario/validar_documento.php',
            type: "post",
            data: {
                documento: documento
                },
            success: function(datos){
                if( datos.success == 1){
                    $("#respuesta").html(datos.message);
                        $("input#nombre").attr('disabled',true); //Desabilito el input nombre
                        $("input#documento").attr('disabled',false); //Habilitando el input cedula
                        $("input#email").attr('disabled',true); //Desabilito el Botton
                        $("input#usuario").attr('disabled',true); //Desabilito el Botton
                        $("input#pass").attr('disabled',true); //Desabilito el Botton
                        $("#entrar").attr('disabled',true); //Desabilito el Botton
                    }else{
                    $("#respuesta").html(datos.message);
                        $("input#nombre").attr('disabled',false); //Habilito el input nombre
                        $("input#email").attr('disabled',false);
                        $("input#usuario").attr('disabled',false);
                        $("input#pass").attr('disabled',false);
                        $("#entrar").attr('disabled',false); //habilito el Botton
                        }
            }
    });
    }
});


$("#email").on("keyup", function() {
            var email = $("#email").val(); //CAPTURANDO EL VALOR DE INPUT CON ID CEDULA
                $.ajax({
                    url: 'validar_formulario/validarCorreo.php',
                    type: "post",
                    data: {
                    email: email
                    },
                    
                    success: function(datos){
                        if( datos.success == 1){
                        $("#respuesta_correo").html(datos.message);
                            $("input#nombre").attr('disabled',true); //Desabilito el input nombre
                            $("input#documento").attr('disabled',true); //Habilitando el input cedula
                            $("input#email").attr('disabled',false); //Desabilito el Botton
                            $("input#usuario").attr('disabled',true); //Desabilito el Botton
                            $("input#pass").attr('disabled',true); //Desabilito el Botton
                            $("#entrar").attr('disabled',true); //Desabilito el Botton
                        }else{
                        $("#respuesta_correo").html(datos.message);
                            $("input#nombre").attr('disabled',false); //Habilito el input nombre
                            $("input#documento").attr('disabled',false);
                            $("input#usuario").attr('disabled',false);
                            $("input#pass").attr('disabled',false);
                            $("#entrar").attr('disabled',false); //habilito el Botton
                            }
                            }
                        });
                        
                    });


                    $("#usuario").on("keyup", function() {
                        var usuario = $("#usuario").val(); //CAPTURANDO EL VALOR DE INPUT CON ID usuario
                            $.ajax({
                                url: 'validar_formulario/validar_usuario.php',
                                type: "post",
                                data: {
                                    usuario: usuario
                                },
                                success: function(datos){
                                    if( datos.success == 1){
                                    $("#respuesta_usuario").html(datos.message);
                                        $("input#nombre").attr('disabled',true); //Desabilito el input nombre
                                        $("input#documento").attr('disabled',true); //Habilitando el input cedula
                                        $("input#email").attr('disabled',true); //Desabilito el Botton
                                        $("input#usuario").attr('disabled',false); //Desabilito el Botton
                                        $("input#pass").attr('disabled',true); //Desabilito el Botton
                                        $("#entrar").attr('disabled',true); //habilito el Botton
                                    }else{
                                    $("#respuesta_usuario").html(datos.message);
                                        $("input#nombre").attr('disabled',false); //Habilito el input nombre
                                        $("input#documento").attr('disabled',false);
                                        $("input#email").attr('disabled',false);
                                        $("input#pass").attr('disabled',false);
                                        $("#entrar").attr('disabled',false); //habilito el Botton
                                        }
                                        }
                                    });
                                    
                                });
                                $("#entrar").click(function(e) {
                                    registrarse(e);
                                });

    });

    