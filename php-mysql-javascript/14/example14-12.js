<script>
test()

if (isset(a)) document.write('a = "' + a + '"<br />')
if (isset(b)) document.write('b = "' + b + '"<br />')
if (isset(c)) document.write('c = "' + c + '"<br />')

function test()
{
	    a = 123
	var b = 456
	if (a == 123) var c = 789
}

function isset(varname)
{
	return typeof varname != 'undefined'
}
</script>
