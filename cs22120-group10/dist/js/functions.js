	function nav(){
		document.location.href = "http://stackoverflow.com/";
	}
	function funct1()
	{
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
    			document.getElementById("userIDCont").innerHTML=xmlhttp.responseText;
    		}
  		}
		xmlhttp.open("GET","userID.php",true);
		xmlhttp.send();
		funct3();
		funct2();
		funct4();
	}
	
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
    			document.getElementById("one").innerHTML=xmlhttp.responseText;
    		}
  		}		
		xmlhttp.open("GET","openUp.php",true);
		xmlhttp.send();
	}
	
	function funct3()
	{
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
    			document.getElementById("two").innerHTML=xmlhttp.responseText;
    		}
  		}
		xmlhttp.open("GET","closeDown.php",true);
		xmlhttp.send();
	}
	
	function funct4()
	{
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
    			document.getElementById("three").innerHTML=xmlhttp.responseText;
    		}
  		}
		xmlhttp.open("GET","addJob.php",true);
		xmlhttp.send();
	}
	
	function addJobPop(str) {
		if (str=="") {
			document.getElementById("txtHint").innerHTML="";
			return;
		} 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} 
		else { 
			// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("addJobRooms").innerHTML=xmlhttp.responseText;
				}
		}	
		xmlhttp.open("GET","addJobPop.php?q="+str,true);
		xmlhttp.send();
	}
	
	function showUser(str, ID) {
		if (str=="") {
			document.getElementById("txtHint").innerHTML="";
			return;
		} 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} 
		else { 
			// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("rooms").innerHTML=xmlhttp.responseText;
				}
		}	
		xmlhttp.open("GET","openUpPopulate.php?q="+str,true);
		xmlhttp.send();
	}


	function showUserDown(str) {
		if (str=="") {
			document.getElementById("txtHint").innerHTML="";
			return;
		} 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
		else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("roomsDown").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","CloseDownPopulate.php?q="+str,true);
		xmlhttp.send();
	}

  
	function animationSlide(count, side, result){
		if(side == 2){
			var height = $( "#slide1"+count ).height();
			var div=$("#slide1"+count);
			if(height == 30){
				$( "#roomContUp1"+count ).removeClass( "hidden" );
				div.animate({height:'130px',opacity:'0.8'});
			}
			
			else if(height == 130){
				$( "#roomContUp1"+count ).addClass( "hidden" );
				div.animate({height:'30px',opacity:'0.8'});
			}
		}
		
		
		else if(side == 1){
			var height = $( "#slide"+count ).height();
			var div=$("#slide"+count);
			if(height == 30){
				$( "#roomContUp"+count ).removeClass( "hidden" );
				div.animate({height:'130px',opacity:'0.8'});
			}
			
			else if(height == 130){
				$( "#roomContUp"+count ).addClass( "hidden" );
				div.animate({height:'30px',opacity:'0.8'});
			}
		}
		
		else if(side == 3){
			var height = $( "#slide2"+count ).height();
			var div=$("#slide2"+count);
			if(height == 30){
				$( "#roomContUp2"+count ).removeClass( "hidden" );
				div.animate({height:'130px',opacity:'0.8'});
			}
			
			else if(height == 130){
				$( "#roomContUp2"+count ).addClass( "hidden" );
				div.animate({height:'30px',opacity:'0.8'});
			}
		}
	}
	
	