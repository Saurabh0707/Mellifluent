<?php
session_start();
if(!isset($_SESSION['user'])) header('location:login.php');
if(isset($_SESSION['user']))
{
   
if (isset($_GET['file'])) { 
    $var_1 = $_GET['file'] ;
    $dir = "media/"; // trailing slash is important
    $file = $dir . $var_1;
    if (file_exists($file))
    {        
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
 
    header('Content-Disposition: attachment; filename='.basename($file));/////////////stored by base name
 
    header('Expires: 0');
    
    header('Cache-Control: must-revalidate');

    header('Pragma: public');
    
    header('Content-Length: ' . filesize($file));
        
    ob_clean();
 ///////////////////////////////////////////////////exit gadbad
    flush();
    
    readfile($file);
    header('location:index.php');
   //exit('uikjhgfd');
    } 
    } else { 
    header("HTTP/1.0 404 Not Found"); 
    echo "<h1>Error 404: File Not Found: <br /><em>$file</em></h1>"; 
}  
}
 
?>