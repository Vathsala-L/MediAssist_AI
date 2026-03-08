<?php
include "db.php";

$id = $_GET['id'];
$sql = "SELECT * FROM symptoms WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Advice - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2><?php echo $row['condition_name']; ?></h2>
    <p><strong>Symptoms:</strong> <?php echo $row['symptom']; ?></p>
    <p><strong>Advice:</strong> <?php echo $row['advice']; ?></p>
    <a href="chat.php" class="btn btn-secondary mt-3">Back to Home</a>
</div>
</body>
</html>