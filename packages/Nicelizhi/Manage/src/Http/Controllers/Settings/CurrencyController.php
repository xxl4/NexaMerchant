<?php

namespace Nicelizhi\Manage\Http\Controllers\Settings;

use Illuminate\Http\JsonResponse;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Core\Repositories\CurrencyRepository;
use Nicelizhi\Manage\DataGrids\Settings\CurrencyDataGrid;
use Nicelizhi\Manage\Helpers\SSP;

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

            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'currencies';

            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`p`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return $d;
                } ),
                array( 'db' => '`p`.`code`',   'dt' => 'code', 'field'=>'code' ),
                array( 'db' => '`p`.`name`',   'dt' => 'name', 'field'=>'name' ),
                array( 'db' => '`p`.`symbol`',   'dt' => 'symbol', 'field'=>'symbol' ),
                array( 'db' => '`p`.`decimal`',   'dt' => 'decimal', 'field'=>'decimal' ),
                array( 'db' => '`p`.`updated_at`',   'dt' => 'updated_at', 'field'=>'updated_at' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `p` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));

            //return app(CurrencyDataGrid::class)->toJson();
        }

        return view('admin::settings.currencies.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
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
            'decimal'
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $currency = $this->currencyRepository->findOrFail($id);

        return new JsonResponse($currency);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
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
            'decimal'
        ]);

        $this->currencyRepository->update($data, $id);

        return new JsonResponse([
            'message' => trans('admin::app.settings.currencies.index.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->currencyRepository->findOrFail($id);

        if ($this->currencyRepository->count() == 1) {
            return response()->json([
                'message' => trans('admin::app.settings.currencies.index.last-delete-error')
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
            'message' => trans('admin::app.settings.currencies.index.delete-failed')
        ], 500);
    }
}
