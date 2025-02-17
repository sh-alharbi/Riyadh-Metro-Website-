<?php
include 'Metro_DB.php';
$message = "";

// check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    
    // check if user exists in the database
    $query = mysqli_query($con, "SELECT * FROM users WHERE name='$name' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        setcookie("user_logged_in", $name, time() + 3600, "/"); 
        header("Location: sign-in.php"); 
    } else {
        $message = "<p class='error'>Wrong username or password.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
        <a href="about-us.html">About Us</a>
        <a href="join-us.php">Join Us</a>
        <a href="sign-in.php">Sign In</a>

        <!-- Only show restricted pages if user is logged in -->
        <?php if (isset($_COOKIE["user_logged_in"])): ?> 
            <a href="SABIC.html">SABIC Station</a>
            <a href="book-ticket.php">Book Ticket</a>
            <a href="feedback.php">Feedbacks</a>
            <a href="logout.php" style="color: red;">Logout</a>
        <?php endif; ?>
    </nav>
       
</header>


<div class="background">
    <div class="content">
    <?php echo $message; ?>

        <form method="post">
            <img src="Riyadh_Metro_Logo.svg.png" alt="Riyadh Metro Logo" class="logo">
            <h2>SignIn</h2>
            <label for="name"></label>
            <input type="text" id="name" placeholder="Name" name="name" required><br>
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="password" required><br>
            <button type="submit">SignIn</button>
        </form>
    </div>
</div>

<footer>
    © 2024-25 IMSIU CCIS™
</footer>
</body>
</html>
