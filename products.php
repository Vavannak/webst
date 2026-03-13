// Inside the POST handling, where $type === 'tool'
if ($type === 'tool' && isset($_FILES['tool_file']) && $_FILES['tool_file']['error'] === UPLOAD_ERR_OK) {
    require_once __DIR__ . '/../blob.php';
    $tmpFile = $_FILES['tool_file']['tmp_name'];
    $originalName = $_FILES['tool_file']['name'];
    $uniqueName = uniqid() . '_' . $originalName;
    $url = uploadFileToBlob($tmpFile, 'tools/' . $uniqueName);
    $file_path = $url; // store the full URL
}
