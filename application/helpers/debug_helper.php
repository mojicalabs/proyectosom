<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');
/**
 * Modular Extensions - PHP4
 *
 * Debug Helper
 *
 * Install this file as application/helpers/debug_helper.php
 *
 * Load or autoload as required.
 *
 * @version: 4.2.06 (c) Wiredesignz 2008-07-19
 */

function dlog($str) {
	global $log_counter;
	if ($log_counter) {
		$log_counter++;
	}
	if (gettype($str) == 'object') {
		$str = print_r($str, true);
	}
	publish('ci.client.log', ' ####### ' . $log_counter . ' ' . $str);
	log_message('INFO', ' ####### ' . $str);
}

/**
 * Debug
 *
 * Lists object_vars for an object
 **/
function debug($_this) {
	if (is_object($_this)) {
		echo '<pre>[', get_class($_this), ' Object] => ', print_r(array_keys(get_object_vars($_this)), TRUE), '</pre>';
	}
}

/**
 * Debug_in
 *
 * Dumps an object or array
 **/
function debug_in($_this) {
	if (is_object($_this)) {
		echo '<pre>[', get_class($_this), ' Object] => Array</pre>' . "\n";
		foreach (get_object_vars($_this) as $key) {
			debug($key);
		}
	}

	if (is_array($_this)) {
		echo '<pre>', print_r($_this, TRUE), '</pre>';
	}
}

function test($obj = null, $label = null, $die = false) {
	if (!$label) {
		$label = '';
	}
	if (!$obj) {
		echo '<hr><U><B>TESTING...</B></U> <BR>';
	}
	if (gettype($obj) != 'string') {
		echo '<hr><U><B>DUMPING: ' . $label . '</B></U> <BR>';
		echo '<I>Type: ' . gettype($obj) . '</I><br>';
		//var_dump($obj);
		echo '<pre>';
		echo htmlentities(print_r($obj, true));
		echo '</pre>';
	} else
		if (gettype($obj) == 'boolean') {
			echo '<hr><U><B>TESTING: ' . $label . '</B></U> <BR>';
			echo '<I>Type: ' . gettype($obj) . '</I><br>';
			echo $obj ? 'TRUE' : 'FALSE';
		} else {
			echo '<hr><U><B>TESTING: ' . $label . '</B></U> <BR>';
			echo '<I>Type: ' . gettype($obj) . '</I><br>';
			echo $obj;
		}
	echo '<hr>';
	if ($die) {
		die('End of test');
	}
	if (ob_get_length() && ob_get_length() > 0) {
		ob_flush();
	}
}


function testin($obj = null, $label = null, $die = false) {
	if (!$label) {
		$label = '';
	}
	$resin = "";
	if (!$obj) {
		$resin = $resin . '<hr><U><B>TESTING...</B></U> <BR>';
	}
	if (gettype($obj) != 'string') {
		$resin = $resin .  '<hr><U><B>DUMPING: ' . $label . '</B></U> <BR>';
		$resin = $resin .  '<I>Type: ' . gettype($obj) . '</I><br>';
		//var_dump($obj);
		$resin = $resin .  '<pre>';
		$resin = $resin .  htmlentities(print_r($obj, true));
		$resin = $resin .  '</pre>';
	} else
		if (gettype($obj) == 'boolean') {
			$resin = $resin .  '<hr><U><B>TESTING: ' . $label . '</B></U> <BR>';
			$resin = $resin .  '<I>Type: ' . gettype($obj) . '</I><br>';
			$resin = $resin .  $obj ? 'TRUE' : 'FALSE';
		} else {
			$resin = $resin .  '<hr><U><B>TESTING: ' . $label . '</B></U> <BR>';
			$resin = $resin .  '<I>Type: ' . gettype($obj) . '</I><br>';
			$resin = $resin .  $obj;
		}
	$resin = $resin .  '<hr>';
	if ($die) {
		die('End of test');
	}
	if (ob_get_length() && ob_get_length() > 0) {
		ob_flush();
	}
	return $resin;
}