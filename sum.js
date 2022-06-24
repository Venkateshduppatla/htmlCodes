function sum()
{
	var number1 = document.getElementById("number1").value;
	var number2 = document.getElementById("number2").value;
	var sum = parseInt(number1) + parseInt(number2);
	alert("Sum of " + number1 + " and " + number2 + " is " + sum);

	console.log("Sum of " + number1 + " and " + number2 + " is " + sum);
}