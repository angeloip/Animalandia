<?php

$con = mysqli_connect("localhost", "root", "", "registrousuarios");

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

    $email = $_GET['email'];
    $hash = $_GET['hash'];
                 
    $consulta = "SELECT email, hash_, activo FROM registros WHERE email='$email' AND hash_='$hash' AND activo='0'";
    $resultado = mysqli_query($con, $consulta); 
    $coincidencia  = mysqli_num_rows($resultado);
                 
    if($coincidencia > 0){
        $actualizar = "UPDATE registros SET activo='1' WHERE email='$email' AND hash_='$hash' AND activo='0'";
        $res = mysqli_query($con, $actualizar);
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/styleactivacion.css">
            <title>Activacion de cuenta</title>
        </head>
        <body>
            
            <div class="activacion">
                <img src="../assets/perroregistro.png" class="logoact">
                <div class="contenidoact">
                   
                        <div class="textoact">
                            ¡Bien! Tu cuenta ya ha sido activada, ahora puedes ingresar con tus datos.
                        </div>
                        <div class="btnlogact">
                            <a href="../html/ingreso-registro.html"><button class="btnact btn--4act">
                                <div class="textbtnact">Ingresar</div>
                            </button></a>
                        </div>      
                    
                </div>
            </div>
        
        </body>
        </html>';
    }else{

        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/styleactivacion.css">
            <title>Activacion de cuenta</title>
        </head>
        <body>
            
            <div class="activacion">
                <img src="../assets/perroregistro.png" class="logoact">
                <div class="contenidoact">
                   
                        <div class="textoact">
                            La URL es inválida  o ya has activado tu cuenta.
                        </div>
                        <div class="btnlogact">
                            <a href="../html/ingreso-registro.html"><button class="btnact btn--4act">
                                <div class="textbtnact">Regresar</div>
                            </button></a>
                        </div>      
                    
                </div>
            </div>
        
        </body>
        </html>';
    }
}else{
    // Intento nó válido (ya sea porque se ingresa sin tener el hash o porque la cuenta ya ha sido registrada)
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/styleactivacion.css">
        <title>Activacion de cuenta</title>
    </head>
    <body>
        
        <div class="activacion">
            <img src="../assets/perroregistro.png" class="logoact">
            <div class="contenidoact">
               
                    <div class="textoact">
                        Intento inválido, por favor revisa el mensaje que enviamos correo electrónico
                    </div>
                    <div class="btnlogact">
                        <a href="../html/ingreso-registro.html"><button class="btnact btn--4act">
                            <div class="textbtnact">Regresar</div>
                        </button></a>
                    </div>      
                
            </div>
        </div>
    
    </body>
    </html>';
    
}

?>

