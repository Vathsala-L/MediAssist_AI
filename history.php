<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search History - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f8ff; }
        .list-group-item { border-radius: 10px; margin-bottom: 5px; }
        .btn-secondary { background-color: #6c757d; border: none; }
        .btn-secondary:hover { background-color: #5a6268; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="chat.php">MediAssist AI</a>
  </div>
</nav>

<div class="container">
    <h2 class="mb-4 text-center">Your Previous Searches</h2>
    <?php
    if(isset($_SESSION['history']) && count($_SESSION['history']) > 0){
        echo "<ul class='list-group'>";
        foreach(array_reverse($_SESSION['history']) as $symptom){
            echo "<li class='list-group-item'>$symptom</li>";
        }
        echo "</ul>";
    } else {
        echo "<p class='text-center'>No history found.</p>";
    }
    ?>
    <div class="text-center mt-3">
        <a href="chat.php" class="btn btn-secondary">Back to Home</a>
    </div>
</div>

</body>
</html>