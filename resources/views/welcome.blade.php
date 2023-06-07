<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Get My Location</title>
</head>

<body>
  <div class="container mt-4">
    <h2>Get My Location</h2>
    <button id="getLocationBtn" class="btn btn-primary">Get My Location</button>
    <p id="locationMessage"></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    const getLocationBtn = document.getElementById('getLocationBtn');
    const locationMessage = document.getElementById('locationMessage');

    getLocationBtn.addEventListener('click', function () {
      // Mendapatkan lokasi pengguna
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        locationMessage.textContent = 'Geolocation is not supported by this browser.';
      }
    });

    function showPosition(position) {
      // Mendapatkan latitude dan longitude
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      // Menampilkan pesan lokasi berhasil didapatkan
      locationMessage.textContent = `Lokasi berhasil didapatkan. Latitude: ${latitude}, Longitude: ${longitude}`;
    }
  </script>
</body>

</html>
