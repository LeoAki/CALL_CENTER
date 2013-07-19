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
    private $USUARIO;
    private $CONTRASENA;
    private $NIVEL;
    private $ESTADO;
    private $ULTIMASESION;

    public function getUSUARIO() {
        return $this->USUARIO;
    }

    public function setUSUARIO($USUARIO) {
        $this->USUARIO = $USUARIO;
    }

    public function getCONTRASENA() {
        return $this->CONTRASENA;
    }

    public function setCONTRASENA($CONTRASENA) {
        $this->CONTRASENA = $CONTRASENA;
    }

    public function getNIVEL() {
        return $this->NIVEL;
    }

    public function setNIVEL($NIVEL) {
        $this->NIVEL = $NIVEL;
    }

    public function getESTADO() {
        return $this->ESTADO;
    }

    public function setESTADO($ESTADO) {
        $this->ESTADO = $ESTADO;
    }

    public function getULTIMASESION() {
        return $this->ULTIMASESION;
    }

    public function setULTIMASESION($ULTIMASESION) {
        $this->ULTIMASESION = $ULTIMASESION;
    }

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
                                      '".$this->DNI."','".$this->SEXO."','".$this->EMAIL."','".$this->INICIO."',
                                      '".$this->FIN."','".$this->USUARIO."','".$this->CONTRASENA."','".$this->NIVEL."','".$this->ESTADO."',
                                      '".$this->ULTIMASESION."' )") or
                die(mysql_error());
        $this->CLOSE();
    }catch(Exception $exception){
        echo 'Ups!, lo sentimos ocurrio el siguiente error: '.$exception;
    }}
    
    ##funcion que valida al usuario y contrasena
        public function Validar($usuario,$password) {
        $value=0;
        try {
            $this->CONECT();
            $resulset=mysql_query("select * from  persona
                Where usuario='$usuario' and contrasena='$password';");
            if($resulset){
                $value=mysql_num_rows($resulset);
                if($value > 0){
                    while ($row = mysql_fetch_array($resulset)) {
                        $this->CODIGO=$row[0];                        $this->PATERNO=$row[1];
                        $this->MATERNO=$row[2];                        $this->NOMBRES=$row[3];
                        $this->DNI=$row[4];                        $this->SEXO=$row[5];
                        $this->EMAIL=$row[6];                        $this->INICIO=$row[7];
                        $this->FIN=$row[8];                        $this->USUARIO=$row[9];
                        $this->CONTRASENA=$row[10];                        $this->NIVEL=$row[11];
                        $this->ESTADO=$row[12];                        $this->ULTIMASESION=$row[13];
                    }
                    unset ($resulset);
                }
            }
            unset ($resulset);
        } catch (Exception $exc) {
            echo "Ups!, lo sentimos ocurrio el siguiente error: " . $exc;
        }
        $this->CLOSE();
        return $value;
    }

    public function SESIONBEGIN($usuario){
        try {
            $this->CONECT();
            $fecha= date("Y-m-d H:i:s");
            mysql_query("Update persona set ultimasesion='".$fecha."' where codigo ='".$usuario."'") or die(mysql_error());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->CLOSE();
    }
    
    public function INPUT($usuario){
        try {
            $this->CONECT();
            $fecha= date("Y-m-d H:i:s");
            mysql_query("
                Insert into user_history(usuario,mensaje,descripcion) values('$usuario','INGRESO AL SISTEMA','$fecha');"
                ) or die(mysql_error());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->CLOSE();
    }

    public function LOGOUT($usuario){
        try {
            $this->CONECT();
            $fecha= date("Y-m-d H:i:s");
            mysql_query("
                Insert into user_history(usuario,mensaje,descripcion) values('$usuario','SALIDA DEL SISTEMA','$fecha');"
                ) or die(mysql_error());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->CLOSE();
    }
    
    public function Ingresos($usuario) {
        $con= new Conection();
        $con->CONECT();
        $viewinput=mysql_query("
            SELECT  
                    uh.codigo,
                    CONCAT(pe.paterno,' ',pe.materno,' ,',pe.nombres) as USER,
                    uh.mensaje,
                    uh.descripcion
            FROM user_history uh
            inner join persona pe on pe.codigo=uh.usuario
            ORDER BY uh.codigo DESC;
            "
        );
        $con->CLOSE();
        return $viewinput;
    }
    
    public function QUIENES($dni) {
        $coneccion= new Conection();
        $coneccion->CONECT();
        $consulta=  mysql_query("Select * from persona where codigo='".$dni."';");
        unset($coneccion);
        return $consulta;
    }
    
    public function setDATA($codigo,$paterno,$materno,$nombres,$dni,$sexo,$email,$inicio,$fin,$usuario,$contrasena,$nivel,$estado,$ultimasesion){
        $this->CODIGO=$codigo;
        $this->PATERNO=$paterno;
        $this->MATERNO=$materno;
        $this->NOMBRES=$nombres;
        $this->DNI=$dni;
        $this->SEXO=$sexo;
        $this->EMAIL=$email;
        $this->INICIO=$inicio;
        $this->FIN=$fin;
        $this->USUARIO=$usuario;
        $this->CONTRASENA=$contrasena;
        $this->NIVEL=$nivel;
        $this->ESTADO=$estado;
        $this->ULTIMASESION=$ultimasesion;
    }
    
    public function BUSCAR($codigo) {
        $conectar=new Conection();
        $conectar->CONECT();
        $PERSONA= new Persona();
        $query=  mysql_query("select * from persona where codigo=".$codigo);
        if($query){
            while ($row = mysql_fetch_array($query)) {
                $PERSONA->setDATA($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13]);
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
           codigo,paterno,materno,nombres,dni,sexo,email,inicio,fin,usuario,contrasena,
           if(nivel=1,'ADMINISTRADOR','VENDEDOR'),
           if(estado=1,'ACTIVO','DESACTIVADO'),ultimasesion
           from persona order by codigo;");
       $cone->CLOSE();
       unset($cone);
       return $resultado;
    }
    
    public function ELIMINO($code){
        try {
            $this->CONECT();
            mysql_query("DELETE FROM `CALL_CENTER`.`persona` WHERE `persona`.`codigo` = $code;") or die(mysql_error());
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->CLOSE();
    }

    
}

?>
