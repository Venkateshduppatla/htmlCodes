function test(argument)
	{
		alert("Hi "+ document.getElementById('userName'));
		var textBoxes = document.getElementsByTagName('text');
		for(var i = 0; i < 3; i++)
		{
			alert(textBoxes[i].value);
			consloe.log(textBoxes[i].value)
		}
	}