<?php

require_once 'CONECTION.php';
class ESTADOS extends CONECTION{
    
    private $CODIGO;
    private $ESTATUS;
    
    public function getCODIGO() {
        return $this->CODIGO;
    }

    public function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
    }

    public function getESTATUS() {
        return $this->ESTATUS;
    }

    public function setESTATUS($ESTATUS) {
        $this->ESTATUS = $ESTATUS;
    }
    
    public function ListEstaus() {
        $con=new CONECTION();
        $con->CONECT();
        $lits=  mysql_query("SELECT * FROM  `estados` ");
        $con->CLOSE();
        unset($con);
        return $lits;
    }


}

?>
