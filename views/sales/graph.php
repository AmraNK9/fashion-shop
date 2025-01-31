<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php  ?>
    <h1>Sales Graph for <?php echo htmlspecialchars($_GET['date'] ?? date('Y-m-d')); ?></h1>
    <div style="width:30%">
        <canvas id="salesChart" width="200" height="100"></canvas>
    </div>

    <script>
        // Pass PHP data to JavaScript
        const salesData = <?php echo json_encode($salesData); ?>;
        const labels = salesData.map(item => item.product_name);
        const data = salesData.map(item => item.total_sold);

        // Render the chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Units Sold',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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