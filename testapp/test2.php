<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="scripts/javascript/jquery1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="scripts/javascript/jquery.redirect.js" type="text/javascript" charset="utf-8"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1">
	<tr>
    	<td width="30%"><table>
        	<tr>
            	<td><a href="#" onclick="test('login');">dsfsdf</a></td>
           	</tr>
            <tr>
            	<td>dsfsdf</td>
           	</tr>
    	</table></td>
         <td><table>
        	<tr>
            	<td><a href="#" onclick="test('reg');">dsfsdf</a></td>
           	</tr>
    	</table></td>  
    </tr>
</table>
</body>
</html>

<script>
function test(value){
	
	//$().redirect('index.php', {'post_var_1': 'login'});
	window.location.href='index.php?g='+value;
}
</script>
