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
<?php

session_start();
include_once('countsong.php');
function myplaylists()
{
$dbc= mysqli_connect('localhost','root','','musicplayer');

if(!isset($_SESSION['user'])) header('location:login.php');


  $usersession=$_SESSION['user'];
  $query = "SELECT * FROM `userplaylist` WHERE userid='$usersession'";
  $data= mysqli_query($dbc,$query) or die('uhjbjkb');
  if(mysqli_num_rows($data))
 { 
  echo '<div>';
 	echo '<table class="table table-striped text-center">';
   echo '<caption><em>Your Playlists</em></caption>';
    echo '<tr >'; 
    echo '<th class="text-center">Name</th>';
    echo '<th class="text-center">Songs</th>';
   
    echo '</tr>' ;
 	while($row=mysqli_fetch_array($data))
   { 
      echo '<tr>'; 
      echo '<td>'.$row['playlistname'].'</td>';
      echo '<td>'.countsong($row['playlistid']).'</td>';//////////////////////no of songs
      echo '</tr>' ;
 }  	echo '</table>';
      echo '</div>';
}
else
{
	echo '<b>YOU HAVE NOT YET CREATED ANY PLAYLIST</b>';
}
    
}

 if(!isset($_SESSION['user'])) header('location:login.php');
 $dbc= mysqli_connect('localhost','root','','musicplayer');
 $usersession=$_SESSION['user'];
 $playlistname = $_GET['playlistname'];
 $sql2 = "SELECT * FROM userplaylist WHERE playlistname = '$playlistname' AND userid=$usersession";      
 $data2= mysqli_query($dbc,$sql2);
 if(!mysqli_num_rows($data2))
 {
 	$sql= "INSERT INTO userplaylist (playlistid,playlistname,userid) VALUES(NULL,'$playlistname','$usersession')";
    mysqli_query($dbc, $sql) or die('egrthrgt');
     /////////////////////////////created
     myplaylists(); 
      echo '<hr><br>';

     }
 else
 {  
 	myplaylists();
 	echo'<hr><br>';
 	$err="*Name already exist";
 	echo $err;
 	
 	
  }
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
