<div class="card">
    <div class="card-header">
        <h4>User Locations</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    @foreach($userLocations as $location)
                        @if ($loop->first)
                            @continue
                        @endif
                        <li class="list-group-item">
                            <strong>{{ $location[0] }}</strong>
                            <p>Users: {{ $location[3] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8">
                <div wire:ignore>
                    <div id="userLocationsChart" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>

    @assets
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    @endassets

    @script
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['geochart'],
            mapsApiKey: 'YOUR_GOOGLE_MAPS_API_KEY' // Replace with your actual API key
        });

        google.charts.setOnLoadCallback(drawRegionsMap);

        function drawRegionsMap() {
            const userLocations = @json($userLocations); // Pass PHP data to JavaScript

            const data = google.visualization.arrayToDataTable([
                ['Country', 'Users'], // Header row
                    @foreach($userLocations as $location)
                    @if ($loop->first)
                    @continue
                    @endif
                ['{{ $location[0] }}', {{ $location[3] }}], // Country name, user count
                @endforeach
            ]);
            const options = {
                // displayMode: 'markers', // Changed to markers display mode
                colorAxis: { colors: ['#e7711c', '#4374e0'] }, // Gradient color (optional for markers)
                backgroundColor: 'white',
                datalessRegionColor: '#f8bbd0',
                defaultColor: '#f5f5f5',
                // Additional options for marker customization (optional)
                // sizeAxis: { minValue: 1, maxValue: 10, baseline: 5 }, // Set marker size based on user count
            };

            const chart = new google.visualization.GeoChart(document.getElementById('userLocationsChart'));
            chart.draw(data, options);
        }

        // Listen for 'userLocationsUpdated' event and update chart
        window.addEventListener('userLocationsUpdated', (event) => {
            drawRegionsMap(); // Redraw the chart with updated data
        });
    </script>
    @endscript
</div>
