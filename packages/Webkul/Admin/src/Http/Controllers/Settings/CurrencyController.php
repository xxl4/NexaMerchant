<?php

namespace Webkul\Admin\Http\Controllers\Settings;

use Illuminate\Http\JsonResponse;
<<<<<<< HEAD
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Admin\DataGrids\Settings\CurrencyDataGrid;
=======
use Webkul\Admin\DataGrids\Settings\CurrencyDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\CurrencyRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CurrencyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CurrencyRepository $currencyRepository)
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
            return app(CurrencyDataGrid::class)->toJson();
        }

        return view('admin::settings.currencies.index');
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
            'code' => 'required|min:3|max:3|unique:currencies,code',
            'name' => 'required',
        ]);

        $data = request()->only([
            'code',
            'name',
            'symbol',
<<<<<<< HEAD
            'decimal'
=======
            'decimal',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        $this->currencyRepository->create($data);

        return new JsonResponse([
            'message' => trans('admin::app.settings.currencies.index.create-success'),
        ]);
    }

    /**
     * Currency Details
     *
     * @param  int  $id
<<<<<<< HEAD
     * @return \Illuminate\Http\JsonResponse
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function edit($id): JsonResponse
    {
        $currency = $this->currencyRepository->findOrFail($id);

        return new JsonResponse($currency);
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
        $id = request()->id;

        $this->validate(request(), [
            'code' => ['required', 'unique:currencies,code,' . $id, new \Webkul\Core\Rules\Code],
            'name' => 'required',
        ]);

        $data = request()->only([
            'code',
            'name',
            'symbol',
<<<<<<< HEAD
            'decimal'
=======
            'decimal',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        $this->currencyRepository->update($data, $id);

        return new JsonResponse([
            'message' => trans('admin::app.settings.currencies.index.update-success'),
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
     * @return void
     */
    public function destroy($id)
    {
        $this->currencyRepository->findOrFail($id);

        if ($this->currencyRepository->count() == 1) {
            return response()->json([
<<<<<<< HEAD
                'message' => trans('admin::app.settings.currencies.index.last-delete-error')
=======
                'message' => trans('admin::app.settings.currencies.index.last-delete-error'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            ], 400);
        }

        try {
            $this->currencyRepository->delete($id);

            return response()->json([
                'message' => trans('admin::app.settings.currencies.index.delete-success'),
            ], 200);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json([
<<<<<<< HEAD
            'message' => trans('admin::app.settings.currencies.index.delete-failed')
=======
            'message' => trans('admin::app.settings.currencies.index.delete-failed'),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ], 500);
    }
}
