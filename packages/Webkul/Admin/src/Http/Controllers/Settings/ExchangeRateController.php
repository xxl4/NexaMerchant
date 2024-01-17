<?php

namespace Webkul\Admin\Http\Controllers\Settings;

<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\ExchangeRateRepository;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Admin\DataGrids\Settings\ExchangeRatesDataGrid;
=======
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\DataGrids\Settings\ExchangeRatesDataGrid;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Core\Repositories\CurrencyRepository;
use Webkul\Core\Repositories\ExchangeRateRepository;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class ExchangeRateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ExchangeRateRepository $exchangeRateRepository,
        protected CurrencyRepository $currencyRepository
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
            return app(ExchangeRatesDataGrid::class)->toJson();
        }

        $currencies = $this->currencyRepository->with('exchange_rate')->all();

        return view('admin::settings.exchange-rates.index', compact('currencies'));
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
            'target_currency' => ['required', 'unique:currency_exchange_rates,target_currency'],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('core.exchange_rate.create.before');

        $exchangeRate = $this->exchangeRateRepository->create(request()->only([
            'target_currency',
<<<<<<< HEAD
            'rate'
=======
            'rate',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]));

        Event::dispatch('core.exchange_rate.create.after', $exchangeRate);

        return new JsonResponse([
            'message' => trans('admin::app.settings.exchange-rates.index.create-success'),
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
        $currencies = $this->currencyRepository->all();

        $exchangeRate = $this->exchangeRateRepository->findOrFail($id);

        return new JsonResponse([
            'data' => [
<<<<<<< HEAD
                'currencies' => $currencies,
                'exchangeRate' => $exchangeRate,
            ]
=======
                'currencies'   => $currencies,
                'exchangeRate' => $exchangeRate,
            ],
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
            'target_currency' => ['required', 'unique:currency_exchange_rates,target_currency,' . request()->id],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('core.exchange_rate.update.before', request()->id);

        $exchangeRate = $this->exchangeRateRepository->update(request()->only([
            'target_currency',
<<<<<<< HEAD
            'rate'
=======
            'rate',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]), request()->id);

        Event::dispatch('core.exchange_rate.update.after', $exchangeRate);

        return new JsonResponse([
            'message' => trans('admin::app.settings.exchange-rates.index.update-success'),
        ]);
    }

    /**
     * Update Rates Using Exchange Rates API
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRates()
    {
        try {
            app(config('services.exchange_api.' . config('services.exchange_api.default') . '.class'))->updateRates();

<<<<<<< HEAD
            session()->flash('success', trans('admin::app.settings.exchange-rates.update-success'));
=======
            session()->flash('success', trans('admin::app.settings.exchange-rates.index.update-success'));
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

<<<<<<< HEAD
        return redirect()->back();
=======
        return redirect()->route('admin.settings.exchange_rates.index');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
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
        $this->exchangeRateRepository->findOrFail($id);

        try {
            Event::dispatch('core.exchange_rate.delete.before', $id);

            $this->exchangeRateRepository->delete($id);

            Event::dispatch('core.exchange_rate.delete.after', $id);

            return response()->json([
                'message' => trans('admin::app.settings.exchange-rates.index.delete-success'),
            ], 200);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json([
            'message' => trans(
                'admin::app.settings.exchange-rates.index.delete-error'
<<<<<<< HEAD
            )
=======
            ),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ], 500);
    }
}
