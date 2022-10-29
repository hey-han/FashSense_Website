function validateName(){
	var name = document.getElementById("myName").value;
	name.trim(); //remove whitespace
	var regexp = /^[A-Za-z]*$/;
	
	if(regexp.test(name)){
		return true;
	}
	else{
		alert("Only word characters and white spaces are allowed");
		return false;
	}
}

/*function validateAddress(){
	var name = document.getElementById("myAddress").value;
	name.trim(); //remove whitespace
	var regexp = /^[A-Za-z]*$/;
	
	if(regexp.test(name)){
		return true;
	}
	else{
		alert("Only word characters and white spaces are allowed");
		return false;
	}
}

function validateUnit(){
	var name = document.getElementById("myName").value;
	name.trim(); //remove whitespace
	var regexp = /^[A-Za-z]*$/;
	
	if(regexp.test(name)){
		return true;
	}
	else{
		alert("Only word characters and white spaces are allowed");
		return false;
	}
}*/

function validatePostal(){
	var postal = document.getElementById("myPostal").value;
	postal.trim(); //remove whitespace
	var regexp = /^[0-9]{6}$/;
	
	if(regexp.test(postal)){
		return true;
	}
	else{
		alert("Please enter the correct postal code. Postal code should have 6 numbers.");
		return false;
	}
}

function validateEmail(){
	var email = document.getElementById("myEmail").value;
	var regexp = /^[\w.-]+@([\w]+.){1,3}[A-Za-z]{2,3}$/;
	
	if(regexp.test(email)){
		return true;
	}
	else{
		alert("Email is in wrong format");
		return false;
	}
}

function validatePhone(){
	var phone = document.getElementById("myPhone").value;
	phone.trim(); //remove whitespace
	var regexp = /^[0-9]{8}$/;
	
	if(regexp.test(phone)){
		return true;
	}
	else{
		alert("Please enter the correct phone number. Phone number should have 8 digits.");
		return false;
	}
}
