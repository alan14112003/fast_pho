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
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('status');
            $table->dropColumn('user_id');
            $table->dropColumn('user_name');
            $table->dropColumn('user_phone');
            $table->dropColumn('user_address');
            $table->unsignedInteger('price')->default(0)->after('descriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            //
        });
    }
};
