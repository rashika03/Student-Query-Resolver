<?php
$insert = false;
if(isset($_POST['name'])){
  //set connection variables
   $server = "localhost";
   $username = "root";
   $password = "";
   //Create a database connection
   $con = mysqli_connect($server, $username, $password); 
   //Check for connection succes
   if(!$con)
   {
    die("connection to this database failed due to" . 
    mysqli_connect_error());
   }
  // echo "Success connecting to the db";
  //Collect post variables
   $name = $_POST['name']; 
   $gender = $_POST['gender'];
   $age = $_POST['age'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $desc = $_POST['desc']; 
   $sql = "INSERT INTO `nita_sqr`.`sqr` (`name`, `age`, `gender`, `email`, `phone`, `query`, `dt`) VALUES ('$name', '$age',
   '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    if($con->query($sql) == true){
       // echo "Sucessfully inserted";
       //Flag for successful inserted
       $insert = true;
    }
    {
        echo "ERROR: $sql <br> $con->error";
        
    }
    //Close the database connection
    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NITA Student Query Resolver form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="NIT Agartala">
    <div class="container">'
        <h1>Welcome to our NITA Student Query Resolver Form</h1>
        <p>Enter your details and submit your Query</p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your query. We are happy to see you joining us for the NIT Agartala</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="email" id="email" placeholder="Enter your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your Query here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>


