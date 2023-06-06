<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->string('src')->nullable()->change();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });

        Schema::table('sub_products', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });

        Schema::table('photos', function (Blueprint $table) {
            $table->string('file')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
