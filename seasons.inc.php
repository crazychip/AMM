<?php
$seasonGraphics="seasons/";

$sD = Array(
	"default" => Array(
		"topleft"       => FALSE,
		"topright"      => FALSE,
		"bottomleft"    => FALSE,
		"bottomright"   => FALSE,
		"css"		=> "../css.css"
	),
	"xmas" => Array(
		"topleft"	=> FALSE,
		"topright"	=> FALSE,
		"bottomleft"	=> "xmas-anime-left.png",
		"bottomright"	=> "xmas-anime-right.png",
		"css"		=> "css.css"
	),
	"fall" => Array(
		"topleft"       => FALSE,
                "topright"      => FALSE,
                "bottomleft"    => "fall_test.png",
                "bottomright"   => FALSE,
                "css"           => "fall.css"
	),
	"halloween" => Array(
		"topleft"       => FALSE,
                "topright"      => FALSE,
                "bottomleft"    => "Halloween.png",
                "bottomright"   => FALSE,
                "css"           => "css.css"
	)
);
$sS = Array(
	"January"	=> $sD['default'],
	"February"	=> $sD['default'],
	"March"		=> $sD['default'],
	"April"		=> $sD['default'],
	"May"		=> $sD['default'],
	"June"		=> $sD['default'],
	"July"		=> $sD['default'],
	"August"	=> $sD['default'],
	"September"	=> $sD['default'],
	"October"	=> $sD['halloween'],
	"November"	=> $sD['default'],
	"December"	=> $sD['xmas']
);
//adding graphics
$now=date('F');
//echo $now;
//$now='December';
$sG=$seasonGraphics;
if($sS[$now]['css'])
{
	$StyleSheet=$sG.$sS[$now]['css'];
}
if($sS[$now]['bottomright'])
	echo '<img class="absbtmright" src="'.$sG.$sS[$now]['bottomright'].'" />';
if($sS[$now]['bottomleft'])
	echo '<img class="absbtmleft" src="'.$sG.$sS[$now]['bottomleft'].'" />';
if($sS[$now]['topright'])
	echo '<img class="abstopright" src="<'.$sG.$sS[$now]['topright'].'" />';
if($sS[$now]['topleft'])
	echo '<img class="abstopleft" src="'.$sG.$sS[$now]['topleft'].'" />';
?>
