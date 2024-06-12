
<?php

$mysqli = require __DIR__ . "/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem Status Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="problemChart" width="600" height="400"></canvas>

    <script>
        // Hypothetical data
    
        var data = {
            labels: ['Submitted', 'In Progress', 'Completed'],
            datasets: [{
                label: 'Number of Problems',

                data: [<?php
                $sql1 = "SELECT COUNT(*) as complaint_count FROM complaints WHERE status = 'Default'";
                $result1 = $mysqli->query($sql1);

                if (!$result1) {
                    die("Error: " . $mysqli->error);
                }

                $complaint = $result1->fetch_row(); // Use fetch_row for a single value

                if ($complaint) {
                    $complaintCount = $complaint[0]; // Access the count value
                    echo $complaintCount;
                } else {
                    // Handle the case where the query failed or no complaints were found
                    echo "0"; // Default value if no complaints
                }
            ?>, 20, 30], // Replace with your actual data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)', // Submitted
                    'rgba(54, 162, 235, 0.7)', // In Progress
                    'rgba(75, 192, 192, 0.7)' // Completed
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        };

        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ctx = document.getElementById('problemChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>

</html>