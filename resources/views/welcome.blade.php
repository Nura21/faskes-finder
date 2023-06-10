<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="icon" href="{{ asset('dist/img/marker-3314279_640-removebg-preview-2.png') }}"
        style="width: 100px; height:100px;">
    <title>Faskes Finder</title>
</head>

<body style="background: url('{{ asset('dist/img/location-4496459_1280-2.png') }}')">
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
            // Mendapatkan lokasi pengguna
            if (navigator.geolocation) {
                return navigator.geolocation.getCurrentPosition(showPosition);
            }

            if (!navigator.geolocation) {
                return locationMessage.textContent = 'Geolocation is not supported by this browser.';
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
            const distance = Math.round(earthRadius * c); // Jarak dalam kilometer

            return distance.toString() + ' kilometer \n';
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
                L.marker([lat, long], {
                    icon: L.icon({
                        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    })
                }).addTo(map).bindPopup('Lokasi Pengguna');
                L.marker([dataHealthFaculities[health]['lat'], dataHealthFaculities[health]['long']], {
                    icon: L.icon({
                        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41]
                    })
                }).addTo(map).bindPopup(
                    dataHealthFaculities[health]['name']);
            }

            // Menampilkan lokasi berhasil didapatkan
            let formattedData = [];

            for (let i = 0; i < distanceHealthFaculities.length; i++) {
                let name = distanceHealthFaculities[i][0];
                let distance = distanceHealthFaculities[i][1].replace(" kilometer ↵", "");
                formattedData.push(name + " memiliki jarak sekitar " + distance);
            }

            return locationMessage.innerHTML = formattedData.join("<br>");
        }
    </script>
</body>

</html>
