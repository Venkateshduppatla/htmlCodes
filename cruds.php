<?php
$servername = "165.22.14.77";
$username = "venkatesh";
$password = "pwdvenkatesh";
$dbname = "dbVenkatesh";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['displayButton'])) 
{
	$sql = "SELECT * FROM bankcustomers;";

	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
	    echo "<tr><th>Account Number </th><th> Customer Name</th><th> Balance</th></tr>";
	    while($row = $result->fetch_assoc())
	    {
	        echo "<tr><td>". $row["accountNumber"]. "</td><td>". $row["name"]. "</td><td>". $row["balance"]."</td><td>";
	        $dom = new DOMDocument();

			$btn = $dom->createElement('button', "Delete");
			$domAttribute = $dom->createAttribute('onclick');
			$domAttribute->value = "$('#outputData').load('cruds.php?accountNumber=" . $row["accountNumber"]. "&deleteButton=deleteButton');";
			$btn->appendChild($domAttribute);
			$dom->appendChild($btn);
			echo $dom->saveXML();
			echo "</td></tr>"
		}
	} 
	else 
	{
	  echo "0 results";
	}
}

if (isset($_GET['saveButton']))
{

	$sql = "REPLACE INTO bankcustomers VALUES('". $_GET['accountNumber'] . "', '" . $_GET['name'] . "','" . $_GET['balance'] . "', 'O');";
	// $sql = "INSERT INTO bankcustomers VALUES('". $_GET['accountNumber'] . "', '" . $_GET['name'] . "','" . $_GET['balance'] . "', 'O') ON DUPLICATE KEY name = '". $_GET['name'] . "', balance = '". $_GET['balance'] . "';";
	echo $sql;

	$result = $conn->query($sql);
}

if (isset($_GET['searchButton']))
{
	$sql = "SELECT * FROM bankcustomers WHERE accountNumber = '" . $_GET['accountNumber'] . "'";
	echo $sql;

	$result = $conn->query($sql);

	if ($result->num_rows > 0)
	{
	    echo "<tr><th>Account Number </th><th> Customer Name </th><th> Balance</th></tr>";
	    while($row = $result->fetch_assoc())
	    {
	        echo "<tr><td>". $row["accountNumber"]. "</td><td>". $row["name"]. "</td><td>". $row["balance"]."</td></tr>";
		}
	}
	else
	{
		echo "0 results";
	}
}

// if (isset($_GET['updateButton']))
// {
// 	echo "<tr><td>update</tr></td>";
// 	$sql = "UPDATE bankcustomers SET name = '" . $_GET['name'] . "', balance = '" . $_GET['balance'] . "' WHERE accountNumber = '" . $_GET['newAccountNumber'] . "'";
// 	echo $sql;

// 	$result = $conn->query($sql);
// }

if (isset($_GET['deleteButton']))
{
	$sql= "DELETE FROM bankcustomers WHERE accountNumber = '" . $_GET['accountNumber'] . "'";
	echo "<tr><td>". $sql ."</tr></td>";
	$result = $conn->query($sql);
}

$conn->close();
?>




<!-- 
// $servername = "165.22.14.77";
// $username = "venkatesh";
// $password = "pwdvenkatesh";
// $dbname = "dbVenkatesh";
// $itemId1 = $_GET['itemId'];
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error)
// {
//   die("Connection failed: " . $conn->connect_error);
// }

// else if ()
// {	
// 	$sql = "SELECT * FROM bankcustomers;";

// 	$result = $conn->query($sql);

// 	if ($result->num_rows > 0)
// 	{
// 	    echo "<tr><th>Account Number</th><th>Customer Name</th><th>Balance</th></tr>";
// 	    while($row = $result->fetch_assoc())
// 	    {
// 	        echo "<tr><td>". $row["accountNumber"]. "</td><td>". $row["name"]. "</td><td>". $row["balance"]."</td></tr>";
// 		}
// 	} 
// 	else 
// 	{
// 	  echo "0 results";
// 	}
// }
// $conn->close();
?>
 -->

