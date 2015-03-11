<?php
function __autoload ($nomClasse)
{
	require_once "/Classes/" . $nomClasse . ".class.php";
}
?>