function addToCart(name, img, pizzaid, price)
{
	var pizza_name = name;
	//var node = document.getElementById("Classic");
	var container = document.createElement("DIV");
	container.className = "popout-cart";
	container.setAttribute("id", "popout-container");

	var exit = document.createElement("DIV");
	var exit_x = document.createTextNode("X");
	exit.setAttribute("id", "exit_x");
	exit.setAttribute("onclick", "exitPopOut()");
	exit.setAttribute("class", "hand");
	exit.appendChild(exit_x);
	
	var header = document.createElement("H4");
	var text = document.createTextNode(pizza_name+" Pizza");
	header.appendChild(text);

	var pic = document.createElement("IMG");
	var src = document.createAttribute("src");
	src.value = "assets/images/"+img; 
	pic.setAttributeNode(src);

	//Create Form
	var form = document.createElement("FORM");
	form.setAttribute("action", "cart.php");
	form.setAttribute("method", "POST");

	//Create Radio Buttons
	var small_price = document.createTextNode("$"+ (price*.6).toFixed(2));
	var small = document.createTextNode("Small");
	var radio_small = document.createElement("INPUT");
	radio_small.setAttribute("type", "radio");
	radio_small.setAttribute("name", "size");
	radio_small.setAttribute("value", "S");

	var med_price = document.createTextNode("$"+ (price*.8).toFixed(2));
	var med = document.createTextNode("Medium");
	var radio_med = document.createElement("INPUT");
	radio_med.setAttribute("type", "radio");
	radio_med.setAttribute("name", "size");
	radio_med.setAttribute("value", "M");

	var large_price = document.createTextNode("$"+ (price*1).toFixed(2));
	var large = document.createTextNode("Large");
	var radio_large = document.createElement("INPUT");
	radio_large.setAttribute("type", "radio");
	radio_large.setAttribute("name", "size");
	radio_large.setAttribute("value", "L");
	radio_large.setAttribute("checked", "");

	var xl_price = document.createTextNode("$"+ (price*1.25).toFixed(2));
	var xl = document.createTextNode("XL");
	var radio_xl = document.createElement("INPUT");
	radio_xl.setAttribute("type", "radio");
	radio_xl.setAttribute("name", "size");
	radio_xl.setAttribute("value", "XL");

	//Create Quantity
	var quantity = document.createElement("INPUT");
	quantity.setAttribute("type", "number");
	quantity.setAttribute("name", "quantity");
	quantity.setAttribute("value", "1");
	quantity.setAttribute("min", "1");
	quantity.setAttribute("id", "qty");

	var id = document.createElement("INPUT");
	id.setAttribute("type", "hidden");
	id.setAttribute("name", "PizzaID");
	id.setAttribute("value", pizzaid);

	//Create Submit Button
	var submit = document.createElement("INPUT");
	submit.setAttribute("type", "submit");
	submit.setAttribute("value", "Add to Cart");
	submit.setAttribute("class", "hand");

	//Append everything to form.
	form.appendChild(document.createElement("BR"));
	form.appendChild(small_price);
	form.appendChild(document.createElement("BR"));
	form.appendChild(small);
	form.appendChild(document.createElement("BR"));
	form.appendChild(radio_small);
	form.appendChild(document.createElement("BR"));

	form.appendChild(document.createElement("BR"));
	form.appendChild(med_price);
	form.appendChild(document.createElement("BR"));
	form.appendChild(med);
	form.appendChild(document.createElement("BR"));
	form.appendChild(radio_med);
	form.appendChild(document.createElement("BR"));

	form.appendChild(document.createElement("BR"));
	form.appendChild(large_price);
	form.appendChild(document.createElement("BR"));
	form.appendChild(large);
	form.appendChild(document.createElement("BR"));
	form.appendChild(radio_large);
	form.appendChild(document.createElement("BR"));

	form.appendChild(document.createElement("BR"));
	form.appendChild(xl_price);
	form.appendChild(document.createElement("BR"));
	form.appendChild(xl);
	form.appendChild(document.createElement("BR"));
	form.appendChild(radio_xl);
	form.appendChild(document.createElement("BR"));
	
	form.appendChild(document.createElement("BR"));
	form.appendChild(quantity);
	form.appendChild(document.createElement("BR"));
	form.appendChild(id);
	form.appendChild(submit);

	container.appendChild(exit);
	container.appendChild(header);
	container.appendChild(pic);
	container.appendChild(form);

	document.getElementById("top").appendChild(container);
}

function exitPopOut()
{
	var parent = document.getElementById("top");
	var child = document.getElementById("popout-container");

	parent.removeChild(child);
}