<?php
require_once 'CONECTION.php';
class PLANES extends CONECTION{
    
    private $CODIGO;
    private $PLAN;
    private $DETALLE;
    
    public function getCODIGO() {
        return $this->CODIGO;
    }

    public function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
    }

    public function getPLAN() {
        return $this->PLAN;
    }

    public function setPLAN($PLAN) {
        $this->PLAN = $PLAN;
    }

    public function getDETALLE() {
        return $this->DETALLE;
    }

    public function setDETALLE($DETALLE) {
        $this->DETALLE = $DETALLE;
    }
    
    function ListarPlanes() {
        $cone= new CONECTION();
        $cone->CONECT();
        $querymas=  mysql_query("SELECT * FROM  `planes`");
        $cone->CLOSE();
        unset($cone);
        return $querymas;
    }


    
}

?>
