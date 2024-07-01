<div wire:ignore>
    <canvas id="reportReasonsChart" width="400" height="300"></canvas>
</div>
@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets
@script
<script>
    const ctx = document.getElementById('reportReasonsChart');
    const reportReasons = @json($reportReasons); // Pass PHP data to JavaScript

    // Get labels and values initially
    const labels = Object.keys(reportReasons);
    const values = Object.values(reportReasons);

    let myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Report Reasons',
                data: values,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'], // Custom colors for segments
                borderColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'], // Border color matching segment colors
                borderWidth: 2 // Width of the border between segments
            }]
        },
        options: {
            responsive: false, // Disable responsive behavior for fixed size
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return `${tooltipItem.label}: ${tooltipItem.raw.toLocaleString()}`; // Format numbers with commas
                        }
                    }
                }
            }
        }
    });
    // Listen for 'reportReasonsUpdated' event and update chart
    window.addEventListener('reportReasonsUpdated', () => {
        const newReportReasons = @json($reportReasons); // Update reportReasons with Livewire data
        const newLabels = Object.keys(newReportReasons);
        const newValues = Object.values(newReportReasons);

        myChart.data.labels = newLabels;
        myChart.data.datasets[0].data = newValues;
        myChart.update();
    });
</script>
@endscript
