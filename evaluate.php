<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/evaluate.php' ;
    if($pid && $pn && $cun  && $cn) {

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
            <div id="pad-wrapper" class="normal_pad">
                <div class="table-products section">
                    <div class="row-fluid head" style="margin-bottom:30px">
                        <div class="span12">
                            <h3>EVALÚA A <? echo $pn.' - '.$cn ?></h3>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                    	<div class="field-box">
                    		<form method="post" action="add_evaluation.php" class='evaluete_professor'>
	                    		<ol>
	                    			<input type="hidden" value='<? echo $pid ?>' name='pid'>
                                	<input type="hidden" value='<? echo $cun ?>' name='cun'>
                                	<input type="hidden" value='<? echo $year ?>' name='year'>
                                	<input type="hidden" value='<? echo $semester ?>' name='semester'>
	                    			<? foreach ($questions as $key => $question) { ?>
	                    			<li>
			                            <h5 id='q<?echo $key ?>'><? echo $question ?></h5>
			                            <small><? echo $questions_explanation[$key] ?></small>
			                            <div class="">
				                            <div class="btn-group">
				                              <input type="radio" name="q<? echo $key ?>" value="NULL" id='q<?echo $key ?>v'>
					                          <label for="q<? echo $key ?>v" class="btn btn-default ql">Omitir</label>
					                          <? if ($questions_type[$key]==1){
					                          		for($n=1; $n<8; $n++) { ?> 
							                          <input type="radio" name="q<?echo $key ?>" value="<?echo $n ?>" id='<?echo 'q'.$key.'v'.$n ?>'>
							                          <label for="<?echo 'q'.$key.'v'.$n ?>" class="btn btn-default ql"><?echo $n ?></label>
							                        <? } 
							                     } else {?>
							                     	  <input type="radio" name="q<?echo $key ?>" value="1" id='<?echo 'q'.$key.'v1' ?>'>
							                          <label for="<?echo 'q'.$key.'v1' ?>" class="btn btn-default ql">Sí</label>
							                          <input type="radio" name="q<?echo $key ?>" value="0" id='<?echo 'q'.$key.'v0' ?>'>
							                          <label for="<?echo 'q'.$key.'v0' ?>" class="btn btn-default ql">No</label>
							                     <? } ?>
					                        </div>
					                        <span class="alert-msg-error" id='error-q<? echo $key ?>' style='display:none;'>
			                            		<i class="icon-remove-sign"></i> 
			                            		debes responder esta pregunta
			                            	</span>
			                            </div>    
			                        </li>
			                        <? }?>
			                        <li>
			                        	<h5>Comentarios sobre el profesor y/o curso</h5>
			                        	<small>los comentarios se muestran en los resultados con nombre de usuario</small>
			                        	<br>
			                        	<br>
			                        	<textarea class="form-control" rows="4" name="comments" style="width:300px"></textarea>
			                        </li>
		                        </ol>
	                            
	                           
	                  			<a class="btn-flat evaluate">ENVIAR</a>
	                  			<br>
	                  			una vez evaluado el profesor no se podrán cambiar los resultados ni comentarios

                  			</form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <? include_once 'helpers/scripts.php' ?>

</body>
</html>
<? } 
	else {
	header( 'Location: index.php' ) ;
	}
}
else {
header( 'Location: index.php' ) ;
}
?>
















