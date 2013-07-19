<?php
require_once 'CONECTION.php';
class Cliente extends CONECTION {
    
    private $CODIGO;
    private $MENSAJE;
    private $PATERNO;
    private $MATERNO;
    private $NOMBRES;
    private $RESPONSABLES;
    private $DNI;
    private $CELULAR;
    private $FIJO;
    private $DIRECCION;
    private $DISTRITO;
    
    public function getCODIGO() {
        return $this->CODIGO;
    }

    public function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
    }

    public function getMENSAJE() {
        return $this->MENSAJE;
    }

    public function setMENSAJE($MENSAJE) {
        $this->MENSAJE = $MENSAJE;
    }

    public function getPATERNO() {
        return $this->PATERNO;
    }

    public function setPATERNO($PATERNO) {
        $this->PATERNO = $PATERNO;
    }

    public function getMATERNO() {
        return $this->MATERNO;
    }

    public function setMATERNO($MATERNO) {
        $this->MATERNO = $MATERNO;
    }

    public function getNOMBRES() {
        return $this->NOMBRES;
    }

    public function setNOMBRES($NOMBRES) {
        $this->NOMBRES = $NOMBRES;
    }

    public function getRESPONSABLES() {
        return $this->RESPONSABLES;
    }

    public function setRESPONSABLES($RESPONSABLES) {
        $this->RESPONSABLES = $RESPONSABLES;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    public function getCELULAR() {
        return $this->CELULAR;
    }

    public function setCELULAR($CELULAR) {
        $this->CELULAR = $CELULAR;
    }

    public function getFIJO() {
        return $this->FIJO;
    }

    public function setFIJO($FIJO) {
        $this->FIJO = $FIJO;
    }

    public function getDIRECCION() {
        return $this->DIRECCION;
    }

    public function setDIRECCION($DIRECCION) {
        $this->DIRECCION = $DIRECCION;
    }

    public function getDISTRITO() {
        return $this->DISTRITO;
    }

    public function setDISTRITO($DISTRITO) {
        $this->DISTRITO = $DISTRITO;
    }
    
    public function ListDistritos() {
        $CONE= new CONECTION();
        $CONE->CONECT();
        $list=  mysql_query("SELECT * FROM `distritos_lima`");
        $CONE->CLOSE();
        unset($CONE);
        return $list;
    }
    
    public function ListUser() {
        $CONE= new CONECTION();
        $CONE->CONECT();
        $list=  mysql_query("SELECT codigo, paterno,materno,nombres FROM `Persona` where nivel<>1;");
        $CONE->CLOSE();
        unset($CONE);
        return $list;
    }
    
    public function GRABAR() {
        try {
            $this->CONECT();
            mysql_query("CALL Sp_Cliente(
                '".$this->CODIGO."','".$this->MENSAJE."','".$this->PATERNO."','".$this->MATERNO."','".$this->NOMBRES."','".$this->RESPONSABLES."',
                '".$this->DNI."','".$this->CELULAR."','".$this->FIJO."','".$this->DIRECCION."','".$this->DISTRITO."'
                );
            ") or die(mysql_error());
            $this->CLOSE();
        } catch (Exception $exc) {
            echo 'Ups!, lo sentimos ocurrio el siguiente error: '.$exc->getTraceAsString();
        }
            
    }
    
    public function ListCliente() {
        $CONE=new CONECTION();
        $CONE->CONECT();
        $listar=  mysql_query('
            select 
            c.codigo,c.mensaje,CONCAT(c.paterno," ",c.materno,", ",c.nombres) as CLIENTE,
            CONCAT(p.paterno," ",p.materno,", ",p.nombres) as ASESOR_RESPONSABLE,
            c.dni,c.celular,c.fijo,CONCAT(c.direccion," distrito de ",dis.distrito) as DOMICILIO
            from cliente c
            inner join persona p
            on c.responsable=p.codigo
            inner join distritos_lima dis
            on c.distrito=dis.codigo;'
        ) or die(mysql_error());
        $CONE->CLOSE();
        unset($CONE);
        return $listar;
    }

    public function ELIMINO($code){
        try {
            $this->CONECT();
            mysql_query("DELETE FROM `CALL_CENTER`.`cliente` WHERE `cliente`.`codigo` = $code;") or die(mysql_error());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->CLOSE();
    }
    
    public function setDATA($codigo,$mensaje,$paterno,$materno,$nombres,$responsables,$dni,$celular,$fijo,$direccion,$distrito){
        $this->CODIGO=$codigo;
        $this->MENSAJE=$mensaje;
        $this->PATERNO=$paterno;
        $this->MATERNO=$materno;
        $this->NOMBRES=$nombres;
        $this->RESPONSABLES=$responsables;
        $this->DNI=$dni;
        $this->CELULAR=$celular;
        $this->FIJO=$fijo;
        $this->DIRECCION=$direccion;
        $this->DISTRITO=$distrito;
    }
    
    public function BUSCAR($codiho) {
        $cone=new CONECTION();
        $cone->CONECT();
        $clico=new Cliente();
        $queryset=  mysql_query("select * from cliente where codigo=".$codiho);
        if($queryset){
            while ($row = mysql_fetch_array($queryset)) {
                $clico->setDATA($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);
            }
        }  else {
            echo 'NO SE ENCONTRO NINGUN REGISTRO';    
        }
        $cone->CLOSE();
        unset($cone);
        return $clico;
    }
    
    
    public function ListClientePersonalizado($usuario) {
        $CONE=new CONECTION();
        $CONE->CONECT();
        $listar=  mysql_query('
            select 
            c.codigo,c.mensaje,CONCAT(c.paterno," ",c.materno,", ",c.nombres) as CLIENTE,
            CONCAT(p.paterno," ",p.materno,", ",p.nombres) as ASESOR_RESPONSABLE,
            c.dni,c.celular,c.fijo,CONCAT(c.direccion," distrito de ",dis.distrito) as DOMICILIO
            from cliente c
            inner join persona p
            on c.responsable=p.codigo
            inner join distritos_lima dis
            on c.distrito=dis.codigo
            where responsable='.$usuario.';'
        ) or die(mysql_error());
        $CONE->CLOSE();
        unset($CONE);
        return $listar;
    }
    
    
    
}

?>
