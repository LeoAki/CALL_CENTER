<?php

require_once 'CONECTION.php';

class Llamada extends CONECTION{
    
    private $CODIGO;
    private $IDCLIENTE;
    private $IDUSUARIO;
    private $IDESTADO;
    private $DESCRIPCION;

    public function getCODIGO() {
        return $this->CODIGO;
    }

    public function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
    }

    public function getIDCLIENTE() {
        return $this->IDCLIENTE;
    }

    public function setIDCLIENTE($IDCLIENTE) {
        $this->IDCLIENTE = $IDCLIENTE;
    }

    public function getIDUSUARIO() {
        return $this->IDUSUARIO;
    }

    public function setIDUSUARIO($IDUSUARIO) {
        $this->IDUSUARIO = $IDUSUARIO;
    }

    public function getIDESTADO() {
        return $this->IDESTADO;
    }

    public function setIDESTADO($IDESTADO) {
        $this->IDESTADO = $IDESTADO;
    }

    public function getDESCRIPCION() {
        return $this->DESCRIPCION;
    }

    public function setDESCRIPCION($DESCRIPCION) {
        $this->DESCRIPCION = $DESCRIPCION;
    }
    
    public function GRABAR() {
        try {
            $this->CONECT();
            mysql_query("
                Call Sp_llamada(
                '".$this->CODIGO."','".$this->IDCLIENTE."','".$this->IDUSUARIO."',
                '".$this->IDESTADO."','".$this->DESCRIPCION."');") or die(mysql_error());
            $this->CLOSE();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public function ListarMiTrabajo($micodigo) {
        $cone=new CONECTION();
        $cone->CONECT();
        $list=  mysql_query("
            select 
            ll.codigo,
            CONCAT(cer.paterno,' ',cer.materno,' , ',cer.nombres) as CLIENTE1,
            CONCAT(per.paterno,' ',per.materno,', ',per.nombres) as VENDEDOR1,
            tat.estatus,
            ll.descripcion
            from llamada ll
            inner join cliente cer
            on ll.idcliente=cer.codigo
            inner join persona per
            on ll.idusuario=per.codigo
            inner join estados tat
            on ll.idestado=tat.codigo
            where 
            ll.idusuario='".$micodigo."'
            and  tat.codigo<>3;");
        $cone->CLOSE();
        unset($cone);
        return $list;
    }
    
    public function ListarMiTrabajoAgendado($micodigo) {
        $cone=new CONECTION();
        $cone->CONECT();
        $list=  mysql_query("
            select 
            ll.codigo,
            CONCAT(cer.paterno,' ',cer.materno,' , ',cer.nombres) as CLIENTE1,
            CONCAT(per.paterno,' ',per.materno,', ',per.nombres) as VENDEDOR1,
            tat.estatus,
            ll.descripcion,
            cer.codigo
            from llamada ll
            inner join cliente cer
            on ll.idcliente=cer.codigo
            inner join persona per
            on ll.idusuario=per.codigo
            inner join estados tat
            on ll.idestado=tat.codigo
            where 
            ll.idusuario='".$micodigo."'
            and  tat.codigo=3;");
        $cone->CLOSE();
        unset($cone);
        return $list;
    }
    
    public function ListarLllamadas() {
        $cone=new CONECTION();
        $cone->CONECT();
        $list=  mysql_query("
            select 
            ll.codigo,
            CONCAT(cer.paterno,' ',cer.materno,' , ',cer.nombres) as CLIENTE1,
            CONCAT(per.paterno,' ',per.materno,', ',per.nombres) as VENDEDOR1,
            tat.estatus,
            ll.descripcion,
            cer.codigo
            from llamada ll
            inner join cliente cer
            on ll.idcliente=cer.codigo
            inner join persona per
            on ll.idusuario=per.codigo
            inner join estados tat
            on ll.idestado=tat.codigo");
        $cone->CLOSE();
        unset($cone);
        return $list;
    }
    


}

?>
