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
	$query = "UPDATE " . $conf['db_full'] . " SET amount = amount - $mc_amount WHERE id = '" . $mc_id . "' AND meta = '" . $mc_meta . "'";
	if($conf['debug'] === true) echo '<p class="warning">query = ' . $query . '</p>';
	if ($mysqli->query($query)) {
			printf("%d Row inserted.\n", $mysqli->affected_rows);
	} elseif($conf['debug'] === true) {
			printf("Mysql error: %s\n", $mysqli->error);
	}
	$mysqli->close();
?>
