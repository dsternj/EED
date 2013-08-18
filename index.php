
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
      html, body {
        margin-top:80px;
      }
      body {
        background-color: #f5f5f5;
        background: url("");
        background: url(img/bg.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

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
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">

      <form class="form-signin" action="validation.php" mehod="post">
        <h2 class="form-signin-heading">Iniciar Sesión</h2>
        <div class="error-login" style=" margin: 13px 0px; color:red; display:none">Error al iniciar sesión. Por favor verifica tu usuario y clave</div>
        <input type="text" class="input-block-level" name='user' placeholder="usuario uc" style="width:246px">
        <h5 style="position: relative; top: -8px; display: inline-block;"> @uc.cl </h5> 
        <input type="password" class="input-block-level" name='password' placeholder="clave uc">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
        <div class="loading-signin" style="display:inline-block; margin-left:10px; display:none;">
          <img src='/img/AjaxLoader.gif'>
          conectando con la UC
        </div>
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