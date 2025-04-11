<?php

namespace Database\Seeders;

use App\Models\Categories\Category;
use App\Models\Categories\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            'menswear' => ['Shirts', 'Trousers', 'Suits'],
            'womenswear' => ['Dresses', 'Skirts', 'Blouses'],
            'kidswear' => ['T-Shirts', 'Shorts', 'Pajamas'],
        ];

        foreach ($subcategories as $categoryName => $sub) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($sub as $subName) {
                    Subcategory::factory()->create([
                        'name' => $subName,
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}
