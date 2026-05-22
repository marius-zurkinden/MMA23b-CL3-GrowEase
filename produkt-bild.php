<?php
require_once 'db.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT Bild FROM Produkt WHERE id = :id");
$stmt->execute([
    ':id' => $id
]);

$produkt = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produkt || empty($produkt['Bild'])) {
    http_response_code(404);
    exit;
}

header('Content-Type: image/png');
echo $produkt['Bild'];
?>
