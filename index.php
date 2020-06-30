<?php 
  require_once ("controller/indexController.php");
  require_once ("connectionBD/menssage.php");
//verifica si algun servicio a vencido y envia la notificacion 
  if($servicesExpiringToday!=null){
    foreach($servicesExpiringToday as $service){
      $notify = new menssage();
      $notify->sendEmail($service[1], $service[2],$service[3]);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default" style="background-color: darkslateblue">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color: white">Client Service Control</a>
    </div>
  </div>
</nav>
  
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
        <div class="panel panel-default" style="background-color: lightseagreen">
            <div class="panel-head" style="text-align: center"><h3>Servicios por vencer</h3></div>
            <div class="panel-body">
            <?php 
              foreach ($companiesExpiring as $ceing){
                echo $ceing;
              }
            ?>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="col-sm-4">
        <div class="panel panel-default" style="background-color: coral">
            <div class="panel-head" style="text-align: center"><h3>Servicios vencidos</h3></div>
            <div class="panel-body">
            <?php 
              foreach ($companiesExpired as $ced){
                echo $ced;
            }
            ?>
            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>