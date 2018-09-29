<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Posts\Category;

class Categories extends AbstractBreadSeeder
{
    public function permissions()
    {
        return [
            [
                'name' => 'browse_categories',
                'description' => null,
                'table_name' => 'categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'read_categories',
                'description' => null,
                'table_name' => 'categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'edit_categories',
                'description' => null,
                'table_name' => 'categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'add_categories',
                'description' => null,
                'table_name' => 'categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'delete_categories',
                'description' => null,
                'table_name' => 'categories',
                'roles' => ['admin']
            ]
        ];
    }

    public function extras()
    {
        // Content
        $category = Category::firstOrNew([
            'slug' => 'category-1',
        ]);

        if (!$category->exists) {
            $category->fill([
                'name' => 'Category 1',
            ])->save();
        }

        $category = Category::firstOrNew([
            'slug' => 'category-2',
        ]);

        if (!$category->exists) {
            $category->fill([
                'name' => 'Category 2',
            ])->save();
        }
    }
}
