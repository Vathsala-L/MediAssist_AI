<?php
session_start();
include "db.php";

// Total searches
$total_searches = isset($_SESSION['history']) ? count($_SESSION['history']) : 0;

// Count critical cases
$sql = "SELECT * FROM symptoms WHERE severity='critical'";
$result = $conn->query($sql);
$critical_count = $result->num_rows;

// Most searched symptoms
$symptom_counts = [];
if(isset($_SESSION['history'])){
    foreach($_SESSION['history'] as $s){
        $s = strtolower($s);
        if(isset($symptom_counts[$s])) $symptom_counts[$s]++;
        else $symptom_counts[$s] = 1;
    }
    arsort($symptom_counts);
}
$top_symptoms = array_slice($symptom_counts, 0, 5, true);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - MediAssist AI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { background-color: #e8f4f8; }
        .card { border-radius: 15px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="chat.php"><i class="bi bi-heart-pulse-fill"></i> MediAssist AI Dashboard</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="chat.php"><i class="bi bi-chat-dots-fill"></i> Chat</a></li>
            <li class="nav-item"><a class="nav-link" href="faq.php"><i class="bi bi-question-circle-fill"></i> FAQ</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card text-center p-4 bg-info text-white">
                <i class="bi bi-search fs-1"></i>
                <h5 class="mt-2">Total Searches</h5>
                <h3><?php echo $total_searches; ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-4 bg-danger text-white">
                <i class="bi bi-exclamation-triangle-fill fs-1"></i>
                <h5 class="mt-2">Critical Cases</h5>
                <h3><?php echo $critical_count; ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-4 bg-success text-white">
                <i class="bi bi-activity fs-1"></i>
                <h5 class="mt-2">Top Symptoms</h5>
                <ul class="list-unstyled mt-2">
                    <?php
                    foreach($top_symptoms as $sym => $count){
                        echo "<li>".ucwords($sym)." ($count)</li>";
                    }
                    if(empty($top_symptoms)) echo "<li>No data yet</li>";
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Chart for all symptoms -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card p-4">
                <h5 class="text-center">Symptom Frequency</h5>
                <canvas id="symptomChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
const ctx = document.getElementById('symptomChart').getContext('2d');
const chartData = {
    labels: <?php echo json_encode(array_keys($top_symptoms)); ?>,
    datasets: [{
        label: 'Search Count',
        data: <?php echo json_encode(array_values($top_symptoms)); ?>,
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};
const myChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: {
        scales: {
            y: { beginAtZero: true, ticks:{ stepSize:1 } }
        }
    }
});
</script>

</body>
</html>