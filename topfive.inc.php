<?php
/************************************************************************
 * Program:     Awsome media machine
 * File:	topfive.inc.php
 * Function:	display the top five direct views 
 * Description:
 * Author(s):   Kjell-Aleksander Skogsrud <kjell@skogsrud.net> (ksk)
 * Notes:
 *
 * Revisions:   1.00    xx/xx/xx(ksk) It was made. 
 *
 ************************************************************************/

echo "<table>";
echo '<tr><td colspan=3 >The direct score:</td></tr>';
$c=1;
foreach(directScore() as $i)
{
	echo '<tr><td>'.$c.'</td><td><a href="index.php?id='.$i.'">'.$i.'</a></td><td>'.directViews($i).'</td></tr>';
	$c++;
	if($c>5)
		break;
}
?>
<tr><td colspan=2 align="center"><a href="stats.php" title="Show complete score">more</a></td></tr>
</table>
