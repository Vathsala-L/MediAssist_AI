<?php
session_start();
include "db.php";

$symptom = $_POST['symptom'];

// Store search in session for history
if(!isset($_SESSION['history'])){
    $_SESSION['history'] = [];
}
$_SESSION['history'][] = $symptom;

$sql = "SELECT * FROM symptoms WHERE symptom LIKE '%$symptom%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Search Results</h2>

    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<div class='card mb-3'>";
            echo "<div class='card-header'><strong>".$row['condition_name']."</strong></div>";
            echo "<div class='card-body'>";
            echo "<p><strong>Advice:</strong> ".$row['advice']."</p>";
            echo "<a href='advice.php?id=".$row['id']."' class='btn btn-info'>More Details</a>";
            echo "</div></div>";
        }
    } else {
        echo "<div class='alert alert-warning'>No match found. Please consult a doctor.</div>";
    }
    ?>

    <a href="chat.php" class="btn btn-secondary mt-3">Back</a>
</div>
</body>
</html>