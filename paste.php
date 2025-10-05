<?php
session_start();

// Rate limiting
if (!isset($_SESSION['last_paste'])) {
    $_SESSION['last_paste'] = 0;
}

$time_since_last = time() - $_SESSION['last_paste'];
if ($time_since_last < 10) { // 10 seconds between pastes
    http_response_code(429);
    die(json_encode(['error' => 'Please wait ' . (10 - $time_since_last) . ' seconds before creating another paste.']));
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['content'])) {
    $content = trim($_POST['content']);
    $expiry = $_POST['expiry'] ?? 'never';
    
    // Generate unique code
    do {
        $code = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, 8);
        $textFile = "pastes/$code.json";
    } while (file_exists($textFile));

    // Create directories
    if (!file_exists("pastes")) mkdir("pastes", 0755, true);
    if (!file_exists("uploads")) mkdir("uploads", 0755, true);

    // Handle uploaded images
    $uploadedImages = [];
    $maxFileSize = 10 * 1024 * 1024; // 10MB
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $index => $name) {
            if ($_FILES['images']['error'][$index] === UPLOAD_ERR_OK) {
                $fileSize = $_FILES['images']['size'][$index];
                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                
                if ($fileSize > $maxFileSize) {
                    continue; // Skip files that are too large
                }
                
                if (in_array($ext, $allowedTypes)) {
                    $newName = $code . "_" . uniqid() . "." . $ext;
                    $dest = "uploads/" . $newName;
                    
                    if (move_uploaded_file($_FILES['images']['tmp_name'][$index], $dest)) {
                        // Get image dimensions
                        $imageInfo = getimagesize($dest);
                        $uploadedImages[] = [
                            'filename' => $newName,
                            'original_name' => $name,
                            'size' => $fileSize,
                            'width' => $imageInfo[0] ?? 0,
                            'height' => $imageInfo[1] ?? 0,
                            'mime' => $imageInfo['mime'] ?? ''
                        ];
                    }
                }
            }
        }
    }

    // Calculate expiry timestamp
    $expiryTimestamp = null;
    switch ($expiry) {
        case '1hour':
            $expiryTimestamp = time() + 3600;
            break;
        case '1day':
            $expiryTimestamp = time() + 86400;
            break;
        case '1week':
            $expiryTimestamp = time() + 604800;
            break;
        case '1month':
            $expiryTimestamp = time() + 2592000;
            break;
    }

    // Prepare data
    $pasteData = [
        'content' => $content,
        'images' => $uploadedImages,
        'created_at' => time(),
        'expires_at' => $expiryTimestamp,
        'views' => 0,
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];

    // Save paste data
    file_put_contents($textFile, json_encode($pasteData, JSON_PRETTY_PRINT));
    
    $_SESSION['last_paste'] = time();

    // Get the base URL dynamically
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $baseUrl = "$protocol://$host";
    
    // Remove any trailing slash and add the code directly
    $url = rtrim($baseUrl, '/') . '/' . $code;

    // Return JSON response for AJAX or redirect for regular form
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'code' => $code, 'url' => $url]);
    } else {
        header("Location: $code");
    }
    exit;
} else {
    http_response_code(400);
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Invalid request. Content is required.']);
    } else {
        echo "Invalid request. Content is required.";
    }
}
?>