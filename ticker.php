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

$query = "SELECT id, meta, name, short, uuid, amount FROM " . $conf['db_full'] . " WHERE process != '1' ORDER by name";
if(isset($mc_ticklimit)) $query .= " LIMIT $mc_ticklimit";
$result = $mysqli->query($query);

switch($_GET['pretty']){
	case 'true':
		echo '<h1>Minecraft Item Database</h1>';
		echo '<table id="mc_ticker" class="tablesorter">' . "\n";
		echo '<thead>' . "\n";
		echo '	<tr>' . "\n";
		echo '		<th>ID</th>' . "\n";
		echo '		<th>Meta Data</th>' . "\n";
		echo '		<th>Block Name</th>' . "\n";
		echo '		<th>Short Name</th>' . "\n";
		echo '		<th>UUID</th>' . "\n";
		echo '		<th>Amount</th>' . "\n";
		echo '	</tr>' . "\n";
		echo '</thead>' . "\n";
		echo '<tbody>' . "\n";
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo '	<tr>' . "\n";
			echo '		<td>' . $row['id'] . '</td>' . "\n";
			echo '		<td>' . $row['meta'] . '</td>' . "\n";
			echo '		<td>' . $row['name'] . '</td>' . "\n";
			echo '		<td>' . $row['short'] . '</td>' . "\n";
			echo '		<td>' . $row['uuid'] . '</td>' . "\n";
			echo '		<td>' . $row['amount'] . '</td>' . "\n";
			echo '	</tr> ' . "\n";
		}
		echo '</tbody>' . "\n";
		echo '</table>' . "\n";
		echo '<p>Hold shift for multi-sort</p>';
		break;
	case 'json':
		//Press X to Jason
		//JASON.... JASON.....JAAAASSONN
		$response = array();
		if($result->num_rows > 0){
			$response["success"] = 1;
			while($row = $result->fetch_assoc()){
				$response[] = $row;
			}
		} else {
			$response["success"] = 0;
			echo 'Nothing in database';
		}
		if(phpVersion() >= 50400){
			echo json_encode($response, JSON_PRETTY_PRINT);
		} else {
			echo json_encode($response);
		}
		break;
	default:
		if($result->num_rows > 0){
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				//echo $row["id"] . ':' . $row["meta"] . '	' . $row['name'] . '	' . $row['amount'] . "|";
				echo $row['name'] . ':' . $row['amount'] . "|";
			}
		} else {
			echo 'Nothing in database';
		}
}
$result->free();
$mysqli->close();
?>
