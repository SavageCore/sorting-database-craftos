<?php
/*
 * Copyright © 2013 SavageCore <talk@savagecore.eu>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See http://www.wtfpl.net/ for more details.
 *
 * Valid modes are insert and extract
 * Inputs are id, meta  (Yo dawg...), name, short, uuid, amount
 */
require('config.php');
// Check if password is set
if($_GET['password'] != '' and $_GET['password'] == $conf['password']){
		//if mode is Ticker no GETs required
		if($_GET['mode'] == 'insert' or $_GET['mode'] == 'extract' or $_GET['mode'] == 'update'){
			//Sanitize id,meta,amount $_GET's as they are used in most modes and declare global for use elsewhere
			global $mc_id;
			global $mc_meta;
			global $mc_amount;
			if(is_numeric($_GET['id'])){
					$mc_id = $mysqli->real_escape_string($_GET['id']);
			} else {
					exit("id not numeric or missing!");
			}
			if(is_numeric($_GET['meta'])){
					$mc_meta = $mysqli->real_escape_string($_GET['meta']);
			} else {
					exit("meta not numeric or missing!");
			}
			if(is_numeric($_GET['amount'])){
					$mc_amount = $mysqli->real_escape_string($_GET['amount']);
			} else {
					exit("amount not numeric or missing!");
			}
		}
	switch($_GET['mode']){
		case 'insert':
			global $mc_name;
			global $mc_short;
			global $mc_uuid;
			if(($_GET['name'])){
				$mc_name = $mysqli->real_escape_string($_GET['name']);
			} else {
				exit("name not set!");
			}
			if(($_GET['short'])){
				$mc_short = $mysqli->real_escape_string($_GET['short']);
			} else {
				exit("short not set!");
			}
			if(is_numeric($_GET['uuid'])){
					$mc_uuid = $mysqli->real_escape_string($_GET['uuid']);
			} else {
					exit("uuid not numeric or missing!");
			}
			//index.php?mode=insert&id=35&meta=1&name=Orange%20wool&short=OWOL&uuid=668292100&amount=2&password=
			require_once('db/insert.php');
			break;
		case 'extract':
			//index.php?mode=extract&id=35&meta=1&amount=2&password=
			require_once('db/extract.php');
			break;
		case 'update':
			//index.php?mode=update&id=4&meta=0&amount=2&password=
			require_once('db/update.php');
			break;
		case 'ticker':
			//pretty = true displays jQuery sortable table (for humans) and calling index.html wraps it in html
			//index.html?mode=ticker&pretty=true&password=
			//
			//pretty = false plain text (for CraftOS) does not call html file so no css etc.
			//index.php?mode=ticker&pretty=false&limit=0,1&password=
			if(isset($_GET['limit'])){
				global $mc_ticklimit;
				$mc_ticklimit = $mysqli->real_escape_string($_GET['limit']);
			}
			require_once('ticker.php');
			break;
	}
} elseif ($conf['debug'] === true) {
	echo 'Password incorrect/missing.';
}
?>