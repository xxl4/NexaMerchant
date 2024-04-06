<?php

namespace Nicelizhi\Shopify\Http\Controllers;

use Nicelizhi\Shopify\Models\ShopifyProduct;
use Nicelizhi\Manage\Helpers\SSP;

class ProductController extends Controller
{


    public function __construct(
        //protected ProductRepository $productRepository,
        protected ShopifyProduct $ShopifyProduct

    ){

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
            $table = $table_pre.'shopify_products';

            // Table's primary key
            $primaryKey = 'id';
            
            $columns = array(
                //array( 'db' => 'id', 'dt' => 0 ),
                array( 'db' => '`p`.`product_id`',  'dt' => 'product_id', 'field'=>'product_id','formatter' => function($d, $row){
                    return '#'.$d;
                } ),
                array( 'db' => '`p`.`title`',   'dt' => 'title', 'field'=>'title' ),
                array( 'db' => '`p`.`status`',   'dt' => 'status', 'field'=>'status' ),
                array( 'db' => '`p`.`updated_at`',   'dt' => 'updated_at', 'field'=>'updated_at' )
            );
            // SQL server connection information
            $sql_details = [];

            $joinQuery = "FROM `{$table}` AS `p` ";
            $extraCondition = "";
            //$extraCondition = "`a`.`address_type`='cart_shipping'";


            return json_encode(SSP::simple( request()->input(), $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition ));
        }
        
        return view('shopify::products.index');
    }
}