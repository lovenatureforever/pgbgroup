<?php
// Database Migration Tool - Run once then delete
header('Content-Type: text/plain');
echo "Starting database migration...\n\n";

// 1. Load Laravel environment
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// 2. Run migrations
try {
    echo "Running migrations...\n";
    Artisan::call('migrate', ['--force' => true]);
    echo Artisan::output();
    
    echo "\nSUCCESS: Database migrated successfully!\n";
    
} catch (Exception $e) {
    echo "\nERROR: " . $e->getMessage() . "\n";
    echo "Check your .env database configuration\n";
}

// 4. Security recommendation
echo "\nIMPORTANT: Delete this file immediately after use!\n";
?>