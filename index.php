<!DOCTYPE html>
<html>
<head>
    <title>Mellifluent- Music Player</title>

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
      ul li{
        cursor: pointer;
      }
    </style>
    <?php
    session_start();
    include_once('createplay.php');
    ?>

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
    $('#songsearchsubmitform').on('submit', function() {
    	alert('submitted');
    $('html, body').animate({
         scrollTop: $("#work").offset().top
    }, 2000);
    return false;
    });



    function popupUploadForm()
        {
           var newWindow4 = window.open('/mylearning/mp3player/createplaylists.php', 'name4', 'height=500,width=600');
        }
    function popupUploadForm3(elem)
       {  
        var newWindow5 = window.open('/mylearning/mp3player/yourplaylist.php', 'name5', 'height=500,width=600');
        }   

        function popupUploadFormx()
       {
        var newWindow6 = window.open('/mylearning/mp3player/myrecommend.php', 'name6', 'height=500,width=600');
        }
    
        
        function ajaxsignin()
        {
           var ajaxRequest;             
                  
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
         



           ajaxRequest.open("GET", "login.php", true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
              //  var divxx= document.getElementById('dixx');
                document.getElementById('divxx').innerHTML = ajaxRequest.responseText;
                // alert(ajaxRequest.responseText);
               }
           }
           
       }


 function ajaxsignup(element1,element2)
        {
           var ajaxRequest2;             
                  
           try {
            
              ajaxRequest2 = new XMLHttpRequest();
           }catch (e) {
              
              try {
                 ajaxRequest2 = new ActiveXObject("Msxml2.XMLHTTP");
              }catch (e) {
                 try{
                    ajaxRequest2 = new ActiveXObject("Microsoft.XMLHTTP");
                 }catch (e){
                   
                    
                    return false;
                 }
              }
           }
                      ///////////////////////////////////////////////////yha POST lga kr dekho zara
         



           ajaxRequest2.open("GET", "register.php", true);
           ajaxRequest2.send(null);

           ajaxRequest2.onreadystatechange = function(){
              if(ajaxRequest2.readyState == 4){
              //  var divxx= document.getElementById('dixx');
                document.getElementById('divxx2').innerHTML = ajaxRequest2.responseText;
                // alert(ajaxRequest.responseText);
               }
           }
           
       }




    var audio, prog;
     function loadit(){             
                                  


               
                                  /*  $('html, body').animate({
                                        scrollTop: $('section#work').offset().top }, 'slow');
                                     */


                                   $('#playlist').show();
                                   $('#audio-info').show();
                                   $('#tracker').show();
                                   $('#buttons').show();
                                   //$('div#fade').slideUp();
                                   ///not working without document.ready
                                    $(document).ready(function()
                                  { 
                                    $('#pause').addClass('disabled');
                                    //$('div#fade').slideUp();                                      
                                  });


                            }
      window.onload= loadit();                         
    
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


       /*function setplay(element)
        {
          $(element).css({"font-size":"200%"});  
        }
     //////////////////////// sets appearance of song being played
        function unsetplay(element)
        {
          $(element).css({"font-size":"100%"});  
        }
*/
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
                                value2 = Math.floor(audio.duration);
                              }



                         //   $('#timeduration').html(audio.duration);
                          
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
                                    //  $('#play').hide();
                                      $('#pause').show();
                                      //$('#stop').html('stop');
                                      $('#stop').show();
                                      
                                      
                                  });
                                    });
      

///pause


            $(document).ready(function()
                                  { 
                                     $('#pause').click(function()
                                 {
                                      audio.pause();
                                     // $('#pause').hide();
                                      $('#playitit').show();

                                 });
                                     
                                    });

///stop

         $(document).ready(function()
                                  { 
                                  $('#stop').click(function()
                                               {
                                                  audio.pause();

                                                  //$('#pause').hide();
                                                  $('#playitit').show();
                                                  //$('#stop').html('stopped');
                                                  // $('#stop')();
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
                                   // $('#pause').hide();
                              $('#playitit').show();

                                    // unsetplay('#playlist li.active');
                                  var next=$('#playlist li.active').next();////////////////////////////playlist id ke us li ko uthaao jiski
                                  $('#playlist li.active').attr("class","");///////////////gave id dynamically 
                                  if(next.length==0)/////////////////////////////class active ho aur wo class active ka next sibling ho
                                    next=$('#playlist li:first-child');
                                    initAudio(next);
                                 });
                                  
                                     
                                  });
         

///prev

        $(document).ready(function()
                                  { 
                                     $('#prev').click(function()
                                 {$('#stop').show();
                                    audio.pause(); 
                                   // $('#pause').hide();
                              $('#playitit').show();
                                     //unsetplay('#playlist li.active');
                                    var prev=$('#playlist li.active').prev();//////////////////////prev and next work for only once
                                    $('#playlist li.active').attr("class","");///////////////gave id dynamically 

                                    if(prev.length==0)
                                    prev=$('#playlist li:last-child');
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
                                        // $('div#fade').slideUp();
                                        //$(this).find('#fade').slideDown();
                                        

                               });
                                  });
          






//////////play song on click
          $(document).ready(function()
                                  { 
                                      $('ul#playlist li button#play').on('click',function () 
                                      {

                                   

                                     // alert('ghtjk');
                                      if(audio)/////////////////if phle se kuch play ho rha hai to
                                        { 
                                          if(audio.currentTime)
                                          {  // unsetplay('#playlist li.active');
                                          audio.pause();
                                          $('#playlist li.active').attr("class","");
                                      }
                                   }
                                 
                                 $('#stop').show();
                                 //initAudio($(this).parent().eq(2));////////////////////////i want  (this-button#play) to be parameter of initAudio
                                 initAudio($(this).closest('li'));
                              });
                                  });
          


    </script>
</head>
<body>

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
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#work">Search</a></li>
              <li><a href="#team">Team</a></li>
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

  
                <div class="modal fade" id="loginregister" role="dialog" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header" style="background-color: #000;">
                        <button type="button" class="close" style="color: white;" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" style="color: white;">Login/Register</h3>
                      </div>
                      <div class="modal-body">
                            <div class="tabbable">
                            <ul class="nav nav-tabs" >
                            <li class="active"><a href="#tab1" data-toggle="tab" >LOGIN</a></li>
                            <li><a href="#tab2" data-toggle="tab" >SIGNUP</a></li>
                            </ul>
                            <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div id="divxx">
                                   
                                   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <label for="mail">Email:</label> 
                                    <input type="text" name="userid" id="mail" class="form-control"  value="<?php echo $userid;?>">
                                    <span class="error"> <?php echo $useridErr;?></span>
                                    <br><br>
                                          <label for="pwd">Password:</label> 
                                          <input type="password" name="password" class="form-control" id="pwd" value="<?php echo $password;?>">
                                    <span class="error"><?php echo $passwordErr;?></span>
                                    <br><br>
                                    <span class="error"><?php echo $fieldErr?></span>
                                    <input type="submit" name="submitsearchform" value="Submit" class="btn btn-primary btn-block">  
                                    </form>  
                                    


                                </div>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <div id="divxx2">
                                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                                    <label for="name">Name:</label> 
                                     <input type="text" id="name" name="name" class="form-control"  value="<?php echo $name;?>">
                                     <span class="error"> <?php echo $nameErr;?></span>
                                     <br><br>
                                     <label for="email">Email:</label> 
                                     <input type="text" name="email" id="email" class="form-control"  value="<?php echo $email;?>">
                                     <span class="error"> <?php echo $emailErr;?></span>
                                     <br><br>
                                     <label for="pwd">Password:</label> 
                                     <input type="password" name="passwordsignup" id="pwd" class="form-control" value="<?php echo $password;?>">
                                     <span class="error"><?php echo $passwordError;?></span>
                                     <br><br>
                                     <input type="submit" name="submitsignupform" value="Submit" class="btn btn-primary btn-block">  
                                </form>





                                </div>
                            </div>
                            </div>
                            </div>
                      </div>
                    </div>
                  </div>
                </div>


  <div id="boot_slider">
    <div class="col-xs-12 col-lg-12" id="slider_full">
      <div class="container">
        <div class="slider_nav col-xs-12 col-lg-12">
          <p id="slider_prev"><i class="fa-arrow-circle-left fa"></i></p>
          <p id="slider_next"><i class="fa-arrow-circle-right fa"></i></p>
        </div>
      </div>  
      <div class="col-xs-12 col-lg-12" id="slider_full_items">
        <div class="col-xs-12 col-lg-12 slider_full_item">
          <div class="opacity"></div>
          <div class="img_large" style="background-image:url('images/banner1.jpg'); background-position:center; background-repeat:no-repeat; background-sixe">
            <div class="container">
              <p>
                <span>MELLIFLUENT</span>
                <span class="slider_full_desc">Music is a higher revelation than all wisdom and philosophy</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-lg-12 slider_full_item">
          <div class="opacity"></div>
          <div class="img_large" style="background-image:url('images/banner2.jpg');">
            <div class="container">
              <p>
                <span>MELLIFLUENT</span>
                <span class="slider_full_desc">Music is the movement of sound to reach the soul for the education of its virtue</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-lg-12 slider_full_item">
          <div class="opacity"></div>
          <div class="img_large" style="background-image:url('images/banner3.jpg');">
            <div class="container">
              <p>
                <span>MELLIFLUENT</span>
                <span class="slider_full_desc">Where words fail Music Speaks</span>
              </p>
            </div>  
          </div>
        </div>
        <div class="col-xs-12 col-lg-12 slider_full_item">
          <div class="opacity"></div>
          <div class="img_large" style="background-image:url('images/banner4.jpg');">
            <div class="container">
              <p>
                <span>MELLIFLUENT</span>
                <span class="slider_full_desc">Without music, life would be a mistake. </span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-lg-12 slider_full_item">
          <div class="opacity"></div>
          <div class="img_large" style="background-image:url('images/banner5.jpg');">
            <div class="container">
              <p>
                <span>MELLIFLUENT</span>
                <span class="slider_full_desc">Of all the music that reached farthest into heaven, it is the beating of a loving heart</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-12" id="slider_loading"></div>
    </div>
  </div>
  </div>
</section>
<!-- /banner section -->  
<!-- about section -->
<section class="about" id="about">
  <div class="container">
    <h2 class="text-center">About Project</h2>
    <p class="text-center">Mellifluent is an inituitive Online Music Player :)</p>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 about-w3ls1">
        <div class="about-agile">
          <i class="fa fa-music" aria-hidden="true"></i>
          <h4>Stream Music</h4>
          <p class="about-p1">Stream Unlimited Music without even Creating Account.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 about-w3ls1">
        <div class="about-agile">
          <i class="fa fa-volume-up" aria-hidden="true"></i>
          <h4>Browse Latest Songs</h4>
          <p class="about-p1">1000s of latest songs to choose from all genres.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 about-w3ls1">
        <div class="about-agile">
          <i class="fa fa-headphones" aria-hidden="true"></i>
          <h4>Create Playlists</h4>
          <p class="about-p1">Create playlists to quickly access your favorite songs</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 about-w3ls1">
        <div class="about-agile">
          <i class="fa fa-play" aria-hidden="true"></i>
          <h4>Download Songs</h4>
          <p class="about-p1">You can even download your favorite songs to listen offline.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /about section -->

   <?php

              include_once('countdownloads.php');
              include_once('countplaylists.php');
             
              $erruser="";
              $usersearch="";
         
              ?>



<!-- work section -->

<section class="work" id="work">
  <div class="container">
    <h3 class="typer text-center" data-typer-targets='{ "targets" : ["SEARCH SONGS", "ALL SONGS OF YOUR TASTE", "MAKING MUSIC LIKE NEVER BEFORE!"]}'></h3>
    <p class="text-center">Browse through 1000s of songs from our customised database.</p>
                    
                <div id="audio-player">
                 <br>
                    <div id="innercontainer">
                              <form id="songsearchsubmitform" enctype="multipart/form-data" method="GET" action="<?php echo $_SERVER['PHP_SELF']?>">
                                 <div class="input-group">
                                <input type="text" name="songinput" id="songinputid" class="form-control input-lg" style="z-index: 0;" value="<?php if(isset($_GET['songinput'])) echo $usersearch;?>">
                                <div class="input-group-btn">
                                <input type="submit" name="songsubmit" id="songsubmitid" value="Search"  style="z-index: 0;" class="btn btn-primary btn-lg">
                                </div>
                                </div>
                                <span id="usererror" style="color:red; font-family: sans-serif; font-size:2vmin;"><?php if(isset($_GET['songinput'])) echo $erruser; ?></span>
                               </form>
                                   <?php  
                                  if(isset($_GET['songinput']))
                                  {     

                                      if (empty($_GET['songinput'])) 
                                      {
                                        $erruser = "Name is required";
                                      } else 
                                        { 
                                        $usersearch=$_GET['songinput'];
                                        if (!preg_match("/^[a-zA-Z ]*$/",$usersearch))
                                        {
                                          $erruser = "Only letters and white space allowed"; 
                                        }
                                              
                                      else {

                                        $j=0;
                                        $explodeusersearch= explode(' ', $usersearch);
                                         $qry= "SELECT * FROM songs";
                                         $res= mysqli_query($dbc,$qry);

                                        echo '<ul id="playlist">';   
                                        while($row= mysqli_fetch_array($res))
                                        {
                                         $i=0;

                                      $dbsearch=$row['title'];
                                       
                                      $chopdbsearch = str_replace('.mp3',"",$dbsearch);
                                      $explodedbsearch= explode('_', $chopdbsearch);
                                       

                                      foreach($explodedbsearch as $dbchop)
                                      {
                                        $lowerdbchop=strtolower($dbchop);
                                            
                                            foreach ($explodeusersearch as $userchop) 
                                        { 
                                          $loweruserchop=strtolower($userchop);

                                          
                                          if(strcmp($lowerdbchop , $loweruserchop)==0)
                                          {
                                                    $i++;
                                          }
                                          }
                                      }
                                        if($i!=0) 
                                        {
                                          
                                         $j++;

                                            
                                        echo'<li class="" id="test" song='.$row["title"].' image='.$row["thumbnail"].' artist='.$row["artist"].'>
                                           <div id="detail">
                                           <div id="name" class="text-center">'.$row["title"].'</div>
                                           <div id="fade" class="text-center">
                                           <button id="play" class="btn btn-primary" style="margin: 0 2%; "><span class="glyphicon glyphicon-play" aria-hidden="true"></button>';
                                           
                                           //echo $_SESSION['user'];
                                                 if(isset($_SESSION['user']))
                                                 {
                                                  echo'<button id="download" class="btn btn-success" style="margin: 0 2%; ">';
                                                  echo '<a style="text-decoration:none; color: white;" href="addsong.php?file='.$row["title"].'"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></a>';
                                                  echo '</button>';
                                                 }
                                                
                                                 else
                                                 {
                                                   echo '<button id= "download" class="btn btn-success" ><a style="text-decoration:none; color: white;" href="login.php">Login To Download</a></button>';

                                                 }
                                              echo'   
                                                 </div>                     
                                                 </div>
                                              </li>';
                                        echo '</ul>';
                                      }
                                    }
                                    if($j==0)
                                      echo 'No results found';
                                  }}}?>
                
                 </div>
                </div>

              </div>
              </section>

<!-- /work section -->

<!-- team section -->
<section class="team" id="team">
  <div class="container">
    <h3 class="text-center">Meet Our Team</h3>
    <p class="text-center">POWERED BY- SOFTWARE INCUBATOR</p>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 team-w3ls"> 
        <div class="team-agileits"> 
          <div class="view view-first">
            <div>
              <img src="images/team1.jpg" alt="team" class="img-responsive">
            </div>
            <div class="mask">
              <h5>Saurabh Verma</h5>
              <p class="w3ls1">PHP Developer</p>
              <span class="line2"></span>
              <p class="w3ls2">Lead Developer in this project.</p>
              <ul class="social-icons1">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
          <h4>Saurabh</h4>  
        </div>  
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 team-w3ls"> 
        <div class="team-agileits">
          <div class="view view-first">
            <div>
              <img src="images/team4.jpg" alt="team" class="img-responsive">
            </div>
            <div class="mask">
              <h5>Ayush Singh</h5>
              <p class="w3ls1">UI/UX Designer</p>
              <span class="line2"></span>
              <p class="w3ls2">Lead Web Designer behind this awesome website.</p>
              <ul class="social-icons1">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
          <h4>Ayush</h4>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /team section -->

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


           
                        <?php
                      if(!isset($_SESSION['user']))
                      {

                        ?>
                        <div></div>
                      <?php
                      }
                      else
                      {
                        ?>
                        <div id="playeroptions">
 
                           <?php echo '<a href="yourdownload.php" id="custombutton">Downloads('.countdownloads().')</a>';?>
                           <input type="submit" value="Create Playlist" id="custombutton" onclick="popupUploadForm()"/>
                           <button id="yourrecommendations" id="custombutton" onclick="popupUploadFormx()">Recommendation</button>
                           <?php echo '<button id="yourplaylist" id="custombutton" onclick="popupUploadForm3()">Playlist('.countplaylists().')</button>';?>

                         </div>
                      <?php
                      }

                      ?>
           </div>
       </div>
</div>
</div>
<a href="#0" class="cd-top">Top</a>




<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript">
	String.prototype.rightChars = function(n){
  if (n <= 0) {
    return "";
  }
  else if (n > this.length) {
    return this;
  }
  else {
    return this.substring(this.length, this.length - n);
  }
};

(function($) {
 
  var options = {
  highlightSpeed    : 20,
  typeSpeed         : 100,
  clearDelay        : 1500,
  typeDelay         : 200,
  clearOnHighlight  : true,
  typerDataAttr     : 'data-typer-targets',
  typerInterval     : 1000
 },
    highlight,
    clearText,
    backspace,
    type,
    spanWithColor,
    clearDelay,
    typeDelay,
    clearData,
    isNumber,
    typeWithAttribute,
    getHighlightInterval,
    getTypeInterval,
    typerInterval;

  spanWithColor = function(color, backgroundColor) {
    if (color === 'rgba(0, 0, 0, 0)') {
      color = 'rgb(255, 255, 255)';
    }

    return $('<span></span>')
      .css('color', color)
      .css('background-color', backgroundColor);
  };

  isNumber = function (n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
  };

  clearData = function ($e) {
    $e.removeData([
      'typePosition',
      'highlightPosition',
      'leftStop',
      'rightStop',
      'primaryColor',
      'backgroundColor',
      'text',
      'typing'
    ]);
  };

  type = function ($e) {
    var
      // position = $e.data('typePosition'),
      text = $e.data('text'),
      oldLeft = $e.data('oldLeft'),
      oldRight = $e.data('oldRight');

    // if (!isNumber(position)) {
      // position = $e.data('leftStop');
    // }

    if (!text || text.length === 0) {
      clearData($e);
      return;
    }


    $e.text(
      oldLeft +
      text.charAt(0) +
      oldRight
    ).data({
      oldLeft: oldLeft + text.charAt(0),
      text: text.substring(1)
    });


    setTimeout(function () {
      type($e);
    }, getTypeInterval());
  };

  clearText = function ($e) {
    $e.find('span').remove();

    setTimeout(function () {
      type($e);
    }, typeDelay());
  };

  highlight = function ($e) {
    var
      position = $e.data('highlightPosition'),
      leftText,
      highlightedText,
      rightText;

    if (!isNumber(position)) {
      position = $e.data('rightStop') + 1;
    }

    if (position <= $e.data('leftStop')) {
      setTimeout(function () {
        clearText($e);
      }, clearDelay());
      return;
    }

    leftText = $e.text().substring(0, position - 1);
    highlightedText = $e.text().substring(position - 1, $e.data('rightStop') + 1);
    rightText = $e.text().substring($e.data('rightStop') + 1);

    $e.html(leftText)
      .append(
        spanWithColor(
            $e.data('backgroundColor'),
            $e.data('primaryColor')
          )
          .append(highlightedText)
      )
      .append(rightText);

    $e.data('highlightPosition', position - 1);

    setTimeout(function () {
      return highlight($e);
    }, getHighlightInterval());
  };

  typeWithAttribute = function ($e) {
    var targets;

    if ($e.data('typing')) {
      return;
    }

    try {
      targets = JSON.parse($e.attr($.typer.options.typerDataAttr)).targets;
    } catch (e) {}

    if (typeof targets === "undefined") {
      targets = $.map($e.attr($.typer.options.typerDataAttr).split(','), function (e) {
        return $.trim(e);
      });
    }

    $e.typeTo(targets[Math.floor(Math.random()*targets.length)]);
  };

  // Expose our options to the world.
  $.typer = (function () {
    return { options: options };
  })();

  $.extend($.typer, {
    options: options
  });

  //-- Methods to attach to jQuery sets

  $.fn.typer = function() {
    var $elements = $(this);

    return $elements.each(function () {
      var $e = $(this);

      if (typeof $e.attr($.typer.options.typerDataAttr) === "undefined") {
        return;
      }

      typeWithAttribute($e);
      setInterval(function () {
        typeWithAttribute($e);
      }, typerInterval());
    });
  };

  $.fn.typeTo = function (newString) {
    var
      $e = $(this),
      currentText = $e.text(),
      i = 0,
      j = 0;

    if (currentText === newString) {
      console.log("Our strings our equal, nothing to type");
      return $e;
    }

    if (currentText !== $e.html()) {
      console.error("Typer does not work on elements with child elements.");
      return $e;
    }

    $e.data('typing', true);

    while (currentText.charAt(i) === newString.charAt(i)) {
      i++;
    }

    while (currentText.rightChars(j) === newString.rightChars(j)) {
      j++;
    }

    newString = newString.substring(i, newString.length - j + 1);

    $e.data({
      oldLeft: currentText.substring(0, i),
      oldRight: currentText.rightChars(j - 1),
      leftStop: i,
      rightStop: currentText.length - j,
      primaryColor: $e.css('color'),
      backgroundColor: $e.css('background-color'),
      text: newString
    });

    highlight($e);

    return $e;
  };

  //-- Helper methods. These can one day be customized further to include things like ranges of delays.

  getHighlightInterval = function () {
    return $.typer.options.highlightSpeed;
  };

  getTypeInterval = function () {
    return $.typer.options.typeSpeed;
  },

  clearDelay = function () {
    return $.typer.options.clearDelay;
  },

  typeDelay = function () {
    return $.typer.options.typeDelay;
  };

  typerInterval = function () {
    return $.typer.options.typerInterval;
  };
})(jQuery);





$('.type-once').typeTo("Testing Typer.js jQuery Plugin with a 1 time text string.");



$('[data-typer-targets]').typer({
  highlightSpeed    : 2660,
  typeSpeed         : 8600,
  clearDelay        : 6500,
  typeDelay         : 6200,
  clearOnHighlight  : false,
  typerDataAttr     : 'data-typer-targets',
  typerInterval     : 2000
});
</script>

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
<!-- back to top -->
<script src="js/main.js"></script> 
<!-- /back to top -->
<!-- js for work section -->
<script src="js/jQuery.lightninBox.js"></script>
<script type="text/javascript">
  $(".lightninBox").lightninBox();
</script>
<!-- /js for work section -->
<!-- js for tabs -->
<script src="js/cbpFWTabs.js"></script>
<script>
  (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
          new CBPFWTabs( el );
        });

  })();
</script>
<!-- /js for tabs -->
<!-- js files for banner -->
<script src="js/boot_slider.js" type="text/javascript"></script>
<!-- /js files for banner -->
<!-- /js files -->
</body>
</html>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
