function validateRegister(){

let password=document.forms["register"]["password"].value;

if(password.length<6){

alert("Password should contain at least 6 characters");

return false;

}

return true;

}