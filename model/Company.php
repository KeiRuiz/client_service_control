<?php
    class Company{
        private $userRol;
        private $service;
        private $name;

        public function __construct($userRolP, $serviceP,$nameP)
        {
            $this->userRol = $userRolP;
            $this->service = $serviceP;
            $this->name = $nameP;
        }

        //get
        public function getUserRol(){
            return $this->userRol;
        }
        public function getService(){
            return $this->service;
        }
        public function getName(){
            return $this->name;
        }
        //set
        public function setUserRol($userRolP){
           $this->userRol = $userRolP;
        }
        public function setService($serviceP){
            $this->service = $serviceP;
        }
        public function setName($nameP){
            $this->name = $nameP;
        }

    }
?>