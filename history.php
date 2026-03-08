<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search History - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Your Previous Searches</h2>
    <?php
    if(isset($_SESSION['history']) && count($_SESSION['history']) > 0){
        echo "<ul class='list-group'>";
        foreach(array_reverse($_SESSION['history']) as $symptom){
            echo "<li class='list-group-item'>$symptom</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No history found.</p>";
    }
    ?>
    <a href="chat.php" class="btn btn-secondary mt-3">Back to Home</a>
</div>
</body>
</html>