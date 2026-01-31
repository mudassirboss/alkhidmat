<?php

namespace App\Console\Commands;

use App\Services\ImageCompressionService;
use Illuminate\Console\Command;

class CompressImages extends Command
{
    protected $signature = 'images:compress 
                            {directory? : Directory to compress images in (default: public/images)}
                            {--quality=75 : Compression quality (0-100)}';

    protected $description = 'Compress all images in a directory to reduce file size';

    public function handle(ImageCompressionService $compressionService)
    {
        $directory = $this->argument('directory') ?? public_path('images');
        $quality = (int) $this->option('quality');

        $this->info("🖼️  Compressing images in: {$directory}");
        $this->info("📊 Quality level: {$quality}%");
        $this->newLine();

        $results = $compressionService->compressDirectory($directory, $quality);

        $this->info("✅ Successfully compressed: {$results['success']} images");
        
        if ($results['failed'] > 0) {
            $this->warn("❌ Failed to compress: {$results['failed']} images");
        }

        $savedMB = round($results['total_saved'] / 1024 / 1024, 2);
        $this->info("💾 Total space saved: {$savedMB} MB");
        $this->newLine();
        $this->info('🎉 Image compression complete!');

        return Command::SUCCESS;
    }
}
