<?php
// Laravel Cache Cleaner - Run then delete
header('Content-Type: text/plain');
echo "Laravel Cache Cleaning Tool\n";
echo str_repeat("=", 40) . "\n\n";

// Load Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Cache clearing sequence
$commands = [
    'route:clear' => 'Route cache cleared',
    'config:clear' => 'Config cache cleared',
    'cache:clear' => 'Application cache cleared',
    'view:clear' => 'View cache cleared',
    'clear-compiled' => 'Compiled classes cleared',
];

$success = true;
foreach ($commands as $command => $message) {
    try {
        Artisan::call($command);
        echo "✓ " . $message . "\n";
        usleep(100000); // Small delay for readability
    } catch (Exception $e) {
        echo "✗ Failed to run: " . $command . " - " . $e->getMessage() . "\n";
        $success = false;
    }
}

// Optional: Manual file deletion as backup
echo "\n=== MANUAL FILE CLEANUP ===\n";
$cachePath = __DIR__.'/../bootstrap/cache/';
$files = [
    'routes-v7.php',
    'packages.php',
    'services.php',
    'config.php',
];

foreach ($files as $file) {
    $filePath = $cachePath . $file;
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "✓ Deleted: $file\n";
        } else {
            echo "✗ Could not delete: $file (permission issue?)\n";
        }
    }
}

// Clear OPcache
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "✓ OPcache cleared\n";
}

echo "\n" . ($success ? "✅ All caches cleared successfully!" : "⚠️ Some operations failed") . "\n";
echo "\n⚠️ SECURITY: Delete this file immediately after use!\n";
?>