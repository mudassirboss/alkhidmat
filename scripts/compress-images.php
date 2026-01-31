<?php
/**
 * Simple Image Compression Script using PHP GD
 * Compresses all images in public/images directory
 */

$imagePath = __DIR__ . '/../public/images/';
$quality = 70; // Quality percentage (0-100)
$maxWidth = 1920;
$maxHeight = 1080;

function compressImage($source, $destination, $quality, $maxWidth, $maxHeight) {
    $info = getimagesize($source);
    
    if ($info === false) {
        return false;
    }

    $width = $info[0];
    $height = $info[1];
    $mime = $info['mime'];

    // Calculate new dimensions if image is too large
    if ($width > $maxWidth || $height > $maxHeight) {
        $ratio = min($maxWidth / $width, $maxHeight / $height);
        $newWidth = (int)($width * $ratio);
        $newHeight = (int)($height * $ratio);
    } else {
        $newWidth = $width;
        $newHeight = $height;
    }

    // Create image resource based on type
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($source);
            break;
        default:
            return false;
    }

    if ($image === false) {
        return false;
    }

    // Create new image with new dimensions
    $output = imagecreatetruecolor($newWidth, $newHeight);
    
    // Preserve transparency for PNG and GIF
    if ($mime === 'image/png' || $mime === 'image/gif') {
        imagealphablending($output, false);
        imagesavealpha($output, true);
    }

    // Resize image
    imagecopyresampled($output, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Save compressed image
    $success = false;
    switch ($mime) {
        case 'image/jpeg':
            $success = imagejpeg($output, $destination, $quality);
            break;
        case 'image/png':
            // PNG quality is 0 (best) to 9 (worst compression)
            $pngQuality = (int)(9 - ($quality / 100 * 9));
            $success = imagepng($output, $destination, $pngQuality);
            break;
        case 'image/gif':
            $success = imagegif($output, $destination);
            break;
        case 'image/webp':
            $success = imagewebp($output, $destination, $quality);
            break;
    }

    imagedestroy($image);
    imagedestroy($output);

    return $success;
}

// Main compression logic
echo "🖼️  Starting image compression...\n\n";

$files = glob($imagePath . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
$totalOriginal = 0;
$totalCompressed = 0;
$successCount = 0;
$failCount = 0;

foreach ($files as $file) {
    $filename = basename($file);
    $originalSize = filesize($file);
    $totalOriginal += $originalSize;
    
    echo "Compressing: $filename (" . round($originalSize / 1024, 2) . " KB)...";
    
    if (compressImage($file, $file, $quality, $maxWidth, $maxHeight)) {
        $newSize = filesize($file);
        $totalCompressed += $newSize;
        $saved = $originalSize - $newSize;
        $savedPercent = round(($saved / $originalSize) * 100, 1);
        
        echo " ✅ Saved " . round($saved / 1024, 2) . " KB ({$savedPercent}%)\n";
        $successCount++;
    } else {
        echo " ❌ Failed\n";
        $failCount++;
    }
}

echo "\n📊 Compression Summary:\n";
echo "═══════════════════════\n";
echo "✅ Successfully compressed: $successCount images\n";
if ($failCount > 0) {
    echo "❌ Failed: $failCount images\n";
}
echo "📦 Original total: " . round($totalOriginal / 1024 / 1024, 2) . " MB\n";
echo "📦 Compressed total: " . round($totalCompressed / 1024 / 1024, 2) . " MB\n";
echo "💾 Total saved: " . round(($totalOriginal - $totalCompressed) / 1024 / 1024, 2) . " MB\n";
$percentSaved = round((($totalOriginal - $totalCompressed) / $totalOriginal) * 100, 1);
echo "📉 Reduction: {$percentSaved}%\n";
echo "\n🎉 Compression complete!\n";
