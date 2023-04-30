<?php
session_start();

include 'db_conn.php';
$er_incorrect=$er_username=$er_password="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

$username=isset($_POST['fusername'])?$_POST['fusername']:"";
$password=isset($_POST['fpassword'])?$_POST['fpassword']:"";

if(empty($username))
$er_username="Can't username empty";
else if(empty($password))
$er_password="Can't password empty";

else{
    $query = "SELECT * FROM accounts WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);

        if($row['username']==$username&&$row['password']==$password)
        {
            $_SESSION['username']=$username;
            header("Location:index.php");
            exit();
        }
        else
        {
            $er_incorrect="Username or password is incorret";
        }

    } 
    else
    {
        $er_incorrect="Username or password is incorret";
    }      

}
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">
    <title>Log in </title>

</head>
<body>
    


<div class="login-page">

<div><img src="resource/l.jpg" alt=""></div>

<div class="box-login">

<h1>Log In </h1>

<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<span class="error"><?php echo $er_incorrect;?></span>


<label class="login-items"> Username :</label>
<input type="text" name="fusername" >
<span class="error"><?php echo $er_username;?></span>


<label class="login-items"> password :</label>
<input type="password" name="fpassword" >
<span class="error"><?php echo $er_password;?></span>

<button type="submit" class="login-btn">Login</button>


 <label >Don't Hava Account</label> <a href="sign-up.php">Sign Up</a>

</form>
</div>


</div>

</body>
</html>