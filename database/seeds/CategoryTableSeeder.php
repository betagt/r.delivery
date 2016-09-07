<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeDelivery\Models\Category::class, 5)->create();
        for ($i = 0; $i < 10; $i++)
        {
            factory(\CodeDelivery\Models\CategoryExtra::class)->create([
                'category_id' => random_int(1,5)
            ]);
        }
    }
}
