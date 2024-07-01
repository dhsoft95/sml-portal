
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            @livewire('stats.analytics-stats')
            <div class="row" style="margin-top: 1.5rem;">
                <div class="col-xl-6 d-flex">
                    <div class="card card-h-100 flex-fill">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h5 class="card-title me-2">Top Reasons for Customer Service Reports</h5>
                            </div>
                            <div class="d-flex flex-wrap align-items-center mb-4">
                                @livewire('charts.service-desk-chart')
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-xl-6 d-flex">
                    <div class="card card-h-100 flex-fill">
                        <div class="card-body">
                            <div class="d-flex flex-wrap align-items-center mb-4">
                                <h5 class="card-title me-2">Interactive Services Desk</h5>
                                <div class="ms-auto">
                                    <select class="form-select form-select-sm">
                                        <option value="MAY" selected="">May</option>
                                        <option value="AP">April</option>
                                        <option value="MA">March</option>
                                        <option value="FE">February</option>
                                        <option value="JA">January</option>
                                        <option value="DE">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-sm">
                                    <canvas id="services-desk-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

            <div class="row">
                <div class="col-xl-12">
                    @livewire('charts.user-locations-chart')
                    <!-- end card -->
                </div>
                <!-- end col -->


                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © Simba Money.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by <a href="#!" class="text-decoration-underline">Simba Money Devs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('services-desk-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Change this to the chart type you want (e.g., 'bar', 'line', 'pie', etc.)
            data: {
                labels: ['Service A', 'Service B', 'Service C', 'Service D'],
                datasets: [{
                    label: 'Requests',
                    data: [35, 25, 40, 20], // Example data, replace with your actual data
                    backgroundColor: [
                        'rgba(81, 86, 190, 0.8)',
                        'rgba(52, 195, 143, 0.8)',
                        'rgba(245, 166, 35, 0.8)',
                        'rgba(244, 67, 54, 0.8)'
                    ],
                    borderColor: [
                        'rgba(81, 86, 190, 1)',
                        'rgba(52, 195, 143, 1)',
                        'rgba(245, 166, 35, 1)',
                        'rgba(244, 67, 54, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Customize legend as needed
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true // Ensure y-axis starts from 0
                    }
                }
            }
        });
    });
</script>

<script>
    // Initialize Leaflet map
    var map = L.map('customer-locations-map').setView([51.505, -0.09], 2); // Set initial center and zoom

    // Add tile layer (you can use other tile providers like Mapbox)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Example data - replace with your customer location data
    var customers = [
        { name: 'Customer 1', location: [40.7128, -74.0060], country: 'USA' },
        { name: 'Customer 2', location: [51.5074, -0.1278], country: 'UK' },
        { name: 'Customer 3', location: [55.7558, 37.6176], country: 'Russia' },
        // Add more customers as needed
    ];

    // Add markers for each customer
    customers.forEach(function(customer) {
        L.marker(customer.location).addTo(map)
            .bindPopup('<b>' + customer.name + '</b><br>' + customer.country)
            .openPopup();
    });
</script>
