<?php
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
