<?php
session_start();
include 'db_conn.php';
$name=$username=$password=$repassword=$phone=$city=$type_account=$gender=$birthday="";

$er_name=$er_username=$er_password=$er_repassword=$er_phone=$er_city=$er_type_account="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$type_account=$_POST['ftype-account'];
$city=$_POST['fcity'];

$name=isset($_POST['fname'])? valid_data($_POST['fname']):"";
$username=isset($_POST['fusername'])? valid_data($_POST['fusername']):"";
$password=isset($_POST['fpassword'])? valid_data($_POST['fpassword']):"";
$password=isset($_POST['fre-password'])? valid_data($_POST['fre-password']):"";
$phone=isset($_POST['fphone'])? valid_data($_POST['fphone']):"";
$birthday=isset($_POST['fbirthday'])? valid_data($_POST['fbirthday']):"";
$gender=isset($_POST['fgender'])? valid_data($_POST['fgender']):"";



    if (empty($_POST['fname'])) 
    {
    $er_name="Name Can't Empty";
    }
  
    if (empty($_POST['fusername'])) 
    {
    $er_username="Username Can't Empty";
    }
    if (empty($_POST['fpassword'])) 
    {
    $er_password="password Can't Empty";
    }
   else  if (empty($_POST['fre-password'])) 
    {
    $er_repassword="Re - Password Can't Empty";
    }
    else if ($_POST['fre-password']<>$_POST['fpassword']) 
    {
    $er_password="Password Not Match";
    }

    if (empty($_POST['fphone'])) 
    {
    $er_phone="phone Can't Empty";
    }
   

    $query="SELECT username from accounts where username='$username'";
    $result=mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0)
{   
  $er_username="The user name is found !"; 
}
else if(!empty($name) && !empty($username)&& !empty($password)&& !empty($phone) )
    {
    $sql="INSERT INTO accounts(name,username,password,birthday,gender,phone,city,type_account,image)
    VALUES ('$name','$username','$password','$birthday','$gender','$phone','$city','$type_account','icon.png')";
    
        if (mysqli_query($conn, $sql)) 
        {
        $er_name= "New record created successfully";
        $_SESSION["username"]=$username;
        header("Location:index.php");
        exit;
        } 
        else
        {
            $er_name="k".mysqli_error();
        }

    }
} 

function valid_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">


    <title>Sign Up</title>
</head>
<body>
    <div class="signup-page">

        <div>
            <img src="resource/l.jpg">
        </div>

        <div class="box-signup">

            <h1>Sign Up</h1>
            
            <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <label class="signup-items" > Name :</label>
                <input type="text" name="fname" class="box-item" value="<?php echo $name;?>">
                <span class="error"><?php echo $er_name;?></span>

                <label class="signup-items" > Username :</label>
                <input type="text" name="fusername" class="box-item" value="<?php echo $username;?>">
                <span class="error"><?php echo $er_username;?></span>

                <label class="signup-items" > Password :</label>
                <input type="password" minlength="5" name="fpassword" class="box-item" value="<?php echo $password;?>">
                <span class="error"><?php echo $er_password;?></span>

                
                <label class="signup-items" > Re Password :</label>
                <input type="password" minlength="5" name="fre-password" class="box-item" value="<?php echo $repassword;?>">
                <span class="error"><?php echo $er_repassword;?></span>

            <div class="g_f">
                <div class="birthday">
                    <label class="signup-items" > Birthday :</label>
                    <input type="date" name="fbirthday" class="box-item" value="<?php echo $birthday;?>">
                </div>

                <div class="gender">
                    <label class="signup-items" > Gender :</label>
                    <select type="date" class="box-item" name="fgender" value="<?php echo $gender;?>">
                        <option value="male">Male</option>
                        <option value="fmale">Fmale</option>
                    </select>
                </div>
            </div>




                <label class="signup-items" > Phone Number :</label>
                <input type="text" class="box-item" minlength="10" maxlength="10" name="fphone" value="<?php echo $phone;?>">
                <span class="error"><?php echo $er_phone;?></span>

                <label class="signup-items"  >City :</label>
                <select name="fcity" class="box-item">
                    <option value="Amman">Amman</option>
                    <option value="Al-Zarqa">Al-Zarqa</option>
                    <option value="Al-Balqaa">Al-Balqaa</option>
                    <option value="Ajloun">Ajloun</option>
                    <option value="Al-Mafraq">Al-Mafraq</option>
                    <option value="Irbid">Irbid</option>
                    <option value="Jarash">Jarash</option>
                    <option value="Aqaba">Aqaba</option>
                    <option value="Al-karak">Al-karak</option>
                    <option value="Maan">Maan</option>
                    <option value="Madaba">Madaba</option>
                    <option value="Al-Tafila">Al-Tafila</option>
                </select>
                <span class="error"><?php echo $er_city;?></span>

                
                <label class="signup-items"  >Type :</label>
                <select name="ftype-account" class="box-item">
                    <option value="company">Company</option>
                    <option value="user">User</option>
                </select>
                <span class="error"><?php echo $er_city;?></span>

                <button  class="signup-btn" type="submit">Sign Up</button>
                

             </form>
          
    </div>
    </div>
</body>
</html>