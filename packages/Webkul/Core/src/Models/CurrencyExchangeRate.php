<?php

namespace Webkul\Core\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Admin\Database\Factories\CurrencyExchangeRateFactory;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Core\Contracts\CurrencyExchangeRate as CurrencyExchangeRateContract;

class CurrencyExchangeRate extends Model implements CurrencyExchangeRateContract
{
<<<<<<< HEAD
=======
    use HasFactory;

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_currency',
        'rate',
    ];

    /**
     * Get the exchange rate associated with the currency.
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(CurrencyProxy::modelClass(), 'target_currency');
    }
<<<<<<< HEAD
}
=======

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return CurrencyExchangeRateFactory::new();
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
