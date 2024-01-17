<?php

namespace Webkul\Core\Repositories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD
use Webkul\Core\Eloquent\Repository;
use Webkul\Core\Contracts\Locale;
=======
use Webkul\Core\Contracts\Locale;
use Webkul\Core\Eloquent\Repository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class LocaleRepository extends Repository
{
    /**
     * Specify model class name.
<<<<<<< HEAD
     *
     * @return string
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function model(): string
    {
        return Locale::class;
    }

    /**
     * Create.
     *
<<<<<<< HEAD
     * @param  array  $attributes
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return mixed
     */
    public function create(array $attributes)
    {
        Event::dispatch('core.locale.create.before');

        $locale = parent::create($attributes);

        $this->uploadImage($attributes, $locale);

        Event::dispatch('core.locale.create.after', $locale);

        return $locale;
    }

    /**
     * Update.
     *
<<<<<<< HEAD
     * @param  array  $attributes
     * @param  $id
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        Event::dispatch('core.locale.update.before', $id);

        $locale = parent::update($attributes, $id);

        $this->uploadImage($attributes, $locale);

        Event::dispatch('core.locale.update.after', $locale);

        return $locale;
    }

    /**
     * Delete.
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        Event::dispatch('core.locale.delete.before', $id);

        $locale = parent::find($id);

        $locale->delete($id);

        Storage::delete((string) $locale->logo_path);

        Event::dispatch('core.locale.delete.after', $id);
    }

    /**
     * Upload image.
     *
     * @param  array  $attributes
     * @param  \Webkul\Core\Models\Locale  $locale
     * @return void
     */
    public function uploadImage($localeImages, $locale)
    {
        if (! isset($localeImages['logo_path'])) {
            if (! empty($localeImages['logo_path'])) {
                Storage::delete((string) $locale->logo_path);
            }

            $locale->logo_path = null;

            $locale->save();

            return;
        }
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        foreach ($localeImages['logo_path'] as $image) {
            if ($image instanceof UploadedFile) {
                $locale->logo_path = $image->storeAs(
                    'locales',
                    $locale->code . '.' . $image->getClientOriginalExtension()
                );
<<<<<<< HEAD
    
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                $locale->save();
            }
        }
    }
}
