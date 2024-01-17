<?php

namespace Webkul\Admin\Http\Controllers\Catalog;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Admin\DataGrids\Catalog\AttributeFamilyDataGrid;
=======
use Webkul\Admin\DataGrids\Catalog\AttributeFamilyDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Attribute\Repositories\AttributeFamilyRepository;
use Webkul\Attribute\Repositories\AttributeRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Core\Rules\Code;

class AttributeFamilyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected AttributeFamilyRepository $attributeFamilyRepository,
        protected AttributeRepository $attributeRepository
<<<<<<< HEAD
    )
    {
=======
    ) {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(AttributeFamilyDataGrid::class)->toJson();
        }

        return view('admin::catalog.families.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $attributeFamily = $this->attributeFamilyRepository->with(['attribute_groups.custom_attributes'])->findOneByField('code', 'default');

        $customAttributes = $this->attributeRepository->all(['id', 'code', 'admin_name', 'type', 'is_user_defined']);

        return view('admin::catalog.families.create', compact('attributeFamily', 'customAttributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
<<<<<<< HEAD
            'code' => ['required', 'unique:attribute_families,code', new Code],
            'name' => 'required',
=======
            'code'                      => ['required', 'unique:attribute_families,code', new Code],
            'name'                      => 'required',
            'attribute_groups.*.code'   => 'required',
            'attribute_groups.*.name'   => 'required',
            'attribute_groups.*.column' => 'required|in:1,2',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        Event::dispatch('catalog.attribute_family.create.before');

        $attributeFamily = $this->attributeFamilyRepository->create([
            'attribute_groups' => request('attribute_groups'),
            'code'             => request('code'),
            'name'             => request('name'),
        ]);

        Event::dispatch('catalog.attribute_family.create.after', $attributeFamily);

        session()->flash('success', trans('admin::app.catalog.families.create-success'));

        return redirect()->route('admin.catalog.families.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $attributeFamily = $this->attributeFamilyRepository->with(['attribute_groups.custom_attributes'])->findOrFail($id, ['*']);

        $customAttributes = $this->attributeRepository->all(['id', 'code', 'admin_name', 'type', 'is_user_defined']);

        return view('admin::catalog.families.edit', compact('attributeFamily', 'customAttributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->validate(request(), [
<<<<<<< HEAD
            'code' => ['required', 'unique:attribute_families,code,' . $id, new Code],
            'name' => 'required',
=======
            'code'                      => ['required', 'unique:attribute_families,code,' . $id, new Code],
            'name'                      => 'required',
            'attribute_groups.*.code'   => 'required',
            'attribute_groups.*.name'   => 'required',
            'attribute_groups.*.column' => 'required|in:1,2',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        Event::dispatch('catalog.attribute_family.update.before', $id);

        $attributeFamily = $this->attributeFamilyRepository->update([
            'attribute_groups' => request('attribute_groups'),
            'code'             => request('code'),
            'name'             => request('name'),
        ], $id);

        Event::dispatch('catalog.attribute_family.update.after', $attributeFamily);

        session()->flash('success', trans('admin::app.catalog.families.update-success'));

        return redirect()->route('admin.catalog.families.index');
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
        $attributeFamily = $this->attributeFamilyRepository->findOrFail($id);

        if ($this->attributeFamilyRepository->count() == 1) {
            return new JsonResponse([
                'message' => trans('admin::app.catalog.families.last-delete-error'),
            ], 400);
        }

        if ($attributeFamily->products()->count()) {
            return new JsonResponse([
                'message' => trans('admin::app.catalog.families.attribute-product-error'),
            ], 400);
        }

        try {
            Event::dispatch('catalog.attribute_family.delete.before', $id);

            $this->attributeFamilyRepository->delete($id);

            Event::dispatch('catalog.attribute_family.delete.after', $id);

            return new JsonResponse([
                'message' => trans('admin::app.catalog.families.delete-success'),
            ]);
        } catch (\Exception $e) {
            report($e);
        }

<<<<<<< HEAD
        
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        return new JsonResponse([
            'message' => trans('admin::app.catalog.families.delete-failed', ['name' => 'admin::app.catalog.families.family']),
        ], 500);
    }
}
