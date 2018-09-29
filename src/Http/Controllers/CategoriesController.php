<?php

namespace Versatile\Posts\Http\Controllers;

use Versatile\Core\Http\Controllers\BaseController;
use Versatile\Posts\Category;
use Versatile\Posts\Policies\PostPolicy;

class CategoriesController extends BaseController
{
    /**
     * Informs if DataType will be loaded from the database or setup
     *
     * @var bool
     */
    protected $dataTypeFromDatabase = false;

    public function setup()
    {
        $this->bread->setName('categories');
        $this->bread->setSlug('categories');

        $this->bread->setDisplayNameSingular(__('versatile::seeders.data_types.category.singular'));
        $this->bread->setDisplayNamePlural(__('versatile::seeders.data_types.category.plural'));

        $this->bread->setIcon('versatile-categories');
        $this->bread->setModel(Category::class);

        $this->bread->addDataRows([
            [
                'field' => 'id',
                'type' => 'number',
                'display_name' => __('versatile::seeders.data_rows.id'),
                'required' => true,
                'browse' => false,
                'read' => false,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => []
            ],

            [
                'field' => 'parent_id',
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.parent'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
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
                ]
            ],

            [
                'field' => 'order',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.order'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'default' => 1,
                ]
            ],

            [
                'field' => 'name',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.name'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => []
            ],

            [
                'field' => 'slug',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.slug'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'slugify' => [
                        'origin' => 'name',
                    ],
                ]
            ],

            [
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.created_at'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => []
            ],

            [
                'field' => 'updated_at',
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.updated_at'),
                'required' => false,
                'browse' => false,
                'read' => false,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => []
            ]
        ]);
    }
}
