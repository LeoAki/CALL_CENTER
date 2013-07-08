<?php
/**
 * Description of Persona
 *
 * @author aquino
 */
require_once 'CONECTION.php';
class Persona extends Conection{
    
    private $CODIGO;
    private $PATERNO;
    private $MATERNO;
    private $NOMBRES;
    private $DNI;
    private $SEXO;
    private $EMAIL;
    private $INICIO;
    private $FIN;


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

    public function getSEXO() {
        return $this->SEXO;
    }

    public function setSEXO($SEXO) {
        $this->SEXO = $SEXO;
    }

    public function getEMAIL() {
        return $this->EMAIL;
    }

    public function setEMAIL($EMAIL) {
        $this->EMAIL = $EMAIL;
    }

    public function getINICIO() {
        return $this->INICIO;
    }

    public function setINICIO($INICIO) {
        $this->INICIO = $INICIO;
    }

    public function getFIN() {
        return $this->FIN;
    }

    public function setFIN($FIN) {
        $this->FIN = $FIN;
    }

    public function GRABAR() {
    try {
        $this->CONECT();
        mysql_query("Call Sp_Personas('".$this->CODIGO."','".$this->PATERNO."','".$this->MATERNO."','".$this->NOMBRES."',
                                      '".$this->DNI."','".$this->SEXO."','".$this->EMAIL."','".$this->INICIO."','".$this->FIN."'    )") or die(mysql_error());
        $this->CLOSE();
    }catch(Exception $exception){
        echo 'Ups!, lo sentimos ocurrio el siguiente error: '.$exception;
    }}
    
    public function setDATA($codigo,$paterno,$materno,$nombres,$dni,$sexo,$email,$inicio,$fin){
        $this->CODIGO=$codigo;
        $this->PATERNO=$paterno;
        $this->MATERNO=$materno;
        $this->NOMBRES=$nombres;
        $this->DNI=$dni;
        $this->SEXO=$sexo;
        $this->EMAIL=$email;
        $this->INICIO=$inicio;
        $this->FIN=$fin;
    }
    
    public function BUSCAR($codigo) {
        $conectar=new Conection();
        $conectar->CONECT();
        $PERSONA= new Persona();
        $query=  mysql_query("select * from Persona where codigo=".$codigo);
        if($query){
            while ($row = mysql_fetch_array($query)) {
                $PERSONA->setDATA($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
            }
        }  else {
            echo 'NO SE ENCONTRO NINGUN REGISTRO';
        }
        $conectar->CLOSE();
        unset($conectar);
        return $PERSONA;
    }
    
    public function Listar() {
        $cone=new Conection();
       $cone->CONECT();
       $resultado= mysql_query("
           select
           per.codigo,
           per.paterno,per.materno,per.nombres,
           per.dni,
           per.email,
           per.inicio,
           per.fin,
           user.usuario,
           if(user.nivel=1,'ADMIN','VENDEDOR') as NIVEL
           from Persona per
           inner join Usuario user
           on per.codigo=user.idpersona;");
       $cone->CLOSE();
       unset($cone);
       return $resultado;
    }

    
}

?>
