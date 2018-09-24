<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Posts\Category;

class CategoriesBread extends AbstractBreadSeeder
{
    public function bread()
    {
        return [
            // usually the name of the table
            'name' => 'categories',
            'slug' => 'categories',
            'display_name_singular' => __('versatile::seeders.data_types.category.singular'),
            'display_name_plural' => __('versatile::seeders.data_types.category.plural'),
            'icon' => 'versatile-categories',
            'model_name' => 'Versatile\\Posts\\Category',
            'generate_permissions' => 1,
        ];
    }

    public function inputFields()
    {
        return [
            'id' => [
                'type' => 'number',
                'display_name' => __('versatile::seeders.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'filter' => 1,
                'details' => '',
                'order' => 1,
            ],

            'parent_id' => [
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.parent'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'filter' => 1,
                'details' => [
                    'default' => '',
                    'null' => '',
                    'options' => [
                        '' => '-- None --',
                    ],
                    'relationship' => [
                        'key' => 'id',
                        'label' => 'name',
                    ],
                ],
                'order' => 2,
            ],

            'order' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.order'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'filter' => 1,
                'details' => [
                    'default' => 1,
                ],
                'order' => 3,
            ],

            'name' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.name'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'filter' => 1,
                'details' => '',
                'order' => 4,
            ],

            'slug' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.slug'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'filter' => 1,
                'details' => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ],
                'order' => 5,
            ],

            'created_at' => [
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.created_at'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'filter' => 1,
                'details' => '',
                'order' => 6,
            ],

            'updated_at' => [
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.updated_at'),
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'filter' => 1,
                'details' => '',
                'order' => 7,
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
