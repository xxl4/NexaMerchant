<?php
namespace Webkul\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Sales\Contracts\OrderDispute as OrderDisputeContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Sales\Database\Factories\OrderDisputeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDispute extends Model implements OrderDisputeContract {

    use HasFactory;

    protected $dates = ['created_at'];

    protected $appends = ['datetime'];

     /**
     * Castable.
     *
     * @var array
     */
    protected $casts = [
        'disputed_transactions' => 'json',
        'adjudications' => 'json',
        'refund_details' => 'json',
        'offer' => 'json',
        'messages' => 'json',
        'json' => 'json',
    ];

     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'dispute_id',
        'transaction_id',
        'status',
        'disputed_transactions',
        'adjudications',
        'refund_details',
        'offer',
        'json',
        'messages',
        'created_at',
        'updated_at',
    ];

    public function getDatetimeAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
        return $this->created_at->format('Y-m-d H:i:s');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return OrderDisputeFactory::new();
    }

}