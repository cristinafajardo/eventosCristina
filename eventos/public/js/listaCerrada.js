//ESCONDE EL BOTON DE AGREGAR INVITADO EN EDITAREVENTO.BLADE
function cerrado()
{
	if (document.getElementById('listaCerrada').checked == true)//lista cerrada
	{	
		document.getElementById('+invitado').style.display="none";//esconde boton de agregar invitado
		document.getElementById('cuentas').style.display="";//muestra lista de opciones "cuentas"
	}
	else //lista abierta
	{
		document.getElementById('+invitado').style.display="";//muestra boton para agregar invitados
		document.getElementById('cuentas').style.display="none";//esconde lista de "cuentas"
	}
}

function llevaItem(id,nombre)
{
	document.getElementById('nombreArticulo').defaultValue=nombre;
	document.getElementById('cantidadArticulo').defaultValue=id;

}