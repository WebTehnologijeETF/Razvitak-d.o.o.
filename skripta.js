

function validateForm()
{
var mailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    
var name = document.getElementById("nameInput").value;
var firm = document.getElementById("firmInput").value;
var mail = document.getElementById("mailInput").value;
var state = document.getElementById("stateInput").value;
var city = document.getElementById("cityInput").value;
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

if(state==null || state=="")
{
document.getElementById("stateInput").setCustomValidity("Unesite vašu općinu");
 isValid=false;
}
else{
document.getElementById("stateInput").setCustomValidity("");
}

if(city==null || city=="")
{
document.getElementById("cityInput").setCustomValidity("Unesite vaš grad");
 isValid=false;
}
else
{
document.getElementById("cityInput").setCustomValidity("");
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

if(isValid) // ako je sve do sada validno, moze se provjeriti sa ajaxom validnost postojanja mjesta i opcine
{
var requestObject = new XMLHttpRequest();
        
		requestObject.onreadystatechange = function()
        {
            if(requestObject.status == 200 && requestObject.readyState == 4){
                var JSONArray = JSON.parse(requestObject.responseText);
                if(JSONArray.greska == "Nepostojeće mjesto"){
                    document.getElementById("cityInput").setCustomValidity("Mjesto mora postojati");
                    isValid = false;
                }
                else if(JSONArray.greska == "Nepostojeća općina"){
                    document.getElementById("stateInput").setCustomValidity("Općina mora postojati");
                    isValid = false;
                }
                else{
                    document.getElementById("cityInput").setCustomValidity("");
                    document.getElementById("stateInput").setCustomValidity("");
                }
               
            }
        }
        if(requestObject.readyState == 4) return;
        requestObject.open('GET','http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina=' + state + '&mjesto=' + city, true);
        requestObject.send();
		

}


if(isValid) form.submit();
//return isValid;
}


function validateFormComment()
{
	var mailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    
var name = document.getElementById("nameInput").value;
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

 if( mail!=null && mail!="" &&!mailRegex.test(mail))
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

if(isValid) form.submit();

}




function ajaxMenu(webpage){
        var requestObject = new XMLHttpRequest();
        requestObject.onreadystatechange = function()
        {
            if (requestObject.readyState == 4 && requestObject.status == 200)
            {
                document.open();
                document.write(requestObject.responseText);
                document.close();
            }
            if (requestObject.readyState == 4 && requestObject.status == 404)
            {
                alert('error');
				return;
            }
        };
        requestObject.open("GET", webpage, true);
        requestObject.send();
    }
	
	function setValidity(name, condition)
	{
		if(name=='nameInput')
		{
			if(condition==true)
			{
				document.getElementById("nameInput").setCustomValidity("");
			}
			else
			{
				document.getElementById("nameInput").setCustomValidity("Unesite ime");
			}
		}
		else if(name=="mailInput")
		{
			if(condition==true)
			{
				document.getElementById("mailInput").setCustomValidity("");
			}
			else
			{
				document.getElementById("mailInput").setCustomValidity("Nevalidan mail");
			}
		}
		else if(name=="textArea")
		{
			if(condition==true)
			{
				document.getElementById("textArea").setCustomValidity("");
			}
			else
			{
				document.getElementById("textArea").setCustomValidity("Unesite poruku");
			}
		}
		
	}
	
	

	
	




