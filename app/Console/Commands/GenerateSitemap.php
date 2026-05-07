<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate static sitemap.xml file in public directory';

    public function handle(): int
    {
        $articles = Article::where('status', 'published')
            ->latest('updated_at')
            ->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        // Homepage
        $xml .= '    <url>' . PHP_EOL;
        $xml .= '        <loc>' . url('/') . '</loc>' . PHP_EOL;
        $xml .= '        <lastmod>' . now()->tz('UTC')->toAtomString() . '</lastmod>' . PHP_EOL;
        $xml .= '        <changefreq>daily</changefreq>' . PHP_EOL;
        $xml .= '        <priority>1.0</priority>' . PHP_EOL;
        $xml .= '    </url>' . PHP_EOL;

        // Articles
        foreach ($articles as $article) {
            $xml .= '    <url>' . PHP_EOL;
            $xml .= '        <loc>' . route('articles.show', $article->slug) . '</loc>' . PHP_EOL;
            $xml .= '        <lastmod>' . $article->updated_at->tz('UTC')->toAtomString() . '</lastmod>' . PHP_EOL;
            $xml .= '        <changefreq>monthly</changefreq>' . PHP_EOL;
            $xml .= '        <priority>0.8</priority>' . PHP_EOL;
            $xml .= '    </url>' . PHP_EOL;
        }

        $xml .= '</urlset>' . PHP_EOL;

        $path = public_path('sitemap.xml');
        file_put_contents($path, $xml);

        $this->info("Sitemap generated successfully at: {$path}");
        $this->info("Total URLs: " . ($articles->count() + 1));

        return self::SUCCESS;
    }
}
