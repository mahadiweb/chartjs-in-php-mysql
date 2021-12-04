<?php
$conn = mysqli_connect("localhost","root","","view");

$query = mysqli_query($conn,"SELECT * FROM post");
if ($query) {
    $view = array();
    if (mysqli_num_rows($query)>0) {
        while ($row = mysqli_fetch_assoc($query)) {
        $view[] = $row['view'];
        }
    }
}else{
    echo "no";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chartjs</title>
	<script src="chart.min.js"></script>
</head>
<body>

<div class="chartbox" style="width: 500px;">
	<canvas id="myChart"></canvas>
</div>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: <?php echo json_encode($view); ?>, //12, 19, 3, 5, 2, 3
            backgroundColor: [],
            borderColor: ['red','green'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
