<?php
header('Content-Type: application/json');

$dir = $_SERVER['DOCUMENT_ROOT'] . '/doc/import/';

// On récupère le nom envoyé par JS, sinon on utilise une valeur par défaut
$filename = isset($_POST['filename']) ? basename($_POST['filename']) : 'backup.csv';
$filepath = $dir . $filename;

if (isset($_POST['csv_data'])) {
    if (!is_dir($dir)) mkdir($dir, 0777, true);

    if (file_put_contents($filepath, $_POST['csv_data']) !== false) {
        echo json_encode(['status' => 'success', 'path' => $filepath]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Permission denied']);
    }
}
?>