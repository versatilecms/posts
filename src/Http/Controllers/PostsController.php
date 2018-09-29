<?php

namespace Versatile\Posts\Http\Controllers;

use Versatile\Core\Http\Controllers\BaseController;
use Versatile\Posts\Post;
use Versatile\Posts\Policies\PostPolicy;

class PostsController extends BaseController
{
    /**
     * Informs if DataType will be loaded from the database or setup
     *
     * @var bool
     */
    protected $dataTypeFromDatabase = false;

    public function setup()
    {
        $this->bread->setName('posts');
        $this->bread->setSlug('posts');

        $this->bread->setDisplayNameSingular(__('versatile::seeders.data_types.post.singular'));
        $this->bread->setDisplayNamePlural(__('versatile::seeders.data_types.post.plural'));

        $this->bread->setIcon('versatile-news');
        $this->bread->setModel(Post::class);
        $this->bread->addPolicy(Post::class, PostPolicy::class);

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
                'field' => 'author_id',
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.author'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => false,
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
                'field' => 'category_id',
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.category'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => false,
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
                'field' => 'title',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.title'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => []
            ],

            [
                'field' => 'excerpt',
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.excerpt'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => []
            ],

           [
                'field' => 'body',
                'type' => 'rich_text_box',
                'display_name' => __('versatile::seeders.data_rows.body'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => []
            ],

            [
                'field' => 'image',
                'type' => 'image',
                'display_name' => __('versatile::seeders.data_rows.post_image'),
                'required' => false,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'resize' => [
                        'width' => '1000',
                        'height' => 'null',
                    ],
                    'quality' => '70%',
                    'upsize' => true,
                    'thumbnails' => [
                        [
                            'name' => 'medium',
                            'scale' => '50%',
                        ],
                        [
                            'name' => 'small',
                            'scale' => '25%',
                        ],
                        [
                            'name' => 'cropped',
                            'crop' => [
                                'width' => '300',
                                'height' => '250',
                            ],
                        ],
                    ],
                ]
            ],

            [
                'field' => 'slug',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.slug'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'slugify' => [
                        'origin' => 'title',
                        'forceUpdate' => true,
                    ],
                ]
            ],

            [
                'field' => 'meta_title',
                'type'         => 'text',
                'display_name' => __('versatile::seeders.data_rows.seo_title'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 9,
            ],

            [
                'field' => 'meta_description',
                'type'         => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.meta_description'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 10,
            ],

            [
                'field' => 'meta_keywords',
                'type'         => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.meta_keywords'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 11,
            ],

            [
                'field' => 'status',
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.status'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'default' => 'DRAFT',
                    'options' => [
                        'PUBLISHED' => 'published',
                        'DRAFT' => 'draft',
                        'PENDING' => 'pending',
                    ],
                ]
            ],

            [
                'field' => 'featured',
                'type'         => 'checkbox',
                'display_name' => __('versatile::seeders.data_rows.featured'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 13,
            ],

            [
                'field' => 'tags',
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.tags'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => []
            ],

            [
                'field' => 'published_date',
                'type' => 'date',
                'display_name' => __('versatile::seeders.data_rows.published_at'),
                'required' => false,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'format' => '%d/%m/%Y %H:%M:%S',
                    'format_edit' => '%d/%m/%Y %H:%M:%S',
                    'datetimepicker' => [
                        'locale' => 'pt-br',
                        'format' => 'DD/MM/YYYY HH:mm:ss'
                    ],
                    'validation' => [
                        'rules' => [
                            'required_if:status:PUBLISHED',
                            'date_format:YYYY-MM-DD',
                        ]
                    ]
                ]
            ],

            [
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.created_at'),
                'required' => false,
                'browse' => true,
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
            ],
        ]);
    }
}
