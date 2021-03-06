<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/panel.php' ;

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
            <? include_once 'helpers/upper_stats.php' ; ?>
            <br>
            <div class="alert alert-info">
                            <i class="icon-exclamation-sign"></i>
                            Pronto se agregarán los cursos del segundo semestre del 2013
            </div>

            <div id="pad-wrapper" class="normal_pad">
                <div class="table-products section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Evalúa tus Profesores</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <h5>Año:</h5>
                            <div class="ui-select">
                                <select class="class_time">
                                  <option >Todos</option>
                                  <? foreach($c_year_list as $year) {?> 
                                  <option><? echo $year ?></option>
                                  <?}?>
                                </select>
                            </div>
                            <h5>Semestre:</h5>
                            <div class="ui-select">
                                <select class="class_time">
                                  <option>Todos</option>
                                  <option>Primero</option>
                                  <option>Segundo</option>
                                </select>
                            </div>
                            <input type="text" class="search class_list" placeholder="busca tus cursos...">
                        </div>
                    </div>


                    <div class="row-fluid table">
                        <table class="table table-hover professor-table">
                            <thead>
                                <tr>
                                    <th class="span3 year">
                                        Año - Semestre
                                    </th>
                                    <th class="span3 professor">
                                        <span class="line"></span>
                                        Profesor
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>Curso
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>Estado
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- rows-->
                                <? foreach ($class_name as $key => $value) { ?> 
                                <tr class="">
                                    <td>
                                        <? echo $c_year[$key].' - '.$c_semester[$key] ?>
                                    </td>
                                    <td>
                                        <? echo $professor_name[$key] ?>
                                    </td>
                                    <td class="description">
                                        <? echo $class_un[$key].' - '.$value ?>
                                    </td>
                                    <td>
                                        <form action='evaluate.php' name='evaluate_form' method="post">
                                            <?
                                            if (!in_array($class_un[$key], $answer_list)) { ?>
                                            <span class="label label-info">pendiente</span>
                                            <ul class="actions">                                            
                                                <input type="hidden" value='<? echo $professor_id[$key] ?>' name='pid'>
                                                <input type="hidden" value='<? echo $professor_name[$key] ?>' name='pn'>
                                                <input type="hidden" value='<? echo $class_un[$key] ?>' name='cun'>
                                                <input type="hidden" value='<? echo $value ?>' name='cn'>
                                                <input type="hidden" value='<? echo $c_n_semester[$key] ?>' name='semester'>
                                                <input type="hidden" value='<? echo $c_year[$key] ?>' name='year'>
                                                <a class="btn-flat icon evaluate" >
                                                    <i class="table-edit"></i> evaluar
                                                </a>                                            
                                            </ul>
                                            <? } else { ?>
                                                <span class="label label-success">evaluado</span>
                                               
                                            <? } ?>
                                        </form>
                                    </td>
                                </tr>
                                <? } ?>
                            </tbody>
                        </table>
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