$(document).ready(function(){

window.onload=loadProducts; // da ucita proizvode u tabelu kada se svi elementi na pageu load-aju
var dialogCreate,dialogEdit, formCreate,formEdit, name=$("#nameCreate"), 
description=$("#descriptionCreate"),
price=$("#priceCreate"),
allFields = $( [] ).add( name ).add( description ).add( price ),
      tips = $( ".validateTips" );
	  
	  
	  function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Duzina od " + n + "a mora biti između " +
          min + " i" + max + " slova" );
        return false;
      } else {
        return true;
      }
    }
	
	function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
	
	
	function loadProducts(){
    var requestObject = new XMLHttpRequest();
    var url = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16268";
    requestObject.onreadystatechange = function () {
        if(requestObject.readyState == 4 && requestObject.status == 200){
		
            var productData = JSON.parse(requestObject.responseText);
            var table = document.getElementById('productTable');
            $("#productTable td").remove(); 
           
           			
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
					editButtonClick(this.className);
					};
					
					
					var btnDelete = document.createElement('input');
					btnDelete.type = "button";
					btnDelete.className = forthCell.name;
					btnDelete.value="Obriši";
					forthCell.appendChild(btnDelete);
					btnDelete.onclick=function(){
					deleteButtonClick(this.className);
					};
					
					
                }

        
    }
	}
	
    requestObject.open("GET", url, true);
    requestObject.send();
}
	
	  
	  function addProduct() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
      name= $( "#nameCreate" );
	  price = $( "#priceCreate" );
	  description= $( "#descriptionCreate" );
      valid = valid && checkLength( name, "naziv", 3, 16 );
      valid = valid && checkLength( description, "opis", 3, 80 );
      
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Naziv se mora sastojati od slova, brojeva, donjih crtica, razmaka i mora poceti sa slovom." );
      valid = valid && checkRegexp( price, /([0-9]+[.|,][0-9])|([0-9][.|,][0-9]+)|([0-9]+)/g, "Cijena mora biti realan broj (npr. 3,50)" );
      valid = valid && checkRegexp( description, /^[a-z]([0-9a-z_\s])+$/i, "Opis se mora sastojati od slova, brojeva, donjih crtica, razmaka i mora poceti sa slovom." );
 
      if ( valid ) {
        
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
	
    requestObject.open("POST", url, false);
    requestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    requestObject.send("akcija=dodavanje" + "&brindexa=16268&proizvod=" + JSON.stringify(product));
		
		
		
        dialogCreate.dialog( "close" );
		loadProducts();
      
      return valid;
    }
	}
	
	function editProduct(tableRowId) {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
      
	  name= $( "#nameEdit" );
	  price = $( "#priceEdit" );
	  description= $( "#descriptionEdit" );
	  
       
      valid = valid && checkLength( name, "naziv", 3, 16 );
      valid = valid && checkLength( description, "opis", 3, 80 );
      
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Naziv se mora sastojati od slova, brojeva, donjih crtica, razmaka i mora poceti sa slovom." );
      valid = valid && checkRegexp( price, /([0-9]+[.|,][0-9])|([0-9][.|,][0-9]+)|([0-9]+)/g, "Cijena mora biti realan broj (npr. 3,50)" );
      valid = valid && checkRegexp( description, /^[a-z]([0-9a-z_\s])+$/i, "Opis se mora sastojati od slova, brojeva, donjih crtica, razmaka i mora poceti sa slovom." );
 
      if ( valid ) {
        
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
	
    requestObject.open("POST", url, false);
    requestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    requestObject.send("akcija=promjena" + "&brindexa=16268&proizvod=" + JSON.stringify(product));
		
		loadProducts();
        dialogEdit.dialog( "close" );
      
      return valid;
    }
	}
	

dialogCreate = $( "#dialog-form-create" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Kreiraj proizvod": addProduct,
        Cancel: function() {
          dialogCreate.dialog( "close" );
        }
      },
      close: function() {
        formCreate[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
		updateTips("Sva polja su obavezna.");
      }
    });

	formCreate = dialogCreate.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addProduct();
    });

$( "#create-product" ).button().on( "click", function() {

      dialogCreate.dialog( "open" );
    });
	
	
	dialogEdit = $( "#dialog-form-edit" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true
    });

	
	
	
 function editButtonClick(tableRowId) {
     
	 
 dialogEdit = $( "#dialog-form-edit" ).dialog({
      autoOpen: false,
	  title:"Izmijeni proizvod",
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Izmijeni proizvod": function()
		{
		editProduct(tableRowId)
		},
        Cancel: function() {
          dialogEdit.dialog( "close" );
        }
      },
      close: function() {
        formEdit[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
		updateTips("Sva polja su obavezna.");
      }
    });
	
	formEdit = dialogEdit.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      editProduct(tableRowId);
    });
	
      dialogEdit.dialog( "open" );
    };
	
	function deleteButtonClick(tableRowId) {
	
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
	
    requestObject.open("POST", url, false);
    requestObject.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    requestObject.send("akcija=brisanje" + "&brindexa=16268&proizvod=" + JSON.stringify(product));
		
		loadProducts();
	
	
	};
	
	
  });
  
  
  
  