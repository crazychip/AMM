<?php
session_start();
require "functions.inc.php";
require "config.php";
mysql_con($MySQLServer,$MySQLUser,$MySQLPass,$MySQLDB);

if (isset($_GET['id'])){
        if(!isset($_SESSION['prev_id']) || $_SESSION['prev_id']!=$_GET['id']){
                $_SESSION['prev_id'] = $_GET['id'];
        } else {
                unset($_SESSION['prev_id']);
                header('Location: index.php');
                exit;
        }
}


?>
<html>
<head>
<title><?=$SiteName?></title>
<link rel="stylesheet" href="<?=$StyleSheet?>" type="text/css" />
<meta property="og:title" content="View flash NOW!" />
<meta property="og:description" content="IT'S PARTY TIEM!" />
<meta property="og:image" content="http://www.fezt.biz/fezt.png" />
</head>
<body>
<!-- Outer Table, it is invisible and centers the content table -->
<table border=0  height="100%" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="middle"> 
<!-- The inner table, also invisible, but holds content -->
<table border=0>
<tr> <!-- Top row  -->
<td colspan=4 align="center"> <!-- is everywhere  -->
<?php
echo '<h1>Hit F5 for more</h1>';
?>
</td>
</tr>
<tr> <!-- Second row, has three colums  -->
<td> <!-- first colum -->
&nbsp;
</td>
<td colspan=2> <!-- second colum -->
<?php include 'amm.inc.php'; ?>
</td>
<td valign="bottom"> <!-- three colum -->
</td>
</tr>
<tr>
<td width=20%>
&nbsp;
</td>
<td>
This is <a href="index.php?id=<?=$sourceFile?>"><?=$sourceFile?></a><br/>
It has been shown at random <?=randomViews($sourceFile)?> times,<br/>
and linked directly <?=directViews($sourceFile)?> times.
</td>
<td>
Since the stats started, the page has shown <?=randomViews()?> random flashes,<br/>
and <?=directViews()?> directly linked. There is <?=$howManyFiles?> in the <a href="archive.php">archive</a>.<br/>
A total of <?=totalViews()?> flashes have been shown.
</td>
<td width=20%>
&nbsp;
</td>
</tr>
<tr>
<td width=20%>
&nbsp;
</td>
<td align="middle" colspan=2>
</br>
</td>
<td width=20%>
&nbsp;
</td>
</tr>
</table>
</body>
</html>
