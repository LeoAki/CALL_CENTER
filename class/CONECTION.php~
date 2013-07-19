<?php
/**
 * Description of CONECTION
 *
 * @author aquino
 */
class CONECTION {
    private $SERVER;
    private $BD;
    private $USER;
    private $PASS;
    private $CONECCION;

    public function CONECT() {
        $this->SERVER="localhost";
        $this->BD="CALL_CENTER";
        $this->PASS="lncc";
        $this->USER="root";
        $this->CONECCION=mysql_connect($this->SERVER, $this->USER, $this->PASS) or
                die (mysql_error());
        mysql_query("SET NAME 'utf8'");
        mysql_select_db($this->BD,  $this->CONECCION) or die (mysql_error());
        return $this->CONECCION;
    }

    public function CLOSE() {
        mysql_close($this->CONECCION) or die (mysql_error());
    }

    public function DESTROY() {
        session_destroy();
    }

    public function CONSULT($consulta) {
        return mysql_query($consulta);
    }
}
?>
