<?php

namespace Webkul\Core\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LocalesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('channels')->delete();

        DB::table('locales')->delete();

        DB::table('locales')->insert([
            [
                'id'        => 1,
                'code'      => 'en',
                'name'      => 'English',
                'logo_path' => 'locales/en.png',
            ], [
                'id'        => 2,
                'code'      => 'fr',
                'name'      => 'French',
                'logo_path' => 'locales/fr.png',
            ], [
                'id'        => 3,
                'code'      => 'nl',
                'name'      => 'Dutch',
                'logo_path' => 'locales/nl.png',
            ], [
                'id'        => 4,
                'code'      => 'tr',
                'name'      => 'Türkçe',
                'logo_path' => 'locales/tr.png',
            ], [
                'id'        => 5,
                'code'      => 'es',
                'name'      => 'Spanish',
                'logo_path' => 'locales/es.png',
            ], [
                'id'        => 6,
                'code'      => 'de',
                'name'      => 'German',
                'logo_path' => 'locales/de.png',
            ], [
                'id'        => 7,
                'code'      => 'it',
                'name'      => 'Italian	',
                'logo_path' => 'locales/it.png',
            ], [
                'id'        => 8,
                'code'      => 'ru',
                'name'      => 'Russian',
                'logo_path' => 'locales/ru.png',
            ], [
                'id'        => 9,
                'code'      => 'uk',
                'name'      => 'Britain',
                'logo_path' => 'locales/uk.png',
            ],[
                'id'        => 10,
                'code'      => 'ar',
                'name'      => 'Arabic',
                'logo_path' => 'locales/ar.png',
            ],[
                'id'        => 11,
                'code'      => 'zh',
                'name'      => 'Chinese',
                'logo_path' => 'locales/zh.png',
            ],[
                'id'        => 12,
                'code'      => 'ja',
                'name'      => 'Japanese',
                'logo_path' => 'locales/ja.png',
            ],[
                'id'        => 13,
                'code'      => 'ko',
                'name'      => 'Korean',
                'logo_path' => 'locales/ko.png',
            ],[
                'id'        => 14,
                'code'      => 'pt',
                'name'      => 'Portuguese',
                'logo_path' => 'locales/pt.png',
            ],[
                'id'        => 15,
                'code'      => 'id',
                'name'      => 'Indonesian',
                'logo_path' => 'locales/id.png',
            ],[
                'id'        => 16,
                'code'      => 'th',
                'name'      => 'Thai',
                'logo_path' => 'locales/th.png',
            ],[
                'id'        => 17,
                'code'      => 'vi',
                'name'      => 'Vietnamese',
                'logo_path' => 'locales/vi.png',
            ]
        ]);
    }
}
