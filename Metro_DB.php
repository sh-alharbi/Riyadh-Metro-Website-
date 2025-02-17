<?php
$con = new mysqli('localhost', 'root', '', 'metrodb');

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
