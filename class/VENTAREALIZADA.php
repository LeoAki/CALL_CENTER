<?php
require_once 'CONECTION.php';
class VENTAREALIZADA extends CONECTION{
    
    private $CODIGO;
    private $PATERNO;
    private $MATERNO;
    private $NOMBRES;
    private $DNI;
    private $FECHA_NAC;
    private $DOMICILIO;
    private $DISTRITO;
    private $REFERENCIA;
    private $MAIL;
    private $CELULAR_REFERENCIA;
    private $PLAN;
    private $VENDEDOR;
    
    public function getCODIGO() {
        return $this->CODIGO;
    }

    public function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
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

    public function getDNI() {
        return $this->DNI;
    }

    public function setDNI($DNI) {
        $this->DNI = $DNI;
    }

    public function getFECHA_NAC() {
        return $this->FECHA_NAC;
    }

    public function setFECHA_NAC($FECHA_NAC) {
        $this->FECHA_NAC = $FECHA_NAC;
    }

    public function getDOMICILIO() {
        return $this->DOMICILIO;
    }

    public function setDOMICILIO($DOMICILIO) {
        $this->DOMICILIO = $DOMICILIO;
    }

    public function getDISTRITO() {
        return $this->DISTRITO;
    }

    public function setDISTRITO($DISTRITO) {
        $this->DISTRITO = $DISTRITO;
    }

    public function getREFERENCIA() {
        return $this->REFERENCIA;
    }

    public function setREFERENCIA($REFERENCIA) {
        $this->REFERENCIA = $REFERENCIA;
    }

    public function getMAIL() {
        return $this->MAIL;
    }

    public function setMAIL($MAIL) {
        $this->MAIL = $MAIL;
    }

    public function getCELULAR_REFERENCIA() {
        return $this->CELULAR_REFERENCIA;
    }

    public function setCELULAR_REFERENCIA($CELULAR_REFERENCIA) {
        $this->CELULAR_REFERENCIA = $CELULAR_REFERENCIA;
    }

    public function getPLAN() {
        return $this->PLAN;
    }

    public function setPLAN($PLAN) {
        $this->PLAN = $PLAN;
    }

    public function getVENDEDOR() {
        return $this->VENDEDOR;
    }

    public function setVENDEDOR($VENDEDOR) {
        $this->VENDEDOR = $VENDEDOR;
    }
    
    public function Grabar() {
        try {
            $this->CONECT();
            mysql_query("
                CALL Sp_venta
               ('".$this->CODIGO."','".$this->PATERNO."','".$this->MATERNO."','$this->NOMBRES','".$this->DNI."',
                '".$this->FECHA_NAC."','".$this->DOMICILIO."','".$this->DISTRITO."','".$this->REFERENCIA."','".$this->MAIL."',
                '".$this->CELULAR_REFERENCIA."','".$this->PLAN."','".$this->VENDEDOR."');")
                or die(mysql_error());
            $this->CLOSE();
        }catch (Exception $exc) {
            echo 'Ups!, lo sentimos ocurrio el siguiente error: '.$exc->getTraceAsString();
        }
    }
    
    public function LISTARVENTAS($codigo) {
        $cone= new CONECTION();
        $cone->CONECT();
        $lista= mysql_query("
            select 
            venta.codigo,
            CONCAT(venta.paterno, ' ',venta.materno,' ,', venta.nombres) as CLIENTE,
            venta.dni,
            venta.fecha_nac,
            CONCAT(venta.domicilo,' del distrito de ',dis.distrito) as DIRECCION,
            venta.referencia,
            venta.mail,
            venta.celular_referencia,
            CONCAT(pll.plan, ' DETALLE-->',pll.detalle) as PLAN,
            CONCAT(per.paterno,' ',per.materno,' ,',per.nombres) as VENDEDOR
            from
            ventarealizada venta
            inner join
            distritos_lima dis
            on venta.distrito=dis.codigo
            inner join
            planes pll
            on venta.plan=pll.codigo
            inner join persona per
            on venta.vendedor=per.codigo
            where per.codigo=$codigo;");
        $cone->CLOSE();
        unset($cone);
        return $lista;
    }


    
}

?>
