<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class ImageCompressionService
{
    protected $manager;
    protected $quality = 75; // Quality for JPG/PNG (0-100)
    protected $maxWidth = 1920; // Max width for images
    protected $maxHeight = 1080; // Max height for images

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }

    /**
     * Compress a single image
     */
    public function compress(string $path, int $quality = null): bool
    {
        try {
            if (!File::exists($path)) {
                return false;
            }

            $quality = $quality ?? $this->quality;
            
            // Read the image
            $image = $this->manager->read($path);
            
            // Get original dimensions
            $width = $image->width();
            $height = $image->height();
            
            // Resize if too large (maintain aspect ratio)
            if ($width > $this->maxWidth || $height > $this->maxHeight) {
                $image->scale(width: $this->maxWidth, height: $this->maxHeight);
            }
            
            // Determine file extension
            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            
            // Save with compression based on format
            if (in_array($extension, ['jpg', 'jpeg'])) {
                $image->toJpeg($quality)->save($path);
            } elseif ($extension === 'png') {
                // PNG compression (0-9, where 9 is maximum compression)
                $pngQuality = (int) (9 - ($quality / 100 * 9));
                $image->toPng()->save($path);
            } elseif ($extension === 'webp') {
                $image->toWebp($quality)->save($path);
            }
            
            return true;
        } catch (\Exception $e) {
            \Log::error("Image compression failed: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Compress all images in a directory
     */
    public function compressDirectory(string $directory, int $quality = null): array
    {
        $results = [
            'success' => 0,
            'failed' => 0,
            'total_saved' => 0
        ];

        if (!File::isDirectory($directory)) {
            return $results;
        }

        $files = File::allFiles($directory);

        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());
            
            if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
                continue;
            }

            $originalSize = $file->getSize();
            
            if ($this->compress($file->getPathname(), $quality)) {
                $newSize = filesize($file->getPathname());
                $results['total_saved'] += ($originalSize - $newSize);
                $results['success']++;
            } else {
                $results['failed']++;
            }
        }

        return $results;
    }

    /**
     * Convert image to WebP format (best compression)
     */
    public function convertToWebP(string $sourcePath, string $destinationPath = null, int $quality = null): bool
    {
        try {
            $quality = $quality ?? $this->quality;
            $destinationPath = $destinationPath ?? str_replace(['.jpg', '.jpeg', '.png'], '.webp', $sourcePath);
            
            $image = $this->manager->read($sourcePath);
            
            // Resize if needed
            if ($image->width() > $this->maxWidth || $image->height() > $this->maxHeight) {
                $image->scale(width: $this->maxWidth, height: $this->maxHeight);
            }
            
            $image->toWebp($quality)->save($destinationPath);
            
            return true;
        } catch (\Exception $e) {
            \Log::error("WebP conversion failed: " . $e->getMessage());
            return false;
        }
    }
}
