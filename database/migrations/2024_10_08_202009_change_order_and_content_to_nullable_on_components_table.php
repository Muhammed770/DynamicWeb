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
        Schema::table('components', function (Blueprint $table) {
            //update the order and content columns to be nullable
            $table->string('content')->nullable()->change();
            $table->integer('order')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('components', function (Blueprint $table) {
            //revert the order and content columns to be not nullable
            $table->string('content')->nullable(false)->change();
            $table->integer('order')->nullable(false)->change();
        });
    }
};
 