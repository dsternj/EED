<?
include_once('read_cookie.php') ;
if($user_name) { 
    include_once 'backend/application.php' ;
    include_once 'backend/professor.php' ;

?>

<!DOCTYPE html>
<html>
<head>
    <? include_once 'helpers/head.php' ?>
     <link rel="stylesheet" type="text/css" href="css/user-profile.css">
</head>
<body>


    <? include_once 'helpers/navbar.php' ?>
    <? include_once 'helpers/sidebar.php' ?>
    


    <!-- main container -->
    <div class="content">
        <div class="container-fluid">
<div id="pad-wrapper" class="user-profile">
            <!-- header -->
            <div class="row">
                <div class="span10">
                    <h3 class="name"><? echo $name ?></h3>
                    <br>
                    <h5>PROFESOR(A) DE LA <? echo $faculty ?></h5>

                <div class="">
                <!-- bio, new note & orders column -->
                <div class="section">
                    <div class="">
                        <!-- biography -->
                        <h5>Cursos Dictados</h5>
                        <br>
                        <!-- recent orders table -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span6">
                                        Curso
                                    </th>
                                    <th class="span6">
                                        <span class="line"></span>
                                       Año - Semestre
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <? foreach ($class_list as $cun => $name) { ?>
                                <tr class="first">
                                     
                                        <td>
                                            <a href="answers.php?cun=<? echo $cun ?>" ><? echo $name ?></a>
                                        </td>
                                        <td>
                                            <? foreach ($class_list_period[$cun] as $period) { 
                                                echo $period.' / ';
                                             } ?>
                                        </td>
                                   
                                </tr>
                                 <?} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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