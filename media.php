<?php
/************************************************************************
 * Program:     Awsome media machine
 * File:	media.php
 * Function:	display all the media in the archive with handy sort function.
 * Description:
 * Author(s):   Kjell-Aleksander Skogsrud <kjell@skogsrud.net> (ksk)
 * Enviroment:  Constantly changing as the server updates. But basicly
 *		apache2 or higher
 *		php4
 *		mysql5 or higher
 * Notes:
 *
 * Revisions:   1.00    15/12/08(ksk) It was made.( Actually copied from stats.php) 
 *			- Displays a list og all the files in the archive, sorted.
 *			- Each filename is a link to the index page with id=$FileName 
 *
 ************************************************************************/
require "functions.inc.php";
require "config.php";
mysql_con($mysql_server,$mysql_user,$mysql_pass,$mysql_db);
?>
<html>
<head><title><?=$SiteName?> - Media Archive</title></head>
<link rel="stylesheet" href="css.css" type="text/css">
<body>
<div class="left">
<table border="1" >
<?php
switch($_GET['type']){
case 'ASC':
	$SortType='ASC';
	$SortSwitch='DESC';
	break;
case 'DESC':
	$SortType='DESC';
	$SortSwitch='ASC';
	break;
default:
	$SortType='ASC';
	$SortSwitch='DESC';
	break;
}
?>
<tr><th><a href="media.php?type=<?=$SortSwitch?>">Name</a></th></tr>
<?php
$folder="./media";
if ($handle = opendir($folder)) {
   while (false !== ($file = readdir($handle))) {
       if ($file != "." && $file != "..") {
		$test=explode('.',$file);
		$slutt=end($test);
		if ($slutt == "swf"){ 
			$filer[]=$file;
		}
       }
   }
   closedir($handle);
}
switch($SortType){
case 'DESC':
	sort($filer);
	break;
case 'ASC':
	rsort($filer);
	break;
}
//echo mysql_error();
foreach($filer as $f){
	?><tr><td align="right"><a href="index.php?id=<?=$f?>"><?=$f?></a></td></tr><?php
}	
?>
</table>
</div>
</body>
</html>
