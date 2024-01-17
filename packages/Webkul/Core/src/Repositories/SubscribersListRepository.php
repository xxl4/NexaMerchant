<?php

namespace Webkul\Core\Repositories;

use Webkul\Core\Eloquent\Repository;

class SubscribersListRepository extends Repository
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
        return 'Webkul\Core\Contracts\SubscribersList';
    }

    /**
     * Delete a slider item and delete the image from the disk or where ever it is
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
