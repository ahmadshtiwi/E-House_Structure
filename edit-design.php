<?php

include "db_conn.php";
session_start();

$username=$_SESSION['username'];
$get_id="SELECT id_person from accounts where username='$username'";

$res=mysqli_query($conn,$get_id);

if(mysqli_num_rows($res)>0)
{

    $row=mysqli_fetch_assoc($res);
    $id_person=(int)$row['id_person'];

   
}


$sql_designs="SELECT * FROM designs WHERE id_person='$id_person'";





?>



<!DOCTYPE html>
<html>
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/edit-design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">

    <title>Edit Desgin</title>

</head>
   

    <body>

    <div class="designs"> 
      <?php 


      $result=mysqli_query($conn,$sql_designs);
      if(mysqli_num_rows($result)>0)
      {
          while($row = mysqli_fetch_assoc($result)) {


              $image=$row['image_design'];
              $id_design=$row['id_design'];
              $price=$row['price'];
              $area=$row['area'];
              $room=$row['room'];
              $bathroom=$row['bathroom'];
              $balcony=$row['balcony'];
              $garden=$row['garden'];
              $city=$row['city'];
              
echo"
      <form class='' action='communication.php' method='post'>

        <div class='card'>

            <img src='designs/$image' >
            <div class='btn-upload'><input type='file' ></div>
            <div class='price'><label>Price :</label><input type='number' value='$price' />JOD</div>
            <div><label>Area :</label><input type='number' value='$area' />m</div>
            <div><label>Number Of Room : <input type='number' value='$room' /> </label></div>
            <div><label>Number Of Bathroom : <input type='number' value='$bathroom' /></label></div>
            <div><label>Balcony <input type='number' value='$balcony' /> </label></div>
            <div><label>Garden : <input type='number' value='$garden' /></label></div>
            <div><label>Loation : <input type='TEXT' value='$city' /></label></div>
    
            <div class='buttons'> 
              <button type='submit' value='$id_design' name='delete'>Delete</button> 
              <button type='submit' value='$id_design' name='save'>Sava</button> </div>
            </div>
        
        </form>";
          }
        };
?>
   </div>   
  </body>
</html>
