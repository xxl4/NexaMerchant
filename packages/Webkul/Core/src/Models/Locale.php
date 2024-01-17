<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Webkul\Core\Contracts\Locale as LocaleContract;
use Webkul\Core\Database\Factories\LocaleFactory;

class Locale extends Model implements LocaleContract
{
    use HasFactory;
<<<<<<< HEAD
   
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'direction',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['logo_url'];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
<<<<<<< HEAD
        return LocaleFactory::new ();
=======
        return LocaleFactory::new();
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Get the logo full path of the locale.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return string|null
     */
    public function getLogoUrlAttribute()
    {
        return $this->logo_url();
    }

    /**
     * Get the logo full path of the locale.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return string|void
     */
    public function logo_url()
    {
        if (empty($this->logo_path)) {
            return;
        }
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        return Storage::url($this->logo_path);
    }
}
