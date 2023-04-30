
<?php

session_start(); // start the session

include "db_conn.php";


$username=isset($_SESSION['username'])?$_SESSION['username']:"";

$sql_profile="SELECT * FROM accounts WHERE username='$username'";
$result=mysqli_query($conn,$sql_profile);

if(mysqli_num_rows($result)>0)
{
    $row = mysqli_fetch_assoc($result);
    $name=$row['name'];
    $my_image=$row['image'];
}

$sql_design="SELECT * FROM designs";


$sql_company="SELECT * FROM accounts";




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300&display=swap" rel="stylesheet">

    <title>E-House Structure</title>
    
</head>

<style>
    .is-hidden{
          display: none;

        }
    </style>
<body>
    

    <nav>
        <img src="resource/logo.png" width="100" alt="" srcset="">

        <ul>
            <li>  <a class="link-list"  href="#home">Home</a>  </li>
            <li> <a class="link-list" href="#about-us">About Us</a> </li>
            <li>  <a class="link-list" href="#contact">Contact</a> </li>
            
        <?php 
       if($username=="")
       {
           echo ' <div class="login">

            <a href="login.php"> Login </a>
            </div> ';
       }
          else { echo ' <li>  
            <div class="login">
                <img src="profile/'.$my_image.'" class="image-profile">
                
                
                
                <div class="dropdown" >
                    <button onclick="myFunction()"  class="dropbtn">'.$username.'</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
            </li> ';
        }
        ?>
        </ul>

    </nav>

    <form class=''action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
    <div class="filter">
        <div class="filter-contener">
            <label class="filter-item" for="box-price">Price</label>
            <input class="filter-item box" oninput="liveSearch()" id="price_id" value='0' type="text"
             value='0'>
        </div>  

        <div class="filter-contener">
            <label class="filter-item" for="box-area">Area</label>
            <input class="filter-item box" oninput="liveSearch()" id="area_id" value='0'  type="text">
        </div>  
    
        <div class="filter-contener">
            <label class="filter-item" for="number-room">Room</label>
            <select class="filter-item" oninput="liveSearch()" id="room_id" value='0'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>




            </select>
        </div>
            
        <div class="filter-contener">
            <label class="filter-item" for="number-room">Bathroom</label>
            <select class="filter-item" oninput="liveSearch()" id="bathroom_id" value='0'>
                 <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>


            </select>
        </div>
        
        <div class="filter-contener">
            <label class="filter-item" for="number-room">Garden</label>
            <select class="filter-item" oninput="liveSearch()" id="garden_id" value='0' >
                 <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
             


            </select>
        </div>
        <div class="filter-contener">
            <label class="filter-item" for="number-room">Balcony</label>
            <select class="filter-item" oninput="liveSearch()" id="balcony_id" value='0' >
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
         

        </select>
        </div>
        <div class="filter-contener">
        <label class="filter-item" for="number-room">City</label>

        <select id="city_id" oninput="liveSearch()" class="box-item">
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
        </div>

            
        
        </div>
    </form>

<!-- this div content design and name company -->

    <div id="home" class="container-item">
       
<!-- designs secsion 
display all designs in DB
get data from database 
save id becouse send to contact with engineer
-->
<div id="designs-container" class="design">

        <?php 


        $result=mysqli_query($conn,$sql_design);
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
                        <div class='price'><label>Price :</label><span id='price'> $price </span>JOD</div>
                        <div><label>Area :</label><span id='area'> $area </span>m</div>
                        <div><label> Room : <span id='room'>$room</span> </label></div>
                        <div><label> Bathroom : <span id='bathroom'>$bathroom</span> </label></div>
                        <div><label>Balcony: <span id='balcony'>$balcony</span> </label></div>
                        <div><label>Garden : <span id='garden'>$garden</span> </label></div>
                        <div><label>Loation : <span id='city'>$city</span> </label></div>
                
                        <button type='submit' name='id' value='$id_person'>Contact with Engineer </button>
                    </div>
                    
                    </form>";
            }
        }

        ?>

</div>

        <!-- name company section 
    
        get name and id for all comapny accounts 
        using id to send it for design page and display all designs for this id 

        -->
        <div>
        <?php 
        $result=mysqli_query($conn,$sql_company);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result)) {

                if($row['type_account']=='company'){
                $id_person=$row['id_person'];
                $name=$row['name'];
              
        
        echo "
        <form action='design.php' method='post'>
        <div class='company'>

            <button type='submit' value='$id_person' name='id' class='link-company'>$name</button>
            
        </div>
        </form>
        ";
                }

            }}?>

    </div>

        </div>
    
<div id="about-us" class="about-us-section">
    <h2>About Us</h2>
    <p> We are an intermediary platform between users and architects where we display building designs</p>


    </div>



<div id="contact" class="contact-section">
    <h2>Contact</h2>

    <div  calss="conication">

        <p>Phone : +96278062458</p>

        <p>Email : E-House@gamil.com</p>

        

    </div>

 </div>


<script src="code/hh.js"></script>



</body>
</html>
