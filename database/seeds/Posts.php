<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Posts\Post;

class Posts extends AbstractBreadSeeder
{
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
