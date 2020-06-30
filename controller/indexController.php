<?php
   require_once ("data/data.php");
   $data = new data();
   $companiesExpired = $data->getExpiredServices();
   $companiesExpiring = $data->getExpiringServices();
   $servicesExpiringToday = $data->getServicesExpiringToday();
   require_once ("index.php")
?>