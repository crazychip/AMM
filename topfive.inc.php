<?php
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
