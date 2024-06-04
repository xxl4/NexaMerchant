<?php
namespace Nicelizhi\Manage\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Nicelizhi\Manage\Http\Controllers\Controller;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Sales\Repositories\InvoiceRepository;
use Webkul\Sales\Repositories\ShipmentRepository;
use Webkul\Sales\Repositories\OrderTransactionRepository;
use Nicelizhi\Manage\DataGrids\Sales\OrderTransactionsDataGrid;
use Nicelizhi\Manage\Helpers\SSP;
use Webkul\Payment\Facades\Payment;


class DisputesController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            //return app(OrderTransactionsDataGrid::class)->toJson();
            $table_pre = config("database.connections.mysql.prefix");
            $table = $table_pre.'order_disputes';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`t`.`id`',  'dt' => 'id', 'field'=>'id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`t`.`dispute_id`',  'dt' => 'dispute_id', 'field'=>'dispute_id'),
                array( 'db' => '`t`.`transaction_id`',   'dt' => 'transaction_id', 'field'=>'transaction_id' ),
                array( 'db' => '`t`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`t`.`created_at`',   'dt' => 'created_at', 'field'=>'created_at' ),
                array( 'db' => '`t`.`updated_at`',   'dt' => 'updated_at', 'field'=>'updated_at' ),
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `t` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }

        return view('admin::sales.disputes.index');
    }
}