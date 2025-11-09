<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('instance')->after('age')->nullable();
            $table->string('ethnicity')->after('instance')->nullable();
            $table->string('occupation')->after('ethnicity')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['instance', 'ethnicity', 'occupation']);
        });
    }
};