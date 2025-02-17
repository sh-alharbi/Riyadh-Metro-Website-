<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyadh Metro - Student Guide</title>
    <link rel="stylesheet" href="style.css">
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
        <?php
$user_logged_in = isset($_COOKIE["user_logged_in"]);
?>

<nav>
    <a href="index.php">Welcome</a>
    <a href="about-us.html">About Us</a>
    <a href="join-us.php">Join Us</a>
    <a href="sign-in.php">Sign In</a>

    <?php if ($user_logged_in): ?> 
        <a href="SABIC.html">SABIC Station</a>
        <a href="book-ticket.php">Book Ticket</a>
        <a href="feedback.php">Feedbacks</a>
        <a href="logout.php" style="color: red;">Logout</a>
    <?php endif; ?>
</nav>
    </header>

    <!-- Background and Welcome Message -->
    <div class="background">
        <div class="content">
            <img src="Riyadh_Metro_Logo.svg.png" alt="Riyadh Metro Logo" class="logo">
            <h1>Welcome to the Riyadh Metro Student Guide</h1>
            <p>Find your way through the College with ease using the Metro and Bus system.</p>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        © 2024-25 IMSIU CCIS™
    </footer>

    <script>
        // Auto-refresh the page every 12 hours
        setTimeout(() => {
            location.reload();
        }, 12 * 60 * 60 * 1000);
    </script>
</body>
</html>