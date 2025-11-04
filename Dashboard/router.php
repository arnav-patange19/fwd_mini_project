<?php
// router.php for PHP built-in server
// Serve static files directly
$path = ltrim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), '/');
if ($path && file_exists($path) && !is_dir($path)) {
    return false; // Let PHP server handle static file
}
// Serve PHP files as usual
if (preg_match('/\.php$/', $path)) {
    return false;
}
// Otherwise, serve dashboard.html
if (file_exists('dashboard.html')) {
    readfile('dashboard.html');
    return true;
}
http_response_code(404);
echo "Not Found";
