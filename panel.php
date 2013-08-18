<? 
include_once('read_cookie.php') ;
if($user_name) { 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Encuesta Doscente Pública</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/application.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Encuesta doscente pública</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Inicio</a></li>
              <li><a href="#about">Acerca de</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><? echo $user_name ?>@uc.cl<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="hint search">
            <h5>
              Ve los resultados!
              <br>
              Busca por profesor o curso
            </h5>
          </div>

          <div class="hint answer">
            <h5>
              Evalúa a tus profesores! 
              <br>
              desde el 2007 en adelante 
            </h5>
          </div>
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Ver Resultados</li>
              <li><a href="#">Buscar por Profesor</a></li>
              <li><a href="#">Buscar por Curso o Sigla</a></li>
              <li class="nav-header">Evaluar Profesores</li>
              <li><a href="#">1er Sem 2013</a></li>
              <li><a href="#">2do Sem 2013</a></li>
              <li><a href="#">1do Sem 2012</a></li>
              <li><a href="#">2do Sem 2012</a></li>
              <li><a href="#">1do Sem 2011</a></li>
              <li><a href="#">2do Sem 2011</a></li>
              <li><a href="#">2do Sem 2010</a></li>
              <li><a href="#">1do Sem 2010</a></li>
              <li><a href="#">2do Sem 2009</a></li>
              <li><a href="#">1do Sem 2009</a></li>
              <li><a href="#">2do Sem 2008</a></li>
              <li><a href="#">1do Sem 2008</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
        
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Desarrollado y Creado por Dan Stern</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
header( 'Location: index.php' ) ;
}
?>
