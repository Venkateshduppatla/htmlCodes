<?php
require_once 'connection.php';

$sql = "REPLACE INTO bankcustomers VALUES('". $_GET['accountNumber'] . "', '" . $_GET['name'] . "','" . $_GET['balance'] . "', 'O');";
$result = $conn->query($sql);
// echo "<tr><td>". $sql. "</td></tr>";

?>







