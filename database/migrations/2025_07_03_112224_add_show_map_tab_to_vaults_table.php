<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vaults', function (Blueprint $table) {
            $table->boolean('show_map_tab')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('vaults', 'show_map_tab')) {
            Schema::table('vaults', function (Blueprint $table) {
                $table->dropColumn('show_map_tab');
            });
        }
    }
};
