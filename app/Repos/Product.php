<?php

namespace App\Repos;

use App\Services\Media\HasMediaInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;

class Product extends Model implements HasMediaInterface
{

    protected $fillable = [
        'name',
        'slug',
        'is_available',
        'user_id',
        'cat_id',
        'used_for',
        'description',
        'home_delivery',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $this->createSlug($value);
    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Product::select('slug')->where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'cat_id', 'id');
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function scopeSold($q)
    {
        return $q->where('is_available', 0);
    }

    public function ScopeFilter($q, $args)
    {
        if (isset($args['filter'])) {
            $filter = $args['filter'];

            if (isset($filter['sold']) && $filter['sold']) {
                $q->where('is_available', 0);
            }
            if (!isset($filter['sold']) || !$filter['sold']) {
                $q->where('is_available', 1);
            }

            if (isset($filter['search'])) {
                $q->where('name', 'LIKE', "%{$filter['search']}%")
                    ->orWhere('description', 'LIKE', "%{$filter['search']}%");
            }

            if (isset($filter['slug'])) {
                $q->where('slug', $filter['slug']);
            }

            if (isset($filter['catId'])) {

                $catId = $filter['catId'];
                $q->whereIn('cat_id',function($query) use ($catId) {
                    $query->select('id')->from('product_categories')->where('parent_id',$catId);
                });
            }

            if (isset($filter['latest'])) {
                $q->orderByDesc('created_at');
            }

        }

        return $q;
    }

    public function scopeBySlug($q, $slug)
    {
        return $q->where('slug', $slug);
    }

    public function scopeByUser($q, $userId)
    {
        return $q->where('user_id', $userId);
    }

    public function getSizes(): array
    {
        // TODO: Implement getSizes() method.
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'subject');
    }
}
