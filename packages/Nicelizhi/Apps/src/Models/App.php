<?php
namespace Nicelizhi\Apps\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model {
    protected $table = 'apps';
    protected $fillable = [
        'name',
        'slug',
        'code',
        'description',
        'version',
        'author',
        'email',
        'url',
        'icon',
        'status',
        'type',
        'category',
        'tags',
        'price',
        'license',
        'require',
        'require_php',
        'require_laravel',
        'require_mysql',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public function getRouteKeyName() {
        return 'slug';
    }
    public function scopeEnabled($query) {
        return $query->where('status', 'enable');
    }
    public function scopeDisabled($query) {
        return $query->where('status', 'disable');
    }
    public function scopeApplied($query) {
        return $query->where('status', 'apply');
    }
    public function scopeType($query, $type) {
        return $query->where('type', $type);
    }
    public function scopeCategory($query, $category) {
        return $query->where('category', $category);
    }
    public function scopeTag($query, $tag) {
        return $query->where('tags', 'like', "%$tag%");
    }
    public function scopePrice($query, $price) {
        return $query->where('price', $price);
    }
    public function scopeLicense($query, $license) {
        return $query->where('license', $license);
    }
    public function scopeRequire($query, $require) {
        return $query->where('require', $require);
    }
    public function scopeRequirePhp($query, $require_php) {
        return $query->where('require_php', $require_php);
    }
    public function scopeRequireLaravel($query, $require_laravel) {
        return $query->where('require_laravel', $require_laravel);
    }
    public function scopeRequireMysql($query, $require_mysql) {
        return $query->where('require_mysql', $require_mysql);
    }
    public function scopeSearch($query, $search) {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('tags', 'like', "%$search%");
    }
}