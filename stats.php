<?php
// Standard includes for all pages
require "functions.inc.php";
require "config.php";

// If stats are enabled lets move on. If not DIE!
if(!$EnableStatistics){
	die("Stats are disabled!");
}

mysql_con($MySQLServer,$MySQLUser,$MySQLPass,$MySQLDB); // connecting ot MySQL
?>
<html>
<head>
<title><?=$SiteName?></title>
<link rel="stylesheet" href="<?=$StyleSheet?>" type="text/css" />
</head>
<body>
<?php
// Setting up the stats table. 
echo "<table>";
echo '<tr><td>Score</td><td>Name</td><td>Views</td></tr>';
$c=1;
foreach(directScore() as $i)
{	
	if(directViews($i)>0){
		echo "<tr><td>".$c."</td><td>".$i."</td><td>".directViews($i)."</td></tr>";
	}
	$c++;

}
?>
</body>
</html>
