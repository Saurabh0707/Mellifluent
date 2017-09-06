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
<!-- js files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

    <style type="text/css">
      ul li{
        cursor: pointer;
      }
      input
      {
          cursor: pointer;  
      }
    </style>
    <?php
    session_start();
    include_once('createplay.php');

    
    if(!isset($_SESSION['user'])) header('location:index.php');
    ?>
    <script src="js/jquery.js"></script>

    <script language = "javascript" type = "text/javascript">
        
       
  
    var audio, prog;
    function loadit(){             
                                   //$('div#fade').hide();
                                   //$('#pause').hide();
                                   $('#playlist').show();
                                   $('#audio-info').show();
                                   $('#tracker').show();
                                   $('#buttons').show();
                                   //$('div#fade').slideUp();
                                   ///not working without document.ready
                                    $(document).ready(function()
                                  { 
                                    $('#pause').hide();
                                    $('div#fade').slideUp();  
                                    $('div#fadedetails').slideUp();  
                                                                        
                                  });


                            }
      window.onload= loadit();   

       function ajaxFunctionDelete(element1,element2)
        {
           var ajaxRequest;  
           var deletesong = element1;
           var deleteplay = element2;

           
           var queryString = "?deletethissong=" + deletesong + "& deletefromplay="+ deleteplay;
                  
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
         



           ajaxRequest.open("GET", "deletefromplaylist.php" + queryString, true);
           ajaxRequest.send(null);

           ajaxRequest.onreadystatechange = function(){
              if(ajaxRequest.readyState == 4){
                location.reload();
                
                // alert(ajaxRequest.responseText);
               }
           }
           
       }


      function initAudio(element)
       {    
            var songname= element.attr('song');////is trah ke attrbute ke liye phle se koi syntax nai hai so element.attr krna pdhta hai
          var artist=element.attr('artist');
          var title=element.attr('song');
                
          audio= new Audio('media/'+ songname);
          $(element).attr("class","active");///////////////gave id dynamically
          setplay(element);
          if(!audio.currentTime)//////anysong is being played
          {   audio.play();
            $('.title').html(title);
            $('.artist').html(artist);
            timecheck();

              $('#play').hide();
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
                            
                            $('#timeduration').html(audio.duration);
                        $('#currenttime').html(audio.currentTime);
                          
                      
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
                                     $('#play').click(function()
                                  {   $('#stop').show();
                                      audio.play();
                                      $('button#songdetail div#fadedetails').hide();
                                      $('#play').hide();
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
                                      $('#pause').hide()
                                      $('#play').show();

                                 });
                                     
                                    });

///stop

         $(document).ready(function()
                                  { 
                                  $('#stop').click(function()
                                               {
                                                  audio.pause();

                                                  $('#pause').hide();
                                                  $('#play').show();
                                                  //$('#stop').html('stopped');
                                                   $('#stop').hide();
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
                                    $('#pause').hide()
                              $('#play').show();

                                     unsetplay('#playlist li.active');
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
                                    $('#pause').hide()
                              $('#play').show();
                                     unsetplay('#playlist li.active');
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
                                         $('div#fade').slideUp();
                                         //$('div#fadedetails').slideUp();
                                         //$('div#faderecommend').slideUp();
                                         //$('div#').slideUp();
                                         
                                        $(this).find('#fade').slideDown();
                                        

                               });
                                  });
          $(document).ready(function()
                                  { 
                                      $('#playlist li div#fade button#songdetail').click(function () 
                                      { 
                                         $('div#fadedetails').slideUp();
                                         //$('div#fadedetails').slideDown();
                                         $(this).find('#fadedetails').slideDown();
                                        

                               });
                                  });
           $(document).ready(function()
                                  { 
                                      $('#playlist li div#fade button#recommend').click(function () 
                                      { 
                                         $('div#faderecommend').slideUp();
                                         //$('div#fadedetails').slideDown();
                                         $(this).find('#faderecommend').slideDown();
                                        

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
                                     $('#playlist li button#deletethissong').click(function ()
                                   {   
                                          var todeletesong = $(this).attr('valueofdel');
                                          var todeleteplay = $(this).attr('playlistkiid');

                                            var r= confirm('Are U sure U want to Delete this song from playlist');
                                            if(r==true)
                                            {
                                                     ajaxFunctionDelete(todeletesong,todeleteplay);
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
if(isset($_SESSION['user']))
  {
    $useridd= $_SESSION['user'];
    $playlistid=$_GET['playlistid'];
    $qry2= "SELECT * FROM user WHERE userid='$useridd'";
    $res2= mysqli_query($dbc,$qry2);
    $row2=mysqli_fetch_array($res2);
    $qry= "SELECT * FROM userplaylist, playlistsong, songs WHERE userplaylist.userid='$useridd' AND userplaylist.playlistid='$playlistid' AND userplaylist.playlistid=playlistsong.playlistid AND songs.songid=playlistsong.songid";
    $res= mysqli_query($dbc,$qry);

  }


?>

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


<div id="innercontainer2">

    

    <?php 
    if(!mysqli_num_rows($res))
    {echo '<div id="emptyplay">';
      echo 'Your PLaylist Is Empty!';
      echo'<a href="yourdownload.php">Add Songs</a>';
     echo '</div>';
    } 
    else
    {
      echo '<ul id="playlist">';   
      while($row= mysqli_fetch_array($res))
        {
            
         echo'<li id="test" song='.$row["title"].' artist='.$row["artist"].'>
                                                                             <div id="detail">
                                                                           <div id="name" class="text-center">'.$row["title"].'</div>
                                                                           <div id="fade" class="text-center">
                                                                           <button id="play" class="btn btn-primary" style="margin: 1% 2%; ">Play <span class="glyphicon glyphicon-play" aria-hidden="true"></button>
                                                                           <button id="deletethissong" valueofdel=" '.$row['songid'].'" playlistkiid="'.$playlistid.'" style="margin: 1% 2%;" class="btn btn-danger" >Delete <span class="glyphicon glyphicon-trash" aria-hidden="true"></button>';
                                                                           
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

                                                                                  /* 
                                                                                 else
                                                                                 {
                                                                                   echo '<button id= "details">';
                                                                                   
                                                                                   echo'</button>';

                                                                                 }
                                                                           */   echo'   
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
</body>
</html>




