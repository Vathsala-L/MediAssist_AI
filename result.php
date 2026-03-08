<?php
session_start();
include "db.php";

$input = strtolower($_POST['symptom']);

// Store search in session
if(!isset($_SESSION['history'])) $_SESSION['history'] = [];
$_SESSION['history'][] = $input;

// Split input into words
$words = preg_split('/[\s,]+/', $input);

// Fetch all conditions
$sql = "SELECT * FROM symptoms";
$result = $conn->query($sql);

// Prepare array for matched results
$matches = [];

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $score = 0;
        $keywords = explode(",", strtolower($row['keywords']));
        foreach($words as $word){
            if(in_array($word, $keywords)) $score++;
        }
        if($score > 0){
            $row['score'] = $score;
            $row['confidence'] = round(($score/count($keywords))*100); // confidence %
            $matches[] = $row;
        }
    }
}

// Sort by score descending and keep top match
usort($matches, function($a,$b){ return $b['score'] - $a['score']; });
if(count($matches) > 0) $matches = [$matches[0]];

// Icons for conditions (Bootstrap icons)
$condition_icons = [
    "Flu" => "<i class='bi bi-thermometer-half' style='font-size:30px;color:#007bff;margin-right:10px;'></i>",
    "Heart Risk" => "<i class='bi bi-heart-pulse-fill' style='font-size:30px;color:red;margin-right:10px;'></i>",
    "Food Poisoning" => "<i class='bi bi-bug' style='font-size:30px;color:orange;margin-right:10px;'></i>",
    "Possible Infection" => "<i class='bi bi-virus' style='font-size:30px;color:green;margin-right:10px;'></i>",
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Results - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #e8f4f8; }
        .card { border-radius: 20px; transition: transform 0.2s; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .card:hover { transform: scale(1.03); }
        .severity-mild { border-left: 6px solid green; }
        .severity-moderate { border-left: 6px solid orange; }
        .severity-critical { border-left: 6px solid red; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="chat.php"><i class="bi bi-heart-pulse-fill"></i> MediAssist AI</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="history.php"><i class="bi bi-clock-history"></i> History</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <h2 class="mb-4 text-center"><i class="bi bi-search"></i> Results for: <em><?php echo htmlspecialchars($input); ?></em></h2>

    <div class="row justify-content-center">
        <?php
        if(count($matches) > 0){
            $row = $matches[0];
            $severity_class = "severity-" . $row['severity'];
            $icon = isset($condition_icons[$row['condition_name']]) ? $condition_icons[$row['condition_name']] : "<i class='bi bi-activity' style='font-size:30px;margin-right:10px;'></i>";
            echo "<div class='col-md-8'>";
            echo "<div class='card p-4 $severity_class'>";
            echo "<h4 class='card-title'>".$icon.$row['condition_name']."</h4>";
            echo "<p class='card-text'><strong>Advice:</strong> ".$row['advice']."</p>";
            echo "<p><strong>Confidence:</strong> ".$row['confidence']."%</p>";

            if($row['severity']=='critical'){
                echo "<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i> Critical Condition! Seek medical help immediately!</div>";
            }
            echo "<button onclick='speakAdvice()' class='btn btn-success mb-2'><i class='bi bi-volume-up-fill'></i> Listen to Advice</button> ";
            echo "<a href='advice.php?id=".$row['id']."' class='btn btn-info'><i class='bi bi-card-text'></i> More Details</a>";
            echo "</div></div>";
        } else {
            echo "<div class='alert alert-warning text-center'>No match found. Please consult a doctor.</div>";
        }
        ?>
    </div>

    <div class="text-center mt-3">
        <a href="chat.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Back to Home</a>
    </div>
</div>

<script>
// Text-to-Speech
function speakAdvice(){
    const advice = "<?php echo isset($row['advice']) ? addslashes($row['advice']) : ''; ?>";
    const msg = new SpeechSynthesisUtterance(advice);
    msg.rate = 0.9;
    window.speechSynthesis.speak(msg);
}
</script>

</body>
</html>