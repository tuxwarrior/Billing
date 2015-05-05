<?php
/*$usuario=$_POST["usuario"];
$contra_normal=$_POST["password"];*/

$auth = $_COOKIE['autorization'];
header("Cache-control:no-cache");
if(!$auth == "ok"){
    header("Location:index.php");
    exit();
}
?>
<html>
<head> <title>Entro</title> </head>
<body>
	<p>Successful log-in.</p>
</form>
</body>
</html>



