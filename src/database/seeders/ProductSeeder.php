<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use JsonException;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws JsonException
     */
    public function run(): void
    {
        Product::upsert($this->getDataset(), 'sku');
    }

    /**
     * Get dataset.
     *
     * @return array
     * @throws JsonException
     */
    protected function getDataset(): array
    {
        $jsonData = File::get(database_path('dataset.json'));

        return json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR)['products'];
    }
}
