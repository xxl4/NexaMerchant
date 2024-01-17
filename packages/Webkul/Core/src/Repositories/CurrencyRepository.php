<?php

namespace Webkul\Core\Repositories;

use Illuminate\Support\Facades\Event;
<<<<<<< HEAD
use Webkul\Core\Eloquent\Repository;
use Webkul\Core\Contracts\Currency;
=======
use Webkul\Core\Contracts\Currency;
use Webkul\Core\Eloquent\Repository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CurrencyRepository extends Repository
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
        return Currency::class;
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
        Event::dispatch('core.currency.create.before');

        $currency = parent::create($attributes);

        Event::dispatch('core.currency.create.after', $currency);

        return $currency;
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
        Event::dispatch('core.currency.update.before', $id);

        $currency = parent::update($attributes, $id);

        Event::dispatch('core.currency.update.after', $currency);

        return $currency;
    }

    /**
     * Delete.
     *
     * @param  int  $id
     * @return bool
     */
    public function delete($id)
    {
        Event::dispatch('core.currency.delete.before', $id);

        if ($this->model->count() == 1) {
            return false;
        }

        if ($this->model->destroy($id)) {
            Event::dispatch('core.currency.delete.after', $id);

            return true;
        }

        return false;
    }
}
