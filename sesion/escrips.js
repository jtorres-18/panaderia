const   btnIniciar = document.getElementById("iniciar"),
        btnVolver = document.getElementById("volver");
        btnRecUse = document.getElementById("custom-button1"),
        btnRecCont = document.getElementById("custom-button2");
        formRegister = document.querySelector(".register"),
        formlogin = document.querySelector(".login");
        formRecUse = document.querySelector(".recUse"),
        formRecCont = document.querySelector(".recCont");

btnIniciar.addEventListener("click", e =>{
    formRegister.classList.add("hide");
    formlogin.classList.remove("hide");
})

btnVolver.addEventListener("click", e =>{
    formlogin.classList.add("hide");
    formRegister.classList.remove("hide");
})

btnRecUse.addEventListener("click", e =>{
    formlogin.classList.add("hide");
    formRegister.classList.add("hide");
    formRecCont.classList.add("hide");
    formRecUse.classList.remove("hide");
})

btnRecCont.addEventListener("click", e =>{
    formlogin.classList.add("hide");
    formRegister.classList.add("hide");
    formRecUse.classList.add("hide");
    formRecCont.classList.remove("hide");
    
})

function regresarAlInicio() {
    // Ocultar formulario de recuperar usuario
    document.querySelector('.contenedor-formulario.recUse').classList.add('hide');

    // Ocultar formulario de recuperar contraseña
    document.querySelector('.contenedor-formulario.recCont').classList.add('hide');

    // Mostrar formulario de inicio de sesión
    document.querySelector('.contenedor-formulario.login').classList.remove('hide');
}


function validarEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}



function registrarse(e){
    e.preventDefault ();
    const nombre= document.getElementById("nombre").value
    const documento= document.getElementById("documento").value
    const email= document.getElementById("email").value
    const usuario= document.getElementById("usuario").value
    const pass= document.getElementById("pass").value
    if(nombre!= "" && documento!= "" && email!= "" && usuario!="" && pass!= ""){
        if (validarEmail(email)) {
    $.ajax({
        type: "post",
        url: "formulario.php",
        data: {
        nombre: nombre,
        documento: documento,
        email: email,
        usuario: usuario,
        pass: pass
        },
        success: function(respuesta) {
                if(respuesta==1){
                btnIniciar.click();
                    Swal.fire({
                        icon: 'success',
                        title: 'Registrado con exito',
                        showConfirmButton: false,
                        timer: 2500
                })
                
                }
                if(respuesta==2){
                Swal.fire({
                    icon: 'error',
                    title: 'correo ya existente',
                    showConfirmButton: false,
                    timer: 2500
                })  
                }
                if(respuesta==3){
                    Swal.fire({
                        icon: 'error',
                        title: 'documento ya existente',
                        showConfirmButton: false,
                        timer: 2500
                })  
                }
                if(respuesta==4){
                    Swal.fire({
                        icon: 'error',
                        title: 'usuario ya existente',
                        showConfirmButton: false,
                        timer: 2500
                })  
                }
                
                
        },
    })
        }else {
            Swal.fire({
                icon: 'error',
                title: 'Correo electronico no valido',
                showConfirmButton: false,
                timer: 3000
            });
        }
    }else{
        Swal.fire({
                    icon: 'error',
                    title: 'uno o mas campos estan vacios',
                    showConfirmButton: false,
                    timer: 3000
                })
    }
}


function logueo(e){
    e.preventDefault ();
    const usuario= document.getElementById("user").value
    const pass= document.getElementById("password").value
if(usuario!= "" && pass!= ""){
    $.ajax({
        type: "post",
        url: "iniciar_sesion.php",
        data: {
        usuario: usuario,
        pass: pass
        },
        success: function(respuesta) {
            const data =JSON.parse(respuesta);
            sessionStorage.setItem("id_cliente", data.id)
                if(data.tipo_usuario==1){
                window.location.href="../mostrar/productos.php"
                }else if(data.tipo_usuario==2){
                    window.location.href="../dash_board/index.php"
                }
                if(respuesta==2){
                Swal.fire({
                    icon: 'error',
                    title: 'usuario o contraseña incorrectas',
                    showConfirmButton: false,
                    timer: 3000
                })  
                }
        },
    })
    
    }else{
        Swal.fire({
                    icon: 'error',
                    title: 'campos incompletos',
                    showConfirmButton: false,
                    timer: 3000
                })
    }
}

function enviar_correo(email, subject){
    $.ajax({
        type: "post",
        url: "../enviar_prueba/enviar.php",
        data: {
        email: email,
        subject: subject
        },
        success: function(respuesta) {
        console.log(respuesta)
        }
    })
}

function recuperar_usuario(e){
    e.preventDefault();
    const documento= document.getElementById("identidad").value
    const pass= document.getElementById("pas").value
if(documento!= "" && pass!= ""){
    $.ajax({
        type: "post",
        url: "recupar_usuario.php",
        data: {
        documento: documento,
        pass: pass
        },
        success: function(respuesta) {
            if(respuesta!=2){
                const data =JSON.parse(respuesta);
                enviar_correo(data.correo, `<!DOCTYPE html>
                <html>
                <head>
                    <style>
                        /* Estilos CSS aquí */
                        body {
                            font-family: Arial, sans-serif;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #f4f4f4;
                        }
                        h1 {
                            color: #333;
                        }
                        p {
                            color: #666;
                        }
                        .logo {
                            text-align: center;
                        }
                        .logo img {
                            max-width: 200px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="logo">
                            <img src="https://i.postimg.cc/nrGQ8SSX/logo.png" alt="Logo de la Empresa">
                        </div>
                        <h1>Nombre de Usuario Olvidado</h1>
                        <p>Hola ${data.nombre},</p>
                        <p>Aquí está tu nombre de usuario:</p>
                        <p>${data.usuario}</p>
                        <p>Si no solicitaste esta información, ignora este mensaje.</p>
                        <p>Gracias, elohim </p>
                    </div>
                </body>
                </html>`)
                Swal.fire({
                    title: 'te enviamos la informacio al correo ' + data.correo,
                    showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                    },
                    confirmButtonText: 'OK', 
                }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = 'login.html';
                    }
                });
                }else if(respuesta==2){
                Swal.fire({
                    icon: 'error',
                    title: 'documento o contraseña incorrectas',
                    showConfirmButton: false,
                    timer: 3000
                })  
                }
        },
    })
    
    }else{
        Swal.fire({
                    icon: 'error',
                    title: 'campos incompletos',
                    showConfirmButton: false,
                    timer: 3000
                })
    }
}


function nueva_contra(e){
    e.preventDefault ();
    const id= document.getElementById("id").value
    const new_pass= document.getElementById("new_passs").value
    if(new_pass!= ""){
    $.ajax({
        type: "post",
        url: "consulta.php",
        data: {
        new_passs: new_pass,
        id: id
        },
        success: function(respuesta) {
                if(respuesta==1){
                    Swal.fire({
                        icon: 'success',
                        title: 'contraseña restaurada con exito',
                        showConfirmButton: false,
                        timer: 2500
                })
                }    
        },
    })
    }else{
        Swal.fire({
                    icon: 'error',
                    title: 'uno o mas campos estan vacios',
                    showConfirmButton: false,
                    timer: 3000
                })
    }
}

function recuperar_pass(e){
    e.preventDefault ();
    const email= document.getElementById("correo").value
if(email!= ""){
    if (validarEmail(email)) {
        $.ajax({
            type: "post",
            url: "recuperar_contraseña.php",
            data: {
            correo: email,
            },
            success: function(respuesta) {
                if(respuesta!=2){
                    const data =JSON.parse(respuesta);
                    enviar_correo(data.correo, `<!DOCTYPE html>
                    <html>
                    <head>
                        <title>Recuperacion de Contraseña</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                            }
                            .container {
                                max-width: 600px;
                                margin: 0 auto;
                                padding: 20px;
                            }
                            .header {
                                text-align: center;
                            }
                            .header img {
                                max-width: 150px;
                                height: auto;
                            }
                            .content {
                                background-color: #f9f9f9;
                                padding: 20px;
                                border-radius: 5px;
                            }
                            .button {
                                background-color: #4CAF50;
                                color: white;
                                padding: 10px 20px;
                                text-decoration: none;
                                border-radius: 5px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="header">
                                <img src="https://i.postimg.cc/nrGQ8SSX/logo.png" alt="Logo de la Empresa">
                                <h2>Recuperación de Contraseña</h2>
                            </div>
                            <div class="content">
                                <p>¡Hola ${data.nombre}!</p>
                                <p>Recibes este correo porque solicitaste restablecer tu contraseña. Para continuar con el proceso, haz clic en el siguiente enlace:</p>
                                <center><p><a href="http://localhost/elohim/sesion/contra.php?id=${data.id}" class="button">Restablecer Contraseña</a></p></center>
                                <p>Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje.</p>
                                <p>Por favor, ten en cuenta que este enlace es válido por un tiempo limitado.</p>
                                <p>Si tienes algún problema o pregunta, no dudes en ponerte en contacto con nuestro soporte.</p>
                                <p>¡Gracias!</p>
                            </div>
                        </div>
                    </body>
                    </html>
                    `);
                    Swal.fire({
                        title: 'te enviamos la informacio al correo ' + data.correo,
                        showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                        },
                        confirmButtonText: 'OK', 
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = 'login.html';
                        }
                    });
                    
                    }
                    if(respuesta==2){
                    Swal.fire({
                        icon: 'error',
                        title: 'correo no existe',
                        showConfirmButton: false,
                        timer: 3000
                    })  
                    }
            },
        })
    }
    }else{
        Swal.fire({
                    icon: 'error',
                    title: 'campos incompletos',
                    showConfirmButton: false,
                    timer: 3000
                })
    }
}






