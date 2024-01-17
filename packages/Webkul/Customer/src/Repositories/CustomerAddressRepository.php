<?php

namespace Webkul\Customer\Repositories;

use Webkul\Core\Eloquent\Repository;

class CustomerAddressRepository extends Repository
{
    /**
     * Specify Model class name
<<<<<<< HEAD
     *
     * @return string
     */
    function model(): string
=======
     */
    public function model(): string
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    {
        return 'Webkul\Customer\Contracts\CustomerAddress';
    }

    /**
<<<<<<< HEAD
     * @param  array  $data
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return \Webkul\Customer\Contracts\CustomerAddress
     */
    public function create(array $data)
    {
        $data['default_address'] = isset($data['default_address']);

        $default_address = $this
            ->findWhere(['customer_id' => $data['customer_id'], 'default_address' => 1])
            ->first();

        if (
            $default_address
            && $data['default_address']
        ) {
            $default_address->update(['default_address' => 0]);
        }

        $address = $this->model->create($data);

        return $address;
    }

    /**
<<<<<<< HEAD
     * @param  array  $data
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @param  int  $id
     * @return \Webkul\Customer\Contracts\CustomerAddress
     */
    public function update(array $data, $id)
    {
        $address = $this->find($id);

        $data['default_address'] = $data['default_address'] ?? $address->default_address;

        $default_address = $this
            ->findWhere(['customer_id' => $address->customer_id, 'default_address' => 1])
            ->first();

        if (
            isset($default_address->id)
            && $data['default_address']
        ) {
            if ($default_address->id != $address->id) {
                $default_address->update(['default_address' => 0]);
            }

            $address->update($data);
        } else {
            $address->update($data);
        }

        return $address;
    }
}
