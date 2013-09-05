    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.php">
                <a href="index.php">
                    <img class="" src="img/edpl.png">
                </a>
            </a>

            <ul class="nav pull-right">                
                <li class="">
                    <input class="search span5" type="text" placeholder="busca resultados por profesor, curso o sigla" />
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        <? echo $user_name ?>@uc.cl
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->