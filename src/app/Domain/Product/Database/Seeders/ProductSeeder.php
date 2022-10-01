<?php

namespace App\Domain\Product\Database\Seeders;

use App\Domain\Product\Models\Product;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use JsonException;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws JsonException|FileNotFoundException
     */
    public function run(): void
    {
        Product::upsert($this->getDataset(), 'sku');
    }

    /**
     * Get dataset.
     *
     * @return array
     * @throws JsonException|FileNotFoundException
     */
    protected function getDataset(): array
    {
        $jsonData = File::get(app_path('Domain/Product/Database/dataset.json'));

        return json_decode($jsonData, true, 512, JSON_THROW_ON_ERROR)['products'];
    }
}
