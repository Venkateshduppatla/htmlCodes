<?php
require_once 'connection.php';

$sql= "DELETE FROM bankcustomers WHERE accountNumber = '" . $_GET['accountNumber'] . "'";
	// echo "<tr><td>". $sql ."</tr></td>";
	$result = $conn->query($sql);

?>
