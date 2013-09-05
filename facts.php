<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/facts.php' ;
?>

<!DOCTYPE html>
<html>
<head>
    <? include_once 'helpers/head.php' ?>
</head>
<body>


    <? include_once 'helpers/navbar.php' ?>
    <? include_once 'helpers/sidebar.php' ?>
    


    <!-- main container -->
    <div class="content">


        <div class="container-fluid">

            <div id="pad-wrapper">

                <!-- class chart built with jQuery Flot -->
                <div class="row-fluid chart">
                    <h4>
                        <div class='span12'>Cursos Dictados en la UC</div>

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

    <? include_once 'helpers/scripts.php' ?>

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