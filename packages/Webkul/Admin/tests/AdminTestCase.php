<?php

namespace Webkul\Admin\Tests;

use Tests\TestCase;
<<<<<<< HEAD

class AdminTestCase extends TestCase
{
=======
use Webkul\User\Contracts\Admin as AdminContract;
use Webkul\User\Models\Admin as AdminModel;

class AdminTestCase extends TestCase
{
    /**
     * Login as customer.
     */
    public function loginAsAdmin(?AdminContract $admin = null): AdminContract
    {
        $admin = $admin ?? AdminModel::factory()->create();

        $this->actingAs($admin, 'admin');

        return $admin;
    }
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
}
