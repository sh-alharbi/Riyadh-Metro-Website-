<?php
include 'Metro_DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $year = $_POST['year'];
    $major = $_POST['major'];
    $age = $_POST['age'];

    $photo = $_FILES['photo'];
    $targetDir = "uploads/";
    $fileName = basename($photo['name']);
    $targetFilePath = $targetDir . $fileName;

    // check if username already exists
    $check = mysqli_query($con, "SELECT * FROM users WHERE name='$name'");

    if (mysqli_num_rows($check) == 0) {
        // move the uploaded file
        if (move_uploaded_file($photo['tmp_name'], $targetFilePath)) {
            $sql = "INSERT INTO users (name, password, year, major, age, picture) 
                    VALUES ('$name', '$pass', $year, '$major', $age, '$fileName')";

            if (mysqli_query($con, $sql)) {
                echo '<p style="color: green; text-align: center; font-size: 25px;">You have registered successfully! Going to Sign In page</p>';
                echo '<meta http-equiv="refresh" content="3;url=sign-in.php">';
                exit();
            } else {
                echo "<p style='color: red; text-align: center;'>Error: " . mysqli_error($con) . "</p>";
            }
        } else {
            echo "<p style='color: red; text-align: center;'>Image upload failed.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Username already exists. Please choose another one.</p>";
    }
}

mysqli_close($con);
?>
