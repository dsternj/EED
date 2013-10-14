<? 
include_once('read_cookie.php') ;
if(!$user_name) { 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Encuesta Docente Pública</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/application.css" rel="stylesheet">

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">

        <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="font/font-awesome.css">
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/signin.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>


    <div class="container">
        <div class="logo">
            <a href="index.php">
                <img class="" src="img/edpl.png">
            </a>
        </div>

      <form class="form-signin" action="validation.php" mehod="post">
        <h2 class="form-signin-heading">Iniciar Sesión</h2>
        <div class="error-login" style=" margin: 13px 0px; color:red; display:none">Error al iniciar sesión. Por favor verifica tu usuario y clave</div>
        <div class="input-append user_holder">
          <input class="input-block-level" name="user" placeholder="usuario uc"  type="text">
          <span class="add-on">@uc.cl</span>
        </div>
        <input type="password" class="input-block-level" name='password' placeholder="clave uc">
        <button class="btn-glow primary login" type="submit">Iniciar Sesión</button>
        <div class="loading-signin" style="display:inline-block; margin-left:10px; visibility: hidden;">
          <img src='/img/AjaxLoader.gif'>
          <span style="font-size:10px;">conectando a la UC</span>
        </div>
        <br>
        <br>
        <span style="font-size:11px;">al iniciar sesión usted acepta los <a href="tyc.php">Términos y Condiciones</a> </span>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/js/application.js"></script>
    <script src="/js/bootstrap-transition.js"></script>
    <script src="/js/bootstrap-alert.js"></script>
    <script src="/js/bootstrap-modal.js"></script>
    <script src="/js/bootstrap-dropdown.js"></script>
    <script src="/js/bootstrap-scrollspy.js"></script>
    <script src="/js/bootstrap-tab.js"></script>
    <script src="/js/bootstrap-tooltip.js"></script>
    <script src="/js/bootstrap-popover.js"></script>
    <script src="/js/bootstrap-button.js"></script>
    <script src="/js/bootstrap-collapse.js"></script>
    <script src="/js/bootstrap-carousel.js"></script>
    <script src="/js/bootstrap-typeahead.js"></script>

  </body>
</html>
<? } 
else {
header( 'Location: panel.php' ) ;
}
?>
