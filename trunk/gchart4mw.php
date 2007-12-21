<?php

/**
 * gchart4mw.php
 * provide tags for drawing charts the easy way using google chart API.
 * written by Dirk Festerling
 * http://code.google.com/p/gchart4mw
 * To activate the functionality of this extension include the following in your
 * LocalSettings.php file:
 * require_once('$IP/extensions/gchart4mw.php');
 */
 
/**
ToDos:
  fill-typen ausprogrammieren 
  additional graph-types
**/

if(! defined( 'MEDIAWIKI' ) ) {
  echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
  die( -1 );
} else {
  $wgExtensionCredits['parserhook'][] = array(
    'name' => 'googlechart',
    'author' =>'Dirk Festerling', 
    'url' => 'http://www.mediawiki.org/wiki/User:JDoe',
    'description' => 'this is an extension to use google charts in your wiki easily.'
    );
}

$wgExtensionFunctions[] = 'gfChartSetup';

function gfChartSetup() {
  global $wgParser;
  $wgParser->setHook( 'lines', 'gfLineRender' );
  $wgParser->setHook( 'bars', 'gfBarsRender' );
  $wgParser->setHook( 'pie', 'gfPieRender' );
}
          
// -----------------------------------------------------------------------------
function gfArgsDebug ( $args ) {
  $attr = array();    
  // make a list of attributes and their values and dump them, along with the user input
  foreach( $args as $name => $value )
    $attr[] = '<strong>' . htmlspecialchars( $name ) . '</strong> = ' . htmlspecialchars( $value );
  $rslt = implode( '<br />', $attr ) . "<br />";

  return $rslt;
}

// -----------------------------------------------------------------------------
function gfArgsParseCommon ( $args) {
  // parses all the parameters common to all types of charts
  $rslt = '<img src="http://chart.apis.google.com/chart?t';
  
  $size="200x120";
  
  foreach( $args as $name => $value ) {
    switch ($name) {
      case "size":
        $size = $value;
        break;
      case "title":
        $rslt = $rslt . "&chtt=" . implode("+",explode(" ",$value));
        break;
      case "colors":
        $rslt = $rslt . "&chco=" . $value;
        break;
      case "fill":
        $rslt = $rslt . "&chf=" . $value;
        break;
    }
  }
  
  $rslt = $rslt . "&chs=" . $size;
  
  return $rslt;
}

// -----------------------------------------------------------------------------
function gfArgsParseLine ( $args ) {
  // parses all additional parameters for line charts 
  $rslt = "&cht=lc";  
  return $rslt;
}
 
function gfArgsParseBars ( $args ) {
  // parses all additional parameters for Bar charts
  if ($args["horizontal"] != ""){
    $rslt = "&cht=bh";
  } else {
    $rslt = "&cht=bv";
  }
  
  if ($args["stacked"] != "") {
    $rslt = $rslt . "s";
  } else {
    $rslt = $rslt . "g";
  }
  return $rslt;
}
 
function gfArgsParsePie ( $args ) {
  // parses all additional parameters for Pie charts
  $rslt = "&cht=p";

  if ($args["3d"] != "") {
    $rslt = $rslt . "3";
  }
  
  return $rslt;
}

function gfArgsParseScatter ( $args ) {
  // parses all additional parameters for Scatter charts
  
  // ToDo
}
 
function gfArgsParseVenn ( $args ) {
  // parses all additional parameters for Venn charts

  // ToDo
}
 
// -----------------------------------------------------------------------------
function gfInputParseCSVCommon ( $args,$input ) {
  // parses the common data-Settings like labels etc...
}

function gfInputParseCSV ( $args, $input, $type ) {
  // parses the input-data
  
  $fieldsep = ",";
  $hasxlabel = false;
  $hasylabel = false;
  
  foreach( $args as $name => $value ) {
    switch ($name) {
	  case "fieldsep":
	    $fieldsep = $value;
		break;
	  case "ymin":
	    $min = $value;
	    break;
	  case "ymax":
	    $max = $value;
		break;
	  case "xlabel":
	    $hasxlabel=true;
	    break;
	  case "ylabel":
	    $hasylabel=true;
	    break;
		}
  }

  $lines = explode ("\n",$input); 
  foreach($lines as $line) {
    if ($line != "") {
      $data[] = explode($fieldsep,$line);
    }
  }
  
  $xlabel = "";
  if ($hasxlabel) {
    if ($hasylabel) {
	  	$startrow = 1;
		} else {
	  	$startrow = 0;
		}
    for ($i = $startrow; $i < count($data); $i++) {
      if ($xlabel != "") $xlabel = $xlabel . "|";
	  	$xlabel = $xlabel . $data[$i][0];
		}
    $startcol = 1;
  } else {
    $startcol = 0;
  }
  
  $ylabel = "";
  if ($hasylabel) {
    for ($i = $startcol; $i < count($data[0]); $i++) {
	  	if ($i != $startcol) $ylabel = $ylabel . "|";
	  	$ylabel = $ylabel . $data[0][$i];
		}
    $startrow = 1;
  } else {
    $startrow = 0;
  }
  
  for ($i = $startcol; $i < count($data[0]); $i++) {
    for ($j = $startrow; $j < count($data); $j++) {
      if (($min >= $data[$j][$i]) || ($min == "")) $min = $data[$j][$i];
      if ($max <= $data[$j][$i]) $max = $data[$j][$i];
		}
  }
  if ($type == "pie") $min = 0;

  $rslt = "";
  
  for ($i = $startcol; $i < count($data[0]); $i++) {
    if ($i != $startcol) $rslt = $rslt . "|";
    for ($j = $startrow; $j < count($data); $j++) {
      $value = round(($data[$j][$i]-$min) / ($max-$min) * 100,0);
      if ($value > 100) $value = -1;
      if ($j != $startrow) $rslt = $rslt . ",";
      $rslt = $rslt . $value;	
		}	
  }
  
  $rslt = "&chd=t:" . $rslt;
  
  if ($type == "pie") {
  	if ($hasxlabel) {
    	$rslt = $rslt . "&chl=" . $xlabel;
    }
  } else {
  	if ($hasxlabel) {
    	$rslt = $rslt . "&chxt=y,x&chxl=0:|" . $min . "|" . $max . "|1:|" . $xlabel;
	  } else {
  	  $rslt = $rslt . "&chxt=y&chxl=0:|" . $min . "|" . $max;
	  }
	  if ($hasylabel) {
  	  $rslt = $rslt . "&chdl=" . $ylabel;
	  }
  }

  return $rslt;
}
 
// -----------------------------------------------------------------------------
function gfLineRender( $input, $args, $parser ) {
  $retval = gfArgsDebug ($args);
  
  $retval = $retval . gfArgsParseCommon($args);
  $retval = $retval . gfArgsParseLine($args);
  $retval = $retval . gfInputParseCSV($args,$input,"line");
  $retval = $retval . '">';
  return $retval;
}

function gfBarsRender( $input, $args, $parser ) {
  $retval = gfArgsDebug ($args);
  
  $retval = $retval . gfArgsParseCommon($args);
  $retval = $retval . gfArgsParseBars($args);
  $retval = $retval . gfInputParseCSV($args,$input,"bars");
  $retval = $retval . '">';
  return $retval;
}

function gfPieRender( $input, $args, $parser ) {
  $retval = gfArgsDebug ($args);
  
  $retval = $retval . gfArgsParseCommon($args);
  $retval = $retval . gfArgsParsePie($args);
  $retval = $retval . gfInputParseCSV($args,$input,"pie");
  $retval = $retval . '">';
  return $retval;
}
