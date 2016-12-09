<?php
function funct(&$a)
{
	$a = 1;
	return $a;
}
$a = 2;
funct($a);
echo $a;
?>