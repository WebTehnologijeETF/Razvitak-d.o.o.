$(document).ready(function(){
  
 $("#treeList>li ul").hide();


	$(".Collapsable").click(function () {

        $(this).parent().children().toggle();
        $(this).toggle();

    });
	
	$('.imageContent').hover(function() {
        $(this).addClass('transition');
    
    }, function() {
        $(this).removeClass('transition');
    });


	});