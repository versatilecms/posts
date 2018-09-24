<?php

namespace Versatile\Posts;

use Versatile\Core\Facades\Versatile;
use Versatile\Core\Traits\Translatable;
use Versatile\Core\Traits\HasRelationships;
use Versatile\Core\Models\BaseModel;

class Category extends BaseModel
{
    use Translatable,
        HasRelationships;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function posts()
    {
        return $this->hasMany(Post::class)
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }
}
