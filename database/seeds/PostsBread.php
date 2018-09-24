<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Posts\Post;

class PostsBread extends AbstractBreadSeeder
{
    public function bread()
    {
        return [
            'name' => 'posts',
            'slug' => 'posts',
            'display_name_singular' => __('versatile::seeders.data_types.post.singular'),
            'display_name_plural' => __('versatile::seeders.data_types.post.plural'),
            'icon' => 'versatile-news',
            'model_name' => 'Versatile\\Posts\\Post',
            'policy_name' => 'Versatile\\Posts\\Policies\\PostPolicy',
            'controller' => '\\Versatile\\Posts\\Http\\Controllers\\PostsController',
            'generate_permissions' => 1
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
                'details' => '',
                'order' => 1,
            ],

            'author_id' => [
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.author'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 0,
                'delete' => 1,
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

            'category_id' => [
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.category'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
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
                'order' => 3,
            ],

            'title' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.title'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 4,
            ],

            'excerpt' => [
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.excerpt'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 5,
            ],

            'body' => [
                'type' => 'rich_text_box',
                'display_name' => __('versatile::seeders.data_rows.body'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 6,
            ],

            'image' => [
                'type' => 'image',
                'display_name' => __('versatile::seeders.data_rows.post_image'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
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
                ],
                'order' => 7,
            ],

            'slug' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.slug'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'slugify' => [
                        'origin' => 'title',
                        'forceUpdate' => true,
                    ],
                ],
                'order' => 8,
            ],

            'meta_title' => [
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

            'meta_description' => [
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

            'meta_keywords' => [
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

            'status' => [
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.status'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'default' => 'DRAFT',
                    'options' => [
                        'PUBLISHED' => 'published',
                        'DRAFT' => 'draft',
                        'PENDING' => 'pending',
                    ],
                ],
                'order' => 12,
            ],

            'featured' => [
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

            'tags' => [
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.tags'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 14,
            ],

            'published_date' => [
                'type' => 'date',
                'display_name' => __('versatile::seeders.data_rows.published_at'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'format' => '%Y-%m-%d',
                    'validation' => [
                        'rules' => [
                            'required_if:status:PUBLISHED',
                            'date_format:YYYY-MM-DD',
                        ]
                    ]
                ],
                'order' => 15,
            ],

            'created_at' => [
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.created_at'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 16,
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
                'details' => '',
                'order' => 17,
            ],
        ];
    }

    public function menu()
    {
        return [
            [
                'role' => 'admin',
                'title' => 'Posts',
                'icon_class' => 'versatile-news',
                'order' => 4,
                'children' => [
                    [
                        'title' => 'Posts',
                        'route' => 'versatile.posts.index',
                        'icon_class' => 'versatile-news',
                        'order' => 1,
                    ],
                    [
                        'title' => __('versatile::seeders.menu_items.categories'),
                        'route' => 'versatile.categories.index',
                        'icon_class' => 'versatile-categories',
                        'order' => 2,
                    ]
                ]
            ]
        ];
    }

    public function permissions()
    {
        return [
            [
                'name' => 'browse_posts',
                'description' => null,
                'table_name' => 'posts',
                'roles' => ['admin']
            ],
            [
                'name' => 'read_posts',
                'description' => null,
                'table_name' => 'posts',
                'roles' => ['admin']
            ],
            [
                'name' => 'edit_posts',
                'description' => null,
                'table_name' => 'posts',
                'roles' => ['admin']
            ],
            [
                'name' => 'add_posts',
                'description' => null,
                'table_name' => 'posts',
                'roles' => ['admin']
            ],
            [
                'name' => 'delete_posts',
                'description' => null,
                'table_name' => 'posts',
                'roles' => ['admin']
            ],
            [
                'name' => 'filter_posts',
                'description' => null,
                'table_name' => 'posts',
                'roles' => ['admin']
            ],
        ];
    }

    public function extras()
    {
        // Seed our example blog posts
        $firstPost = Post::firstOrNew(['slug' => 'my-first-blog-post']);
        if (!$firstPost->exists) {
            $firstPost->fill([
                'author_id' => '0',
                'category_id' => '1',
                'title' => 'My First Blog Post',
                'excerpt' => 'An example blog post',
                'image'            => 'posts/post1.jpg',
                'body' => '<p>Matey yardarm topmast broadside nipper weigh anchor jack quarterdeck crow\'s nest rigging. Topgallant lateen sail line avast me gun Pirate Round strike colors bilge rat take a caulk. Jack six pounders spanker doubloon clipper spirits case shot hang the jib boatswain red ensign.</p>
<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'slug' => 'my-first-blog-post',
                'meta_description' => 'A test blog post',
                'status' => 'PUBLISHED',
                'featured' => 0,
                'published_date' => date('Y-m-d H:i:s'),
            ])->save();
        }

        $secondPost = Post::firstOrNew(['slug' => 'my-second-blog-post']);
        if (!$secondPost->exists) {
            $secondPost->fill([
                'author_id' => '0',
                'category_id' => '1',
                'title' => 'My Second Blog Post',
                'excerpt' => 'An example blog post',
                'image'            => 'posts/post2.jpg',
                'body' => '<p>Matey yardarm topmast broadside nipper weigh anchor jack quarterdeck crow\'s nest rigging. Topgallant lateen sail line avast me gun Pirate Round strike colors bilge rat take a caulk. Jack six pounders spanker doubloon clipper spirits case shot hang the jib boatswain red ensign.</p>
<p>Hornswaggle spanker spyglass Yellow Jack mutiny Arr lugger poop deck keel take a caulk. Quarter fire ship run a shot across the bow sheet log draft scallywag gally port skysail. Lugsail gangway draft pink piracy bilge Buccaneer heave to landlubber or just lubber Pieces of Eight.</p>',
                'slug' => 'my-second-blog-post',
                'meta_description' => 'A test blog post',
                'status' => 'PUBLISHED',
                'featured' => 0,
                'published_date' => date('Y-m-d H:i:s'),
            ])->save();
        }
    }
}
