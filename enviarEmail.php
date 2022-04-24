<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="icon" type="image/png" href="imgs/logo-mywebsite-urian-viera.svg">

    <link rel="stylesheet" type="text/css" href="css/material.min.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <title>Recibiendo Emails de clientes</title>
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #55468c !important;">
  <a class="navbar-brand" href="#">
   <strong style="color: #fff">ENVIADOR DE CORREOS</strong>
  </a>
</nav>


<div class="container mt-5"> 

<?php
header('Content-Type: text/html; charset=UTF-8'); 
include('config.php');
if (isset($_REQUEST['enviarform'])) {
    if (is_array($_REQUEST['correo'])) {
        $num_countries = count($_REQUEST['correo']);
        $columna   = 1;
?>
    <div class="row text-center mb-5">
        <div class="col-12">
            <p>Ha enviado un correo a: <strong>( <?php echo $num_countries; ?> )</strong> Registros <hr></p>
        </div>
    </div>


<?php
foreach ($_REQUEST['correo'] as $key => $emailCliente) {


$cliente ='Urian Viera';


$destinatario = trim($emailCliente); //Quitamos algun espacion en blanco
$asunto       = "Bienvenido a WebDeveloper";
$cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Envio de email de forma masiva - Urian Viera</title>';
$cuerpo .= ' 
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 300;
        color: #888;
        background-color:rgba(230, 225, 225, 0.5);
        line-height: 30px;
        text-align: center;
    }
    .contenedor{
        width: 80%;
        min-height:auto;
        text-align: center;
        margin: 0 auto;
        background: #ececec;
        border-top: 3px solid #E64A19;
    }
    .btnlink{
        padding:15px 30px;
        text-align:center;
        background-color:#cecece;
        color: crimson !important;
        font-weight: 600;
        text-decoration: blue;
    }
    .btnlink:hover{
        color: #fff !important;
    }
    .imgBanner{
        width:100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding:0px;
    }
    .misection{
        color: #34495e;
        margin: 4% 10% 2%;
        text-align: center;
        font-family: sans-serif;
    }
    .mt-5{
        margin-top:50px;
    }
    .mb-5{
        margin-bottom:50px;
    }
    </style>
';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
    <img class="imgBanner" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/banner2.png">
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/banner.jpg" width="100%">
        </td>
    </tr>
    
    <tr>
        <td style="background-color: #ffffff;">
            <div class="misection">
                <h2 style="color: red; margin: 0 0 7px">Hola, '.$cliente.'</h2>
                <p style="margin: 2px; font-size: 18px">te doy la Bienvenida a WebDeveloper, un canal de Desarrollo Web y '.utf8_decode("Programación").'. </p>
            </div>
        </td>
    </tr>
    <tr>
        <td style="background-color: #ffffff;">
        <div class="misection">
            <h2 style="color: red; margin: 0 0 7px">Visitar Canal de Youtube</h2>
            <img style="padding: 0; display: block" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/canal.png" width="100%">
        </div>
        
        <div class="mb-5 misection">  
          <p>&nbsp;</p>
            <a href="https://www.youtube.com/channel/UCodSpPp_r_QnYIQYCjlyVGA" class="btnlink">Visitar Canal </a>
        </div>

        </td>
    </tr>
    <tr>
        <td style="padding: 0;">
            <img style="padding: 0; display: block" src="https://catmanshopper.com/enviosmasivosdecorreos/imgs/footer.png" width="100%">
        </td>
    </tr>
</table>'; 

$cuerpo .= '
      </div>
    </body>
  </html>';
    
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= "From: WebDeveloper - Urian Viera <urian1213viera@gmail.com>\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    if(mail($destinatario,$asunto,$cuerpo,$headers)){
        $UpdateEmail = ("UPDATE clientes SET notificacion='1'  WHERE correo='".$emailCliente."' ");
        $resultEmail = mysqli_query($con, $UpdateEmail);
    }
    
        echo '<div>'. $columna. "). " .$emailCliente.'</div>';
        $columna ++;
    }
 }
    
    
/*
    NOTA IMPORTANTE:
    PARA ENVIAR CORREOS TANTO COMO  GMAIL - HOTMAIL(Outlook), ESTE CODIGO FUNCIONA MEJOR QUE EL ANTERIOR,
    EN ESTE LLEGAN LOS EMAIL A Outlook EN BANDEJA DE ENTRADA AL IGUAL QUE GMAIL, SOLO DEBES CAMBIAR EL CONTENIDO 
    DEL MESAJE QUE ENVIAS. OJO SI EXISTE ALGUNA URL O VARIABLE QUE ESTES ENVIANDO EN EL EMAIL Y NO EXISTE O ESTA 
    INCORRECTA EL CORREO NO LLEGARA DEBES ESTA PENDIENTE EN ESTO.
*/


/*
    $para    = trim($emailCliente);
    $nameFull = "Urian Viera";
    $urlCanal = "https://www.youtube.com/channel/UCodSpPp_r_QnYIQYCjlyVGA";
    $titulo  = "Mi Formulario de Contacto";
    $mensaje = "
    <!doctype html>
    <html lang='es'>
    <head>
    <title>EMAIL</title>
    </head>
        <body>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div style='width: 80%; margin:0 auto; background-color: #ffffff; color: #34495e; text-align: center;font-family: sans-serif'>
                <h2 style='font-size: 16px; color: #34495e; margin: 0 0 7px;'>&#161;Felicitaciones&#33; 
                    <strong style='color:#555;'> ".$nameFull."</strong>, dale click al bot&oacute;n para visualizar tu bono de descuento de <strong>$20.000</strong>. 
                    Recuerda mostrarlo en la caja de cualquier sede del retailer escogido, no es necesario imprimirlo.
                </h2>
                <p>&nbsp;</p>
                    <a href=".$urlCanal." style='background-color: #fe4c50;border: #fe4c50;color: white;text-decoration: none;padding: 10px 40px;border-radius: 5px;'> Ver cup&oacute;n </a>
                <p>&nbsp;</p>
                <img style='padding: 0; display: block; width:100%; max-width:600px; margin:0 auto;' src='https://blogangular-c7858.web.app/assets/images/work.gif'>
                <p>&nbsp;</p>
            </div>
        </body>
    </html>
    "; 
    //Cabecera Obligatoria
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: WebDeveloper <programadorphp2017@gmail.com>' . "\r\n";
    $headers .= 'Cc: noresponder@pruebaroyalcanin.com.co' . "\r\n";
    
    //OPCIONAR
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
    
    mail($para, $titulo, $mensaje, $headers);
*/

}
?>
  
<div class="row text-center mt-5 mb-5">
    <div class="col-12">
        <a href="index.php" class="btn btn-round btn-primary">Volver al Inicio</a>
    </div>
</div>


</div>



</body>
</html>
