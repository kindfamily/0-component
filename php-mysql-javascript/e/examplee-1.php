<?php // sqltest_mdb2.php

// Note: This example is different to the one in the book. It has
//       been amended to work correctly when deleting entries.

require_once 'login.php';
require_once 'MDB2.php';

$dsn = "mysql://$db_username:$db_password@$db_hostname/$db_database";
$options = array('debug' => 2);
$mdb2 = MDB2::connect($dsn,$options);

if (PEAR::isError($mdb2))
	die("Unable to connect to MySQL: " . $mdb2->getMessage());

if (isset($_POST['delete']) && isset($_POST['isbn']))
{
	$isbn  = get_post('isbn');
	$query = "DELETE FROM classics WHERE isbn='$isbn'";

		if (!$mdb2->query($query))	
		echo "DELETE failed: $query<br />" .
		mysql_error() . "<br /><br />";
}

if (isset($_POST['author']) &&
	isset($_POST['title']) &&
	isset($_POST['category']) &&
	isset($_POST['year']) &&
	isset($_POST['isbn']))
{
	$author   = get_post('author');
	$title    = get_post('title');
	$category = get_post('category');
	$year     = get_post('year');
	$isbn     = get_post('isbn');

	$query = "INSERT INTO classics VALUES" .
	"('$author', '$title', '$category', '$year', '$isbn')";

	if (!$mdb2->query($query))
		echo "INSERT failed: $query<br />" .
		$mdb2->getMessage() . "<br /><br />";
}

echo <<<_END
<form action="sqltest_mdb2.php" method="post"><pre>
  Author <input type="text" name="author" />
   Title <input type="text" name="title"/ >
Category <input type="text" name="category" />
    Year <input type="text" name="year" />
    ISBN <input type="text" name="isbn" />
         <input type="submit" value="ADD RECORD" />
</pre></form>
_END;

$query = "SELECT * FROM classics";
$result = $mdb2->query($query);

if (!$result) 	die ("Database access failed: " . $mdb2->getMessage());
$rows = $result->numRows();

for ($j = 0 ; $j < $rows ; ++$j)
{
	$row = $result->fetchRow();
	echo <<<_END
<pre>
  Author $row[0]
   Title $row[1]
Category $row[2]
    Year $row[3]
    ISBN $row[4]
</pre>
<form action="sqltest_mdb2.php" method="post">
<input type="hidden" name="delete" value="yes" />
<input type="hidden" name="isbn" value="$row[4]" />
<input type="submit" value="DELETE RECORD" /></form>
_END;
}

$mdb2->disconnect();

function get_post($var)
{
	return mysql_real_escape_string(@$_POST[$var]);
}
?>
