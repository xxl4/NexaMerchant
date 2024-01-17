<?php

namespace Webkul\Admin\Http\Controllers\Customers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Webkul\Admin\DataGrids\Customers\GroupDataGrid;
use Webkul\Core\Rules\Code;
=======
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\DataGrids\Customers\GroupDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Rules\Code;
use Webkul\Customer\Repositories\CustomerGroupRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CustomerGroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Customer\Repositories\CustomerGroupRepository  $customerGroupRepository;
     * @return void
     */
    public function __construct(protected CustomerGroupRepository $customerGroupRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(GroupDataGrid::class)->toJson();
        }

        return view('admin::customers.groups.index');
    }

    /**
     * Store a newly created resource in storage.
<<<<<<< HEAD
     *
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function store(): JsonResponse
    {
        $this->validate(request(), [
            'code' => ['required', 'unique:customer_groups,code', new Code],
            'name' => 'required',
        ]);

        Event::dispatch('customer.customer_group.create.before');

        $data = array_merge(request()->only([
            'code',
<<<<<<< HEAD
            'name'
=======
            'name',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]), [
            'is_user_defined' => 1,
        ]);

        $customerGroup = $this->customerGroupRepository->create($data);

        Event::dispatch('customer.customer_group.create.after', $customerGroup);

        return new JsonResponse([
            'message' => trans('admin::app.customers.groups.index.create.success'),
        ]);
    }

    /**
     * Update the specified resource in storage.
<<<<<<< HEAD
     *
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function update(): JsonResponse
    {
        $id = request()->input('id');

        $this->validate(request(), [
            'code' => ['required', 'unique:customer_groups,code,' . $id, new Code],
            'name' => 'required',
        ]);

        Event::dispatch('customer.customer_group.update.before', $id);

        $data = request()->only([
            'code',
<<<<<<< HEAD
            'name'
=======
            'name',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        $customerGroup = $this->customerGroupRepository->update($data, $id);

        Event::dispatch('customer.customer_group.update.after', $customerGroup);

        return new JsonResponse([
            'message' => trans('admin::app.customers.groups.index.edit.success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
=======
     * @param  int  $id
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function destroy($id): JsonResponse
    {
        $customerGroup = $this->customerGroupRepository->findOrFail($id);

<<<<<<< HEAD
        if (!$customerGroup->is_user_defined) {
=======
        if (! $customerGroup->is_user_defined) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return new JsonResponse([
                'message' => trans('admin::app.customers.groups.index.edit.group-default'),
            ], 400);
        }

        if ($customerGroup->customers->count()) {
            return new JsonResponse([
                'message' => trans('admin::app.customers.groups.customer-associate'),
            ], 400);
        }

        try {
            Event::dispatch('customer.customer_group.delete.before', $id);

            $this->customerGroupRepository->delete($id);

            Event::dispatch('customer.customer_group.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.customers.groups.index.edit.delete-success'),
            ]);
        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('admin::app.customers.groups.index.edit.delete-failed'),
        ], 500);
    }
}
