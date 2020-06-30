<?php 
require_once ("model/Company.php");
require_once ("model/Service.php");
require_once ("model/User.php");
require_once ("connectionBD/connection.php");

class data extends Connection{
//En este metodo se obtiene los servicios pronto a vencer, por medio de un procedimiento almacenado 
    function getExpiredServices(){
        $sentence = "CALL sp_expiration_date";
        $statement = $this->conection_db->prepare($sentence);
        $statement->execute(array());
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $vars){
            $arrayCompanies = array($vars['name']." ".$vars['type_service']." ".$vars['date_of_expiration']);
        }
        $statement->closeCursor();
        return $arrayCompanies;
    }
//En este metodo se obtiene los servicios vencidos, por medio de un procedimiento almacenado 
    function getExpiringServices(){
        $sentence = "CALL sp_expiring_services();";
        $statement = $this->conection_db->prepare($sentence);
        $statement->execute(array());
        $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
        foreach ($result as $vars){
            $arrayCompanies = array($vars['name']." ".$vars['type_service']." ".$vars['date_of_expiration']);
        }
        $statement->closeCursor();
        return $arrayCompanies;
    }
////En este metodo se obtiene los servicios que se vencen en la fecha actual
//por medio de un procedimiento almacenado, de acuerdo a los datos otenidos se envia la notificacion.
    function getServicesExpiringToday(){
        $sentence = "CALL notify();";
        $statement = $this->conection_db->prepare($sentence);
        $statement->execute(array());
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $vars){
            $arrayServices = array($vars['name'],
            $vars['type_service'],
            $vars['email']);
        }
        $statement->closeCursor();
        return $arrayServices;
    }
}
?>