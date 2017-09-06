<!DOCTYPE html>
<html>
<head>
    <title>Mellifluent- Downloads</title>
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
    <style type="text/css">
    table
    {
      border-collapse:collapse;
    }
    th, td
    {  text-align: center;
       width :20%;
    }     

      ul li{
        cursor: pointer;
      }
      div #recommendtores
      {
        width: 50%;
        margin-right: auto;
        margin-left: auto;
      }
    </style>
    <?php
    session_start();
    include_once('createplay.php');

    
    if(!isset($_SESSION['user'])) header('location:login.php');
    ?>
    <script src="js/jquery.js"></script>

    <script language = "javascript" type = "text/javascript">
        
       // window.onload= location.reload();
        function popupUploadForm()
       {
        var newWindow1 = window.open('/mylearning/mp3player/createplaylists.php', 'name1', 'height=500,width=600');
        }    

        function popupUploadForm2(elem)
       {  
        var value1 = elem.attr('valueofit');
        var newWindow2 = window.open('/mylearning/mp3player/addtoplaylist.php?songid='+ value1 , 'name2', 'height=500,width=600');
        }    
        
         function popupUploadForm3(elem)
       {  
        var newWindow3 = window.open('/mylearning/mp3player/yourplaylist.php', 'name3', 'height=500,width=600');
        }   

        function popupUploadFormx()
       {
        var newWindowx = window.open('/mylearning/mp3player/myrecommend.php', 'namex', 'height=500,width=600');
        } 
    

        function ajaxFunction(ele1, ele2)
        {
           var ajaxRequest;
           var recommendtoit = ele2;
           var songname= ele1;
           var queryString = "?recommendto=" + recommendtoit  + "&songname=" + songname;
          
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
           
           ajaxRequest.open("GET", "recommendto.php" + queryString, true);
           
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function()
           {
              if(ajaxRequest.readyState == 4)
              {
                  var ajaxDisplay = document.getElementById('recommendtores');
                  ajaxDisplay.innerHTML = ajaxRequest.responseText;//what is this?
                  
              }
           }
        }



         function ajaxFunctionDelete(ele)
        {
           var ajaxRequest;  
           var deleteit = ele.attr('valueofdel');
           
           var queryString = "?deletethisdownload=" + deleteit;
                  
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
         
           ajaxRequest.open("GET", "deletethisdownload.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                location.reload();
                
                // alert(ajaxRequest.responseText);
               }
           }
           
       }
  
    var audio, prog;
     function loadit(){             
                                  // $('div#fade').hide();
                                   //$('#pause').hide();
                                   $('#playlist').show();
                                   $('#audio-info').show();
                                   $('#tracker').show();
                                   $('#buttons').show();
                                   ///not working without document.ready
                                    $(document).ready(function()
                                  { 
                                    $('#pause').show();
                                   // $('div#fade').slideUp();     
                                    //$('div#fadedetails').slideUp();  
                                    //$('div#faderecommend').slideUp();                                   
                                  });


                            }
      window.onload= loadit();   
                                /////shuru mein hidden hona chahiye naa
    
      function initAudio(element)
       {    
            var songname= element.attr('song');////is trah ke attrbute ke liye phle se koi syntax nai hai so element.attr krna pdhta hai
          var artist=element.attr('artist');
          var title=element.attr('song');
          var image = element.attr('image');
          audio= new Audio('media/'+ songname);
          $(element).attr("class","active");///////////////gave id dynamically
         // setplay(element);
          if(!audio.currentTime)//////anysong is being played
          {   audio.play();
            $('.title').html(title);
            $('.artist').html(artist);
            $('#cover').attr("src",image);
          //  var imageee= $('#cover').attr("src");
            $('#bottomplayer').css('background-image','url("image")');
            timecheck();

              $('#play').show();
                $('#pause').show();
         }
       }


       function setplay(element)
        {
          $(element).css({"font-size":"200%"});  
        }
     //////////////////////// sets appearance of song being played
        function unsetplay(element)
        {
          $(element).css({"font-size":"100%"});  
        }

      ///progress////////////////////////////////////////
        function timecheck(){   

                              $('#prog').change(function()
                                               {
                                                audio.currentTime=(this.value*audio.duration)/100;
                                                timeupdater();
                                                });


                            $(audio).bind('timeupdate', function()
                                               {  

                                                           
                                                             movetimebar();
                                                             timeupdater();

                                                             if(audio.currentTime==audio.duration) 
                                                              repeat();
                                               
                                               
                                                 }
                                               );

                    
                 
                                              

                  }
           function repeat()
                {   
                  initAudio($('#playlist li.active'));
                }


         function timeupdater()
    {   
      if(audio.currentTime>0){
                              var s = parseInt(audio.currentTime % 60);
                              var m = parseInt((audio.currentTime / 60) % 60);
    //Add 0 if seconds less than 10
                              if (s < 10) {
                                 s = '0' + s;
                              }
                              $('#currenttime').html(m + ':' + s); 
                              var value = 0;
                              if (audio.currentTime > 0) {
                                value = Math.floor((100 / audio.duration) * audio.currentTime);
                              }


                              var s2 = parseInt(audio.duration % 60);
                              var m2 = parseInt((audio.duration / 60) % 60);
    //Add 0 if seconds less than 10
                              if (s2 < 10) {
                                 s2 = '0' + s2;
                              }
                              $('#timeduration').html(m2 + ':' + s2); 
                              var value2 = 0;
                              if (audio.duration > 0) {
                                value2 = Math.floor(duration);
                              }



                        //    $('#timeduration').html(audio.duration);
                          
                              }
        }

        
        function movetimebar()
                             {
                              var value=(audio.currentTime/audio.duration)*100;
                              $('#prog').val(value); 
                             }


//play

       $(document).ready(function()
                                  {
                                     $('#playitit').click(function()
                                  {   $('#stop').show();
                                      audio.play();
                                      $('button#songdetail div#fadedetails').show();
                                      $('#playitit').show();
                                      $('#pause').show();
                                      $('#stop').html('stop');

                                  });
                                    });
      

///pause


            $(document).ready(function()
                                  { 
                                     $('#pause').click(function()
                                 {
                                      audio.pause();
                                      $('#pause').show()
                                      $('#playitit').show();

                                 });
                                     
                                    });

///stop

         $(document).ready(function()
                                  { 
                                  $('#stop').click(function()
                                               {
                                                  audio.pause();

                                                  $('#pause').show();
                                                  $('#playitit').show();
                                                  //$('#stop').html('stopped');
                                                   $('#stop').show();
                                                  audio.currentTime=0;
                                                   $('#currenttime').html(audio.currentTime);
                                                   var valuee=(audio.currentTime/audio.duration)*100;
                                                               $('#prog').val(valuee); 
                                               });
                                     
                                  });
       

///next

          $(document).ready(function()
                                  { 
                                    $('#next').click(function()
                                 {
                                    $('#stop').show();
                                    audio.pause();
                                    $('#pause').show()
                                    $('#playitit').show();
                                    
                                    unsetplay('#playlist li.active');
                                
                                ////////////////////////////playlist id ke us li ko uthaao jiski
                                 ///////////////gave id dynamically 
                                  
                                    if(next.length==0)
                                    {
                                      next=$('#playlist li:first-child');
                                    }
                                    else 
                                    {
                                     next=$('#playlist li.active').next();
                                    }
                                    $('#playlist li.active').attr("class","");
                                    initAudio(next);
                                 });
                                  
                                     
                                  });
         

///prev

        $(document).ready(function()
                                  { 
                                     $('#prev').click(function()
                                 {$('#stop').show();
                                    audio.pause(); 
                                    $('#pause').show()
                              $('#playitit').show();
                                    unsetplay('#playlist li.active');
                                    var prev;
                                    if(prev.length==0)
                                    {
                                      prev=$('#playlist li:last-child');
                                    }
                                    else 
                                    {
                                     prev=$('#playlist li.active').prev();
                                    }//////////////////////prev and next work for only once
                                    $('#playlist li.active').attr("class","");///////////////gave id dynamically 
                                    
                                  initAudio(prev);

                                 });
                                  });

        
///volume/////////////////////////////////////////
          $(document).ready(function()
                                  { 
                                    
                                     $('#volume').change(function()
                                   {
                                       
                                     audio.volume= (this.value)/10;

                                 });
                                  });
          $(document).ready(function()
                                  { 
                                      $('#playlist li').click(function () 
                                      { 
                                       //  $('div#fade').slideUp();
                                        // $(this).find('#fade').slideDown();
                                        

                               });
                                  });
          $(document).ready(function()
                                  { 
                                      $('#playlist li div#fade button#songdetail').click(function () 
                                      { 
                                         //$('div#fadedetails').slideUp();
                                         //$('div#fadedetails').slideDown();
                                         //$(this).find('#fadedetails').slideDown();
                                        

                               });
                                  });
           $(document).ready(function()
                                  { 
                                      $('#playlist li div#fade button#recommend').click(function () 
                                      { 
                                         //$('div#faderecommend').slideUp();
                                         //$('div#fadedetails').slideDown();
                                         //$(this).find('#faderecommend').slideDown();
                                        

                               });
                                  });
          






//////////play song on click
          $(document).ready(function()
                                  { 
                                      $('#playlist li button#play').click(function () 
                                      {if(audio)/////////////////if phle se kuch play ho rha hai to
                                        {
                                          if(audio.currentTime)
                                          {   unsetplay('#playlist li.active');
                                          audio.pause();
                                          $('#playlist li.active').attr("class","");
                                      }
                                   }
                                 
                                 $('#stop').show();
                                 //initAudio($(this).parent().eq(2));////////////////////////i want  (this-button#play) to be parameter of initAudio
                                 initAudio($(this).closest('li'));
                              });
                                  });
          
                   $(document).ready(function()
                                  { 
                                     $('#playlist li button#recommend #submitthis').click(function ()
                                   {      
                                        
                                        
                                         var use= $(this).closest('div');
                                         var use2= $(use).find('input').first().val();
                                         ajaxFunction($(this).closest('li').attr('song'),use2);
                                   });
                                    
                                  });


                    $(document).ready(function()
                                  { 
                                     $('#playlist li button#addthistoplay ').click(function ()
                                   {   
                                         popupUploadForm2($(this));
                                   });
                                    
                                  });

                     $(document).ready(function()
                                  { 
                                     $('#playlist li button#deletethissong').click(function ()
                                   {   
                                         
                                            var r= confirm('Are U sure U want to Delete this song from Downloads');
                                            if(r==true)
                                            {
                                                     ajaxFunctionDelete($(this));
                                            }
                                            else
                                            {
                                              location.reload();
                                            }
                                                                                    
                                   });
                                    
                                  });
            



    </script>
</head>
<body>

<?php
$dbc= mysqli_connect('localhost','root','','musicplayer');
include_once('countdownloads.php');
include_once('countplaylists.php');
if(isset($_SESSION['user']))
  {
    $useridd= $_SESSION['user'];
    $qry2= "SELECT * FROM user WHERE userid='$useridd'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
    $qry= "SELECT * FROM songs,usersong WHERE usersong.userid='$useridd' AND usersong.songid=songs.songid";
        $res= mysqli_query($dbc,$qry);

  }


?>
<!-- banner section -->
<section class="banner">
  <div class="container-fluid">
  <div class="navbar-wrapper">
    <div class="container" id="navedit">
      <nav class="navbar navbar-inverse navbar-static-top cl-effect-7">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><h1>Mellifluent</h1></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#contact">Contact</a></li>
              





              <?php
               $dbc= mysqli_connect('localhost','root','','musicplayer');
               
  
                  //echo $_SESSION['user'];
                  $userid=$password=$useridErr=$passwordErr="";
                  $fieldErr="";
                  if(isset($_POST["submitsearchform"]))
                  { 
                    if(empty($_POST['userid']))
                    {
                      $useridErr="Cannot Be Empty";
                    }
                    else
                    {
                      $userid=$_POST['userid'];

                    }
                    if(empty($_POST['password']))
                    {
                      $useridErr="Cannot Be Empty";
                    }
                    else
                    {
                      $password=$_POST['password'];
                    }
                    if($useridErr==""&&$passwordErr=="")
                    {
                      //$conn=new mysqli("localhost","root","","musicplayer");
                      $password=md5($password);
                      $sql="SELECT * FROM user WHERE email='$userid'";
                      $result=$dbc->query($sql);
                      if($result->num_rows==1){
                        $row=$result->fetch_assoc();
                      if(strcasecmp($password,$row["password"] )==0)
                      {
                        $_SESSION['user']=$row['userid'];
                        //////
                      }
                      else
                      {
                        $passwordErr="Invalid Password";
                        //header("location:index.php");
                      }
                      }
                      else
                      {
                        $fieldErr="No Such User Exist ";
                        //header("location:index.php");
                        
                      }
                    }
                    else
                    {
                      $fieldErr="Invalid User ID or Password";
                    }
                  }
  


// define variables and set to empty values
$nameErr = $emailErr = $passwordError = "";
$name = $email = $passwordsignup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['submitsignupform']))
  {
  if (empty($_POST["name"]))
  {
    $nameErr = "Name is required";
  } 
  else
  {
  $name = trim(stripslashes(htmlspecialchars(($_POST['name']))));
    // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email =trim(stripslashes(htmlspecialchars(($_POST['email']))));
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
   
  if (empty($_POST["passwordsignup"])) {
    $passwordError = "Cannot Be Empty";
  } else {
    $passwordsignup = $_POST['passwordsignup'];
  }
  if($nameErr==""&& $passwordError==""&& $emailErr=="")
  {
    $passwordsignup=md5($passwordsignup);
    //$conn=new mysqli("localhost","root","","musicplayer");
    if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
} 
    $sql= "INSERT INTO user(username,password,email) VALUES('$name','$passwordsignup','$email')";
      if($dbc->query($sql)==TRUE)
    {    
      $last_id = $dbc->insert_id;
      
      $_SESSION['user']=$last_id;
     // header("location:index.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $dbc->error;
    }
  }
}
}










               if(isset($_SESSION['user']))
                {
                  $useridd= $_SESSION['user'];
                  $qry2= "SELECT * FROM user WHERE userid='$useridd'";
                  $res2= mysqli_query($dbc,$qry2);
                  $row2=mysqli_fetch_array($res2);
                }


              if(!isset($_SESSION['user']))
              {

                ?>

              <li><a href="#loginregister" role="button" class="btn" data-toggle="modal" >Login/Register</a></li>

              <?php
              }
              else
              {
                ?>
              <li><a href="#work"><?php echo' Hi! '.$row2['username'].' '?></a></li>
              <li><a href="logout.php">Logout</a></li>

              <?php
              }

              ?>
            </ul>
          </div>  
          
        </div>


      </nav>

 


    </div>
    </div>
</div>
</section>



<div id="container">
      
  <div id="audio-player">
    
    
  <div id="innercontainer2">

    <?php 
    if(!mysqli_num_rows($res))
    {echo '<div id="emptyplay">';
      echo 'Downloads Empty!';
      echo'<a href="index.php">Add Songs</a>';
     echo '</div>';
    } 
    else
    {
      echo '<ul id="playlist">';   
      echo '<div id="recommendtores"></div>';
      while($row= mysqli_fetch_array($res))
        {
            
         echo'<li id="test" song='.$row["title"].' image='.$row["thumbnail"].' artist='.$row["artist"].'>
                                                                             <div id="detail">
                                                                           <div id="name" class="text-center">'.$row["title"].'</div>
                                                                           <div id="fade" class="text-center">
                                                                           <button id="play" class="btn btn-primary" style="margin: 1% 2%; ">Play <span class="glyphicon glyphicon-play" aria-hidden="true"></button>
                                                                           <button id="addthistoplay" style="margin: 1% 2%;" class="btn btn-success" valueofit='.$row["songid"].'>Add to Playlist <span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
                                                                           <button id="deletethissong" style="margin: 1% 2%;" class="btn btn-danger" valueofdel=" '.$row['songid'].'">Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></button>';
                                                                           //echo $_SESSION['user'];
                                                                                 if(isset($_SESSION['user']))
                                                                                 {
                                                                                  echo '<button id="songdetail" style="margin: 1% 2%;" class="btn btn-default" ><span class="glyphicon glyphicon-music" aria-hidden="true"><span id="fcuk"> Details</span>';
                                                                                  echo '<div id="fadedetails"><ul>
                                                                                                        <li id="test1">Title:'.$row["title"].'</li>
                                                                                                        <li id="test1">Artist:'.$row["artist"].'</li>
                                                                                                        <li id="test1">Genre:'.$row["genre"].'</li>
                                                                                                        <li id="test1">Album:'.$row["album"].'</li>
                                                                                                       </ul>
                                                                                                       </div>';
                                                                            echo '</button>';
                                                                       
                                                                                 }

                                                                                  echo '<button id="recommend" style="margin: 1% 2%;" class="btn btn-default" ><span class="glyphicon glyphicon-user" aria-hidden="true"><span id="fcuk"> Recommend to Users</span>';
                                                                                 echo '<div id="faderecommend">';///////////////email here needs validation
                                                                                                 ?>
                                                                                                 <label id="fcuk">User Email:</label>
                                                                                                  <div id="recommendingthis">
                                                                                                  <input type="email" class="form-control input-sm" name="recommendto" id="recommendtoit">
                                                                                                  <input id='submitthis' class="btn btn-default" type='submit' placeholder='email of user' >
                                                                                                  </div>
                                                                                                 
                                                                                                 <?php

                                                                                       echo '</div>';
                                                                            echo '</button>';
                                                                            echo'   
                                                                                 </div>                     
                                                                                 </div>
              </li>';
        }
        echo '</ul>';


                
                echo '<div id="emptyplay" class="text-center">';
        echo'<a href="index.php">Add More Songs</a>';
        echo '</div>';
        }
    ?>
    </div>
   </div>

</div>

<!-- footer section -->
<section class="footer" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 footer-agile">
        <h3>About Us</h3>
        <p class="footer-p1">MELLIFLUENT is an initutive Online Music Player based on PHP</p>
        <ul class="social-icons3">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul> 
      </div>
      <div class="col-lg-4 col-md-4 footer-agile">
        <h3>Our Links</h3>
        <div class="contact-w3ls">
          <div class="row"> 
            <div class="col-xs-4 contact-agile1">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
            </div>
            <div class="col-xs-8 contact-agile2">
              <div class="address">
                <h4>Visit Us</h4>
                <p>SDC Lab- Ajay Kumar Garg Engineering College</p>
              </div>  
            </div>  
          </div>
          <div class="row">
            <div class="col-xs-4 contact-agile1">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <div class="col-xs-8 contact-agile2">
              <div class="address">
                <h4>Mail Us</h4>
                <p><a href="mailto:si.akgec14@gmail.com">si.akgec14@gmail.com</a></p>
              </div>  
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 contact-agile1">
              <i class="fa fa-mobile" aria-hidden="true"></i>
            </div>
            <div class="col-xs-8 contact-agile2">
              <div class="address">
                <h4>Call Us</h4>
                <p>+91-7827133953</p>
              </div>
            </div>
          </div>
        </div>  
      </div>
      <div class="col-lg-4 col-md-4 footer-agile">
        <h3>Software Incubator<sup>TM</sup></h3>
        <a href="http://www.silive.in"><img src="images/SIlogo.png" style="height: 40%; width: 40%; z-index: -1;"></a>
      </div>
    </div>  
    <hr>
    <p class="copyright">&copy; 2017 Mellifluent. All rights reserved | Design by Ayush</p>
  </div><br><br><br>
</section>
<!-- /footer section -->

<div id="bottomplayer">
<div id="customcontainer">
      <div class="row">
          <div class="col-sm-2 col-xs-0"> 
                               <img id="cover" style="  width: 20vmin; height: 20vmin;" src="images/music-album.jpg" />
         </div>
          <div class="col-sm-3 col-xs-4" id="artistpadding"> 
                  <div id="audio-info">
                    <span class="artist" style="color: white;">Artist</span> - <span class="title" style="color: white;">Title</span>
                  </div>
                  <div id="tracker">
                    <div id="progressBar">
                      <span id="progress"><input id="prog" type="range" min='0' max='100' step='1' value="0"></span>
                    </div>
                    <span id="currenttime" style="color: white;">00:00</span><span style="color: white;"> | </span><span id="timeduration" style="color: white;">00:00</span>
                  </div>

          </div>
           <div class="col-sm-3 col-xs-4" id="consolepadding">             
                 <div id="buttons">
                   <span style="color: white;">
                        <div class="row">

                            <div class="col-xs-0 col-sm-1">
                           </div>
                            <div class="col-xs-2"><button id="prev"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span></button></div>
                            <div class="col-xs-2"><button id="playitit"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></button></div>
                            <div class="col-xs-2"><button id="pause"><span class="glyphicon glyphicon-pause" aria-hidden="true"></span></button></div>
                            <div class="col-xs-2"><button id="stop"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span></button></div>
                            <div class="col-xs-2"><button id="next"><span class="glyphicon glyphicon-forward" aria-hidden="true"></span></button></div>
                        </div>
                        <div class="row" id="volumeadj">
                          <div class="col-xs-1 col-sm-3"></div>
                          <div class="col-xs-1"><span class="glyphicon glyphicon-volume-up"></span></div>
                          <div class="col-xs-6"><input id="volume" type="range" min="0" max="10" value="10" step='1' style="padding-top: 5%;" /></div>
                          <div class="col-xs-2"></div>
                        </div>
                    </span>
                   </div>
                   </div>
            <div class="col-sm-4 col-xs-4" id="buttonpadding">
           </div>
       </div>
</div>
</div>


<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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
</body>
</html>
