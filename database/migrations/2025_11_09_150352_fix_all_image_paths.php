<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Update semua path di product_variants
        DB::table('product_variants')->update([
            'image_url' => DB::raw("REPLACE(REPLACE(image_url, 'storage/images/', 'images/'), 'storage/', '')")
        ]);
    }

    public function down()
    {
        // Rollback jika perlu
        DB::table('product_variants')->update([
            'image_url' => DB::raw("REPLACE(image_url, 'images/', 'storage/images/')")
        ]);
    }
};