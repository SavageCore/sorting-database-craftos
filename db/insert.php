<?php
/*
 * Copyright © 2013 SavageCore <talk@savagecore.eu>
 * This work is free. You can redistribute it and/or modify it under the
 * terms of the Do What The Fuck You Want To Public License, Version 2,
 * as published by Sam Hocevar. See http://www.wtfpl.net/ for more details.
 */
	if (mysqli_connect_errno() and $conf['debug'] === true) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
	}
	$query = 'INSERT INTO ' . $conf['db_full'] . ' (id,meta,name,short,uuid,amount)';
	$query .= ' VALUES ("' . $mc_id . '","' . $mc_meta . '","' . $mc_name . '","' . $mc_short . '","' . $mc_uuid . '","' . $mc_amount . '")';
	$query .= ' ON DUPLICATE KEY UPDATE';
	$query .= ' id="' . $mc_id . '",meta="' . $mc_meta . '",name="' . $mc_name . '",short="' . $mc_short . '",uuid="' . $mc_uuid . '",amount = amount+' . $mc_amount;
	if($conf['debug'] === true) echo '<p class="warning">query = ' . $query . '</p>';
	if ($mysqli->query($query)) {
			printf("%d Row inserted.\n", $mysqli->affected_rows);
	} else {
			printf("Mysql error: %s\n", $mysqli->error);
	}
	$mysqli->close();
?>
