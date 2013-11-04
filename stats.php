
<?php
/************************************************************************
 * Program:     Awsome media machine
 * File:	stats.php
 * Function:	display statistics.
 * Description:
 * Author(s):   Kjell-Aleksander Skogsrud <kjell@skogsrud.net> (ksk)
 * Enviroment:  apache-2.2.4_2
 *              php4-4.4.7
 *              mysql-server-5.0.41
 * Notes:
 *
 * Revisions:   1.00    xx/xx/xx(ksk) It was made. 
 * 		1.01	07/12/07(ksk) changes to implemet config.php
 * 		2.0	07/12/07(ksk) 
 * 		 - Now supports the use of config.php
 * 		 - A Stylesheet was added to make it look more like index.php
 * 		 - Sort by cliking on the table headers
 * 		 - Deletes file entrys in the database if the corresponding
 * 		   filename is no longer found in the media folder
 *		2.01	16.12.07(ksk) Will now disable when $UseStats=false;(change in v3 to EnableStatistics)
 *		3.0	20.01.11(ksk) Has been totaly mangled by the move to v3.
 *			But still retain basic functonality.
 *			With the changes to the stat system it does not show all flashes
 *			anymore, but only those that have a direct score of one or more.
 *			The page does however include a link to a list of all flashes.
 *
 ************************************************************************/
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
