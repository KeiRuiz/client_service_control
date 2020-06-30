<?php
  class Service {
    private $dateOfPurchase;
    private $expirationDate;
    private $typeService;

    public function __construct($dateOfPurchaseP,$expirationDateP, $typeServiceP)
    {
      $this->dateOfPurchase = $dateOfPurchaseP;
      $this->expirationDate = $expirationDateP;
      $this->typeService = $typeServiceP;
    }

    //get
        public function getDateOfPurchase()
      {
        return $this->dateOfPurchase;
      }
      public function getExpirationDate()
      {
        return $this->expirationDate;
      }
      public function getTypeService()
      {
        return $this->typeService;
      }

    //set
      public function setDateOfPurchase($dateOfPurchaseP){
        $this->dateOfPurchase = $dateOfPurchaseP;
      }
      public function setExpirationDate($expirationDateP){
        $this->expirationDate = $expirationDateP;
      }
      public function setTypeService($typeServiceP){
        $this->typeService = $typeServiceP;
      }

      public function __toString()
      {
        return "DateOfPucharse: $this->dateOfPurchase, ExpirationDate: $this->expirationDate, TypeService: $this->typeService";
      }
  }
?> 