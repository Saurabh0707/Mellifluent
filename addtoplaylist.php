  <!DOCTYPE html>
<html>
<head>
    <title>HTML5 Audio Player</title>
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

  <style type="text/css">
  table
    {
      border-collapse:collapse;
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
    <script src="js/jquery.js"></script>

    <script type="text/javascript">
   
        function ajaxFunction(ele1, ele2)
        { 
           var ajaxRequest;  
           var addtothis = ele1; 
           var songid = ele2; 
           
           var queryString = "?addtothis=" + addtothis  + "&songid=" + songid;
          
          

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
                      ///////////////////////////////////////////////////yha POST lga kr dekho zara
         



           ajaxRequest.open("GET", "addtothisplaylist.php" + queryString, true);
           ajaxRequest.send(null);
           
           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                 location.reload();
              }
           }
           
       }



                        $(document).ready(function()
                                  { 
                                     $('a#addtothis').click(function ()
                                   {   
                                         var value =$(this).attr('value');
                                         var valueofit =$(this).attr('valueofit');
                                         
                                         ajaxFunction(value, valueofit);
                                   });
                                    
                                  });
    </script>
    <div id="innercontainer2">
<?php 
session_start();
include_once('countsong.php');

$dbc= mysqli_connect('localhost','root','','musicplayer');

if(!isset($_SESSION['user'])) header('location:login.php');
  
  $songid=$_GET['songid'];
  
  $usersession=$_SESSION['user'];
   $qry2= "SELECT * FROM user WHERE userid='$usersession'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
?>
<?php
  $query = "SELECT * FROM `userplaylist` WHERE userid='$usersession'";
  $data= mysqli_query($dbc,$query) or die('uhjbjkb');
  if(mysqli_num_rows($data))
 {     echo '<div style="text-align:center;">';
 	    echo '<table class="table table-striped text-center">';
      echo '<caption><em>Your Playlists</em></caption>';
      echo '<tr>'; 
      echo '<th>Name</th>';
      echo '<th>Songs</th>';
      echo '<th>Add</th>';//////////////////////no of songs
      echo '</tr>' ;
 	while($row=mysqli_fetch_array($data))
   { ?>
      <tr> 
   	  <td><?php echo $row['playlistname']?></td>
     <?php echo '<td>'.countsong($row['playlistid']).'</td>';?>
      <td><a id="addtothis" value=" <?php echo $row['playlistid']?>" valueofit=" <?php echo $songid; ?>" style="background:none; color:#0000FF; padding-right:11%; cursor: pointer;">Add To This</a></td>
      </tr>
 <?php
  }  	echo '</table></div><br><hr><br>';
 
}
else
{
	echo 'YOU HAVE NOT YET CREATED ANY PLAYLIST';
  echo '<br><br>';
}
   


?>
</div>
</body>
</html>

