<?php
$names = array();
echo sizeof($names) == 0 ? "OK<br />" : "Not OK<br />";
$names[] = 'Bob';
echo sizeof($names) == 1 ? "OK<br />" : "Not OK<br />";
?>