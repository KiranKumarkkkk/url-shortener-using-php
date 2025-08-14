<?php
$urls = file_exists('urls.json') ? json_decode(file_get_contents('urls.json'), true) : [];
$code = $_GET['c'] ?? '';

if ($code && isset($urls[$code])) {
    header("Location: " . $urls[$code]);
    exit;
} else {
    echo "Invalid or expired short URL.";
}
