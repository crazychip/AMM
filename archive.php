<?php
// Standard includes for all pages
require "functions.inc.php";
require "config.php";
?>
<html>
<head>
<title><?=$SiteName?></title>
<link rel="stylesheet" href="<?=$StyleSheet?>" type="text/css" />
</head>
<body>
<?php
// Setting up the table. 
?>
<table>
<tr><td>Name</td></tr>
<?php
if ($handle= opendir($MediaFolder))
{
	while (false !== ($file = readdir($handle)))
	{
		if ($file != "." && $file != "..")
		{
			$files[]=$file;
		}
	}
	closedir($handle);
}
sort($files);
foreach ( $files as $f)
{
	$current=$f;
	echo '<tr><td><a href="http://'.$SiteAddress.'/?id='.$current.'">'.$current.'</a></td></tr>';
}
?>
</body>
</html>
