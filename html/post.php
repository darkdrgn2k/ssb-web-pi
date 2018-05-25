<?php
session_start();
if (isset($_POST['post'])) {
	$l=$_SESSION['login'];
	$p=$_POST['post'];
//echo             ("nodejs /var/www/backend/post.js $l \"$p\"");
        shell_exec ("nodejs /var/www/backend/post.js $l \"$p\" 2>&1");
header("location: view.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="TopMenu">
<ul>
<li><a href="/"><img src="images/SSB-logo.png" width="45" height="45" /></a></li>
<?php if (isset($_SESSION['login'])) { ?>
<li><a href="/view.php">View</a></li>
<li><a href="/post.php">Post</a></li>
<?php } else { ?>
<li><a href="/login.php">Login</a></li>
<li><a href="/create.php">Create</a></li>
<?php } ?>

</ul>
</div>
<!-- InstanceBeginEditable name="Body" -->
<center><h1>Submit SSB Post</h1></center>
<div style="width:400px; margin:0 auto">
<form method="post">
<textarea name="post" cols="80" rows="10"></textarea><br />
<input  type="submit" value="Post">
</form>
</div>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
