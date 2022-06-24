
function addNames()
{
	// const namesList = [];
	var showName = localStorage.getItem('names');
	var namesList= JSON.parse(showName);
	namesList.push(document.getElementById('name').value);
	localStorage.setItem('names', JSON.stringify(namesList));
	document.getElementById('name').value = "";
	createAndLoadTable();
}


function createAndLoadTable() 
{
	var showName = localStorage.getItem('names');
	var namesList= JSON.parse(showName);
	const table = document.createElement('table');
	var row = table.insertRow();
	var headerCell = document.createElement("TH");
	headerCell.innerHTML = "List";
	row.appendChild(headerCell);

	let namesCount = namesList.length;
	for (let namesCounter = 0; namesCounter < namesCount; namesCounter++) 
	{
		var row = table.insertRow();
		var nameCell = row.insertCell();
		nameCell.innerHTML = namesList[namesCounter];
		let deleteButton = document.createElement('button');
		deleteButton.innerHTML = "DELETE";
		deleteButton.onclick = function()
		{			
			namesList.splice(namesCounter, 1);
			localStorage.setItem('names', JSON.stringify(namesList));
			createAndLoadTable();
		}
		nameCell.appendChild(deleteButton);
	}
	let divName = document.getElementById("divNames");
	divName.replaceChild(table, divName.childNodes[0]);
}

