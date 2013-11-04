<?php
/************************************************************************
 * Program:	Awsome media machine 3
 * File:	amm3.php
 * Function:	To randomly select and display *.swf files
 * Description: -----------
 * Author(s):	Kjell-Aleksander Skogsrud <kjell@skogsrud.net> (ksk)
 * Enviroment:	Constantly changing as the server updates
 *		apache2 or higher
 * 		php4
 * 		mysql5 or higher
 * Notes:	This is the core of Awsome Media Machine
 * 
 * Revisions:	1.00	09/10/09(ksk) It was made.
 *************************************************************************/

//is there a direct request?
if(isset($_GET['id']))
{	// then use that file as the source
	$sourceFile=$_GET['id'];
	$viewType="directViews";
}
if(!is_file($MediaFolder."/".$sourceFile)) // BUT WAIT! what if the file does not exist?
{

	$viewType="randomViews"; // if it didn't we just revert to random files.
}
if($viewType==="randomViews")
{	// if not we randomize
	$numberOfFiles=0; // no files?
	if($sourceFolder = opendir($MediaFolder)) // lets open the folder and have a look
	{
		while($i = readdir($sourceFolder)) // while there are still files in the folder ...
		{
			if($i !== "." || $i !== "..") // ... and the files are not special files ...
			{
				$nameArray=explode('.',$i); 
				$fileEnding=end($nameArray);
				if($fileEnding == "swf") // if it is an swf ...
				{
					$numberOfFiles++; // ... count the file ...
					$sourceFiles[]=$i; // ... and add it to the list of files
				}
			}
		}
	}
	closedir($sourceFolder); // Close the folder when we are done
	// then we make a random number in the interval 0 -> $numberOfFiles-1
	$randomInt=rand(0,$numberOfFiles-1);
	// using this int we select the file with that number in the array
	$sourceFile=$sourceFiles[$randomInt];
}
// we then leave the world of php to make html for showing the file
?>
	<object width="<?=$FlashWidth?>" height="<?=$FlashHeight?>">
	<param name="movie" value="<?=$MediaFolder.$sourceFile?>" >
	<embed src="<?=$MediaFolder.$sourceFile?>" width="<?=$FlashWidth?>" height="<?=$FlashHeight?>">
	</embed>
	</object>
<?php
// back in the php we are gonna tie up things by updating the database with statistics
if($EnableStatistics) // If the config file says so that is ...
{
	if(mysql_num_rows(mysql_query("SELECT * FROM`".$MySQLTable."`WHERE`fileName`='".$sourceFile."';"))>0) // is the flash present in the table?
	{ // if it is, then we update the viewcounter
		$updateSuccess=mysql_query("UPDATE `".$MySQLTable."` SET `".$viewType."`=`".$viewType."`+1,`lastSeen`=NOW(),`lastSeenBy`='".$_SERVER['REMOTE_ADDR']."' WHERE `fileName`='".$sourceFile."' LIMIT 1;");
	}
	else
	{ // if it's not we add it wit first and last date...
		$insertSuccess=mysql_query("INSERT INTO `".$MySQLTable."` (`id`,`fileName`,`randomViews`,`directViews`,`firstSeen`,`lastSeen`,`lastSeenBy`,`fileDescription` ) VALUES(NULL,'".$sourceFile."','0','0',NOW(),NOW(),'".$_SERVER['REMOTE_ADDR']."', NULL );");
	 // then update the view counter
		$insertUpdateSuccess=mysql_query("UPDATE `".$MySQLTable."` SET `".$viewType."`=`".$viewType."`+1, `lastSeen`=NOW(), `lastSeenBy`='".$_SERVER['REMOTE_ADDR']."' WHERE `fileName`='".$sourceFile."' LIMIT 1;");
	}
	if(!$updateSuccess || !$insertSuccess || !$insertUpdateSuccess) // a quick test to see that any sql operation was successfull
		echo mysql_error(); // and an error if something failed.
}
?>
