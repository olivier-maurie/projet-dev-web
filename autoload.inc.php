<?php
function __autoload ($nomClasse)
{
	require_once "../classes/" . $nomClasse . ".class.php";
}
?>