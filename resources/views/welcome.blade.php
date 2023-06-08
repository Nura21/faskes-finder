<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <title>Get My Location</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="items-right">Get My Location</h2>
        <button id="getLocationBtn" class="btn btn-primary ml-5">Get My Location</button>
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
            // Mendapatkan lokasi pengguna
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }

            if (!navigator.geolocation) {
                locationMessage.textContent = 'Geolocation is not supported by this browser.';
            }
        });

        function showPosition(position) {
            // Mendapatkan latitude dan longitude
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            return getDistance(latitude, longitude);
        }

        // Fungsi untuk mengkonversi sudut dalam derajat ke radian
        function toRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        // Fungsi untuk menghitung jarak antara dua titik menggunakan formula Haversine
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const earthRadius = 6371; // Radius Bumi dalam kilometer

            // Mengubah latitude dan longitude ke radian
            const dLat = toRadians(lat2 - lat1);
            const dLon = toRadians(lon2 - lon1);

            // Menghitung jarak menggunakan formula Haversine
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);

            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = earthRadius * c; // Jarak dalam kilometer

            return Math.round(distance).toString() + ' kilometer';
        }

        function getDistance(lat, long) {
            let distanceHealthFaculities = [];
            let lengthHealthFaculities = {{ count($healths) }}
            let dataHealthFaculities = {!! json_encode($healths) !!}

            // Create the map
            const map = L.map('map').setView([lat, long], 10);

            // Add a tile layer to display the map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            for (let health in dataHealthFaculities) {
                distanceHealthFaculities.push([dataHealthFaculities[health]['name'], calculateDistance(lat, long,
                    dataHealthFaculities[health]['lat'], dataHealthFaculities[health]['long'])]);

                // Add markers for the user and destinations
                L.marker([lat, long]).addTo(map).bindPopup('Lokasi Pengguna');
                L.marker([dataHealthFaculities[health]['lat'], dataHealthFaculities[health]['long']]).addTo(map).bindPopup(
                    dataHealthFaculities[health]['name']);
                    console.log(L);
            }

            // Menampilkan pesan lokasi berhasil didapatkan
            locationMessage.textContent = distanceHealthFaculities;
        }
    </script>
</body>

</html>
