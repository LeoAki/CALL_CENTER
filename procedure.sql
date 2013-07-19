DROP PROCEDURE `Sp_Personas`//
DELIMITER $$
CREATE PROCEDURE `Sp_Personas`(
in acodigo int(11),
in apaterno varchar(50),
in amaterno varchar(50),
in anombres varchar(100),
in adni char(8),
in asexo char(1),
in aemail varchar(100),
in ainicio date,
in afin date,
in ausuario varchar(25),
in acontrasena varchar(32),
in anivel int(4),
in aestado int(1),
in aultimasesion datetime
)
if exists( select * from Persona where codigo=acodigo) then
	update Persona
	set
	paterno=apaterno,
	materno=amaterno,
	nombres=anombres,
	dni=adni,
	sexo=asexo,
	email=aemail,
    inicio=ainicio,
    fin=afin,
    usuario=ausuario,
    contrasena=acontrasena,
    nivel=anivel,
    estado=aestado,
    ultimasesion=aultimasesion
	where
	codigo=acodigo;
else
	insert into Persona
	(paterno,materno,nombres,dni,sexo,email,inicio,fin,usuario,contrasena,nivel,estado,ultimasesion)
	values
	(apaterno,amaterno,anombres,adni,asexo,aemail,ainicio,afin,ausuario,acontrasena,anivel,aestado,aultimasesion);
end if $$
DELIMITER ;

create table distritos_lima(
codigo int(11) primary key AUTO_INCREMENT,
distrito varchar(100)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

create table Cliente(
codigo int(11) AUTO_INCREMENT,
mensaje varchar(100) not null,
paterno varchar(100) not null,
materno varchar(100) not null,
nombres varchar(100) not null,
responsable  int(11) not null,
dni char(8),
fecha_nac date,
celular varchar(100),
fijo varchar(100),
direccion varchar(100),
email varchar(100),
distrito int(11),
primary key (codigo),
foreign key (distrito) REFERENCES distritos_lima(codigo) ON DELETE CASCADE,
foreign key (responsable) REFERENCES Persona(codigo) ON DELETE CASCADE
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

DELIMITER $$
CREATE PROCEDURE `Sp_Cliente`(
in acodigo int(11),
in amensaje varchar(100),
in apaterno varchar(100),
in amaterno varchar(100),
in anombres varchar(100),
in aresponsable int(11),
in adni char(8),
in afecha_nac date,
in acelular varchar(100),
in afijo varchar(100),
in adireccion varchar(100),
in aemail varchar(100),
in adistrito int(11)
)
if exists( select * from Cliente where codigo=acodigo) then
	update Cliente
	set
	mensaje=amensaje,
	paterno=apaterno,
	materno=amaterno,
	nombres=anombres,
	responsable=aresponsable,
	dni=adni,
	fecha_nac=afecha_nac,
	celular=acelular,
    fijo=afijo,
    direccion=adireccion,
    email=aemail,
    distrito=adistrito
	where
	codigo=acodigo;
else
	insert into Cliente
	(mensaje,paterno,materno,nombres,responsable,dni,fecha_nac,celular,fijo,direccion,email,distrito)
	values
	(amensaje,apaterno,amaterno,anombres,aresponsable,adni,afecha_nac,acelular,afijo,adireccion,aemail,adistrito);
end if $$
DELIMITER ;