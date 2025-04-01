<?php
// === CONFIGURACIÓN ===
$token = 'TU_API_KEY'; // ← tu API key de IUCN
$especie = $_GET['especie'] ?? 'Lynx pardinus'; // Puedes cambiar por lo que quieras
$lat = $_GET['lat'] ?? 40.4168; // Coordenadas simuladas
$lon = $_GET['lon'] ?? -3.7038;

function obtenerCategoriaIUCN($nombre, $token) {
    $url = "https://apiv3.iucnredlist.org/api/v3/species/" . urlencode($nombre) . "?token={$token}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data['result'][0]['category'] ?? null;
}

$categoria = obtenerCategoriaIUCN($especie, $token);

function esAmenazada($cat) {
    return in_array($cat, ['VU', 'EN', 'CR']);
}

$esAmenazada = esAmenazada($categoria);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mapa con Alerta de Especie</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        body { font-family: Arial; margin: 0; padding: 0; }
        #map { height: 100vh; }
        .leaflet-popup-content { font-size: 16px; }
    </style>
</head>
<body>

<div id="map"></div>

<script>
    const especie = "<?= htmlspecialchars($especie) ?>";
    const categoria = "<?= $categoria ?>";
    const amenazada = <?= $esAmenazada ? 'true' : 'false' ?>;
    const lat = <?= $lat ?>;
    const lon = <?= $lon ?>;

    const map = L.map('map').setView([lat, lon], 6);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data © OpenStreetMap contributors'
    }).addTo(map);

    const icono = L.icon({
        iconUrl: amenazada ? 'https://cdn-icons-png.flaticon.com/512/565/565547.png' : 'https://cdn-icons-png.flaticon.com/512/149/149059.png',
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    const mensaje = amenazada
        ? `⚠️ <strong>${especie}</strong> está en peligro (<em>${categoria}</em>).`
        : `✅ <strong>${especie}</strong> no está amenazada (<em>${categoria}</em>).`;

    L.marker([lat, lon], { icon: icono })
        .addTo(map)
        .bindPopup(mensaje)
        .openPopup();
</script>

</body>
</html>
