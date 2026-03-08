<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>AI Symptom Triage Chatbot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4 text-center">MediAssist AI</h1>
    <form action="result.php" method="post" class="mx-auto" style="max-width:500px;">
        <div class="mb-3">
            <input type="text" name="symptom" class="form-control" placeholder="Enter symptom(s)..." required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Check Condition</button>
    </form>
    <div class="mt-4 text-center">
        <a href="history.php">View Search History</a>
    </div>
</div>
</body>
</html>