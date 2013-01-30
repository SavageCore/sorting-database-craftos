<?php
/*
 * Copyright © 2013 SavageCore <talk@savagecore.eu>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See http://www.wtfpl.net/ for more details.
 */
	$conf['db_hostname'] = 'localhost'; /* Database hostname */
	$conf['db_username'] = "savagecore"; /* Database username */
	$conf['db_password'] = ""; /* Database password */
	$conf['db_port'] = 3306; /* Database port */
	$conf['db_socket'] = ""; /* Database socket */
	$conf['db_name'] = "savagecore"; /* Database name */
	$conf['db_tname'] = "items"; /* Table name */
	$conf['db_prefix'] = "mc"; /* Database prefix */
	$conf['debug'] = true; /* Output Mysql error messages plus other messages such as incorrect password */
	$conf['password'] = '';
	/* Random string as a sort of password
	 * Needs to be supplied with all GET requests
	 * https://www.grc.com/passwords.htm */

	/* DO NOT EDIT BELOW */
	$conf['db_full'] = $conf['db_prefix'] . '_' . $conf['db_tname'];
	$mysqli = new mysqli($conf['db_hostname'], $conf['db_username'], $conf['db_password'], "", $conf['db_port'], $conf['db_socket']);
	$mysqli->select_db($conf['db_name']);
	if($conf['debug'] === true) error_reporting(E_ALL);
?>
