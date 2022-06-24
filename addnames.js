function saveNamesList()
{
	var name = document.getElementById('name').value;
	var key = "name"+(localStorage.length+1);
	localStorage.setItem(key, name);
	document.getElementById('name').value = "";
	document.getElementById('divNames').innerHTML += localStorage.getItem(key);
	// createAndLoadTable();
}

function addName()
{
	
}

// function loadNames()
// {
// 	for(let namesCounter=1; namesCounter<=sessionStorage.length; namesCounter++)
// 	{
// 		var i = 'Names['+namesCounter+']';
// 		document.getElementById('namesTable').innerHTML += "<tr><td>"+ sessionStorage.getItem(i)+"</td></tr>";
// 		// document.getElementById('Hello').innerHTML += localStorage.getItem(i);
// 	}
// }



function createAndLoadTable() 
{
	const table = document.createElement('table');
	var row = table.insertRow();
	var headerCell = document.createElement("TH");
	headerCell.innerHTML = "List";
	row.appendChild(headerCell);

	let namesCount = localStorage.length;
	for (var namesCounter = 1; namesCounter <= namesCount; namesCounter++) 
	{
		var row = table.insertRow();
		var cell = row.insertCell();
		cell.innerHTML = localStorage.getItem("name" + namesCounter);
	}
	const divNames = document.getElementById("divNames");
	// document.body.appendChild(table);
	divNames.appendChild(table);
	// return (table);
}

function deleteName()
{
	const deleteButton = document.createElement('button');


}

// function addNames()
// {
// 	var name = document.getElementById('name').value;
// 	var html = "";
// 	html = "<tr><td>"+name+"</td></tr>";
// 	document.getElementById('namesTable').innerHTML+= html;
// 	localStorage.addItem += html;
// 	document.getElementById('name').value = "";
// }
