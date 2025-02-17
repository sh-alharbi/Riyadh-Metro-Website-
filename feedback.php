<?php include 'Metro_DB.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    $query = "INSERT INTO feedback (name, feedback) VALUES ('$name', '$feedback')";
    mysqli_query($con, $query);
}

$result = mysqli_query($con, "SELECT * FROM feedback");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>

    <style>
        body,
html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: Arial, sans-serif;
    box-sizing: border-box;
    scroll-behavior: smooth;
    background-color: rgb(208, 236, 208);
    text-align: center;
}

        header {
    background: rgba(0, 0, 0, 0.8);
    color: white;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    padding: 10px 0;
}

header .contact {
    display: flex;
    justify-content: space-between;
    padding: 0 20px;
    font-size: 14px;
}

header .contact span a {
    color: #66c636;
    text-decoration: none;
}

header .contact span a:hover {
    text-decoration: underline;
}

header .logos {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 10px;
}

header .logos img {
    height: 35px;
    display: block;
}

nav {
    display: flex;
    justify-content: center;
    padding: 10px;
    background: rgba(0, 0, 0, 0.8);
}

nav a {
    color: white;
    text-decoration: none;
    margin: 0 35px;
    padding: 10px;
    transition: background 0.3s;
}

nav a:hover {
    background: #66c636;
    color: black;
}

nav .highlight {
    background: #66c636;
    color: black;
    border-radius: 5px;
}
/* Background Styling */
.background {
    position: relative;
    width: 100%;
    height: 100vh;
    background: url('metro.jpg') no-repeat center center/cover;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
}

.background::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.content {
    position: relative;
    z-index: 2;
    max-width: 600px;
}

.logo {
    max-width: 150px;
    margin-bottom: 20px;
}


form {
    margin-top: 100px; 
    background-color: white;
    color: green;
    padding: 30px;
    width: 250px;
    margin: auto;
}

input, textarea, button {
    width: 80%;
    margin: 10px 0;
    padding: 10px;
}

button {
    background-color: green;
    color: white;
}

table {
    width: 50%;
    margin: auto;
    background-color: white;
    color: green;
}

th {
    background-color: green;
    color: white;
    padding: 10px;
}

td {
    padding: 10px;
}
h2{
    margin-top: 100px; 

}

    </style>
</head>
<body>
    <!-- Header Section -->
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
            <a href="SABIC.html">SABIC Station</a>
            <a href="book-ticket.php" class="highlight">Book Ticket</a>
            <a href="feedback.php">Feedbacks</a>
        </nav>
    </header>

<h2>Give Feedback</h2>
<form method="post">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <textarea name="feedback" placeholder="Your Feedback" required></textarea><br>
    <button type="submit">Submit</button>
</form>

<!--  the feedback show here in table   -->
<h2>User Feedback</h2>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Feedback</th>
    </tr>

    <?php 
    $result = mysqli_query($con, "SELECT * FROM feedback");

    while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["feedback"]; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<p><a href="SABIC.html">Go Back to SABIC</a></p>

</body>
</html>
