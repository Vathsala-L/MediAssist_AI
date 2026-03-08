<?php
include "db.php";

$symptom = $_POST['symptom'];

$sql = "SELECT * FROM symptoms WHERE symptom LIKE '%$symptom%'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();

    echo "<h3>Possible Condition: ".$row['condition_name']."</h3>";
    echo "<p>Advice: ".$row['advice']."</p>";
}
else{
    echo "No match found. Please consult doctor.";
}
?>