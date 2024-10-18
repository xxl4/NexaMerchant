<?php

namespace Webkul\Core\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->delete();

        DB::table('currencies')->delete();

        DB::table('currencies')->insert([
            [ 
                'id'     => 1,
                'code'   => 'USD',
                'name'   => 'US Dollar',
                'symbol' => '$',
            ], [
                'id'     => 2,
                'code'   => 'EUR',
                'name'   => 'Euro',
                'symbol' => '€',
            ],[
                'id'     => 3,
                'code'   => 'INR',
                'name'   => 'Indian Rupee',
                'symbol' => '₹',
            ],[
                'id'     => 4,
                'code'   => 'GBP',
                'name'   => 'British Pound',
                'symbol' => '£',
            ],[
                'id'     => 5,
                'code'   => 'CAD',
                'name'   => 'Canadian Dollar',
                'symbol' => 'C$',
            ],[
                'id'     => 6,
                'code'   => 'AUD',
                'name'   => 'Australian Dollar',
                'symbol' => 'A$',
            ],[
                'id'     => 7,
                'code'   => 'JPY',
                'name'   => 'Japanese Yen',
                'symbol' => '¥',
            ],[
                'id'     => 8,
                'code'   => 'CNY',
                'name'   => 'Chinese Yuan',
                'symbol' => '¥',
            ],[
                'id'     => 9,
                'code'   => 'RUB',
                'name'   => 'Russian Ruble',
                'symbol' => '₽',
            ],[
                'id'     => 10,
                'code'   => 'KRW',
                'name'   => 'South Korean Won',
                'symbol' => '₩',
            ],[
                'id'     => 11,
                'code'   => 'BRL',
                'name'   => 'Brazilian Real',
                'symbol' => 'R$',
            ],[
                'id'     => 12,
                'code'   => 'MXN',
                'name'   => 'Mexican Peso',
                'symbol' => 'Mex$',
            ],[
                'id'     => 13,
                'code'   => 'IDR',
                'name'   => 'Indonesian Rupiah',
                'symbol' => 'Rp',
            ],[
                'id'     => 14,
                'code'   => 'TRY',
                'name'   => 'Turkish Lira',
                'symbol' => '₺',
            ],[
                'id'     => 15,
                'code'   => 'ZAR',
                'name'   => 'South African Rand',
                'symbol' => 'R',
            ],[
                'id'     => 16,
                'code'   => 'HKD',
                'name'   => 'Hong Kong Dollar',
                'symbol' => 'HK$',
            ],[
                'id'     => 17,
                'code'   => 'SGD',
                'name'   => 'Singapore Dollar',
                'symbol' => 'S$',
            ],[
                'id'     => 18,
                'code'   => 'NOK',
                'name'   => 'Norwegian Krone',
                'symbol' => 'kr',
            ],[
                'id'     => 19,
                'code'   => 'SEK',
                'name'   => 'Swedish Krona',
                'symbol' => 'kr',
            ],[
                'id'     => 20,
                'code'   => 'CHF',
                'name'   => 'Swiss Franc',
                'symbol' => 'CHF',
            ],[
                'id'     => 21,
                'code'   => 'PLN',
                'name'   => 'Polish Zloty',
                'symbol' => 'zł',
            ],[
                'id'     => 22,
                'code'   => 'THB',
                'name'   => 'Thai Baht',
                'symbol' => '฿',
            ],[
                'id'     => 23,
                'code'   => 'TWD',
                'name'   => 'Taiwan New Dollar',
                'symbol' => 'NT$',
            ],[
                'id'     => 24,
                'code'   => 'PHP',
                'name'   => 'Philippine Peso',
                'symbol' => '₱',
            ],[
                'id'     => 25,
                'code'   => 'MYR',
                'name'   => 'Malaysian Ringgit',
                'symbol' => 'RM',
            ],[
                'id'     => 26,
                'code'   => 'NZD',
                'name'   => 'New Zealand Dollar',
                'symbol' => 'NZ$',
            ],[
                'id'     => 27,
                'code'   => 'CZK',
                'name'   => 'Czech Koruna',
                'symbol' => 'Kč',
            ],[
                'id'     => 28,
                'code'   => 'HUF',
                'name'   => 'Hungarian Forint',
                'symbol' => 'Ft',
            ],[
                'id'     => 29,
                'code'   => 'AED',
                'name'   => 'United Arab Emirates Dirham',
                'symbol' => 'د.إ',
            ],[
                'id'     => 30,
                'code'   => 'SAR',
                'name'   => 'Saudi Riyal',
                'symbol' => 'ر.س',
            ],[
                'id'     => 31,
                'code'   => 'QAR',
                'name'   => 'Qatari Riyal',
                'symbol' => 'ر.ق',
            ],[
                'id'     => 32,
                'code'   => 'KWD',
                'name'   => 'Kuwaiti Dinar',
                'symbol' => 'د.ك',
            ],[
                'id'     => 33,
                'code'   => 'BHD',
                'name'   => 'Bahraini Dinar',
                'symbol' => 'د.ب',
            ],[
                'id'     => 34,
                'code'   => 'OMR',
                'name'   => 'Omani Rial',
                'symbol' => 'ر.ع.',
            ],[
                'id'     => 35,
                'code'   => 'JOD',
                'name'   => 'Jordanian Dinar',
                'symbol' => 'د.ا',
            ],[
                'id'     => 36,
                'code'   => 'LBP',
                'name'   => 'Lebanese Pound',
                'symbol' => 'ل.ل',
            ],[
                'id'     => 37,
                'code'   => 'EGP',
                'name'   => 'Egyptian Pound',
                'symbol' => 'E£',
            ],[
                'id'     => 38,
                'code'   => 'ILS',
                'name'   => 'Israeli Shekel',
                'symbol' => '₪',
            ]
        ]);
    }
}
