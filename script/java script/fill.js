function validateName(){
    var name = document.getElementById("customername").value;
    name.trim(); //remove any whitespace from both ends of the string
    var regexp = /^[a-zA-Z][a-zA-Z ]*$/;
    if(regexp.test(name)){
        return true;
    }
    else{
        alert("The name field can only have alphabetical characters and blankspace, special character are not allow");
        return false;
    }
}

function validateEmail(){
    var email = document.getElementById("email").value;
    email.trim();
    var regexp = /^([\w\.-])+@([\w]+\.){1,3}([A-z]){2,3}$/;
    if(regexp.test(email)){
        return true;
    }
    else{
        alert("Email entered in wrong format");
        return false;
    }
    
}
