<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/answers.php' ;
    include_once 'backend/search_count.php' ;

    if($seachesLeft >0 ){  
    insertSearch($user_name);
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


        <div class="container-fluid" style="positon:relative;">
        	    <div class="" style="position:absolute; right:0px; width:20%; padding-right:25px; height:100%; background-color: rgba(247, 247, 247, 0.13); border-left:1px solid #f7f7f7;">
                	<div style="" class="professor_list">
                		<div style="margin-left:15px; margin-top:15px;">
                			<div style="border-bottom: 1px solid gray; width: 100%; padding-bottom: 13px;">
			                	<h4>
			                		Profesores
			                		<br>
			                		<small>selecciona los profesores</small>
			                	</h4>
			                	<input type="text" class="search professor_list_search" placeholder="buscar...">
		                	</div>
		                	<div class="professor_list_holder">
			                	<? foreach ($aa_q[0] as $professor => $data) {  
									$professor_name = str_replace($search, $replace, $professor);
			                		?>
			                		<div data-q="<? echo str_replace($search, $replace, $professor) ?>" class="professor_selector selected" style="">
						  				<? echo $professor ?>
						  				<br>
						  				<small><? echo $count[$professor] ?> respuestas</small>
						  				<br>
						  				<? if (count($p_comment[$professor])>0) { ?> 
						  				<h6 class="label_container"><a class=" label label-success open_comments" data-n ="<? echo $professor_name ?>">ver comentarios</a></h6>
						  				<? } else  {?>
						  				<h6 class="label_container"><a class=" label" data-n ="">sin comentarios</a></h6>
						  				<? } ?>
						  			</div>
								<? } ?>
			                	<? foreach ($not_responded_list as $key => $professor) {  ?>
			                		<div data-q="" class="professor_selector disabled" style="">
						  				<? echo $professor ?>
						  				<br>
						  				<small> sin respuestas </small>
						  			</div>
								<? } ?>
							</div>
	                	</div>
                	</div>
            	</div>

            <div id="pad-wrapper">
            	<h3> RESULTADOS DE <? echo $cname.' - '.$cun; ?> </h3>

            	<? foreach ($p_comment as $professor => $comment) { 
            		$professor_name = str_replace($search, $replace, $professor);
            	?> 
            	<div class="comments_holder <? echo $professor_name ?>" style='display:none'>
	            	<div class="pop-dialog is-visible">
	                    <div class="body">
	                    	<h5>
            					COMENTARIOS DE <? echo $professor ?>
            					<span class="close-icon"><i class="icon-remove-sign close_comments"></i></span>
            				</h5>
	                        
	                        <div class="messages">
	                        	<? foreach ($comment as $username => $message) { ?> 
	                            <span href="#" class="item">
	                                <div class="name"><? echo $username?>@uc.cl</div>
	                                <div class="msg">
	                                    <? echo $message ?>
	                                </div>
	                                <span class="time"><i class="icon-time"></i> <? echo $p_comment_time[$professor][$username] ?> </span>
	                            </span>
	                            <? } ?>
	                            <div class="footer">
                            </div>
	                        </div>
	                    </div>
                	</div>
                </div>
                <? } ?>

                <!-- class chart built with jQuery Flot -->
                <!-- //promedio de notas -->
                <div class="row-fluid shorter section" style="float:left">
                    <h4>
                        <div class='span12'>Promedio de notas</div>
                        <br>
                        <small>en base a los alumnos que han ingresado</small>
                        <div class="btn-group chart-type pull-right" style="margin-right:10px" data-q="100">
                            <button class="glow left active" disabled>AGREGADO</button>
                            <button class="glow right ">POR SEMESTRE</button>
                        </div>
                    </h4>
                    <div class="span2 h6" style="display:none">
                        <div id="statsChart-checkbox-100" class="faculty_classes_checkbox">
                            <input type="text" class="search faculty_classes span12" placeholder="facultad...">
                            <div class="faculty_list">
                                <?
                                    foreach ($sgbs_q as $professor => $data) { 
                                        $professor_name = str_replace($search, $replace, $professor);
                                ?>
                                        <input type="checkbox"  name="<? echo $professor_name.'100' ?>"  id="<? echo $professor_name.'100'?>" checked>
                                        <label for="<? echo $professor_name.'100' ?>" ><? echo $professor ?></label>                                
                                <?
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="span12 Chart-q100" style="display:none">
                        <div id="statsChart-100" class="answersChart"></div>
                        <div id="statsChartLegend-100" class="span12"></div>
                    </div>
                    <div class="span12 Chart-q100">
                        <div id="statsBars-100" class="answersChart"></div>
                    </div>
                </div>

                <? for ($n=0; $n<count($questions); $n++) { ?> 
                <div class="row-fluid shorter section" style="float:left">
                    <h4>
                        <div class='span12'><? echo $questions[$n] ?></div>
                        <br>
                        <small><? echo $questions_explanation[$n] ?></small>
                        <div class="btn-group chart-type pull-right" style="margin-right:10px" data-q="<? echo $n ?>">
                            <button class="glow left active" disabled>AGREGADO</button>
                            <button class="glow right ">POR SEMESTRE</button>
                        </div>
                    </h4>
                    <div class="span2 h6" style="display:none">
                        <div id="<? echo 'statsChart-checkbox-'.$n ?>" class="faculty_classes_checkbox">
                            <input type="text" class="search faculty_classes span12" placeholder="facultad...">
                            <div class="faculty_list">
                                <?
                                    foreach ($abs_q[$n] as $professor => $data) { 
                                        $professor_name = str_replace($search, $replace, $professor);
                                ?>
                                        <input type="checkbox"  name="<? echo $professor_name.$n ?>"  id="<? echo $professor_name.$n?>" checked>
                                        <label for="<? echo $professor_name.$n ?>" ><? echo $professor ?></label>                                
                                <?
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="span12 <? echo 'Chart-q'.$n ?>" style="display:none">
                        <div id="<? echo 'statsChart-'.$n ?>" class="answersChart"></div>
                        <div id="<? echo 'statsChartLegend-'.$n ?>" class="span12"></div>
                    </div>
                    <div class="span12 <? echo 'Chart-q'.$n ?>">
                        <div id="<? echo 'statsBars-'.$n ?>" class="answersChart"></div>
                        <!-- <div id="<? echo 'statsBarsLegend-'.$n ?>" class="span12"></div> -->
                    </div>
                </div>
                <? } ?>


            </div>
        </div>
    </div>

    <? include_once 'helpers/scripts.php' ?>

    <script type="text/javascript">
        $(function () {     		
      		<? for ($n=0; $n<count($questions); $n++) { ?> 
	            
	        	//bar graphs
				var graphBar<? echo $n ?> =  Morris.Bar({
					// ID of the element in which to draw the chart.
					element: '<? echo "statsBars-".$n ?>',
					// Chart data records -- each entry in this array corresponds to a point on
					// the chart.
					data: barData(<? echo $n ?>),
					// The name of the data record attribute that contains x-values.
					xkey: 'professor',
					// A list of names of data record attributes that contain y-values.
					ykeys: ['value', 'answers'],
					barColors: ['#0b62a4', '#7a92a3'],
					// Labels for the ykeys -- will be displayed when you hover over the
					// chart.
					<? if ($questions_type[$n]==1) { ?> 
						labels: ['nota promedio', 'respuestas']		            	
		            <? } else { ?> 
		            	labels: ['porcentaje de sí']
		            <? } ?>
					
				});

	            //line graphs classes
	            classGraphHolder<? echo $n ?> = $("<? echo '#statsChart-'.$n ?>");
	            classCheckboxHolder<? echo $n ?> = $("<? echo '#statsChart-checkbox-'.$n ?>");
	            classDataset<? echo $n ?> = classesData(<? echo $n ?>);
	            classLegendHolder<? echo $n ?> = $("<? echo '#statsChartLegend-'.$n ?>");
	            <? 
	            if ($questions_type[$n]==1) { ?> 
	            	classTooltipString<? echo $n ?> = 'nota promedio';
	            <?} else { ?> 
	            	classTooltipString<? echo $n ?> = 'porcentaje de sí';
	            <? } ?>
	            searchFacultyClasses<? echo $n ?> = $('.search.faculty_classes');
	            checkboxFacultyClasses<? echo $n ?> = $('.faculty_classes_checkbox')

	            plotClasses(classGraphHolder<? echo $n ?>, classCheckboxHolder<? echo $n ?>, classDataset<? echo $n ?>, classLegendHolder<? echo $n ?>, classTooltipString<? echo $n ?> );
	            facultyScroll();
	            searchFaculty(searchFacultyClasses<? echo $n ?>, checkboxFacultyClasses<? echo $n ?>);
/*	            classCheckboxHolder<? echo $n ?>.find("input").click(function(){
	                plotClasses(classGraphHolder<? echo $n ?>, classCheckboxHolder<? echo $n ?>, classDataset<? echo $n ?>, classLegendHolder<? echo $n ?>, classTooltipString<? echo $n ?> );
	            });*/
	            classCheckboxHolder<? echo $n ?>.find("input").change(function(){
	                plotClasses(classGraphHolder<? echo $n ?>, classCheckboxHolder<? echo $n ?>, classDataset<? echo $n ?>, classLegendHolder<? echo $n ?>, classTooltipString<? echo $n ?> );
	            	updateBarChart(classCheckboxHolder<? echo $n ?>, graphBar<? echo $n ?>, varBarData(<? echo $n ?>));
	            });
            <? } ?>

            // avg grade bar graph
            var graphBar100 =  Morris.Bar({
					// ID of the element in which to draw the chart.
					element: 'statsBars-100',
					// Chart data records -- each entry in this array corresponds to a point on
					// the chart.
					data: barData(100),
					// The name of the data record attribute that contains x-values.
					xkey: 'professor',
					// A list of names of data record attributes that contain y-values.
					ykeys: ['value', 'alumnos'],
					barColors: ['#0b62a4', '#7a92a3'],
					// Labels for the ykeys -- will be displayed when you hover over the
					// chart.
					labels: ['nota promedio', 'alumnos ingresados']		            	
					
				});

	            //line graphs  grades 
	            classGraphHolder100 = $('#statsChart-100');
	            classCheckboxHolder100 = $('#statsChart-checkbox-100');
	            classDataset100 = classesData(100);
	            classLegendHolder100 = $('#statsChartLegend-100');
            	classTooltipString100 = 'nota promedio';
	            searchFacultyClasses100 = $('.search.faculty_classes');
	            checkboxFacultyClasses100 = $('.faculty_classes_checkbox')

	            plotClasses(classGraphHolder100, classCheckboxHolder100, classDataset100, classLegendHolder100, classTooltipString100 );
	            facultyScroll();
	            searchFaculty(searchFacultyClasses100, checkboxFacultyClasses100);
	            classCheckboxHolder100.find("input").change(function(){
	                plotClasses(classGraphHolder100, classCheckboxHolder100, classDataset100, classLegendHolder100, classTooltipString100 );
	            	updateBarChart(classCheckboxHolder100, graphBar100, varBarData(100));
	            });


        });

		//data for the classes graph
        function barData(q) {
        	var barDatasets = Array();
        	<? for ($n=0; $n<count($questions); $n++) { ?> 
        		barDatasets[<? echo $n ?>] = {
        			data: [
					<? foreach ($aa_q[$n] as $professor => $data) {  ?>
					  { professor: '<? echo $professor ?>', value: <? if($data) echo $data; else echo "'-'"; ?>, answers: <? echo $count_q[$n][$professor]; ?> },

					<? } ?>
					]
        		}
        	<? } ?>
        		barDatasets[100] = {
        			data: [
					<? foreach ($sga_q as $professor => $data) {  ?>
					  { professor: '<? echo $professor ?>', value: <? if($data) echo $data; else echo "'-'"; ?>, alumnos: <? echo $count_gpa[$professor]; ?>  },

					<? } ?>
					]
        		}
        	return barDatasets[q]['data'];
        }
        //variable data for the classes graph
        function varBarData(q) {
        	var barDatasets = Array();
        	<? for ($n=0; $n<count($questions); $n++) { ?> 
        		barDatasets[<? echo $n ?>] = {
        			<? foreach ($aa_q[$n] as $professor => $data) {  ?>
        			"<? echo str_replace($search, $replace, $professor).$n; ?>": {
	                    label: "<? echo $professor; ?>",
	                    data: [{ professor: '<? echo $professor ?>', value: <? if($data) echo $data; else echo "'-'"; ?>, answers: <? echo $count_q[$n][$professor]; ?> }] 
	                },
	                <? } ?>
        		}
        	<? } ?>
        		barDatasets[100] = {
        			<? foreach ($sga_q as $professor => $data) {  ?>
        			"<? echo str_replace($search, $replace, $professor).'100'; ?>": {
	                    label: "<? echo $professor; ?>",
	                    data: [{ professor: '<? echo $professor ?>', value: <? if($data) echo $data; else echo "'-'"; ?>, alumnos: <? echo $count_gpa[$professor]; ?> }] 
	                },
	                <? } ?>
        		}
        	return barDatasets[q];
        }
        function classesData(q) {
        	var datasets = Array();
        	<? for ($n=0; $n<count($questions); $n++) { ?> 
	            datasets[<? echo $n ?>] = {
	            <?
	                foreach ($abs_q[$n] as $professor => $data) { 
	                	$series_professor[$professor] = array();
	                    foreach ($data as $tick => $avg) {
	                        $series_professor[$professor][]='['.$tick.' ,'.$avg.']';
	                    }
	            ?>

	                "<? echo str_replace($search, $replace, $professor).$n; ?>": {
	                    label: "<? echo $professor; ?>",
	                    data: [<? echo implode (',' , $series_professor[$professor]); ?>] 
	                }, 
	            <?
	                }
	            ?>
	            }

	            // hard-code color indices to prevent them from shifting as
	            // countries are turned on/off
	        <? } ?>
	        	datasets[100] = {
	            <?
	                foreach ($sgbs_q as $professor => $data) { 
	                	$series_professor[$professor] = array();
	                    foreach ($data as $tick => $avg) {
	                        $series_professor[$professor][]='['.$tick.' ,'.$avg.']';
	                    }
	            ?>

	                "<? echo str_replace($search, $replace, $professor).'100'; ?>": {
	                    label: "<? echo $professor; ?>",
	                    data: [<? echo implode (',' , $series_professor[$professor]); ?>] 
	                }, 
	            <?
	                }
	            ?>
	            }
/*	            var i = 1;

	            $.each(datasets, function(key, val) {
	                val.color = i;
	                ++i;
	            });
            */
            return datasets[q];
        };


        
    </script>
</body>
</html>
<? }
	else {
		header( 'Location: search_incomplete.php' ) ;
	}
} 
else {
header( 'Location: index.php' ) ;
}
?>