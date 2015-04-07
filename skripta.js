function validateForm()
{
var mailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    
var name = document.getElementById("nameInput").value;
var firm = document.getElementById("firmInput").value;
var mail = document.getElementById("mailInput").value;
var message = document.getElementById("textArea").value;
message = message.replace(/^\s+/, '').replace(/\s+$/, ''); // da uklonimo sav white space nepotrebni
var isValid=true;
    if ( document.getElementById("nameInput").value=="") {
		document.getElementById("nameInput").setCustomValidity("Unesite vaše ime");
		
		isValid=false;
}
else
{
document.getElementById("nameInput").setCustomValidity("");
}

if(mail==null || mail=="" ){

document.getElementById("mailInput").setCustomValidity("Unesite vašu mail adresu");
isValid=false;
}
else if(!mailRegex.test(mail))
{
document.getElementById("mailInput").setCustomValidity("Unesite pravilnu mail adresu");
isValid=false;
}
else
{
document.getElementById("mailInput").setCustomValidity("");
}


if(message==null || message=="")
{
document.getElementById("textArea").setCustomValidity("Unesite vaš komentar");

isValid=false;
}
else
{

document.getElementById("textArea").setCustomValidity("");
}

return isValid;


}