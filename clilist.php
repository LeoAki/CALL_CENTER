<?php 
require_once './class/Cliente.php';
$clirte= new Cliente();
?>
<div style="width: 95%; text-align: justify">
    <h2>Lista De Clientes</h2>    
    <table class="table-hover" width="100%">
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
            <th class="text-center">UPDATE</th>
            <th class="text-center">ELIMINAR</th>
        </tr>
        </thead>
        <tbody>
<?php
$listcli=$clirte->ListCliente();
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
            <td class='text-center'><a href='procesa6.php?code=$row21[0]'>ACTUALIZAR <i class='icon-edit'></i></a></td>
            <td class='text-center'><a onclick='DOIT($row21[0])'>BORRAR <i class='icon-trash'></i></a></td>                
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
            <th class="text-center">UPDATE</th>
            <th class="text-center">ELIMINAR</th>
        </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript" src="static/js/ajax.js"></script>
<script type="text/javascript">
    function DOIT(valueinn){
        eliminar=confirm("¿Desea eliminar este registro?");
        if(eliminar){
            ajaxdeletcli(valueinn);
            alert('Registro eliminado correctamente');
            location.reload();
        }
    }
    
</script>