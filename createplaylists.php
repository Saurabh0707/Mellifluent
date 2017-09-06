<!DOCTYPE html>
<html>
<head>
	<title>Create Playlist</title>

	<style type="text/css">
		table
		{
		}
		td
		{  text-align: center;
		   width :20%;
		}
    #userinfo
    {
      float: right;
    }
	</style>
 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Euphony Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<!-- /font files -->
<!-- css files -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/team.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->
<!-- js files -->
<script src="js/modernizr.custom.js"></script>
<!-- /js files -->
<script src="js/jquery.js"></script>
	<script type="text/javascript">
   
    $(document).ready(function ()
                                {  
                                 $('#playlistsubmit').hide();
                                 }

                                ); 
  
 
  
/*
   window.onunload = refreshParent();
    function refreshParent() {

        window.opener.location.reload(true);

    }
*/
  


function validateplaylistname(inputid)
{   var a=document.getElementById(inputid);
  var check=/^[a-zA-Z ]*$/;
  if(!check.test(a.value))
  {
    $('#playlistsubmit').hide();
    document.getElementById('usererror').innerHTML="*only alphabets and space allowed";
    a.value="";
   

  }
  else
    {
    document.getElementById('usererror').innerHTML="";
    //  document.getElementById('createanyplaylistbtn').style.display='block';
    $('#playlistsubmit').show();
 }
}



		function ajaxFunction(){
           var ajaxRequest;  
           var playlistname = document.getElementById('playlistname').value;
           
           var queryString = "?playlistname=" + playlistname;
          

           try {
            
              ajaxRequest = new XMLHttpRequest();
           }catch (e) {
              
              try {
                 ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
              }catch (e) {
                 try{
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                 }catch (e){
                   
                    
                    return false;
                 }
              }
           }
              
           
           ajaxRequest.open("GET", "createthisplaylist.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4)
              {
              	 var ajaxDisplay = document.getElementById('youmade');
                 ajaxDisplay.innerHTML = ajaxRequest.responseText;
            
              }
           }
           
    }
	</script>
</head>
<body>

<?php
session_start();
$dbc= mysqli_connect('localhost','root','','musicplayer');
include_once('createplay.php');

    $usersession=$_SESSION['user'];
    $qry2= "SELECT * FROM user WHERE userid='$usersession'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
?>

<div id="innercontainer2" style="text-align: center;">
<div id='addthesong'>
  <div><a href="yourdownload.php" class="text-center" >ADD Song to Playlists</a></div>
</div><br>

<div id='youmade'>

 
	<?php 
    myplaylists();
	?>
</div>
<br>



<div id="createanyplaylist">
<label>Enter Playlist Name:</label><br>
<input  type="text" id="playlistname" class="form-control" onkeyup="validateplaylistname(this.id); " placeholder="playlistname">
<span id="usererror" style="color:red; font-family: sans-serif; font-size:2vmin;"></span><div id="error">
<div id="playlistsubmit">
<button id="createanyplaylistbtn" onclick="ajaxFunction();" class="btn btn-primary">Create Playlist</button></div>
</div>
</div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a").on('click', function(event) {

   // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
      });
    } // End if
  });
})
</script>
<!-- /js files -->
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

</body>
</html>