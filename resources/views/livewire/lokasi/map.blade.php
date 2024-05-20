<div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <div id="map" style="width: 100%; height: 600px;"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-2.53371, 140.71813], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var locations = @json($locations);

        locations.forEach(function(location) {
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup('<b>' + location.name + '</b>');
        });

    </script>

</div>
