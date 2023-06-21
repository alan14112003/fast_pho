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
            // $table->dropColumn('type');

            $table->unsignedBigInteger('type_id')->nullable()->after('price');
            $table->boolean('is_paper')->default(1)->after('is_cover');

            $table->foreign('type_id')->references('id')->on('photo_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
