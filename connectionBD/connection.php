<?php
//se hace la conexion a la base de datos, por el momento la base se encuentra en un servidor de la universidad
class Connection{
    protected $conection_db;
	
	public function Connection(){

		try{
			$this->conection_db=new PDO('mysql:host=163.178.107.10; dbname=client_service_control','laboratorios','UCRSA.118');
			$this->conection_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conection_db->exec("SET CHARACTER SET utf8");
			return $this->conection_db;
			
		}catch(Exception $e){
			echo "Error line: ". $e->getLine();
		}
	}

}


?>


<Bbr&9AH&%*()s2!