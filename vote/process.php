<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT votenum FROM num WHERE id=2");
$row = mysqli_fetch_assoc($result);
//echo htmlspecialchars($row['votenum']);
$plusone = ++$row['votenum'];
//echo $plusone;

$sql = "UPDATE num SET votenum = '.$plusone.' WHERE num.id = 2;";
$result = mysqli_query($conn, $sql);
header('Location: http://localhost/vote/index.php');
?>