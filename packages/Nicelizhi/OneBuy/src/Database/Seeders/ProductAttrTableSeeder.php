<?php

namespace Nicelizhi\OneBuy\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttrTableSeeder extends Seeder {
    public function run()
    {
        $now = Carbon::now();
        DB::table('attributes')->insert([
            [
                'id'                  => 29,
                'code'                => 'headercontainerbg',
                'admin_name'          => 'header container bg PC 2048*330',
                'type'                => 'image',
                'validation'          => NULL,
                'position'            => NULL,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => NULL,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
                'is_comparable'       => 0,
            ], [
                'id'                  => 30,
                'code'                => 'headercontainerbg1',
                'admin_name'          => 'header container bg Mobile 700*224',
                'type'                => 'image',
                'validation'          => NULL,
                'position'            => NULL,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => NULL,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
                'is_comparable'       => 0,
            ],
            [
                'id'                  => 31,
                'code'                => 'compare_at_price',
                'admin_name'          => 'compare_at_price',
                'type'                => 'price',
                'validation'          => NULL,
                'position'            => NULL,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => NULL,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
                'is_comparable'       => 0,
            ],
            [
                'id'                  => 32,
                'code'                => 'product_size_img',
                'admin_name'          => 'Product Size Image',
                'type'                => 'image',
                'validation'          => NULL,
                'position'            => NULL,
                'is_required'         => 0,
                'is_unique'           => 0,
                'value_per_locale'    => 0,
                'value_per_channel'   => 0,
                'default_value'       => NULL,
                'is_filterable'       => 0,
                'is_configurable'     => 0,
                'is_user_defined'     => 1,
                'is_visible_on_front' => 0,
                'created_at'          => $now,
                'updated_at'          => $now,
                'is_comparable'       => 0,
            ]
        ]);

        // // add base products
        // DB::table('products')->insert([
        //     [
        //     'id'    => 1,
        //     'sku'   => '8395243356390',
        //     'type'  => 'configurable',
        //     'attribute_family_id' => 1,
        //     'created_at'  => $now,
        //     'updated_at'  => $now,
        // ],[
        //     'id'    => 2,
        //     'sku'   => '8395243356390-2',
        //     'type'  => 'simple',
        //     'attribute_family_id' => 1,
        //     'parent_id' => 1,
        //     'created_at'  => $now,
        //     'updated_at'  => $now,
        // ]
        // ]);

    }
}