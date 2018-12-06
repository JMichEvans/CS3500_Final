function like_function(id){
	var button = document.getElementById(id);
	//console.log(button);
	var num = button.innerHTML;
	num++;
	button.innerHTML = num;
	//button.disabled = true;
	button.disabled = true;
}