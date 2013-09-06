<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/evaluate.php' ;
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
                            <h3>Evalúa a NOMBRE DEL PROFESOR</h3>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                    	<div class="field-box">
                    		<ol>
                    			<? foreach ($questions as $key => $question) { ?>
                    			<li>
		                            <h5><? echo $question ?></h5>
		                            <small><? echo $questions_explanation[$key] ?></small>
		                            <div class="">
			                            <div class="btn-group">
			                              <input type="radio" name="q<? echo $key ?>" value="" id='q<?echo $key ?>v'>
				                          <label for="q<? echo $key ?>v" class="btn btn-default">Omitir</label>
				                          <? if ($questions_type[$key]==1){
				                          		for($n=1; $n<8; $n++) { ?> 
						                          <input type="radio" name="q<?echo $key ?>" value="<?echo $n ?>" id='<?echo 'q'.$key.'v'.$n ?>'>
						                          <label for="<?echo 'q'.$key.'v'.$n ?>" class="btn btn-default"><?echo $n ?></label>
						                        <? } 
						                     } else {?>
						                     	  <input type="radio" name="q<?echo $key ?>" value="1" id='<?echo 'q'.$key.'v1' ?>'>
						                          <label for="<?echo 'q'.$key.'v1' ?>" class="btn btn-default">Sí</label>
						                          <input type="radio" name="q<?echo $key ?>" value="0" id='<?echo 'q'.$key.'v0' ?>'>
						                          <label for="<?echo 'q'.$key.'v0' ?>" class="btn btn-default">No</label>
						                     <? } ?>
				                        </div>
		                            </div>    
		                        </li>
		                        <? }?>
		                        <li>
		                        	<h5>Comentarios</h5>
		                        	<small>opcionales</small>
		                        	<br>
		                        	<br>
		                        	<textarea class="form-control" rows="4" style="width:300px"></textarea>
		                        </li>
	                        </ol>   
                  			<a class="btn-flat">ENVIAR</a>
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
?>
















