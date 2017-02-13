<?php
$names = array();
assertTrue(sizeof($names) == 0);
$names[] = 'Bob';
assertTrue(sizeof($names) == 1);

function assertTrue($condition)
{
	if (!$condition) throw new Exception('Assertion failed.');
}
?>
