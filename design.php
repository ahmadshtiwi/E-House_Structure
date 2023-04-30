
<?php
include "db_conn.php";

$id =$_POST['id'];
$sql_designs="SELECT * FROM designs where id_person='$id'";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/d.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design</title>
</head>
<body>
    

<div class="designs">

<?php 


        $result=mysqli_query($conn,$sql_designs);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result)) {


                $image=$row['image_design'];
                $id_person=$row['id_person'];
                $price=$row['price'];
                $area=$row['area'];
                $room=$row['room'];
                $bathroom=$row['bathroom'];
                $balcony=$row['balcony'];
                $garden=$row['garden'];
                $city=$row['city'];
                


                echo "
                <form class='' action='communication.php' method='post'>

                    <div class='card'>
                        <img src='designs/$image' >
                        <div class='price'><label>Price :</label><span>$price JOD</span></div>
                        <div><label>Area :</label><span> $area m</span></div>
                        <div><label>Number Of Room : <span>$room</span> </label></div>
                        <div><label>Number Of Bathroom : <span>$bathroom</span> </label></div>
                        <div><label>Balcon <span>$balcony</span> </label></div>
                        <div><label>Garden : <span>$garden</span> </label></div>
                        <div><label>Loation : <span>$city</span> </label></div>
                
                        <button type='submit' name='id' value='$id_person'>Contact with Engineer </button>
                    </div>
                    
                    </form>";
            }
        }

        ?>

</div>

</body>
</html>