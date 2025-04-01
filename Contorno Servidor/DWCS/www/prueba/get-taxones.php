<?php
if (!isset($_GET['parentKey']) || !isset($_GET['rank'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Faltan parámetros']);
    exit;
}

$parentKey = intval($_GET['parentKey']);
$rank = strtoupper($_GET['rank']);

$url = "https://api.gbif.org/v1/species/{$parentKey}/children?rank={$rank}&limit=1000";

$response = file_get_contents($url);
$data = json_decode($response, true);

$resultados = [];
if (isset($data['results'])) {
    foreach ($data['results'] as $item) {
        $nombre = $item['canonicalName'] ?? $item['scientificName'] ?? null;
        if ($nombre) {
            $resultados[] = [
                'key' => $item['key'],
                'name' => $nombre
            ];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($resultados);
