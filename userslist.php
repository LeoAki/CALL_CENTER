<?php
require_once 'class/Persona.php';
$persona= new Persona();
?>
<div style="width: 95%; text-align: justify">
    <h2>Lista De Usuarios</h2>
    <table class="table-hover" width="100%">
        <thead>
            <tr style="color: #FA5882">
                <th class="text-center">IDE</th>
                <th class="text-center">NOMBRE COMPLETO</th>
                <th class="text-center">DNI</th>
                <th class="text-center">SEXO</th>
                <th class="text-center">EMAIL</th>
                <th class="text-center">INICIO</th>
                <th class="text-center">FIN</th>
                <th class="text-center">USUARIO</th>
                <th class="text-center">CONTRASE&Ntilde;A</th>
                <th class="text-center">NIVEL</th>
                <th class="text-center">ESTADO</th>
                <th class="text-center">ULTIMA SESI&Oacute;N</th>
                <th class="text-center">UPDATE</th>
                <th class="text-center">ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
<?php
$retvalue=$persona->Listar();
while ($row = mysql_fetch_array($retvalue)) {
echo "
            <tr>
                <td>$row[0]</td>
                <td>$row[1] $row[2], $row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
                <td>$row[6]</td>
                <td>$row[7]</td>
                <td>$row[8]</td>
                <td>$row[9]</td>
                <td>$row[10]</td>
                <td>$row[11]</td>
                <td>$row[12]</td>
                <td>$row[13]</td>
                <td class='text-center'><a href='procesa3.php?code=$row[0]'>ACTUALIZAR <i class='icon-edit'></i></a></td>
                <td class='text-center'><a onclick='DOIT($row[0])'>BORRAR <i class='icon-trash'></i></a></td>
            </tr>
    ";
}
?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="static/js/ajax.js"></script>
<script type="text/javascript">
    function DOIT(valueinn){
        eliminar=confirm("¿Desea eliminar este registro?");
        if(eliminar){
            ajaxdelet(valueinn);
            alert('Registro eliminado correctamente');
            location.reload();
        }
    }
    
</script>