<?php
include "db.php";
$id = $_GET['id'];
$sql = "SELECT * FROM symptoms WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Bootstrap icons mapping
$condition_icons = [
    "Flu" => "<i class='bi bi-thermometer-half' style='font-size:40px;color:#007bff;margin-right:10px;'></i>",
    "Heart Risk" => "<i class='bi bi-heart-pulse-fill' style='font-size:40px;color:red;margin-right:10px;'></i>",
    "Food Poisoning" => "<i class='bi bi-bug' style='font-size:40px;color:orange;margin-right:10px;'></i>",
    "Possible Infection" => "<i class='bi bi-virus' style='font-size:40px;color:green;margin-right:10px;'></i>",
];
$icon = isset($condition_icons[$row['condition_name']]) ? $condition_icons[$row['condition_name']] : "<i class='bi bi-activity' style='font-size:40px;margin-right:10px;'></i>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Advice - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>body{background-color:#e8f4f8;}</style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2><?php echo $icon.$row['condition_name']; ?></h2>
        <p><strong>Symptoms Matched:</strong> <?php echo $row['symptom']; ?></p>
        <p><strong>Advice:</strong> <?php echo $row['advice']; ?></p>
        
        <h5 class="mt-3">Causes:</h5>
        <ul>
            <?php
            // Example causes based on condition
            if($row['condition_name']=="Flu"){
                echo "<li>Viral infection (Influenza virus)</li><li>Spread through cough, sneeze, or contact</li>";
            } elseif($row['condition_name']=="Heart Risk"){
                echo "<li>High blood pressure</li><li>Cholesterol imbalance</li><li>Obesity or sedentary lifestyle</li>";
            } elseif($row['condition_name']=="Food Poisoning"){
                echo "<li>Contaminated food or water</li><li>Poor hygiene while cooking</li>";
            } elseif($row['condition_name']=="Possible Infection"){
                echo "<li>Bacterial or viral infection</li><li>Exposure to contaminated environment</li>";
            }
            ?>
        </ul>

        <h5>Precautions & Guidance:</h5>
        <ul>
            <li>Observe vital signs carefully.</li>
            <li>Maintain hygiene: wash hands and utensils.</li>
            <li>Give fluids and rest. Monitor closely for worsening symptoms.</li>
            <li>Refer to health center if severe signs appear: chest pain, breathing difficulty, confusion, persistent vomiting, high fever.</li>
            <li>Educate family/patients about warning signs.</li>
            <li>Use protective measures (mask, gloves) to prevent spread.</li>
        </ul>

        <div class="text-center mt-3">
            <a href="chat.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Home</a>
        </div>
    </div>
</div>

</body>
</html>