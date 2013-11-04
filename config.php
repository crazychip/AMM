<?php
// General.
$SiteName='FEZT.BIZ - Awsome Media Machine!';
$FlashWidth='800';	// The maximum width of the Flash window, in px
$FlashHeight='600';	// The maximum height of the Flash window, in px
$MediaFolder='media/';	// The path to the mediafolder(relativ to where AMM is included)
//$MediaFolder='fezt-media/';	// The path to the mediafolder(relativ to where AMM is included)


//MySQL
$MySQLServer='localhost';       
$MySQLUser='fezt';             //change this
$MySQLPass='H8cMhtKPLdTcw4sd';  //and this
$MySQLDB='fezt';      //and this
$MySQLTable='amm_stats';       

// Stats
$EnableStatistics=true;		//require MySQL
$DefaultSort='fileName';	// Valid types: (fileName, randomViews, firstSeen, lastSeen)
$DefaultSortType='ASC';		// Valis types: (ASC, DESC)

// Include seasonal changes?
$StyleSheet="css.css";

/**************** NO EDITIN BEYOND THIS POINT ***************************/
// it's always nice to know how many files we have.
$listOfFiles=scandir($MediaFolder);
$howManyFiles=count($listOfFiles)-2; 

?>
