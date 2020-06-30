<?php
class menssage{
    public function sendEmail($nameCompany, $emailUser, $typeService){
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "keilynltecr@gmail.com";
        $to = $emailUser;
        $subject = "Servicio pronto a vencer";
        $message = "Estimado usuario".$nameCompany.", le recordamos que su servicio".$typeService."esta pronto a vencer";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "The email message was sent.";
    }
}
  ?>
