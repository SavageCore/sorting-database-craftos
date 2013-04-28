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

$query = "SELECT process FROM " . $conf['db_full'] . " WHERE id = '" . $mc_id . "' AND meta= '" . $mc_meta . "'";
$result = $mysqli->query($query);

if($result->num_rows > 0){
	$row = $result->fetch_assoc();
	if($row['process'] == 1){
		echo "true";
	} else {
		echo "false";
	}
}

$result->free();
$mysqli->close();
?>
