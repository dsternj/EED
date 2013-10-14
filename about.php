<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/panel.php' ;

?>

<!DOCTYPE html>
<html>
<head>
    <? include_once 'helpers/head.php' ?>
    <link rel="stylesheet" type="text/css" href="css/gallery.css">
</head>
<body>


    <? include_once 'helpers/navbar.php' ?>
    <? include_once 'helpers/sidebar.php' ?>
    


    <!-- main container -->
    <div class="content">

        <div id="pad-wrapper" class="gallery">

            <!-- blank state -->
            <div class="no-gallery span10">
                <div class="">
                    <h3> ACERCA DE </h3>

                        <div class="row-fluid section">
                        <h5>¿CÓMO FUNCIONA?</h5>
                        <br>
                        <p>Al ingresar a la Encuesta Docente, con tu usuario y clave UC, nos estás dando acceso a tus datos de los cursos. Cruzando esta información con los profesores de la Universidad, podemos saber que profesores puedes evaluar.</p>
                        <p>Recuerda que al ingresar a la Encuesta Docente, estás aceptando los <a href="tyc.php">Términos y Condiciones.</a></p>
                        <p>Por cada profesor o curso que evalúas, podrás ver 3 resultados. Tus búsquedas no se almacenan, por lo que si en el pasado buscaste un curso y actualmente no te quedan búsquedas, no podrás ver el resultado del curso que buscaste en el pasado.</p>
                        <p>Sin embargo, para que puedas utilizar la herramienta de manera correcta, si ya evaluaste a más del 60% de tus profesores, podrás buscar todos los resultados que desees. </p>
                        <p>Esta medida tiene como fin mantener la encuesta con datos actualizados y asegurar que quienes utilicen los resultados, aporten con su funcionamiento.</p>
                        
                        </div>
                        <div class="row-fluid section">
                        <h5>HISTORIA</h5>
                        <br>
                        <p>La Encuesta Docente Pública, nació el año 2011 como un proyecto del Centro de Alumnos de Ingeniería Comercial de la UC (CAAE 2011, lista Importa). En su creación inicial colaboraron Alberto Ariztía, Agustín Díaz, Mauro Granese y Nicolas Vandeputte. La implementación, creación y detalles técnicos fueron hechos por Dan Stern.</p>
                        <p>Debido a la gran aceptación y utilidad de la herramienta para la Facultad de Ingeniería Comercial, Dan decide el año 2013 extender la encuesta a toda la Universidad, mejorando el sistema web, las preguntas y los resultados.</p>
                        </div>
                        
                        <div class="row-fluid section">
                        <h5>CONTACTO</h5>
                        <br>
                        <p>Si tienes problemas con la encuesta, tienes ideas de cómo mejorarla o simplemente te deseas contactar con nosotros, escribele a Dan Stern a su mail <a href="mailto:dstern@uc.cl">dstern@uc.cl</a></p>
                        </div>

                </div>
            </div>
            <!-- end blank state -->
        </div>
    </div>

    <? include_once 'helpers/scripts.php' ?>

</body>
</html>
<? } 
else {
header( 'Location: index.php' ) ;
}
?>