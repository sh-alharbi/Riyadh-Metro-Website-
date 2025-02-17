<?php
include 'Metro_DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <div class="logos">
            <img src="LogoUniversitywhite1.png">
        </div>
        <div class="contact">
            <span>Email: <a href="mailto:info@ccis-imsiu.edu.sa">info@ccis-imsiu.edu.sa</a></span>
            
            <span>
                Phone: <a href="tel:+966123456789">+966 123 456 789</a> |
                <a href="https://twitter.com" target="_blank">Twitter</a> | 
                <a href="https://facebook.com" target="_blank">Facebook</a>
            </span>
        </div>
        <nav>
            <a href="index.php">Welcome</a>
            <a href="about-us.html">About us</a>
            <a href="join-us.php">Join Us</a>
            <a href="sign-in.php">Sign In</a>
        </nav>
    </header>
    

    <div class="background">
        <div class="content">

        <?php 
        // make sure the form is in "post"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"]; // take every input from the form and store it in a PHP variable
        $password = $_POST["password"];
        $year = $_POST["year"];
        $major = $_POST["major"];
        $age = $_POST["age"];
// check if the user name not been taken 
        $check = mysqli_query($con, "SELECT * FROM users WHERE name='$name'");
        if (mysqli_num_rows($check) == 0) {
            mysqli_query($con, "INSERT INTO users (name, password, year, major, age) VALUES ('$name', '$password', '$year', '$major', '$age')");
        }
    }
    ?>


            <form action="joinUs.php" method="post" id="join-form" enctype="multipart/form-data">   

                <img src="Riyadh_Metro_Logo.svg.png" alt="Riyadh Metro Logo" class="logo">

                <h2>Join us</h2>

                <label for="name">  </label>
                <input type="text" id="name" placeholder="Name" name="name" required><br>

                <label for ="password"> </label>
                 <input type="password" id="password"placeholder="Password" name="password" required><br> 

                <label for="year">  </label>
                <input type="number" id="year" name="year" placeholder="Year of study" required><br>
                
                <label for="major">  </label>
                <input type="text" id="major" name="major" placeholder="Major" required><br>
                
                <label for="age">   </label>
                <input type="number" id="age" name="age" placeholder="Age" required><br>
                
                <label for="photo"> Select your photo </label>
                <input type="file" id="photo" name="photo" accept="image/*"><br>
                <button type="submit">Register</button>
                </form>

        </div>
    </div>
    
   
	
    <footer>
        © 2024-25 IMSIU CCIS™
    </footer>



</body>
</html>
