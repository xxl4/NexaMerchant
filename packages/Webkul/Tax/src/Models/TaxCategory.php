<?php

namespace Webkul\Tax\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Webkul\Tax\Database\Factories\TaxCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Webkul\Tax\Contracts\TaxCategory as TaxCategoryContract;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Webkul\Tax\Contracts\TaxCategory as TaxCategoryContract;
use Webkul\Tax\Database\Factories\TaxCategoryFactory;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class TaxCategory extends Model implements TaxCategoryContract
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    protected $table = 'tax_categories';

    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    //for joining the two way pivot table
    public function tax_rates(): BelongsToMany
    {
        return $this->belongsToMany(TaxRateProxy::modelClass(), 'tax_categories_tax_rates', 'tax_category_id')
            ->withPivot('id');
    }

    /**
     * Create a new factory instance for the model.
<<<<<<< HEAD
     *
     * @return Factory
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected static function newFactory(): Factory
    {
        return TaxCategoryFactory::new();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
