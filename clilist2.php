<?php
session_start();
require_once './class/Cliente.php';
$clirte= new Cliente();
?>
<div style="width: 95%; text-align: justify">
    <h2>Lista De Clientes</h2>    
    <table class="table" width="100%">
        <thead>
        <tr style="color: #FA5882">
            <th class="text-center">CODIGO</th>
            <th class="text-center">MENSAJE</th>
            <th class="text-center">CLIENTE</th>
            <th class="text-center">ASESOR_RESPONSABLE</th>
            <th class="text-center">DNI</th>
            <th class="text-center">CELULAR</th>
            <th class="text-center">FIJO</th>
            <th class="text-center">DOMICILIO</th>
            <th class="text-center">LLAMAR</th>
        </tr>
        </thead>
        <tbody>
<?php
$listcli=$clirte->ListClientePersonalizado($_SESSION['codigo']);
while ($row21 = mysql_fetch_array($listcli)) {
    echo "
        <tr>
            <td class='text-center'>$row21[0]</td>
            <td>$row21[1]</td>
            <td>$row21[2]</td>
            <td class='text-center'>$row21[3]</td>
            <td class='text-center'>$row21[4]</td>
            <td class='text-center'>$row21[5]</td>
            <td>$row21[6]</td>
            <td>$row21[7]</td>
            <td class='text-center'><a TARGET='_blank' href='procesa7.php?codecli=$row21[0]'><i class='icon icon-bullhorn'></i> SEND</a></td>
        </tr>
        ";
}
?>
        </tbody>
        <tfoot>
        <tr style="color: #FA5882">
            <th class="text-center">CODIGO</th>
            <th class="text-center">MENSAJE</th>
            <th class="text-center">CLIENTE</th>
            <th class="text-center">ASESOR_RESPONSABLE</th>
            <th class="text-center">DNI</th>
            <th class="text-center">CELULAR</th>
            <th class="text-center">FIJO</th>
            <th class="text-center">DOMICILIO</th>
            <th class="text-center">LLAMAR</th>
        </tr>
        </tfoot>
    </table>
</div>