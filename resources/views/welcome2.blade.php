<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="icon" href="https://example.com/path-to-your-icon/icon.png" style="width: 100px; height:100px;">
    <title>Faskes Finder</title>
    <style>
        body {
            background: url('{{ asset('dist/img/location-4496459_1280-2.png') }}');
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="d-flex justify-content-center mt-md-5">
            <i class="far fa-search-location"></i>
            Faskes Finder
        </h2>
        <div class="text-center">
            <button id="getLocationBtn" class="btn btn-primary">Get My Location</button>
        </div>
        <br>
        <p id="locationMessage"></p>
        <div id="map" style="width: 100%; height: 400px;"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const getLocationBtn = document.getElementById('getLocationBtn');
        const locationMessage = document.getElementById('locationMessage');

        getLocationBtn.addEventListener('click', function() {
            if (navigator.geolocation) {
                alert('Please wait, we still processing!')
                return navigator.geolocation.getCurrentPosition(showPosition);
            }

            if (!navigator.geolocation) {
                alert('Geolocation is not supported by this browser and please wait for reload!');

                setTimeout(function(){
                    window.location.reload();
                }, 5000);
            }
        });

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            getNearestFacilities(latitude, longitude);
        }

        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function calculateDistance(lat1, lon1, lat2, lon2) {
            const earthRadius = 6371; // Radius of the Earth in kilometers

            const dLat = toRadians(lat2 - lat1);
            const dLon = toRadians(lon2 - lon1);

            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);

            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = Math.round(earthRadius * c); // Distance in kilometers

            return distance;
        }

        function getNearestFacilities(lat, long) {
            const desiredDistance = 10; // Desired distance in kilometers
            const dataHealthFacilities = {!! json_encode($healths) !!};

            const nearestFacilities = dataHealthFacilities.filter(function(facility) {
                const distance = calculateDistance(lat, long, facility.lat, facility.long);
                return distance <= desiredDistance;
            });

            const map = L.map('map').setView([lat, long], 10);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            const userMarker = L.marker([lat, long], {
                icon: yellowPersonIcon
            }).addTo(map).bindPopup('Lokasi Pengguna');

            for (let facility of nearestFacilities) {
                const facilityMarker = L.marker([facility.lat, facility.long], {
                    icon: redMarkerIcon
                }).addTo(map).bindPopup(facility.name);
                const facilityPolyline = L.polyline([
                    [lat, long],
                    [facility.lat, facility.long]
                ], {
                    color: 'blue'
                }).addTo(map);
            }
        }

        // Define the yellow person icon
        const yellowPersonIcon = L.icon({
            iconUrl: '{{ asset('dist/img/icons8-body-type-tall-50.png') }}',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
        });

        // Define the red marker icon
        const redMarkerIcon = L.icon({
            iconUrl: '{{ asset('dist/img/icons8-location-48.png') }}',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
        });
    </script>
</body>

</html>
