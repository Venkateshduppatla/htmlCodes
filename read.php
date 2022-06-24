<?php
require_once 'connection.php';

$sql = "SELECT * FROM bankcustomers;";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    echo "<tr><th>Account Number </th><th> Customer Name</th><th> Balance</th></tr>";
    while($row = $result->fetch_assoc())
    {
        echo "<tr><td>". $row["accountNumber"]. "</td><td>". $row["name"]. "</td><td>". $row["balance"]."</td><td>";
        $dom = new DOMDocument();
		$btn = $dom->createElement('button');
		$sybAttribute = $dom->createAttribute('class');
		$sybAttribute->value = "glyphicon glyphicon-trash";
		$domAttribute = $dom->createAttribute('onclick');
		$domAttribute->value = "javascript:(function () 
		{
			if(confirm('Do you want to delete the record')== true){
			$('#outputData1').load('delete.php?accountNumber=" . $row["accountNumber"]. "');$('#outputData').load('read.php');}})();";
		$btn->appendChild($domAttribute);
		$btn->appendChild($sybAttribute);
		$dom->appendChild($btn);
		echo $dom->saveXML();
		echo "</td><td>";
		
        $dom = new DOMDocument();
		$sybAttribute = $dom->createAttribute('class');
		$sybAttribute->value = "glyphicon glyphicon-pencil";
		$btn = $dom->createElement('button');
		$domAttribute = $dom->createAttribute('onclick');
		$domAttribute->value = "javascript:(function () 
		{
			$('#accountNumber').val('" . $row["accountNumber"] . "')
			$('#name').val('" . $row["name"] . "')
			$('#balance').val('" . $row["balance"] . "')

		})();";
		$btn->appendChild($domAttribute);
		$btn->appendChild($sybAttribute);
		$dom->appendChild($btn);
		echo $dom->saveXML();
		echo "</td></tr>";
	}
}
else 
{
  echo "0 results";
}

?>



