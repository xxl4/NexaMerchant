<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasColumn('locales', 'locale_image')) {
            Schema::dropColumns('locales', 'locale_image');
        }

        Schema::table('locales', function (Blueprint $table) {
            $table->string('logo_path')->after('direction')->nullable();
        });

        DB::table('locales')->whereNull('logo_path')->update(['logo_path'=> DB::raw('CONCAT("locales/", code, ".png")')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('locales', 'locale_image')) {
            Schema::dropColumns('locales', 'locale_image');
        }

        if (Schema::hasColumn('locales', 'logo_path')) {
            Schema::dropColumns('locales', 'logo_path');
        }
    }
};
