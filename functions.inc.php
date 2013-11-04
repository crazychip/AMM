<?php
function mysql_con($mysql_server,$mysql_user,$mysql_pass,$mysql_db){
        if(mysql_connect($mysql_server,$mysql_user,$mysql_pass) && mysql_select_db($mysql_db))
                return true;
        else
                echo mysql_error();
}

// int totalViews([string file])
// returns the total views
function totalViews($file=FALSE)
{
	if(!$GLOBALS['EnableStatistics']){ return 0;}
	if($file)
	{
		$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` WHERE `fileName`='".$file."' LIMIT 1;");
	}
	else
	{
		$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` ;");
	}	
	while($i=mysql_fetch_array($sql))
	{
		$amm_stats[]=$i;
	}
	foreach($amm_stats as $row)
	{
		$totalViews=$totalViews+$row['directViews']+$row['randomViews'];
	}
	return $totalViews;
}

// int randomViews([string file])
// returns the total number of random views
// OR the random views of a spesific file if specified
function randomViews($file=FALSE)
{
	if(!$GLOBALS['EnableStatistics']){ return 0;}
	if($file)
	{
		$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` WHERE `fileName`='".$file."' LIMIT 1;");
	}
	else
	{
		$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` ;");
	}
	while($i=mysql_fetch_array($sql))
	{
			$amm_stats[]=$i;
	}
	foreach($amm_stats as $row)
	{
		$randomViews=$randomViews+$row['randomViews'];
	}
	return $randomViews;
}

// int directViews([string file])
// returns the total number of direct views 
// OR the direct views on a specific file if specified
function directViews($file=FALSE)
{
	if(!$GLOBALS['EnableStatistics']){ return 0;}
	if($file)
	{
		$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` WHERE `fileName`='".$file."' ;");
	}
	else
	{
		$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` ;");
	}
	while($i=mysql_fetch_array($sql))
	{
		$amm_stats[]=$i;
	}
	foreach($amm_stats as $row)
	{
		$directViews=$directViews+$row['directViews'];
	}
	return $directViews;
}

// string OR array directScore([int score])
// returns the file with the specified directScore
function directScore($score=FALSE)
{
	$sql=mysql_query("SELECT * FROM `".$GLOBALS['MySQLTable']."` ORDER BY `".$GLOBALS['MySQLTable']."`.`directViews` DESC ;");
	while($i=mysql_fetch_array($sql))
        {
                $amm_stats[]=$i;
	}
	if($score)
	{
		$c=1;
		foreach($amm_stats as $row)
		{
			if($c==$score)
			{
				return $row['fileName'];
			}
			$c++;
		}
	}
	else
	{
		$id=1;
		foreach($amm_stats as $row)
		{
			$scoreArray[$id]=$row['fileName'];
			$id++;
		}
		return $scoreArray;
	}
}	

// bool validFileName(string file, folder)
// Opens the folder and dertermin if there is a file whit that particular name.
// if there is TRUE else false.
function validFileName($qFile, $qFolder)
{
	$return = FALSE; // we assume that the file is not there at first.
	if($folder = opendir($qFolder)) // can we open the folder?
	{
		while($i = readdir($qFolder)) // if we could lets read all the file inside.
		{
			if($i !== "." || $i !== "..") // we dont include special files
			{
				$nameArray=explode('.',$i); // blow up the file...
				$fileEnding=end($nameArray); // ... get the ending...
				if($fileEnding == "swf") // ... and have a look wheter it was a swf or not.
				{
					if($i==$qFile) // now if the file name we are curently looking at matches the one we want to find
					{
						$return=TRUE; // the file was actualy there :)
						break;
					}
				}
			}
		}
	}
	return $return; // we give the return
}




?>
