var isModalShown=false;


function keyDownHandler(e) {
    if (isModalShown && e.keyCode == 9)  return false;
}

function showModalCreate()
{
	
		document.getElementById("dialog-form-create").style.display="block";
		window.onscroll = function () {
        window.scrollTo(0, 0);
		}
		 
		document.getElementById("dialog-form-create").style.top=getViewportHeight()/2+"px";
		isModalShown=true;
}
function showModalEdit(id)
{
	document.getElementById("dialog-form-edit").style.display="block";
	document.getElementById("editButton").onclick= function() {editProduct(id);}
		window.onscroll = function () {
        window.scrollTo(0, 0);
		isModalShown=true;
}

}
function addEvent(object, eventType, fnction){
 if (object.addEventListener){
    object.addEventListener(eventType, fnction, false);
    return true;
 } else if (object.attachEvent){
    var r = object.attachEvent("on"+eventType, fnction);
    return r;
 } else {
    return false;
 }
}
addEvent(window, "scroll", changeModalPosition);

function changeModalPosition()
{
	
		document.getElementById("dialog-form-create").style.top=getViewportHeight()/2+"px";
}

function getViewportHeight() {
	if (window.innerHeight!=window.undefined) return window.innerHeight;
	if (document.compatMode=='CSS1Compat') return document.documentElement.clientHeight;
	if (document.body) return document.body.clientHeight; 
	return window.undefined; 
}


function hideModal(type)
{
	if(type=="createProduct")
	{
		document.getElementById("dialog-form-create").style.display="none";
		document.getElementById("formCreate").reset();
		document.getElementById("validateTipsCreate").innerHTML="Sva polja su obavezna.";
		window.onscroll = null;
	}
	else if(type=="editProduct")
	{
		document.getElementById("dialog-form-edit").style.display="none";
		document.getElementById("formEdit").reset();
		document.getElementById("validateTipsEdit").innerHTML="Sva polja su obavezna.";
		window.onscroll = null;
	}
	isModalShown=false;
}

function submitForm(type)
{
	if(type=="createProduct")
	{
		var valid=true;
		
		var name =document.getElementById("nameCreate").value;
		var description = document.getElementById("descriptionCreate").value;
		var price = document.getElementById("priceCreate").value;
		
		if(checkLength(name,3, 16)==false)
		{
			valid= false;
			document.getElementById("validateTipsCreate").innerHTML="Naziv mora biti između 3 i 16 karaktera";
			return false;
		}
		
		if(checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i)==false)
		{
			valid= false;
			document.getElementById("validateTipsCreate").innerHTML="Naziv se mora sastojati od slova i brojeva";
			return false;
		}
		
		if(checkLength( description, 3, 80 )==false)
		{
			valid= false;
			document.getElementById("validateTipsCreate").innerHTML="Opis mora biti dug između 3 i 16 karaktera";
			return false;
		}
		if(checkRegexp( description, /^[a-z]([0-9a-z_\s])+$/i)==false)
		{
			valid=false;
			document.getElementById("validateTipsCreate").innerHTML="Opis mora biti alfanumerički tekst";
			return false;
		}
		if(checkRegexp( price, /([0-9]+[.|,][0-9])|([0-9][.|,][0-9]+)|([0-9]+)/g)==false)
		{
			valid=false;
			document.getElementById("validateTipsCreate").innerHTML="Cijena mora biti realan broj";
			return false;
		}
		
		if(valid==true) return true;			
	}
   else	if(type=="editProduct")
	{
		var valid=true;
		
		var name =document.getElementById("nameEdit").value;
		var description = document.getElementById("descriptionEdit").value;
		var price = document.getElementById("priceEdit").value;
		
		if(checkLength(name,3, 16)==false)
		{
			valid= false;
			document.getElementById("validateTipsEdit").innerHTML="Naziv mora biti između 3 i 16 karaktera";
			return false;
		}
		
		if(checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i)==false)
		{
			valid= false;
			document.getElementById("validateTipsEdit").innerHTML="Naziv se mora sastojati od slova i brojeva";
			return false;
		}
		
		if(checkLength( description, 3, 80 )==false)
		{
			valid= false;
			document.getElementById("validateTipsEdit").innerHTML="Opis mora biti dug između 3 i 16 karaktera";
			return false;
		}
		if(checkRegexp( description, /^[a-z]([0-9a-z_\s])+$/i)==false)
		{
			valid=false;
			document.getElementById("validateTipsEdit").innerHTML="Opis mora biti alfanumerički tekst";
			return false;
		}
		if(checkRegexp( price, /([0-9]+[.|,][0-9])|([0-9][.|,][0-9]+)|([0-9]+)/g)==false)
		{
			valid=false;
			document.getElementById("validateTipsEdit").innerHTML="Cijena mora biti realan broj";
			return false;
		}
		
		if(valid==true) return true;
		
				
	}
	
	
}

function checkLength( o,min, max ) {
      if ( o.length > max || o.length < min ) return false;
	   else return true;    
    }
	
	function checkRegexp( o, regexp) {
      if ( !( regexp.test( o) ) ) return false; 
	  return true;
    }
	
	function loadProducts(){
    var requestObject = new XMLHttpRequest();
    var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16268";
    requestObject.onreadystatechange = function () {
        if(requestObject.readyState == 4 && requestObject.status == 200){
		
            var productData = JSON.parse(requestObject.responseText);
            var table = document.getElementById('productTable');
           for (var i = document.getElementById("productTable").rows.length; i > 1; i--) {
            document.getElementById("productTable").deleteRow(i - 1);
        } 
           			
                for (var i = 0; i < productData.length; i++) {
                    var currRow = table.insertRow();
                    var firstCell;
                    firstCell = currRow.insertCell(0);
                    
                    firstCell.innerHTML = productData[i].naziv;
                    var secondCell = currRow.insertCell(1);
                    
                    secondCell.innerHTML = productData[i].opis;
                    var thirdCell = currRow.insertCell(2);
                    
                    thirdCell.innerHTML = productData[i].cijena;
					var forthCell= currRow.insertCell(3);
					forthCell.name=productData[i].id;
					var btnEdit = document.createElement('input');
					btnEdit.type = "button";
					btnEdit.className = forthCell.name;
					btnEdit.value="Izmijeni";
					forthCell.appendChild(btnEdit);
					btnEdit.onclick=function(){
					showModalEdit(this.className);
					};
					
					
					var btnDelete = document.createElement('input');
					btnDelete.type = "button";
					btnDelete.className = forthCell.name;
					btnDelete.value="Obriši";
					forthCell.appendChild(btnDelete);
					btnDelete.onclick=function(){
					deleteProduct(this.className);
					};
					
					
                }

        
    }
	}
	
    requestObject.open("GET", url, true);
    requestObject.send();
}
	

	 function addProduct() {
      

	  if(submitForm('createProduct')==false) return;
	  
	  
		var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16268";
		
		var product = {
        naziv: document.getElementById("nameCreate").value,
        opis: document.getElementById("descriptionCreate").value,
		cijena: document.getElementById("priceCreate").value
    };
    var requestObject = new XMLHttpRequest();
    requestObject.onreadystatechange = function() {
        if (requestObject.readyState == 4 && requestObject.status == 200)
        {
            //alert('Uspjesan unos!');
        }
    }
	
    requestObject.open("POST", url, true);
    requestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    requestObject.send("akcija=dodavanje" + "&brindexa=16268&proizvod=" + JSON.stringify(product));
		
		loadProducts();
		hideModal('createProduct');
      
   
	}
	
	
	function editProduct(tableRowId) {
      
	  if(submitForm('editProduct')==false)
	  {
		  return;
	  }
        
		var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16268";
		
		var product = {
		id:tableRowId,
        naziv: document.getElementById("nameEdit").value,
        opis: document.getElementById("descriptionEdit").value,
		cijena: document.getElementById("priceEdit").value
    };
    var requestObject = new XMLHttpRequest();
    requestObject.onreadystatechange = function() {
        if (requestObject.readyState == 4 && requestObject.status == 200)
        {
            //alert('Uspjesan unos!');
        }
    }
	
    requestObject.open("POST", url, true);
    requestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    requestObject.send("akcija=promjena" + "&brindexa=16268&proizvod=" + JSON.stringify(product));
		
		loadProducts();
		hideModal('editProduct');
        
      
   
	}
	
	function deleteProduct(tableRowId)
	{
		var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16268";
		
		var product = {
		id:tableRowId
    };
    var requestObject = new XMLHttpRequest();
    requestObject.onreadystatechange = function() {
        if (requestObject.readyState == 4 && requestObject.status == 200)
        {
            //alert('Uspjesan unos!');
        }
    }
	
    requestObject.open("POST", url, true);
    requestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    requestObject.send("akcija=brisanje" + "&brindexa=16268&proizvod=" + JSON.stringify(product));
		
		loadProducts();
	}
function hideTreeLoadProducts()
{
	if (!document.all) {
	document.onkeypress = keyDownHandler;
}
	loadProducts();
	
	var headElements = document.getElementsByClassName("headElement");
	var otherElements=[];
	
	for(var i=0;i<headElements.length;i++)
	{
		otherElements[i]=headElements[i].getElementsByTagName("li");
	}
	
	for(var i = 0; i < otherElements.length; i++)
	{
		var temp=otherElements[i];
		for(var j=0;j<temp.length;j++)
		temp[j].style.display = "none";
	}	
}


function toggle(toggleelementst) 
{
	var parentNode= document.getElementById(toggleelementst.parentNode.id);
	var elements = parentNode.getElementsByTagName("li");

	if(elements[0].style.display === "none")
	{ 
		for(var i = 0; i < elements.length; i++)
	{
		elements[i].style.display = "block";
	}	
	 }
	
	else {
		for(var i = 0; i < elements.length; i++)
	{
		elements[i].style.display = "none";
	}	
	
	}
	
}

function enlargeImage(image)
{
	image.className=image.className+" transition";
}
function shrinkImage(image)
{
	image.className=image.className.replace(/\btransition\b/,'');
}



