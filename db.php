<?php
$conn = new mysqli("localhost","root","","mediassist_db");

if($conn->connect_error){
    die("Connection failed");
}
?>