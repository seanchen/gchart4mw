<?php

/**
 * Example.php
 * This extension does...
 * written by John Doe
 * http://www.johndoe.com/
 * To activate the functionality of this extension include the following in your
 * LocalSettings.php file:
 * require_once('$IP/extensions/Example.php');
 */
 
/**
ToDos:
  legend - mehrere Parameter durch "|" getrennt (explode / implode)
  colors - mehrere Parameter durch "," getrennt (explode / implode)
  fill-typen ausprogrammieren
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
  $wgParser->setHook( 'linechart', 'gfLineRender' );
}
          
// -----------------------------------------------------------------------------
function gfArgsDebug ( $args ) {
  $attr = array();    
  // This time, make a list of attributes and their values,
  // and dump them, along with the user input
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
      case "legend":
        $rslt = $rslt . "&chdl=" . $value;
        break;
    }
  }
  
  $rslt = $rslt . "&chs=" . $size;
  
  return $rslt;
}

function gfArgsParseLine ( $args ) {
  // parses all additional parameters for line charts
  
  $rslt = "&cht=lc";
  
  return $rslt;
}
 
function gfArgsParseScatter ( $args ) {
  // parses all additional parameters for Scatter charts
}
 
function gfArgsParseBar ( $args ) {
  // parses all additional parameters for Bar charts
}
 
function gfArgsParseVenn ( $args ) {
  // parses all additional parameters for Venn charts
}
 
function gfArgsParsePie ( $args ) {
  // parses all additional parameters for Pie charts
}

// -----------------------------------------------------------------------------

// -----------------------------------------------------------------------------
function gfInputParseCSVCommon ( $args,$input) {
  // parses the common data-Settings like labels etc...
}

function gfInputParseCSVLine ( $args, $input) {
  // parses the input-data
  
  $fieldsep = ",";
  
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
  
  $xlabel = array();
  foreach( $lines as $line ) {
    if ($line != "") {
      $data = explode ($fieldsep,$line);
	  reset ($data);
	  $i = 0;
	  do {
	    $field = current($data);
	
	    if ($hasxlabel) {
	      $xlabel[] = $field;
	      $field = next($data);
	    }
	    $datasets[][$i] = $field;
  	    $i = $i + 1;
	  }
	  while (next($data) != false);
    }
  }
  
  foreach ($datasets as $dataset) {  
    foreach( $dataset as $data ) {
	  if ($data!= "") {
	    if (($min >= $data)||($min == "")) $min = $data;
	    if ($max <= $data) $max = $data;	
      }
    }
  }
  
  $rslt = "";
  foreach ($datasets as $dataset) {  
    if ($rslt != "") $rslt = $rslt . "|";
	
    foreach( $dataset as $data ) {
      if ($data = "") $value = -1;
      $value = round(($data-$min) / ($max-$min) * 100,0);
      if ($value > 100) $value = -1;
      if ($rslt != "") $rslt = $rslt . ",";
      $rslt = $rslt . $value;	
    }
	
  }
  
  $rslt = "&chd=t:" . $rslt;
  
  if (($hasxlabel)&&($hasylabel)) {
    $rslt = $rslt . "&chxt=yx&chxl=0:|" . $min . "|" . $max . "|1:";
	foreach ($xlabel as $label) $rslt = $rslt . "|" . $label;
  }
  if (($hasxlabel)&&!($hasylabel)) {
    $rslt = $rslt . "&chxt=yx&chxl=0:|";
	foreach ($xlabel as $label) $rslt = $rslt . "|" . $label;
  }
  if (!($hasxlabel)&&($hasylabel)) {
    $rslt = $rslt . "&chxt=y&chxl=0:|" . $min . "|" . $max;
  }
  
  return $rslt;
}
 
// -----------------------------------------------------------------------------
function gfLineRender( $input, $args, $parser ) {
  $retval = gfArgsDebug ($args);
  
  $retval = $retval . gfArgsParseCommon($args);
  $retval = $retval . gfArgsParseLine($args);
  $retval = $retval . gfInputParseCSVLine($args,$input);
  $retval = $retval . '">';
  return $retval;
}