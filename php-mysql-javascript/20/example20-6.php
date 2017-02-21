<?php // rnsignup.php (YUI version)
include_once 'rnheader.php';

echo <<<_END
<script src="yahoo-min.js"></script> 
<script src="event-min.js"></script> 
<script src="connection-min.js"></script>
<script>
function checkUser(user)
{
	if (user.value == '')
	{
		document.getElementById('info').innerHTML = ''
		return
	}

	params   = "user=" + user.value
	callback = { success:successHandler, failure:failureHandler }
	request  = YAHOO.util.Connect.asyncRequest('POST',
		'rncheckuser.php', callback, params);
}

function successHandler(o)
{
	document.getElementById('info').innerHTML = o.responseText;
}

function failureHandler(o)
{ 
	document.getElementById('info').innerHTML =
		o.status + " " + o.statusText;
}

</script>
<h3>Sign up Form</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	
	if ($user == "" || $pass == "")
	{
		$error = "Not all fields were entered<br /><br />";
	}
	else
	{
		$query = "SELECT * FROM rnmembers WHERE user='$user'";
		
		if (mysql_num_rows(queryMysql($query)))
		{
			$error = "That username already exists<br /><br />";
		}
		else
		{
			$query = "INSERT INTO rnmembers VALUES('$user', '$pass')";
			queryMysql($query);
		}
		
		die("<h4>Account created</h4>Please Log in.");
	}
}

echo <<<_END
<form method='post' action='rnsignup.php'>$error
Username <input type='text' maxlength='16' name='user' value='$user'
	onBlur='checkUser(this)'/><span id='info'></span><br />
Password <input type='text' maxlength='16' name='pass'
	value='$pass' /><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type='submit' value='Signup' />
</form>
_END;
?>
