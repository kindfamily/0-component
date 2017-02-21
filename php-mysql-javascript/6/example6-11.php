<?php

// This example is corrected from the one in the book,
// which had two extra blank rows in the center.

$chessboard = array(
	array('r', 'n', 'b', 'k', 'q', 'b', 'n', 'r'),
	array('p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array(' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
	array('P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'),
	array('R', 'N', 'B', 'K', 'Q', 'B', 'N', 'R'));

echo "<pre>";
foreach ($chessboard as $row)
{
	foreach ($row as $piece)
		echo "$piece ";
	echo "<br />";
}
echo "</pre>";
?>
