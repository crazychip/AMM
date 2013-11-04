<?php
// General.
$SiteName='FEZT.BIZ - Awsome Media Machine!';
$SiteAddress='www.domain.com/folder';     // The address of your site. (www.exsample.com/somefolder/someotherfolder
$FlashWidth='800';	// The maximum width of the Flash window, in px
$FlashHeight='600';	// The maximum height of the Flash window, in px
$MediaFolder='media/';	// The path to the mediafolder(relativ to where AMM is included)
//$MediaFolder='fezt-media/';	// The path to the mediafolder(relativ to where AMM is included)


//MySQL
$MySQLServer='localhost';       
$MySQLUser='user1';             //change this
$MySQLPass='FCFpu3eAGyH2w7Tc';  //and this
$MySQLDB='user1_database';      //and this
$MySQLTable='amm3_stats';       

// Stats
$EnableStatistics=false;		//require MySQL
$DefaultSort='fileName';	// Valid types: (fileName, randomViews, firstSeen, lastSeen)
$DefaultSortType='ASC';		// Valis types: (ASC, DESC)

// Include seasonal changes?
$StyleSheet="css.css";

/**************** NO EDITIN BEYOND THIS POINT ***************************/
// it's always nice to know how many files we have.
$listOfFiles=scandir($MediaFolder);
$howManyFiles=count($listOfFiles)-2; 
?>
