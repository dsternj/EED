<?  $basename = basename($_SERVER['PHP_SELF']); ?>
    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li <? if ($basename != "about.php" && $basename != "facts.php") echo 'class="active"' ?>>
                <? if ($basename != "about.php" && $basename != "facts.php") { ?> 
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <? } ?>
                <a href="index.php">
                    <i class="icon-home"></i>
                    <span>Inicio</span>
                </a>
            </li> 
<!--             <li>
                <a href="">
                    <i class="icon-search"></i>
                    <span>Buscar</span>
                </a>
            </li>  -->
            <li <? if ($basename == "facts.php") echo 'class="active"' ?>>
                <? if ($basename == "facts.php") { ?> 
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <? } ?>
                <a href="facts.php">
                    <i class="icon-signal"></i>
                    <span>Datos PUC</span>
                </a>
            </li>  
            <li <? if ($basename == "about.php") echo 'class="active"' ?>>
                <? if ($basename == "about.php") { ?> 
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <? } ?>
                <a href="about.php">
                    <i class="icon-info-sign"></i>
                    <span>Acerca de</span>
                </a>
            </li>            
        </ul>
    </div>
    <!-- end sidebar -->
