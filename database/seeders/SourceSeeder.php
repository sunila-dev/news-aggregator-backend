<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Source::updateOrCreate(
            ['name' => 'NewsAPI'],
            ['endpoint_url' => 'https://newsapi.org/v2/top-headlines', 'auth_key' => env('NEWS_API_KEY')]
        );

        Source::updateOrCreate(
            ['name' => 'OpenNews'],
            ['endpoint_url' => 'https://api.opennews.org/v1/articles', 'auth_key' => env('OPENNEWS_API_KEY')]
        );

        Source::updateOrCreate(
            ['name' => 'NewsCred'],
            ['endpoint_url' => 'https://api.newscred.com/v3/articles', 'auth_key' => env('NEWSCRED_API_KEY')]
        );
    }
}
