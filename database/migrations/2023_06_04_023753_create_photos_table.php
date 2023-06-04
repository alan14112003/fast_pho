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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->integer('total')->default(1);
            $table->string('type');
            $table->tinyInteger('face_number')->default(1);
            $table->tinyInteger('is_cover')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_address');
            $table->text('descriptions');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
};
