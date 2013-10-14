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

                <!-- statistics chart built with jQuery Flot -->
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
                <!-- end statistics chart -->

                <!-- UI Elements section -->
                <div class="row-fluid section ui-elements">
                    <h4>UI Elements</h4>
                    <div class="span5 knobs">
                        <div class="knob-wrapper">
                            <input type="text" value="50" class="knob" data-thickness=".3" data-inputColor="#333" data-fgColor="#30a1ec" data-bgColor="#d4ecfd" data-width="150">
                            <div class="info">
                                <div class="param">
                                    <span class="line blue"></span>
                                    Active users
                                </div>
                            </div>
                        </div>
                        <div class="knob-wrapper">
                            <input type="text" value="75" class="knob second" data-thickness=".3" data-inputColor="#333" data-fgColor="#3d88ba" data-bgColor="#d4ecfd" data-width="150">
                            <div class="info">
                                <div class="param">
                                    <span class="line blue"></span>
                                    % disk space usage
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="span6 showcase">
                        <div class="ui-sliders">
                            <div class="slider slider-sample1 vertical-handler"></div>
                            <div class="slider slider-sample2"></div>
                            <div class="slider slider-sample3"></div>
                        </div>
                        <div class="ui-group">
                            <a class="btn-flat inverse">Large Button</a>
                            <a class="btn-flat gray">Large Button</a>
                            <a class="btn-flat default">Large Button</a>
                            <a class="btn-flat primary">Large Button</a>
                        </div>                        

                        <div class="ui-group">
                            <a class="btn-flat icon">
                                <i class="tool"></i> Icon button
                            </a>
                            <a class="btn-glow small inverse">
                                <i class="shuffle"></i>
                            </a>
                            <a class="btn-glow small primary">
                                <i class="setting"></i>
                            </a>
                            <a class="btn-glow small default">
                                <i class="attach"></i>
                            </a>
                            <div class="ui-select">
                                <select>
                                    <option selected>Dropdown</option>
                                    <option>Custom selects</option>
                                    <option>Pure css styles</option>
                                </select>
                            </div>

                            <div class="btn-group">
                                <button class="glow left">LEFT</button>
                                <button class="glow right">RIGHT</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end UI elements section -->

                <!-- table sample -->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-products section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Products <small>Table sample</small></h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option>Filter users</option>
                                  <option>Signed last 30 days</option>
                                  <option>Active users</option>
                                </select>
                            </div>
                            <input type="text" class="search">
                            <a class="btn-flat new-product">+ Add product</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox">
                                        Product
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>Description
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox">
                                        <div class="img">
                                            <img src="img/table-img.png">
                                        </div>
                                        <a href="#">There are many variations </a>
                                    </td>
                                    <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td>
                                    <td>
                                        <span class="label label-success">Active</span>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></span></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                        <div class="img">
                                            <img src="img/table-img.png">
                                        </div>
                                        <a href="#">Internet tend</a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></span></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                        <div class="img">
                                            <img src="img/table-img.png">
                                        </div>
                                        <a href="#">Many desktop publishing </a>
                                    </td>
                                    <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td>
                                    <td>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></span></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                        <div class="img">
                                            <img src="img/table-img.png">
                                        </div>
                                        <a href="#">Generate Lorem </a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>
                                        <span class="label label-info">Standby</span>
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></span></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                        <div class="img">
                                            <img src="img/table-img.png">
                                        </div>
                                        <a href="#">Internet tend</a>
                                    </td>
                                    <td class="description">
                                        There are many variations of passages.
                                    </td>
                                    <td>                                        
                                        <ul class="actions">
                                            <li><i class="table-edit"></i></span></li>
                                            <li><i class="table-settings"></i></li>
                                            <li class="last"><i class="table-delete"></i></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end table sample -->
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

    <script type="text/javascript">
        $(function () {

            // jQuery Knobs
            $(".knob").knob();



            // jQuery UI Sliders
            $(".slider-sample1").slider({
                value: 100,
                min: 1,
                max: 500
            });
            $(".slider-sample2").slider({
                range: "min",
                value: 130,
                min: 1,
                max: 500
            });
            $(".slider-sample3").slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 40, 170 ],
            });





            // jQuery Flot Chart
           
            //Classes chart
            $('#statsChart-checkbox').find("input").click(plotClasses);
            plotClasses();
            facultyScroll();
            searchFacultyClasses();

            function showTooltip(x, y, contents) {
                $('<div id="tooltip">' + contents + '</div>').css( {
                    position: 'absolute',
                    display: 'none',
                    color: "#fff",
                    padding: '2px 5px',
                    'border-radius': '6px',
                    'background-color': '#000',
                    opacity: 0.65
                }).appendTo("body").fadeIn(200).css({
                    top: y - $('#tooltip').height()-10,
                    left: x - $('#tooltip').width()/2
                });
            }

            var previousPoint = null;
            $("#statsChart").bind("plothover", function (event, pos, item) {
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(0),
                            y = item.datapoint[1].toFixed(0);

                        d = item.datapoint[0];
                        date = new Date(d);
                        year = 1900+parseInt(date.getYear())
                        if(parseInt(date.getMonth()+1)==7)
                            $semester = '2do';
                        else
                            $semester = '1er';

                        showTooltip(item.pageX, item.pageY,
                                    item.series.label + "<br> "  +$semester+ " semestre " + year +" <br> Cursos: " + y);
                    }
                }
                else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        });

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

        function plotClasses() {
            var data =[];
            datasets = classesData();
            if($('#statsChart-checkbox').find("input:checked").length > 0){
                $('#statsChart-checkbox').find("input:checked").each(function () {
                    var key = $(this).attr("name");
                    if (key && datasets[key]) {
                        data.push(datasets[key]);
                    }

                });

                var plot = $.plot($("#statsChart"),data, {
                        series: {
                            lines: { show: true,
                                    lineWidth: 1,
                                    fill: true, 
                                    fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                                 },
                            points: { show: true, 
                                     lineWidth: 2,
                                     radius: 3
                                 },
                            shadowSize: 0,
                        },
                        grid: { hoverable: true, 
                               clickable: true, 
                               tickColor: "#f9f9f9",
                               borderWidth: 0
                            },
                        legend: {
                                // show: false
                                labelBoxBorderColor: "#fff",
                                container: $('#statsChartLegend'),
                                noColumns: 3,
                                sorted: 'reverse'
                            },  
                        colors: ["#a7b5c5", "#30a0eb"],
                        xaxis: {
                            mode: "time",
                            minTickSize: [0.5, "year"],
                            font: {
                                size: 10,
                                family: "Open Sans, Arial",
                                variant: "small-caps",
                                color: "#697695"
                            }
                        },
                        yaxis: {
                            ticks:10, 
                            tickDecimals: 0,
                            font: {size:12, color: "#9da3a9"}
                        }
                    });
                }
            }

            function facultyScroll() {

                $('.faculty_list').slimScroll({
                    height: '200px',
                    size: '5px',
                    position: 'right',
                    alwaysVisible: false,
                    railVisible: false,
                    railOpacity: 0.3,
                    wheelStep: 10,
                    allowPageScroll: false,
                    disableFadeOut: false

                });
            }

            function searchFacultyClasses() {
                $('.search.faculty_classes').keyup(function(){
                    q = $(this).val().toLowerCase();
                    $('.faculty_classes_checkbox').find('label').each(function(){
                        val=$(this).text().toLowerCase()
                        if(val.search(q)!=-1){
                            $(this).show();
                        }
                        else {
                            $(this).hide();
                        }
                    })
                })
            }
    </script>
</body>
</html>
<? } 
else {
header( 'Location: index.php' ) ;
}
?>