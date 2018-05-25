<?php
session_start();
function toDate($ts) {
	$ts=$ts/1000;
	return  date('Y-m-d H:i:s',$ts);
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
<style>
.post {
	width:400px;
	margin:0 auto;
	padding:20px;
}
.post .author { font-size:10px; }
.post .timestamp { font-size:10px; }

</style>
<center><a href="post.php">Post</a></center>
<?php
$v=shell_exec("cat /var/www/backend/keys/" . $_SESSION['login'] . " |grep -v \\#");
//$v=file_get_contents("/var/www/backend/keys/" . $_SESSION['login']);
$r=json_decode($v);
//echo $r->id;
$v= shell_exec("/usr/local/bin/sbot feed 2>&1");
$v="[" . str_replace("}\n\n{","}\n,\n{",$v) . "]";
$v=json_decode($v,true);

foreach ($v as $post) {
	echo "<!--";
	print_r($post);
	echo "-->";
	?>
	<div class="post">
	<span class="author"><b>Author:</b><span><?=$post['value']['author']?></span></span><br />
	<span class="timestamp"><span><?=toDate($post['value']['timestamp'])?></span></span><br />
	<hr />
	<?php
	switch  ($post['value']['content']['type']){
		case "contact":
			echo "Following " . $post['value']['content']['contact'];
			break;
		case "about":
			echo "Self Identified as " . $post['value']['content']['name'];
			break;
		case "post":
			echo  $post['value']['content']['text'];
			break;
		default:
		print_r($post);
	}
	?>

	</div>
<?php } ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
