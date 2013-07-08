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
                <th class="text-center">EMAIL</th>
                <th class="text-center">INICIO</th>
                <th class="text-center">FIN</th>
                <th class="text-center">USER</th>
                <th class="text-center">NIVEL DE USUARIO</th>
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
            </tr>
    ";
}
?>
        </tbody>
    </table>
</div>
