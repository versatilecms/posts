<?php

namespace Versatile\Posts;

use Illuminate\Database\Eloquent\Builder;
use Versatile\Core\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use Versatile\Core\Facades\Versatile;
use Versatile\Core\Traits\HasRelationships;
use Versatile\Core\Traits\Resizable;
use Versatile\Core\Traits\Translatable;

use Laravel\Scout\Searchable;
use Versatile\Front\Helpers\BladeCompiler;

class Post extends BaseModel
{
    use Translatable,
        Resizable,
        HasRelationships,
        Searchable;

    public $asYouType = false;

    protected $translatable = [
        'title',
        'meta_title',
        'excerpt',
        'body',
        'slug',
        'meta_description',
        'meta_keywords'
    ];

    const PUBLISHED = 'PUBLISHED';

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->id;
        }

        parent::save();
    }

    public function authorId()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryId()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the indexed data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->toArray();
    }

    /**
     * Update the post body
     *
     * @param  string $value
     * @return string
     * @throws \Exception
     */
    public function getBodyAttribute($value)
    {
        if (!empty($value)) {
            return BladeCompiler::getHtmlFromString($value);
        }
    }
}
