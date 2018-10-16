function init() {
	if (document.cookie) {
		tab = document.cookie.split(";");
		for (t in tab) {
			var doto = tab[t].split("=");
			if (doto[0].trim() === "todo") {
				var serial = JSON.parse(doto[1]);
				for (s in serial)
					createtodo(serial[s], 1);
			}
		}
	}
}

function add() {
	var new_todo;
	new_todo = prompt("create your todo !");
	if (new_todo)
		createtodo(new_todo);
}

function createtodo(todo, init) {
	var div = document.getElementById("ft_list");
	var elem = document.createElement("div");
	var txt = document.createTextNode(todo);
	var ind = 0;
	if (document.cookie && !init) {
		tab = document.cookie.split(";");
		for (t in tab) {
			var doto = tab[t].split("=");
			if (doto[0].trim() === "todo") {
				var serial = JSON.parse(doto[1]);
				serial.push(todo);
				document.cookie = "todo="+JSON.stringify(serial);
				ind = 1;
			}
		}
	}
	if (!ind && !init) {
		tab = [];
		tab.push(todo);
		document.cookie = "todo="+JSON.stringify(tab)+";";
	}
	elem.setAttribute("class", "todo");
	elem.setAttribute("onclick", "deletetodo(this);");
	elem.appendChild(txt);
	if (div.hasChildNodes())
		div.insertBefore(elem, div.firstChild);
	else
		div.append(elem);
}

function deletetodo(elem) {
	if (confirm("Do you want to delete this todo ?")) {
		if (document.cookie) {
			tab = document.cookie.split(";");
			for (t in tab) {
				var doto = tab[t].split("=");
				if (doto[0].trim() === "todo") {
					var serial = JSON.parse(doto[1]);
					serial.splice(serial.indexOf(elem.firstChild), 1);
					document.cookie = "todo="+JSON.stringify(serial);
				}
			}
		}
		elem.parentNode.removeChild(elem);
	}
}
init();
