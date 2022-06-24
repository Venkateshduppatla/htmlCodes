function display(number)
{
	document.getElementById('textBox').value = document.getElementById('textBox').value + number;
}

function calculate()
{
	document.getElementById('textBox').value = eval(document.getElementById('textBox').value);
}


function clearScreen(number)
{
	document.getElementById('textBox').value = "";
}


