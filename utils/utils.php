<?php
function esOpcionMenuActiva(string $opcionMenu) : bool
{
	if (strpos($_SERVER['REQUEST_URI'], $opcionMenu) !== false)
		return true;

	return false;

}

function existeOpcionMenuActivaEnArray(array $opcionesMenu) : bool
{
	foreach ($opcionesMenu as $opcionMenu)
	{
		if (esOpcionMenuActiva($opcionMenu) === true)
			return true;
	}
	return false;

}

?>