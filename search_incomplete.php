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
            <div class="no-gallery">
                <div class="center">
                    <h3>Ayúdanos a mantener la Encuesta</h3>
                    <br>
                    <img src="img/exclamation.png">
                    <br>
                    <h6>Para ver más resultados debes evaluar a más profesores</h6>
                    <p>Por cada profesor que evalúes, podrás ver 3 resultados. 
                        <br>
                        Si ya evaluaste a más del 60%, podrás ver todos los reusltados que quieras.</p>
                    <a href="index.php" class="btn-glow primary">Evaluar Ahora</a>
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