<?php

namespace Webkul\Admin\Http\Controllers\Settings;

use Illuminate\Http\JsonResponse;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\LocaleRepository;
use Webkul\Admin\DataGrids\Settings\LocalesDataGrid;
=======
use Webkul\Admin\DataGrids\Settings\LocalesDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\LocaleRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class LocaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected LocaleRepository $localeRepository)
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
            return app(LocalesDataGrid::class)->toJson();
        }

        return view('admin::settings.locales.index');
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
            'code'      => ['required', 'unique:locales,code', new \Webkul\Core\Rules\Code],
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $data = request()->only([
            'code',
            'name',
            'direction',
        ]);
<<<<<<< HEAD
        
=======

>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        $data['logo_path'] = request()->file('logo_path');

        $this->localeRepository->create($data);

        return new JsonResponse([
            'message' => trans('admin::app.settings.locales.index.create-success'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
=======
     * @param  int  $id
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function edit($id): JsonResponse
    {
        $locale = $this->localeRepository->findOrFail($id);

        return new JsonResponse([
            'data' => $locale,
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
        $this->validate(request(), [
<<<<<<< HEAD
            'code'      => ['required', 'unique:locales,code,' . request()->id, new \Webkul\Core\Rules\Code],
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $data = request()->only([
<<<<<<< HEAD
            'code',
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'name',
            'direction',
        ]);

        $data['logo_path'] = request()->file('logo_path');

        $this->localeRepository->update($data, request()->id);

        return new JsonResponse([
            'message' => trans('admin::app.settings.locales.index.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param int $id
=======
     * @param  int  $id
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->localeRepository->findOrFail($id);

        if ($this->localeRepository->count() == 1) {
            return response()->json([
                'message' => trans('admin::app.settings.locales.index.last-delete-error'),
            ], 400);
        }

        try {
            $this->localeRepository->delete($id);

            return new JsonResponse([
                'message' => trans('admin::app.settings.locales.index.delete-success'),
            ]);
        } catch (\Exception $e) {
        }

        return response()->json([
            'message' => trans('admin::app.settings.locales.index.delete-failed'),
        ], 500);
    }
}
