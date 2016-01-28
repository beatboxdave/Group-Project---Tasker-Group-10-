function funct2()
	{
		var a = $("#test :selected").text(); //the text content of the selected option
		var xmlhttp;
		if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
	  			xmlhttp=new XMLHttpRequest();
	  	}
		else
  		{// code for IE6, IE5
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		 }
		xmlhttp.onreadystatechange=function()
  		{
  			if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
    			document.getElementById("testInsert").innerHTML=xmlhttp.responseText;
    		}
  		}		
		xmlhttp.open("GET","editTaskPop.php",true);
		xmlhttp.send();
	}
  
	function animationSlide(count){
		var height = $( "#slide"+count ).height();
		var div=$("#slide"+count);
		if(height == 0){
			$( div ).removeClass( "hidden" );
			div.animate({height:'50px',opacity:'0.8'});
		}
			
		else if(height == 50){
			div.animate({height:'0px',opacity:'0.8'});
			$( div ).addClass( "hidden" );
		}
	}
	
	