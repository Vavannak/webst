<?php
require_once __DIR__ . '/vendor/autoload.php';

use Vercel\Blob\BlobClient;

function uploadFileToBlob($filePath, $fileName) {
    $client = new BlobClient([
        'token' => getenv('BLOB_READ_WRITE_TOKEN'),
    ]);
    $fileContent = file_get_contents($filePath);
    $response = $client->put($fileName, $fileContent);
    return $response->url; // returns public URL
}
