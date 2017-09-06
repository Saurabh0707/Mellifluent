<?php
/*session_start();
if(isset($_SESSION['user']))
{
  header("location:index.php");
} 
else*/
{
?>
<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body class="container">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<?php
// define variables and set to empty values
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['submit']))
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
   
  if (empty($_POST["password"])) {
    $passwordErr = "Cannot Be Empty";
  } else {
    $password = $_POST['password'];
  }
  if($nameErr==""&& $passwordErr==""&& $emailErr=="")
  {
    $password=md5($password);
    $conn=new mysqli("localhost","root","","musicplayer");
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $sql= "INSERT INTO user(username,password,email) VALUES('$name','$password','$email')";
      if($conn->query($sql)==TRUE)
    {    
      $last_id = $conn->insert_id;
      session_start();
      $_SESSION['user']=$last_id;
      header("location:index.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
}
?>

  <div id="loginmodal">
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
           <input type="password" name="password" id="pwd" class="form-control" value="<?php echo $password;?>">
  <span class="error"><?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block">  
</form>
</div>
</body>
</html>
<?php } ?>