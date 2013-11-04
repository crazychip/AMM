
<?php
/************************************************************************
 * Program:     Awsome media machine
 * File:	archive.php
 * Function:	display a list of all media files.
 * Description:
 * Author(s):   Kjell-Aleksander Skogsrud <kjell@skogsrud.net> (ksk)
 *
 * Revisions:   1.00   20/01/11(ksk) It was made. 
 *
 ************************************************************************/
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
	echo '<tr><td><a href="http://www.fezt.biz/?id='.$current.'">'.$current.'</a></td></tr>';
}
?>
</body>
</html>
