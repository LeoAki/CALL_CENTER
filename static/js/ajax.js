function objetoAjax(){
        var xmlhttp=false;
        try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
                try {
                   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                        xmlhttp = false;
                }
        }

        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
                xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
}

function ajaxveamos(code,paterno,materno,nombres,dni,sexo,email,ingreso,salida,usuario,contrasena,nivel,estado){
        divResultadoo = document.getElementById('msj');
        ajax=objetoAjax();
        ajax.open("GET", "procesa1.php?code="+code+"&pat="+paterno+"&mat="+materno+"&nom="+nombres+"&dni="+dni+"&sex="+sexo+"&ema="+email+"&ing="+ingreso+"&sal="+salida+"&usu="+usuario+"&cont="+contrasena+"&niv="+nivel+"&est="+estado);
        ajax.onreadystatechange=function(){
            if (ajax.readyState==4) {
                       divResultadoo.innerHTML = ajax.responseText
               }else{
                   document.getElementById('msj').innerHTML='Cargando...Cargando...Cargando...Cargando...Cargando...';
               }
        }
        ajax.send(null);
}

function ajaxdelet(code){
        divResultadoo = document.getElementById('divmain');
        ajax=objetoAjax();
        ajax.open("GET", "procesa2.php?codigo="+code);
        ajax.onreadystatechange=function(){
            if (ajax.readyState==4) {
                       divResultadoo.innerHTML = ajax.responseText
               }else{
                   document.getElementById('divmain').innerHTML='Cargando...Cargando...Cargando...Cargando...Cargando...';
               }
        }
        ajax.send(null);
}

function ajaxcli(code,mensaje,paterno,materno,nombres,dni,responsable,celular,fijo,direccion,distrito){
        divResultadoo = document.getElementById('msj');
        ajax=objetoAjax();
        ajax.open("GET", "procesa4.php?code="+code+"&msn="+mensaje+"&pat="+paterno+"&mat="+materno+"&nom="+nombres+"&dni="+dni+"&resp="+responsable+"&cel="+celular+"&fijo="+fijo+"&dire="+direccion+"&distrito="+distrito);
        ajax.onreadystatechange=function(){
            if (ajax.readyState==4) {
                       divResultadoo.innerHTML = ajax.responseText
               }else{
                   document.getElementById('msj').innerHTML='Cargando...Cargando...Cargando...Cargando...Cargando...';
               }
        }
        ajax.send(null);
}
function ajaxdeletcli(code){
        divResultadoo = document.getElementById('divmain');
        ajax=objetoAjax();
        ajax.open("GET", "procesa5.php?codigo="+code);
        ajax.onreadystatechange=function(){
            if (ajax.readyState==4) {
                       divResultadoo.innerHTML = ajax.responseText
               }else{
                   document.getElementById('divmain').innerHTML='Cargando...Cargando...Cargando...Cargando...Cargando...';
               }
        }
        ajax.send(null);
}
function ajaxllamada(codigo,idcliente,idusario,idestado,descripcion){
    divResultadoo = document.getElementById('divajax');
    ajax=objetoAjax();
    ajax.open("GET", "procesa8.php?codigo="+codigo+"&idcliente="+idcliente+"&idusuario="+idusario+"&idestado="+idestado+"&descripcion="+descripcion);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
                   divResultadoo.innerHTML = ajax.responseText
           }else{
               document.getElementById('divajax').innerHTML='Cargando...Cargando...Cargando...Cargando...Cargando...';
           }
    }
    ajax.send(null);
}
function ventaefectuada(codigo,paterno,materno,nombres,dni,fechanac,domicilio,distrito,referencia,email,celreferencia,plan,vendedor){
    divResultadoo = document.getElementById('msj');
    ajax=objetoAjax();
    ajax.open("GET", "procesa9.php?codigo="+codigo+"&paterno="+paterno+"&materno="+materno+"&nombres="+nombres+"&dni="+dni+"&fechanac="+fechanac+"&domicilio="+domicilio+"&distrito="+distrito+"&referencia="+referencia+"&email="+email+"&cel="+celreferencia+"&plan="+plan+"&vendedor="+vendedor);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4) {
                   divResultadoo.innerHTML = ajax.responseText
           }else{
               document.getElementById('msj').innerHTML='...Cargando...';
           }
    }
    ajax.send(null);
}