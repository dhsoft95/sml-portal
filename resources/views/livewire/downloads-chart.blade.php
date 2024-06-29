<div wire:ignore>
    <canvas id="downloadsChart" width="400" height="300"></canvas>
</div>

@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
<script>
    const ctx = document.getElementById('downloadsChart');
    const downloads = $wire.downloads;

    // Get labels and values initially
    const labels = Object.keys(downloads);
    const values = Object.values(downloads);

    let myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Downloads',
                data: values,
                backgroundColor: ['#FF6384', '#36A2EB'], // Custom colors for segments
                borderColor: ['#FF6384', '#36A2EB'], // Border color matching segment colors
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

    // Listen for 'downloadsUpdated' event and update chart
    window.addEventListener('downloadsUpdated', () => {
        const newLabels = Object.keys($wire.downloads);
        const newValues = Object.values($wire.downloads);

        myChart.data.labels = newLabels;
        myChart.data.datasets[0].data = newValues;
        myChart.update();
    });
</script>
@endscript
