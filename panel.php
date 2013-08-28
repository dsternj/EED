<? include_once 'backend/panel.php' ;
include_once('read_cookie.php') ;
if($user_name) { 
?>

<!DOCTYPE html>
<html>
<head>
    <title>ENCUESTA DE EVALUACIÓN DOCENTE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/index.css" type="text/css" media="screen" />    

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.html">Encuesta Docente Pública</a>

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

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="index.html">
                    <i class="icon-home"></i>
                    <span>Inicio</span>
                </a>
            </li>            
            <li class="active">
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>Evaluar</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="">2013 / 2do Sem</a></li>
                    <li><a href="">2013 / 1do Sem</a></li>
                    <li><a href="">2012 / 2do Sem</a></li>
                    <li><a href="">2012 / 1do Sem</a></li>
                    <li><a href="">2011 / 2do Sem</a></li>
                    <li><a href="">2011 / 1do Sem</a></li>
                    <li><a href="">2010 / 2do Sem</a></li>
                    <li><a href="">2010 / 1do Sem</a></li>

                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">


        <div class="container-fluid">

            <!-- upper main stats -->
            <div id="main-stats">
                <input class="search secondary span5" type="text" placeholder="busca resultados por profesor, curso o sigla" />
                <div class="row-fluid stats-row">
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">40</span>
                            ramos
                        </div>
                        <span class="date">Cursados</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">25</span>
                            profesores
                        </div>
                        <span class="date">Evaluados</span>
                    </div>
                    <div class="span3 stat">
                        <div class="data">
                            <span class="number">22</span>
                            búsquedas
                        </div>
                        <span class="date">Restantes</span>
                    </div>
                    <div class="span3 stat last">
                        <div class="data">
                            <span class="number">8</span>
                            búsquedas
                        </div>
                        <span class="date">Reaizadas</span>
                    </div>
                </div>
            </div>
            <!-- end upper main stats -->

            <div id="pad-wrapper">

                <!-- class chart built with jQuery Flot -->
                <div class="row-fluid chart">
                    <h4>
                        <div class='span12'>Cursos Dicatos en la UC</div>

                    </h4>
                    <div class="span2 h6">
                        <div id="statsChart-checkbox" class="faculty_classes_checkbox">
                            <input type="text" class="search faculty_classes span12" placeholder="facultad...">
                            <div class="faculty_list">
                                    <input type="checkbox"  name="total" checked  id="total">
                                    <label for="total">total</label> 
                                <?
                                    foreach ($class_count as $faculty => $data) { 
                                        $faculty_name = str_replace($search, $replace, $faculty);
                                ?>
                                        <input type="checkbox"  name="<? echo $faculty_name ?>"  id="<? echo $faculty_name ?>">
                                        <label for="<? echo $faculty_name ?>"><? echo $faculty ?></label>                                
                                <?
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="span9">
                        <div id="statsChart"></div>
                        <div id="statsChartLegend" class="span12"></div>
                    </div>
                </div>

                <!-- class chart built with jQuery Flot -->
                <div class="row-fluid section">
                    <h4>
                        <div class='span12'>Profesores de la UC</div>

                    </h4>
                    <div class="span2 h6">
                        <div id="professorsChart-checkbox" class="faculty_professors_checkbox graph-checkbox">
                            <input type="text" class="search faculty_professors span12" placeholder="facultad...">
                            <div class="faculty_list">
                                    <input type="checkbox"  name="professors_total" checked  id="professor_total">
                                    <label for="professor_total">total</label> 
                                <?
                                    foreach ($class_count as $faculty => $data) { 
                                        $faculty_name = str_replace($search, $replace, $faculty);
                                ?>
                                        <input type="checkbox"  name="professors_<? echo $faculty_name ?>"  id="professor_<? echo $faculty_name ?>">
                                        <label for="professor_<? echo $faculty_name ?>"><? echo $faculty ?></label>                                
                                <?
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="span9">
                        <div id="professorsChart" class="graph-holder"></div>
                        <div id="professorsChartLegend" class="span12"></div>
                    </div>
                </div>
                <!-- end statistics chart -->

            </div>
        </div>
    </div>


    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <!-- knob -->
    <script src="js/jquery.knob.js"></script>
    <!-- flot charts -->
    <script src="js/jquery.flot.js"></script>
    <script src="js/jquery.flot.stack.js"></script>
    <script src="js/jquery.flot.resize.js"></script>
    <script src="js/jquery.flot.time.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/graphs.js"></script>

    <script type="text/javascript">
        $(function () {
      
            //Classes chart
            classGraphHolder = $('#statsChart');
            classCheckboxHolder = $('#statsChart-checkbox');
            classDataset = classesData();
            classLegendHolder = $('#statsChartLegend');
            classTooltipString = 'Cursos';
            searchFacultyClasses = $('.search.faculty_classes');
            checkboxFacultyClasses = $('.faculty_classes_checkbox')

            plotClasses(classGraphHolder, classCheckboxHolder, classDataset, classLegendHolder, classTooltipString );
            facultyScroll();
            searchFaculty(searchFacultyClasses, checkboxFacultyClasses);
            classCheckboxHolder.find("input").click(function(){
                plotClasses(classGraphHolder, classCheckboxHolder, classDataset, classLegendHolder, classTooltipString );
            });

            //Professors chart
            professorsGraphHolder = $('#professorsChart');
            professorsCheckboxHolder = $('#professorsChart-checkbox');
            professorsDataset = professorsData();
            professorsLegendHolder = $('#professorsChartLegend');
            professorsTooltipString = 'Profesores';
            searchFacultyProfessors = $('.search.faculty_professors');
            checkboxFacultyProfessors = $('.faculty_professors_checkbox')

            plotClasses(professorsGraphHolder, professorsCheckboxHolder, professorsDataset, professorsLegendHolder, professorsTooltipString );
            searchFaculty(searchFacultyProfessors, checkboxFacultyProfessors);
            professorsCheckboxHolder.find("input").click(function(){
                plotClasses(professorsGraphHolder, professorsCheckboxHolder, professorsDataset, professorsLegendHolder, professorsTooltipString );
            });
        });

        //data for the classes graph

        function classesData() {
            var datasets = {
                "total": {
                    label: "Total",
                    data: [<? echo implode (',', $series_class) ?>],
                    color: '#32a0ee'
                }, 
            <?
                foreach ($class_count as $faculty => $data) {
                    $n=1;
                    foreach ($data as $tick => $count) {
                        $series_faculty[$faculty][]='['.$tick.' ,'.$count.']';
                        $n++;
                    }
            ?>

                "<? echo str_replace($search, $replace, $faculty); ?>": {
                    label: "<? echo $faculty; ?>",
                    data: [<? echo implode (',' , $series_faculty[$faculty]); ?>] 
                }, 
            <?
                }
            ?>
            }

            // hard-code color indices to prevent them from shifting as
            // countries are turned on/off

            var i = 1;

            $.each(datasets, function(key, val) {
                val.color = i;
                ++i;
            });

            return datasets;
        };

        function professorsData() {
            var datasets = {
                "professors_total": {
                    label: "Total",
                    data: [<? echo implode (',', $series_professors) ?>],
                    color: '#32a0ee'
                }, 
            <?
                foreach ($professors_faculty_count as $faculty => $data) {
                    $n=1;
                    foreach ($data as $tick => $count) {
                        $series_faculty_professors[$faculty][]='['.$tick.' ,'.$count.']';
                        $n++;
                    }
            ?>

                "<? echo 'professors_'.str_replace($search, $replace, $faculty); ?>": {
                    label: "<? echo $faculty; ?>",
                    data: [<? echo implode (',' , $series_faculty_professors[$faculty]); ?>] 
                }, 
            <?
                }
            ?>
            }

            // hard-code color indices to prevent them from shifting as
            // countries are turned on/off

            var i = 1;

            $.each(datasets, function(key, val) {
                val.color = i;
                ++i;
            });

            return datasets;
        };

        
    </script>
</body>
</html>
<? } 
else {
header( 'Location: index.php' ) ;
}
?>