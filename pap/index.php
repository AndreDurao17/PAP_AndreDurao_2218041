<!DOCTYPE html>

<?php
include "config.php";

if (isset($_POST['submit'])) {

    $uname = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    
    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from utilizadores where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>


<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="wrapper">
    <form class="form-signin" method="post" action="">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" id="username" placeholder="username" required="" autofocus="" />
      <input type="password" class="form-control"name="password" name="password" placeholder="Password" required=""/>      
      <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">Login</button>   
    </form>
  </div>
<!-- partial -->
  
</body>
</html>
